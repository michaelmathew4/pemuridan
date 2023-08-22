<?php

use App\Http\Controllers\MasukController;
use App\Http\Controllers\AdminBerandaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtikelModulController;
use App\Http\Controllers\KcPilihanController;
use App\Http\Controllers\KcPilganController;
use App\Http\Controllers\KelompokController;
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
    Route::get('/parousia-ministry/pengurus', function () {
      return view('/parousia-ministry/pengurus/index');
    })->name('berandaPengurusPM');

    //Ketua Lokasi
    Route::get('/parousia-ministry/pengurus/data-ketua-lokasi', [KetuaLokasiController::class, 'indexPengurusPM'])
          ->name('data-ketua-lokasi.indexPengurusPM');

    Route::post('/parousia-ministry/pengurus/data-ketua-lokasi', [KetuaLokasiController::class, 'storePengurusPM'])
          ->name('data-ketua-lokasi.storePengurusPM');
    
    Route::put('/parousia-ministry/pengurus/data-ketua-lokasi/{data_ketua_lokasi}', [KetuaLokasiController::class, 'updatePengurusPM'])
          ->name('data-ketua-lokasi.updatePengurusPM');

    Route::delete('/parousia-ministry/pengurus/data-ketua-lokasi/{data_ketua_lokasi}', [KetuaLokasiController::class, 'destroyPengurusPM'])
          ->name('data-ketua-lokasi.destroyPengurusPM');
    //End Ketua Lokasi
    
    //Ketua Kelompok
    Route::get('/parousia-ministry/pengurus/data-lembaga', [DataLembagaController::class, 'indexPengurusPM'])
          ->name('data-lembaga.indexPengurusPM');

    Route::post('/parousia-ministry/pengurus/data-lembaga', [DataLembagaController::class, 'storePengurusPM'])
          ->name('data-lembaga.storePengurusPM');
    
    Route::put('/parousia-ministry/pengurus/data-lembaga/{data_ketua_kelompok}', [DataLembagaController::class, 'updatePengurusPM'])
          ->name('data-lembaga.updatePengurusPM');

    Route::delete('/parousia-ministry/pengurus/data-lembaga/{data_ketua_kelompok}', [DataLembagaController::class, 'destroyPengurusPM'])
          ->name('data-lembaga.destroyPengurusPM');
    //End Ketua Kelompok

    //Data Kontak
    Route::get('/parousia-ministry/pengurus/data-kontak', [PesertaController::class, 'indexPengurusPM'])
          ->name('data-kontak.indexPengurusPM');

    Route::post('/parousia-ministry/pengurus/data-kontak', [PesertaController::class, 'storePengurusPM'])
          ->name('data-kontak.storePengurusPM');
    
    Route::put('/parousia-ministry/pengurus/data-kontak/{data_peserta}', [PesertaController::class, 'updatePengurusPM'])
          ->name('data-kontak.updatePengurusPM');

    Route::delete('/parousia-ministry/pengurus/data-kontak/{data_peserta}', [PesertaController::class, 'destroyPengurusPM'])
          ->name('data-kontak.destroyPengurusPM');
    //End Data Kontak
  });
  //End Pengurus

  //Ketua Lokasi
  Route::group(['middleware' => ['auth', 'cekRole:Lokasi']], function () {
    Route::get('/parousia-ministry/ketua-lokasi', function () {
      return view('/parousia-ministry/ketua-lokasi/index');
    })->name('berandaKetuaLokasiPM');
    
    //Ketua Kelompok
    Route::get('/parousia-ministry/ketua-lokasi/data-lembaga', [DataLembagaController::class, 'indexKetuaLokasiPM'])
          ->name('data-lembaga.indexKetuaLokasiPM');

    Route::post('/parousia-ministry/ketua-lokasi/data-lembaga', [DataLembagaController::class, 'storeKetuaLokasiPM'])
          ->name('data-lembaga.storeKetuaLokasiPM');
    
    Route::put('/parousia-ministry/ketua-lokasi/data-lembaga/{data_ketua_kelompok}', [DataLembagaController::class, 'updateKetuaLokasiPM'])
          ->name('data-lembaga.updateKetuaLokasiPM');

    Route::delete('/parousia-ministry/ketua-lokasi/data-lembaga/{data_ketua_kelompok}', [DataLembagaController::class, 'destroyKetuaLokasiPM'])
          ->name('data-lembaga.destroyKetuaLokasiPM');
    //End Ketua Kelompok

    //Data Kontak
    Route::get('/parousia-ministry/ketua-lokasi/data-kontak', [PesertaController::class, 'indexKetuaLokasiPM'])
          ->name('data-kontak.indexKetuaLokasiPM');

    Route::post('/parousia-ministry/ketua-lokasi/data-kontak', [PesertaController::class, 'storeKetuaLokasiPM'])
          ->name('data-kontak.storeKetuaLokasiPM');
    
    Route::put('/parousia-ministry/ketua-lokasi/data-kontak/{data_peserta}', [PesertaController::class, 'updateKetuaLokasiPM'])
          ->name('data-kontak.updateKetuaLokasiPM');

    Route::delete('/parousia-ministry/ketua-lokasi/data-kontak/{data_peserta}', [PesertaController::class, 'destroyKetuaLokasiPM'])
          ->name('data-kontak.destroyKetuaLokasiPM');
    //End Data Kontak
  });
  //End Ketua Lokasi

  //Ketua Kelompok
  Route::group(['middleware' => ['auth', 'cekRole:Ketua Kelompok']], function () {
    Route::get('/parousia-ministry/lembaga', function () {
      return view('/parousia-ministry/lembaga/index');
    })->name('berandaDataLembagaPM');

    //Kelompok
    Route::resource('/parousia-ministry/lembaga/kelompok', KelompokController::class);
    //End Kelompok
    
    //Data Kontak
    Route::get('/parousia-ministry/lembaga/data-kontak', [PesertaController::class, 'indexDataLembagaPM'])
          ->name('data-kontak.indexDataLembagaPM');

    Route::post('/parousia-ministry/lembaga/data-kontak', [PesertaController::class, 'storeDataLembagaPM'])
          ->name('data-kontak.storeDataLembagaPM');

    Route::get('/parousia-ministry/lembaga/data-kontak/{data_peserta}', [PesertaController::class, 'showDataLembagaPM'])
          ->name('data-kontak.showDataLembagaPM');
    
    Route::put('/parousia-ministry/lembaga/data-kontak/{data_peserta}', [PesertaController::class, 'updateDataLembagaPM'])
          ->name('data-kontak.updateDataLembagaPM');

    Route::delete('/parousia-ministry/lembaga/data-kontak/{data_peserta}', [PesertaController::class, 'destroyDataLembagaPM'])
          ->name('data-kontak.destroyDataLembagaPM');
    //End data Kontak
  });
  //END Ketua Kelompok
});
// END PM
  

//GKP
Route::group(['middleware' => ['auth', 'cekInstitusi:GKP,Admin,SuperAdmin']], function () {
  //Pengurus
  Route::group(['middleware' => ['auth', 'cekRole:Pengurus']], function () {
    Route::get('/gereja-kristen-parousia/pengurus', function () {
      return view('/gereja-kristen-parousia/pengurus/index');
    })->name('berandaPengurusGKP');

    //Ketua Lokasi
    Route::get('/gereja-kristen-parousia/pengurus/data-ketua-lokasi', [KetuaLokasiController::class, 'indexPengurusGKP'])
          ->name('data-ketua-lokasi.indexPengurusGKP');

    Route::post('/gereja-kristen-parousia/pengurus/data-ketua-lokasi', [KetuaLokasiController::class, 'storePengurusGKP'])
          ->name('data-ketua-lokasi.storePengurusGKP');
    
    Route::put('/gereja-kristen-parousia/pengurus/data-ketua-lokasi/{data_ketua_lokasi}', [KetuaLokasiController::class, 'updatePengurusGKP'])
          ->name('data-ketua-lokasi.updatePengurusGKP');

    Route::delete('/gereja-kristen-parousia/pengurus/data-ketua-lokasi/{data_ketua_lokasi}', [KetuaLokasiController::class, 'destroyPengurusGKP'])
          ->name('data-ketua-lokasi.destroyPengurusGKP');
    //End Ketua Lokasi
    
    //Ketua Kelompok
    Route::get('/gereja-kristen-parousia/pengurus/data-lembaga', [DataLembagaController::class, 'indexPengurusGKP'])
          ->name('data-lembaga.indexPengurusGKP');

    Route::post('/gereja-kristen-parousia/pengurus/data-lembaga', [DataLembagaController::class, 'storePengurusGKP'])
          ->name('data-lembaga.storePengurusGKP');
    
    Route::put('/gereja-kristen-parousia/pengurus/data-lembaga/{data_ketua_kelompok}', [DataLembagaController::class, 'updatePengurusGKP'])
          ->name('data-lembaga.updatePengurusGKP');

    Route::delete('/gereja-kristen-parousia/pengurus/data-lembaga/{data_ketua_kelompok}', [DataLembagaController::class, 'destroyPengurusGKP'])
          ->name('data-lembaga.destroyPengurusGKP');
    //End Ketua Kelompok

    //Data Kontak
    Route::get('/gereja-kristen-parousia/pengurus/data-kontak', [PesertaController::class, 'indexPengurusGKP'])
          ->name('data-kontak.indexPengurusGKP');

    Route::post('/gereja-kristen-parousia/pengurus/data-kontak', [PesertaController::class, 'storePengurusGKP'])
          ->name('data-kontak.storePengurusGKP');
    
    Route::put('/gereja-kristen-parousia/pengurus/data-kontak/{data_peserta}', [PesertaController::class, 'updatePengurusGKP'])
          ->name('data-kontak.updatePengurusGKP');

    Route::delete('/gereja-kristen-parousia/pengurus/data-kontak/{data_peserta}', [PesertaController::class, 'destroyPengurusGKP'])
          ->name('data-kontak.destroyPengurusGKP');
    //End Data Kontak
  });
  //End Pengurus

  //Ketua Lokasi
  Route::group(['middleware' => ['auth', 'cekRole:Lokasi']], function () {
    Route::get('/gereja-kristen-parousia/ketua-lokasi', function () {
      return view('/gereja-kristen-parousia/ketua-lokasi/index');
    })->name('berandaKetuaLokasiGKP');
    
    //Ketua Kelompok
    Route::get('/gereja-kristen-parousia/ketua-lokasi/data-lembaga', [DataLembagaController::class, 'indexKetuaLokasiGKP'])
          ->name('data-lembaga.indexKetuaLokasiGKP');

    Route::post('/gereja-kristen-parousia/ketua-lokasi/data-lembaga', [DataLembagaController::class, 'storeKetuaLokasiGKP'])
          ->name('data-lembaga.storeKetuaLokasiGKP');
    
    Route::put('/gereja-kristen-parousia/ketua-lokasi/data-lembaga/{data_ketua_kelompok}', [DataLembagaController::class, 'updateKetuaLokasiGKP'])
          ->name('data-lembaga.updateKetuaLokasiGKP');

    Route::delete('/gereja-kristen-parousia/ketua-lokasi/data-lembaga/{data_ketua_kelompok}', [DataLembagaController::class, 'destroyKetuaLokasiGKP'])
          ->name('data-lembaga.destroyKetuaLokasiGKP');
    //End Ketua Kelompok

    //Data Kontak
    Route::get('/gereja-kristen-parousia/ketua-lokasi/data-kontak', [PesertaController::class, 'indexKetuaLokasiGKP'])
          ->name('data-kontak.indexKetuaLokasiGKP');

    Route::post('/gereja-kristen-parousia/ketua-lokasi/data-kontak', [PesertaController::class, 'storeKetuaLokasiGKP'])
          ->name('data-kontak.storeKetuaLokasiGKP');
    
    Route::put('/gereja-kristen-parousia/ketua-lokasi/data-kontak/{data_peserta}', [PesertaController::class, 'updateKetuaLokasiGKP'])
          ->name('data-kontak.updateKetuaLokasiGKP');

    Route::delete('/gereja-kristen-parousia/ketua-lokasi/data-kontak/{data_peserta}', [PesertaController::class, 'destroyKetuaLokasiGKP'])
          ->name('data-kontak.destroyKetuaLokasiGKP');
    //End Data Kontak
  });
  //End Ketua Lokasi

  //Ketua Kelompok
  Route::group(['middleware' => ['auth', 'cekRole:Ketua Kelompok']], function () {
    Route::get('/gereja-kristen-parousia/lembaga', function () {
      return view('/gereja-kristen-parousia/lembaga/index');
    })->name('berandaDataLembagaGKP');

    Route::get('/gereja-kristen-parousia/lembaga/kelompok', function () {
      return view('/gereja-kristen-parousia/lembaga/kelompok');
    })->name('kelompokDataLembagaGKP');
    
    //Data Kontak
    Route::get('/gereja-kristen-parousia/lembaga/data-kontak', [PesertaController::class, 'indexDataLembagaGKP'])
          ->name('data-kontak.indexDataLembagaGKP');

    Route::post('/gereja-kristen-parousia/lembaga/data-kontak', [PesertaController::class, 'storeDataLembagaGKP'])
          ->name('data-kontak.storeDataLembagaGKP');

    Route::get('/gereja-kristen-parousia/lembaga/data-kontak/{data_peserta}', [PesertaController::class, 'showDataLembagaGKP'])
          ->name('data-kontak.showDataLembagaGKP');
    
    Route::put('/gereja-kristen-parousia/lembaga/data-kontak/{data_peserta}', [PesertaController::class, 'updateDataLembagaGKP'])
          ->name('data-kontak.updateDataLembagaGKP');

    Route::delete('/gereja-kristen-parousia/lembaga/data-kontak/{data_peserta}', [PesertaController::class, 'destroyDataLembagaGKP'])
          ->name('data-kontak.destroyDataLembagaGKP');
    //End Data Kontak
  });
  //End Ketua Kelompok
});
//ENDGKP