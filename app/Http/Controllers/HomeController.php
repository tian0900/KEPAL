<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Layanan;
use App\Models\sosial_media;
use App\Models\Galeri;
use App\Models\Testimoni;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $carousels = Galeri::inRandomOrder()->limit(8)->get();
        $status = "Tampilkan";
        $produks = Produk::inRandomOrder()->limit(8)->get();
        $layanans = Layanan::inRandomOrder()->limit(8)->get();
        $galeris =  Galeri::all();
        $instagram = sosial_media::where('id_sosialmedia',1)->value('hyperlink');
        $twitter = sosial_media::where('id_sosialmedia',2)->value('hyperlink');
        $youtube = sosial_media::where('id_sosialmedia',3)->value('hyperlink');
        $facebook = sosial_media::where('id_sosialmedia',4)->value('hyperlink');
        $testimonis = DB::table('testimoni')
        ->join('users', 'testimoni.id_customer', '=', 'users.user_id')
        ->where('testimoni.status','=', $status)
        ->get();
        return view('layout.home',compact('produks','layanans','galeris','testimonis','carousels','instagram','twitter','youtube','facebook'));
    }

    public function sosial_media(){
        $Instagrams = sosial_media::where('id_sosialmedia',1)->first();
        return view('layout.footer',compact('instagrams'));
    }
}
