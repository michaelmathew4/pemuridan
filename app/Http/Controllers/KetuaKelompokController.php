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
use App\Models\Kc_pilsatu;
use App\Models\Kc_pildua;
use App\Models\Kc_piltiga;
use App\Models\Kc_pilempat;
use App\Models\Kc_pillima;
use App\Models\Kc_pilenam;
use App\Models\Kc_piltujuh;
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
    $kc_pilsatus = Kc_pilsatu::all();
    $kc_pilduas = Kc_pildua::all();
    $kc_piltigas = Kc_piltiga::all();
    $kc_pilempats = Kc_pilempat::all();
    $kc_pillimas = Kc_pillima::all();
    $kc_pilenams = Kc_pilenam::all();
    $kc_piltujuhs = Kc_piltujuh::all();

    return view('admin.data-ketua-kelompok', compact(['ketuaKelompoks', 'noKetuaKelompoks', 'pekerjaans', 'statusPekerjaans', 'sektorIndustris', 'tingkatPendidikans', 'sekolahUnivs',
                                                      'bidKeterampilans', 'bidKetertarikans', 'persMbtis', 'persHollands', 'spiritGifts', 'abilities', 'gandaLimas', 'kemBahasas', 'penyakits',
                                                      'kc_pilsatus', 'kc_pilduas', 'kc_piltigas', 'kc_pilempats', 'kc_pillimas', 'kc_pilenams', 'kc_piltujuhs']));
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
      'tglRegistrasiKetuaKelompoks'     => 'required',
      'namaKetuaKelompoks'   => 'required',
      'fotoKetuaKelompoks'  => 'image|mimes:png,jpg,jpeg',
      'fotoBitmapKetuaKelompoks'  => 'image|mimes:png,jpg,jpeg',
      'fileUploadBaptisAnakKetuaKelompoks'  => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
      'fileUploadMenikahKetuaKelompoks'  => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
      'fileUploadBaptisKetuaKelompoks'  => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
      'fileUploadMeninggalDuniaKetuaKelompoks'  => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
      'fileUploadPenyerahanAnakKetuaKelompoks'  => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
      'fileUploadEvangelismExplosionKetuaKelompoks'  => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
      'fileUploadIkatanDinasKetuaKelompoks'  => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
      'fileUploadPrktkDuaThnKetuaKelompoks'  => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
      'kata_sandiKetuaKelompoks'  => 'required'
    ],
    [
      'tglRegistrasiKetuaKelompoks.required' => 'Tanggal Registrasi tidak boleh kosong.',
      'namaKetuaKelompoks.required' => 'Nama Lengkap tidak boleh kosong.',
      'fotoKetuaKelompoks.image' => 'Berkas harus berupa Gambar (.jpg, .png, .jpeg).',
      'fotoBitmapKetuaKelompoks.image' => 'Berkas harus berupa Gambar (.jpg, .png, .jpeg).',
      'fileUploadBaptisAnakKetuaKelompoks.file' => 'Berkas harus berupa Dokumen.',
      'fileUploadMenikahKetuaKelompoks.file' => 'Berkas harus berupa Dokumen.',
      'fileUploadBaptisKetuaKelompoks.file' => 'Berkas harus berupa Dokumen.',
      'fileUploadMeninggalDuniaKetuaKelompoks.file' => 'Berkas harus berupa Dokumen.',
      'fileUploadPenyerahanAnakKetuaKelompoks.file' => 'Berkas harus berupa Dokumen.',
      'fileUploadEvangelismExplosionKetuaKelompoks.file' => 'Berkas harus berupa Dokumen.',
      'fileUploadIkatanDinasKetuaKelompoks.file' => 'Berkas harus berupa Dokumen.',
      'fileUploadPrktkDuaThnKetuaKelompoks.file' => 'Berkas harus berupa Dokumen.',
      'kata_sandiKetuaKelompoks.required' => 'Kata Sandi tidak boleh kosong.'
    ]);

    $storeData = new Ketua_kelompok;
    $storeData->id_user = $this->randomCode();
    $storeData->tanggal_registKK = $request->tglRegistrasiKetuaKelompoks;
    $storeData->refrensiKK = $request->referensiKetuaKelompoks;
    $storeData->sapaanKK = $request->sapaanKetuaKelompoks;
    $storeData->gelar_awalanKK = $request->gelarAwalanKetuaKelompoks;
    $storeData->nama_lengkapKK = $request->namaKetuaKelompoks;
    $storeData->gelar_akhiranKK = $request->gelarAkhiranKetuaKelompoks;
    $storeData->nama_panggilanKK = $request->namaPanggilanKetuaKelompoks;
    $storeData->peranKK = $request->peranKetuaKelompoks;
    $storeData->jenis_identitasKK = $request->jenisIdentitasKetuaKelompoks;
    $storeData->no_identitasKK = $request->noIdentitasKetuaKelompoks;
    $storeData->tempat_lahirKK = $request->tempatLahirKetuaKelompoks;
    $storeData->tanggal_lahirKK = $request->tglLahirKetuaKelompoks;
    $storeData->jkKK = $request->jenisKelaminKetuaKelompoks;
    $storeData->goldarKK = $request->golonganDarahKetuaKelompoks;
    $storeData->status_pernikahanKK = $request->statusPernikahanKetuaKelompoks;
    if ($request->hasfile('fotoKetuaKelompoks')) {
      $destination = "images/Ketua Kelompok/Foto";
      $filenameFoto = $request->file('fotoKetuaKelompoks');
      $filenameFoto->move($destination, $filenameFoto->getClientOriginalName());
      $fotoToTb = $filenameFoto->getClientOriginalName();
    } else {
      $fotoToTb = '';
    }
    $storeData->fotoKK = $fotoToTb;
    if ($request->hasfile('fotoBitmapKetuaKelompoks')) {
      $destination = "images/Ketua Kelompok/Foto Bitmap";
      $filenameFotoBitmap = $request->file('fotoBitmapKetuaKelompoks');
      $filenameFotoBitmap->move($destination, $filenameFotoBitmap->getClientOriginalName());
      $fotoBitmapToTb = $filenameFotoBitmap->getClientOriginalName();
    } else {
      $fotoBitmapToTb = '';
    }
    $storeData->foto_bitmapKK = $fotoBitmapToTb;
    $storeData->alamatKK = $request->alamatKetuaKelompoks;
    $storeData->ket_arahKK = $request->keteranganArahKetuaKelompoks;
    $storeData->petaKK = $request->petaKetuaKelompoks;
    $storeData->negaraKK = $request->negaraKetuaKelompoks;
    $storeData->provinsiKK = $request->provinsiKetuaKelompoks;
    $storeData->kotaKK = $request->kotaKetuaKelompoks;
    $storeData->kecamatanKK = $request->kecamatanKetuaKelompoks;
    $storeData->kelurahanKK = $request->kelurahanKetuaKelompoks;
    $storeData->kode_posKK = $request->kodePosKetuaKelompoks;
    $storeData->dusunKK = $request->dusunKetuaKelompoks;
    $storeData->rtKK = $request->rtKetuaKelompoks;
    $storeData->rwKK = $request->rwKetuaKelompoks;
    $storeData->areaKK = $request->areaKetuaKelompoks;
    $storeData->no_telpKK = $request->noTelpSKetuaKelompoks;
    $storeData->no_rumahKK = $request->telpRumahKetuaKelompoks;
    $storeData->no_hpsatuKK = $request->noHpSKetuaKelompoks;
    $storeData->bisa_smsKK = $request->terimaSMSKetuaKelompoks;
    $storeData->no_hpduaKK = $request->noHpDKetuaKelompoks;
    $storeData->no_lainnyaKK = $request->noLainKetuaKelompoks;
    $storeData->fax_rumahKK = $request->faxKetuaKelompoks;
    $storeData->alamat_surelKK = $request->emailKetuaKelompoks;
    $storeData->bisa_emailKK = $request->terimaEmailKetuaKelompoks;
    $storeData->websiteKK = $request->websiteKetuaKelompoks;
    $storeData->pekerjaanKK = $request->pekerjaanKetuaKelompoks;
    $storeData->jabatanKK = $request->jabatanKetuaKelompoks;
    $storeData->status_pekerjaanKK = $request->statusPekerjaanKetuaKelompoks;
    $storeData->nama_perusahaanKK = $request->namaPerusahaanKetuaKelompoks;
    $storeData->sektor_industriKK = $request->sektorIndustriKetuaKelompoks;
    $storeData->alamat_kantorKK = $request->alamatKantorKetuaKelompoks;
    $storeData->telp_kantorKK = $request->telpKantorKetuaKelompoks;
    $storeData->extKK = $request->extKetuaKelompoks;
    $storeData->tingkat_pendidikanKK = $request->tingkatPendidikanKetuaKelompoks;
    $storeData->sekolah_univKK = $request->sekolahKetuaKelompoks;
    $storeData->bidang_ketertarikanKK = json_encode($request->bKetertarikanKetuaKelompoks);
    $storeData->bidang_keterampilanKK = json_encode($request->bKeterampilanKetuaKelompoks);
    $storeData->catatanKK = $request->catatanKetuaKelompoks;
    $storeData->statusKK = $request->statusKetuaKelompoks;
    $storeData->verif_emailKK = $request->verifEmailKetuaKelompoks;
    $storeData->no_rekeningKK = $request->noRekKetuaKelompoks;
    $storeData->periode_beasiswaKK = $request->perBeasiswaKetuaKelompoks;
    $storeData->periode_kerja_praktikKK = $request->perKerjaPKetuaKelompoks;
    $storeData->riwayat_pelayananSatuKK = $request->riwayatPelSKetuaKelompoks;
    $storeData->riwayat_pelayananDuaKK = $request->riwayatPelDKetuaKelompoks;
    $storeData->riwayat_pelayananTigaKK = $request->riwayatPelTKetuaKelompoks;
    $storeData->riwayat_pelayananEmpatKK = $request->riwayatPelEKetuaKelompoks;
    $storeData->kolom_cadanganPSatuKK = $request->pilihanSKetuaKelompoks;
    $storeData->kolom_cadanganPDuaKK = $request->pilihanDKetuaKelompoks;
    $storeData->kolom_cadanganPTigaKK = $request->pilihanTKetuaKelompoks;
    $storeData->kolom_cadanganPEmpatKK = $request->pilihanEKetuaKelompoks;
    $storeData->kolom_cadanganPLimaKK = $request->pilihanLKetuaKelompoks;
    $storeData->kolom_cadanganPEnamKK = $request->pilihanEnKetuaKelompoks;
    $storeData->kolom_cadanganPTujuhKK = $request->pilihanTuKetuaKelompoks;
    $storeData->personality_mbtiKK = json_encode($request->pilihanGSKetuaKelompoks);
    $storeData->personality_hollandKK = json_encode($request->pilihanGDKetuaKelompoks);
    $storeData->spiritual_giftsKK = json_encode($request->pilihanGTKetuaKelompoks);
    $storeData->abilitiesKK = json_encode($request->pilihanGEKetuaKelompoks);
    $storeData->kolom_cadanganPGLimaKK = json_encode($request->pilihanGLKetuaKelompoks);
    $storeData->kemampuan_bahasaKK = json_encode($request->pilihanGEnKetuaKelompoks);
    $storeData->penyakitKK = json_encode($request->pilihanGTuKetuaKelompoks);
    $storeData->kolom_cadanganCBSatuKK = $request->checkSKetuaKelompoks;
    $storeData->kolom_cadanganCBDuaKK = $request->checkDKetuaKelompoks;
    $storeData->kolom_cadanganCBTigaKK = $request->checkTKetuaKelompoks;
    $storeData->kolom_cadanganCBEmpatKK = $request->checkEKetuaKelompoks;
    $storeData->kolom_cadanganCBLimaKK = $request->checkLKetuaKelompoks;
    $storeData->kolom_cadanganCBEnamKK = $request->checkEnKetuaKelompoks;
    $storeData->kolom_cadanganCBTujuhKK = $request->checkTuKetuaKelompoks;
    $storeData->ba_sudahKK = $request->sudahBaptisAnakKetuaKelompoks;
    $storeData->ba_tanggalKK = $request->tglBaptisAnakKetuaKelompoks;
    $storeData->ba_tempatKK = $request->tempatBaptisAnakKetuaKelompoks;
    if ($request->hasfile('fileUploadBaptisAnakKetuaKelompoks')) {
      $destination = "images/Ketua Kelompok/Dokumen Baptis Anak";
      $filenameBptsAnak = $request->file('fileUploadBaptisAnakKetuaKelompoks');
      $filenameBptsAnak->move($destination, $filenameBptsAnak->getClientOriginalName());
      $fileBaptisAnak = $filenameBptsAnak->getClientOriginalName();
    } else {
      $fileBaptisAnak = '';
    }
    $storeData->ba_fileKK = $fileBaptisAnak;
    $storeData->ba_ketKK = $request->ketBaptisAnakKetuaKelompoks;
    $storeData->menikah_sudahKK = $request->sudahMenikahKetuaKelompoks;
    $storeData->menikah_tanggalKK = $request->tglMenikahKetuaKelompoks;
    $storeData->menikah_tempatKK = $request->tempatMenikahKetuaKelompoks;
    if ($request->hasfile('fileUploadMenikahKetuaKelompoks')) {
      $destination = "images/Ketua Kelompok/Dokumen Menikah";
      $filenameMenikah = $request->file('fileUploadMenikahKetuaKelompoks');
      $filenameMenikah->move($destination, $filenameMenikah->getClientOriginalName());
      $fileMenikah = $filenameMenikah->getClientOriginalName();
    } else {
      $fileMenikah = '';
    }
    $storeData->menikah_fileKK = $fileMenikah;
    $storeData->menikah_ketKK = $request->ketMenikahKetuaKelompoks;
    $storeData->bap_sudahKK = $request->sudahBaptisKetuaKelompoks;
    $storeData->bap_tanggalKK = $request->tglBaptisKetuaKelompoks;
    $storeData->bap_tempatKK = $request->tempatBaptisKetuaKelompoks;
    if ($request->hasfile('fileUploadBaptisKetuaKelompoks')) {
      $destination = "images/Ketua Kelompok/Dokumen Baptis";
      $filenameBaptis = $request->file('fileUploadBaptisKetuaKelompoks');
      $filenameBaptis->move($destination, $filenameBaptis->getClientOriginalName());
      $fileBaptis = $filenameBaptis->getClientOriginalName();
    } else {
      $fileBaptis = '';
    }
    $storeData->bap_fileKK = $fileBaptis;
    $storeData->bap_ketKK = $request->ketBaptisKetuaKelompoks;
    $storeData->md_sudahKK = $request->sudahMeninggalDuniaKetuaKelompoks;
    $storeData->md_tanggalKK = $request->tglMeninggalDuniaKetuaKelompoks;
    $storeData->md_tempatKK = $request->tempatMeninggalDuniaKetuaKelompoks;
    if ($request->hasfile('fileUploadMeninggalDuniaKetuaKelompoks')) {
      $destination = "images/Ketua Kelompok/Dokumen Meninggal Dunia";
      $filenameMeninggalD = $request->file('fileUploadMeninggalDuniaKetuaKelompoks');
      $filenameMeninggalD->move($destination, $filenameMeninggalD->getClientOriginalName());
      $fileMeninggalD = $filenameMeninggalD->getClientOriginalName();
    } else {
      $fileMeninggalD = '';
    }
    $storeData->md_fileKK = $fileMeninggalD;
    $storeData->md_ketKK = $request->ketMeninggalDuniaKetuaKelompoks;
    $storeData->pa_sudahKK = $request->sudahPenyerahanAnakKetuaKelompoks;
    $storeData->pa_tanggalKK = $request->tglPenyerahanAnakKetuaKelompoks;
    $storeData->pa_tempatKK = $request->tempatPenyerahanAnakKetuaKelompoks;
    if ($request->hasfile('fileUploadPenyerahanAnakKetuaKelompoks')) {
      $destination = "images/Ketua Kelompok/Dokumen Penyerahan Anak";
      $filenamePenyAnak = $request->file('fileUploadPenyerahanAnakKetuaKelompoks');
      $filenamePenyAnak->move($destination, $filenamePenyAnak->getClientOriginalName());
      $filePenyAnak = $filenamePenyAnak->getClientOriginalName();
    } else {
      $filePenyAnak = '';
    }
    $storeData->pa_fileKK = $filePenyAnak;
    $storeData->pa_ketKK = $request->ketPenyerahanAnakKetuaKelompoks;
    $storeData->ee_sudahKK = $request->sudahEvangelismExplosionKetuaKelompoks;
    $storeData->ee_tanggalKK = $request->tglEvangelismExplosionKetuaKelompoks;
    $storeData->ee_tempatKK = $request->tempatEvangelismExplosionKetuaKelompoks;
    if ($request->hasfile('fileUploadEvangelismExplosionKetuaKelompoks')) {
      $destination = "images/Ketua Kelompok/Dokumen Evangelism Explosion";
      $filenameEvExplo = $request->file('fileUploadEvangelismExplosionKetuaKelompoks');
      $filenameEvExplo->move($destination, $filenameEvExplo->getClientOriginalName());
      $fileEvExplo = $filenameEvExplo->getClientOriginalName();
    } else {
      $fileEvExplo = '';
    }
    $storeData->ee_fileKK = $fileEvExplo;
    $storeData->ee_ketKK = $request->ketEvangelismExplosionKetuaKelompoks;
    $storeData->bid_sudahKK = $request->sudahIkatanDinasKetuaKelompoks;
    $storeData->bid_tanggalKK = $request->tglIkatanDinasKetuaKelompoks;
    $storeData->bid_tempatKK = $request->tempatIkatanDinasKetuaKelompoks;
    if ($request->hasfile('fileUploadIkatanDinasKetuaKelompoks')) {
      $destination = "images/Ketua Kelompok/Dokumen Berakhir Ikatan Dinas";
      $filenameBerIkNas = $request->file('fileUploadIkatanDinasKetuaKelompoks');
      $filenameBerIkNas->move($destination, $filenameBerIkNas->getClientOriginalName());
      $fileBerIkNas = $filenameBerIkNas->getClientOriginalName();
    } else {
      $fileBerIkNas = '';
    }
    $storeData->bid_fileKK = $fileBerIkNas;
    $storeData->bid_ketKK = $request->ketIkatanDinasKetuaKelompoks;
    $storeData->pdt_sudahKK = $request->sudahPrktkDuaThnKetuaKelompoks;
    $storeData->pdt_tanggalKK = $request->tglPrktkDuaThnKetuaKelompoks;
    $storeData->pdt_tempatKK = $request->tempatPrktkDuaThnKetuaKelompoks;
    if ($request->hasfile('fileUploadPrktkDuaThnKetuaKelompoks')) {
      $destination = "images/Ketua Kelompok/Dokumen Praktek 2 Tahun";
      $filenamePrakDuaThn = $request->file('fileUploadPrktkDuaThnKetuaKelompoks');
      $filenamePrakDuaThn->move($destination, $filenamePrakDuaThn->getClientOriginalName());
      $filePrakDuaThn = $filenamePrakDuaThn->getClientOriginalName();
    } else {
      $filePrakDuaThn = '';
    }
    $storeData->pdt_fileKK = $filePrakDuaThn;
    $storeData->pdt_ketKK = $request->ketPrktkDuaThnKetuaKelompoks;
    $storeData->nama_grupKK = $request->namaGrupKetuaKelompoks;
    $storeData->jbt_grupKK = $request->jbtnGrupKetuaKelompoks;
    $storeData->tgl_gabung_grupKK = $request->tglGabungKetuaKelompoks;
    $storeData->catatan_masuk_grupKK = $request->cttnMasukKetuaKelompoks;
    $storeData->kata_sandiKK = $request->kata_sandiKetuaKelompoks;
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
  public function destroy($id)
  {
    $deleteDataKetuaKelompok = Ketua_kelompok::find($id);
    if ($deleteDataKetuaKelompok->fotoKK != '') {
      $destination = 'images/Ketua Kelompok/Foto/'.$deleteDataKetuaKelompok->fotoKK;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    if ($deleteDataKetuaKelompok->foto_bitmapKK != '') {
      $destination = 'images/Ketua Kelompok/Foto Bitmap/'.$deleteDataKetuaKelompok->foto_bitmapKK;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    if ($deleteDataKetuaKelompok->ba_fileKK != '') {
      $destination = 'images/Ketua Kelompok/Dokumen Baptis Anak/'.$deleteDataKetuaKelompok->ba_fileKK;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    if ($deleteDataKetuaKelompok->menikah_fileKK != '') {
      $destination = 'images/Ketua Kelompok/Dokumen Menikah/'.$deleteDataKetuaKelompok->menikah_fileKK;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    if ($deleteDataKetuaKelompok->bap_fileKK != '') {
      $destination = 'images/Ketua Kelompok/Dokumen Baptis/'.$deleteDataKetuaKelompok->bap_fileKK;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    if ($deleteDataKetuaKelompok->md_fileKK != '') {
      $destination = 'images/Ketua Kelompok/Dokumen Meninggal/'.$deleteDataKetuaKelompok->md_fileKK;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    if ($deleteDataKetuaKelompok->pa_fileKK != '') {
      $destination = 'images/Ketua Kelompok/Dokumen Penyerahan Anak/'.$deleteDataKetuaKelompok->pa_fileKK;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    if ($deleteDataKetuaKelompok->ee_fileKK != '') {
      $destination = 'images/Ketua Kelompok/Evangelism Explosion/'.$deleteDataKetuaKelompok->ee_fileKK;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    if ($deleteDataKetuaKelompok->bid_fileKK != '') {
      $destination = 'images/Ketua Kelompok/Dokumen Berakhir Ikatan Dinas/'.$deleteDataKetuaKelompok->bid_fileKK;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    if ($deleteDataKetuaKelompok->pdt_fileKK != '') {
      $destination = 'images/Ketua Kelompok/Dokumen Praktek 2 Tahun/'.$deleteDataKetuaKelompok->pdt_fileKK;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    $deleteDataKetuaKelompok->delete();

    if($deleteDataKetuaKelompok){
      return redirect()->route('data-ketua-kelompok.index')->with(['success' => 'Ketua Kelompok Berhasil Dihapus!']);
    }else{
      return redirect()->route('data-ketua-kelompok.index')->with(['error' => 'Ketua Kelompok Gagal Dihapus!']);
    }
  }
}
