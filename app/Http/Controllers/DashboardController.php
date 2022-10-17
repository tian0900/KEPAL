<?php

namespace App\Http\Controllers;

use App\Models\PembookinganLayanan;
use App\Models\PemesananProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    //
    public function index()
    {
        $users = DB::table('users')->count();
        $pemesanans = DB::table('pemesananproduk')->where('status', '=', "Selesai")->count();
        $pembookingans = DB::table('pembookinganlayanan')->where('status', '=', "Diterima")->count();
        $kafes = DB::table('pemesanankafe')->count();
        $category[] = ['January', 'February', 'March', 'April', 'May', 'June', 'Julu', 'August', 'September', 'October', 'November', 'December'];
        $totalpemesanan = PemesananProduk::select(
            DB::raw('sum(total_pembayaran) as total'),
        )->groupBy(DB::raw("DATE_FORMAT(tanggal_pemesanan,'%M')"))
            ->get();

        $pemesananss = PemesananProduk::all();


        $bulan1 = PemesananProduk::select(
            DB::raw("DATE_FORMAT(tanggal_pemesanan,'%M') as months"),
        )->where('status', '=', "Selesai")
            ->orderBy(DB::raw("Month(tanggal_pemesanan)"), 'asc')
            ->groupBy('months')
            ->pluck('months');

        $data1 =  PemesananProduk::select(
            DB::raw('sum(total_pembayaran) as total'),
        )->where('status', '=', "Selesai")
            ->groupBy(DB::raw("DATE_FORMAT(tanggal_pemesanan,'%M')"))
            ->pluck('total');


        $bulan2 = PembookinganLayanan::select(
            DB::raw("DATE_FORMAT(tanggal_pembookingan,'%M') as months"),
        )->where('status', '=', "Diterima")
            ->orderBy(DB::raw("Month(tanggal_pembookingan)"), 'asc')
            ->groupBy('months')
            ->pluck('months');

        $data2 =  PembookinganLayanan::select(
            DB::raw('sum(total_pembayaran) as total'),
        )->where('status', '=', "Diterima")
            ->groupBy(DB::raw("DATE_FORMAT(tanggal_pembookingan,'%M')"))
            ->pluck('total');



        return view('admin.dashboard', compact('users', 'pemesanans', 'pembookingans', 'kafes','bulan1', 'data1', 'bulan2', 'data2', 'category'));
    }
}
