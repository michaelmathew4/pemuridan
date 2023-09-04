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
    Route::get('/parousia-ministry/pengurus/ketua-lokasi', [KetuaLokasiController::class, 'indexPengurusPM'])
          ->name('ketua-lokasi.indexPengurusPM');

    Route::post('/parousia-ministry/pengurus/ketua-lokasi', [KetuaLokasiController::class, 'storePengurusPM'])
          ->name('ketua-lokasi.storePengurusPM');
    
    Route::put('/parousia-ministry/pengurus/ketua-lokasi/{id_ketua_lokasi}', [KetuaLokasiController::class, 'updatePengurusPM'])
          ->name('ketua-lokasi.updatePengurusPM');

    Route::delete('/parousia-ministry/pengurus/ketua-lokasi/{id_ketua_lokasi}', [KetuaLokasiController::class, 'destroyPengurusPM'])
          ->name('ketua-lokasi.destroyPengurusPM');
    //End Ketua Lokasi
    
    //Data Lembaga
    Route::get('/parousia-ministry/pengurus/data-lembaga', [DataLembagaController::class, 'indexPengurusPM'])
          ->name('data-lembaga.indexPengurusPM');

    Route::post('/parousia-ministry/pengurus/data-lembaga', [DataLembagaController::class, 'storePengurusPM'])
          ->name('data-lembaga.storePengurusPM');
    
    Route::put('/parousia-ministry/pengurus/data-lembaga/{id_data_lembaga}', [DataLembagaController::class, 'updatePengurusPM'])
          ->name('data-lembaga.updatePengurusPM');

    Route::delete('/parousia-ministry/pengurus/data-lembaga/{id_data_lembaga}', [DataLembagaController::class, 'destroyPengurusPM'])
          ->name('data-lembaga.destroyPengurusPM');

    Route::get('/parousia-ministry/pengurus/data-lembaga/{id_data_lembaga}', [DataLembagaController::class, 'showPengurusPM'])
          ->name('data-lembaga.showPengurusPM');

    //End Data Lembaga

    //Data Kontak
    Route::get('/parousia-ministry/pengurus/data-kontak', [PesertaController::class, 'indexPengurusPM'])
          ->name('data-kontak.indexPengurusPM');

    Route::post('/parousia-ministry/pengurus/data-kontak', [PesertaController::class, 'storePengurusPM'])
          ->name('data-kontak.storePengurusPM');
    
    Route::put('/parousia-ministry/pengurus/data-kontak/{id_data_kontak}', [PesertaController::class, 'updatePengurusPM'])
          ->name('data-kontak.updatePengurusPM');

    Route::delete('/parousia-ministry/pengurus/data-kontak/{id_data_kontak}', [PesertaController::class, 'destroyPengurusPM'])
          ->name('data-kontak.destroyPengurusPM');
          
    Route::get('/parousia-ministry/pengurus/data-kontak/{id_data_kontak}', [PesertaController::class, 'showPengurusPM'])
          ->name('data-kontak.showPengurusPM');
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
    
    Route::put('/parousia-ministry/ketua-lokasi/data-lembaga/{id_data_lembaga}', [DataLembagaController::class, 'updateKetuaLokasiPM'])
          ->name('data-lembaga.updateKetuaLokasiPM');

    Route::delete('/parousia-ministry/ketua-lokasi/data-lembaga/{id_data_lembaga}', [DataLembagaController::class, 'destroyKetuaLokasiPM'])
          ->name('data-lembaga.destroyKetuaLokasiPM');
          
    Route::get('/parousia-ministry/ketua-lokasi/data-lembaga/{id_data_lembaga}', [DataLembagaController::class, 'showKetuaLokasiPM'])
          ->name('data-lembaga.showKetuaLokasiPM');

    //End Ketua Kelompok

    //Data Kontak
    Route::get('/parousia-ministry/ketua-lokasi/data-kontak', [PesertaController::class, 'indexKetuaLokasiPM'])
          ->name('data-kontak.indexKetuaLokasiPM');

    Route::post('/parousia-ministry/ketua-lokasi/data-kontak', [PesertaController::class, 'storeKetuaLokasiPM'])
          ->name('data-kontak.storeKetuaLokasiPM');
    
    Route::put('/parousia-ministry/ketua-lokasi/data-kontak/{id_data_kontak}', [PesertaController::class, 'updateKetuaLokasiPM'])
          ->name('data-kontak.updateKetuaLokasiPM');

    Route::delete('/parousia-ministry/ketua-lokasi/data-kontak/{id_data_kontak}', [PesertaController::class, 'destroyKetuaLokasiPM'])
          ->name('data-kontak.destroyKetuaLokasiPM');

    Route::get('/parousia-ministry/ketua-lokasi/data-kontak/{id_data_kontak}', [PesertaController::class, 'showKetuaLokasiPM'])
          ->name('data-kontak.showKetuaLokasiPM');
    //End Data Kontak
  });
  //End Ketua Lokasi

  //Ketua Kelompok
  Route::group(['middleware' => ['auth', 'cekRole:Utusan']], function () {
    Route::get('/parousia-ministry/ketua-kelompok', function () {
      return view('/parousia-ministry/ketua-kelompok/index');
    })->name('berandaDataKKPM');

    //Kelompok
    Route::resource('/parousia-ministry/ketua-kelompok/kelompok', KelompokController::class, ['as' => 'ketua-kelompok']);
    //End Kelompok
    
    //Data Kontak
    Route::get('/parousia-ministry/ketua-kelompok/data-kontak', [PesertaController::class, 'indexDataKKPM'])
          ->name('data-kontak.indexDataKKPM');

    Route::post('/parousia-ministry/ketua-kelompok/data-kontak', [PesertaController::class, 'storeDataKKPM'])
          ->name('data-kontak.storeDataKKPM');
    
    Route::put('/parousia-ministry/ketua-kelompok/data-kontak/{id_data_kontak}', [PesertaController::class, 'updateDataKKPM'])
          ->name('data-kontak.updateDataKKPM');

    Route::delete('/parousia-ministry/ketua-kelompok/data-kontak/{id_data_kontak}', [PesertaController::class, 'destroyDataKKPM'])
          ->name('data-kontak.destroyDataKKPM');

    Route::get('/parousia-ministry/ketua-kelompok/data-kontak/{id_data_kontak}', [PesertaController::class, 'showDataKKPM'])
          ->name('data-kontak.showDataKKPM');
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
    Route::get('/gereja-kristen-parousia/pengurus/ketua-lokasi', [KetuaLokasiController::class, 'indexPengurusGKP'])
          ->name('ketua-lokasi.indexPengurusGKP');

    Route::post('/gereja-kristen-parousia/pengurus/ketua-lokasi', [KetuaLokasiController::class, 'storePengurusGKP'])
          ->name('ketua-lokasi.storePengurusGKP');
    
    Route::put('/gereja-kristen-parousia/pengurus/ketua-lokasi/{id_ketua_lokasi}', [KetuaLokasiController::class, 'updatePengurusGKP'])
          ->name('ketua-lokasi.updatePengurusGKP');

    Route::delete('/gereja-kristen-parousia/pengurus/ketua-lokasi/{id_ketua_lokasi}', [KetuaLokasiController::class, 'destroyPengurusGKP'])
          ->name('ketua-lokasi.destroyPengurusGKP');
    //End Ketua Lokasi
    
    //Data Lembaga
    Route::get('/gereja-kristen-parousia/pengurus/data-lembaga', [DataLembagaController::class, 'indexPengurusGKP'])
          ->name('data-lembaga.indexPengurusGKP');

    Route::post('/gereja-kristen-parousia/pengurus/data-lembaga', [DataLembagaController::class, 'storePengurusGKP'])
          ->name('data-lembaga.storePengurusGKP');
    
    Route::put('/gereja-kristen-parousia/pengurus/data-lembaga/{id_data_lembaga}', [DataLembagaController::class, 'updatePengurusGKP'])
          ->name('data-lembaga.updatePengurusGKP');

    Route::delete('/gereja-kristen-parousia/pengurus/data-lembaga/{id_data_lembaga}', [DataLembagaController::class, 'destroyPengurusGKP'])
          ->name('data-lembaga.destroyPengurusGKP');
          
    Route::get('/gereja-kristen-parousia/pengurus/data-lembaga/{id_data_lembaga}', [DataLembagaController::class, 'showPengurusGKP'])
          ->name('data-lembaga.showPengurusGKP');    
    //End Data Lembaga

    //Data Kontak
    Route::get('/gereja-kristen-parousia/pengurus/data-kontak', [PesertaController::class, 'indexPengurusGKP'])
          ->name('data-kontak.indexPengurusGKP');

    Route::post('/gereja-kristen-parousia/pengurus/data-kontak', [PesertaController::class, 'storePengurusGKP'])
          ->name('data-kontak.storePengurusGKP');
    
    Route::put('/gereja-kristen-parousia/pengurus/data-kontak/{id_data_kontak}', [PesertaController::class, 'updatePengurusGKP'])
          ->name('data-kontak.updatePengurusGKP');

    Route::delete('/gereja-kristen-parousia/pengurus/data-kontak/{id_data_kontak}', [PesertaController::class, 'destroyPengurusGKP'])
          ->name('data-kontak.destroyPengurusGKP');
          
    Route::get('/gereja-kristen-parousia/pengurus/data-kontak/{id_data_kontak}', [PesertaController::class, 'showPengurusGKP'])
      ->name('data-kontak.showPengurusGKP');    
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
    
    Route::put('/gereja-kristen-parousia/ketua-lokasi/data-lembaga/{id_data_lembaga}', [DataLembagaController::class, 'updateKetuaLokasiGKP'])
          ->name('data-lembaga.updateKetuaLokasiGKP');

    Route::delete('/gereja-kristen-parousia/ketua-lokasi/data-lembaga/{id_data_lembaga}', [DataLembagaController::class, 'destroyKetuaLokasiGKP'])
          ->name('data-lembaga.destroyKetuaLokasiGKP');
          
    Route::get('/gereja-kristen-parousia/ketua-lokasi/data-lembaga/{id_data_lembaga}', [DataLembagaController::class, 'showKetuaLokasiGKP'])
          ->name('data-lembaga.showKetuaLokasiGKP');
    //End Ketua Kelompok

    //Data Kontak
    Route::get('/gereja-kristen-parousia/ketua-lokasi/data-kontak', [PesertaController::class, 'indexKetuaLokasiGKP'])
          ->name('data-kontak.indexKetuaLokasiGKP'); 

    Route::post('/gereja-kristen-parousia/ketua-lokasi/data-kontak', [PesertaController::class, 'storeKetuaLokasiGKP'])
          ->name('data-kontak.storeKetuaLokasiGKP');
    
    Route::put('/gereja-kristen-parousia/ketua-lokasi/data-kontak/{id_data_kontak}', [PesertaController::class, 'updateKetuaLokasiGKP'])
          ->name('data-kontak.updateKetuaLokasiGKP');

    Route::delete('/gereja-kristen-parousia/ketua-lokasi/data-kontak/{id_data_kontak}', [PesertaController::class, 'destroyKetuaLokasiGKP'])
          ->name('data-kontak.destroyKetuaLokasiGKP');
          
    Route::get('/gereja-kristen-parousia/ketua-lokasi/data-kontak/{id_data_kontak}', [PesertaController::class, 'showKetuaLokasiGKP'])
      ->name('data-kontak.showKetuaLokasiGKP');   
    //End Data Kontak
  });
  //End Ketua Lokasi

  //Ketua Kelompok
  Route::group(['middleware' => ['auth', 'cekRole:Ketua Kelompok, Utusan']], function () {
    Route::get('/gereja-kristen-parousia/ketua-kelompok', function () {
      return view('/gereja-kristen-parousia/ketua-kelompok/index');
    })->name('berandaDataKKGKP');

    //Kelompok
    Route::get('/gereja-kristen-parousia/ketua-kelompok/kelompok', [KelompokController::class, 'indexKelompokKKGKP'])
          ->name('kelompok.indexKelompokKKGKP');

    Route::post('/gereja-kristen-parousia/ketua-kelompok/kelompok', [KelompokController::class, 'storeKelompokKKGKP'])
          ->name('kelompok.storeKelompokKKGKP');
    
    Route::put('/gereja-kristen-parousia/ketua-kelompok/kelompok/{id_kelompok}', [KelompokController::class, 'updateKelompokKKGKP'])
          ->name('kelompok.updateKelompokKKGKP');

    Route::delete('/gereja-kristen-parousia/ketua-kelompok/kelompok/{id_kelompok}', [KelompokController::class, 'destroyKelompokKKGKP'])
          ->name('kelompok.destroyKelompokKKGKP');

    Route::get('/gereja-kristen-parousia/ketua-kelompok/kelompok/{id_kelompok}', [KelompokController::class, 'showKelompokKKGKP'])
          ->name('kelompok.showKelompokKKGKP');
    //End Kelompok
    
    //Data Kontak
    Route::get('/gereja-kristen-parousia/ketua-kelompok/data-kontak', [PesertaController::class, 'indexDataKKGKP'])
          ->name('data-kontak.indexDataKKGKP');

    Route::post('/gereja-kristen-parousia/ketua-kelompok/data-kontak', [PesertaController::class, 'storeDataKKGKP'])
          ->name('data-kontak.storeDataKKGKP');
    
    Route::put('/gereja-kristen-parousia/ketua-kelompok/data-kontak/{id_data_kontak}', [PesertaController::class, 'updateDataKKGKP'])
          ->name('data-kontak.updateDataKKGKP');

    Route::delete('/gereja-kristen-parousia/ketua-kelompok/data-kontak/{id_data_kontak}', [PesertaController::class, 'destroyDataKKGKP'])
          ->name('data-kontak.destroyDataKKGKP');

    Route::get('/gereja-kristen-parousia/ketua-kelompok/data-kontak/{id_data_kontak}', [PesertaController::class, 'showDataKKGKP'])
          ->name('data-kontak.showDataKKGKP');
    //End data Kontak
  });
  //End Ketua Kelompok
});
//ENDGKP