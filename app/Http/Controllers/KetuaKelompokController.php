<?php

namespace App\Http\Controllers;

use App\Models\Ketua_kelompok;
use App\Models\Pekerjaan;
use App\Models\Sektor_industri;
use App\Models\Status_pekerjaan;
use App\Models\Tingkat_pendidikan;
use App\Models\Sekolah_univ;
use App\Models\Bidang_keterampilan;
use App\Models\Bidang_ketertarikan;
use App\Models\P_mbti;
use App\Models\Pers_holland;
use App\Models\Spirit_gifts;
use App\Models\Abilities;
use App\Models\Ganda_lima;
use App\Models\Kem_bahasa;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class KetuaKelompokController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $ketuaKelompoks = Ketua_kelompok::all();
    $noKetuaKelompoks = 1;

    //For Input
    $pekerjaans = Pekerjaan::all();
    $statusPekerjaans = Status_pekerjaan::all();
    $sektorIndustris = Sektor_industri::all();
    $tingkatPendidikans = Tingkat_pendidikan::all();
    $sekolahUnivs = Sekolah_univ::all();
    $bidKeterampilans = Bidang_keterampilan::all();
    $bidKetertarikans = Bidang_ketertarikan::all();
    $persMbtis = P_mbti::all();
    $persHollands = Pers_holland::all();
    $spiritGifts = Spirit_gifts::all();
    $abilities = Abilities::all();
    $gandaLimas = Ganda_lima::all();
    $kemBahasas = Kem_bahasa::all();
    $penyakits = Penyakit::all();

    return view('admin.data-ketua-kelompok', compact(['ketuaKelompoks', 'noKetuaKelompoks', 'pekerjaans', 'statusPekerjaans', 'sektorIndustris', 'tingkatPendidikans', 'sekolahUnivs',
                                                      'bidKeterampilans', 'bidKetertarikans', 'persMbtis', 'persHollands', 'spiritGifts', 'abilities', 'gandaLimas', 'kemBahasas', 'penyakits']));
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

  function randomCode()
  {
    do {
      $kode = random_int(1000000, 9999999);
    } while (Ketua_kelompok::where("id_user", "=", $kode)->first());

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
    $request->validate([
      'tglRegistrasiKetuaKelompok'     => 'required',
      'namaKetuaKelompok'   => 'required',
      'fotoKetuaKelompok'  => 'image|mimes:png,jpg,jpeg',
      'fotoBitmapKetuaKelompok'  => 'image|mimes:png,jpg,jpeg',
      'fileUploadBaptisAnakKetuaKelompok'  => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
      'fileUploadMenikahKetuaKelompok'  => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
      'fileUploadBaptisKetuaKelompok'  => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
      'fileUploadMeninggalDuniaKetuaKelompok'  => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
      'fileUploadPenyerahanAnakKetuaKelompok'  => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
      'fileUploadEvangelismExplosionKetuaKelompok'  => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
      'fileUploadIkatanDinasKetuaKelompok'  => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
      'fileUploadPrktkDuaThnKetuaKelompok'  => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
      'kata_sandiKetuaKelompok'  => 'required'
    ],
    [
      'tglRegistrasiKetuaKelompok.required' => 'Tanggal Registrasi tidak boleh kosong.',
      'namaKetuaKelompok.required' => 'Nama Lengkap tidak boleh kosong.',
      'fotoKetuaKelompok.image' => 'Berkas harus berupa Gambar (.jpg, .png, .jpeg).',
      'fotoBitmapKetuaKelompok.image' => 'Berkas harus berupa Gambar (.jpg, .png, .jpeg).',
      'fileUploadBaptisAnakKetuaKelompok.file' => 'Berkas harus berupa Dokumen.',
      'fileUploadMenikahKetuaKelompok.file' => 'Berkas harus berupa Dokumen.',
      'fileUploadBaptisKetuaKelompok.file' => 'Berkas harus berupa Dokumen.',
      'fileUploadMeninggalDuniaKetuaKelompok.file' => 'Berkas harus berupa Dokumen.',
      'fileUploadPenyerahanAnakKetuaKelompok.file' => 'Berkas harus berupa Dokumen.',
      'fileUploadEvangelismExplosionKetuaKelompok.file' => 'Berkas harus berupa Dokumen.',
      'fileUploadIkatanDinasKetuaKelompok.file' => 'Berkas harus berupa Dokumen.',
      'fotoBitmapKetuaKelompok.file' => 'Berkas harus berupa Dokumen.',
      'kata_sandiKetuaKelompok.required' => 'Kata Sandi tidak boleh kosong.'
    ]);

    $storeData = new Ketua_kelompok;
    $storeData->id_user = $this->randomCode();
    $storeData->tanggal_registKK = $request->tglRegistrasiKetuaKelompok;
    $storeData->refrensiKK = $request->referensiKetuaKelompok;
    $storeData->sapaanKK = $request->sapaanKetuaKelompok;
    $storeData->gelar_awalanKK = $request->gelarAwalanKetuaKelompok;
    $storeData->nama_lengkapKK = $request->namaKetuaKelompok;
    $storeData->gelar_akhiranKK = $request->gelarAkhiranKetuaKelompok;
    $storeData->nama_panggilanKK = $request->namaPanggilanKetuaKelompok;
    $storeData->peranKK = $request->peranKetuaKelompok;
    $storeData->jenis_identitasKK = $request->jenisIdentitasKetuaKelompok;
    $storeData->tempat_lahirKK = $request->tempatLahirKetuaKelompok;
    $storeData->tanggal_lahirKK = $request->tglLahirKetuaKelompok;
    $storeData->jkKK = $request->jenisKelaminKetuaKelompok;
    $storeData->goldarKK = $request->golonganDarahKetuaKelompok;
    $storeData->status_pernikahanKK = $request->statusPernikahanKetuaKelompok;
    if ($request->hasfile('fotoKetuaKelompok')) {
      $destination = "images/Ketua Kelompok/Foto";
      $filenameFoto = $request->file('fotoKetuaKelompok');
      $filenameFoto->move($destination, $filenameFoto->getClientOriginalName());
      $fotoToTb = $filenameFoto->getClientOriginalName();
    } else {
      $fotoToTb = '';
    }
    $storeData->fotoKK = $fotoToTb;
    if ($request->hasfile('fotoBitmapKetuaKelompok')) {
      $destination = "images/Ketua Kelompok/Foto Bitmap";
      $filenameFotoBitmap = $request->file('fotoBitmapKetuaKelompok');
      $filenameFotoBitmap->move($destination, $filenameFotoBitmap->getClientOriginalName());
      $fotoBitmapToTb = $filenameFotoBitmap->getClientOriginalName();
    } else {
      $fotoBitmapToTb = '';
    }
    $storeData->foto_bitmapKK = $fotoBitmapToTb;
    $storeData->alamatKK = $request->alamatKetuaKelompok;
    $storeData->ket_arahKK = $request->keteranganArahKetuaKelompok;
    $storeData->petaKK = $request->petaKetuaKelompok;
    $storeData->negaraKK = $request->negaraKetuaKelompok;
    $storeData->provinsiKK = $request->provinsiKetuaKelompok;
    $storeData->kotaKK = $request->kotaKetuaKelompok;
    $storeData->kecamatanKK = $request->kecamatanKetuaKelompok;
    $storeData->kelurahanKK = $request->kelurahanKetuaKelompok;
    $storeData->kode_posKK = $request->kodePosKetuaKelompok;
    $storeData->dusunKK = $request->dusunKetuaKelompok;
    $storeData->rtKK = $request->rtKetuaKelompok;
    $storeData->rwKK = $request->rwKetuaKelompok;
    $storeData->areaKK = $request->areaKetuaKelompok;
    $storeData->no_telpKK = $request->noTelpSKetuaKelompok;
    $storeData->no_rumahKK = $request->telpRumahKetuaKelompok;
    $storeData->no_hpsatuKK = $request->noHpSKetuaKelompok;
    $storeData->bisa_smsKK = $request->terimaSMSKetuaKelompok;
    $storeData->no_hpduaKK = $request->noHpDKetuaKelompok;
    $storeData->no_lainnyaKK = $request->noLainKetuaKelompok;
    $storeData->fax_rumahKK = $request->faxKetuaKelompok;
    $storeData->alamat_surelKK = $request->emailKetuaKelompok;
    $storeData->bisa_emailKK = $request->terimaEmailKetuaKelompok;
    $storeData->websiteKK = $request->websiteKetuaKelompok;
    $storeData->pekerjaanKK = $request->pekerjaanKetuaKelompok;
    $storeData->jabatanKK = $request->jabatanKetuaKelompok;
    $storeData->status_pekerjaanKK = $request->statusPekerjaanKetuaKelompok;
    $storeData->nama_perusahaanKK = $request->namaPerusahaanKetuaKelompok;
    $storeData->sektor_industriKK = $request->sektorIndustriKetuaKelompok;
    $storeData->alamat_kantorKK = $request->alamatKantorKetuaKelompok;
    $storeData->telp_kantorKK = $request->telpKantorKetuaKelompok;
    $storeData->extKK = $request->extKetuaKelompok;
    $storeData->tingkat_pendidikanKK = $request->tingkatPendidikanKetuaKelompok;
    $storeData->sekolah_univKK = $request->sekolahKetuaKelompok;
    $storeData->bidang_ketertarikanKK = json_encode($request->bKetertarikanKetuaKelompok);
    $storeData->bidang_keterampilanKK = json_encode($request->bKeterampilanKetuaKelompok);
    $storeData->catatanKK = $request->catatanKetuaKelompok;
    $storeData->statusKK = $request->statusKetuaKelompok;
    $storeData->verif_emailKK = $request->verifEmailKetuaKelompok;
    $storeData->no_rekeningKK = $request->noRekKetuaKelompok;
    $storeData->periode_beasiswaKK = $request->perBeasiswaKetuaKelompok;
    $storeData->periode_kerja_praktikKK = $request->perKerjaPKetuaKelompok;
    $storeData->riwayat_pelayananSatuKK = $request->riwayatPelSKetuaKelompok;
    $storeData->riwayat_pelayananDuaKK = $request->riwayatPelDKetuaKelompok;
    $storeData->riwayat_pelayananTigaKK = $request->riwayatPelTKetuaKelompok;
    $storeData->riwayat_pelayananEmpatKK = $request->riwayatPelEKetuaKelompok;
    $storeData->kolom_cadanganPSatuKK = $request->pilihanSKetuaKelompok;
    $storeData->kolom_cadanganPDuaKK = $request->pilihanDKetuaKelompok;
    $storeData->kolom_cadanganPTigaKK = $request->pilihanTKetuaKelompok;
    $storeData->kolom_cadanganPEmpatKK = $request->pilihanEKetuaKelompok;
    $storeData->kolom_cadanganPLimaKK = $request->pilihanLKetuaKelompok;
    $storeData->kolom_cadanganPEnamKK = $request->pilihanEnKetuaKelompok;
    $storeData->kolom_cadanganPTujuhKK = $request->pilihanTuKetuaKelompok;
    $storeData->personality_mbtiKK = json_encode($request->pilihanGSKetuaKelompok);
    $storeData->personality_hollandKK = json_encode($request->pilihanGDKetuaKelompok);
    $storeData->spiritual_giftsKK = json_encode($request->pilihanGTKetuaKelompok);
    $storeData->abilitiesKK = json_encode($request->pilihanGEKetuaKelompok);
    $storeData->kolom_cadanganPGLimaKK = json_encode($request->pilihanGLKetuaKelompok);
    $storeData->kemampuan_bahasaKK = json_encode($request->pilihanGEnKetuaKelompok);
    $storeData->penyakitKK = json_encode($request->pilihanGTuKetuaKelompok);
    $storeData->kolom_cadanganCBSatuKK = $request->checkSKetuaKelompok;
    $storeData->kolom_cadanganCBDuaKK = $request->checkDKetuaKelompok;
    $storeData->kolom_cadanganCBTigaKK = $request->checkTKetuaKelompok;
    $storeData->kolom_cadanganCBEmpatKK = $request->checkEKetuaKelompok;
    $storeData->kolom_cadanganCBLimaKK = $request->checkLKetuaKelompok;
    $storeData->kolom_cadanganCBEnamKK = $request->checkEnKetuaKelompok;
    $storeData->kolom_cadanganCBTujuhKK = $request->checkTuKetuaKelompok;
    $storeData->ba_sudahKK = $request->sudahBaptisAnakKetuaKelompok;
    $storeData->ba_tanggalKK = $request->tglBaptisAnakKetuaKelompok;
    $storeData->ba_tempatKK = $request->tempatBaptisAnakKetuaKelompok;
    if ($request->hasfile('fileUploadBaptisAnakKetuaKelompok')) {
      $destination = "images/Ketua Kelompok/Dokumen Baptis Anak";
      $filenameBptsAnak = $request->file('fileUploadBaptisAnakKetuaKelompok');
      $filenameBptsAnak->move($destination, $filenameBptsAnak->getClientOriginalName());
      $fileBaptisAnak = $filenameBptsAnak->getClientOriginalName();
    } else {
      $fileBaptisAnak = '';
    }
    $storeData->ba_fileKK = $fileBaptisAnak;
    $storeData->ba_ketKK = $request->ketBaptisAnakKetuaKelompok;
    $storeData->menikah_sudahKK = $request->sudahMenikahKetuaKelompok;
    $storeData->menikah_tanggalKK = $request->tglMenikahKetuaKelompok;
    $storeData->menikah_tempatKK = $request->tempatMenikahKetuaKelompok;
    if ($request->hasfile('fileUploadMenikahKetuaKelompok')) {
      $destination = "images/Ketua Kelompok/Dokumen Menikah";
      $filenameMenikah = $request->file('fileUploadMenikahKetuaKelompok');
      $filenameMenikah->move($destination, $filenameMenikah->getClientOriginalName());
      $fileMenikah = $filenameMenikah->getClientOriginalName();
    } else {
      $fileMenikah = '';
    }
    $storeData->menikah_fileKK = $fileMenikah;
    $storeData->menikah_ketKK = $request->ketMenikahKetuaKelompok;
    $storeData->bap_sudahKK = $request->sudahBaptisKetuaKelompok;
    $storeData->bap_tanggalKK = $request->tglBaptisKetuaKelompok;
    $storeData->bap_tempatKK = $request->tempatBaptisKetuaKelompok;
    if ($request->hasfile('fileUploadBaptisKetuaKelompok')) {
      $destination = "images/Ketua Kelompok/Dokumen Baptis";
      $filenameBaptis = $request->file('fileUploadBaptisKetuaKelompok');
      $filenameBaptis->move($destination, $filenameBaptis->getClientOriginalName());
      $fileBaptis = $filenameBaptis->getClientOriginalName();
    } else {
      $fileBaptis = '';
    }
    $storeData->bap_fileKK = $fileBaptis;
    $storeData->bap_ketKK = $request->ketBaptisKetuaKelompok;
    $storeData->md_sudahKK = $request->sudahMeninggalDuniaKetuaKelompok;
    $storeData->md_tanggalKK = $request->tglMeninggalDuniaKetuaKelompok;
    $storeData->md_tempatKK = $request->tempatMeninggalDuniaKetuaKelompok;
    if ($request->hasfile('fileUploadMeninggalDuniaKetuaKelompok')) {
      $destination = "images/Ketua Kelompok/Dokumen Meninggal Dunia";
      $filenameMeninggalD = $request->file('fileUploadMeninggalDuniaKetuaKelompok');
      $filenameMeninggalD->move($destination, $filenameMeninggalD->getClientOriginalName());
      $fileMeninggalD = $filenameMeninggalD->getClientOriginalName();
    } else {
      $fileMeninggalD = '';
    }
    $storeData->md_fileKK = $fileMeninggalD;
    $storeData->md_ketKK = $request->ketMeninggalDuniaKetuaKelompok;
    $storeData->pa_sudahKK = $request->sudahPenyerahanAnakKetuaKelompok;
    $storeData->pa_tanggalKK = $request->tglPenyerahanAnakKetuaKelompok;
    $storeData->pa_tempatKK = $request->tempatPenyerahanAnakKetuaKelompok;
    if ($request->hasfile('fileUploadPenyerahanAnakKetuaKelompok')) {
      $destination = "images/Ketua Kelompok/Dokumen Penyerahan Anak";
      $filenamePenyAnak = $request->file('fileUploadPenyerahanAnakKetuaKelompok');
      $filenamePenyAnak->move($destination, $filenamePenyAnak->getClientOriginalName());
      $filePenyAnak = $filenamePenyAnak->getClientOriginalName();
    } else {
      $filePenyAnak = '';
    }
    $storeData->pa_fileKK = $filePenyAnak;
    $storeData->pa_ketKK = $request->ketPenyerahanAnakKetuaKelompok;
    $storeData->ee_sudahKK = $request->sudahEvangelismExplosionKetuaKelompok;
    $storeData->ee_tanggalKK = $request->tglEvangelismExplosionKetuaKelompok;
    $storeData->ee_tempatKK = $request->tempatEvangelismExplosionKetuaKelompok;
    if ($request->hasfile('fileUploadEvangelismExplosionKetuaKelompok')) {
      $destination = "images/Ketua Kelompok/Dokumen Evangelism Explosion";
      $filenameEvExplo = $request->file('fileUploadEvangelismExplosionKetuaKelompok');
      $filenameEvExplo->move($destination, $filenameEvExplo->getClientOriginalName());
      $fileEvExplo = $filenameEvExplo->getClientOriginalName();
    } else {
      $fileEvExplo = '';
    }
    $storeData->ee_fileKK = $fileEvExplo;
    $storeData->ee_ketKK = $request->ketEvangelismExplosionKetuaKelompok;
    $storeData->bid_sudahKK = $request->sudahIkatanDinasKetuaKelompok;
    $storeData->bid_tanggalKK = $request->tglIkatanDinasKetuaKelompok;
    $storeData->bid_tempatKK = $request->tempatIkatanDinasKetuaKelompok;
    if ($request->hasfile('fileUploadIkatanDinasKetuaKelompok')) {
      $destination = "images/Ketua Kelompok/Dokumen Berakhir Ikatan Dinas";
      $filenameBerIkNas = $request->file('fileUploadIkatanDinasKetuaKelompok');
      $filenameBerIkNas->move($destination, $filenameBerIkNas->getClientOriginalName());
      $fileBerIkNas = $filenameBerIkNas->getClientOriginalName();
    } else {
      $fileBerIkNas = '';
    }
    $storeData->bid_fileKK = $fileBerIkNas;
    $storeData->bid_ketKK = $request->ketIkatanDinasKetuaKelompok;
    $storeData->pdt_sudahKK = $request->sudahPrktkDuaThnKetuaKelompok;
    $storeData->pdt_tanggalKK = $request->tglPrktkDuaThnKetuaKelompok;
    $storeData->pdt_tempatKK = $request->tempatPrktkDuaThnKetuaKelompok;
    if ($request->hasfile('fileUploadPrktkDuaThnKetuaKelompok')) {
      $destination = "images/Ketua Kelompok/Dokumen Praktek 2 Tahun";
      $filenamePrakDuaThn = $request->file('fileUploadPrktkDuaThnKetuaKelompok');
      $filenamePrakDuaThn->move($destination, $filenamePrakDuaThn->getClientOriginalName());
      $filePrakDuaThn = $filenamePrakDuaThn->getClientOriginalName();
    } else {
      $filePrakDuaThn = '';
    }
    $storeData->pdt_fileKK = $filePrakDuaThn;
    $storeData->pdt_ketKK = $request->ketPrktkDuaThnKetuaKelompok;
    $storeData->nama_grupKK = $request->namaGrupKetuaKelompok;
    $storeData->jbt_grupKK = $request->jbtnGrupKetuaKelompok;
    $storeData->tgl_gabung_grupKK = $request->tglGabungKetuaKelompok;
    $storeData->catatan_masuk_grupKK = $request->cttnMasukKetuaKelompok;
    $storeData->kata_sandiKK = $request->kata_sandiKetuaKelompok;
    $storeData->save();

    if($storeData){
      return redirect()->route('data-ketua-kelompok.index')->with(['success' => 'Ketua Kelompok Berhasil Disimpan!']);
    }else{
      return redirect()->route('data-ketua-kelompok.index')->with(['error' => 'Ketua Kelompok Gagal Disimpan!']);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Ketua_kelompok  $ketua_kelompok
   * @return \Illuminate\Http\Response
   */
  public function show(Ketua_kelompok $ketua_kelompok)
  {
      //
  } 

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Ketua_kelompok  $ketua_kelompok
   * @return \Illuminate\Http\Response
   */
  public function edit(Ketua_kelompok $ketua_kelompok)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Ketua_kelompok  $ketua_kelompok
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Ketua_kelompok $ketua_kelompok)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Ketua_kelompok  $ketua_kelompok
   * @return \Illuminate\Http\Response
   */
  public function destroy(Ketua_kelompok $ketua_kelompok)
  {
      //
  }
}
