<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
//LOAD CONTROLLER
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\DataPenggunaController;
use App\Http\Controllers\Buku\DataBukuController;
use App\Http\Controllers\Buku\KategoriBukuController;
use App\Http\Controllers\Buku\KategoriBukuRelasiController;
use App\Http\Controllers\Buku\KoleksiPribadiController;
use App\Http\Controllers\Buku\PeminjamanController;
use App\Http\Controllers\Buku\UlasanBukuController;
use App\Http\Controllers\DataUserController;

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

// ROUTE LOGIN
Route::get('', [AuthController::class, 'index'])->name('login');
Route::post('/auth', [AuthController::class, 'auth'])->name('auth');
Route::get('/registrasi', [AuthController::class, 'registrasi'])->name('registrasi');
Route::post('registrasi/auth', [AuthController::class, 'auth_regis'])->name('auth_regis');


// ROUTE SETELAH LOGIN

Route::prefix('dashboard')->group(function(){
    Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
    Route::get('/',[DashboardController::class, 'index'])->name('dashboard');
    Route::resource('data_buku',DataBukuController::class);
    Route::resource('peminjaman',PeminjamanController::class);
    Route::resource('data_user',DataUserController::class);
    Route::post('data_user_confirm/{id}',[DataUserController::class, 'confirm'])->name('data_user_confirm');
    Route::resource('ulasan_buku',UlasanBukuController::class);
    Route::resource('kategori_buku',KategoriBukuController::class);
    Route::resource('koleksi_pribadi',KoleksiPribadiController::class);
    Route::post('koleksi_pribadi/{id}',[KoleksiPribadiController::class,'store'])->name('kolekasi_pribadi_simpan');
    Route::resource('kategori_buku_relasi',KategoriBukuRelasiController::class);
    Route::get('/export_pdf_buku',[DataBukuController::class, 'export_pdf'])->name('export_pdf_data_buku');
    Route::get('/export_pdf_peminjaman',[PeminjamanController::class, 'export_pdf'])->name('export_pdf_peminjaman');
});
