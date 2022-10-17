<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Testimoni;
use App\Models\sosial_media;
use RealRashid\SweetAlert\Facades\Alert;

class AboutController extends Controller
{
    //
    public function index()
    {
        $instagram = sosial_media::where('id_sosialmedia',1)->value('hyperlink');
        $twitter = sosial_media::where('id_sosialmedia',2)->value('hyperlink');
        $youtube = sosial_media::where('id_sosialmedia',3)->value('hyperlink');
        $facebook = sosial_media::where('id_sosialmedia',4)->value('hyperlink');
        $pesan = DB::table('users')
            ->where('user_id', '=', auth()->id())
            ->get();
        return view('layout.about', compact('pesan','instagram','twitter','youtube','facebook'));
    }

    public function testimoni(Request $request)
    {
        $this->validate(
            $request,
            [
                'judul' => 'required',
                'pesan' => 'required',
            ]
        );
        $testimoni = new Testimoni();
        $testimoni->judul = $request->judul;
        $testimoni->pesan = $request->pesan;
        $testimoni->id_customer = auth()->id();
        $testimoni->status = "Tidak Ditampilkan";
        $testimoni->save();
        Alert::success('Success', 'Ulasan Anda berhasil disampaikan!');
        return redirect('about')->with('success', "Ulasan Anda berhasil disampaikan!");
    }
}
