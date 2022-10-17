<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\sosial_media;
use RealRashid\SweetAlert\Facades\Alert;

class PembayaranController extends Controller
{
    //
    public function index($id_pemesanan)
    {
        $pesan =  Pemesanan::where('id_pemesanan',$id_pemesanan)->get();
        $instagram = sosial_media::where('id_sosialmedia', 1)->value('hyperlink');
        $twitter = sosial_media::where('id_sosialmedia', 2)->value('hyperlink');
        $youtube = sosial_media::where('id_sosialmedia', 3)->value('hyperlink');
        $facebook = sosial_media::where('id_sosialmedia', 4)->value('hyperlink');
        return view('layout.pembayaran', compact('pesan', 'instagram', 'twitter', 'youtube', 'facebook'));
    }

    public function store(Request $request, $id_pemesanan)
    {
        $this ->validate($request, 
            [
                'bukti_pembayaran' => 'required|mimes:jpeg,jpg,png,gif'
            ]
        );
        $update = Pemesanan::find($id_pemesanan);
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran')->getClientOriginalName();
            $request->file('bukti_pembayaran')->move('gbr_bukti_pembayaran', $file);
            $update->bukti_pembayaran = $file;
        }
        $update->status_pembayaran = "Sudah Bayar";
        $update->save();
        Alert::success('Success', 'Pemesanan berhasil dibayar');
        return redirect('statuspesanan');
    }
}
