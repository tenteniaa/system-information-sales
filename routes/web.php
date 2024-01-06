<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PenjualanDetailController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SettingController;

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

Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
Route::get('/pelanggan-create', [PelangganController::class, 'create'])->name('pelanggan.create');
Route::post('/pelanggan-store', [PelangganController::class, 'store'])->name('pelanggan.store');
Route::get('/pelanggan-edit/{id}', [PelangganController::class, 'edit'])->name('pelanggan.edit');
Route::post('/pelanggan-update/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
Route::get('/pelanggan-show/{id}', [PelangganController::class, 'show'])->name('pelanggan.show');
Route::post('/pelanggan-destroy/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');
Route::get('/exportpelanggan', [PelangganController::class, 'export'])->name('pelanggan.export');

Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori-create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori-store', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori-edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::post('/kategori-update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::post('/kategori-destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk-create', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk-store', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk-edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
Route::post('/produk-update/{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::get('/produk-show/{id}', [ProdukController::class, 'show'])->name('produk.show');
Route::post('/produk-destroy/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
Route::get('/exportproduk', [ProdukController::class, 'export'])->name('produk.export');

Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
Route::get('/supplier-create', [SupplierController::class, 'create'])->name('supplier.create');
Route::post('/supplier-store', [SupplierController::class, 'store'])->name('supplier.store');
Route::get('/supplier-edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
Route::post('/supplier-update/{id}', [SupplierController::class, 'update'])->name('supplier.update');
Route::get('/supplier-show/{id}', [SupplierController::class, 'show'])->name('supplier.show');
Route::post('/supplier-destroy/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
Route::get('/exportsupplier', [SupplierController::class, 'export'])->name('supplier.export');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

Route::controller(GoogleController::class)->group(function(){
    Route::get('login/google', 'redirectToGoogle')->name('auth.google');
    Route::get('login/google/callback', 'handleGoogleCallback');
});

Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian.index');
Route::get('/pembelian-create', [PembelianController::class, 'create'])->name('pembelian.create');
Route::post('/pembelian-store', [PembelianController::class, 'store'])->name('pembelian.store');
Route::get('/pembelian-edit/{id}', [PembelianController::class, 'edit'])->name('pembelian.edit');
Route::post('/pembelian-update/{id}', [PembelianController::class, 'update'])->name('pembelian.update');
Route::get('/pembelian-show/{id}', [PembelianController::class, 'show'])->name('pembelian.show');
Route::post('/pembelian-destroy/{id}', [PembelianController::class, 'destroy'])->name('pembelian.destroy');
Route::get('/exportpembelian', [PembelianController::class, 'export'])->name('pembelian.export');

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

Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
Route::get('/setting/first', [SettingController::class, 'show'])->name('setting.show');
Route::post('/setting', [SettingController::class, 'update'])->name('setting.update');

Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/laporan/data/{awal}/{akhir}', [LaporanController::class, 'data'])->name('laporan.data');
