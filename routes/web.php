<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BuatPesananController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProdukDetailController;
use App\Http\Controllers\LayananDetailController;
use App\Http\Controllers\CheckoutProdukController;
use App\Http\Controllers\CheckoutLayananController;
use App\Http\Controllers\StatusPesananController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DaftarProdukController;
use App\Http\Controllers\DaftarLayananController;
use App\Http\Controllers\DaftarCafeController;
use App\Http\Controllers\DaftarPemesananController;
use App\Http\Controllers\DaftarPembookinganController;
use App\Http\Controllers\DaftarSosialMediaController;
use App\Http\Controllers\DaftarGaleriController;
use App\Http\Controllers\DaftarPemesananAdminController;
use App\Http\Controllers\DaftarPemesananKafeController;
use App\Http\Controllers\DaftarTestimoniController;
use App\Http\Controllers\PembayaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);
Route::get('/verification', [UserController::class, 'verification']);
Route::post('/postverification', [UserController::class, 'postverification'])->name('postverification');
Route::get('/sosial_media', [HomeController::class, 'sosial_media']);
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/layanan', [LayananController::class, 'index']);
Route::get('/cafe', [CafeController::class, 'index']);
Route::get('/gallery', [GalleryController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::post('/testimoni', [AboutController::class, 'testimoni'])->name('testimoni');
Route::get('/produk/detail/{id_produk}', [ProdukDetailController::class, 'index']);    
Route::get('/layanan/detail/{id_layanan}', [LayananDetailController::class, 'index']);
Route::group(['middleware' => ['auth']], function () {
    Route::post('/testimoni', [AboutController::class, 'testimoni'])->name('testimoni');
    
    Route::post('pesan/produk', [ProdukDetailController::class, 'simpanpesanan'])->name('pesan.produk');

    Route::post('pesan/layanan', [LayananDetailController::class, 'simpanpesanan'])->name('pesan.layanan');

    Route::post('pesan/kafe', [CafeController::class, 'simpanpesanan'])->name('pesan.kafe');
    Route::get('kafe/delete/{id}', [CafeController::class, 'delete'])->name('kafe.delete');
    Route::get('kafe/kurang/{id}', [CafeController::class, 'kurang'])->name('kafe.kurang');
    Route::get('kafe/tambah/{id}', [CafeController::class, 'tambah'])->name('kafe.tambah');

    Route::get('/checkout/produk/{id_customer}', [CheckoutProdukController::class, 'index']);
    Route::get('checkout/delete/{id}', [CheckoutProdukController::class, 'delete'])->name('checkout.delete');
    Route::post('checkout/storepemesanan', [CheckoutProdukController::class, 'storepemesananproduk'])->name('checkout.storepemesananproduk');
    Route::get('checkout/kurang/{id}', [CheckoutProdukController::class, 'kurang'])->name('checkout.kurang');
    Route::get('checkout/tambah/{id}', [CheckoutProdukController::class, 'tambah'])->name('checkout.tambah');

    Route::get('/buatpesanan', [BuatPesananController::class, 'index']);
    Route::post('buatpesanan/store', [BuatPesananController::class, 'store'])->name('checkout.storepemesanan');

    Route::get('/pembayaran/{id}', [PembayaranController::class, 'index']);
    Route::post('pembayaran/store/{id}', [PembayaranController::class, 'store'])->name('pembayaran.store');

    Route::get('/checkout/layanan/{id_customer}', [CheckoutLayananController::class, 'index']);
    Route::get('checkout/deletelayanan/{id}', [CheckoutLayananController::class, 'delete'])->name('checkout.deletelayanan');
    Route::post('checkout/storepembookingan', [CheckoutLayananController::class, 'storepembookinganlayanan'])->name('checkout.storepembookinganlayanan');

    Route::get('/statuspesanan', [StatusPesananController::class, 'index']);
    Route::get('/statuspesanan/detail/{id}', [StatusPesananController::class, 'detail']);
    Route::post('statuspesanan/update/{id_produk}', [StatusPesananController::class, 'update'])->name('statuspesanan.update');
    Route::get('/statuspesananlayanan/detail/{id}', [StatusPesananController::class, 'detaillayanan']);
});
// ADMIN
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/daftarproduk', [DaftarProdukController::class, 'index']);
    Route::get('/daftarproduk/tambah', [DaftarProdukController::class, 'tambah']);
    Route::post('daftarproduk/store', [DaftarProdukController::class, 'store'])->name('daftarproduk.store');
    Route::get('/daftarproduk/edit/{id_produk}', [DaftarProdukController::class, 'edit']);
    Route::post('daftarproduk/update/{id_produk}', [DaftarProdukController::class, 'update'])->name('daftarproduk.update');
    Route::get('daftarproduk/delete/{id_produk}', [DaftarProdukController::class, 'delete']);

    Route::get('/daftarlayanan', [DaftarLayananController::class, 'index']);
    Route::get('/daftarlayanan/tambah', [DaftarLayananController::class, 'tambah']);
    Route::post('daftarlayanan/store', [DaftarLayananController::class, 'store'])->name('daftarlayanan.store');
    Route::get('/daftarlayanan/edit/{id_layanan}', [DaftarLayananController::class, 'edit']);
    Route::post('daftarlayanan/update/{id_layanan}', [DaftarLayananController::class, 'update'])->name('daftarlayanan.update');
    Route::get('daftarlayanan/delete/{id_layanan}', [DaftarLayananController::class, 'delete'])->name('daftarlayanan.delete');

    Route::get('/daftarcafe', [DaftarCafeController::class, 'index']);
    Route::get('/daftarcafe/tambah', [DaftarCafeController::class, 'tambah']);
    Route::post('daftarcafe/store', [DaftarCafeController::class, 'store'])->name('daftarcafe.store');
    Route::get('/daftarcafe/edit/{id_cafe}', [DaftarCafeController::class, 'edit']);
    Route::post('daftarcafe/update/{id_cafe}', [DaftarCafeController::class, 'update'])->name('daftarcafe.update');
    Route::get('daftarcafe/delete/{id_cafe}', [DaftarCafeController::class, 'delete'])->name('daftarcafe.delete');

    Route::get('/daftarpemesananadmin', [DaftarPemesananAdminController::class, 'index']);
    Route::get('/daftarpemesananadmin/tambah', [DaftarPemesananAdminController::class, 'tambah']);
    Route::post('daftarpemesananadmin/store', [DaftarPemesananAdminController::class, 'store'])->name('pemesananadmin.store');

    Route::get('/daftarpemesanan', [DaftarPemesananController::class, 'index']);
    Route::post('daftarpemesanan/{id}', [DaftarpemesananController::class, 'update'])->name('daftarpemesanan.update');
    Route::get('pemesanandetail/{id_pemesanan}', [DaftarpemesananController::class, 'detail']);
    Route::get('daftarpemesanan/delete/{id}', [DaftarpemesananController::class, 'delete'])->name('daftarpemesanan.delete');

    Route::get('/daftarpembookingan', [DaftarPembookinganController::class, 'index']);
    Route::post('daftarpembookingan/{id}', [DaftarPembookinganController::class, 'update'])->name('daftarpembookingan.update');
    Route::get('pembookingandetail/{id_pembookingan}', [DaftarPembookinganController::class, 'detail']);
    Route::get('daftarpembokinganlayanan/delete/{id}', [DaftarPembookinganController::class, 'delete'])->name('daftarpembookinganlayanan.delete');

    Route::get('/daftarpemesanankafe', [DaftarPemesananKafeController::class, 'index']);
    Route::get('/daftarpemesanankafe/{id}', [DaftarPemesananKafeController::class, 'detail']);

    Route::get('/daftarsosialmedia', [DaftarSosialMediaController::class, 'index']);
    Route::post('daftarsosialmedia/{id}', [DaftarSosialMediaController::class, 'update'])->name('daftarsosialmedia.update');

    Route::get('/daftargaleri', [DaftarGaleriController::class, 'index']);
    Route::get('/daftargaleri/tambah', [DaftarGaleriController::class, 'tambah']);
    Route::post('daftargaleri/store', [DaftarGaleriController::class, 'store'])->name('daftargaleri.store');
    Route::get('/daftargaleri/edit/{id_galeri}', [DaftarGaleriController::class, 'edit']);
    Route::post('daftargaleri/update/{id_galeri}', [DaftarGaleriController::class, 'update'])->name('daftargaleri.update');
    Route::get('daftargaleri/delete/{id_galeri}', [DaftarGaleriController::class, 'delete']);

    Route::get('/daftartestimoni', [DaftarTestimoniController::class, 'index']);
    Route::get('daftartestimoni/delete/{id}', [DaftarTestimoniController::class, 'delete']);
    Route::post('daftartestimoni/update/{id}', [DaftarTestimoniController::class, 'update'])->name('daftartestimoni.update');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
