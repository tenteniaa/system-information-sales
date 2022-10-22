<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SSO\SSOController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CetegoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PenjualanDetailController;

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
Route::get('/', [DashboardController::class, 'index']);

Route::resource('/pelanggan', PelangganController::class);
Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
Route::get('/create-pelanggan', [PelangganController::class, 'create'])->name('pelanggan.create');
Route::get('edit{id}-pelanggan/', [PelangganController::class, 'edit'])->name('pelanggan.edit');
Route::get('show{id}-pelanggan/', [PelangganController::class, 'show'])->name('pelanggan.show');
Route::get('/exportpelanggan', [PelangganController::class, 'pelangganexport'])->name('exportpelanggan');

Route::resource('/produk', ProdukController::class);
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/create-produk', [ProdukController::class, 'create'])->name('produk.create');
Route::get('edit{id}-produk/', [ProdukController::class, 'edit'])->name('produk.edit');
Route::get('show{id}-pelanggan/', [ProdukController::class, 'show'])->name('produk.detail');
Route::get('/exportproduk', [ProdukController::class, 'produkexport'])->name('exportproduk');

Route::resource('/supplier', SupplierController::class);
Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
Route::get('create-supplier', [SupplierController::class, 'create'])->name('supplier.create');
Route::get('edit{id}-supplier/', [SupplierController::class, 'edit'])->name('supplier.edit');
Route::get('show{id}-supplier/', [SupplierController::class, 'show'])->name('supplier.show');
Route::get('/exportsupplier', [SupplierController::class, 'supplierexport'])->name('exportsupplier');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

Route::resource('kategori', CetegoryController::class);
// Route::get('/exportkategori', [CetegoryController::class, 'kategoriexport'])->name('kategori');


Route::controller(GoogleController::class)->group(function(){
    Route::get('login/google', 'redirectToGoogle')->name('auth.google');
    Route::get('login/google/callback', 'handleGoogleCallback');
});

Route::resource('/pembelian', PembelianController::class);
Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian.index');
Route::get('/create-pembelian', [PembelianController::class, 'create'])->name('pembelian.create');
Route::get('show{id}-pembelian/', [PembelianController::class, 'show'])->name('pembelian.detail');
Route::get('/exportpembelian', [PembelianController::class, 'pembelianexport'])->name('exportpembelian');

Route::get('/penjualan/data', [PenjualanController::class, 'data'])->name('penjualan.data');
Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
Route::get('/penjualan/{id}', [PenjualanController::class, 'show'])->name('penjualan.show');
Route::delete('/penjualan/{id}', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');
Route::get('/transaksi/baru', [PenjualanController::class, 'create'])->name('transaksi.baru');
Route::post('/transaksi/simpan', [PenjualanController::class, 'store'])->name('transaksi.simpan');
Route::get('/transaksi/selesai', [PenjualanController::class, 'selesai'])->name('transaksi.selesai');
Route::get('/transaksi/nota-kecil', [PenjualanController::class, 'notaKecil'])->name('transaksi.nota_kecil');

Route::get('/exportpenjualan', [PenjualanController::class, 'penjualanexport'])->name('exportpenjualan');

Route::get('/transaksi/{id}/data', [PenjualanDetailController::class, 'data'])->name('transaksi.data');
Route::get('/transaksi/loadform/{diskon}/{total}/{diterima}', [PenjualanDetailController::class, 'loadForm'])->name('transaksi.load_form');
Route::resource('/transaksi', PenjualanDetailController::class);

Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/laporan/data/{awal}/{akhir}', [LaporanController::class, 'data'])->name('laporan.data');

Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
Route::get('/setting/first', [SettingController::class, 'show'])->name('setting.show');
Route::post('/setting', [SettingController::class, 'update'])->name('setting.update');

//ERP Kelompok 2
Route::get('/sso/login',[SSOController::class,'getLogin'])->name('sso.login');
Route::get('/callback',[SSOController::class,'getCallback'])->name('sso.callback');
Route::get('/sso/connect',[SSOController::class,'connectUser'])->name('sso.connect');