<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sosial_media;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Pemesanan;
use App\Models\PemesananProduk;
use App\Models\PemesananProdukDetail;
use App\Models\KeranjangProduk;
use App\Models\PembookinganLayanan;
use App\Models\PembookinganLayananDetail;
use App\Models\KeranjangLayanan;
use Carbon\Carbon;
class BuatPesananController extends Controller
{
    //
    public function index()
    {
        $pesan = DB::table('keranjangproduk')
            ->join('users', 'keranjangproduk.id_customer', '=', 'users.user_id')
            ->join('produk', 'produk.id_produk', '=', 'keranjangproduk.id_produk')
            ->where('keranjangproduk.id_customer', '=', auth()->id())
            ->get();

        $pesanlayanan = DB::table('keranjanglayanan')
            ->join('users', 'keranjanglayanan.id_customer', '=', 'users.user_id')
            ->join('layanan', 'layanan.id_layanan', '=', 'keranjanglayanan.id_layanan')
            ->where('keranjanglayanan.id_customer', '=', auth()->id())
            ->get();

        $instagram = sosial_media::where('id_sosialmedia', 1)->value('hyperlink');
        $twitter = sosial_media::where('id_sosialmedia', 2)->value('hyperlink');
        $youtube = sosial_media::where('id_sosialmedia', 3)->value('hyperlink');
        $facebook = sosial_media::where('id_sosialmedia', 4)->value('hyperlink');
        return view('layout.buatpesanan', compact('pesan', 'pesanlayanan', 'instagram', 'twitter', 'youtube', 'facebook'));
    }

    public function store(Request $request)
    {

        $total = DB::table('keranjangproduk')
            ->select(DB::raw('SUM(total) as total'))
            ->groupBy('id_customer')
            ->where('id_customer', '=', auth()->id())
            ->first();

        $totallayanan = DB::table('keranjanglayanan')
            ->select(DB::raw('SUM(harga) as total'))
            ->groupBy('id_customer')
            ->where('id_customer', '=', auth()->id())
            ->first();

        if ($total == null && $totallayanan == null) {
            $totalpembayaran = 0;
        } else if ($total == null) {
            $totalpembayaran = (int)$totallayanan->total;
        } else if ($totallayanan == null) {
            $totalpembayaran = (int)$total->total;
        } else {
            $totalpembayaran = (((int)$total->total) + ((int)$totallayanan->total));
        }

        $validator = Validator::make(
            $request->all(),
            []
        );


        if ($validator->fails()) {
            Alert::Warning('Error', 'Gagal memproses. Silahkan coba kembali!');
        } else {
            $buatpesanan = new Pemesanan();
            $buatpesanan->id_customer =  auth()->id();
            $buatpesanan->kode_transaksi = "INV/PYM/" . now()->format('Y-m-d') . "/" . rand(100, 999);
            $buatpesanan->metode_pembayaran = $request->metode_pembayaran;
            $buatpesanan->tanggal_pesanan = now();
            $buatpesanan->tanggal_kadaluwarsa = Carbon::now()->addDay()->format('Y-m-d H:i:s');
            $buatpesanan->total_pemesanan = $totalpembayaran;
            $buatpesanan->status_pembayaran = "Belum Bayar";


            $keranjang = KeranjangProduk::where('id_customer', auth()->id())->get();
            $keranjanglayanan = KeranjangLayanan::where('id_customer', auth()->id())->get();
            if ($buatpesanan->save()) {
                if ($total != null) {
                    $pemesanan = new PemesananProduk();
                    $pemesanan->id_pemesanan = $buatpesanan->id_pemesanan;
                    $pemesanan->id_customer =  auth()->id();
                    $pemesanan->tanggal_pemesanan =  now();
                    $pemesanan->total_pembayaran = (int)$total->total;
                    $pemesanan->metode_pengiriman = $request->metode_pengiriman;
                    $pemesanan->status = "Verifikasi";
                    if ($request->metode_pengiriman == "Antar") {
                        $this->validate(
                            $request,
                            [
                                'nama_penerima' => 'required',
                                'alamat_penerima' => 'required',
                            ]
                        );
                        $pemesanan->nama_penerima = $request->nama_penerima;
                        $pemesanan->alamat_penerima = $request->alamat_penerima;
                    }

                    if ($pemesanan->save()) {
                        foreach ($keranjang as $keranjangs) {
                            $pemesanandetail = new PemesananProdukDetail();
                            $pemesanandetail->kuantitas_pesan = $keranjangs->kuantitas;
                            $pemesanandetail->total_harga = $keranjangs->total;
                            $pemesanandetail->id_produk = $keranjangs->id_produk;
                            $pemesanandetail->id_pemesananproduk = $pemesanan->id_pemesananproduk;
                            $pemesanandetail->save();
                        }

                        $deletekeranjang = KeranjangProduk::where('id_customer', auth()->id());
                        if ($deletekeranjang->delete()) {
                        }
                    }
                }

                if ($totallayanan != null) {
                    $this->validate(
                        $request,
                        [
                            'tanggal_pembookingan' => 'required',
                            'tipe_kendaraan' => 'required',
                            'pukul' => 'required',
                            'keluhan_service' => 'required',
                        ]
                    );
                    $pembookingan = new PembookinganLayanan();
                    $pembookingan->id_customer =  auth()->id();
                    $pembookingan->tanggal_pembookingan = $request->tanggal_pembookingan;
                    $pembookingan->id_pemesanan = $buatpesanan->id_pemesanan;
                    $pembookingan->tipe_kendaraan = $request->tipe_kendaraan;
                    $pembookingan->pukul = $request->pukul;
                    $pembookingan->keluhan_service = $request->keluhan_service;
                    $pembookingan->total_pembayaran = (int)$totallayanan->total;
                    $pembookingan->status = "Verifikasi";
                    if ($pembookingan->save()) {
                        foreach ($keranjanglayanan as $keranjanglayanans) {
                            $pembookingandetail = new PembookinganLayananDetail();
                            $pembookingandetail->total_harga = $keranjanglayanans->harga;
                            $pembookingandetail->id_layanan = $keranjanglayanans->id_layanan;
                            $pembookingandetail->id_pembookinganLayanan = $pembookingan->id_pembookinganlayanan;
                            $pembookingandetail->save();
                        }

                        $deletekeranjanglayanan = KeranjangLayanan::where('id_customer', auth()->id());
                        if ($deletekeranjanglayanan->delete()) {
                        }
                    }
                }
                Alert::success('Success', 'Silahkan lakukan pembayaran dalam 24 jam!');
                return redirect('statuspesanan');
            }
        }
    }
}
