<?php

namespace App\Http\Controllers;

use App\Models\PemesananKafeDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DaftarPemesananKafeController extends Controller
{
    //
    public function index(){ 
        $pemesanans = DB::table('pemesanan')
        ->join('pemesanankafe', 'pemesanan.id_pemesanan', '=', 'pemesanankafe.id_pemesanan')
        ->join('users', 'users.user_id','=','pemesanankafe.id_customer')
        ->select('users.name','pemesanankafe.*')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('admin.daftarpemesanankafe',compact('pemesanans'));
    }

    public function detail($id_pemesanankafe){
        $pemesanandetail = PemesananKafeDetail::find($id_pemesanankafe);
        $pemesanan = DB::table('pemesanankafedetail')
                    ->join('pemesanankafe', 'pemesanankafedetail.id_pemesanankafe','=','pemesanankafe.id_pemesanankafe')
                    ->join('cafe','pemesanankafedetail.id_cafe','=','cafe.id_cafe')
                    ->select('pemesanankafedetail.*','cafe.*')
                    ->where('pemesanankafedetail.id_pemesanankafe','=',$id_pemesanankafe)
                    ->get();
        return view('admin.daftarpemesanankafedetail',compact('pemesanandetail','pemesanan'));
    }

}
