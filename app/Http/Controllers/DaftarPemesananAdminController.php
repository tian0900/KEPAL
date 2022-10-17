<?php

namespace App\Http\Controllers;

use App\Models\KeranjangKafe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pemesanan;
use App\Models\PemesananProduk;
use App\Models\PemesananProdukDetail;
use App\Models\KeranjangProduk;
use App\Models\PembookinganLayanan;
use App\Models\PembookinganLayananDetail;
use App\Models\KeranjangLayanan;
use App\Models\PemesananKafe;
use App\Models\PemesananKafeDetail;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class DaftarPemesananAdminController extends Controller
{
    //

    public function index()
    {
        $daftarpemesanan = DB::table('pemesanan')
            ->join('users', 'pemesanan.id_customer', '=', 'users.user_id')
            ->leftjoin('pemesananproduk', 'pemesananproduk.id_pemesanan', '=', 'pemesanan.id_pemesanan')
            ->leftjoin('pembookinganlayanan', 'pembookinganlayanan.id_pemesanan', '=', 'pemesanan.id_pemesanan')
            ->leftjoin('pemesanankafe', 'pemesanankafe.id_pemesanan', '=', 'pemesanan.id_pemesanan')
            ->where('pemesanan.status_pembayaran', '=', 'Sudah Bayar')
            ->get();
        return view('admin.pemesanan.daftarpemesananadmin', compact('daftarpemesanan'));
    }

    public function tambah()
    {
        $user = User::all();
        $produk = DB::table('keranjangproduk')
            ->join('users', 'keranjangproduk.id_customer', '=', 'users.user_id')
            ->join('produk', 'produk.id_produk', '=', 'keranjangproduk.id_produk')
            ->where('keranjangproduk.id_customer', '=', auth()->id())
            ->get();

        $layanan = DB::table('keranjanglayanan')
            ->join('users', 'keranjanglayanan.id_customer', '=', 'users.user_id')
            ->join('layanan', 'layanan.id_layanan', '=', 'keranjanglayanan.id_layanan')
            ->where('keranjanglayanan.id_customer', '=', auth()->id())
            ->get();

        $kafe = DB::table('keranjangkafe')
            ->join('users', 'keranjangkafe.id_customer', '=', 'users.user_id')
            ->join('cafe', 'cafe.id_cafe', '=', 'keranjangkafe.id_cafe')
            ->where('keranjangkafe.id_customer', '=', auth()->id())
            ->get();

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

        $totalkafe = DB::table('keranjangkafe')
            ->select(DB::raw('SUM(total) as total'))
            ->groupBy('id_customer')
            ->where('id_customer', '=', auth()->id())
            ->first();

        if ($total == null && $totallayanan == null && $totalkafe == null) {
            $totalpembayaran = 0;
        } else if ($total == null && $totallayanan == null) {
            $totalpembayaran = (int)$totalkafe->total;
        } else if ($total == null && $totalkafe == null) {
            $totalpembayaran = (int)$totallayanan->total;
        } else if ($total == null) {
            $totalpembayaran = (int)$totallayanan->total + (int)$totalkafe->total;
        } else if ($totallayanan == null && $totalkafe == null) {
            $totalpembayaran = (int)$total->total;
        } else if ($totallayanan == null) {
            $totalpembayaran = (int)$total->total + (int)$totalkafe->total;
        } else if ($totalkafe == null) {
            $totalpembayaran = (int)$total->total + (int)$totallayanan->total;
        } else {
            $totalpembayaran = (((int)$total->total) + ((int)$totallayanan->total) + ((int)$totalkafe->total));
        }


        return view('admin.pemesanan.tambahdaftarpemesananadmin', compact('user', 'produk', 'layanan', 'kafe', 'totalpembayaran'));
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

        $totalkafe = DB::table('keranjangkafe')
            ->select(DB::raw('SUM(total) as total'))
            ->groupBy('id_customer')
            ->where('id_customer', '=', auth()->id())
            ->first();

        if ($total == null && $totallayanan == null && $totalkafe == null) {
            $totalpembayaran = 0;
        } else if ($total == null && $totallayanan == null) {
            $totalpembayaran = (int)$totalkafe->total;
        } else if ($total == null && $totalkafe == null) {
            $totalpembayaran = (int)$totallayanan->total;
        } else if ($total == null) {
            $totalpembayaran = (int)$totallayanan->total + (int)$totalkafe->total;
        } else if ($totallayanan == null && $totalkafe == null) {
            $totalpembayaran = (int)$total->total;
        } else if ($totallayanan == null) {
            $totalpembayaran = (int)$total->total + (int)$totalkafe->total;
        } else if ($totalkafe == null) {
            $totalpembayaran = (int)$total->total + (int)$totallayanan->total;
        } else {
            $totalpembayaran = (((int)$total->total) + ((int)$totallayanan->total) + ((int)$totalkafe->total));
        }

        $this->validate(
            $request,
            [
                'name' => 'required',
                'bukti_pembayaran' => 'required',
            ]
        );

        $validator = Validator::make(
            $request->all(),
            []
        );


        if ($validator->fails()) {
            Alert::Warning('Error', 'Gagal memproses. Silahkan coba kembali!');
        } else {
            $buatpesanan = new Pemesanan();
            $buatpesanan->id_customer =  $request->name;
            $buatpesanan->kode_transaksi = "INV/PYM/" . now()->format('Y-m-d') . "/" . rand(100, 999);
            $buatpesanan->metode_pembayaran = $request->metode_pembayaran;
            $buatpesanan->tanggal_pesanan = now();
            $buatpesanan->total_pemesanan = $totalpembayaran;
            $buatpesanan->status_pembayaran = "Sudah Bayar";

            if ($request->hasFile('bukti_pembayaran')) {
                $file = $request->file('bukti_pembayaran')->getClientOriginalName();
                $request->file('bukti_pembayaran')->move('gbr_bukti_pembayaran', $file);
                $buatpesanan->bukti_pembayaran = $file;
            }


            $keranjang = KeranjangProduk::where('id_customer', auth()->id())->get();
            $keranjanglayanan = KeranjangLayanan::where('id_customer', auth()->id())->get();
            $keranjangkafe = KeranjangKafe::where('id_customer', auth()->id())->get();
            if ($buatpesanan->save()) {
                if ($total != null) {
                    $pemesanan = new PemesananProduk();
                    $pemesanan->id_pemesanan = $buatpesanan->id_pemesanan;
                    $pemesanan->id_customer =  $request->name;
                    $pemesanan->tanggal_pemesanan =  now();
                    $pemesanan->total_pembayaran = (int)$total->total;
                    $pemesanan->metode_pengiriman = "Ambil Sendiri";
                    $pemesanan->status = "Selesai";
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
                    $pembookingan = new PembookinganLayanan();
                    $pembookingan->id_customer =  $request->name;
                    $pembookingan->tanggal_pembookingan = now();
                    $pembookingan->id_pemesanan = $buatpesanan->id_pemesanan;
                    $pembookingan->tipe_kendaraan = $request->tipe_kendaraan;
                    $pembookingan->pukul = now()->format('H:i:s');
                    $pembookingan->keluhan_service = "-";
                    $pembookingan->total_pembayaran = (int)$totallayanan->total;
                    $pembookingan->status = "Diterima";
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
                if ($totalkafe != null) {
                    $pemesanankafe = new PemesananKafe();
                    $pemesanankafe->id_pemesanan = $buatpesanan->id_pemesanan;
                    $pemesanankafe->id_customer =  $request->name;
                    $pemesanankafe->total_pembayaran = (int)$totalkafe->total;

                    if ($pemesanankafe->save()) {
                        foreach ($keranjangkafe as $keranjangkafes) {
                            $pemesanandetail = new PemesananKafeDetail();
                            $pemesanandetail->kuantitas = $keranjangkafes->kuantitas;
                            $pemesanandetail->total_harga = $keranjangkafes->total;
                            $pemesanandetail->id_cafe = $keranjangkafes->id_cafe;
                            $pemesanandetail->id_pemesanankafe = $pemesanankafe->id_pemesanankafe;
                            $pemesanandetail->save();
                        }

                        $deletekeranjang = KeranjangKafe::where('id_customer', auth()->id());
                        if ($deletekeranjang->delete()) {
                        }
                    }
                }
                Alert::success('Success', 'Pemesanan Berhasil!');
                return redirect('daftarpemesananadmin');
            }
        }
    }
}
