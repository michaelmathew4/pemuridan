<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtikelModulController;
use App\Http\Controllers\KcPilihanController;
use App\Http\Controllers\KcPilganController;
use App\Http\Controllers\KetuaKelompokController;
use App\Http\Controllers\KetuaLokasiController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\ShapeController;
use App\Http\Controllers\StudiMinatController;
use App\Http\Controllers\VideoYoutubeController;
use Illuminate\Support\Facades\Route;

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
  return view('auth/login');
});

// Admin
Route::get('/admin', function () {
  return view('admin/index');
});
Route::get('/admin/data-wilayah', function () {
  return view('admin/data-wilayah');
});
Route::get('/admin/data-lokasi', function () {
  return view('admin/data-lokasi');
});

Route::resource('/admin/artikel-modul', ArtikelModulController::class);

Route::resource('/admin/video', VideoYoutubeController::class);

Route::resource('/admin/shape', ShapeController::class);

Route::resource('/admin/pekerjaan', PekerjaanController::class);

Route::resource('/admin/studi-minat', StudiMinatController::class);

Route::resource('/admin/kolom-pilihan', KcPilihanController::class);

Route::resource('/admin/kolom-pilihan-ganda', KcPilganController::class);

Route::resource('/admin/data-admin', AdminController::class);

Route::resource('/admin/data-pengurus', PengurusController::class);

Route::resource('/admin/data-ketua-lokasi', KetuaLokasiController::class);

Route::resource('/admin/data-ketua-kelompok', KetuaKelompokController::class);

Route::get('/admin/data-peserta', function () {
  return view('admin/data-peserta');
});

//Pengurus
Route::get('/pengurus', function () {
  return view('pengurus/index');
});

