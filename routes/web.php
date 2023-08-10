<?php

use App\Http\Controllers\MasukController;
use App\Http\Controllers\AdminBerandaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtikelModulController;
use App\Http\Controllers\KcPilihanController;
use App\Http\Controllers\KcPilganController;
use App\Http\Controllers\DataLembagaController;
use App\Http\Controllers\KetuaLokasiController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\PesertaController;
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

  Route::resource('/admin/data-lokasi', LokasiController::class);

  Route::resource('/admin/artikel-modul', ArtikelModulController::class);

  Route::resource('/admin/video', VideoYoutubeController::class);

  Route::resource('/admin/shape', KcPilganController::class);

  Route::resource('/admin/pekerjaan', PekerjaanController::class);

  Route::resource('/admin/studi-minat', StudiMinatController::class);

  Route::resource('/admin/kolom-pilihan', KcPilihanController::class);

  Route::resource('/admin/data-admin', AdminController::class);

  Route::resource('/admin/data-pengurus', PengurusController::class);

  Route::resource('/admin/data-ketua-lokasi', KetuaLokasiController::class);

  Route::resource('/admin/data-lembaga', DataLembagaController::class);

  Route::resource('/admin/data-kontak', PesertaController::class)->parameters([
    'data-peserta' => 'id_peserta'
  ]);
});



//PM
Route::group(['middleware' => ['auth', 'cekInstitusi:PM,Admin,SuperAdmin']], function () {
  //Pengurus
  Route::group(['middleware' => ['auth', 'cekRole:Pengurus']], function () {
    Route::get('/ymp/pengurus', function () {
      return view('/ymp/pengurus/index');
    })->name('berandaPengurusPM');

    //Ketua Lokasi
    Route::get('/ymp/pengurus/data-ketua-lokasi', [KetuaLokasiController::class, 'indexPengurusPM'])
          ->name('data-ketua-lokasi.indexPengurusPM');

    Route::post('/ymp/pengurus/data-ketua-lokasi', [KetuaLokasiController::class, 'storePengurusPM'])
          ->name('data-ketua-lokasi.storePengurusPM');
    
    Route::put('/ymp/pengurus/data-ketua-lokasi/{data_ketua_lokasi}', [KetuaLokasiController::class, 'updatePengurusPM'])
          ->name('data-ketua-lokasi.updatePengurusPM');

    Route::delete('/ymp/pengurus/data-ketua-lokasi/{data_ketua_lokasi}', [KetuaLokasiController::class, 'destroyPengurusPM'])
          ->name('data-ketua-lokasi.destroyPengurusPM');
    
    //Ketua Kelompok
    Route::get('/ymp/pengurus/data-lembaga', [DataLembagaController::class, 'indexPengurusPM'])
          ->name('data-lembaga.indexPengurusPM');

    Route::post('/ymp/pengurus/data-lembaga', [DataLembagaController::class, 'storePengurusPM'])
          ->name('data-lembaga.storePengurusPM');
    
    Route::put('/ymp/pengurus/data-lembaga/{data_ketua_kelompok}', [DataLembagaController::class, 'updatePengurusPM'])
          ->name('data-lembaga.updatePengurusPM');

    Route::delete('/ymp/pengurus/data-lembaga/{data_ketua_kelompok}', [DataLembagaController::class, 'destroyPengurusPM'])
          ->name('data-lembaga.destroyPengurusPM');

    //Data Kontak
    Route::get('/ymp/pengurus/data-kontak', [PesertaController::class, 'indexPengurusPM'])
          ->name('data-kontak.indexPengurusPM');

    Route::post('/ymp/pengurus/data-kontak', [PesertaController::class, 'storePengurusPM'])
          ->name('data-kontak.storePengurusPM');
    
    Route::put('/ymp/pengurus/data-kontak/{data_peserta}', [PesertaController::class, 'updatePengurusPM'])
          ->name('data-kontak.updatePengurusPM');

    Route::delete('/ymp/pengurus/data-kontak/{data_peserta}', [PesertaController::class, 'destroyPengurusPM'])
          ->name('data-kontak.destroyPengurusPM');
  });
  //Ketua Lokasi
  Route::group(['middleware' => ['auth', 'cekRole:Lokasi']], function () {
    Route::get('/ymp/ketua-lokasi', function () {
      return view('/ymp/ketua-lokasi/index');
    })->name('berandaKetuaLokasiPM');
    
    //Ketua Kelompok
    Route::get('/ymp/ketua-lokasi/data-lembaga', [DataLembagaController::class, 'indexKetuaLokasiPM'])
          ->name('data-lembaga.indexKetuaLokasiPM');

    Route::post('/ymp/ketua-lokasi/data-lembaga', [DataLembagaController::class, 'storeKetuaLokasiPM'])
          ->name('data-lembaga.storeKetuaLokasiPM');
    
    Route::put('/ymp/ketua-lokasi/data-lembaga/{data_ketua_kelompok}', [DataLembagaController::class, 'updateKetuaLokasiPM'])
          ->name('data-lembaga.updateKetuaLokasiPM');

    Route::delete('/ymp/ketua-lokasi/data-lembaga/{data_ketua_kelompok}', [DataLembagaController::class, 'destroyKetuaLokasiPM'])
          ->name('data-lembaga.destroyKetuaLokasiPM');

    //Data Kontak
    Route::get('/ymp/ketua-lokasi/data-kontak', [PesertaController::class, 'indexKetuaLokasiPM'])
          ->name('data-kontak.indexKetuaLokasiPM');

    Route::post('/ymp/ketua-lokasi/data-kontak', [PesertaController::class, 'storeKetuaLokasiPM'])
          ->name('data-kontak.storeKetuaLokasiPM');
    
    Route::put('/ymp/ketua-lokasi/data-kontak/{data_peserta}', [PesertaController::class, 'updateKetuaLokasiPM'])
          ->name('data-kontak.updateKetuaLokasiPM');

    Route::delete('/ymp/ketua-lokasi/data-kontak/{data_peserta}', [PesertaController::class, 'destroyKetuaLokasiPM'])
          ->name('data-kontak.destroyKetuaLokasiPM');
  });

  //Ketua Kelompok
  Route::group(['middleware' => ['auth', 'cekRole:Ketua Kelompok']], function () {
    Route::get('/ymp/lembaga', function () {
      return view('/ymp/lembaga/index');
    })->name('berandaDataLembagaPM');

    Route::get('/ymp/lembaga/kelompok', function () {
      return view('/ymp/lembaga/kelompok');
    })->name('kelompokDataLembagaPM');
    
    //Data Kontak
    Route::get('/ymp/lembaga/data-kontak', [PesertaController::class, 'indexDataLembagaPM'])
          ->name('data-kontak.indexDataLembagaPM');

    Route::post('/ymp/lembaga/data-kontak', [PesertaController::class, 'storeDataLembagaPM'])
          ->name('data-kontak.storeDataLembagaPM');

    Route::get('/ymp/lembaga/data-kontak/{data_peserta}', [PesertaController::class, 'showDataLembagaPM'])
          ->name('data-kontak.showDataLembagaPM');
    
    Route::put('/ymp/lembaga/data-kontak/{data_peserta}', [PesertaController::class, 'updateDataLembagaPM'])
          ->name('data-kontak.updateDataLembagaPM');

    Route::delete('/ymp/lembaga/data-kontak/{data_peserta}', [PesertaController::class, 'destroyDataLembagaPM'])
          ->name('data-kontak.destroyDataLembagaPM');
  });
});