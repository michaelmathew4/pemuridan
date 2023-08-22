<?php

namespace App\Http\Controllers;

use Image;
use  File;
use App\Models\Peserta;
use App\Models\Data_lembaga;
use App\Models\Skala;
use App\Models\Lokasi;
use App\Models\User;
use App\Models\Ketua_lokasi;
use App\Models\Ketua_kelompok;
use App\Models\Kelompok;
use App\Models\Catatan;
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
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
    $pesertas = Peserta::join('data_lembagas', 'data_lembagas.id_user', '=', 'pesertas.peminta')
                ->select('data_lembagas.id_user', 'data_lembagas.nama_lengkap', 'data_lembagas.data_lembaga', 'data_lembagas.institusi', 'pesertas.*')
                ->addSelect([
                  'skala' => Skala::select('skala')
                      ->whereColumn('id_peserta', 'pesertas.id_peserta')
                      ->orderBy('created_at', 'desc')
                      ->limit(1),
                  'catatan' => Catatan::select('catatan')
                      ->whereColumn('id_peserta', 'pesertas.id_peserta')
                      ->orderBy('created_at', 'desc')
                      ->limit(1),
                  'id_user' => Data_lembaga::select('id_user')
                      ->whereColumn('id_user', 'pesertas.id_peserta')
                      ->limit(1)
                ])->get();
    
    $no = 1;
    $lokasis = Lokasi::all();
    $kelompoks = Kelompok::all();
    $dataLembagas = Data_lembaga::all();
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
    $kc_pilsatus = Kc_pilsatu::all();
    $kc_pilduas = Kc_pildua::all();
    $kc_piltigas = Kc_piltiga::all();
    $kc_pilempats = Kc_pilempat::all();
    $kc_pillimas = Kc_pillima::all();
    $kc_pilenams = Kc_pilenam::all();
    $kc_piltujuhs = Kc_piltujuh::all();
    
    // $kelompoks = Kelompok::join('data_lembagas', 'kelompok.id_ketua_kelompok', '=', 'data_lembagas.id_user');
    return view('admin.data-kontak', compact(['pesertas', 'no', 'lokasis', 'kelompoks', 'dataLembagas', 'pekerjaans', 'statusPekerjaans',
                                              'sektorIndustris', 'tingkatPendidikans', 'sekolahUnivs', 'bidKeterampilans', 'bidKetertarikans',
                                              'persMbtis', 'persHollands', 'spiritGifts', 'abilities', 'gandaLimas', 'kemBahasas', 'kc_pilsatus',
                                              'kc_pilduas', 'kc_piltigas', 'kc_pilempats', 'kc_pillimas', 'kc_pilenams', 'kc_piltujuhs']));
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
    if ($request->inputTambah == "tambahData" && $request->inputMethod == "tambahDataBaru") {
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
        'fotoPRS'     => 'image|mimes:png,jpg,jpeg',
        'pemintaInput'     => 'required'
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
        'fotoPeserta.image' => 'Berkas harus berupa Gambar.',
        'pemintaInput.required' => 'Peminta Input tidak boleh kosong.'
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
      $upload->peminta = $request->pemintaInput;
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

    if ($request->inputTambah == "inputSkala" && $request->inputMethod == "tambahDataBaru") {
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

    if ($request->inputTambah == "inputCatatan" && $request->inputMethod == "tambahDataBaru") {
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

    if ($request->inputMethod = "rubahJadiKK") {
      $request->validate([
        'idDatas' => 'required|unique:users,id_user',
        'tglRegistrasiDatas'     => 'required',
        'namaDatas' => 'required',
        'fileUploadMenikahDatas'  => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,xlsx,xls,txt,pdf,zip',
        'fileUploadBaptisDatas'  => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,xlsx,xls,txt,pdf,zip',
        'emailDatas'   => 'email:rfc,dns|unique:users,email',
        'lokasiDatas'  => 'required',
        'institusiDatas'   => 'required',
        'kata_sandiDatas'  => 'required'
      ],
      [
        'idDatas.required' => 'ID tidak boleh kosong.',
        'idDatas.unique' => 'ID sudah terdaftar.',
        'tglRegistrasiDatas.required' => 'Tanggal Registrasi tidak boleh kosong.',
        'namaDatas.required' => 'Nama Lengkap tidak boleh kosong.',
        'fileUploadMenikahDatas.file' => 'Berkas harus berupa Dokumen.',
        'fileUploadMenikahDatas.mimes' => 'Berkas harus berupa Dokumen (.doc, .docx, .csv, .xlsx, .xls, .txt, .pdf, .zip).',
        'fileUploadBaptisDatas.file' => 'Berkas harus berupa Dokumen.',
        'fileUploadBaptisDatas.mimes' => 'Berkas harus berupa Dokumen (.doc, .docx, .csv, .xlsx, .xls, .txt, .pdf, .zip).',
        'emailDatas.unique' => 'Alamat Surel sudah ada.',
        'lokasiDatas.required' => 'Lokasi tidak boleh kosong.',
        'institusiDatas.required' => 'Lembaga tidak boleh kosong.',
        'kata_sandiDatas.required' => 'Kata Sandi tidak boleh kosong.'
      ]);
  
      $storeData = new Data_lembaga;
      $storeData->data_lembaga = "Ketua Kelompok";
      $storeData->id_user = $request->idDatas;
      $storeData->tanggal_regist = $request->tglRegistrasiDatas;
      $storeData->nama_lengkap = $request->namaDatas;
      $storeData->jenis_identitas = $request->jenisIdentitasDatas;
      $storeData->no_identitas = $request->noIdentitasDatas;
      $storeData->tempat_lahir = $request->tempatLahirDatas;
      $storeData->tanggal_lahir = $request->tglLahirDatas;
      $storeData->jK = $request->jenisKelaminDatas;
      $storeData->goldar = $request->golonganDarahDatas;
      $storeData->status_pernikahan = $request->statusPernikahanDatas;
      $storeData->suku = $request->sukus;
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
      $storeData->alamat_surel = $request->emailDatas;
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
      $storeData->bidang_ketertarikan = json_encode($request->bKetertarikanDatas);
      $storeData->bidang_keterampilan = json_encode($request->bKeterampilanDatas);
      $storeData->catatan = $request->catatanDatas;
      $storeData->status = $request->statusDatas;
      $storeData->no_rekening = $request->noRekDatas;
      $storeData->periode_beasiswa = $request->perBeasiswaDatas;
      $storeData->periode_kerja_praktiK = $request->perKerjaPDatas;
      $storeData->riwayat_pelayananSatu = $request->riwayatPelSDatas;
      $storeData->riwayat_pelayananDua = $request->riwayatPelDDatas;
      $storeData->riwayat_pelayananTiga = $request->riwayatPelTDatas;
      $storeData->riwayat_pelayananEmpat = $request->riwayatPelEDatas;
      $storeData->personality_mbti = json_encode($request->pilihanGSDatas);
      $storeData->personality_holland = json_encode($request->pilihanGDDatas);
      $storeData->spiritual_gifts = json_encode($request->pilihanGTDatas);
      $storeData->abilities = json_encode($request->pilihanGEDatas);
      $storeData->experience = json_encode($request->pilihanGLDatas);
      $storeData->kemampuan_bahasa = json_encode($request->pilihanGEnDatas);
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
      $storeData->kata_sandi = $request->kata_sandiDatas;
      $storeData->institusi = $request->institusiDatas;
      $storeDataSave = $storeData->save();
      
      // $idKelompok = Kelompok::where('id_peserta', $request->idForGet)->firstOrFail();
      // dd($idKelompok);
  
      if ($storeDataSave) {
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
        $addUser->role = "Ketua Kelompok";
        $addUser->institusi = $institusi;
        $addUser->remember_token = Str::random(60);
        $addUser->save();
  
        $idSkala = Skala::where('id_peserta', $request->idForGet)->get();
        foreach ($idSkala as $idSkalas) {
          $idSkalas->update([
            'id_peserta'     => $request->idDatas
          ]);
        }
        
        $idCatatan = Catatan::where('id_peserta', $request->idForGet)->get();
        foreach ($idCatatan as $idCatatans) {
          $idCatatans->update([
            'id_peserta'     => $request->idDatas
          ]);
        }
        
        $idKelompok = Kelompok::where('id_peserta', $request->idForGet)->firstOrFail();
        $idKelompok->update([
          'id_peserta'     => $request->idDatas
        ]);
        
        $idPeserta = Peserta::where('id_peserta', $request->idForGet)->firstOrFail();
        $idPeserta->update([
          'id_peserta'     => $request->idDatas
        ]);
  
        
        if ($addUser) {
          return redirect()->route('data-kontak.index')->with(['success' => 'Data Berhasil Dirubah Menjadi Ketua Kelompok!']);
        }else{
          return redirect()->route('data-kontak.index')->with(['error' => 'Data Gagal Dirubah Menjadi Ketua Kelompok!']);
        }
      }else{
        return redirect()->route('data-kontak.index')->with(['error' => 'Data Gagal Dirubah Menjadi Ketua Kelompoks!']);
      }
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $skala = Skala::join('pesertas', 'skalas.id_peserta', '=', 'pesertas.id_peserta')
                ->select('skalas.*')
                ->where('skalas.id_peserta', $id)
                ->get();

    $catatan = Catatan::join('pesertas', 'catatans.id_peserta', '=', 'pesertas.id_peserta')
                ->select('catatans.*')
                ->where('catatans.id_peserta', $id)
                ->get();
    return response()->json(["skala" => $skala, "catatan" => $catatan]);
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
    $pesertaUpdate = Peserta::firstWhere('id_peserta', $id);
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
          'peminta'   => $request->editPemintaInput,
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
          'peminta'   => $request->editPemintaInput,
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
          'peminta'   => $request->editPemintaInput,
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
    $deleteDataPeserta = Peserta::findWhere('id_peserta', $id);
    if ($deleteDataPeserta->foto_peserta != '') {
      $destination = 'images/Peserta/'.$deleteDataPeserta->foto_peserta;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    $deleteDataPeserta->delete();

    if($deleteDataPeserta){
      $deleteSkalaPeserta = Skala::where('id_peserta', $id);
      $deleteSkalaPeserta->delete();
      if($deleteSkalaPeserta) {
        $deleteCatatanPeserta = Catatan::where('id_peserta', $id);
        $deleteCatatanPeserta->delete();
        if ($deleteCatatanPeserta) {
          return redirect()->route('data-kontak.index')->with(['success' => 'Peserta Berhasil Dihapus!']);
        }else{
          return redirect()->route('data-kontak.index')->with(['error' => 'Peserta Gagal Dihapus!']);
        }
      }else{
        return redirect()->route('data-kontak.index')->with(['error' => 'Peserta Gagal Dihapus!']);
      }
    }else{
      return redirect()->route('data-kontak.index')->with(['error' => 'Peserta Gagal Dihapus!']);
    }
  }
  






















  //Pengurus PM
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function indexPengurusPM()
  {
    $pesertas = Peserta::join('data_lembagas', 'data_lembagas.id_user', '=', 'pesertas.peminta')
                ->select('data_lembagas.id_user', 'data_lembagas.nama_lengkap', 'data_lembagas.data_lembaga', 'data_lembagas.institusi', 'pesertas.*')
                ->where('institusi_peserta', 'PM (Parousia Ministry)')
                ->addSelect([
                  'skala' => Skala::select('skala')
                      ->whereColumn('id_peserta', 'pesertas.id_peserta')
                      ->orderBy('created_at', 'desc')
                      ->limit(1),
                  'catatan' => Catatan::select('catatan')
                      ->whereColumn('id_peserta', 'pesertas.id_peserta')
                      ->orderBy('created_at', 'desc')
                      ->limit(1),
                  'id_user' => Data_lembaga::select('id_user')
                      ->whereColumn('id_user', 'pesertas.id_peserta')
                      ->limit(1)
                ])->get();
    
    
    $no = 1;
    $lokasis = Lokasi::all();
    return view('parousia-ministry.pengurus.data-kontak', compact(['pesertas', 'no', 'lokasis']));
  }

  
  function randomCodesPengurusPM()
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
  public function storePengurusPM(Request $request)
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
        'fotoPRS'     => 'image|mimes:png,jpg,jpeg',
        'pemintaInput'     => 'required'
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
        'fotoPeserta.image' => 'Berkas harus berupa Gambar.',
        'pemintaInput.required' => 'Peminta Input tidak boleh kosong.'
      ]);

      $fotoPesertaUpload = '';
      if ($request->hasfile('fotoPeserta')) {
        $destination = "images/Peserta";
        $filename = $request->file('fotoPeserta');
        $filename->move($destination, $filename->getClientOriginalName());
        $fotoPesertaUpload = $filename->getClientOriginalName();
      }

      $upload = new Peserta;
      $upload->id_peserta = $this->randomCodesPengurusPM();
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
      $upload->peminta = $request->pemintaInput;
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
            return redirect()->route('data-kontak.indexPengurusPM')->with(['success' => 'Data Kontak Berhasil Disimpan!']);
          } else{
            return redirect()->route('data-kontak.indexPengurusPM')->with(['error' => 'Data Kontak Gagal Disimpan!']);
          }
        } else{
          return redirect()->route('data-kontak.indexPengurusPM')->with(['error' => 'Data Kontak Gagal Disimpan!']);
        }
      } else{
        return redirect()->route('data-kontak.indexPengurusPM')->with(['error' => 'Data Kontak Gagal Disimpan!']);
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
        return redirect()->route('data-kontak.indexPengurusPM')->with(['success' => 'Skala Berhasil Disimpan!']);
      } else {
        return redirect()->route('data-kontak.indexPengurusPM')->with(['error' => 'Skala Gagal Disimpan!']);
      }
    }

    if ($request->inputTambah == "inputCatatan") {
      $newCatatan = new Catatan;
      $newCatatan->catatan = $request->tambahCatatanPeserta;
      $newCatatan->id_peserta = $request->id_pesertaCatatan;
      $newCatatan->tgl_kontak = $request->tambahTgl_kontakCatatan;
      $newCatatan->save();

      if ($newCatatan) {
        return redirect()->route('data-kontak.indexPengurusPM')->with(['success' => 'Catatan Berhasil Disimpan!']);
      } else {
        return redirect()->route('data-kontak.indexPengurusPM')->with(['error' => 'Catatan Gagal Disimpan!']);
      }
    }
    
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function showPengurusPM($id)
  {
    $skala = Skala::join('pesertas', 'skalas.id_peserta', '=', 'pesertas.id_peserta')
                ->select('skalas.*')
                ->where('skalas.id_peserta', $id)
                ->get();

    $catatan = Catatan::join('pesertas', 'catatans.id_peserta', '=', 'pesertas.id_peserta')
                ->select('catatans.*')
                ->where('catatans.id_peserta', $id)
                ->get();
    return response()->json(["skala" => $skala, "catatan" => $catatan]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function updatePengurusPM(Request $request, $id)
  {
    $pesertaUpdate = Peserta::findWhere('id_peserta', $id);
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
          'peminta'   => $request->editPemintaInput,
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
          'peminta'   => $request->editPemintaInput,
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
          'peminta'   => $request->editPemintaInput,
          'foto_peserta'     => $filename->getClientOriginalName()
        ]);
      }
    }
    if($pesertaUpdate){
      //redirect dengan pesan sukses
      return redirect()->route('data-kontak.indexPengurusPM')->with(['success' => 'Kontak Berhasil Diubah!']);
    }else{
      //redirect dengan pesan error
      return redirect()->route('data-kontak.indexPengurusPM')->with(['error' => 'Kontak Gagal Diubah!']);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function destroyPengurusPM($id)
  {
    $deleteDataPeserta = Peserta::findWhere('id_peserta', $id);
    if ($deleteDataPeserta->foto_peserta != '') {
      $destination = 'images/Peserta/'.$deleteDataPeserta->foto_peserta;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    $deleteDataPeserta->delete();

    if($deleteDataPeserta){
      $deleteSkalaPeserta = Skala::where('id_peserta', $id);
      $deleteSkalaPeserta->delete();
      if($deleteSkalaPeserta) {
        $deleteCatatanPeserta = Catatan::where('id_peserta', $id);
        $deleteCatatanPeserta->delete();
        if ($deleteCatatanPeserta) {
          return redirect()->route('data-kontak.indexPengurusPM')->with(['success' => 'Peserta Berhasil Dihapus!']);
        }else{
          return redirect()->route('data-kontak.indexPengurusPM')->with(['error' => 'Peserta Gagal Dihapus!']);
        }
      }else{
        return redirect()->route('data-kontak.indexPengurusPM')->with(['error' => 'Peserta Gagal Dihapus!']);
      }
    }else{
      return redirect()->route('data-kontak.indexPengurusPM')->with(['error' => 'Peserta Gagal Dihapus!']);
    }
  }
  //End Pengurus PM

  
  //Ketua Lokasi YMP
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function indexKetuaLokasiPM()
  {
    $cekKetuaLokasi = Ketua_lokasi::where('alamat_surelKL', auth()->user()->email)->first();
    $cekLokasi = Lokasi::where('nama_lokasi', $cekKetuaLokasi->lokasiKL)->first();
    $pesertas = Peserta::where('lokasi_peserta', $cekLokasi->nama_lokasi)
                ->join('data_lembagas', 'data_lembagas.id_user', '=', 'pesertas.peminta')
                ->select('data_lembagas.id_user', 'data_lembagas.nama_lengkap', 'data_lembagas.data_lembaga', 'data_lembagas.institusi', 'pesertas.*')
                ->addSelect([
                  'skala' => Skala::select('skala')
                      ->whereColumn('id_peserta', 'pesertas.id_peserta')
                      ->orderBy('created_at', 'desc')
                      ->limit(1),
                  'catatan' => Catatan::select('catatan')
                      ->whereColumn('id_peserta', 'pesertas.id_peserta')
                      ->orderBy('created_at', 'desc')
                      ->limit(1),
                  'id_user' => Data_lembaga::select('id_user')
                      ->whereColumn('id_user', 'pesertas.id_peserta')
                      ->limit(1)
                ])->get();
    
    $no = 1;
    $lokasis = Lokasi::all();
    return view('parousia-ministry.ketua-lokasi.data-kontak', compact(['pesertas', 'no', 'lokasis']));
  }


  function randomCodesKetuaLokasiPM()
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
  public function storeKetuaLokasiPM(Request $request)
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
        'fotoPRS'     => 'image|mimes:png,jpg,jpeg',
        'pemintaInput'     => 'required'
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
        'fotoPeserta.image' => 'Berkas harus berupa Gambar.',
        'pemintaInput.required' => 'Peminta Input tidak boleh kosong.'
      ]);

      $fotoPesertaUpload = '';
      if ($request->hasfile('fotoPeserta')) {
        $destination = "images/Peserta";
        $filename = $request->file('fotoPeserta');
        $filename->move($destination, $filename->getClientOriginalName());
        $fotoPesertaUpload = $filename->getClientOriginalName();
      }

      $upload = new Peserta;
      $upload->id_peserta = $this->randomCodesKetuaLokasiPM();
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
      $upload->peminta = $request->pemintaInput;
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
            return redirect()->route('data-kontak.indexKetuaLokasiPM')->with(['success' => 'Data Kontak Berhasil Disimpan!']);
          } else{
            return redirect()->route('data-kontak.indexKetuaLokasiPM')->with(['error' => 'Data Kontak Gagal Disimpan!']);
          }
        } else{
          return redirect()->route('data-kontak.indexKetuaLokasiPM')->with(['error' => 'Data Kontak Gagal Disimpan!']);
        }
      } else{
        return redirect()->route('data-kontak.indexKetuaLokasiPM')->with(['error' => 'Data Kontak Gagal Disimpan!']);
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
        return redirect()->route('data-kontak.indexKetuaLokasiPM')->with(['success' => 'Skala Berhasil Disimpan!']);
      } else {
        return redirect()->route('data-kontak.indexKetuaLokasiPM')->with(['error' => 'Skala Gagal Disimpan!']);
      }
    }

    if ($request->inputTambah == "inputCatatan") {
      $newCatatan = new Catatan;
      $newCatatan->catatan = $request->tambahCatatanPeserta;
      $newCatatan->id_peserta = $request->id_pesertaCatatan;
      $newCatatan->tgl_kontak = $request->tambahTgl_kontakCatatan;
      $newCatatan->save();

      if ($newCatatan) {
        return redirect()->route('data-kontak.indexKetuaLokasiPM')->with(['success' => 'Catatan Berhasil Disimpan!']);
      } else {
        return redirect()->route('data-kontak.indexKetuaLokasiPM')->with(['error' => 'Catatan Gagal Disimpan!']);
      }
    }
    
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function showKetuaLokasiPM($id)
  {
    $skala = Skala::join('pesertas', 'skalas.id_peserta', '=', 'pesertas.id_peserta')
                ->select('skalas.*')
                ->where('skalas.id_peserta', $id)
                ->get();

    $catatan = Catatan::join('pesertas', 'catatans.id_peserta', '=', 'pesertas.id_peserta')
                ->select('catatans.*')
                ->where('catatans.id_peserta', $id)
                ->get();
    return response()->json(["skala" => $skala, "catatan" => $catatan]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function updateKetuaLokasiPM(Request $request, $id)
  {
    $pesertaUpdate = Peserta::findWhere('id_peserta', $id);
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
          'peminta'   => $request->editPemintaInput,
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
          'peminta'   => $request->editPemintaInput,
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
          'peminta'   => $request->editPemintaInput,
          'foto_peserta'     => $filename->getClientOriginalName()
        ]);
      }
    }
    if($pesertaUpdate){
      //redirect dengan pesan sukses
      return redirect()->route('data-kontak.indexKetuaLokasiPM')->with(['success' => 'Kontak Berhasil Diubah!']);
    }else{
      //redirect dengan pesan error
      return redirect()->route('data-kontak.indexKetuaLokasiPM')->with(['error' => 'Kontak Gagal Diubah!']);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function destroyKetuaLokasiPM($id)
  {
    $deleteDataPeserta = Peserta::findWhere('id_peserta', $id);
    if ($deleteDataPeserta->foto_peserta != '') {
      $destination = 'images/Peserta/'.$deleteDataPeserta->foto_peserta;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    $deleteDataPeserta->delete();

    if($deleteDataPeserta){
      $deleteSkalaPeserta = Skala::where('id_peserta', $id);
      $deleteSkalaPeserta->delete();
      if($deleteSkalaPeserta) {
        $deleteCatatanPeserta = Catatan::where('id_peserta', $id);
        $deleteCatatanPeserta->delete();
        if ($deleteCatatanPeserta) {
          return redirect()->route('data-kontak.indexKetuaLokasiPM')->with(['success' => 'Peserta Berhasil Dihapus!']);
        }else{
          return redirect()->route('data-kontak.indexKetuaLokasiPM')->with(['error' => 'Peserta Gagal Dihapus!']);
        }
      }else{
        return redirect()->route('data-kontak.indexKetuaLokasiPM')->with(['error' => 'Peserta Gagal Dihapus!']);
      }
    }else{
      return redirect()->route('data-kontak.indexKetuaLokasiPM')->with(['error' => 'Peserta Gagal Dihapus!']);
    }
  }
  

  //Ketua Kelompok PM
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function indexDataKKPM()
  {
    $pesertas = Peserta::where('peminta', '=', auth()->user()->id_user)
                ->addSelect([
                  'skala' => Skala::select('skala')
                      ->whereColumn('id_peserta', 'pesertas.id_peserta')
                      ->orderBy('created_at', 'desc')
                      ->limit(1),
                  'catatan' => Catatan::select('catatan')
                      ->whereColumn('id_peserta', 'pesertas.id_peserta')
                      ->orderBy('created_at', 'desc')
                      ->limit(1)
                ])->get();
    
    
    $no = 1;
    $lokasis = Lokasi::all();
    return view('parousia-ministry.ketua-kelompok.data-kontak', compact(['pesertas', 'no', 'lokasis']));
  }


  function randomCodesDataLembagaPM()
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
  public function storeDataKKPM(Request $request)
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
      $upload->id_peserta = $this->randomCodesDataLembagaPM();
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
      $upload->peminta = auth()->user()->id_user;
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
            return redirect()->route('data-kontak.indexDataKKPM')->with(['success' => 'Data Kontak Berhasil Disimpan!']);
          } else{
            return redirect()->route('data-kontak.indexDataKKPM')->with(['error' => 'Data Kontak Gagal Disimpan!']);
          }
        } else{
          return redirect()->route('data-kontak.indexDataKKPM')->with(['error' => 'Data Kontak Gagal Disimpan!']);
        }
      } else{
        return redirect()->route('data-kontak.indexDataKKPM')->with(['error' => 'Data Kontak Gagal Disimpan!']);
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
        return redirect()->route('data-kontak.indexDataKKPM')->with(['success' => 'Skala Berhasil Disimpan!']);
      } else {
        return redirect()->route('data-kontak.indexDataKKPM')->with(['error' => 'Skala Gagal Disimpan!']);
      }
    }

    if ($request->inputTambah == "inputCatatan") {
      $newCatatan = new Catatan;
      $newCatatan->catatan = $request->tambahCatatanPeserta;
      $newCatatan->id_peserta = $request->id_pesertaCatatan;
      $newCatatan->tgl_kontak = $request->tambahTgl_kontakCatatan;
      $newCatatan->save();

      if ($newCatatan) {
        return redirect()->route('data-kontak.indexDataKKPM')->with(['success' => 'Catatan Berhasil Disimpan!']);
      } else {
        return redirect()->route('data-kontak.indexDataKKPM')->with(['error' => 'Catatan Gagal Disimpan!']);
      }
    }
    
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function showDataKKPM($id)
  {
    $skala = Skala::join('pesertas', 'skalas.id_peserta', '=', 'pesertas.id_peserta')
                ->select('skalas.*')
                ->where('skalas.id_peserta', $id)
                ->get();

    $catatan = Catatan::join('pesertas', 'catatans.id_peserta', '=', 'pesertas.id_peserta')
                ->select('catatans.*')
                ->where('catatans.id_peserta', $id)
                ->get();
    return response()->json(["skala" => $skala, "catatan" => $catatan]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function updateDataKKPM(Request $request, $id)
  {
    $pesertaUpdate = Peserta::findWhere('id_peserta', $id);
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
      return redirect()->route('data-kontak.indexDataKKPM')->with(['success' => 'Kontak Berhasil Diubah!']);
    }else{
      //redirect dengan pesan error
      return redirect()->route('data-kontak.indexDataKKPM')->with(['error' => 'Kontak Gagal Diubah!']);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function destroyDataKKPM($id)
  {
    $deleteDataPeserta = Peserta::findWhere('id_peserta', $id);
    if ($deleteDataPeserta->foto_peserta != '') {
      $destination = 'images/Peserta/'.$deleteDataPeserta->foto_peserta;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    $deleteDataPeserta->delete();

    if($deleteDataPeserta){
      $deleteSkalaPeserta = Skala::where('id_peserta', $id);
      $deleteSkalaPeserta->delete();
      if($deleteSkalaPeserta) {
        $deleteCatatanPeserta = Catatan::where('id_peserta', $id);
        $deleteCatatanPeserta->delete();
        if ($deleteCatatanPeserta) {
          return redirect()->route('data-kontak.indexDataKKPM')->with(['success' => 'Peserta Berhasil Dihapus!']);
        }else{
          return redirect()->route('data-kontak.indexDataKKPM')->with(['error' => 'Peserta Gagal Dihapus!']);
        }
      }else{
        return redirect()->route('data-kontak.indexDataKKPM')->with(['error' => 'Peserta Gagal Dihapus!']);
      }
    }else{
      return redirect()->route('data-kontak.indexDataKKPM')->with(['error' => 'Peserta Gagal Dihapus!']);
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


    $no = 1;
    $lokasis = Lokasi::all();
    return view('gereja-kristen-parousia.pengurus.data-kontak', compact(['pesertas', 'no', 'lokasis']));
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
        'fotoPRS'     => 'image|mimes:png,jpg,jpeg',
        'pemintaInput'     => 'required'
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
        'fotoPeserta.image' => 'Berkas harus berupa Gambar.',
        'pemintaInput.required' => 'Peminta Input tidak boleh kosong.'
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
      $upload->peminta = $request->pemintaInput;
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
   * Display the specified resource.
   *
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function showPengurusGKP($id)
  {
    $skala = Skala::join('pesertas', 'skalas.id_peserta', '=', 'pesertas.id_peserta')
                ->select('skalas.*')
                ->where('skalas.id_peserta', $id)
                ->get();

    $catatan = Catatan::join('pesertas', 'catatans.id_peserta', '=', 'pesertas.id_peserta')
                ->select('catatans.*')
                ->where('catatans.id_peserta', $id)
                ->get();
    return response()->json(["skala" => $skala, "catatan" => $catatan]);
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
    $pesertaUpdate = Peserta::findWhere('id_peserta', $id);
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
          'peminta'   => $request->editPemintaInput,
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
          'peminta'   => $request->editPemintaInput,
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
          'peminta'   => $request->editPemintaInput,
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
    $deleteDataPeserta = Peserta::findWhere('id_peserta', $id);
    if ($deleteDataPeserta->foto_peserta != '') {
      $destination = 'images/Peserta/'.$deleteDataPeserta->foto_peserta;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    $deleteDataPeserta->delete();

    if($deleteDataPeserta){
      $deleteSkalaPeserta = Skala::where('id_peserta', $id);
      $deleteSkalaPeserta->delete();
      if($deleteSkalaPeserta) {
        $deleteCatatanPeserta = Catatan::where('id_peserta', $id);
        $deleteCatatanPeserta->delete();
        if ($deleteCatatanPeserta) {
          return redirect()->route('data-kontak.indexPengurusGKP')->with(['success' => 'Peserta Berhasil Dihapus!']);
        }else{
          return redirect()->route('data-kontak.indexPengurusGKP')->with(['error' => 'Peserta Gagal Dihapus!']);
        }
      }else{
        return redirect()->route('data-kontak.indexPengurusGKP')->with(['error' => 'Peserta Gagal Dihapus!']);
      }
    }else{
      return redirect()->route('data-kontak.indexPengurusGKP')->with(['error' => 'Peserta Gagal Dihapus!']);
    }
  }

  
  //Ketua Lokasi GKP
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
                ->join('data_lembagas', 'data_lembagas.id_user', '=', 'pesertas.peminta')
                ->select('data_lembagas.id_user', 'data_lembagas.nama_lengkap', 'data_lembagas.data_lembaga', 'data_lembagas.institusi', 'pesertas.*')
                ->addSelect([
                  'skala' => Skala::select('skala')
                      ->whereColumn('id_peserta', 'pesertas.id_peserta')
                      ->orderBy('created_at', 'desc')
                      ->limit(1),
                  'catatan' => Catatan::select('catatan')
                      ->whereColumn('id_peserta', 'pesertas.id_peserta')
                      ->orderBy('created_at', 'desc')
                      ->limit(1),
                  'id_user' => Data_lembaga::select('id_user')
                      ->whereColumn('id_user', 'pesertas.id_peserta')
                      ->limit(1)
                ])->get();
    
    $no = 1;
    $lokasis = Lokasi::all();
    return view('gereja-kristen-parousia.ketua-lokasi.data-kontak', compact(['pesertas', 'no', 'lokasis']));
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
        'fotoPRS'     => 'image|mimes:png,jpg,jpeg',
        'pemintaInput'     => 'required'
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
        'fotoPeserta.image' => 'Berkas harus berupa Gambar.',
        'pemintaInput.required' => 'Peminta Input tidak boleh kosong.'
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
      $upload->peminta = $request->pemintaInput;
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
   * Display the specified resource.
   *
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function showKetuaLokasiGKP($id)
  {
    $skala = Skala::join('pesertas', 'skalas.id_peserta', '=', 'pesertas.id_peserta')
                ->select('skalas.*')
                ->where('skalas.id_peserta', $id)
                ->get();

    $catatan = Catatan::join('pesertas', 'catatans.id_peserta', '=', 'pesertas.id_peserta')
                ->select('catatans.*')
                ->where('catatans.id_peserta', $id)
                ->get();
    return response()->json(["skala" => $skala, "catatan" => $catatan]);
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
    $pesertaUpdate = Peserta::findWhere('id_peserta', $id);
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
          'peminta'   => $request->editPemintaInput,
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
          'peminta'   => $request->editPemintaInput,
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
          'peminta'   => $request->editPemintaInput,
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
    $deleteDataPeserta = Peserta::findWhere('id_peserta', $id);
    if ($deleteDataPeserta->foto_peserta != '') {
      $destination = 'images/Peserta/'.$deleteDataPeserta->foto_peserta;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    $deleteDataPeserta->delete();

    if($deleteDataPeserta){
      $deleteSkalaPeserta = Skala::where('id_peserta', $id);
      $deleteSkalaPeserta->delete();
      if($deleteSkalaPeserta) {
        $deleteCatatanPeserta = Catatan::where('id_peserta', $id);
        $deleteCatatanPeserta->delete();
        if ($deleteCatatanPeserta) {
          return redirect()->route('data-kontak.indexKetuaLokasiGKP')->with(['success' => 'Peserta Berhasil Dihapus!']);
        }else{
          return redirect()->route('data-kontak.indexKetuaLokasiGKP')->with(['error' => 'Peserta Gagal Dihapus!']);
        }
      }else{
        return redirect()->route('data-kontak.indexKetuaLokasiGKP')->with(['error' => 'Peserta Gagal Dihapus!']);
      }
    }else{
      return redirect()->route('data-kontak.indexKetuaLokasiGKP')->with(['error' => 'Peserta Gagal Dihapus!']);
    }
  }
  

  //Ketua Kelompok GKP
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function indexDataKKGKP()
  {
    $pesertas = Peserta::where('peminta', '=', auth()->user()->id_user)
                ->addSelect([
                  'skala' => Skala::select('skala')
                      ->whereColumn('id_peserta', 'pesertas.id_peserta')
                      ->orderBy('created_at', 'desc')
                      ->limit(1),
                  'catatan' => Catatan::select('catatan')
                      ->whereColumn('id_peserta', 'pesertas.id_peserta')
                      ->orderBy('created_at', 'desc')
                      ->limit(1)
                ])->get();
    
    
    $no = 1;
    $lokasis = Lokasi::all();
    return view('gereja-kristen-parousia.ketua-kelompok.data-kontak', compact(['pesertas', 'no', 'lokasis']));
  }


  function randomCodesDataLembagaGKP()
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
  public function storeDataLembagaGKP(Request $request)
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
      $upload->id_peserta = $this->randomCodesDataLembagaGKP();
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
      $upload->peminta = auth()->user()->id_user;
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
            return redirect()->route('data-kontak.indexDataKKGKP')->with(['success' => 'Data Kontak Berhasil Disimpan!']);
          } else{
            return redirect()->route('data-kontak.indexDataKKGKP')->with(['error' => 'Data Kontak Gagal Disimpan!']);
          }
        } else{
          return redirect()->route('data-kontak.indexDataKKGKP')->with(['error' => 'Data Kontak Gagal Disimpan!']);
        }
      } else{
        return redirect()->route('data-kontak.indexDataKKGKP')->with(['error' => 'Data Kontak Gagal Disimpan!']);
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
        return redirect()->route('data-kontak.indexDataKKGKP')->with(['success' => 'Skala Berhasil Disimpan!']);
      } else {
        return redirect()->route('data-kontak.indexDataKKGKP')->with(['error' => 'Skala Gagal Disimpan!']);
      }
    }

    if ($request->inputTambah == "inputCatatan") {
      $newCatatan = new Catatan;
      $newCatatan->catatan = $request->tambahCatatanPeserta;
      $newCatatan->id_peserta = $request->id_pesertaCatatan;
      $newCatatan->tgl_kontak = $request->tambahTgl_kontakCatatan;
      $newCatatan->save();

      if ($newCatatan) {
        return redirect()->route('data-kontak.indexDataKKGKP')->with(['success' => 'Catatan Berhasil Disimpan!']);
      } else {
        return redirect()->route('data-kontak.indexDataKKGKP')->with(['error' => 'Catatan Gagal Disimpan!']);
      }
    }
    
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function showDataKKGKP($id)
  {
    $skala = Skala::join('pesertas', 'skalas.id_peserta', '=', 'pesertas.id_peserta')
                ->select('skalas.*')
                ->where('skalas.id_peserta', $id)
                ->get();

    $catatan = Catatan::join('pesertas', 'catatans.id_peserta', '=', 'pesertas.id_peserta')
                ->select('catatans.*')
                ->where('catatans.id_peserta', $id)
                ->get();
    return response()->json(["skala" => $skala, "catatan" => $catatan]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function updateDataKKGKP(Request $request, $id)
  {
    $pesertaUpdate = Peserta::findWhere('id_peserta', $id);
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
      return redirect()->route('data-kontak.indexDataKKGKP')->with(['success' => 'Kontak Berhasil Diubah!']);
    }else{
      //redirect dengan pesan error
      return redirect()->route('data-kontak.indexDataKKGKP')->with(['error' => 'Kontak Gagal Diubah!']);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function destroyDataKKGKP($id)
  {
    $deleteDataPeserta = Peserta::findWhere('id_peserta', $id);
    if ($deleteDataPeserta->foto_peserta != '') {
      $destination = 'images/Peserta/'.$deleteDataPeserta->foto_peserta;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    $deleteDataPeserta->delete();

    if($deleteDataPeserta){
      $deleteSkalaPeserta = Skala::where('id_peserta', $id);
      $deleteSkalaPeserta->delete();
      if($deleteSkalaPeserta) {
        $deleteCatatanPeserta = Catatan::where('id_peserta', $id);
        $deleteCatatanPeserta->delete();
        if ($deleteCatatanPeserta) {
          return redirect()->route('data-kontak.indexDataKKGKP')->with(['success' => 'Peserta Berhasil Dihapus!']);
        }else{
          return redirect()->route('data-kontak.indexDataKKGKP')->with(['error' => 'Peserta Gagal Dihapus!']);
        }
      }else{
        return redirect()->route('data-kontak.indexDataKKGKP')->with(['error' => 'Peserta Gagal Dihapus!']);
      }
    }else{
      return redirect()->route('data-kontak.indexDataKKGKP')->with(['error' => 'Peserta Gagal Dihapus!']);
    }
  }
}
