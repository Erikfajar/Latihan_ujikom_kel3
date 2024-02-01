<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
//LOAD CONTROLLER
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\DataPenggunaController;
use App\Http\Controllers\Buku\DataBukuController;
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

Route::get('/', function () {
    return view('welcome');
});




