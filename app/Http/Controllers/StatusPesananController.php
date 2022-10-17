<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemesananProduk;
use Illuminate\Support\Facades\DB;
use App\Models\PemesananProdukDetail;
use App\Models\PembookinganLayananDetail;
use App\Models\sosial_media;
use App\Models\PembookinganLayanan;

class StatusPesananController extends Controller
{
    //
    public function index()
    {
        $pesan = DB::table('pemesanan')
            ->join('users', 'pemesanan.id_customer', '=', 'users.user_id')
            ->where('pemesanan.id_customer', '=', auth()->id())
            ->where('pemesanan.status_pembayaran', '=', 'Belum Bayar')
            ->where('pemesanan.tanggal_kadaluwarsa', '>=', now()->format('Y-m-d H:i:s'))
            ->get();

        $sudahbayar = DB::table('pemesanan')
            ->join('users', 'pemesanan.id_customer', '=', 'users.user_id')
            ->where('pemesanan.id_customer', '=', auth()->id())
            ->where('pemesanan.status_pembayaran', '=', 'Sudah Bayar')
            ->get();

        $instagram = sosial_media::where('id_sosialmedia', 1)->value('hyperlink');
        $twitter = sosial_media::where('id_sosialmedia', 2)->value('hyperlink');
        $youtube = sosial_media::where('id_sosialmedia', 3)->value('hyperlink');
        $facebook = sosial_media::where('id_sosialmedia', 4)->value('hyperlink');
        return view('layout.statuspesanan', compact('pesan', 'sudahbayar', 'instagram', 'twitter', 'youtube', 'facebook'));
    }

    public function detail($id_pemesanan)
    {
        $pemesanandetail = PemesananProduk::find($id_pemesanan);
        $pemesanan = DB::table('pemesananproduk')
            ->join('users', 'users.user_id', '=', 'pemesananproduk.id_customer')
            ->select('pemesananproduk.*', 'users.name', 'users.nomor_telephone')
            ->where('pemesananproduk.id_pemesanan', '=', $id_pemesanan)
            ->get();
        $daftarjoin = DB::table('pemesananproduk')
            ->join('pemesanan', 'pemesanan.id_pemesanan', '=', 'pemesananproduk.id_pemesanan')
            ->join('pemesananprodukdetail', 'pemesananprodukdetail.id_pemesananproduk', '=', 'pemesananproduk.id_pemesananproduk')
            ->join('produk', 'pemesananprodukdetail.id_produk', '=', 'produk.id_produk')
            ->select('pemesananprodukdetail.*', 'produk.*')
            ->where('pemesananproduk.id_pemesanan', '=', $id_pemesanan)
            ->get();

        $pembookingandetail = PembookinganLayanan::find($id_pemesanan);
        $pembookingan = DB::table('pembookinganlayanan')
            ->join('users', 'users.user_id', '=', 'pembookinganlayanan.id_customer')
            ->select('pembookinganlayanan.*', 'users.name', 'users.nomor_telephone')
            ->where('pembookinganlayanan.id_pemesanan', '=', $id_pemesanan)
            ->get();
        $daftarjoin1 = DB::table('pembookinganlayanan')
            ->join('pembookinganlayanandetail', 'pembookinganlayanandetail.id_pembookinganlayanan', '=', 'pembookinganlayanan.id_pembookinganlayanan')
            ->join('layanan', 'pembookinganlayanandetail.id_layanan', '=', 'layanan.id_layanan')
            ->select('pembookinganlayanandetail.*', 'layanan.*')
            ->where('pembookinganlayanan.id_pemesanan', '=', $id_pemesanan)
            ->get();

        $pemesanankafe = DB::table('pemesanankafe')
            ->join('users', 'users.user_id', '=', 'pemesanankafe.id_customer')
            ->select('pemesanankafe.*', 'users.name')
            ->where('pemesanankafe.id_pemesanan', '=', $id_pemesanan)
            ->get();
        $daftarpemesanankafe = DB::table('pemesanankafe')
            ->join('pemesanankafedetail', 'pemesanankafedetail.id_pemesanankafe', '=', 'pemesanankafe.id_pemesanankafe')
            ->join('cafe', 'pemesanankafedetail.id_cafe', '=', 'cafe.id_cafe')
            ->select('pemesanankafedetail.*', 'cafe.*')
            ->where('pemesanankafe.id_pemesanan', '=', $id_pemesanan)
            ->get();

        $instagram = sosial_media::where('id_sosialmedia', 1)->value('hyperlink');
        $twitter = sosial_media::where('id_sosialmedia', 2)->value('hyperlink');
        $youtube = sosial_media::where('id_sosialmedia', 3)->value('hyperlink');
        $facebook = sosial_media::where('id_sosialmedia', 4)->value('hyperlink');
        return view('layout.statuspesanandetail', compact('pemesanandetail', 'pemesanan', 'daftarjoin', 'pembookingandetail', 'pemesanankafe','daftarpemesanankafe','pembookingan', 'daftarjoin1', 'instagram', 'twitter', 'youtube', 'facebook'));
    }

    public function detaillayanan($id_pembookinganlayanan)
    {
        $pembookingandetail = PembookinganLayananDetail::find($id_pembookinganlayanan);
        $pembookingan = DB::table('pembookinganlayanan')
            ->join('users', 'users.user_id', '=', 'pembookinganlayanan.id_customer')
            ->select('pembookinganlayanan.*', 'users.name', 'users.nomor_telephone')
            ->where('pembookinganlayanan.id_pembookinganlayanan', '=', $id_pembookinganlayanan)
            ->get();
        $daftarjoin = DB::table('pembookinganlayanandetail')
            ->join('pembookinganlayanan', 'pembookinganlayanandetail.id_pembookinganlayanan', '=', 'pembookinganlayanan.id_pembookinganlayanan')
            ->join('layanan', 'pembookinganlayanandetail.id_layanan', '=', 'layanan.id_layanan')
            ->select('pembookinganlayanandetail.*', 'layanan.*')
            ->where('pembookinganlayanandetail.id_pembookinganlayanan', '=', $id_pembookinganlayanan)
            ->get();
        $instagram = sosial_media::where('id_sosialmedia', 1)->value('hyperlink');
        $twitter = sosial_media::where('id_sosialmedia', 2)->value('hyperlink');
        $youtube = sosial_media::where('id_sosialmedia', 3)->value('hyperlink');
        $facebook = sosial_media::where('id_sosialmedia', 4)->value('hyperlink');
        return view('layout.statuspesanandetaillayanan', compact('pembookingandetail', 'pembookingan', 'daftarjoin', 'instagram', 'twitter', 'youtube', 'facebook'));
    }
}
