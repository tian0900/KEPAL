<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cafe;
use RealRashid\SweetAlert\Facades\Alert;

class DaftarCafeController extends Controller
{
    //
    public function index()
    {
        $daftarcafes = Cafe::all();
        return view('admin.cafe.daftarcafe', compact('daftarcafes'));
    }

    public function tambah()
    {
        return view('admin.cafe.tambahdaftarcafe');
    }

    public function store(Request $request)
    {
        $this ->validate($request, 
        [
            'nama' => 'required',
            'harga_cafe' => 'required',
            'kategori' => 'required'
        ]
    );
        $daftarcafe = new Cafe();
        $daftarcafe->nama = $request->nama;
        $daftarcafe->harga_cafe = $request->harga_cafe;
        $daftarcafe->kategori = $request->kategori;
        $daftarcafe->save();
        Alert::success('Success', 'Menu Kafe berhasil ditambahkan!');
        return redirect('daftarcafe')->with('success', "Menu Cafe berhasil ditambahkan!");
    }

    public function edit($id_cafe)
    {
        $editcafes = Cafe::find($id_cafe);
        return view('admin.cafe.editdaftarcafe', compact('editcafes'));
    }

    public function update(Request $request, $id_cafe)
    {
        $this ->validate($request, 
        [
            'nama' => 'required',
            'harga_cafe' => 'required',
            'kategori' => 'required'
        ]);

        $update = cafe::find($id_cafe);
        $update->nama = $request->nama;
        $update->harga_cafe = $request->harga_cafe;
        $update->kategori = $request->kategori;
        $update->save();
        Alert::success('Success', 'Menu Kafe berhasil diubah!');
        return redirect('daftarcafe')->with('success', "Menu Cafe berhasil diubah!");
    }

    public function delete($id_cafe)
    {
        $deletecafe = Cafe::find($id_cafe);
        if ($deletecafe->delete()) {
            Alert::success('Success', 'Menu Kafe berhasil dihapus!');
            return redirect()->back()->with('success', "Menu Cafe berhasil dihapus!");
        }
    }
}
