<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemesananProduk;
use App\Models\PemesananProdukDetail;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DaftarPemesananController extends Controller
{
    //
    public function index(){ 
        $pemesanans = DB::table('pemesanan')
        ->join('pemesananproduk', 'pemesanan.id_pemesanan', '=', 'pemesananproduk.id_pemesanan')
        ->join('users', 'users.user_id','=','pemesananproduk.id_customer')
        ->select('users.name','pemesananproduk.*')
        ->orderBy('created_at', 'desc')
        ->where('status_pembayaran', '=', 'Sudah Bayar')
        ->get();
        return view('admin.daftarpemesanan',compact('pemesanans'));
    }

    public function update(Request $request, $id_pemesananproduk){
        $update = PemesananProduk::find($id_pemesananproduk);
        $update->status = $request->status;
        $update->keterangan = $request->keterangan;
        $update-> save();
        Alert::success('Success', 'Berhasil mengubah status pemesanan!');
        return redirect('daftarpemesanan')->with('success', "Berhasil mengubah status pemesanan!");  

    }

    public function detail($id_pemesananproduk){
        $pemesanandetail = PemesananProdukDetail::find($id_pemesananproduk);
        $pemesanan = DB::table('pemesananproduk')
                    ->join('users', 'users.user_id','=','pemesananproduk.id_customer')
                    ->select('pemesananproduk.*','users.name','users.nomor_telephone')
                    ->where('pemesananproduk.id_pemesananproduk','=',$id_pemesananproduk)
                    ->get();
        $daftarjoin = DB::table('pemesananprodukdetail')
                    ->join('pemesananproduk', 'pemesananprodukdetail.id_pemesananproduk','=','pemesananproduk.id_pemesananproduk')
                    ->join('produk','pemesananprodukdetail.id_produk','=','produk.id_produk')
                    ->select('pemesananprodukdetail.*','produk.*')
                    ->where('pemesananprodukdetail.id_pemesananproduk','=',$id_pemesananproduk)
                    ->get();
        return view('admin.daftarpemesanandetail',compact('pemesanandetail','pemesanan','daftarjoin'));
    }


    public function delete($id_pemesananproduk)
    {
        $deletepemesanan = PemesananProduk::find($id_pemesananproduk);
        if ($deletepemesanan->delete()) {
            Alert::success('Success', 'Berhasil menghapus pesanan!');
            return redirect()->back()->with('success', "Berhasil menghapus pemesanan!");
        }
    }
}
