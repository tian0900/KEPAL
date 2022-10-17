<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cafe;
use App\Models\KeranjangKafe;
use App\Models\sosial_media;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;


class CafeController extends Controller
{
    //
    public function index()
    {
        $instagram = sosial_media::where('id_sosialmedia', 1)->value('hyperlink');
        $twitter = sosial_media::where('id_sosialmedia', 2)->value('hyperlink');
        $youtube = sosial_media::where('id_sosialmedia', 3)->value('hyperlink');
        $facebook = sosial_media::where('id_sosialmedia', 4)->value('hyperlink');
        $cafes = Cafe::paginate(12)->withQueryString();
        return view('layout.cafe', compact('cafes', 'instagram', 'twitter', 'youtube', 'facebook'));
    }

    public function simpanpesanan(Request $request)
    {
        $this->validate(
            $request,
            [
                'kuantitas' => 'required|numeric|min:1'
            ]
        );

        $cekpesanan = DB::table('keranjangkafe')
            ->select('id_cafe')
            ->where('id_customer', '=', auth()->id())
            ->where('id_cafe', '=', $request->id_kafe)
            ->get();

        if (empty(json_decode($cekpesanan))) {
            $keranjang = new KeranjangKafe();
            $keranjang->id_cafe = $request->input('id_cafe');
            $keranjang->kuantitas = $request->input('kuantitas');
            $keranjang->total = $request->input('kuantitas') * $request->input('harga_cafe');
            $keranjang->id_customer = auth()->id();
            $keranjang->save();
        } else {
            $update = KeranjangKafe::where('id_cafe', '=', $request->id_cafe)->first();
            $update->kuantitas += $request->kuantitas;
            $update->total += $request->kuantitas * $request->harga_cafe;
            $update->save();
        }

        Alert::success('Success', 'Pesanan Anda berhasil disimpan di tambahkan!');

        return redirect()->back();
    }


    public function delete($id_keranjangkafe)
    {
        $delete = KeranjangKafe::find($id_keranjangkafe);
        if ($delete->delete()) {
            Alert::success('Success', 'Pesanan Anda berhasil dihapus!');
            return redirect()->back()->with('success', "Berhasil menghapus pesanan!");
        }
    }

    public function kurang($id_keranjangkafe)
    {
        $kurang = KeranjangKafe::find($id_keranjangkafe);
        $kafe = $kurang->id_cafe;
        $kuantitas = $kurang->kuantitas;
        if ($kuantitas == 1) {
            return $this->delete($id_keranjangkafe);
        }
        $kurangcafes = Cafe::find($kafe);
        $kurang->kuantitas--;
        $kurang->total = $kurang->kuantitas * $kurangcafes->harga_cafe;
        if ($kurang->save()) {
            return redirect()->back();
        }
    }

    public function tambah($id_keranjangkafe)
    {
        $tambah = KeranjangKafe::find($id_keranjangkafe);
        $kafe = $tambah->id_cafe;
        $kuantitas = $tambah->kuantitas;
        $tambahkafes = Cafe::find($kafe);
        $tambah->kuantitas++;
        $tambah->total = $tambah->kuantitas * $tambahkafes->harga_cafe;
        if ($tambah->save()) {
            return redirect()->back();
        }
    }
}
