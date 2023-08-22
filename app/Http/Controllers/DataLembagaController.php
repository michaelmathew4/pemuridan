<?php

namespace App\Http\Controllers;

use App\Models\Data_lembaga;
use App\Models\Nama_kelompok;
use App\Models\Lokasi;
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
use App\Models\Kelompok;
use App\Models\Kc_pilsatu;
use App\Models\Kc_pildua;
use App\Models\Kc_piltiga;
use App\Models\Kc_pilempat;
use App\Models\Kc_pillima;
use App\Models\Kc_pilenam;
use App\Models\Kc_piltujuh;
use App\Models\User;
use App\Models\Nominal;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DataLembagaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $dataLembagas = Data_lembaga::addSelect([
      'id_ketua_kelompok' => Nama_kelompok::select('id_ketua_kelompok')
          ->whereColumn('id_ketua_kelompok', 'data_lembagas.id_user')
          ->limit(1)
        ])->get();
    $nodataLembagas = 1;
    $noNamaKelompoks = 1;
    $namaKelompoks = [];
    foreach ($dataLembagas as $dataLembagaS) {
      $namaKelompoks[] = Nama_kelompok::where('id_ketua_kelompok', $dataLembagaS->id_user)->get();
    }

    //For Input
    $pekerjaans = Pekerjaan::all();
    $lokasis = Lokasi::all();
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
    $kc_pilsatus = Kc_pilsatu::all();
    $kc_pilduas = Kc_pildua::all();
    $kc_piltigas = Kc_piltiga::all();
    $kc_pilempats = Kc_pilempat::all();
    $kc_pillimas = Kc_pillima::all();
    $kc_pilenams = Kc_pilenam::all();
    $kc_piltujuhs = Kc_piltujuh::all();
    $nominals = Nominal::all();

    return view('admin.data-lembaga', compact(['dataLembagas', 'nodataLembagas', 'noNamaKelompoks', 'pekerjaans', 'statusPekerjaans', 'lokasis', 'sektorIndustris', 'tingkatPendidikans', 'sekolahUnivs',
                                                      'bidKeterampilans', 'bidKetertarikans', 'persMbtis', 'persHollands', 'spiritGifts', 'abilities', 'gandaLimas', 'kemBahasas',
                                                      'kc_pilsatus', 'kc_pilduas', 'kc_piltigas', 'kc_pilempats', 'kc_pillimas', 'kc_pilenams', 'kc_piltujuhs', 'nominals', 'namaKelompoks']));
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
    } while (Nominal::where("id_nominal", "=", $kode)->first());

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
      'untukPendataans' => 'required',
      'idDatas' => 'required|unique:users,id_user',
      'tglRegistrasiDatas'     => 'required',
      'namaDatas' => 'required',
      'fotoDatas' => 'image|mimes:png,jpg,jpeg',
      'fotoBitmapDatas'  => 'image|mimes:png,jpg,jpeg',
      'fileUploadBaptisAnakDatas'  => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,xlsx,xls,txt,pdf,zip',
      'fileUploadMenikahDatas'  => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,xlsx,xls,txt,pdf,zip',
      'fileUploadBaptisDatas'  => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,xlsx,xls,txt,pdf,zip',
      'fileUploadMeninggalDuniaDatas'  => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,xlsx,xls,txt,pdf,zip',
      'fileUploadPenyerahanAnakDatas'  => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,xlsx,xls,txt,pdf,zip',
      'fileUploadEvangelismExplosionDatas'  => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,xlsx,xls,txt,pdf,zip',
      'fileUploadIkatanDinasDatas'  => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,xlsx,xls,txt,pdf,zip',
      'fileUploadPrktkDuaThnDatas'  => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,xlsx,xls,txt,pdf,zip',
      'emailDatas'   => 'email:rfc,dns|unique:users,email',
      'lokasiDatas'  => 'required',
      'institusiDatas'   => 'required',
      'kata_sandiDatas'  => 'required'
    ],
    [
      'untukPendataans.required' => 'Untuk Pendataan tidak boleh kosong.',
      'idDatas.required' => 'ID tidak boleh kosong.',
      'idDatas.unique' => 'ID sudah terdaftar.',
      'tglRegistrasiDatas.required' => 'Tanggal Registrasi tidak boleh kosong.',
      'namaDatas.required' => 'Nama Lengkap tidak boleh kosong.',
      'fotoDatas.image' => 'Berkas harus berupa Gambar (.jpg, .png, .jpeg).',
      'fotoDatas.mimes' => 'Berkas harus berupa Gambar (.jpg, .png, .jpeg).',
      'fotoBitmapDatas.image' => 'Berkas harus berupa Gambar (.jpg, .png, .jpeg).',
      'fotoBitmapDatas.mimes' => 'Berkas harus berupa Gambar (.jpg, .png, .jpeg).',
      'fileUploadBaptisAnakDatas.file' => 'Berkas harus berupa Dokumen.',
      'fileUploadBaptisAnakDatas.mimes' => 'Berkas harus berupa Dokumen (.doc, .docx, .csv, .xlsx, .xls, .txt, .pdf, .zip).',
      'fileUploadMenikahDatas.file' => 'Berkas harus berupa Dokumen.',
      'fileUploadMenikahDatas.mimes' => 'Berkas harus berupa Dokumen (.doc, .docx, .csv, .xlsx, .xls, .txt, .pdf, .zip).',
      'fileUploadBaptisDatas.file' => 'Berkas harus berupa Dokumen.',
      'fileUploadBaptisDatas.mimes' => 'Berkas harus berupa Dokumen (.doc, .docx, .csv, .xlsx, .xls, .txt, .pdf, .zip).',
      'fileUploadMeninggalDuniaDatas.file' => 'Berkas harus berupa Dokumen.',
      'fileUploadMeninggalDuniaDatas.mimes' => 'Berkas harus berupa Dokumen (.doc, .docx, .csv, .xlsx, .xls, .txt, .pdf, .zip).',
      'fileUploadPenyerahanAnakDatas.file' => 'Berkas harus berupa Dokumen.',
      'fileUploadPenyerahanAnakDatas.mimes' => 'Berkas harus berupa Dokumen (.doc, .docx, .csv, .xlsx, .xls, .txt, .pdf, .zip).',
      'fileUploadEvangelismExplosionDatas.file' => 'Berkas harus berupa Dokumen.',
      'fileUploadEvangelismExplosionDatas.mimes' => 'Berkas harus berupa Dokumen (.doc, .docx, .csv, .xlsx, .xls, .txt, .pdf, .zip).',
      'fileUploadIkatanDinasDatas.file' => 'Berkas harus berupa Dokumen.',
      'fileUploadIkatanDinasDatas.mimes' => 'Berkas harus berupa Dokumen (.doc, .docx, .csv, .xlsx, .xls, .txt, .pdf, .zip).',
      'fileUploadPrktkDuaThnDatas.file' => 'Berkas harus berupa Dokumen.',
      'fileUploadPrktkDuaThnDatas.mimes' => 'Berkas harus berupa Dokumen (.doc, .docx, .csv, .xlsx, .xls, .txt, .pdf, .zip).',
      'emailDatas.unique' => 'Alamat Surel sudah ada.',
      'lokasiDatas.required' => 'Lokasi tidak boleh kosong.',
      'institusiDatas.required' => 'Lembaga tidak boleh kosong.',
      'kata_sandiDatas.required' => 'Kata Sandi tidak boleh kosong.'
    ]);

    $storeData = new Data_lembaga;
    $storeData->data_lembaga = $request->untukPendataans;
    $storeData->id_user = $request->idDatas;
    $storeData->tanggal_regist = $request->tglRegistrasiDatas;
    $storeData->refrensi = $request->referensiDatas;
    $storeData->sapaan = $request->sapaanDatas;
    $storeData->gelar_awalan = $request->gelarAwalanDatas;
    $storeData->nama_lengkap = $request->namaDatas;
    $storeData->gelar_akhiran = $request->gelarAkhiranDatas;
    $storeData->nama_panggilan = $request->namaPanggilanDatas;
    $storeData->peran = $request->peranDatas;
    $storeData->jenis_identitas = $request->jenisIdentitasDatas;
    $storeData->no_identitas = $request->noIdentitasDatas;
    $storeData->tempat_lahir = $request->tempatLahirDatas;
    $storeData->tanggal_lahir = $request->tglLahirDatas;
    $storeData->jK = $request->jenisKelaminDatas;
    $storeData->goldar = $request->golonganDarahDatas;
    $storeData->status_pernikahan = $request->statusPernikahanDatas;
    $storeData->suku = $request->sukus;
    if ($request->hasfile('fotoDatas')) {
      $destination = "images/Data Lembaga/Foto";
      $filenameFoto = $request->file('fotoDatas');
      $filenameFoto->move($destination, $filenameFoto->getClientOriginalName());
      $fotoToTb = $filenameFoto->getClientOriginalName();
    } else {
      $fotoToTb = '';
    }
    $storeData->foto = $fotoToTb;
    if ($request->hasfile('fotoBitmapDatas')) {
      $destination = "images/Data Lembaga/Foto Bitmap";
      $filenameFotoBitmap = $request->file('fotoBitmapDatas');
      $filenameFotoBitmap->move($destination, $filenameFotoBitmap->getClientOriginalName());
      $fotoBitmapToTb = $filenameFotoBitmap->getClientOriginalName();
    } else {
      $fotoBitmapToTb = '';
    }
    $storeData->foto_bitmap = $fotoBitmapToTb;
    $storeData->alamat = $request->alamatDatas;
    $storeData->ket_arah = $request->keteranganArahDatas;
    $storeData->peta = $request->petaDatas;
    $storeData->negara = $request->negaraDatas;
    $storeData->provinsi = $request->provinsiDatas;
    $storeData->kota = $request->kotaDatas;
    $storeData->kecamatan = $request->kecamatanDatas;
    $storeData->kelurahan = $request->kelurahanDatas;
    $storeData->kode_pos = $request->kodePosDatas;
    $storeData->dusun = $request->dusunDatas;
    $storeData->rt = $request->rtDatas;
    $storeData->rw = $request->rwDatas;
    $storeData->area = $request->areaDatas;
    $storeData->lokasi = $request->lokasiDatas;
    $storeData->no_telp = $request->noTelpSDatas;
    $storeData->no_rumah = $request->telpRumahDatas;
    $storeData->no_hpsatu = $request->noHpSDatas;
    $storeData->bisa_sms = $request->terimaSMSDatas;
    $storeData->no_hpdua = $request->noHpDDatas;
    $storeData->no_lainnya = $request->noLainDatas;
    $storeData->fax_rumah = $request->faxDatas;
    $storeData->alamat_surel = $request->emailDatas;
    $storeData->bisa_email = $request->terimaEmailDatas;
    $storeData->website = $request->websiteDatas;
    $storeData->pekerjaan = $request->pekerjaanDatas;
    $storeData->jabatan = $request->jabatanDatas;
    $storeData->status_pekerjaan = $request->statusPekerjaanDatas;
    $storeData->nama_perusahaan = $request->namaPerusahaanDatas;
    $storeData->sektor_industri = $request->sektorIndustriDatas;
    $storeData->alamat_kantor = $request->alamatKantorDatas;
    $storeData->telp_kantor = $request->telpKantorDatas;
    $storeData->ext = $request->extDatas;
    $storeData->tingkat_pendidikan = $request->tingkatPendidikanDatas;
    $storeData->sekolah_univ = $request->sekolahDatas;
    if ($request->bKetertarikanDatas != null) {
      $bKetertarikanDatasPost = json_encode($request->bKetertarikanDatas);
    } else {
      $bKetertarikanDatasPost = '';
    }
    $storeData->bidang_ketertarikan = $bKetertarikanDatasPost;
    if ($request->bKeterampilanDatas != null) {
      $bKeterampilanDatasPost = json_encode($request->bKeterampilanDatas);
    } else {
      $bKeterampilanDatasPost = '';
    }
    $storeData->bidang_keterampilan = $bKeterampilanDatasPost;
    $storeData->catatan = $request->catatanDatas;
    $storeData->status = $request->statusDatas;
    $storeData->verif_email = $request->verifEmailDatas;
    $storeData->no_rekening = $request->noRekDatas;
    $storeData->periode_beasiswa = $request->perBeasiswaDatas;
    $storeData->periode_kerja_praktiK = $request->perKerjaPDatas;
    $storeData->riwayat_pelayananSatu = $request->riwayatPelSDatas;
    $storeData->riwayat_pelayananDua = $request->riwayatPelDDatas;
    $storeData->riwayat_pelayananTiga = $request->riwayatPelTDatas;
    $storeData->riwayat_pelayananEmpat = $request->riwayatPelEDatas;
    $storeData->kolom_cadanganPSatu = $request->pilihanSDatas;
    $storeData->kolom_cadanganPDua = $request->pilihanDDatas;
    $storeData->kolom_cadanganPTiga = $request->pilihanTDatas;
    $storeData->kolom_cadanganPEmpat = $request->pilihanEDatas;
    $storeData->kolom_cadanganPLima = $request->pilihanLDatas;
    $storeData->kolom_cadanganPEnam = $request->pilihanEnDatas;
    $storeData->kolom_cadanganPTujuh = $request->pilihanTuDatas;
    if ($request->pilihanGSDatas != null) {
      $pilihanGSDatasPost = json_encode($request->pilihanGSDatas);
    } else {
      $pilihanGSDatasPost = '';
    }
    $storeData->personality_mbti = $pilihanGSDatasPost;
    if ($request->pilihanGDDatas != null) {
      $pilihanGDDatasPost = json_encode($request->pilihanGDDatas);
    } else {
      $pilihanGDDatasPost = '';
    }
    $storeData->personality_holland = $pilihanGDDatasPost;
    if ($request->pilihanGTDatas != null) {
      $pilihanGTDatasPost = json_encode($request->pilihanGTDatas);
    } else {
      $pilihanGTDatasPost = '';
    }
    $storeData->spiritual_gifts = $pilihanGTDatasPost;
    if ($request->pilihanGEDatas != null) {
      $pilihanGEDatasPost = json_encode($request->pilihanGEDatas);
    } else {
      $pilihanGEDatasPost = '';
    }
    $storeData->abilities = $pilihanGEDatasPost;
    if ($request->pilihanGLDatas != null) {
      $pilihanGLDatasPost = json_encode($request->pilihanGLDatas);
    } else {
      $pilihanGLDatasPost = '';
    }
    $storeData->experience = $pilihanGLDatasPost;
    if ($request->pilihanGEnDatas != null) {
      $pilihanGEnDatasPost = json_encode($request->pilihanGEnDatas);
    } else {
      $pilihanGEnDatasPost = '';
    }
    $storeData->kemampuan_bahasa = $pilihanGEnDatasPost;
    $storeData->kolom_cadanganCBSatu = $request->checkSDatas;
    $storeData->kolom_cadanganCBDua = $request->checkDDatas;
    $storeData->kolom_cadanganCBTiga = $request->checkTDatas;
    $storeData->kolom_cadanganCBEmpat = $request->checkEDatas;
    $storeData->kolom_cadanganCBLima = $request->checkLDatas;
    $storeData->kolom_cadanganCBEnam = $request->checkEnDatas;
    $storeData->kolom_cadanganCBTujuh = $request->checkTuDatas;
    $storeData->ba_sudah = $request->sudahBaptisAnakDatas;
    $storeData->ba_tanggal = $request->tglBaptisAnakDatas;
    $storeData->ba_tempat = $request->tempatBaptisAnakDatas;
    if ($request->hasfile('fileUploadBaptisAnakDatas')) {
      $destination = "images/Data Lembaga/Dokumen Baptis Anak";
      $filenameBptsAnak = $request->file('fileUploadBaptisAnakDatas');
      $filenameBptsAnak->move($destination, $filenameBptsAnak->getClientOriginalName());
      $fileBaptisAnak = $filenameBptsAnak->getClientOriginalName();
    } else {
      $fileBaptisAnak = '';
    }
    $storeData->ba_file = $fileBaptisAnak;
    $storeData->ba_ket = $request->ketBaptisAnakDatas;
    $storeData->menikah_sudah = $request->sudahMenikahDatas;
    $storeData->menikah_tanggal = $request->tglMenikahDatas;
    $storeData->menikah_tempat = $request->tempatMenikahDatas;
    if ($request->hasfile('fileUploadMenikahDatas')) {
      $destination = "images/Data Lembaga/Dokumen Menikah";
      $filenameMenikah = $request->file('fileUploadMenikahDatas');
      $filenameMenikah->move($destination, $filenameMenikah->getClientOriginalName());
      $fileMenikah = $filenameMenikah->getClientOriginalName();
    } else {
      $fileMenikah = '';
    }
    $storeData->menikah_file = $fileMenikah;
    $storeData->menikah_ket = $request->ketMenikahDatas;
    $storeData->bap_sudah = $request->sudahBaptisDatas;
    $storeData->bap_tanggal = $request->tglBaptisDatas;
    $storeData->bap_tempat = $request->tempatBaptisDatas;
    if ($request->hasfile('fileUploadBaptisDatas')) {
      $destination = "images/Data Lembaga/Dokumen Baptis";
      $filenameBaptis = $request->file('fileUploadBaptisDatas');
      $filenameBaptis->move($destination, $filenameBaptis->getClientOriginalName());
      $fileBaptis = $filenameBaptis->getClientOriginalName();
    } else {
      $fileBaptis = '';
    }
    $storeData->bap_file = $fileBaptis;
    $storeData->bap_ket = $request->ketBaptisDatas;
    $storeData->md_sudah = $request->sudahMeninggalDuniaDatas;
    $storeData->md_tanggal = $request->tglMeninggalDuniaDatas;
    $storeData->md_tempat = $request->tempatMeninggalDuniaDatas;
    if ($request->hasfile('fileUploadMeninggalDuniaDatas')) {
      $destination = "images/Data Lembaga/Dokumen Meninggal Dunia";
      $filenameMeninggalD = $request->file('fileUploadMeninggalDuniaDatas');
      $filenameMeninggalD->move($destination, $filenameMeninggalD->getClientOriginalName());
      $fileMeninggalD = $filenameMeninggalD->getClientOriginalName();
    } else {
      $fileMeninggalD = '';
    }
    $storeData->md_file = $fileMeninggalD;
    $storeData->md_ket = $request->ketMeninggalDuniaDatas;
    $storeData->pa_sudah = $request->sudahPenyerahanAnakDatas;
    $storeData->pa_tanggal = $request->tglPenyerahanAnakDatas;
    $storeData->pa_tempat = $request->tempatPenyerahanAnakDatas;
    if ($request->hasfile('fileUploadPenyerahanAnakDatas')) {
      $destination = "images/Data Lembaga/Dokumen Penyerahan Anak";
      $filenamePenyAnak = $request->file('fileUploadPenyerahanAnakDatas');
      $filenamePenyAnak->move($destination, $filenamePenyAnak->getClientOriginalName());
      $filePenyAnak = $filenamePenyAnak->getClientOriginalName();
    } else {
      $filePenyAnak = '';
    }
    $storeData->pa_file = $filePenyAnak;
    $storeData->pa_ket = $request->ketPenyerahanAnakDatas;
    $storeData->ee_sudah = $request->sudahEvangelismExplosionDatas;
    $storeData->ee_tanggal = $request->tglEvangelismExplosionDatas;
    $storeData->ee_tempat = $request->tempatEvangelismExplosionDatas;
    if ($request->hasfile('fileUploadEvangelismExplosionDatas')) {
      $destination = "images/Data Lembaga/Dokumen Evangelism Explosion";
      $filenameEvExplo = $request->file('fileUploadEvangelismExplosionDatas');
      $filenameEvExplo->move($destination, $filenameEvExplo->getClientOriginalName());
      $fileEvExplo = $filenameEvExplo->getClientOriginalName();
    } else {
      $fileEvExplo = '';
    }
    $storeData->ee_file = $fileEvExplo;
    $storeData->ee_ket = $request->ketEvangelismExplosionDatas;
    $storeData->bid_sudah = $request->sudahIkatanDinasDatas;
    $storeData->bid_tanggal = $request->tglIkatanDinasDatas;
    $storeData->bid_tempat = $request->tempatIkatanDinasDatas;
    if ($request->hasfile('fileUploadIkatanDinasDatas')) {
      $destination = "images/Data Lembaga/Dokumen Berakhir Ikatan Dinas";
      $filenameBerIkNas = $request->file('fileUploadIkatanDinasDatas');
      $filenameBerIkNas->move($destination, $filenameBerIkNas->getClientOriginalName());
      $fileBerIkNas = $filenameBerIkNas->getClientOriginalName();
    } else {
      $fileBerIkNas = '';
    }
    $storeData->bid_file = $fileBerIkNas;
    $storeData->bid_ket = $request->ketIkatanDinasDatas;
    $storeData->pdt_sudah = $request->sudahPrktkDuaThnDatas;
    $storeData->pdt_tanggal = $request->tglPrktkDuaThnDatas;
    $storeData->pdt_tempat = $request->tempatPrktkDuaThnDatas;
    if ($request->hasfile('fileUploadPrktkDuaThnDatas')) {
      $destination = "images/Data Lembaga/Dokumen Praktek 2 Tahun";
      $filenamePrakDuaThn = $request->file('fileUploadPrktkDuaThnDatas');
      $filenamePrakDuaThn->move($destination, $filenamePrakDuaThn->getClientOriginalName());
      $filePrakDuaThn = $filenamePrakDuaThn->getClientOriginalName();
    } else {
      $filePrakDuaThn = '';
    }
    $storeData->pdt_file = $filePrakDuaThn;
    $storeData->pdt_ket = $request->ketPrktkDuaThnDatas;
    $storeData->kata_sandi = $request->kata_sandiDatas;
    $storeData->institusi = $request->institusiDatas;
    $storeDataSave = $storeData->save();

    if($storeDataSave){
      if ($request->tambahNominals != '') {
        foreach ($request->tambahNominals as $key => $isiTambahNominal) {
          $storeNominals = new Nominal;
          $storeNominals->id_nominal = $this->randomCodes();
          $storeNominals->id_user = $request->idDatas;
          $storeNominals->keterangan_nominal = $isiTambahNominal['ket_nominal'];
          $storeNominals->nominal = $isiTambahNominal['nominal'];
          $storeNominals->save();
        }
      }
      if ($request->institusiDatas == 'PM (Parousia Ministry)') {
        $institusi = 'PM';
      } else {
        $institusi = 'GKP';
      }
      $addUser = new User;
      $addUser->id_user = $request->idDatas;
      $addUser->name = $request->namaDatas;
      $addUser->email = $request->emailDatas;
      $addUser->password = bcrypt($request->kata_sandiDatas);
      $addUser->role = $request->untukPendataans;
      $addUser->institusi = $institusi;
      $addUser->remember_token = Str::random(60);
      $addUser->save();
      
      if ($addUser) {
        return redirect()->route('data-lembaga.index')->with(['success' => 'Data Berhasil Disimpan!']);
      }else{
        return redirect()->route('data-lembaga.index')->with(['error' => 'Data Gagal Disimpan!']);
      }
    }else{
      return redirect()->route('data-lembaga.index')->with(['error' => 'Data Gagal Disimpan!']);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Data_lembaga  $data_lembaga
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $skala = Nama_kelompok::join('data_lembagas', 'nama_kelompoks.id_ketua_kelompok', '=', 'data_lembagas.id_user')
                ->select('nama_kelompoks.*')
                ->where('nama_kelompoks.id_ketua_kelompok', $id)
                ->get();

    return response()->json(["skala" => $skala]);
  } 

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Data_lembaga  $data_lembaga
   * @return \Illuminate\Http\Response
   */
  public function edit(Data_lembaga $data_lembaga)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Data_lembaga  $data_lembaga
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Data_lembaga $data_lembaga)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Data_lembaga  $data_lembaga
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $deleteData = Data_lembaga::firstWhere('id_user', $id);
    // dd($deleteData);
    if ($deleteData->foto != '') {
      $destination = 'images/Data Lembaga/Foto/'.$deleteData->foto;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    if ($deleteData->foto_bitmap != '') {
      $destination = 'images/Data Lembaga/Foto Bitmap/'.$deleteData->foto_bitmap;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    if ($deleteData->ba_file != '') {
      $destination = 'images/Data Lembaga/Dokumen Baptis Anak/'.$deleteData->ba_file;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    if ($deleteData->menikah_file != '') {
      $destination = 'images/Data Lembaga/Dokumen Menikah/'.$deleteData->menikah_file;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    if ($deleteData->bap_file != '') {
      $destination = 'images/Data Lembaga/Dokumen Baptis/'.$deleteData->bap_file;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    if ($deleteData->md_file != '') {
      $destination = 'images/Data Lembaga/Dokumen Meninggal/'.$deleteData->md_file;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    if ($deleteData->pa_file != '') {
      $destination = 'images/Data Lembaga/Dokumen Penyerahan Anak/'.$deleteData->pa_file;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    if ($deleteData->ee_file != '') {
      $destination = 'images/Data Lembaga/Evangelism Explosion/'.$deleteData->ee_file;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    if ($deleteData->bid_file != '') {
      $destination = 'images/Data Lembaga/Dokumen Berakhir Ikatan Dinas/'.$deleteData->bid_file;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    if ($deleteData->pdt_file != '') {
      $destination = 'images/Data Lembaga/Dokumen Praktek 2 Tahun/'.$deleteData->pdt_file;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    $getUser = User::where('email', $deleteData->alamat_surel);
    $getUser->delete();
    $getNamaKelompok = Nama_kelompok::where('id_ketua_kelompok', $id);
    if ($getNamaKelompok) {
      $getNamaKelompok->delete();
    }
    $getKelompok = Kelompok::where('id_ketua_kelompok', $id);
    if ($getKelompok) {
      $getKelompok->delete();
    }
    $deleteData->delete();

    if($deleteData){
      return redirect()->route('data-lembaga.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
      return redirect()->route('data-lembaga.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
  } 
}
