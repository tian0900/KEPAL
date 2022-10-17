<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\sosial_media;

class LayananController extends Controller
{
    //
    public function index()
    {
        $instagram = sosial_media::where('id_sosialmedia',1)->value('hyperlink');
        $twitter = sosial_media::where('id_sosialmedia',2)->value('hyperlink');
        $youtube = sosial_media::where('id_sosialmedia',3)->value('hyperlink');
        $facebook = sosial_media::where('id_sosialmedia',4)->value('hyperlink');
        return view('layout.layanan', ["layanans" => Layanan::latest()->filter(request(['search']))->get()], compact('instagram','twitter','youtube','facebook'));
    }
}
