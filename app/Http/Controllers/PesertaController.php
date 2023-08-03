<?php

namespace App\Http\Controllers;

use Image;
use  File;
use App\Models\Peserta;
use App\Models\Skala;
use App\Models\Lokasi;
use App\Models\User;
use App\Models\Ketua_lokasi;
use App\Models\Ketua_kelompok;
use App\Models\Kelompok;
use Illuminate\Support\Str;
use App\Models\Catatan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PesertaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $pesertas = Peserta::addSelect(['skala' => Skala::select('skala')
                ->whereColumn('id_peserta', 'pesertas.id_peserta')
                ->orderBy('created_at', 'desc')
                ->limit(1),
            'catatan' => Catatan::select('catatan')
                ->whereColumn('id_peserta', 'pesertas.id_peserta')
                ->orderBy('created_at', 'desc')
                ->limit(1)
            ])->get();

    $peserts = Peserta::all();
    $skalas;
    foreach ($peserts as $pesert) {
      $skalas = Skala::where('id_peserta', '=', $pesert->id_peserta)->orderBy('created_at', 'desc')->get();
      $catatans = Catatan::where('id_peserta', '=', $pesert->id_peserta)->orderBy('created_at', 'desc')->get();
      // $getDataSkalas = Skala::where('id_peserta', '=', $pesert->id_peserta)->orderBy('created_at', 'desc')->get();
      // foreach ($skalas as $skala) {
        // $dataSkalas = $getDataSkala->tgl_kontak;
      // dd($skalas);
      // }
    }
    $no = 1;
    $noSkalas = 1;
    $noCatatans = 1;
    $lokasis = Lokasi::all();
    return view('admin.data-kontak', compact(['pesertas', 'no', 'lokasis', 'skalas', 'catatans', 'noSkalas', 'noCatatans']));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //
  }

  function randomCodes()
  {
    do {
      $kode = random_int(100000000, 999999999);
    } while (Peserta::where("id_peserta", "=", $kode)->first());

    return $kode;
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    if ($request->inputTambah == "tambahData") {
      $request->validate([
        'tglKontakPeserta'     => 'required',
        'namaKontakPeserta'     => 'required',
        'jenisKelaminPeserta'   => 'required',
        'skalaPeserta'   => 'required',
        'catatanPeserta'   => 'required',
        'alamatPeserta'   => 'required',
        'noHpPeserta'   => 'required|numeric',
        'tempatLahirPeserta'   => 'required',
        'tanggalLahirPeserta'   => 'required',
        'pekerjaanPeserta'   => 'required',
        'sukuPeserta'   => 'required',
        'lokasiPeserta'   => 'required',
        'institusiPeserta'   => 'required',
        'fotoPRS'     => 'image|mimes:png,jpg,jpeg'
      ],
      [
        'namaKontakPeserta.required' => 'Nama tidak boleh kosong.',
        'jenisKelaminPeserta.required' => 'Jenis Kelamin tidak boleh kosong.',
        'skalaPeserta.required' => 'Skala tidak boleh kosong.',
        'catatanPeserta.required' => 'Catatan tidak boleh kosong.',
        'alamatPeserta.required' => 'Alamat tidak boleh kosong.',
        'noHpPeserta.required' => 'No Hp tidak boleh kosong.',
        'noHpPeserta.numeric' => 'No Hp harus berupa angka.',
        'tempatLahirPeserta.required' => 'Tempat Lahir tidak boleh kosong.',
        'tanggalLahirPeserta.required' => 'Tanggal Lahir tidak boleh kosong.',
        'pekerjaanPeserta.required' => 'Pekerjaan tidak boleh kosong.',
        'sukuPeserta.required' => 'Suku tidak boleh kosong.',
        'lokasiPeserta.required' => 'Lokasi tidak boleh kosong.',
        'institusiPeserta.required' => 'Naungan tidak boleh kosong.',
        'fotoPeserta.image' => 'Berkas harus berupa Gambar.'
      ]);

      $fotoPesertaUpload = '';
      if ($request->hasfile('fotoPeserta')) {
        $destination = "images/Peserta";
        $filename = $request->file('fotoPeserta');
        $filename->move($destination, $filename->getClientOriginalName());
        $fotoPesertaUpload = $filename->getClientOriginalName();
      }

      $upload = new Peserta;
      $upload->id_peserta = $this->randomCodes();
      $upload->nama_peserta = $request->namaKontakPeserta;
      $upload->jk_peserta = $request->jenisKelaminPeserta;
      $upload->alamat_peserta = $request->alamatPeserta;
      $upload->no_hp_peserta = $request->noHpPeserta;
      $upload->tempat_lahir_peserta = $request->tempatLahirPeserta;
      $upload->tgl_lahir_peserta = $request->tanggalLahirPeserta;
      $upload->pekerjaan_peserta = $request->pekerjaanPeserta;
      $upload->suku_peserta = $request->sukuPeserta;
      $upload->status_peserta = $request->statusPeserta;
      $upload->lokasi_peserta = $request->lokasiPeserta;
      $upload->institusi_peserta = $request->institusiPeserta;
      $upload->foto_peserta = $fotoPesertaUpload;
      $upload->save();

      if($upload){
        $skala = new Skala;
        $skala->skala = $request->skalaPeserta;
        $skala->keterangan = $request->catatanPeserta;
        $skala->id_peserta = $upload->id_peserta;
        $skala->tgl_kontak = $request->tglKontakPeserta;
        $skala->status = 'Aktif';
        $skala->save();

        if ($skala) {
          $catatan = new Catatan;
          $catatan->catatan = $request->catatanPeserta;
          $catatan->id_peserta = $upload->id_peserta;
          $catatan->tgl_kontak = $request->tglKontakPeserta;
          $catatan->save();

          if ($catatan) {
            return redirect()->route('data-kontak.index')->with(['success' => 'Data Kontak Berhasil Disimpan!']);
          } else{
            return redirect()->route('data-kontak.index')->with(['error' => 'Data Kontak Gagal Disimpan!']);
          }
        } else{
          return redirect()->route('data-kontak.index')->with(['error' => 'Data Kontak Gagal Disimpan!']);
        }
      } else{
        return redirect()->route('data-kontak.index')->with(['error' => 'Data Kontak Gagal Disimpan!']);
      }
    }

    if ($request->inputTambah == "inputSkala") {
      $newSkala = new Skala;
      $newSkala->skala = $request->tambahSkalaPeserta;
      $newSkala->keterangan = $request->tambahKeteranganSkalaPeserta;
      $newSkala->id_peserta = $request->id_pesertaSkala;
      $newSkala->tgl_kontak = $request->tambahTgl_kontak;
      $newSkala->status = 'Aktif';
      $newSkala->save();
      // dd($request->inputTambah);

      if ($newSkala) {
        $newCatatans = new Catatan;
        $newCatatans->catatan = $request->tambahKeteranganSkalaPeserta;
        $newCatatans->id_peserta = $request->id_pesertaSkala;
        $newCatatans->tgl_kontak = $request->tambahTgl_kontak;
        $newCatatans->save();
        return redirect()->route('data-kontak.index')->with(['success' => 'Skala Berhasil Disimpan!']);
      } else {
        return redirect()->route('data-kontak.index')->with(['error' => 'Skala Gagal Disimpan!']);
      }
    }

    if ($request->inputTambah == "inputCatatan") {
      $newCatatan = new Catatan;
      $newCatatan->catatan = $request->tambahCatatanPeserta;
      $newCatatan->id_peserta = $request->id_pesertaCatatan;
      $newCatatan->tgl_kontak = $request->tambahTgl_kontakCatatan;
      $newCatatan->save();

      if ($newCatatan) {
        return redirect()->route('data-kontak.index')->with(['success' => 'Catatan Berhasil Disimpan!']);
      } else {
        return redirect()->route('data-kontak.index')->with(['error' => 'Catatan Gagal Disimpan!']);
      }
    }
    
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function show(Peserta $peserta)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function edit(Peserta $peserta)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $pesertaUpdate = Peserta::find($id);
    if($request->file('editFotoPeserta') == "") {
      if ($request->editFotoTextPeserta == '') {
        $pesertaUpdate->update([
          'nama_peserta'     => $request->editNamaKontakPeserta,
          'jk_peserta'   => $request->editJenisKelaminPeserta,
          'alamat_peserta'   => $request->editAlamatPeserta,
          'no_hp_peserta'   => $request->editNoHpPeserta,
          'tempat_lahir_peserta'   => $request->editTempatLahirPeserta,
          'tgl_lahir_peserta'   => $request->editTanggalLahirPeserta,
          'pekerjaan_peserta'   => $request->editPekerjaanPeserta,
          'suku_peserta'   => $request->editSukuPeserta,
          'status_peserta'   => $request->editStatusPeserta,
          'lokasi_peserta'   => $request->editLokasiPeserta,
          'institusi_peserta'   => $request->editInstitusiPeserta,
          'foto_peserta'     => ''
        ]);
      } else {
        $pesertaUpdate->update([
          'nama_peserta'     => $request->editNamaKontakPeserta,
          'jk_peserta'   => $request->editJenisKelaminPeserta,
          'alamat_peserta'   => $request->editAlamatPeserta,
          'no_hp_peserta'   => $request->editNoHpPeserta,
          'tempat_lahir_peserta'   => $request->editTempatLahirPeserta,
          'tgl_lahir_peserta'   => $request->editTanggalLahirPeserta,
          'pekerjaan_peserta'   => $request->editPekerjaanPeserta,
          'suku_peserta'   => $request->editSukuPeserta,
          'status_peserta'   => $request->editStatusPeserta,
          'lokasi_peserta'   => $request->editLokasiPeserta,
          'institusi_peserta'   => $request->editInstitusiPeserta,
        ]);
      }
    } else {
      //hapus old image
      if ($pesertaUpdate->fotoPeserta != '') {
        $destination = 'images/Peserta/'.$pesertaUpdate->fotoPeserta;
        if (File::exists($destination)) {
          File::delete($destination);
        }
      } else {
        //upload new image
        $destination = "images/Peserta";
        $filename = $request->file('editFotoPeserta');
        $filename->move($destination, $filename->getClientOriginalName());
        $pesertaUpdate->update([
          'nama_peserta'     => $request->editNamaKontakPeserta,
          'jk_peserta'   => $request->editJenisKelaminPeserta,
          'alamat_peserta'   => $request->editAlamatPeserta,
          'no_hp_peserta'   => $request->editNoHpPeserta,
          'tempat_lahir_peserta'   => $request->editTempatLahirPeserta,
          'tgl_lahir_peserta'   => $request->editTanggalLahirPeserta,
          'pekerjaan_peserta'   => $request->editPekerjaanPeserta,
          'suku_peserta'   => $request->editSukuPeserta,
          'status_peserta'   => $request->editStatusPeserta,
          'lokasi_peserta'   => $request->editLokasiPeserta,
          'institusi_peserta'   => $request->editInstitusiPeserta,
          'foto_peserta'     => $filename->getClientOriginalName()
        ]);
      }
    }
    if($pesertaUpdate){
      //redirect dengan pesan sukses
      return redirect()->route('data-kontak.index')->with(['success' => 'Kontak Berhasil Diubah!']);
    }else{
      //redirect dengan pesan error
      return redirect()->route('data-kontak.index')->with(['error' => 'Kontak Gagal Diubah!']);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $deleteDataPeserta = Peserta::find($id);
    if ($deleteDataPeserta->foto_peserta != '') {
      $destination = 'images/Peserta/'.$deleteDataPeserta->foto_peserta;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    $deleteDataPeserta->delete();

    if($deleteDataPeserta){
      return redirect()->route('data-kontak.index')->with(['success' => 'Peserta Berhasil Dihapus!']);
    }else{
      return redirect()->route('data-kontak.index')->with(['error' => 'Peserta Gagal Dihapus!']);
    }
  }





  //Pengurus YMP
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function indexPengurusYMP()
  {
    $pesertas = Peserta::addSelect(['skala' => Skala::select('skala')
                ->whereColumn('id_peserta', 'pesertas.id_peserta')
                ->orderBy('created_at', 'desc')
                ->limit(1),
            'catatan' => Catatan::select('catatan')
                ->whereColumn('id_peserta', 'pesertas.id_peserta')
                ->orderBy('created_at', 'desc')
                ->limit(1)
            ])->get();

    $peserts = Peserta::all();
    $skalas;
    foreach ($peserts as $pesert) {
      $skalas = Skala::where('id_peserta', '=', $pesert->id_peserta)->orderBy('created_at', 'desc')->get();
      $catatans = Catatan::where('id_peserta', '=', $pesert->id_peserta)->orderBy('created_at', 'desc')->get();
      // $getDataSkalas = Skala::where('id_peserta', '=', $pesert->id_peserta)->orderBy('created_at', 'desc')->get();
      // foreach ($skalas as $skala) {
        // $dataSkalas = $getDataSkala->tgl_kontak;
      // dd($skalas);
      // }
    }
    $no = 1;
    $noSkalas = 1;
    $noCatatans = 1;
    $lokasis = Lokasi::all();
    return view('ymp.pengurus.data-kontak', compact(['pesertas', 'no', 'lokasis', 'skalas', 'catatans', 'noSkalas', 'noCatatans']));
  }

  
  function randomCodesPengurusYMP()
  {
    do {
      $kode = random_int(100000000, 999999999);
    } while (Peserta::where("id_peserta", "=", $kode)->first());

    return $kode;
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function storePengurusYMP(Request $request)
  {
    if ($request->inputTambah == "tambahData") {
      $request->validate([
        'tglKontakPeserta'     => 'required',
        'namaKontakPeserta'     => 'required',
        'jenisKelaminPeserta'   => 'required',
        'skalaPeserta'   => 'required',
        'catatanPeserta'   => 'required',
        'alamatPeserta'   => 'required',
        'noHpPeserta'   => 'required|numeric',
        'tempatLahirPeserta'   => 'required',
        'tanggalLahirPeserta'   => 'required',
        'pekerjaanPeserta'   => 'required',
        'sukuPeserta'   => 'required',
        'lokasiPeserta'   => 'required',
        'institusiPeserta'   => 'required',
        'fotoPRS'     => 'image|mimes:png,jpg,jpeg'
      ],
      [
        'namaKontakPeserta.required' => 'Nama tidak boleh kosong.',
        'jenisKelaminPeserta.required' => 'Jenis Kelamin tidak boleh kosong.',
        'skalaPeserta.required' => 'Skala tidak boleh kosong.',
        'catatanPeserta.required' => 'Catatan tidak boleh kosong.',
        'alamatPeserta.required' => 'Alamat tidak boleh kosong.',
        'noHpPeserta.required' => 'No Hp tidak boleh kosong.',
        'noHpPeserta.numeric' => 'No Hp harus berupa angka.',
        'tempatLahirPeserta.required' => 'Tempat Lahir tidak boleh kosong.',
        'tanggalLahirPeserta.required' => 'Tanggal Lahir tidak boleh kosong.',
        'pekerjaanPeserta.required' => 'Pekerjaan tidak boleh kosong.',
        'sukuPeserta.required' => 'Suku tidak boleh kosong.',
        'lokasiPeserta.required' => 'Lokasi tidak boleh kosong.',
        'institusiPeserta.required' => 'Naungan tidak boleh kosong.',
        'fotoPeserta.image' => 'Berkas harus berupa Gambar.'
      ]);

      $fotoPesertaUpload = '';
      if ($request->hasfile('fotoPeserta')) {
        $destination = "images/Peserta";
        $filename = $request->file('fotoPeserta');
        $filename->move($destination, $filename->getClientOriginalName());
        $fotoPesertaUpload = $filename->getClientOriginalName();
      }

      $upload = new Peserta;
      $upload->id_peserta = $this->randomCodesPengurusYMP();
      $upload->nama_peserta = $request->namaKontakPeserta;
      $upload->jk_peserta = $request->jenisKelaminPeserta;
      $upload->alamat_peserta = $request->alamatPeserta;
      $upload->no_hp_peserta = $request->noHpPeserta;
      $upload->tempat_lahir_peserta = $request->tempatLahirPeserta;
      $upload->tgl_lahir_peserta = $request->tanggalLahirPeserta;
      $upload->pekerjaan_peserta = $request->pekerjaanPeserta;
      $upload->suku_peserta = $request->sukuPeserta;
      $upload->status_peserta = $request->statusPeserta;
      $upload->lokasi_peserta = $request->lokasiPeserta;
      $upload->institusi_peserta = $request->institusiPeserta;
      $upload->foto_peserta = $fotoPesertaUpload;
      $upload->save();

      if($upload){
        $skala = new Skala;
        $skala->skala = $request->skalaPeserta;
        $skala->keterangan = $request->catatanPeserta;
        $skala->id_peserta = $upload->id_peserta;
        $skala->tgl_kontak = $request->tglKontakPeserta;
        $skala->status = 'Aktif';
        $skala->save();

        if ($skala) {
          $catatan = new Catatan;
          $catatan->catatan = $request->catatanPeserta;
          $catatan->id_peserta = $upload->id_peserta;
          $catatan->tgl_kontak = $request->tglKontakPeserta;
          $catatan->save();

          if ($catatan) {
            return redirect()->route('data-kontak.indexPengurusYMP')->with(['success' => 'Data Kontak Berhasil Disimpan!']);
          } else{
            return redirect()->route('data-kontak.indexPengurusYMP')->with(['error' => 'Data Kontak Gagal Disimpan!']);
          }
        } else{
          return redirect()->route('data-kontak.indexPengurusYMP')->with(['error' => 'Data Kontak Gagal Disimpan!']);
        }
      } else{
        return redirect()->route('data-kontak.indexPengurusYMP')->with(['error' => 'Data Kontak Gagal Disimpan!']);
      }
    }

    if ($request->inputTambah == "inputSkala") {
      $newSkala = new Skala;
      $newSkala->skala = $request->tambahSkalaPeserta;
      $newSkala->keterangan = $request->tambahKeteranganSkalaPeserta;
      $newSkala->id_peserta = $request->id_pesertaSkala;
      $newSkala->tgl_kontak = $request->tambahTgl_kontak;
      $newSkala->status = 'Aktif';
      $newSkala->save();
      // dd($request->inputTambah);

      if ($newSkala) {
        $newCatatans = new Catatan;
        $newCatatans->catatan = $request->tambahKeteranganSkalaPeserta;
        $newCatatans->id_peserta = $request->id_pesertaSkala;
        $newCatatans->tgl_kontak = $request->tambahTgl_kontak;
        $newCatatans->save();
        return redirect()->route('data-kontak.indexPengurusYMP')->with(['success' => 'Skala Berhasil Disimpan!']);
      } else {
        return redirect()->route('data-kontak.indexPengurusYMP')->with(['error' => 'Skala Gagal Disimpan!']);
      }
    }

    if ($request->inputTambah == "inputCatatan") {
      $newCatatan = new Catatan;
      $newCatatan->catatan = $request->tambahCatatanPeserta;
      $newCatatan->id_peserta = $request->id_pesertaCatatan;
      $newCatatan->tgl_kontak = $request->tambahTgl_kontakCatatan;
      $newCatatan->save();

      if ($newCatatan) {
        return redirect()->route('data-kontak.indexPengurusYMP')->with(['success' => 'Catatan Berhasil Disimpan!']);
      } else {
        return redirect()->route('data-kontak.indexPengurusYMP')->with(['error' => 'Catatan Gagal Disimpan!']);
      }
    }
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function updatePengurusYMP(Request $request, $id)
  {
    $pesertaUpdate = Peserta::find($id);
    if($request->file('editFotoPeserta') == "") {
      if ($request->editFotoTextPeserta == '') {
        $pesertaUpdate->update([
          'nama_peserta'     => $request->editNamaKontakPeserta,
          'jk_peserta'   => $request->editJenisKelaminPeserta,
          'alamat_peserta'   => $request->editAlamatPeserta,
          'no_hp_peserta'   => $request->editNoHpPeserta,
          'tempat_lahir_peserta'   => $request->editTempatLahirPeserta,
          'tgl_lahir_peserta'   => $request->editTanggalLahirPeserta,
          'pekerjaan_peserta'   => $request->editPekerjaanPeserta,
          'suku_peserta'   => $request->editSukuPeserta,
          'status_peserta'   => $request->editStatusPeserta,
          'lokasi_peserta'   => $request->editLokasiPeserta,
          'institusi_peserta'   => $request->editInstitusiPeserta,
          'foto_peserta'     => ''
        ]);
      } else {
        $pesertaUpdate->update([
          'nama_peserta'     => $request->editNamaKontakPeserta,
          'jk_peserta'   => $request->editJenisKelaminPeserta,
          'alamat_peserta'   => $request->editAlamatPeserta,
          'no_hp_peserta'   => $request->editNoHpPeserta,
          'tempat_lahir_peserta'   => $request->editTempatLahirPeserta,
          'tgl_lahir_peserta'   => $request->editTanggalLahirPeserta,
          'pekerjaan_peserta'   => $request->editPekerjaanPeserta,
          'suku_peserta'   => $request->editSukuPeserta,
          'status_peserta'   => $request->editStatusPeserta,
          'lokasi_peserta'   => $request->editLokasiPeserta,
          'institusi_peserta'   => $request->editInstitusiPeserta,
        ]);
      }
    } else {
      //hapus old image
      if ($pesertaUpdate->fotoPeserta != '') {
        $destination = 'images/Peserta/'.$pesertaUpdate->fotoPeserta;
        if (File::exists($destination)) {
          File::delete($destination);
        }
      } else {
        //upload new image
        $destination = "images/Peserta";
        $filename = $request->file('editFotoPeserta');
        $filename->move($destination, $filename->getClientOriginalName());
        $pesertaUpdate->update([
          'nama_peserta'     => $request->editNamaKontakPeserta,
          'jk_peserta'   => $request->editJenisKelaminPeserta,
          'alamat_peserta'   => $request->editAlamatPeserta,
          'no_hp_peserta'   => $request->editNoHpPeserta,
          'tempat_lahir_peserta'   => $request->editTempatLahirPeserta,
          'tgl_lahir_peserta'   => $request->editTanggalLahirPeserta,
          'pekerjaan_peserta'   => $request->editPekerjaanPeserta,
          'suku_peserta'   => $request->editSukuPeserta,
          'status_peserta'   => $request->editStatusPeserta,
          'lokasi_peserta'   => $request->editLokasiPeserta,
          'institusi_peserta'   => $request->editInstitusiPeserta,
          'foto_peserta'     => $filename->getClientOriginalName()
        ]);
      }
    }
    if($pesertaUpdate){
      //redirect dengan pesan sukses
      return redirect()->route('data-kontak.indexPengurusYMP')->with(['success' => 'Kontak Berhasil Diubah!']);
    }else{
      //redirect dengan pesan error
      return redirect()->route('data-kontak.indexPengurusYMP')->with(['error' => 'Kontak Gagal Diubah!']);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function destroyPengurusYMP($id)
  {
    $deleteDataPeserta = Peserta::find($id);
    if ($deleteDataPeserta->foto_peserta != '') {
      $destination = 'images/Peserta/'.$deleteDataPeserta->foto_peserta;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    $deleteDataPeserta->delete();

    if($deleteDataPeserta){
      return redirect()->route('data-kontak.indexPengurusYMP')->with(['success' => 'Peserta Berhasil Dihapus!']);
    }else{
      return redirect()->route('data-kontak.indexPengurusYMP')->with(['error' => 'Peserta Gagal Dihapus!']);
    }
  }

  
  //Ketua Lokasi YMP
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function indexKetuaLokasiYMP()
  {
    $cekKetuaLokasi = Ketua_lokasi::where('alamat_surelKL', auth()->user()->email)->first();
    $cekLokasi = Lokasi::where('nama_lokasi', $cekKetuaLokasi->lokasiKL)->first();
    $pesertas = Peserta::where('lokasi_peserta', $cekLokasi->nama_lokasi)
                ->addSelect(['skala' => Skala::select('skala')
                ->whereColumn('id_peserta', 'pesertas.id_peserta')
                ->orderBy('created_at', 'desc')
                ->limit(1),
            'catatan' => Catatan::select('catatan')
                ->whereColumn('id_peserta', 'pesertas.id_peserta')
                ->orderBy('created_at', 'desc')
                ->limit(1)
            ])->get();
    
    // dd($cekLokasi);

    $peserts = Peserta::all();
    $skalas;
    foreach ($peserts as $pesert) {
      $skalas = Skala::where('id_peserta', '=', $pesert->id_peserta)->orderBy('created_at', 'desc')->get();
      $catatans = Catatan::where('id_peserta', '=', $pesert->id_peserta)->orderBy('created_at', 'desc')->get();
      // $getDataSkalas = Skala::where('id_peserta', '=', $pesert->id_peserta)->orderBy('created_at', 'desc')->get();
      // foreach ($skalas as $skala) {
        // $dataSkalas = $getDataSkala->tgl_kontak;
      // dd($skalas);
      // }
    }
    $no = 1;
    $noSkalas = 1;
    $noCatatans = 1;
    $lokasis = Lokasi::all();
    return view('ymp.ketua-lokasi.data-kontak', compact(['pesertas', 'no', 'lokasis', 'skalas', 'catatans', 'noSkalas', 'noCatatans']));
  }


  function randomCodesKetuaLokasiYMP()
  {
    do {
      $kode = random_int(100000000, 999999999);
    } while (Peserta::where("id_peserta", "=", $kode)->first());

    return $kode;
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function storeKetuaLokasiYMP(Request $request)
  {
    $cekKetuaLokasi = Ketua_lokasi::where('alamat_surelKL', auth()->user()->email)->first();
    $cekLokasi = Lokasi::where('nama_lokasi', $cekKetuaLokasi->lokasiKL)->first();
    if ($request->inputTambah == "tambahData") {
      $request->validate([
        'tglKontakPeserta'     => 'required',
        'namaKontakPeserta'     => 'required',
        'jenisKelaminPeserta'   => 'required',
        'skalaPeserta'   => 'required',
        'catatanPeserta'   => 'required',
        'alamatPeserta'   => 'required',
        'noHpPeserta'   => 'required|numeric',
        'tempatLahirPeserta'   => 'required',
        'tanggalLahirPeserta'   => 'required',
        'pekerjaanPeserta'   => 'required',
        'sukuPeserta'   => 'required',
        'lokasiPeserta'   => 'required',
        'institusiPeserta'   => 'required',
        'fotoPRS'     => 'image|mimes:png,jpg,jpeg'
      ],
      [
        'namaKontakPeserta.required' => 'Nama tidak boleh kosong.',
        'jenisKelaminPeserta.required' => 'Jenis Kelamin tidak boleh kosong.',
        'skalaPeserta.required' => 'Skala tidak boleh kosong.',
        'catatanPeserta.required' => 'Catatan tidak boleh kosong.',
        'alamatPeserta.required' => 'Alamat tidak boleh kosong.',
        'noHpPeserta.required' => 'No Hp tidak boleh kosong.',
        'noHpPeserta.numeric' => 'No Hp harus berupa angka.',
        'tempatLahirPeserta.required' => 'Tempat Lahir tidak boleh kosong.',
        'tanggalLahirPeserta.required' => 'Tanggal Lahir tidak boleh kosong.',
        'pekerjaanPeserta.required' => 'Pekerjaan tidak boleh kosong.',
        'sukuPeserta.required' => 'Suku tidak boleh kosong.',
        'lokasiPeserta.required' => 'Lokasi tidak boleh kosong.',
        'institusiPeserta.required' => 'Naungan tidak boleh kosong.',
        'fotoPeserta.image' => 'Berkas harus berupa Gambar.'
      ]);

      $fotoPesertaUpload = '';
      if ($request->hasfile('fotoPeserta')) {
        $destination = "images/Peserta";
        $filename = $request->file('fotoPeserta');
        $filename->move($destination, $filename->getClientOriginalName());
        $fotoPesertaUpload = $filename->getClientOriginalName();
      }

      $upload = new Peserta;
      $upload->id_peserta = $this->randomCodesKetuaLokasiYMP();
      $upload->nama_peserta = $request->namaKontakPeserta;
      $upload->jk_peserta = $request->jenisKelaminPeserta;
      $upload->alamat_peserta = $request->alamatPeserta;
      $upload->no_hp_peserta = $request->noHpPeserta;
      $upload->tempat_lahir_peserta = $request->tempatLahirPeserta;
      $upload->tgl_lahir_peserta = $request->tanggalLahirPeserta;
      $upload->pekerjaan_peserta = $request->pekerjaanPeserta;
      $upload->suku_peserta = $request->sukuPeserta;
      $upload->status_peserta = $request->statusPeserta;
      $upload->lokasi_peserta = $cekLokasi->nama_lokasi;
      $upload->institusi_peserta = $request->institusiPeserta;
      $upload->foto_peserta = $fotoPesertaUpload;
      $upload->save();

      if($upload){
        $skala = new Skala;
        $skala->skala = $request->skalaPeserta;
        $skala->keterangan = $request->catatanPeserta;
        $skala->id_peserta = $upload->id_peserta;
        $skala->tgl_kontak = $request->tglKontakPeserta;
        $skala->status = 'Aktif';
        $skala->save();

        if ($skala) {
          $catatan = new Catatan;
          $catatan->catatan = $request->catatanPeserta;
          $catatan->id_peserta = $upload->id_peserta;
          $catatan->tgl_kontak = $request->tglKontakPeserta;
          $catatan->save();

          if ($catatan) {
            return redirect()->route('data-kontak.indexKetuaLokasiYMP')->with(['success' => 'Data Kontak Berhasil Disimpan!']);
          } else{
            return redirect()->route('data-kontak.indexKetuaLokasiYMP')->with(['error' => 'Data Kontak Gagal Disimpan!']);
          }
        } else{
          return redirect()->route('data-kontak.indexKetuaLokasiYMP')->with(['error' => 'Data Kontak Gagal Disimpan!']);
        }
      } else{
        return redirect()->route('data-kontak.indexKetuaLokasiYMP')->with(['error' => 'Data Kontak Gagal Disimpan!']);
      }
    }

    if ($request->inputTambah == "inputSkala") {
      $newSkala = new Skala;
      $newSkala->skala = $request->tambahSkalaPeserta;
      $newSkala->keterangan = $request->tambahKeteranganSkalaPeserta;
      $newSkala->id_peserta = $request->id_pesertaSkala;
      $newSkala->tgl_kontak = $request->tambahTgl_kontak;
      $newSkala->status = 'Aktif';
      $newSkala->save();
      // dd($request->inputTambah);

      if ($newSkala) {
        $newCatatans = new Catatan;
        $newCatatans->catatan = $request->tambahKeteranganSkalaPeserta;
        $newCatatans->id_peserta = $request->id_pesertaSkala;
        $newCatatans->tgl_kontak = $request->tambahTgl_kontak;
        $newCatatans->save();
        return redirect()->route('data-kontak.indexKetuaLokasiYMP')->with(['success' => 'Skala Berhasil Disimpan!']);
      } else {
        return redirect()->route('data-kontak.indexKetuaLokasiYMP')->with(['error' => 'Skala Gagal Disimpan!']);
      }
    }

    if ($request->inputTambah == "inputCatatan") {
      $newCatatan = new Catatan;
      $newCatatan->catatan = $request->tambahCatatanPeserta;
      $newCatatan->id_peserta = $request->id_pesertaCatatan;
      $newCatatan->tgl_kontak = $request->tambahTgl_kontakCatatan;
      $newCatatan->save();

      if ($newCatatan) {
        return redirect()->route('data-kontak.indexKetuaLokasiYMP')->with(['success' => 'Catatan Berhasil Disimpan!']);
      } else {
        return redirect()->route('data-kontak.indexKetuaLokasiYMP')->with(['error' => 'Catatan Gagal Disimpan!']);
      }
    }
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function updateKetuaLokasiYMP(Request $request, $id)
  {
    $pesertaUpdate = Peserta::find($id);
    if($request->file('editFotoPeserta') == "") {
      if ($request->editFotoTextPeserta == '') {
        $pesertaUpdate->update([
          'nama_peserta'     => $request->editNamaKontakPeserta,
          'jk_peserta'   => $request->editJenisKelaminPeserta,
          'alamat_peserta'   => $request->editAlamatPeserta,
          'no_hp_peserta'   => $request->editNoHpPeserta,
          'tempat_lahir_peserta'   => $request->editTempatLahirPeserta,
          'tgl_lahir_peserta'   => $request->editTanggalLahirPeserta,
          'pekerjaan_peserta'   => $request->editPekerjaanPeserta,
          'suku_peserta'   => $request->editSukuPeserta,
          'status_peserta'   => $request->editStatusPeserta,
          'institusi_peserta'   => $request->editInstitusiPeserta,
          'foto_peserta'     => ''
        ]);
      } else {
        $pesertaUpdate->update([
          'nama_peserta'     => $request->editNamaKontakPeserta,
          'jk_peserta'   => $request->editJenisKelaminPeserta,
          'alamat_peserta'   => $request->editAlamatPeserta,
          'no_hp_peserta'   => $request->editNoHpPeserta,
          'tempat_lahir_peserta'   => $request->editTempatLahirPeserta,
          'tgl_lahir_peserta'   => $request->editTanggalLahirPeserta,
          'pekerjaan_peserta'   => $request->editPekerjaanPeserta,
          'suku_peserta'   => $request->editSukuPeserta,
          'status_peserta'   => $request->editStatusPeserta,
          'institusi_peserta'   => $request->editInstitusiPeserta,
        ]);
      }
    } else {
      //hapus old image
      if ($pesertaUpdate->fotoPeserta != '') {
        $destination = 'images/Peserta/'.$pesertaUpdate->fotoPeserta;
        if (File::exists($destination)) {
          File::delete($destination);
        }
      } else {
        //upload new image
        $destination = "images/Peserta";
        $filename = $request->file('editFotoPeserta');
        $filename->move($destination, $filename->getClientOriginalName());
        $pesertaUpdate->update([
          'nama_peserta'     => $request->editNamaKontakPeserta,
          'jk_peserta'   => $request->editJenisKelaminPeserta,
          'alamat_peserta'   => $request->editAlamatPeserta,
          'no_hp_peserta'   => $request->editNoHpPeserta,
          'tempat_lahir_peserta'   => $request->editTempatLahirPeserta,
          'tgl_lahir_peserta'   => $request->editTanggalLahirPeserta,
          'pekerjaan_peserta'   => $request->editPekerjaanPeserta,
          'suku_peserta'   => $request->editSukuPeserta,
          'status_peserta'   => $request->editStatusPeserta,
          'institusi_peserta'   => $request->editInstitusiPeserta,
          'foto_peserta'     => $filename->getClientOriginalName()
        ]);
      }
    }
    if($pesertaUpdate){
      //redirect dengan pesan sukses
      return redirect()->route('data-kontak.indexKetuaLokasiYMP')->with(['success' => 'Kontak Berhasil Diubah!']);
    }else{
      //redirect dengan pesan error
      return redirect()->route('data-kontak.indexKetuaLokasiYMP')->with(['error' => 'Kontak Gagal Diubah!']);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function destroyKetuaLokasiYMP($id)
  {
    $deleteDataPeserta = Peserta::find($id);
    if ($deleteDataPeserta->foto_peserta != '') {
      $destination = 'images/Peserta/'.$deleteDataPeserta->foto_peserta;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    $deleteDataPeserta->delete();

    if($deleteDataPeserta){
      return redirect()->route('data-kontak.indexKetuaLokasiYMP')->with(['success' => 'Peserta Berhasil Dihapus!']);
    }else{
      return redirect()->route('data-kontak.indexKetuaLokasiYMP')->with(['error' => 'Peserta Gagal Dihapus!']);
    }
  }
  

  //Ketua Kelompok YMP
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function indexKetuaKelompokYMP()
  {
    $pesertas = Peserta::addSelect(['skala' => Skala::select('skala')
                ->whereColumn('id_peserta', 'pesertas.id_peserta')
                ->orderBy('created_at', 'desc')
                ->limit(1),
            'catatan' => Catatan::select('catatan')
                ->whereColumn('id_peserta', 'pesertas.id_peserta')
                ->orderBy('created_at', 'desc')
                ->limit(1)
            ])->get();
    
    // dd($cekLokasi);
    
    $peserts = Peserta::all();
    $skalas;
    foreach ($peserts as $pesert) {
      $skalas = Skala::where('id_peserta', '=', $pesert->id_peserta)->orderBy('created_at', 'desc')->get();
      $catatans = Catatan::where('id_peserta', '=', $pesert->id_peserta)->orderBy('created_at', 'desc')->get();
      // $getDataSkalas = Skala::where('id_peserta', '=', $pesert->id_peserta)->orderBy('created_at', 'desc')->get();
      // foreach ($skalas as $skala) {
        // $dataSkalas = $getDataSkala->tgl_kontak;
      // dd($skalas);
      // }
    }
    $no = 1;
    $noSkalas = 1;
    $noCatatans = 1;
    $lokasis = Lokasi::all();
    return view('ymp.ketua-kelompok.data-kontak', compact(['pesertas', 'no', 'lokasis', 'skalas', 'catatans', 'noSkalas', 'noCatatans']));
  }


  function randomCodesKetuaKelompokYMP()
  {
    do {
      $kode = random_int(100000000, 999999999);
    } while (Peserta::where("id_peserta", "=", $kode)->first());

    return $kode;
  }

  function randomCodesIDKelompokKetuaKelompokYMP()
  {
    do {
      $kode = random_int(100000000, 999999999);
    } while (Kelompok::where("id_kelompok", "=", $kode)->first());

    return $kode;
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function storeKetuaKelompokYMP(Request $request)
  {
    if ($request->inputTambah == "tambahData") {
      $request->validate([
        'tglKontakPeserta'     => 'required',
        'namaKontakPeserta'     => 'required',
        'jenisKelaminPeserta'   => 'required',
        'skalaPeserta'   => 'required',
        'catatanPeserta'   => 'required',
        'alamatPeserta'   => 'required',
        'noHpPeserta'   => 'required|numeric',
        'tempatLahirPeserta'   => 'required',
        'tanggalLahirPeserta'   => 'required',
        'pekerjaanPeserta'   => 'required',
        'sukuPeserta'   => 'required',
        'lokasiPeserta'   => 'required',
        'institusiPeserta'   => 'required',
        'fotoPRS'     => 'image|mimes:png,jpg,jpeg'
      ],
      [
        'namaKontakPeserta.required' => 'Nama tidak boleh kosong.',
        'jenisKelaminPeserta.required' => 'Jenis Kelamin tidak boleh kosong.',
        'skalaPeserta.required' => 'Skala tidak boleh kosong.',
        'catatanPeserta.required' => 'Catatan tidak boleh kosong.',
        'alamatPeserta.required' => 'Alamat tidak boleh kosong.',
        'noHpPeserta.required' => 'No Hp tidak boleh kosong.',
        'noHpPeserta.numeric' => 'No Hp harus berupa angka.',
        'tempatLahirPeserta.required' => 'Tempat Lahir tidak boleh kosong.',
        'tanggalLahirPeserta.required' => 'Tanggal Lahir tidak boleh kosong.',
        'pekerjaanPeserta.required' => 'Pekerjaan tidak boleh kosong.',
        'sukuPeserta.required' => 'Suku tidak boleh kosong.',
        'lokasiPeserta.required' => 'Lokasi tidak boleh kosong.',
        'institusiPeserta.required' => 'Naungan tidak boleh kosong.',
        'fotoPeserta.image' => 'Berkas harus berupa Gambar.'
      ]);

      $fotoPesertaUpload = '';
      if ($request->hasfile('fotoPeserta')) {
        $destination = "images/Peserta";
        $filename = $request->file('fotoPeserta');
        $filename->move($destination, $filename->getClientOriginalName());
        $fotoPesertaUpload = $filename->getClientOriginalName();
      }

      $upload = new Peserta;
      $upload->id_peserta = $this->randomCodesKetuaKelompokYMP();
      $upload->nama_peserta = $request->namaKontakPeserta;
      $upload->jk_peserta = $request->jenisKelaminPeserta;
      $upload->alamat_peserta = $request->alamatPeserta;
      $upload->no_hp_peserta = $request->noHpPeserta;
      $upload->tempat_lahir_peserta = $request->tempatLahirPeserta;
      $upload->tgl_lahir_peserta = $request->tanggalLahirPeserta;
      $upload->pekerjaan_peserta = $request->pekerjaanPeserta;
      $upload->suku_peserta = $request->sukuPeserta;
      $upload->status_peserta = $request->statusPeserta;
      $upload->lokasi_peserta = $request->lokasiPeserta;
      $upload->institusi_peserta = $request->institusiPeserta;
      $upload->foto_peserta = $fotoPesertaUpload;
      $upload->save();

      if($upload){
        $skala = new Skala;
        $skala->skala = $request->skalaPeserta;
        $skala->keterangan = $request->catatanPeserta;
        $skala->id_peserta = $upload->id_peserta;
        $skala->tgl_kontak = $request->tglKontakPeserta;
        $skala->status = 'Aktif';
        $skala->save();

        if ($skala) {
          $catatan = new Catatan;
          $catatan->catatan = $request->catatanPeserta;
          $catatan->id_peserta = $upload->id_peserta;
          $catatan->tgl_kontak = $request->tglKontakPeserta;
          $catatan->save();

          if ($catatan) {
            // $kelompok = new Kelompok;
            // $kelompok->id_kelompok = $this->randomCodesIDKelompokKetuaKelompokYMP();
            // $kelompok->id_ketua_kelompok = auth()->user()->id_user;
            // $kelompok->id_peserta = $upload->id_peserta;
            // $kelompok->generasi = 
            return redirect()->route('data-kontak.indexKetuaKelompokYMP')->with(['success' => 'Data Kontak Berhasil Disimpan!']);
          } else{
            return redirect()->route('data-kontak.indexKetuaKelompokYMP')->with(['error' => 'Data Kontak Gagal Disimpan!']);
          }
        } else{
          return redirect()->route('data-kontak.indexKetuaKelompokYMP')->with(['error' => 'Data Kontak Gagal Disimpan!']);
        }
      } else{
        return redirect()->route('data-kontak.indexKetuaKelompokYMP')->with(['error' => 'Data Kontak Gagal Disimpan!']);
      }
    }

    if ($request->inputTambah == "inputSkala") {
      $newSkala = new Skala;
      $newSkala->skala = $request->tambahSkalaPeserta;
      $newSkala->keterangan = $request->tambahKeteranganSkalaPeserta;
      $newSkala->id_peserta = $request->id_pesertaSkala;
      $newSkala->tgl_kontak = $request->tambahTgl_kontak;
      $newSkala->status = 'Aktif';
      $newSkala->save();
      // dd($request->inputTambah);

      if ($newSkala) {
        $newCatatans = new Catatan;
        $newCatatans->catatan = $request->tambahKeteranganSkalaPeserta;
        $newCatatans->id_peserta = $request->id_pesertaSkala;
        $newCatatans->tgl_kontak = $request->tambahTgl_kontak;
        $newCatatans->save();
        return redirect()->route('data-kontak.indexKetuaKelompokYMP')->with(['success' => 'Skala Berhasil Disimpan!']);
      } else {
        return redirect()->route('data-kontak.indexKetuaKelompokYMP')->with(['error' => 'Skala Gagal Disimpan!']);
      }
    }

    if ($request->inputTambah == "inputCatatan") {
      $newCatatan = new Catatan;
      $newCatatan->catatan = $request->tambahCatatanPeserta;
      $newCatatan->id_peserta = $request->id_pesertaCatatan;
      $newCatatan->tgl_kontak = $request->tambahTgl_kontakCatatan;
      $newCatatan->save();

      if ($newCatatan) {
        return redirect()->route('data-kontak.indexKetuaKelompokYMP')->with(['success' => 'Catatan Berhasil Disimpan!']);
      } else {
        return redirect()->route('data-kontak.indexKetuaKelompokYMP')->with(['error' => 'Catatan Gagal Disimpan!']);
      }
    }
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function updateKetuaKelompokYMP(Request $request, $id)
  {
    $pesertaUpdate = Peserta::find($id);
    if($request->file('editFotoPeserta') == "") {
      if ($request->editFotoTextPeserta == '') {
        $pesertaUpdate->update([
          'nama_peserta'     => $request->editNamaKontakPeserta,
          'jk_peserta'   => $request->editJenisKelaminPeserta,
          'alamat_peserta'   => $request->editAlamatPeserta,
          'no_hp_peserta'   => $request->editNoHpPeserta,
          'tempat_lahir_peserta'   => $request->editTempatLahirPeserta,
          'tgl_lahir_peserta'   => $request->editTanggalLahirPeserta,
          'pekerjaan_peserta'   => $request->editPekerjaanPeserta,
          'suku_peserta'   => $request->editSukuPeserta,
          'status_peserta'   => $request->editStatusPeserta,
          'institusi_peserta'   => $request->editInstitusiPeserta,
          'foto_peserta'     => ''
        ]);
      } else {
        $pesertaUpdate->update([
          'nama_peserta'     => $request->editNamaKontakPeserta,
          'jk_peserta'   => $request->editJenisKelaminPeserta,
          'alamat_peserta'   => $request->editAlamatPeserta,
          'no_hp_peserta'   => $request->editNoHpPeserta,
          'tempat_lahir_peserta'   => $request->editTempatLahirPeserta,
          'tgl_lahir_peserta'   => $request->editTanggalLahirPeserta,
          'pekerjaan_peserta'   => $request->editPekerjaanPeserta,
          'suku_peserta'   => $request->editSukuPeserta,
          'status_peserta'   => $request->editStatusPeserta,
          'institusi_peserta'   => $request->editInstitusiPeserta,
        ]);
      }
    } else {
      //hapus old image
      if ($pesertaUpdate->fotoPeserta != '') {
        $destination = 'images/Peserta/'.$pesertaUpdate->fotoPeserta;
        if (File::exists($destination)) {
          File::delete($destination);
        }
      } else {
        //upload new image
        $destination = "images/Peserta";
        $filename = $request->file('editFotoPeserta');
        $filename->move($destination, $filename->getClientOriginalName());
        $pesertaUpdate->update([
          'nama_peserta'     => $request->editNamaKontakPeserta,
          'jk_peserta'   => $request->editJenisKelaminPeserta,
          'alamat_peserta'   => $request->editAlamatPeserta,
          'no_hp_peserta'   => $request->editNoHpPeserta,
          'tempat_lahir_peserta'   => $request->editTempatLahirPeserta,
          'tgl_lahir_peserta'   => $request->editTanggalLahirPeserta,
          'pekerjaan_peserta'   => $request->editPekerjaanPeserta,
          'suku_peserta'   => $request->editSukuPeserta,
          'status_peserta'   => $request->editStatusPeserta,
          'institusi_peserta'   => $request->editInstitusiPeserta,
          'foto_peserta'     => $filename->getClientOriginalName()
        ]);
      }
    }
    if($pesertaUpdate){
      //redirect dengan pesan sukses
      return redirect()->route('data-kontak.indexKetuaKelompokYMP')->with(['success' => 'Kontak Berhasil Diubah!']);
    }else{
      //redirect dengan pesan error
      return redirect()->route('data-kontak.indexKetuaKelompokYMP')->with(['error' => 'Kontak Gagal Diubah!']);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function destroyKetuaKelompokYMP($id)
  {
    $deleteDataPeserta = Peserta::find($id);
    if ($deleteDataPeserta->foto_peserta != '') {
      $destination = 'images/Peserta/'.$deleteDataPeserta->foto_peserta;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    $deleteDataPeserta->delete();

    if($deleteDataPeserta){
      return redirect()->route('data-kontak.indexKetuaKelompokYMP')->with(['success' => 'Peserta Berhasil Dihapus!']);
    }else{
      return redirect()->route('data-kontak.indexKetuaKelompokYMP')->with(['error' => 'Peserta Gagal Dihapus!']);
    }
  }




  
  //Pengurus GKP
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function indexPengurusGKP()
  {
    $pesertas = Peserta::where('institusi_peserta', 'GKP (Gereja Kristen Parousia)')
                ->addSelect(['skala' => Skala::select('skala')
                ->whereColumn('id_peserta', 'pesertas.id_peserta')
                ->orderBy('created_at', 'desc')
                ->limit(1),
            'catatan' => Catatan::select('catatan')
                ->whereColumn('id_peserta', 'pesertas.id_peserta')
                ->orderBy('created_at', 'desc')
                ->limit(1)
            ])->get();

    $peserts = Peserta::all();
    $skalas;
    foreach ($peserts as $pesert) {
      $skalas = Skala::where('id_peserta', '=', $pesert->id_peserta)->orderBy('created_at', 'desc')->get();
      $catatans = Catatan::where('id_peserta', '=', $pesert->id_peserta)->orderBy('created_at', 'desc')->get();
      // $getDataSkalas = Skala::where('id_peserta', '=', $pesert->id_peserta)->orderBy('created_at', 'desc')->get();
      // foreach ($skalas as $skala) {
        // $dataSkalas = $getDataSkala->tgl_kontak;
      // dd($skalas);
      // }
    }
    $no = 1;
    $noSkalas = 1;
    $noCatatans = 1;
    $lokasis = Lokasi::all();
    return view('gkp.pengurus.data-kontak', compact(['pesertas', 'no', 'lokasis', 'skalas', 'catatans', 'noSkalas', 'noCatatans']));
  }

  
  function randomCodesPengurusGKP()
  {
    do {
      $kode = random_int(100000000, 999999999);
    } while (Peserta::where("id_peserta", "=", $kode)->first());

    return $kode;
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function storePengurusGKP(Request $request)
  {
    if ($request->inputTambah == "tambahData") {
      $request->validate([
        'tglKontakPeserta'     => 'required',
        'namaKontakPeserta'     => 'required',
        'jenisKelaminPeserta'   => 'required',
        'skalaPeserta'   => 'required',
        'catatanPeserta'   => 'required',
        'alamatPeserta'   => 'required',
        'noHpPeserta'   => 'required|numeric',
        'tempatLahirPeserta'   => 'required',
        'tanggalLahirPeserta'   => 'required',
        'pekerjaanPeserta'   => 'required',
        'sukuPeserta'   => 'required',
        'lokasiPeserta'   => 'required',
        'institusiPeserta'   => 'required',
        'fotoPRS'     => 'image|mimes:png,jpg,jpeg'
      ],
      [
        'namaKontakPeserta.required' => 'Nama tidak boleh kosong.',
        'jenisKelaminPeserta.required' => 'Jenis Kelamin tidak boleh kosong.',
        'skalaPeserta.required' => 'Skala tidak boleh kosong.',
        'catatanPeserta.required' => 'Catatan tidak boleh kosong.',
        'alamatPeserta.required' => 'Alamat tidak boleh kosong.',
        'noHpPeserta.required' => 'No Hp tidak boleh kosong.',
        'noHpPeserta.numeric' => 'No Hp harus berupa angka.',
        'tempatLahirPeserta.required' => 'Tempat Lahir tidak boleh kosong.',
        'tanggalLahirPeserta.required' => 'Tanggal Lahir tidak boleh kosong.',
        'pekerjaanPeserta.required' => 'Pekerjaan tidak boleh kosong.',
        'sukuPeserta.required' => 'Suku tidak boleh kosong.',
        'lokasiPeserta.required' => 'Lokasi tidak boleh kosong.',
        'institusiPeserta.required' => 'Naungan tidak boleh kosong.',
        'fotoPeserta.image' => 'Berkas harus berupa Gambar.'
      ]);

      $fotoPesertaUpload = '';
      if ($request->hasfile('fotoPeserta')) {
        $destination = "images/Peserta";
        $filename = $request->file('fotoPeserta');
        $filename->move($destination, $filename->getClientOriginalName());
        $fotoPesertaUpload = $filename->getClientOriginalName();
      }

      $upload = new Peserta;
      $upload->id_peserta = $this->randomCodesPengurusGKP();
      $upload->nama_peserta = $request->namaKontakPeserta;
      $upload->jk_peserta = $request->jenisKelaminPeserta;
      $upload->alamat_peserta = $request->alamatPeserta;
      $upload->no_hp_peserta = $request->noHpPeserta;
      $upload->tempat_lahir_peserta = $request->tempatLahirPeserta;
      $upload->tgl_lahir_peserta = $request->tanggalLahirPeserta;
      $upload->pekerjaan_peserta = $request->pekerjaanPeserta;
      $upload->suku_peserta = $request->sukuPeserta;
      $upload->status_peserta = $request->statusPeserta;
      $upload->lokasi_peserta = $request->lokasiPeserta;
      $upload->institusi_peserta = $request->institusiPeserta;
      $upload->foto_peserta = $fotoPesertaUpload;
      $upload->save();

      if($upload){
        $skala = new Skala;
        $skala->skala = $request->skalaPeserta;
        $skala->keterangan = $request->catatanPeserta;
        $skala->id_peserta = $upload->id_peserta;
        $skala->tgl_kontak = $request->tglKontakPeserta;
        $skala->status = 'Aktif';
        $skala->save();

        if ($skala) {
          $catatan = new Catatan;
          $catatan->catatan = $request->catatanPeserta;
          $catatan->id_peserta = $upload->id_peserta;
          $catatan->tgl_kontak = $request->tglKontakPeserta;
          $catatan->save();

          if ($catatan) {
            return redirect()->route('data-kontak.indexPengurusGKP')->with(['success' => 'Data Kontak Berhasil Disimpan!']);
          } else{
            return redirect()->route('data-kontak.indexPengurusGKP')->with(['error' => 'Data Kontak Gagal Disimpan!']);
          }
        } else{
          return redirect()->route('data-kontak.indexPengurusGKP')->with(['error' => 'Data Kontak Gagal Disimpan!']);
        }
      } else{
        return redirect()->route('data-kontak.indexPengurusGKP')->with(['error' => 'Data Kontak Gagal Disimpan!']);
      }
    }

    if ($request->inputTambah == "inputSkala") {
      $newSkala = new Skala;
      $newSkala->skala = $request->tambahSkalaPeserta;
      $newSkala->keterangan = $request->tambahKeteranganSkalaPeserta;
      $newSkala->id_peserta = $request->id_pesertaSkala;
      $newSkala->tgl_kontak = $request->tambahTgl_kontak;
      $newSkala->status = 'Aktif';
      $newSkala->save();
      // dd($request->inputTambah);

      if ($newSkala) {
        $newCatatans = new Catatan;
        $newCatatans->catatan = $request->tambahKeteranganSkalaPeserta;
        $newCatatans->id_peserta = $request->id_pesertaSkala;
        $newCatatans->tgl_kontak = $request->tambahTgl_kontak;
        $newCatatans->save();
        return redirect()->route('data-kontak.indexPengurusGKP')->with(['success' => 'Skala Berhasil Disimpan!']);
      } else {
        return redirect()->route('data-kontak.indexPengurusGKP')->with(['error' => 'Skala Gagal Disimpan!']);
      }
    }

    if ($request->inputTambah == "inputCatatan") {
      $newCatatan = new Catatan;
      $newCatatan->catatan = $request->tambahCatatanPeserta;
      $newCatatan->id_peserta = $request->id_pesertaCatatan;
      $newCatatan->tgl_kontak = $request->tambahTgl_kontakCatatan;
      $newCatatan->save();

      if ($newCatatan) {
        return redirect()->route('data-kontak.indexPengurusGKP')->with(['success' => 'Catatan Berhasil Disimpan!']);
      } else {
        return redirect()->route('data-kontak.indexPengurusGKP')->with(['error' => 'Catatan Gagal Disimpan!']);
      }
    }
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function updatePengurusGKP(Request $request, $id)
  {
    $pesertaUpdate = Peserta::find($id);
    if($request->file('editFotoPeserta') == "") {
      if ($request->editFotoTextPeserta == '') {
        $pesertaUpdate->update([
          'nama_peserta'     => $request->editNamaKontakPeserta,
          'jk_peserta'   => $request->editJenisKelaminPeserta,
          'alamat_peserta'   => $request->editAlamatPeserta,
          'no_hp_peserta'   => $request->editNoHpPeserta,
          'tempat_lahir_peserta'   => $request->editTempatLahirPeserta,
          'tgl_lahir_peserta'   => $request->editTanggalLahirPeserta,
          'pekerjaan_peserta'   => $request->editPekerjaanPeserta,
          'suku_peserta'   => $request->editSukuPeserta,
          'status_peserta'   => $request->editStatusPeserta,
          'lokasi_peserta'   => $request->editLokasiPeserta,
          'institusi_peserta'   => $request->editInstitusiPeserta,
          'foto_peserta'     => ''
        ]);
      } else {
        $pesertaUpdate->update([
          'nama_peserta'     => $request->editNamaKontakPeserta,
          'jk_peserta'   => $request->editJenisKelaminPeserta,
          'alamat_peserta'   => $request->editAlamatPeserta,
          'no_hp_peserta'   => $request->editNoHpPeserta,
          'tempat_lahir_peserta'   => $request->editTempatLahirPeserta,
          'tgl_lahir_peserta'   => $request->editTanggalLahirPeserta,
          'pekerjaan_peserta'   => $request->editPekerjaanPeserta,
          'suku_peserta'   => $request->editSukuPeserta,
          'status_peserta'   => $request->editStatusPeserta,
          'lokasi_peserta'   => $request->editLokasiPeserta,
          'institusi_peserta'   => $request->editInstitusiPeserta,
        ]);
      }
    } else {
      //hapus old image
      if ($pesertaUpdate->fotoPeserta != '') {
        $destination = 'images/Peserta/'.$pesertaUpdate->fotoPeserta;
        if (File::exists($destination)) {
          File::delete($destination);
        }
      } else {
        //upload new image
        $destination = "images/Peserta";
        $filename = $request->file('editFotoPeserta');
        $filename->move($destination, $filename->getClientOriginalName());
        $pesertaUpdate->update([
          'nama_peserta'     => $request->editNamaKontakPeserta,
          'jk_peserta'   => $request->editJenisKelaminPeserta,
          'alamat_peserta'   => $request->editAlamatPeserta,
          'no_hp_peserta'   => $request->editNoHpPeserta,
          'tempat_lahir_peserta'   => $request->editTempatLahirPeserta,
          'tgl_lahir_peserta'   => $request->editTanggalLahirPeserta,
          'pekerjaan_peserta'   => $request->editPekerjaanPeserta,
          'suku_peserta'   => $request->editSukuPeserta,
          'status_peserta'   => $request->editStatusPeserta,
          'lokasi_peserta'   => $request->editLokasiPeserta,
          'institusi_peserta'   => $request->editInstitusiPeserta,
          'foto_peserta'     => $filename->getClientOriginalName()
        ]);
      }
    }
    if($pesertaUpdate){
      //redirect dengan pesan sukses
      return redirect()->route('data-kontak.indexPengurusGKP')->with(['success' => 'Kontak Berhasil Diubah!']);
    }else{
      //redirect dengan pesan error
      return redirect()->route('data-kontak.indexPengurusGKP')->with(['error' => 'Kontak Gagal Diubah!']);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function destroyPengurusGKP($id)
  {
    $deleteDataPeserta = Peserta::find($id);
    if ($deleteDataPeserta->foto_peserta != '') {
      $destination = 'images/Peserta/'.$deleteDataPeserta->foto_peserta;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    $deleteDataPeserta->delete();

    if($deleteDataPeserta){
      return redirect()->route('data-kontak.indexPengurusGKP')->with(['success' => 'Peserta Berhasil Dihapus!']);
    }else{
      return redirect()->route('data-kontak.indexPengurusGKP')->with(['error' => 'Peserta Gagal Dihapus!']);
    }
  }

  
  //Ketua Lokasi YMP
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function indexKetuaLokasiGKP()
  {
    $cekKetuaLokasi = Ketua_lokasi::where('alamat_surelKL', auth()->user()->email)->first();
    $cekLokasi = Lokasi::where('nama_lokasi', $cekKetuaLokasi->lokasiKL)->first();
    $pesertas = Peserta::where('lokasi_peserta', $cekLokasi->nama_lokasi)
                ->addSelect(['skala' => Skala::select('skala')
                ->whereColumn('id_peserta', 'pesertas.id_peserta')
                ->orderBy('created_at', 'desc')
                ->limit(1),
            'catatan' => Catatan::select('catatan')
                ->whereColumn('id_peserta', 'pesertas.id_peserta')
                ->orderBy('created_at', 'desc')
                ->limit(1)
            ])->get();
    
    // dd($cekLokasi);

    $peserts = Peserta::all();
    $skalas;
    foreach ($peserts as $pesert) {
      $skalas = Skala::where('id_peserta', '=', $pesert->id_peserta)->orderBy('created_at', 'desc')->get();
      $catatans = Catatan::where('id_peserta', '=', $pesert->id_peserta)->orderBy('created_at', 'desc')->get();
      // $getDataSkalas = Skala::where('id_peserta', '=', $pesert->id_peserta)->orderBy('created_at', 'desc')->get();
      // foreach ($skalas as $skala) {
        // $dataSkalas = $getDataSkala->tgl_kontak;
      // dd($skalas);
      // }
    }
    $no = 1;
    $noSkalas = 1;
    $noCatatans = 1;
    $lokasis = Lokasi::all();
    return view('gkp.ketua-lokasi.data-kontak', compact(['pesertas', 'no', 'lokasis', 'skalas', 'catatans', 'noSkalas', 'noCatatans']));
  }


  function randomCodesKetuaLokasiGKP()
  {
    do {
      $kode = random_int(100000000, 999999999);
    } while (Peserta::where("id_peserta", "=", $kode)->first());

    return $kode;
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function storeKetuaLokasiGKP(Request $request)
  {
    $cekKetuaLokasi = Ketua_lokasi::where('alamat_surelKL', auth()->user()->email)->first();
    $cekLokasi = Lokasi::where('nama_lokasi', $cekKetuaLokasi->lokasiKL)->first();
    if ($request->inputTambah == "tambahData") {
      $request->validate([
        'tglKontakPeserta'     => 'required',
        'namaKontakPeserta'     => 'required',
        'jenisKelaminPeserta'   => 'required',
        'skalaPeserta'   => 'required',
        'catatanPeserta'   => 'required',
        'alamatPeserta'   => 'required',
        'noHpPeserta'   => 'required|numeric',
        'tempatLahirPeserta'   => 'required',
        'tanggalLahirPeserta'   => 'required',
        'pekerjaanPeserta'   => 'required',
        'sukuPeserta'   => 'required',
        'lokasiPeserta'   => 'required',
        'institusiPeserta'   => 'required',
        'fotoPRS'     => 'image|mimes:png,jpg,jpeg'
      ],
      [
        'namaKontakPeserta.required' => 'Nama tidak boleh kosong.',
        'jenisKelaminPeserta.required' => 'Jenis Kelamin tidak boleh kosong.',
        'skalaPeserta.required' => 'Skala tidak boleh kosong.',
        'catatanPeserta.required' => 'Catatan tidak boleh kosong.',
        'alamatPeserta.required' => 'Alamat tidak boleh kosong.',
        'noHpPeserta.required' => 'No Hp tidak boleh kosong.',
        'noHpPeserta.numeric' => 'No Hp harus berupa angka.',
        'tempatLahirPeserta.required' => 'Tempat Lahir tidak boleh kosong.',
        'tanggalLahirPeserta.required' => 'Tanggal Lahir tidak boleh kosong.',
        'pekerjaanPeserta.required' => 'Pekerjaan tidak boleh kosong.',
        'sukuPeserta.required' => 'Suku tidak boleh kosong.',
        'lokasiPeserta.required' => 'Lokasi tidak boleh kosong.',
        'institusiPeserta.required' => 'Naungan tidak boleh kosong.',
        'fotoPeserta.image' => 'Berkas harus berupa Gambar.'
      ]);

      $fotoPesertaUpload = '';
      if ($request->hasfile('fotoPeserta')) {
        $destination = "images/Peserta";
        $filename = $request->file('fotoPeserta');
        $filename->move($destination, $filename->getClientOriginalName());
        $fotoPesertaUpload = $filename->getClientOriginalName();
      }

      $upload = new Peserta;
      $upload->id_peserta = $this->randomCodesKetuaLokasiGKP();
      $upload->nama_peserta = $request->namaKontakPeserta;
      $upload->jk_peserta = $request->jenisKelaminPeserta;
      $upload->alamat_peserta = $request->alamatPeserta;
      $upload->no_hp_peserta = $request->noHpPeserta;
      $upload->tempat_lahir_peserta = $request->tempatLahirPeserta;
      $upload->tgl_lahir_peserta = $request->tanggalLahirPeserta;
      $upload->pekerjaan_peserta = $request->pekerjaanPeserta;
      $upload->suku_peserta = $request->sukuPeserta;
      $upload->status_peserta = $request->statusPeserta;
      $upload->lokasi_peserta = $cekLokasi->nama_lokasi;
      $upload->institusi_peserta = $request->institusiPeserta;
      $upload->foto_peserta = $fotoPesertaUpload;
      $upload->save();

      if($upload){
        $skala = new Skala;
        $skala->skala = $request->skalaPeserta;
        $skala->keterangan = $request->catatanPeserta;
        $skala->id_peserta = $upload->id_peserta;
        $skala->tgl_kontak = $request->tglKontakPeserta;
        $skala->status = 'Aktif';
        $skala->save();

        if ($skala) {
          $catatan = new Catatan;
          $catatan->catatan = $request->catatanPeserta;
          $catatan->id_peserta = $upload->id_peserta;
          $catatan->tgl_kontak = $request->tglKontakPeserta;
          $catatan->save();

          if ($catatan) {
            return redirect()->route('data-kontak.indexKetuaLokasiGKP')->with(['success' => 'Data Kontak Berhasil Disimpan!']);
          } else{
            return redirect()->route('data-kontak.indexKetuaLokasiGKP')->with(['error' => 'Data Kontak Gagal Disimpan!']);
          }
        } else{
          return redirect()->route('data-kontak.indexKetuaLokasiGKP')->with(['error' => 'Data Kontak Gagal Disimpan!']);
        }
      } else{
        return redirect()->route('data-kontak.indexKetuaLokasiGKP')->with(['error' => 'Data Kontak Gagal Disimpan!']);
      }
    }

    if ($request->inputTambah == "inputSkala") {
      $newSkala = new Skala;
      $newSkala->skala = $request->tambahSkalaPeserta;
      $newSkala->keterangan = $request->tambahKeteranganSkalaPeserta;
      $newSkala->id_peserta = $request->id_pesertaSkala;
      $newSkala->tgl_kontak = $request->tambahTgl_kontak;
      $newSkala->status = 'Aktif';
      $newSkala->save();
      // dd($request->inputTambah);

      if ($newSkala) {
        $newCatatans = new Catatan;
        $newCatatans->catatan = $request->tambahKeteranganSkalaPeserta;
        $newCatatans->id_peserta = $request->id_pesertaSkala;
        $newCatatans->tgl_kontak = $request->tambahTgl_kontak;
        $newCatatans->save();
        return redirect()->route('data-kontak.indexKetuaLokasiGKP')->with(['success' => 'Skala Berhasil Disimpan!']);
      } else {
        return redirect()->route('data-kontak.indexKetuaLokasiGKP')->with(['error' => 'Skala Gagal Disimpan!']);
      }
    }

    if ($request->inputTambah == "inputCatatan") {
      $newCatatan = new Catatan;
      $newCatatan->catatan = $request->tambahCatatanPeserta;
      $newCatatan->id_peserta = $request->id_pesertaCatatan;
      $newCatatan->tgl_kontak = $request->tambahTgl_kontakCatatan;
      $newCatatan->save();

      if ($newCatatan) {
        return redirect()->route('data-kontak.indexKetuaLokasiGKP')->with(['success' => 'Catatan Berhasil Disimpan!']);
      } else {
        return redirect()->route('data-kontak.indexKetuaLokasiGKP')->with(['error' => 'Catatan Gagal Disimpan!']);
      }
    }
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function updateKetuaLokasiGKP(Request $request, $id)
  {
    $pesertaUpdate = Peserta::find($id);
    if($request->file('editFotoPeserta') == "") {
      if ($request->editFotoTextPeserta == '') {
        $pesertaUpdate->update([
          'nama_peserta'     => $request->editNamaKontakPeserta,
          'jk_peserta'   => $request->editJenisKelaminPeserta,
          'alamat_peserta'   => $request->editAlamatPeserta,
          'no_hp_peserta'   => $request->editNoHpPeserta,
          'tempat_lahir_peserta'   => $request->editTempatLahirPeserta,
          'tgl_lahir_peserta'   => $request->editTanggalLahirPeserta,
          'pekerjaan_peserta'   => $request->editPekerjaanPeserta,
          'suku_peserta'   => $request->editSukuPeserta,
          'status_peserta'   => $request->editStatusPeserta,
          'institusi_peserta'   => $request->editInstitusiPeserta,
          'foto_peserta'     => ''
        ]);
      } else {
        $pesertaUpdate->update([
          'nama_peserta'     => $request->editNamaKontakPeserta,
          'jk_peserta'   => $request->editJenisKelaminPeserta,
          'alamat_peserta'   => $request->editAlamatPeserta,
          'no_hp_peserta'   => $request->editNoHpPeserta,
          'tempat_lahir_peserta'   => $request->editTempatLahirPeserta,
          'tgl_lahir_peserta'   => $request->editTanggalLahirPeserta,
          'pekerjaan_peserta'   => $request->editPekerjaanPeserta,
          'suku_peserta'   => $request->editSukuPeserta,
          'status_peserta'   => $request->editStatusPeserta,
          'institusi_peserta'   => $request->editInstitusiPeserta,
        ]);
      }
    } else {
      //hapus old image
      if ($pesertaUpdate->fotoPeserta != '') {
        $destination = 'images/Peserta/'.$pesertaUpdate->fotoPeserta;
        if (File::exists($destination)) {
          File::delete($destination);
        }
      } else {
        //upload new image
        $destination = "images/Peserta";
        $filename = $request->file('editFotoPeserta');
        $filename->move($destination, $filename->getClientOriginalName());
        $pesertaUpdate->update([
          'nama_peserta'     => $request->editNamaKontakPeserta,
          'jk_peserta'   => $request->editJenisKelaminPeserta,
          'alamat_peserta'   => $request->editAlamatPeserta,
          'no_hp_peserta'   => $request->editNoHpPeserta,
          'tempat_lahir_peserta'   => $request->editTempatLahirPeserta,
          'tgl_lahir_peserta'   => $request->editTanggalLahirPeserta,
          'pekerjaan_peserta'   => $request->editPekerjaanPeserta,
          'suku_peserta'   => $request->editSukuPeserta,
          'status_peserta'   => $request->editStatusPeserta,
          'institusi_peserta'   => $request->editInstitusiPeserta,
          'foto_peserta'     => $filename->getClientOriginalName()
        ]);
      }
    }
    if($pesertaUpdate){
      //redirect dengan pesan sukses
      return redirect()->route('data-kontak.indexKetuaLokasiGKP')->with(['success' => 'Kontak Berhasil Diubah!']);
    }else{
      //redirect dengan pesan error
      return redirect()->route('data-kontak.indexKetuaLokasiGKP')->with(['error' => 'Kontak Gagal Diubah!']);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function destroyKetuaLokasiGKP($id)
  {
    $deleteDataPeserta = Peserta::find($id);
    if ($deleteDataPeserta->foto_peserta != '') {
      $destination = 'images/Peserta/'.$deleteDataPeserta->foto_peserta;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    $deleteDataPeserta->delete();

    if($deleteDataPeserta){
      return redirect()->route('data-kontak.indexKetuaLokasiGKP')->with(['success' => 'Peserta Berhasil Dihapus!']);
    }else{
      return redirect()->route('data-kontak.indexKetuaLokasiGKP')->with(['error' => 'Peserta Gagal Dihapus!']);
    }
  }
  

  //Ketua Kelompok YMP
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function indexKetuaKelompokGKP()
  {
    $pesertas = Peserta::addSelect(['skala' => Skala::select('skala')
                ->whereColumn('id_peserta', 'pesertas.id_peserta')
                ->orderBy('created_at', 'desc')
                ->limit(1),
            'catatan' => Catatan::select('catatan')
                ->whereColumn('id_peserta', 'pesertas.id_peserta')
                ->orderBy('created_at', 'desc')
                ->limit(1)
            ])->get();
    
    // dd($cekLokasi);
    
    $peserts = Peserta::all();
    $skalas;
    foreach ($peserts as $pesert) {
      $skalas = Skala::where('id_peserta', '=', $pesert->id_peserta)->orderBy('created_at', 'desc')->get();
      $catatans = Catatan::where('id_peserta', '=', $pesert->id_peserta)->orderBy('created_at', 'desc')->get();
      // $getDataSkalas = Skala::where('id_peserta', '=', $pesert->id_peserta)->orderBy('created_at', 'desc')->get();
      // foreach ($skalas as $skala) {
        // $dataSkalas = $getDataSkala->tgl_kontak;
      // dd($skalas);
      // }
    }
    $no = 1;
    $noSkalas = 1;
    $noCatatans = 1;
    $lokasis = Lokasi::all();
    return view('gkp.ketua-kelompok.data-kontak', compact(['pesertas', 'no', 'lokasis', 'skalas', 'catatans', 'noSkalas', 'noCatatans']));
  }


  function randomCodesKetuaKelompokGKP()
  {
    do {
      $kode = random_int(100000000, 999999999);
    } while (Peserta::where("id_peserta", "=", $kode)->first());

    return $kode;
  }

  function randomCodesIDKelompokKetuaKelompokGKP()
  {
    do {
      $kode = random_int(100000000, 999999999);
    } while (Kelompok::where("id_kelompok", "=", $kode)->first());

    return $kode;
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function storeKetuaKelompokGKP(Request $request)
  {
    if ($request->inputTambah == "tambahData") {
      $request->validate([
        'tglKontakPeserta'     => 'required',
        'namaKontakPeserta'     => 'required',
        'jenisKelaminPeserta'   => 'required',
        'skalaPeserta'   => 'required',
        'catatanPeserta'   => 'required',
        'alamatPeserta'   => 'required',
        'noHpPeserta'   => 'required|numeric',
        'tempatLahirPeserta'   => 'required',
        'tanggalLahirPeserta'   => 'required',
        'pekerjaanPeserta'   => 'required',
        'sukuPeserta'   => 'required',
        'lokasiPeserta'   => 'required',
        'institusiPeserta'   => 'required',
        'fotoPRS'     => 'image|mimes:png,jpg,jpeg'
      ],
      [
        'namaKontakPeserta.required' => 'Nama tidak boleh kosong.',
        'jenisKelaminPeserta.required' => 'Jenis Kelamin tidak boleh kosong.',
        'skalaPeserta.required' => 'Skala tidak boleh kosong.',
        'catatanPeserta.required' => 'Catatan tidak boleh kosong.',
        'alamatPeserta.required' => 'Alamat tidak boleh kosong.',
        'noHpPeserta.required' => 'No Hp tidak boleh kosong.',
        'noHpPeserta.numeric' => 'No Hp harus berupa angka.',
        'tempatLahirPeserta.required' => 'Tempat Lahir tidak boleh kosong.',
        'tanggalLahirPeserta.required' => 'Tanggal Lahir tidak boleh kosong.',
        'pekerjaanPeserta.required' => 'Pekerjaan tidak boleh kosong.',
        'sukuPeserta.required' => 'Suku tidak boleh kosong.',
        'lokasiPeserta.required' => 'Lokasi tidak boleh kosong.',
        'institusiPeserta.required' => 'Naungan tidak boleh kosong.',
        'fotoPeserta.image' => 'Berkas harus berupa Gambar.'
      ]);

      $fotoPesertaUpload = '';
      if ($request->hasfile('fotoPeserta')) {
        $destination = "images/Peserta";
        $filename = $request->file('fotoPeserta');
        $filename->move($destination, $filename->getClientOriginalName());
        $fotoPesertaUpload = $filename->getClientOriginalName();
      }

      $upload = new Peserta;
      $upload->id_peserta = $this->randomCodesKetuaKelompokGKP();
      $upload->nama_peserta = $request->namaKontakPeserta;
      $upload->jk_peserta = $request->jenisKelaminPeserta;
      $upload->alamat_peserta = $request->alamatPeserta;
      $upload->no_hp_peserta = $request->noHpPeserta;
      $upload->tempat_lahir_peserta = $request->tempatLahirPeserta;
      $upload->tgl_lahir_peserta = $request->tanggalLahirPeserta;
      $upload->pekerjaan_peserta = $request->pekerjaanPeserta;
      $upload->suku_peserta = $request->sukuPeserta;
      $upload->status_peserta = $request->statusPeserta;
      $upload->lokasi_peserta = $request->lokasiPeserta;
      $upload->institusi_peserta = $request->institusiPeserta;
      $upload->foto_peserta = $fotoPesertaUpload;
      $upload->save();

      if($upload){
        $skala = new Skala;
        $skala->skala = $request->skalaPeserta;
        $skala->keterangan = $request->catatanPeserta;
        $skala->id_peserta = $upload->id_peserta;
        $skala->tgl_kontak = $request->tglKontakPeserta;
        $skala->status = 'Aktif';
        $skala->save();

        if ($skala) {
          $catatan = new Catatan;
          $catatan->catatan = $request->catatanPeserta;
          $catatan->id_peserta = $upload->id_peserta;
          $catatan->tgl_kontak = $request->tglKontakPeserta;
          $catatan->save();

          if ($catatan) {
            // $kelompok = new Kelompok;
            // $kelompok->id_kelompok = $this->randomCodesIDKelompokKetuaKelompokGKP();
            // $kelompok->id_ketua_kelompok = auth()->user()->id_user;
            // $kelompok->id_peserta = $upload->id_peserta;
            // $kelompok->generasi = 
            return redirect()->route('data-kontak.indexKetuaKelompokGKP')->with(['success' => 'Data Kontak Berhasil Disimpan!']);
          } else{
            return redirect()->route('data-kontak.indexKetuaKelompokGKP')->with(['error' => 'Data Kontak Gagal Disimpan!']);
          }
        } else{
          return redirect()->route('data-kontak.indexKetuaKelompokGKP')->with(['error' => 'Data Kontak Gagal Disimpan!']);
        }
      } else{
        return redirect()->route('data-kontak.indexKetuaKelompokGKP')->with(['error' => 'Data Kontak Gagal Disimpan!']);
      }
    }

    if ($request->inputTambah == "inputSkala") {
      $newSkala = new Skala;
      $newSkala->skala = $request->tambahSkalaPeserta;
      $newSkala->keterangan = $request->tambahKeteranganSkalaPeserta;
      $newSkala->id_peserta = $request->id_pesertaSkala;
      $newSkala->tgl_kontak = $request->tambahTgl_kontak;
      $newSkala->status = 'Aktif';
      $newSkala->save();
      // dd($request->inputTambah);

      if ($newSkala) {
        $newCatatans = new Catatan;
        $newCatatans->catatan = $request->tambahKeteranganSkalaPeserta;
        $newCatatans->id_peserta = $request->id_pesertaSkala;
        $newCatatans->tgl_kontak = $request->tambahTgl_kontak;
        $newCatatans->save();
        return redirect()->route('data-kontak.indexKetuaKelompokGKP')->with(['success' => 'Skala Berhasil Disimpan!']);
      } else {
        return redirect()->route('data-kontak.indexKetuaKelompokGKP')->with(['error' => 'Skala Gagal Disimpan!']);
      }
    }

    if ($request->inputTambah == "inputCatatan") {
      $newCatatan = new Catatan;
      $newCatatan->catatan = $request->tambahCatatanPeserta;
      $newCatatan->id_peserta = $request->id_pesertaCatatan;
      $newCatatan->tgl_kontak = $request->tambahTgl_kontakCatatan;
      $newCatatan->save();

      if ($newCatatan) {
        return redirect()->route('data-kontak.indexKetuaKelompokGKP')->with(['success' => 'Catatan Berhasil Disimpan!']);
      } else {
        return redirect()->route('data-kontak.indexKetuaKelompokGKP')->with(['error' => 'Catatan Gagal Disimpan!']);
      }
    }
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function updateKetuaKelompokGKP(Request $request, $id)
  {
    $pesertaUpdate = Peserta::find($id);
    if($request->file('editFotoPeserta') == "") {
      if ($request->editFotoTextPeserta == '') {
        $pesertaUpdate->update([
          'nama_peserta'     => $request->editNamaKontakPeserta,
          'jk_peserta'   => $request->editJenisKelaminPeserta,
          'alamat_peserta'   => $request->editAlamatPeserta,
          'no_hp_peserta'   => $request->editNoHpPeserta,
          'tempat_lahir_peserta'   => $request->editTempatLahirPeserta,
          'tgl_lahir_peserta'   => $request->editTanggalLahirPeserta,
          'pekerjaan_peserta'   => $request->editPekerjaanPeserta,
          'suku_peserta'   => $request->editSukuPeserta,
          'status_peserta'   => $request->editStatusPeserta,
          'institusi_peserta'   => $request->editInstitusiPeserta,
          'foto_peserta'     => ''
        ]);
      } else {
        $pesertaUpdate->update([
          'nama_peserta'     => $request->editNamaKontakPeserta,
          'jk_peserta'   => $request->editJenisKelaminPeserta,
          'alamat_peserta'   => $request->editAlamatPeserta,
          'no_hp_peserta'   => $request->editNoHpPeserta,
          'tempat_lahir_peserta'   => $request->editTempatLahirPeserta,
          'tgl_lahir_peserta'   => $request->editTanggalLahirPeserta,
          'pekerjaan_peserta'   => $request->editPekerjaanPeserta,
          'suku_peserta'   => $request->editSukuPeserta,
          'status_peserta'   => $request->editStatusPeserta,
          'institusi_peserta'   => $request->editInstitusiPeserta,
        ]);
      }
    } else {
      //hapus old image
      if ($pesertaUpdate->fotoPeserta != '') {
        $destination = 'images/Peserta/'.$pesertaUpdate->fotoPeserta;
        if (File::exists($destination)) {
          File::delete($destination);
        }
      } else {
        //upload new image
        $destination = "images/Peserta";
        $filename = $request->file('editFotoPeserta');
        $filename->move($destination, $filename->getClientOriginalName());
        $pesertaUpdate->update([
          'nama_peserta'     => $request->editNamaKontakPeserta,
          'jk_peserta'   => $request->editJenisKelaminPeserta,
          'alamat_peserta'   => $request->editAlamatPeserta,
          'no_hp_peserta'   => $request->editNoHpPeserta,
          'tempat_lahir_peserta'   => $request->editTempatLahirPeserta,
          'tgl_lahir_peserta'   => $request->editTanggalLahirPeserta,
          'pekerjaan_peserta'   => $request->editPekerjaanPeserta,
          'suku_peserta'   => $request->editSukuPeserta,
          'status_peserta'   => $request->editStatusPeserta,
          'institusi_peserta'   => $request->editInstitusiPeserta,
          'foto_peserta'     => $filename->getClientOriginalName()
        ]);
      }
    }
    if($pesertaUpdate){
      //redirect dengan pesan sukses
      return redirect()->route('data-kontak.indexKetuaKelompokGKP')->with(['success' => 'Kontak Berhasil Diubah!']);
    }else{
      //redirect dengan pesan error
      return redirect()->route('data-kontak.indexKetuaKelompokGKP')->with(['error' => 'Kontak Gagal Diubah!']);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function destroyKetuaKelompokGKP($id)
  {
    $deleteDataPeserta = Peserta::find($id);
    if ($deleteDataPeserta->foto_peserta != '') {
      $destination = 'images/Peserta/'.$deleteDataPeserta->foto_peserta;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    $deleteDataPeserta->delete();

    if($deleteDataPeserta){
      return redirect()->route('data-kontak.indexKetuaKelompokGKP')->with(['success' => 'Peserta Berhasil Dihapus!']);
    }else{
      return redirect()->route('data-kontak.indexKetuaKelompokGKP')->with(['error' => 'Peserta Gagal Dihapus!']);
    }
  }
}
