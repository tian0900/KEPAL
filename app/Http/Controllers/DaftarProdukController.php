<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use RealRashid\SweetAlert\Facades\Alert;

class DaftarProdukController extends Controller
{
    //
    public function index()
    {
        $daftarproduks = Produk::all();
        return view('admin.produk.daftarproduk', compact('daftarproduks'));
    }

    public function tambah()
    {
        return view('admin.produk.tambahdaftarproduk');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'nama' => 'required|unique:produk,nama',
                'harga' => 'required|integer',
                'kategori' => 'required',
                'stok' => 'required|integer',
                'gambar_produk' => 'required',
                'deskripsi' => 'required',
            ]
        );

        $daftarproduk = new Produk();
        $daftarproduk->nama = $request->nama;
        $daftarproduk->harga = $request->harga;
        $daftarproduk->kategori = $request->kategori;
        $daftarproduk->stok = $request->stok;
        $daftarproduk->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar_produk')) {
            $file = $request->file('gambar_produk')->getClientOriginalName();
            $request->file('gambar_produk')->move('gbr_produk', $file);
            $daftarproduk->gambar = $file;
        }
        Alert::success('Success', 'Produk berhasil ditambahkan!');
        $daftarproduk->save();

        return redirect('daftarproduk')->with('success', "Produk berhasil ditambahkan!");
    }

    public function edit($id_produk)
    {
        $editproduks = Produk::find($id_produk);
        return view('admin.produk.editdaftarproduk', compact('editproduks'));
    }

    public function update(Request $request, $id_produk)
    {
        $validatedData = $request->validate(
            [
                'nama' => 'required',
                'harga' => 'required|integer',
                'kategori' => 'required',
                'stok' => 'required|integer',
                'gambar' => 'mimes:jpg,bmp,png',
                'deskripsi' => 'required',

            ]
        );
        $update = Produk::find($id_produk);
        if ($request->hasFile('gambar')) {
            $file = $update->gambar;
            $file = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move('gbr_produk', $file);
            $update->gambar = $file;
        }
        $update->nama = $request->nama;
        $update->harga = $request->harga;
        $update->kategori = $request->kategori;
        $update->stok = $request->stok;
        $update->deskripsi = $request->deskripsi;
        $update->save();
        Alert::success('Success', 'Produk berhasil diubah!');
        return redirect('daftarproduk')->with('success', "Produk berhasil diubah!");
    }

    public function delete($id_produk)
    {
        $deleteproduk = Produk::find($id_produk);
        if ($deleteproduk->delete()) {
            Alert::success('Success', 'Produk berhasil dihapus!');
            return redirect()->back()->with('success', "Produk berhasil dihapus!");
        }
    }
}
