<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sosial_media;
use RealRashid\SweetAlert\Facades\Alert;

class DaftarSosialMediaController extends Controller
{
    //
    public function index(){
        $sosials = sosial_media::all();
        return view('admin.daftarsosialmedia',compact('sosials'));
    }

    public function update(Request $request, $id_sosialmedia)
    {
        $this->validate(
            $request,
            [
                'hyperlink' => 'required',
            ]
        );
        
        $update = sosial_media::find($id_sosialmedia);
        $update->hyperlink = $request->hyperlink;
        $update->save();
        Alert::success('Success', 'Sosial Media berhasil diubah!');
        return redirect()->back()->with('success', "Sosial Media berhasil diubah!");
    }

    
}
