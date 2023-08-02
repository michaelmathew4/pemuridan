<?php

use App\Http\Controllers\MasukController;
use App\Http\Controllers\AdminBerandaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtikelModulController;
use App\Http\Controllers\KcPilihanController;
use App\Http\Controllers\KcPilganController;
use App\Http\Controllers\KetuaKelompokController;
use App\Http\Controllers\KetuaLokasiController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\ShapeController;
use App\Http\Controllers\StudiMinatController;
use App\Http\Controllers\VideoYoutubeController;
use App\Http\Controllers\WilayahController;
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

// Route::get('/', function () {
//   return view('auth/login');
// });

Route::get('/', [MasukController::class, 'halamanMasuk'])->name('loginIndex');
Route::post('/login', [MasukController::class, 'requestMasuk'])->name('loginRequest');
Route::get('/logout', [MasukController::class, 'keluar'])->name('logout');

// Admin
Route::group(['middleware' => ['auth', 'cekRole:SuperAdmin,Admin']], function () {
    
  Route::get('/admin', [AdminBerandaController::class, 'index'])->name('admin');

  Route::resource('/admin/data-wilayah', WilayahController::class);

  Route::resource('/admin/data-lokasi', LokasiController::class);

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

  Route::resource('/admin/data-kontak', PesertaController::class)->parameters([
    'data-peserta' => 'id_peserta'
  ]);
});

//YMP
Route::group(['middleware' => ['auth', 'cekInstitusi:YMP,Admin,SuperAdmin']], function () {
  //Pengurus
  Route::group(['middleware' => ['auth', 'cekRole:Pengurus']], function () {
    Route::get('/ymp/pengurus', function () {
      return view('/ymp/pengurus/index');
    });

    Route::resource('/ymp/pengurus/data-ketua-lokasi', KetuaLokasiController::class,
        ['as' => 'ymp-pengurus']
    );

    Route::resource('/ymp/pengurus/data-ketua-kelompok', KetuaKelompokController::class,
        ['as' => 'ymp-pengurus']
    );

    Route::resource('/ymp/pengurus/data-kontak', PesertaController::class,
        ['as' => 'ymp-pengurus']
    );

  });


  //Ketua Lokasi
  Route::group(['middleware' => ['auth', 'cekRole:Lokasi']], function () {
    Route::get('/ymp/ketua-lokasi', function () {
      return view('/ymp/ketua-lokasi/index');
    });
  });

  //Ketua Kelompok
  Route::group(['middleware' => ['auth', 'cekRole:Kelompok']], function () {
    Route::get('/ymp/ketua-kelompok', function () {
      return view('/ymp/ketua-kelompok/index');
    });
  });
});


//YMP
Route::group(['middleware' => ['auth', 'cekInstitusi:GKP,Admin,SuperAdmin']], function () {
});


