<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\MerkController;
use App\Http\Controllers\Admin\FiturController;
use App\Http\Controllers\Admin\MobilController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TransadminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Front\TransaksiController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\RiwayatController;

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

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/menunggupembayaran', [TransadminController::class, 'menunggu'])->name('menunggupem');
    Route::get('/menunggukonfirmasi', [TransadminController::class, 'menunggukonf'])->name('menunggukonf');
    Route::get('/listTransaksi', [TransadminController::class, 'index'])->name('listtrans');
    Route::get('/pengembalianList', [TransadminController::class, 'list'])->name('listpengembalian');
    Route::get('/detailTransaksi/{id}', [TransadminController::class, 'show'])->name('transshow');
    Route::get('/transaksiKonfirmasi/{id}', [TransadminController::class, 'setStatus'])->name('transstatus');
    Route::get('/detailTransaksiList/{id}', [TransadminController::class, 'showsec'])->name('transshowlist');
    Route::get('/transaksiKonfirmasiKembali/{id}', [TransadminController::class, 'setStatusKembali'])->name('transstatuskemb');
    Route::get('/pengembalian/{id}', [TransadminController::class, 'pengembalian'])->name('pengembalianlist');
    Route::get('/transaksi/exportexcel', [TransadminController::class, 'exportExcel'])->name('exportexcel');
    Route::get('/transaksi/exportpdf', [TransadminController::class, 'exportPDF'])->name('exportpdf');

    Route::resources([
        'kategori' => KategoriController::class,
        'merk' => MerkController::class,
        'fitur' => FiturController::class,
        'mobil' => MobilController::class,
        'transaksi' => TransaksiController::class,
        'user' => UserController::class,
        'banner' => BannerController::class,
    ]);
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail/{slug}', [HomeController::class, 'show'])->name('detail');
Route::get('/kategori/{kategori}', [HomeController::class, 'kategori'])->name('kategori');
Route::get('/sewa_mobil/{id}', [TransaksiController::class, 'create'])->name('sewamobil');
Route::post('/checkout/create/{id}', [TransaksiController::class, 'store'])->name('checkout_create');
Route::get('/checkout/detail/{id}', [TransaksiController::class, 'index'])->name('checkout_detail');
Route::get('/checkout/success/{id}', [TransaksiController::class, 'success'])->name('checkout_success');
Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');
Route::get('/upload/{id}', [RiwayatController::class, 'upload'])->name('upload');
Route::put('/uploadproses/{id}', [RiwayatController::class, 'proses'])->name('uploadproses');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
