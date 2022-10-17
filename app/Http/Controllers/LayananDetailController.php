<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\KeranjangLayanan;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\sosial_media;
use Illuminate\Support\Facades\DB;

class LayananDetailController extends Controller
{
    //
    public function index($id){
        $layanans = Layanan::find($id);
        $instagram = sosial_media::where('id_sosialmedia',1)->value('hyperlink');
        $twitter = sosial_media::where('id_sosialmedia',2)->value('hyperlink');
        $youtube = sosial_media::where('id_sosialmedia',3)->value('hyperlink');
        $facebook = sosial_media::where('id_sosialmedia',4)->value('hyperlink');
        return view('layout.layanandetail',compact('layanans','instagram','twitter','youtube','facebook'));
    }

    public function simpanpesanan(Request $request){
        $cekpesanan = DB::table('keranjanglayanan')
        ->select('id_layanan')
        ->where('id_customer', '=', auth()->id())
        ->where('id_layanan', '=', $request->id_layanan)
        ->get();

    if (empty(json_decode($cekpesanan))) {
        $keranjang = new KeranjangLayanan();
        $keranjang->id_layanan = $request->input('id_layanan');
        $keranjang->harga = $request->input('tipe_kendaraan');
        $keranjang->id_customer = auth()->id();
        $keranjang->save();
        Alert::success('Success', 'Pesanan Anda berhasil disimpan di Keranjang Layanan!');
    } else {
        Alert::warning('Warning', 'Pemesanan Layanan ini sudah ada di Keranjang Layanan!');
    } 
       
        return redirect()->back();
    }
}
