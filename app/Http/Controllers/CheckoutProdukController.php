<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\KeranjangProduk;
use App\Models\PemesananProduk;
use App\Models\PemesananProdukDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\sosial_media;

class CheckoutProdukController extends Controller
{
    //
    public function index($id_customer)
    {

        $pesan = DB::table('keranjangproduk')
            ->join('users', 'keranjangproduk.id_customer', '=', 'users.user_id')
            ->join('produk', 'produk.id_produk', '=', 'keranjangproduk.id_produk')
            ->where('keranjangproduk.id_customer', '=', auth()->id())
            ->get();


        $total = DB::table('keranjangproduk')
            ->select(DB::raw('SUM(total) as total'))
            ->groupBy('id_customer')
            ->where('id_customer', '=', auth()->id())
            ->first();

        $pesanlayanan = DB::table('keranjanglayanan')
            ->join('users', 'keranjanglayanan.id_customer', '=', 'users.user_id')
            ->join('layanan', 'layanan.id_layanan', '=', 'keranjanglayanan.id_layanan')
            ->where('keranjanglayanan.id_customer', '=', auth()->id())
            ->get();


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

        $instagram = sosial_media::where('id_sosialmedia', 1)->value('hyperlink');
        $twitter = sosial_media::where('id_sosialmedia', 2)->value('hyperlink');
        $youtube = sosial_media::where('id_sosialmedia', 3)->value('hyperlink');
        $facebook = sosial_media::where('id_sosialmedia', 4)->value('hyperlink');

        return view('layout.checkoutproduk', compact('pesan', 'total', 'pesanlayanan', 'totallayanan', 'totalpembayaran', 'instagram', 'twitter', 'youtube', 'facebook'));
    }



    public function storepemesananproduk(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama_penerima' => 'required',
                'alamat_penerima' => 'required',
                'bukti_pembayaran' => 'required'
            ]
        );

        if ($validator->fails()) {
            Alert::Warning('Error', 'Gagal memproses. Silahkan coba kembali!');
        }

        $this->validate(
            $request,
            [
                'nama_penerima' => 'required',
                'alamat_penerima' => 'required',
                'bukti_pembayaran' => 'required'
            ]
        );
        $keranjang = KeranjangProduk::where('id_customer', auth()->id())->get();

        $pemesanan = new PemesananProduk();
        $pemesanan->id_customer =  auth()->id();
        $pemesanan->tanggal_pemesanan = now();
        $pemesanan->total_pembayaran = $request->total_harga;
        $pemesanan->nama_penerima = $request->nama_penerima;
        $pemesanan->alamat_penerima = $request->alamat_penerima;
        $pemesanan->status = "Verifikasi";

        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran')->getClientOriginalName();
            $request->file('bukti_pembayaran')->move('gbr_bukti_pembayaran', $file);
            $pemesanan->bukti_pembayaran = $file;
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
        Alert::success('Success', 'Pesanan Anda sedang diproses. Lihat Status Pemesanan!');
        return redirect()->back()->with('success', "Pesanan Anda sedang diproses. Lihat Status Pemesanan!");
    }

    public function delete($id_keranjangproduk)
    {
        $delete = KeranjangProduk::find($id_keranjangproduk);
        $produk = $delete->id_produk;
        $kuantitas = $delete->kuantitas;
        $deleteproduks = Produk::find($produk);
        $deleteproduks->stok = $deleteproduks->stok + $kuantitas;
        $deleteproduks->save();
        if ($delete->delete()) {
            Alert::success('Success', 'Pesanan Anda berhasil dihapus!');
            return redirect()->back()->with('success', "Berhasil menghapus pesanan!");
        }
    }

    public function kurang($id_keranjangproduk)
    {

        $kurang = KeranjangProduk::find($id_keranjangproduk);
        $produk = $kurang->id_produk;
        $kuantitas = $kurang->kuantitas;
        if ($kuantitas == 1) {
            return $this->delete($id_keranjangproduk);
        }
        $kurangproduks = Produk::find($produk);
        $kurangproduks->stok = $kuantitas + 1;
        $kurang->kuantitas--;
        $kurang->total = $kurang->kuantitas * $kurangproduks->harga;
        $kurangproduks->save();
        if ($kurang->save()) {
            return redirect()->back()->with('success', "Berhasil menghapus pesanan!");
        }
    }

    public function tambah($id_keranjangproduk)
    {

        $tambah = KeranjangProduk::find($id_keranjangproduk);
        $produk = $tambah->id_produk;
        $kuantitas = $tambah->kuantitas;
        $tambahproduks = Produk::find($produk);
        if ($tambahproduks->stok == 0) {
            Alert::warning('Warning', 'Pesanan Anda sudah berada di batas stok produk!');
            return redirect()->back();
        } else {
            $tambahproduks->stok--;
            $tambah->kuantitas++;
            $tambah->total = $tambah->kuantitas * $tambahproduks->harga;
            $tambahproduks->save();
        }

        if ($tambah->save()) {
            return redirect()->back()->with('success', "Berhasil menghapus pesanan!");
        }
    }
}
