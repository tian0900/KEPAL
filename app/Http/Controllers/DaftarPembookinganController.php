<?php

namespace App\Http\Controllers;

use App\Models\PembookinganLayanan;
use App\Models\PembookinganLayananDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DaftarPembookinganController extends Controller
{
    //
    public function index(){ 
        $pembookingans = DB::table('pemesanan')
        ->join('pembookinganlayanan', 'pemesanan.id_pemesanan', '=', 'pembookinganlayanan.id_pemesanan')
        ->join('users', 'users.user_id','=','pembookinganlayanan.id_customer')
        ->select('users.name','pembookinganlayanan.*')
        ->orderBy('created_at', 'desc')
        ->where('status_pembayaran', '=', 'Sudah Bayar')
        ->get();
        return view('admin.daftarpembookingan',compact('pembookingans'));
    }

    public function update(Request $request, $id_pembookinganlayanan){
        $update = PembookinganLayanan::find($id_pembookinganlayanan);
        $update->status = $request->status;
        $update->keterangan = $request->keterangan;
        $update-> save();
        Alert::success('Success', 'Berhasil mengubah status pemesanan!');
        return redirect('daftarpembookingan')->with('success', "Berhasil mengubah status pemesanan!");    

    }

    
    public function detail($id_pembookinganlayanan){
        $pembookingandetail = PembookinganLayananDetail::find($id_pembookinganlayanan);
        $pembookingan = DB::table('pembookinganlayanan')
                    ->join('users', 'users.user_id','=','pembookinganlayanan.id_customer')
                    ->select('pembookinganlayanan.*','users.name','users.nomor_telephone')
                    ->where('pembookinganlayanan.id_pembookinganlayanan','=',$id_pembookinganlayanan)
                    ->get();
        $daftarjoin = DB::table('pembookinganlayanandetail')
                    ->join('pembookinganlayanan', 'pembookinganlayanandetail.id_pembookinganlayanan','=','pembookinganlayanan.id_pembookinganlayanan')
                    ->join('layanan','pembookinganlayanandetail.id_layanan','=','layanan.id_layanan')
                    ->select('pembookinganlayanandetail.*','layanan.*')
                    ->where('pembookinganlayanandetail.id_pembookinganlayanan','=',$id_pembookinganlayanan)
                    ->get();
        return view('admin.daftarpembookingandetail',compact('pembookingandetail','pembookingan','daftarjoin'));
    }

    public function delete($id_pembokinganlayanan)
    {
        $deletelayanan = PembookinganLayanan::find($id_pembokinganlayanan);
        if ($deletelayanan->delete()) {
            Alert::success('Success', 'Berhasil menghapus pesanan!');
            return redirect()->back();
        }
    }
}
