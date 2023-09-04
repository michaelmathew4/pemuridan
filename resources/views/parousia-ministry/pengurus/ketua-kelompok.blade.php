@extends('layout.app')

@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
@endsection

@section('nav')
@endsection

@section('menu')
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('berandaPengurusPM')}}">
      <i class="bi bi-house"></i>
      <span>Beranda</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('ketua-lokasi.indexPengurusPM')}}">
      <i class="bi bi-person-circle"></i>
      <span>Data Ketua Lokasi</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{route('ketua-kelompok.indexPengurusPM')}}">
      <i class="bi bi-person-square"></i>
      <span>Data Ketua Kelompok</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('data-kontak.indexPengurusPM')}}">
      <i class="bi bi-people"></i>
      <span>Data Peserta</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{url('/pengurus/data-laporan')}}">
      <i class="bi bi-bar-chart-line"></i>
      <span>Laporan</span>
    </a>
  </li>
@endsection

@section('main')
  <div class="pagetitle">
    <h1>Data Ketua Kelompok</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('berandaPengurusPM')}}">Pengurus</a></li>
        <li class="breadcrumb-item active">Data Ketua Kelompok</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <h5 class="card-title card-title-full">Data Ketua Kelompok</h5>
              </div>
              <div class="col-3 text-end">
                <a href="#tambahData" class="icon-add-data text-success" data-bs-toggle="modal">
                  <i class="bi bi-person-add" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Data"></i>
                </a>
              </div>
              <!-- Modal Tambah Data -->
              <div class="modal fade" id="tambahData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="tambahDataLabel">
                        <i class="bi bi-person-add text-success"></i>
                        Tambah Data Ketua Kelompok
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('ketua-kelompok.storePengurusPM') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group-input">
                          <div class="form-header-group mb-3">
                            <h6>PERSONAL</h6>
                          </div>
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="untukPendataan" class="col-sm-3 px-1">Untuk <span class="required-input">(*)</span></label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="untukPendataans" id="untukPendataan" aria-label=".form-select-sm untukPendataan">
                                    <option value="">-Untuk-</option>
                                    <option value="Pengurus">Pengurus</option>
                                    <option value="Utusan">Utusan</option>
                                    <option value="Beasiswa">Beasiswa</option>
                                    <option value="Ketua Kelompok">Ketua Kelompok</option>
                                  </select>
                                  @error('untukPendataans')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="idData" class="col-sm-3 px-1">ID <span class="required-input">(*)</span></label>
                                <div class="col-sm-9">
                                  <input type="text" name="idDatas" class="form-control form-control-sm" id="idData" placeholder="ID">
                                  @error('idDatas')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="tglRegistrasi" class="col-sm-3 px-1">Tgl Registrasi <span class="required-input">(*)</span></label>
                                <div class="col-sm-9">
                                  <input type="date" name="tglRegistrasiDatas" class="form-control form-control-sm" id="tglRegistrasi">
                                  @error('tglRegistrasiDatas')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                </div>
                              </div>
                              <div id="sembunyiData1" class="divTampil1">
                                <div class="mb-3 row">
                                  <label for="referensiData" class="col-sm-3 px-1">Referensi Dari</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="referensiDatas" class="form-control form-control-sm" id="referensiData" placeholder="Referensi Dari">
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="sapaanData" class="col-sm-3 px-1">Sapaan</label>
                                  <div class="col-sm-9">
                                    <select class="form-select form-select-sm" name="sapaanDatas" id="sapaanData" aria-label=".form-select-sm sapaanData">
                                      <option value="">-Sapaan-</option>
                                      <option value="Bapak">Bapak</option>
                                      <option value="Ibu">Ibu</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="gelarAwalanData" class="col-sm-3 px-1">Gelar Awalan</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="gelarAwalanDatas" class="form-control form-control-sm" id="gelarAwalanData" placeholder="Gelar Awalan">
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="namaData" class="col-sm-3 px-1">Nama Lengkap <span class="required-input">(*)</span></label>
                                <div class="col-sm-9">
                                  <input type="text" name="namaDatas" class="form-control form-control-sm" id="namaData" placeholder="cth: Angelica Gabriel">
                                  @error('namaDatas')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                </div>
                              </div>
                              <div id="sembunyiData2" class="divTampil2">
                                <div class="mb-3 row">
                                  <label for="gelarAkhiranData" class="col-sm-3 px-1">Gelar Akhiran</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="gelarAkhiranDatas" class="form-control form-control-sm" id="gelarAkhiranData" placeholder="Gelar Akhiran">
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="namaPanggilanData" class="col-sm-3 px-1">Nama Panggilan</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="namaPanggilanDatas" class="form-control form-control-sm" id="namaPanggilanData" placeholder="cth: Angel">
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="peranData" class="col-sm-3 px-1">Peran dalam Keluarga</label>
                                  <div class="col-sm-9">
                                    <select class="form-select form-select-sm" name="peranDatas" id="peranData" aria-label=".form-select-sm peranData">
                                      <option value="">-Peran dalam Keluarga-</option>
                                      <option value="Kepala Keluarga">Kepala Keluarga</option>
                                      <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="jenisIdentitasData" class="col-sm-3 px-1">Jenis Identitas</label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="jenisIdentitasDatas" id="jenisIdentitasData" aria-label=".form-select-sm jenisIdentitasData">
                                    <option value="">-Jenis Identitas-</option>
                                    <option value="KTP">KTP</option>
                                    <option value="SIM">SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="noIdentitasData" class="col-sm-3 px-1">No. Identitas</label>
                                <div class="col-sm-9">
                                  <input type="text" name="noIdentitasDatas" class="form-control form-control-sm" id="noIdentitasData" placeholder="cth: 12*********">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="tempatLahirData" class="col-sm-3 px-1">Tempat, Tgl Lahir</label>
                                <div class="col-sm-5">
                                  <input type="text" name="tempatLahirDatas" class="form-control form-control-sm" id="tempatLahirData" placeholder="cth: Bandung">
                                </div>
                                <div class="col-sm-1">
                                  <p>/</p>
                                </div>
                                <div class="col-sm-3">
                                  <input type="date" name="tglLahirDatas" class="form-control form-control-sm" id="tglLahirData">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="jenisKelaminData" class="col-sm-3 px-1">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenisKelaminDatas" id="jenisKelaminPData" value="Pria">
                                    <label class="form-check-label" for="jenisKelaminPData">Pria</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenisKelaminDatas" id="jenisKelaminWData" value="Wanita">
                                    <label class="form-check-label" for="jenisKelaminWData">Wanita</label>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="golonganDarahData" class="col-sm-3 px-1">Golongan Darah</label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="golonganDarahDatas" id="golonganDarahData" aria-label=".form-select-sm golonganDarahData">
                                    <option value="">-Golongan Darah-</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                  </select>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="statusPernikahanData" class="col-sm-3 px-1">Status Pernikahan</label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="statusPernikahanDatas" id="statusPernikahanData" aria-label=".form-select-sm statusPernikahanData">
                                    <option value="">-Status Pernikahan-</option>
                                    <option value="Cerai">Cerai</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                  </select>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="suku" class="col-sm-3 px-1">Suku</label>
                                <div class="col-sm-9">
                                  <input type="text" name="sukus" class="form-control form-control-sm" id="suku" placeholder="Sunda">
                                </div>
                              </div>
                              <div id="sembunyiData3" class="divTampil3">
                                <div class="mb-3 row">
                                  <label for="fotoData" class="col-sm-3 px-1">Foto</label>
                                  <div class="col-sm-9">
                                    <input type="file" name="fotoDatas" class="form-control form-control-sm" id="fotoData">
                                    @error('fotoDatas')
                                      <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                        <p class="p-1 pb-0" style="font-size: 10pt;">
                                          <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                          {{ $message }}
                                        </p>
                                      </div>
                                    @enderror
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="fotoBitmapData" class="col-sm-3 px-1">Foto Bitmap</label>
                                  <div class="col-sm-9">
                                    <input type="file" name="fotoBitmapDatas" class="form-control form-control-sm" id="fotoBitmapData">
                                    @error('fotoBitmapDatas')
                                      <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                        <p class="p-1 pb-0" style="font-size: 10pt;">
                                          <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                          {{ $message }}
                                        </p>
                                      </div>
                                    @enderror
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group-input">
                          <div class="form-header-group mb-3">
                            <h6>TEMPAT TINGGAL</h6>
                          </div>
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="alamatData" class="col-sm-3 px-1">Alamat</label>
                                <div class="col-sm-9">
                                  <input type="text" name="alamatDatas" class="form-control form-control-sm" id="alamatData" placeholder="Alamat">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="keteranganArahData" class="col-sm-3 px-1">Keterangan Arah</label>
                                <div class="col-sm-9">
                                  <textarea class="form-control form-control-sm" name="keteranganArahDatas" id="keteranganArahData" rows="3" placeholder="Keterangan Arah"></textarea>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="petaData" class="col-sm-3 px-1">Peta</label>
                                <div class="col-sm-9">
                                  <input type="text" name="petaDatas" class="form-control form-control-sm" id="petaData" placeholder="Peta">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="negaraData" class="col-sm-3 px-1">Negara</label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="negaraDatas" id="negaraData" aria-label=".form-select-sm negaraData">
                                    <option value="">-Negara-</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="USA">USA</option>
                                    <option value="England">England</option>
                                  </select>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="provinsiData" class="col-sm-3 px-1">Provinsi</label>
                                <div class="col-sm-9">
                                  <input type="text" name="provinsiDatas" class="form-control form-control-sm" id="provinsiData" placeholder="Provinsi">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="kotaData" class="col-sm-3 px-1">Kota</label>
                                <div class="col-sm-9">
                                  <input type="text" name="kotaDatas" class="form-control form-control-sm" id="kotaData" placeholder="Kota">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="kecamatanData" class="col-sm-3 px-1">Kecamatan</label>
                                <div class="col-sm-9">
                                  <input type="text" name="kecamatanDatas" class="form-control form-control-sm" id="kecamatanData" placeholder="Kecamatan">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="kelurahanData" class="col-sm-3 px-1">Kelurahan</label>
                                <div class="col-sm-9">
                                  <input type="text" name="kelurahanDatas" class="form-control form-control-sm" id="kelurahanData" placeholder="Kelurahan">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="kodePosData" class="col-sm-3 px-1">Kode Pos</label>
                                <div class="col-sm-9">
                                  <input type="text" name="kodePosDatas" class="form-control form-control-sm" id="kodePosData" placeholder="Kode Pos">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="dusunData" class="col-sm-3 px-1">Dusun (Desa)</label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="dusunDatas" aria-label=".form-select-sm dusunData">
                                    <option value="">-Dusun (desa)-</option>
                                  </select>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="rtRwData" class="col-sm-3 px-1">RT / RW</label>
                                <div class="col-sm-4">
                                  <input type="text" name="rtDatas" class="form-control form-control-sm" id="rtRwData" placeholder="RT">
                                </div>
                                <div class="col-sm-1">
                                  <p>/</p>
                                </div>
                                <div class="col-sm-4">
                                  <input type="text" name="rwDatas" class="form-control form-control-sm" id="rtRwData" placeholder="RW">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="areaData" class="col-sm-3 px-1">Area</label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="areaDatas" id="areaData" aria-label=".form-select-sm areaData">
                                    <option value="">-Area-</option>
                                    <option value="021">021</option>
                                    <option value="022">022</option>
                                  </select>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="lokasiData" class="col-sm-3 px-1">Lokasi <span class="required-input">(*)</span></label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="lokasiDatas" id="lokasiData" aria-label=".form-select-sm lokasiData">
                                    <option value="">-Lokasi-</option>
                                    @foreach ($lokasis as $lokasi)
                                      <option value="{{$lokasi->nama_lokasi}}">{{$lokasi->nama_lokasi}}</option>
                                    @endforeach
                                  </select>
                                  @error('lokasiDatas')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group-input">
                          <div class="form-header-group mb-3">
                            <h6>KONTAK</h6>
                          </div>
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="noTelpSData" class="col-sm-3 px-1">No Telp 1</label>
                                <div class="col-sm-9">
                                  <input type="text" name="noTelpSDatas" class="form-control form-control-sm" id="noTelpSData" placeholder="cth: +62">
                                </div>
                              </div>
                              <div id="sembunyiData4" class="divTampil4">
                                <div class="mb-3 row">
                                  <label for="telpRumahData" class="col-sm-3 px-1">Telp. Rumah 2</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="telpRumahDatas" class="form-control form-control-sm" id="telpRumahData" placeholder="cth: +622174130258">
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="noHpSData" class="col-sm-3 px-1">No HP 1</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="noHpSDatas" class="form-control form-control-sm" id="noHpSData" placeholder="cth: +62">
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="terimaSMSData" class="col-sm-3 px-1">Bisa Terima SMS?</label>
                                  <div class="col-sm-9 pt-1">
                                    <div class="form-check form-switch">
                                      <input class="form-check-input" name="terimaSMSDatas" type="checkbox" id="terimaSMSData" value="Ya">
                                      <label class="form-check-label" for="terimaSMSData">Ya</label>
                                    </div>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="noHpDData" class="col-sm-3 px-1">No HP 2</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="noHpDDatas" class="form-control form-control-sm" id="noHpDData" placeholder="cth: +62856789456">
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="noLainData" class="col-sm-3 px-1">No Lainnya</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="noLainDatas" class="form-control form-control-sm" id="noLainData" placeholder="mis: Pin BB">
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="faxData" class="col-sm-3 px-1">Fax. Rumah</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="faxDatas" class="form-control form-control-sm" id="faxData" placeholder="FAX">
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="emailData" class="col-sm-3 px-1">Email</label>
                                <div class="col-sm-9">
                                  <input type="email" name="emailDatas" class="form-control form-control-sm" id="emailData" placeholder="cth: email@gmail.com">
                                  @error('emailDatas')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                </div>
                              </div>
                              <div id="sembunyiData5" class="divTampil5">
                                <div class="mb-3 row">
                                  <label for="terimaEmailData" class="col-sm-3 px-1">Bisa Terima Email?</label>
                                  <div class="col-sm-9 pt-1">
                                    <div class="form-check form-switch">
                                      <input class="form-check-input" name="terimaEmailDatas" type="checkbox" id="terimaEmailData" value="Ya">
                                      <label class="form-check-label" for="terimaEmailData">Ya</label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div id="sembunyiData6" class="divTampil6">
                                <div class="mb-3 row">
                                  <label for="websiteData" class="col-sm-3 px-1">Website</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="websiteDatas" class="form-control form-control-sm" id="websiteData" placeholder="cth: Facebook, Twitter, etc">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group-input">
                          <div class="form-header-group mb-3">
                            <h6>PEKERJAAN</h6>
                          </div>
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="pekerjaanData" class="col-sm-3 px-1">Pekerjaan</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select form-select-sm" name="pekerjaanDatas" id="pekerjaanData" aria-label=".form-select-sm pekerjaanData">
                                      <option value="">-Pekerjaan-</option>
                                      @foreach ($pekerjaans as $pekerjaan)
                                        <option value="{{$pekerjaan->nama_pekerjaanPJ}}">{{$pekerjaan->nama_pekerjaanPJ}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="col-1">
                                    <a href="#tambahPekerjaan" data-bs-toggle="modal" class="fs-5">
                                      <i class="bi bi-plus-lg text-success text-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Pekerjaan"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="jabatanData" class="col-sm-3 px-1">Jabatan Dalam Pekerjaan</label>
                                <div class="col-sm-9">
                                  <input type="text" name="jabatanDatas" class="form-control form-control-sm" id="jabatanData" placeholder="cth: Manager, Staff, etc">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="statusPekerjaanData" class="col-sm-3 px-1">Status Pekerjaan</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select form-select-sm" name="statusPekerjaanDatas" id="statusPekerjaanData" aria-label=".form-select-sm statusPekerjaanData">
                                      <option value="">-Status Pekerjaan-</option>
                                      @foreach ($statusPekerjaans as $statusPekerjaan)
                                        <option value="{{$statusPekerjaan->status_pekerjaanSPJ}}">{{$statusPekerjaan->status_pekerjaanSPJ}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="col-1">
                                    <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Status Pekerjaan" class="fs-5">
                                      <i class="bi bi-plus-lg text-success text-center"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="namaPerusahaanData" class="col-sm-3 px-1">Nama Perusahaan</label>
                                <div class="col-sm-9">
                                  <input type="text" name="namaPerusahaanDatas" class="form-control form-control-sm" id="namaPerusahaanData" placeholder="Nama Perusahaan">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="sektorIndustriData" class="col-sm-3 px-1">Sektor Industri</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select form-select-sm" name="sektorIndustriDatas" id="sektorIndustriData" aria-label=".form-select-sm sektorIndustriData">
                                      <option value="">-Sektor Industri-</option>
                                      @foreach ($sektorIndustris as $sektorIndustri)
                                        <option value="{{$sektorIndustri->sektor_industriSI}}">{{$sektorIndustri->sektor_industriSI}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="col-1">
                                    <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Sektor Industri" class="fs-5">
                                      <i class="bi bi-plus-lg text-success text-center"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="alamatKantorData" class="col-sm-3 px-1">Alamat Kantor</label>
                                <div class="col-sm-9">
                                  <input type="text" name="alamatKantorDatas" class="form-control form-control-sm" id="alamatKantorData" placeholder="Alamat Kantor">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="telpKantorData" class="col-sm-3 px-1">Telp. Kantor</label>
                                <div class="col-sm-9">
                                  <input type="text" name="telpKantorDatas" class="form-control form-control-sm" id="telpKantorData" placeholder="cth: +62">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="extData" class="col-sm-3 px-1">Ext.</label>
                                <div class="col-sm-9">
                                  <input type="text" name="extDatas" class="form-control form-control-sm" id="extData" placeholder="EXT">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group-input">
                          <div class="form-header-group mb-3">
                            <h6>STUDI & MINAT</h6>
                          </div>
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="tingkatPendidikanData" class="col-sm-3 px-1">Tingkat Pendidikan</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select form-select-sm" name="tingkatPendidikanDatas" id="tingkatPendidikanData" aria-label="form-select-sm tingkatPendidikanData">
                                      <option value="">-Tingkat Pendidikan-</option>
                                      @foreach ($tingkatPendidikans as $tingkatPendidikan)
                                        <option value="{{$tingkatPendidikan->tingkat_pendidikan}}">{{$tingkatPendidikan->tingkat_pendidikan}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="col-1">
                                    <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Tingkat Pendidikan" class="fs-5">
                                      <i class="bi bi-plus-lg text-success text-center"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="sekolahData" class="col-sm-3 px-1">Sekolah/Univ (Saat ini Ditempuh)</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select form-select-sm" name="sekolahDatas" id="sekolahData" aria-label="form-select-sm sekolahData">
                                      <option value="">-Sekolah / Universitas</option>
                                      @foreach ($sekolahUnivs as $sekolahUniv)
                                        <option value="{{$sekolahUniv->sekolah_univ}}">{{$sekolahUniv->sekolah_univ}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="col-1">
                                    <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Sekolah/Univ" class="fs-5">
                                      <i class="bi bi-plus-lg text-success text-center"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="bKetertarikanData" class="col-sm-3 px-1">Bidang Ketertarikan</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-control" name="bKetertarikanDatas[]" style="width: 100%;" id="bKetertarikanData" aria-label="multiple select bKetertarikanData" multiple>
                                      <option>-Bidang Ketertarikan-</option>
                                      @foreach ($bidKetertarikans as $bidKetertarikan)
                                        <option value="{{$bidKetertarikan->bidang_ketertarikan}}">{{$bidKetertarikan->bidang_ketertarikan}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="col-1">
                                    <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Bidang Ketertarikan" class="fs-5">
                                      <i class="bi bi-plus-lg text-success text-center"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="bKeterampilanData" class="col-sm-3 px-1">Bidang Keterampilan</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-control" name="bKeterampilanDatas[]" id="bKeterampilanData" style="width: 100%;" aria-label="multiple select bKeterampilanData" multiple>
                                      <option>Bidang Keterampilan</option>
                                      @foreach ($bidKeterampilans as $bidKeterampilan)
                                        <option value="{{$bidKeterampilan->bidang_keterampilan}}">{{$bidKeterampilan->bidang_keterampilan}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="col-1">
                                    <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Bidang Keterampilan" class="fs-5">
                                      <i class="bi bi-plus-lg text-success text-center"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group-input">
                          <div class="form-header-group mb-3">
                            <h6>CATATAN</h6>
                          </div>
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="catatanData" class="col-sm-3 px-1">Catatan</label>
                                <div class="col-sm-9">
                                  <textarea class="form-control form-control-sm" name="catatanDatas" id="catatanData" rows="3" placeholder="Catatan"></textarea>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="statusData" class="col-sm-3 px-1">Status</label>
                                <div class="col-sm-9">
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="statusDatas" id="statusAData" value="Aktif">
                                    <label class="form-check-label" for="statusAData">Aktif</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="statusDatas" id="statusTaData" value="Tidak Aktif">
                                    <label class="form-check-label" for="statusTaData">Tidak Aktif</label>
                                  </div>
                                </div>
                              </div>
                              <div id="sembunyiData7" class="divTampil7">
                                <div class="mb-3 row">
                                  <label for="verifEmailData" class="col-sm-3 px-1">Email Sudah Verifikasi?</label>
                                  <div class="col-sm-9 pt-1">
                                    <div class="form-check form-switch">
                                      <input class="form-check-input" name="verifEmailDatas" type="checkbox" id="verifEmailData" value="Ya">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group-input">
                          <div class="form-header-group mb-3">
                            <h6>KOLOM CADANGAN (ISIAN TEKS)</h6>
                          </div>
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="noRekData" class="col-sm-3 px-1">Nomor Rekening</label>
                                <div class="col-sm-9">
                                  <input type="text" name="noRekDatas" class="form-control form-control-sm" id="noRekData" placeholder="123456789">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="perBeasiswaData" class="col-sm-3 px-1">Periode Beasiswa</label>
                                <div class="col-sm-9">
                                  <input type="text" name="perBeasiswaDatas" class="form-control form-control-sm" id="perBeasiswaData" placeholder="Periode Beasiswa">
                                </div>
                              </div>
                              <div id="sembunyiData12" class="divTampil12">
                                <div class="mb-3 row nominalTampil" id="nominalHide">
                                  <label for="nominal" class="col-sm-3 px-1">Nominal</label>
                                  <div class="col-9">
                                    <div id="inputNominal">
                                      <div class="position-relative">
                                        <div class="position-absolute top-50 start-100 ms-1 translate-middle-y">
                                          <button type="button" class="btn btn-transparent p-0" id="tambahNominal" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah Input Nominal">
                                            <i class="bi bi-plus-circle fs-5 text-success d-inline"></i>
                                          </button>
                                        </div>
                                        <div class="row">
                                          <div class="col-6">
                                            <input type="text" name="tambahNominals[0][ket_nominal]" class="form-control form-control-sm" id="ketNominal" placeholder="Keterangan Nominal">
                                          </div>
                                          <div class="col-6">
                                            <input type="text" name="tambahNominals[0][nominal]" class="form-control form-control-sm" id="nominal" placeholder="Nominal">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="perKerjaPData" class="col-sm-3 px-1">Periode Kerja Praktik</label>
                                <div class="col-sm-9">
                                  <input type="text" name="perKerjaPDatas" class="form-control form-control-sm" id="perKerjaPData" placeholder="Periode Kerja Praktik">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="riwayatPelSData" class="col-sm-3 px-1">Riwayat Pelayanan 1</label>
                                <div class="col-sm-9">
                                  <input type="text" name="riwayatPelSDatas" class="form-control form-control-sm" id="riwayatPelSData" placeholder="Riwayat Pelayanan 1">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="riwayatPelDData" class="col-sm-3 px-1">Riwayat Pelayanan 2</label>
                                <div class="col-sm-9">
                                  <input type="text" name="riwayatPelDDatas" class="form-control form-control-sm" id="riwayatPelDData" placeholder="Riwayat Pelayanan 2">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="riwayatPelTData" class="col-sm-3 px-1">Riwayat Pelayanan 3</label>
                                <div class="col-sm-9">
                                  <input type="text" name="riwayatPelTDatas" class="form-control form-control-sm" id="riwayatPelTData" placeholder="Riwayat Pelayanan 3">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="riwayatPelEData" class="col-sm-3 px-1">Riwayat Pelayanan 4</label>
                                <div class="col-sm-9">
                                  <input type="text" name="riwayatPelEDatas" class="form-control form-control-sm" id="riwayatPelEData" placeholder="Riwayat Pelayanan 4">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div id="sembunyiData8" class="divTampil8">
                          <div class="form-group-input">
                            <div class="form-header-group mb-3">
                              <h6>KOLOM CADANGAN (PILIHAN)</h6>
                            </div>
                            <div class="input-center ps-5">
                              <div class="w-75">
                                <div class="mb-3 row">
                                  <label for="pilihanSData" class="col-sm-3 px-1"></label>
                                  <div class="col-sm-9 row">
                                    <div class="col-11">
                                      <select class="form-select form-select-sm" name="pilihanSDatas" id="pilihanSData" aria-label=".form-select-sm pilihanSData">
                                        <option value="">-Kolom Cadangan (Pilihan) 1</option>
                                        @foreach ($kc_pilsatus as $kc_pilsatu)
                                          <option value="{{$kc_pilsatu->kc_pilsatu}}">{{$kc_pilsatu->kc_pilsatu}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                    <div class="col-1">
                                      <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Pilihan Satu" class="fs-5">
                                        <i class="bi bi-plus-lg text-success text-center"></i>
                                      </a>
                                    </div>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="pilihanDData" class="col-sm-3 px-1"></label>
                                  <div class="col-sm-9 row">
                                    <div class="col-11">
                                      <select class="form-select form-select-sm" name="pilihanDDatas" id="pilihanDData" aria-label=".form-select-sm pilihanDData">
                                        <option value="">-Kolom Cadangan (Pilihan) 2</option>
                                        @foreach ($kc_pilduas as $kc_pildua)
                                          <option value="{{$kc_pildua->kc_pildua}}">{{$kc_pildua->kc_pildua}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                    <div class="col-1">
                                      <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Pilihan Dua" class="fs-5">
                                        <i class="bi bi-plus-lg text-success text-center"></i>
                                      </a>
                                    </div>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="pilihanTData" class="col-sm-3 px-1"></label>
                                  <div class="col-sm-9 row">
                                    <div class="col-11">
                                      <select class="form-select form-select-sm" name="pilihanTDatas" id="pilihanTData" aria-label=".form-select-sm pilihanTData">
                                        <option value="">-Kolom Cadangan (Pilihan) 3</option>
                                        @foreach ($kc_piltigas as $kc_piltiga)
                                          <option value="{{$kc_piltiga->kc_piltiga}}">{{$kc_piltiga->kc_piltiga}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                    <div class="col-1">
                                      <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Pilihan Tiga" class="fs-5">
                                        <i class="bi bi-plus-lg text-success text-center"></i>
                                      </a>
                                    </div>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="pilihanEData" class="col-sm-3 px-1"></label>
                                  <div class="col-sm-9 row">
                                    <div class="col-11">
                                      <select class="form-select form-select-sm" name="pilihanEDatas" id="pilihanEData" aria-label=".form-select-sm pilihanEData">
                                        <option value="">-Kolom Cadangan (Pilihan) 4</option>
                                        @foreach ($kc_pilempats as $kc_pilempat)
                                          <option value="{{$kc_pilempat->kc_pilempat}}">{{$kc_pilempat->kc_pilempat}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                    <div class="col-1">
                                      <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Pilihan Empat" class="fs-5">
                                        <i class="bi bi-plus-lg text-success text-center"></i>
                                      </a>
                                    </div>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="pilihanLData" class="col-sm-3 px-1"></label>
                                  <div class="col-sm-9 row">
                                    <div class="col-11">
                                      <select class="form-select form-select-sm" name="pilihanLDatas" id="pilihanLData" aria-label=".form-select-sm pilihanLData">
                                        <option value="">-Kolom Cadangan (Pilihan) 5</option>
                                        @foreach ($kc_pillimas as $kc_pillima)
                                          <option value="{{$kc_pillima->kc_pillima}}">{{$kc_pillima->kc_pillima}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                    <div class="col-1">
                                      <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Pilihan Lima" class="fs-5">
                                        <i class="bi bi-plus-lg text-success text-center"></i>
                                      </a>
                                    </div>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="pilihanEnData" class="col-sm-3 px-1"></label>
                                  <div class="col-sm-9 row">
                                    <div class="col-11">
                                      <select class="form-select form-select-sm" name="pilihanEnDatas" id="pilihanEnData" aria-label=".form-select-sm pilihanEnData">
                                        <option value="">-Kolom Cadangan (Pilihan) 6</option>
                                        @foreach ($kc_pilenams as $kc_pilenam)
                                          <option value="{{$kc_pilenam->kc_pilenam}}">{{$kc_pilenam->kc_pilenam}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                    <div class="col-1">
                                      <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Pilihan Enam" class="fs-5">
                                        <i class="bi bi-plus-lg text-success text-center"></i>
                                      </a>
                                    </div>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="pilihanTuData" class="col-sm-3 px-1"></label>
                                  <div class="col-sm-9 row">
                                    <div class="col-11">
                                      <select class="form-select form-select-sm" name="pilihanTuDatas" id="pilihanTuData" aria-label=".form-select-sm pilihanTuData">
                                        <option value="">-Kolom Cadangan (Pilihan) 7</option>
                                        @foreach ($kc_piltujuhs as $kc_piltujuh)
                                          <option value="{{$kc_piltujuh->kc_piltujuh}}">{{$kc_piltujuh->kc_piltujuh}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                    <div class="col-1">
                                      <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Pilihan Tujuh" class="fs-5">
                                        <i class="bi bi-plus-lg text-success text-center"></i>
                                      </a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group-input">
                          <div class="form-header-group mb-3">
                            <h6>KOLOM CADANGAN (PILIHAN GANDA)</h6>
                          </div>
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="pilihanGSData" class="col-sm-3 px-1">Personality - MBTI</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select" name="pilihanGSDatas[]" style="width: 100%;" id="pilihanGSData" aria-label="multiple select pilihanGSData" multiple>
                                      <option value="">-Personality - MBTI-</option>
                                      @foreach ($persMbtis as $persMbti)
                                        <option value="{{$persMbti->mbti}}">{{$persMbti->mbti}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="col-1">
                                    <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Personality - MBTI" class="fs-5">
                                      <i class="bi bi-plus-lg text-success text-center"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="pilihanGDData" class="col-sm-3 px-1">Personality - Holland</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select" name="pilihanGDDatas[]" style="width: 100%;" id="pilihanGDData" aria-label="multiple select pilihanGDData" multiple>
                                      <option value="">-Personality - Holland</option>
                                      @foreach ($persHollands as $persHolland)
                                        <option value="{{$persHolland->holland}}">{{$persHolland->holland}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="col-1">
                                    <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Personality - Holland" class="fs-5">
                                      <i class="bi bi-plus-lg text-success text-center"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="pilihanGTData" class="col-sm-3 px-1">Spiritual Gifts</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select" name="pilihanGTDatas[]" style="width: 100%;" id="pilihanGTData" aria-label="multiple select pilihanGTData" multiple>
                                      <option value="">-Spiritual Gifts-</option>
                                      @foreach ($spiritGifts as $spiritGift)
                                        <option value="{{$spiritGift->gifts}}">{{$spiritGift->gifts}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="col-1">
                                    <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Spiritual Gifts" class="fs-5">
                                      <i class="bi bi-plus-lg text-success text-center"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="pilihanGEData" class="col-sm-3 px-1">Abilities</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select" name="pilihanGEDatas[]" style="width: 100%;" id="pilihanGEData" aria-label="multiple select pilihanGEData" multiple>
                                      <option value="">-Abilities-</option>
                                      @foreach ($abilities as $ability)
                                        <option value="{{$ability->abilities}}">{{$ability->abilities}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="col-1">
                                    <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Abilities" class="fs-5">
                                      <i class="bi bi-plus-lg text-success text-center"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="ExperienceData" class="col-sm-3 px-1">Experience</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select" name="pilihanGLDatas[]" style="width: 100%;" id="ExperienceData" aria-label="multiple select ExperienceData" multiple>
                                      <option value="">-Experience-</option>
                                    </select>
                                  </div>
                                  <div class="col-1">
                                    <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Ganda 5" class="fs-5">
                                      <i class="bi bi-plus-lg text-success text-center"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="pilihanGEnData" class="col-sm-3 px-1">Kemampuan Bahasa</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select" name="pilihanGEnDatas[]" style="width: 100%;" id="pilihanGEnData" aria-label="multiple select pilihanGEnData" multiple>
                                      <option value="">-Kemampuan Bahasa-</option>
                                      @foreach ($kemBahasas as $kemBahasa)
                                        <option value="{{$kemBahasa->kem_bahasa}}">{{$kemBahasa->kem_bahasa}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="col-1">
                                    <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Kemampuan Bahasa" class="fs-5">
                                      <i class="bi bi-plus-lg text-success text-center"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div id="sembunyiData9" class="divTampil9">
                          <div class="form-group-input">
                            <div class="form-header-group mb-3">
                              <h6>KOLOM CADANGAN (CHECK BOX)</h6>
                            </div>
                            <div class="input-center ps-5">
                              <div class="w-75">
                                <div class="mb-3 row">
                                  <label for="checkSData" class="col-sm-3 px-1"></label>
                                  <div class="col-sm-9 pt-1">
                                    <div class="form-check form-switch">
                                      <input class="form-check-input" name="checkSDatas" type="checkbox" id="checkSData" value="Ya">
                                      <label class="form-check-label" for="checkSData">Ya</label>
                                    </div>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="checkDData" class="col-sm-3 px-1"></label>
                                  <div class="col-sm-9 pt-1">
                                    <div class="form-check form-switch">
                                      <input class="form-check-input" name="checkDDatas" type="checkbox" id="checkDData" value="Ya">
                                      <label class="form-check-label" for="checkDData">Ya</label>
                                    </div>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="checkTData" class="col-sm-3 px-1"></label>
                                  <div class="col-sm-9 pt-1">
                                    <div class="form-check form-switch">
                                      <input class="form-check-input" name="checkTDatas" type="checkbox" id="checkTData" value="Ya">
                                      <label class="form-check-label" for="checkTData">Ya</label>
                                    </div>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="checkEData" class="col-sm-3 px-1"></label>
                                  <div class="col-sm-9 pt-1">
                                    <div class="form-check form-switch">
                                      <input class="form-check-input" name="checkEDatas" type="checkbox" id="checkEData" value="Ya">
                                      <label class="form-check-label" for="checkEData">Ya</label>
                                    </div>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="checkLData" class="col-sm-3 px-1"></label>
                                  <div class="col-sm-9 pt-1">
                                    <div class="form-check form-switch">
                                      <input class="form-check-input" name="checkLDatas" type="checkbox" id="checkLData" value="Ya">
                                      <label class="form-check-label" for="checkLData">Ya</label>
                                    </div>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="checkEnData" class="col-sm-3 px-1"></label>
                                  <div class="col-sm-9 pt-1">
                                    <div class="form-check form-switch">
                                      <input class="form-check-input" name="checkEnDatas" type="checkbox" id="checkEnData" value="Ya">
                                      <label class="form-check-label" for="checkEnData">Ya</label>
                                    </div>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="checkTuData" class="col-sm-3 px-1"></label>
                                  <div class="col-sm-9 pt-1">
                                    <div class="form-check form-switch">
                                      <input class="form-check-input" name="checkTuDatas" type="checkbox" id="checkTuData" value="Ya">
                                      <label class="form-check-label" for="checkTuData">Ya</label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group-input">
                          <div class="form-header-group mb-3">
                            <h6>DOKUMEN PENTING</h6>
                          </div>
                          <div id="sembunyiData10" class="divTampil10">
                            <div class="input-center ps-5">
                              <div class="w-75">
                                <div class="mb-3 row">
                                  <label for="" class="col-sm-3 px-1">Baptis Anak</label>
                                  <div class="col-sm-9">
                                    <label for="" class="">Sudah?</label>
                                    <div class="form-check">
                                      <input class="form-check-input" name="sudahBaptisAnakDatas" type="checkbox" value="Sudah" id="sudahBaptisAnakData">
                                      <label class="form-check-label" for="sudahBaptisAnakData">
                                        Sudah
                                      </label>
                                    </div>
                                    <hr>
                                    <label for="tglBaptisAnakData" class="">Tanggal</label>
                                    <input type="date" name="tglBaptisAnakDatas" class="form-control form-control-sm" id="tglBaptisAnakData">
                                    <hr>
                                    <label for="" class="">Tempat</label><br>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="tempatBaptisAnakDatas" id="tempatBaptisAnakData" value="Gereja Lokal">
                                      <label class="form-check-label" for="tempatBaptisAnakData">Gereja Lokal</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="tempatBaptisAnakDatas" id="tempatBaptisAnakLData" value="Gereja Lain">
                                      <label class="form-check-label" for="tempatBaptisAnakLData">Gereja Lain</label>
                                    </div>
                                    <hr>
                                    <label for="fileUploadBaptisAnakData" class="">File</label>
                                    <input type="file" name="fileUploadBaptisAnakDatas" class="form-control form-control-sm" id="fileUploadBaptisAnakData">
                                    @error('fileUploadBaptisAnakDatas')
                                      <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                        <p class="p-1 pb-0" style="font-size: 10pt;">
                                          <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                          {{ $message }}
                                        </p>
                                      </div>
                                    @enderror
                                    <hr>
                                    <label for="ketBaptisAnakData" class="">Keterangan</label>
                                    <textarea class="form-control form-control-sm" name="ketBaptisAnakDatas" id="ketBaptisAnakData" rows="3" placeholder="Keterangan"></textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <hr>
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="" class="col-sm-3 px-1">Menikah</label>
                                <div class="col-sm-9">
                                  <label for="" class="">Sudah?</label>
                                  <div class="form-check">
                                    <input class="form-check-input" name="sudahMenikahDatas" type="checkbox" value="Sudah" id="sudahMenikahData">
                                    <label class="form-check-label" for="sudahMenikahData">
                                      Sudah
                                    </label>
                                  </div>
                                  <hr>
                                  <label for="tglMenikahData" class="">Tanggal</label>
                                  <input type="date" name="tglMenikahDatas" class="form-control form-control-sm" id="tglMenikahData">
                                  <hr>
                                  <label for="" class="">Tempat</label><br>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatMenikahDatas" id="tempatMenikahData" value="Gereja Lokal">
                                    <label class="form-check-label" for="tempatMenikahData">Gereja Lokal</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatMenikahDatas" id="tempatMenikahLData" value="Gereja Lain">
                                    <label class="form-check-label" for="tempatMenikahLData">Gereja Lain</label>
                                  </div>
                                  <hr>
                                  <label for="fileUploadMenikahData" class="">File</label>
                                  <input type="file" name="fileUploadMenikahDatas" class="form-control form-control-sm" id="fileUploadMenikahData">
                                  @error('fileUploadMenikahDatas')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                  <hr>
                                  <label for="ketMenikahData" class="">Keterangan</label>
                                  <textarea class="form-control form-control-sm" name="ketMenikahDatas" id="ketMenikahData" rows="3" placeholder="Keterangan"></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <hr>
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="" class="col-sm-3 px-1">Baptis</label>
                                <div class="col-sm-9">
                                  <label for="" class="">Sudah?</label>
                                  <div class="form-check">
                                    <input class="form-check-input" name="sudahBaptisDatas" type="checkbox" value="Sudah" id="sudahBaptisData">
                                    <label class="form-check-label" for="sudahBaptisData">
                                      Sudah
                                    </label>
                                  </div>
                                  <hr>
                                  <label for="tglBaptisData" class="">Tanggal</label>
                                  <input type="date" name="tglBaptisDatas" class="form-control form-control-sm" id="tglBaptisData">
                                  <hr>
                                  <label for="" class="">Tempat</label><br>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatBaptisDatas" id="tempatBaptisData" value="Gereja Lokal">
                                    <label class="form-check-label" for="tempatBaptisData">Gereja Lokal</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatBaptisDatas" id="tempatBaptisLData" value="Gereja Lain">
                                    <label class="form-check-label" for="tempatBaptisLData">Gereja Lain</label>
                                  </div>
                                  <hr>
                                  <label for="fileUploadBaptisData" class="">File</label>
                                  <input type="file" name="fileUploadBaptisDatas" class="form-control form-control-sm" id="fileUploadBaptisData">
                                  @error('fileUploadBaptisDatas')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                  <hr>
                                  <label for="ketBaptisData" class="">Keterangan</label>
                                  <textarea class="form-control form-control-sm" name="ketBaptisDatas" id="ketBaptisData" rows="3" placeholder="Keterangan"></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <hr>
                          <div id="sembunyiData11" class="divTampil11">
                            <div class="input-center ps-5">
                              <div class="w-75">
                                <div class="mb-3 row">
                                  <label for="" class="col-sm-3 px-1">Meninggal Dunia</label>
                                  <div class="col-sm-9">
                                    <label for="" class="">Sudah?</label>
                                    <div class="form-check">
                                      <input class="form-check-input" name="sudahMeninggalDuniaDatas" type="checkbox" value="Sudah" id="sudahMeninggalDuniaData">
                                      <label class="form-check-label" for="sudahMeninggalDuniaData">
                                        Sudah
                                      </label>
                                    </div>
                                    <hr>
                                    <label for="tglMeninggalDuniaData" class="">Tanggal</label>
                                    <input type="date" name="tglMeninggalDuniaDatas" class="form-control form-control-sm" id="tglMeninggalDuniaData">
                                    <hr>
                                    <label for="" class="">Tempat</label><br>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="tempatMeninggalDuniaDatas" id="tempatMeninggalDuniaData" value="Gereja Lokal">
                                      <label class="form-check-label" for="tempatMeninggalDuniaData">Gereja Lokal</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="tempatMeninggalDuniaDatas" id="tempatMeninggalDuniaLData" value="Gereja Lain">
                                      <label class="form-check-label" for="tempatMeninggalDuniaLData">Gereja Lain</label>
                                    </div>
                                    <hr>
                                    <label for="fileUploadMeninggalDuniaData" class="">File</label>
                                    <input type="file" name="fileUploadMeninggalDuniaDatas" class="form-control form-control-sm" id="fileUploadMeninggalDuniaData">
                                    @error('fileUploadMeninggalDuniaDatas')
                                      <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                        <p class="p-1 pb-0" style="font-size: 10pt;">
                                          <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                          {{ $message }}
                                        </p>
                                      </div>
                                    @enderror
                                    <hr>
                                    <label for="ketMeninggalDuniaData" class="">Keterangan</label>
                                    <textarea class="form-control form-control-sm" name="ketMeninggalDuniaDatas" id="ketMeninggalDuniaData" rows="3" placeholder="Keterangan"></textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="input-center ps-5">
                              <div class="w-75">
                                <div class="mb-3 row">
                                  <label for="" class="col-sm-3 px-1">Penyerahan Anak</label>
                                  <div class="col-sm-9">
                                    <label for="" class="">Sudah?</label>
                                    <div class="form-check">
                                      <input class="form-check-input" name="sudahPenyerahanAnakDatas" type="checkbox" value="Sudah" id="sudahPenyerahanAnakData">
                                      <label class="form-check-label" for="sudahPenyerahanAnakData">
                                        Sudah
                                      </label>
                                    </div>
                                    <hr>
                                    <label for="tglPenyerahanAnakData" class="">Tanggal</label>
                                    <input type="date" name="tglPenyerahanAnakDatas" class="form-control form-control-sm" id="tglPenyerahanAnakData">
                                    <hr>
                                    <label for="" class="">Tempat</label><br>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="tempatPenyerahanAnakDatas" id="tempatPenyerahanAnakData" value="Gereja Lokal">
                                      <label class="form-check-label" for="tempatPenyerahanAnakData">Gereja Lokal</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="tempatPenyerahanAnakDatas" id="tempatPenyerahanAnakLData" value="Gereja Lain">
                                      <label class="form-check-label" for="tempatPenyerahanAnakLData">Gereja Lain</label>
                                    </div>
                                    <hr>
                                    <label for="fileUploadPenyerahanAnakData" class="">File</label>
                                    <input type="file" name="fileUploadPenyerahanAnakDatas" class="form-control form-control-sm" id="fileUploadPenyerahanAnakData">
                                    @error('fileUploadPenyerahanAnakDatas')
                                      <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                        <p class="p-1 pb-0" style="font-size: 10pt;">
                                          <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                          {{ $message }}
                                        </p>
                                      </div>
                                    @enderror
                                    <hr>
                                    <label for="ketPenyerahanAnakData" class="">Keterangan</label>
                                    <textarea class="form-control form-control-sm" name="ketPenyerahanAnakDatas" id="ketPenyerahanAnakData" rows="3" placeholder="Keterangan"></textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="input-center ps-5">
                              <div class="w-75">
                                <div class="mb-3 row">
                                  <label for="" class="col-sm-3 px-1">Evangelism Explosion</label>
                                  <div class="col-sm-9">
                                    <label for="" class="">Sudah?</label>
                                    <div class="form-check">
                                      <input class="form-check-input" name="sudahEvangelismExplosionDatas" type="checkbox" value="Sudah" id="sudahEvangelismExplosionData">
                                      <label class="form-check-label" for="sudahEvangelismExplosionData">
                                        Sudah
                                      </label>
                                    </div>
                                    <hr>
                                    <label for="tglEvangelismExplosionData" class="">Tanggal</label>
                                    <input type="date" name="tglEvangelismExplosionDatas" class="form-control form-control-sm" id="tglEvangelismExplosionData">
                                    <hr>
                                    <label for="" class="">Tempat</label><br>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="tempatEvangelismExplosionDatas" id="tempatEvangelismExplosionData" value="Gereja Lokal">
                                      <label class="form-check-label" for="tempatEvangelismExplosionData">Gereja Lokal</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="tempatEvangelismExplosionDatas" id="tempatEvangelismExplosionLData" value="Gereja Lain">
                                      <label class="form-check-label" for="tempatEvangelismExplosionLData">Gereja Lain</label>
                                    </div>
                                    <hr>
                                    <label for="fileUploadEvangelismExplosionData" class="">File</label>
                                    <input type="file" name="fileUploadEvangelismExplosionDatas" class="form-control form-control-sm" id="fileUploadEvangelismExplosionData">
                                    @error('fileUploadEvangelismExplosionDatas')
                                      <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                        <p class="p-1 pb-0" style="font-size: 10pt;">
                                          <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                          {{ $message }}
                                        </p>
                                      </div>
                                    @enderror
                                    <hr>
                                    <label for="ketEvangelismExplosionData" class="">Keterangan</label>
                                    <textarea class="form-control form-control-sm" name="ketEvangelismExplosionDatas" id="ketEvangelismExplosionData" rows="3" placeholder="Keterangan"></textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="input-center ps-5">
                              <div class="w-75">
                                <div class="mb-3 row">
                                  <label for="" class="col-sm-3 px-1">Tgl Berakhir Ikatan Dinas</label>
                                  <div class="col-sm-9">
                                    <label for="" class="">Sudah?</label>
                                    <div class="form-check">
                                      <input class="form-check-input" name="sudahIkatanDinasDatas" type="checkbox" value="Sudah" id="sudahIkatanDinasData">
                                      <label class="form-check-label" for="sudahIkatanDinasData">
                                        Sudah
                                      </label>
                                    </div>
                                    <hr>
                                    <label for="tglIkatanDinasData" class="">Tanggal</label>
                                    <input type="date" name="tglIkatanDinasDatas" class="form-control form-control-sm" id="tglIkatanDinasData">
                                    <hr>
                                    <label for="" class="">Tempat</label><br>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="tempatIkatanDinasDatas" id="tempatIkatanDinasData" value="Gereja Lokal">
                                      <label class="form-check-label" for="tempatIkatanDinasData">Gereja Lokal</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="tempatIkatanDinasDatas" id="tempatIkatanDinasLData" value="Gereja Lain">
                                      <label class="form-check-label" for="tempatIkatanDinasLData">Gereja Lain</label>
                                    </div>
                                    <hr>
                                    <label for="fileUploadIkatanDinasData" class="">File</label>
                                    <input type="file" name="fileUploadIkatanDinasDatas" class="form-control form-control-sm" id="fileUploadIkatanDinasData">
                                    @error('fileUploadIkatanDinasDatas')
                                      <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                        <p class="p-1 pb-0" style="font-size: 10pt;">
                                          <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                          {{ $message }}
                                        </p>
                                      </div>
                                    @enderror
                                    <hr>
                                    <label for="ketIkatanDinasData" class="">Keterangan</label>
                                    <textarea class="form-control form-control-sm" name="ketIkatanDinasDatas" id="ketIkatanDinasData" rows="3" placeholder="Keterangan"></textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="input-center ps-5">
                              <div class="w-75">
                                <div class="mb-3 row">
                                  <label for="" class="col-sm-3 px-1">Praktek 2 Tahun</label>
                                  <div class="col-sm-9">
                                    <label for="" class="">Sudah?</label>
                                    <div class="form-check">
                                      <input class="form-check-input" name="sudahPrktkDuaThnDatas" type="checkbox" value="Sudah" id="sudahPrktkDuaThnData">
                                      <label class="form-check-label" for="sudahPrktkDuaThnData">
                                        Sudah
                                      </label>
                                    </div>
                                    <hr>
                                    <label for="tglPrktkDuaThnData" class="">Tanggal</label>
                                    <input type="date" name="tglPrktkDuaThnDatas" class="form-control form-control-sm" id="tglPrktkDuaThnData">
                                    <hr>
                                    <label for="" class="">Tempat</label><br>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="tempatPrktkDuaThnDatas" id="tempatPrktkDuaThnData" value="Gereja Lokal">
                                      <label class="form-check-label" for="tempatPrktkDuaThnData">Gereja Lokal</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="tempatPrktkDuaThnDatas" id="tempatPrktkDuaThnLData" value="Gereja Lain">
                                      <label class="form-check-label" for="tempatPrktkDuaThnLData">Gereja Lain</label>
                                    </div>
                                    <hr>
                                    <label for="fileUploadPrktkDuaThnData" class="">File</label>
                                    <input type="file" name="fileUploadPrktkDuaThnDatas" class="form-control form-control-sm" id="fileUploadPrktkDuaThnData">
                                    @error('fileUploadPrktkDuaThnDatas')
                                      <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                        <p class="p-1 pb-0" style="font-size: 10pt;">
                                          <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                          {{ $message }}
                                        </p>
                                      </div>
                                    @enderror
                                    <hr>
                                    <label for="ketPrktkDuaThnData" class="">Keterangan</label>
                                    <textarea class="form-control form-control-sm" name="ketPrktkDuaThnDatas" id="ketPrktk2ThnData" rows="3" placeholder="Keterangan"></textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group-input">
                          <div class="form-header-group mb-3">
                            <h6>Kata Sandi</h6>
                          </div>
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="kata_sandiData" class="col-sm-3 px-1">Kata Sandi <span class="required-input">(*)</span></label>
                                <div class="col-sm-9">
                                  <input class="form-control form-control-sm" type="password" name="kata_sandiDatas" id="kata_sandiData" rows="3" placeholder="********">
                                  @error('kata_sandiDatas')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="konfirmasi_kata_sandiData" class="col-sm-3 px-1">Konfirmasi Kata Sandi <span class="required-input">(*)</span></label>
                                <div class="col-sm-9">
                                  <input class="form-control form-control-sm" type="password" name="konfirmasi_kata_sandiDatas" id="konfirmasi_kata_sandiData" rows="3" placeholder="********">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group-input">
                          <div class="form-header-group mb-3">
                            <h6>Lembaga</h6>
                          </div>
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="institusiData" class="col-sm-3 px-1 form-label">Lembaga <span class="required-input">(*)</span></label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="institusiDatas" id="institusiData">
                                    <option value="">-Lembaga-</option>
                                    <option value="PM (Parousia Ministry)">PM (Parousia Ministry)</option>
                                    <option value="GKP (Gereja Kristen Parousia)">GKP (Gereja Kristen Parousia)</option>
                                  </select>
                                  @error('institusiDatas')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer mt-2">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Modal Tambah Data -->
            </div>
            <hr>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">ID</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Tanggal Registrasi</th>
                  <th scope="col">Tempat, Tanggal Lahir</th>
                  <th scope="col">Jenis Kelamin</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Divisi</th>
                  <th scope="col">Lembaga</th>
                  <th scope="col">Ubah | Hapus</th>
                  <th scope="col">Kelompok</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($dataLembagas as $dataLembaga)
                  <tr>
                    <th scope="row">{{$nodataLembagas++}}</th>
                    <td>{{$dataLembaga->id_user}}</td>
                    <td>
                      <a href="#lihatData{{$dataLembaga->id_user}}" data-bs-toggle="modal" class="text-info">
                        {{$dataLembaga->nama_lengkap}} <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Data"></i>
                      </a>
                    </td>
                    <td>{{$dataLembaga->tanggal_regist}}</td>
                    <td>{{$dataLembaga->tempat_lahir}}, {{$dataLembaga->tanggal_lahir}}</td>
                    <td>{{$dataLembaga->jK}}</td>
                    <td>{{$dataLembaga->alamat}}</td>
                    <td>{{$dataLembaga->data_lembaga}}</td>
                    <td>{{$dataLembaga->institusi}}</td>
                    <td>
                      <div class="icon-action">
                        <a data-bs-target="#ubahData{{$dataLembaga->id_user}}" id="ubahDataButton" data-bs-toggle="modal" class="text-primary" data-user="{{$dataLembaga->id_user}}">
                          <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                        </a>
                        |
                        <a href="#hapusData{{$dataLembaga->id_user}}" data-bs-toggle="modal" class="text-danger">
                          <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                        </a>
                      </div>
                    </td>
                    <td>
                      @if ($dataLembaga->id_ketua_kelompok)
                        <a id="lihatKelompokButton" data-bs-target="#kelompokModal" data-bs-toggle="modal" data-attr="{{route('ketua-kelompok.showPengurusPM', $dataLembaga->id_user)}}" data-id="{{$dataLembaga->id_user}}" class="text-primary fs-5">
                          <i class="bi bi-people" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Kelompok"></i>
                        </a>
                      @else
                        -
                      @endif
                    </td>
                  </tr>
                  <!-- Modal Lihat Data -->
                  <div class="modal fade" id="lihatData{{$dataLembaga->id_user}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="lihatData{{$dataLembaga->id_user}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="lihatData{{$dataLembaga->id_user}}Label">
                            <i class="bi bi-info-circle text-info"></i>
                            Lihat Data Lembaga
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body bg-light">
                          <div class="d-flex align-items-start">
                            <div class="nav flex-column nav-pills me-3 shadow rounded w-25 bg-white p-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                              <button class="nav-link active" class="border-bottom" id="personal{{$dataLembaga->id_user}}-tab" data-bs-toggle="pill" data-bs-target="#personal{{$dataLembaga->id}}" type="button" role="tab" aria-controls="personal{{$dataLembaga->id}}" aria-selected="true">Personal</button>
                              <button class="nav-link" id="tempat-tinggal{{$dataLembaga->id}}-tab" data-bs-toggle="pill" data-bs-target="#tempat-tinggal{{$dataLembaga->id}}" type="button" role="tab" aria-controls="tempat-tinggal{{$dataLembaga->id}}" aria-selected="false">Tempat Tinggal</button>
                              <button class="nav-link" id="kontak{{$dataLembaga->id}}-tab" data-bs-toggle="pill" data-bs-target="#kontak{{$dataLembaga->id}}" type="button" role="tab" aria-controls="kontak{{$dataLembaga->id}}" aria-selected="false">Kontak</button>
                              <button class="nav-link" id="pekerjaan{{$dataLembaga->id}}-tab" data-bs-toggle="pill" data-bs-target="#pekerjaan{{$dataLembaga->id}}" type="button" role="tab" aria-controls="pekerjaan{{$dataLembaga->id}}" aria-selected="false">Pekerjaan</button>
                              <button class="nav-link" id="studi-minat{{$dataLembaga->id}}-tab" data-bs-toggle="pill" data-bs-target="#studi-minat{{$dataLembaga->id}}" type="button" role="tab" aria-controls="studi-minat{{$dataLembaga->id}}" aria-selected="false">Studi & Minat</button>
                              <button class="nav-link" id="catatan{{$dataLembaga->id}}-tab" data-bs-toggle="pill" data-bs-target="#catatan{{$dataLembaga->id}}" type="button" role="tab" aria-controls="catatan{{$dataLembaga->id}}" aria-selected="false">Catatan</button>
                              <button class="nav-link" id="kc-isian-text{{$dataLembaga->id}}-tab" data-bs-toggle="pill" data-bs-target="#kc-isian-text{{$dataLembaga->id}}" type="button" role="tab" aria-controls="kc-isian-text{{$dataLembaga->id}}" aria-selected="false">KC (Isian Text)</button>
                              <button class="nav-link" id="kc-pilihan{{$dataLembaga->id}}-tab" data-bs-toggle="pill" data-bs-target="#kc-pilihan{{$dataLembaga->id}}" type="button" role="tab" aria-controls="kc-pilihan{{$dataLembaga->id}}" aria-selected="false">KC (Pilihan)</button>
                              <button class="nav-link" id="kc-pilihan-ganda{{$dataLembaga->id}}-tab" data-bs-toggle="pill" data-bs-target="#kc-pilihan-ganda{{$dataLembaga->id}}" type="button" role="tab" aria-controls="kc-pilihan-ganda{{$dataLembaga->id}}" aria-selected="false">KC (Pilihan Ganda)</button>
                              <button class="nav-link" id="kc-check-box{{$dataLembaga->id}}-tab" data-bs-toggle="pill" data-bs-target="#kc-check-box{{$dataLembaga->id}}" type="button" role="tab" aria-controls="kc-check-box{{$dataLembaga->id}}" aria-selected="false">KC (Check Box)</button>
                              <button class="nav-link" id="dokumen-penting{{$dataLembaga->id}}-tab" data-bs-toggle="pill" data-bs-target="#dokumen-penting{{$dataLembaga->id}}" type="button" role="tab" aria-controls="dokumen-penting{{$dataLembaga->id}}" aria-selected="false">Dokumen Penting</button>
                            </div>
                            <div class="d-flex me-3" style="height: 495px;">
                              <div class="vr"></div>
                            </div>
                            <div class="tab-content w-100" id="v-pills-tabContent">
                              <div class="container bg-white mb-3 p-2 shadow rounded">
                                <img src="{{ $dataLembaga->foto != '' ? asset('images/Data Lembaga/'.$dataLembaga->foto) : asset('images/no-user.png') }}" class="img-fluid img-thumbnail rounded mx-auto d-block w-25" alt="...">
                                <div class="text-center">
                                  <p class="fs-4 fw-bold mb-0">{{$dataLembaga->nama_lengkap}}</p>
                                  <span>({{$dataLembaga->nama_panggilan}})</span>
                                </div>
                              </div>
                              <hr class="text-secondary">
                              <!-- Personal -->
                              <div class="tab-pane fade show active w-auto" id="personal{{$dataLembaga->id}}" role="tabpanel" aria-labelledby="personal{{$dataLembaga->id}}-tab">
                                <div class="container bg-white shadow rounded mb-1">
                                  <p class="fs-4 text-dark fw-bold p-2">Personal</p>
                                </div>
                                <div class="detail-personal bg-white p-3 shadow rounded">
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">ID</div>
                                    <div class="col-8">{{$dataLembaga->id_user}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Tanggal Registrasi</div>
                                    <div class="col-8">{{$dataLembaga->tanggal_regist}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Referensi Dari</div>
                                    <div class="col-8">{{$dataLembaga->refrensi}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Sapaan</div>
                                    <div class="col-8">{{$dataLembaga->sapaan}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Gelar Awalan</div>
                                    <div class="col-8">{{$dataLembaga->gelar_awalan}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Nama Lengkap</div>
                                    <div class="col-8">{{$dataLembaga->nama_lengkap}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Gelar Akhiran</div>
                                    <div class="col-8">{{$dataLembaga->gelar_akhiran}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Nama Panggilan</div>
                                    <div class="col-8">{{$dataLembaga->nama_panggilan}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Peran dalam Keluarga</div>
                                    <div class="col-8">{{$dataLembaga->perandataLembaga}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Jenis Identitas</div>
                                    <div class="col-8">{{$dataLembaga->jenis_identitas}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">No. Identitas</div>
                                    <div class="col-8">{{$dataLembaga->no_iden}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Tempat / Tanggal Lahir</div>
                                    <div class="col-8">{{$dataLembaga->tempat_lahir}} / {{$dataLembaga->tanggal_lahir}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Jenis Kelamin</div>
                                    <div class="col-8">{{$dataLembaga->jK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Golongan Darah</div>
                                    <div class="col-8">{{$dataLembaga->goldar}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Status Pernikahan</div>
                                    <div class="col-8">{{$dataLembaga->status_pernikahan}}</div>
                                  </div>
                                  <div class="row p-2">
                                    <div class="col-4">Foto Bitmap</div>
                                    <div class="col-8"><img src="{{ $dataLembaga->foto_bitmap != '' ? asset('images/Data Lembaga/Foto Bitmap/'.$dataLembaga->foto_bitmap) : asset('images/no-user.png') }}" class="img-fluid rounded w-25" alt="..."></div>
                                  </div>
                                </div>
                              </div>
                              <!-- Tempat Tinggal -->
                              <div class="tab-pane fade" id="tempat-tinggal{{$dataLembaga->id}}" role="tabpanel" aria-labelledby="tempat-tinggal{{$dataLembaga->id}}-tab">
                                <div class="container bg-white shadow rounded">
                                  <p class="fs-4 text-dark fw-bold p-2">Tempat Tinggal</p>
                                </div>
                                <div class="tempat_tinggal bg-white p-3 shadow rounded">
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Alamat</div>
                                    <div class="col-8">{{$dataLembaga->alamat}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Keterangan Arah</div>
                                    <div class="col-8">{{$dataLembaga->ket_arah}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Peta</div>
                                    <div class="col-8"><a href="{{$dataLembaga->peta}}">{{$dataLembaga->peta}}</a></div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Negara</div>
                                    <div class="col-8">{{$dataLembaga->negara}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Propinsi</div>
                                    <div class="col-8">{{$dataLembaga->provinsi}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Kota</div>
                                    <div class="col-8">{{$dataLembaga->kota}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Kecamatan</div>
                                    <div class="col-8">{{$dataLembaga->kecamatan}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Kelurahan</div>
                                    <div class="col-8">{{$dataLembaga->kelurahan}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Kode Pos</div>
                                    <div class="col-8">{{$dataLembaga->kode_pos}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Dusun (Desa)</div>
                                    <div class="col-8">{{$dataLembaga->dusun}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">RT / RW</div>
                                    <div class="col-8">{{$dataLembaga->rt}} / {{$dataLembaga->rw}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Area</div>
                                    <div class="col-8">{{$dataLembaga->area}}</div>
                                  </div>
                                  <div class="row p-2">
                                    <div class="col-4">Lokasi</div>
                                    <div class="col-8">{{$dataLembaga->Lokasi}}</div>
                                  </div>
                                </div>
                              </div>
                              <!-- Kontak -->
                              <div class="tab-pane fade" id="kontak{{$dataLembaga->id}}" role="tabpanel" aria-labelledby="kontak{{$dataLembaga->id}}-tab">
                                <div class="container bg-white shadow rounded">
                                  <p class="fs-4 text-dark fw-bold p-2">Kontak</p>
                                </div>
                                <div class="kontak bg-white p-3 shadow rounded">
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">No. Telp 1</div>
                                    <div class="col-8">{{$dataLembaga->no_telp}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Telp. Rumah 2</div>
                                    <div class="col-8">{{$dataLembaga->no_rumah}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">No. HP 1</div>
                                    <div class="col-8">{{$dataLembaga->no_hpsatu}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Bisa Terima SMS?</div>
                                    <div class="col-8">{{$dataLembaga->bisa_sms}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">No. HP 2</div>
                                    <div class="col-8">{{$dataLembaga->no_hpdua}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">No. Lainnya (mis: Pin BB)</div>
                                    <div class="col-8">{{$dataLembaga->no_lainnya}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Fax. Rumah</div>
                                    <div class="col-8">{{$dataLembaga->fax_rumah}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Email</div>
                                    <div class="col-8">{{$dataLembaga->alamat_surel}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Bisa Terima Email?</div>
                                    <div class="col-8">{{$dataLembaga->bisa_email}}</div>
                                  </div>
                                  <div class="row p-2">
                                    <div class="col-4">Website (Facebook, Twitter, etc)</div>
                                    <div class="col-8">{{$dataLembaga->website}}</div>
                                  </div>
                                </div>
                              </div>
                              <!-- Pekerjaan -->
                              <div class="tab-pane fade" id="pekerjaan{{$dataLembaga->id}}" role="tabpanel" aria-labelledby="pekerjaan{{$dataLembaga->id}}-tab">
                                <div class="container bg-white shadow rounded">
                                  <p class="fs-4 text-dark fw-bold p-2">Pekerjaan</p>
                                </div>
                                <div class="pekerjaan bg-white p-3 shadow rounded">
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Pekerjaan</div>
                                    <div class="col-8">{{$dataLembaga->pekerjaan}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Jabatan Dalam Pekerjaan</div>
                                    <div class="col-8">{{$dataLembaga->jabatan}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Status Pekerjaan</div>
                                    <div class="col-8">{{$dataLembaga->status_pekerjaan}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Nama Perusahaan</div>
                                    <div class="col-8">{{$dataLembaga->nama_perusahaan}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Alamat Kantor</div>
                                    <div class="col-8">{{$dataLembaga->alamat_kantor}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Telp. Kantor</div>
                                    <div class="col-8">{{$dataLembaga->telp_kantor}}</div>
                                  </div>
                                  <div class="row p-2">
                                    <div class="col-4">Ext.</div>
                                    <div class="col-8">{{$dataLembaga->ext}}</div>
                                  </div>
                                </div>
                              </div>
                              <!-- Studi & Minat -->
                              <div class="tab-pane fade" id="studi-minat{{$dataLembaga->id}}" role="tabpanel" aria-labelledby="studi-minat{{$dataLembaga->id}}-tab">
                                <div class="container bg-white shadow rounded">
                                  <p class="fs-4 text-dark fw-bold p-2">Studi & Minat</p>
                                </div>
                                <div class="studi-minat bg-white p-3 shadow rounded">
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Tingkat Pendidikan</div>
                                    <div class="col-8">{{$dataLembaga->tingkat_pendidikan}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Sekolah/Univ (Saat ini sedang ditempuh)</div>
                                    <div class="col-8">{{$dataLembaga->sekolah_univ}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Bidang Ketertarikan</div>
                                    <div class="col-8">{{$dataLembaga->bidang_ketertarikan}}</div>
                                  </div>
                                  <div class="row p-2">
                                    <div class="col-4">Bidang Keterampilan</div>
                                    <div class="col-8">{{$dataLembaga->bidang_keterampilan}}</div>
                                  </div>
                                </div>
                              </div>
                              <!-- Catatan -->
                              <div class="tab-pane fade" id="catatan{{$dataLembaga->id}}" role="tabpanel" aria-labelledby="catatan{{$dataLembaga->id}}-tab">
                                <div class="container bg-white shadow rounded">
                                  <p class="fs-4 text-dark fw-bold p-2">Catatan</p>
                                </div>
                                <div class="catatan bg-white p-3 shadow rounded">
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Catatan</div>
                                    <div class="col-8">{{$dataLembaga->catatan}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Status</div>
                                    <div class="col-8">{{$dataLembaga->status}}</div>
                                  </div>
                                  <div class="row p-2">
                                    <div class="col-4">Email Sudah Verifikasi?</div>
                                    <div class="col-8">{{$dataLembaga->verif_email}}</div>
                                  </div>
                                </div>
                              </div>
                              <!-- Kolom Cadangan (Isian Text) -->
                              <div class="tab-pane fade" id="kc-isian-text{{$dataLembaga->id}}" role="tabpanel" aria-labelledby="kc-isian-text{{$dataLembaga->id}}-tab">
                                <div class="container bg-white shadow rounded">
                                  <p class="fs-4 text-dark fw-bold p-2">Kolom Cadangan (Isian Text)</p>
                                </div>
                                <div class="kolom-isian-text bg-white p-3 shadow rounded">
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Nomor Rekening</div>
                                    <div class="col-8">{{$dataLembaga->no_rekening}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Periode Beasiswa</div>
                                    <div class="col-8">{{$dataLembaga->periode_beasiswa}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Periode Kerja Praktek</div>
                                    <div class="col-8">{{$dataLembaga->periode_kerja_praktiK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Riwayat Pelayanan 1</div>
                                    <div class="col-8">{{$dataLembaga->riwayat_pelayananSatu}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Riwayat Pelayanan 2</div>
                                    <div class="col-8">{{$dataLembaga->riwayat_pelayananDua}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Riwayat Pelayanan 3</div>
                                    <div class="col-8">{{$dataLembaga->riwayat_pelayananTiga}}</div>
                                  </div>
                                  <div class="row p-2">
                                    <div class="col-4">Riwayat Pelayanan 4</div>
                                    <div class="col-8">{{$dataLembaga->riwayat_pelayananEmpat}}</div>
                                  </div>
                                </div>
                              </div>
                              <!-- Kolom Cadangan (Pilihan) -->
                              <div class="tab-pane fade" id="kc-pilihan{{$dataLembaga->id}}" role="tabpanel" aria-labelledby="kc-pilihan{{$dataLembaga->id}}-tab">
                                <div class="container bg-white shadow rounded">
                                  <p class="fs-4 text-dark fw-bold p-2">Kolom Cadangan (Pilihan)</p>
                                </div>
                                <div class="kolom-pilihan bg-white p-3 shadow rounded">
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4"></div>
                                    <div class="col-8">{{$dataLembaga->kolom_cadanganPSatu}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4"></div>
                                    <div class="col-8">{{$dataLembaga->kolom_cadanganPDua}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4"></div>
                                    <div class="col-8">{{$dataLembaga->kolom_cadanganPTiga}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4"></div>
                                    <div class="col-8">{{$dataLembaga->kolom_cadanganPEmpat}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4"></div>
                                    <div class="col-8">{{$dataLembaga->kolom_cadanganPLimat}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4"></div>
                                    <div class="col-8">{{$dataLembaga->kolom_cadanganPEnam}}</div>
                                  </div>
                                  <div class="row p-2">
                                    <div class="col-4"></div>
                                    <div class="col-8">{{$dataLembaga->kolom_cadanganPTujuh}}</div>
                                  </div>
                                </div>
                              </div>
                              <!-- Kolom Cadangan (Pilihan Ganda) -->
                              <div class="tab-pane fade" id="kc-pilihan-ganda{{$dataLembaga->id}}" role="tabpanel" aria-labelledby="kc-pilihan-ganda{{$dataLembaga->id}}-tab">
                                <div class="container bg-white shadow rounded">
                                  <p class="fs-4 text-dark fw-bold p-2">Kolom Cadangan (Pilihan Ganda)</p>
                                </div>
                                <div class="kolom-pilihan-ganda bg-white p-3 shadow rounded">
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Personality - MBTI</div>
                                    <div class="col-8">{{$dataLembaga->personality_mbti}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Personality - Holland</div>
                                    <div class="col-8">{{$dataLembaga->personality_holland}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Spiritual Gifts</div>
                                    <div class="col-8">{{$dataLembaga->spiritual_gifts}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Abilities</div>
                                    <div class="col-8">{{$dataLembaga->abilities}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Experience</div>
                                    <div class="col-8">{{$dataLembaga->kolom_cadanganPGLima}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Kemampuan Bahasa</div>
                                    <div class="col-8">{{$dataLembaga->kemampuan_bahasa}}</div>
                                  </div>
                                </div>
                              </div>
                              <!-- Kolom Cadangan (Check Box) -->
                              <div class="tab-pane fade" id="kc-check-box{{$dataLembaga->id}}" role="tabpanel" aria-labelledby="kc-check-box{{$dataLembaga->id}}-tab">
                                <div class="container bg-white shadow rounded">
                                  <p class="fs-4 text-dark fw-bold p-2">Kolom Cadangan (Check Box)</p>
                                </div>
                                <div class="kolom-check-box bg-white p-3 shadow rounded">
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4"></div>
                                    <div class="col-8">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="kolom_cadanganCBSatu" disabled {{$dataLembaga->kolom_cadanganCBSatu == "Ya" ? 'checked' : ''}}>
                                        <label class="form-check-label" for="kolom_cadanganCBSatu">
                                          Ya
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4"></div>
                                    <div class="col-8">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="kolom_cadanganCBDua" disabled {{$dataLembaga->kolom_cadanganCBDua == "Ya" ? 'checked' : ''}}>
                                        <label class="form-check-label" for="kolom_cadanganCBDua">
                                          Ya
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4"></div>
                                    <div class="col-8">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="kolom_cadanganCBTiga" disabled {{$dataLembaga->kolom_cadanganCBTiga == "Ya" ? 'checked' : ''}}>
                                        <label class="form-check-label" for="kolom_cadanganCBTiga">
                                          Ya
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4"></div>
                                    <div class="col-8">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="kolom_cadanganCBEmpat" disabled {{$dataLembaga->kolom_cadanganCBEmpat == "Ya" ? 'checked' : ''}}>
                                        <label class="form-check-label" for="kolom_cadanganCBEmpat">
                                          Ya
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4"></div>
                                    <div class="col-8">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="kolom_cadanganCBLima" disabled {{$dataLembaga->kolom_cadanganCBLima == "Ya" ? 'checked' : ''}}>
                                        <label class="form-check-label" for="kolom_cadanganCBLima">
                                          Ya
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4"></div>
                                    <div class="col-8">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="kolom_cadanganCBEnam" disabled {{$dataLembaga->kolom_cadanganCBEnam == "Ya" ? 'checked' : ''}}>
                                        <label class="form-check-label" for="kolom_cadanganCBEnam">
                                          Ya
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row p-2">
                                    <div class="col-4"></div>
                                    <div class="col-8">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="kolom_cadanganCBTujuh" disabled {{$dataLembaga->kolom_cadanganCBTujuh == "Ya" ? 'checked' : ''}}>
                                        <label class="form-check-label" for="kolom_cadanganCBTujuh">
                                          Ya
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- DOKUMEN PENTING -->
                              <div class="tab-pane fade" id="dokumen-penting{{$dataLembaga->id}}" role="tabpanel" aria-labelledby="dokumen-penting{{$dataLembaga->id}}-tab">
                                <div class="container bg-white shadow rounded">
                                  <p class="fs-4 text-dark fw-bold p-2">DOKUMEN PENTING</p>
                                </div>
                                <div class="dokumen-penting bg-white p-3 shadow rounded">
                                  <div class="row p-2 border-bottom">
                                    <div class="col-1">No.</div>
                                    <div class="col-2">Momen</div>
                                    <div class="col-1">Sudah?</div>
                                    <div class="col-2">Tanggal</div>
                                    <div class="col-2">Tempat</div>
                                    <div class="col-2">File</div>
                                    <div class="col-2">Keterangan</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-1">1.</div>
                                    <div class="col-2">Baptis Anak</div>
                                    <div class="col-1">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="ba_sudah" disabled {{$dataLembaga->ba_sudah == 'Sudah' ? 'checked' : ''}}>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$dataLembaga->ba_tanggal}}</div>
                                    <div class="col-2">
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="ba_tempatLo" disabled {{$dataLembaga->ba_tempat == 'Gereja Lokal' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="ba_tempatLo">
                                          Gereja Lokal
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="ba_tempatLa" disabled {{$dataLembaga->ba_tempat == 'Gereja Lain' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="ba_tempatLa">
                                          Gereja Lain
                                        </label>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$dataLembaga->ba_file}}</div>
                                    <div class="col-2">{{$dataLembaga->ba_ket}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-1">2.</div>
                                    <div class="col-2">Menikah</div>
                                    <div class="col-1">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="menikah_sudah" disabled {{$dataLembaga->menikah_sudah == 'Sudah' ? 'checked' : ''}}>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$dataLembaga->menikah_tanggal}}</div>
                                    <div class="col-2">
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="menikah_tempatLo" disabled {{$dataLembaga->menikah_tempat == 'Gereja Lokal' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="menikah_tempatLo">
                                          Gereja Lokal
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="menikah_tempatLa" disabled {{$dataLembaga->menikah_tempat == 'Gereja Lain' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="menikah_tempatLa">
                                          Gereja Lain
                                        </label>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$dataLembaga->menikah_file}}</div>
                                    <div class="col-2">{{$dataLembaga->menikah_ket}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-1">3.</div>
                                    <div class="col-2">Baptis</div>
                                    <div class="col-1">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="bap_sudah" disabled {{$dataLembaga->bap_sudah == 'Sudah' ? 'checked' : ''}}>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$dataLembaga->bap_tanggal}}</div>
                                    <div class="col-2">
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="bap_tempatLo" disabled {{$dataLembaga->bap_tempat == 'Gereja Lokal' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="bap_tempatLo">
                                          Gereja Lokal
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="bap_tempatLa" disabled {{$dataLembaga->bap_tempat == 'Gereja Lain' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="bap_tempatLa">
                                          Gereja Lain
                                        </label>
                                      </div></div>
                                    <div class="col-2">{{$dataLembaga->bap_file}}</div>
                                    <div class="col-2">{{$dataLembaga->bap_ket}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-1">4.</div>
                                    <div class="col-2">Meninggal Dunia</div>
                                    <div class="col-1">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="md_sudah" disabled {{$dataLembaga->md_sudah == 'Sudah' ? 'checked' : ''}}>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$dataLembaga->md_tanggal}}</div>
                                    <div class="col-2">
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="md_tempatLo" disabled {{$dataLembaga->md_tempat == 'Gereja Lokal' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="md_tempatLo">
                                          Gereja Lokal
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="md_tempatLa" disabled {{$dataLembaga->md_tempat == 'Gereja Lain' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="md_tempatLa">
                                          Gereja Lain
                                        </label>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$dataLembaga->md_file}}</div>
                                    <div class="col-2">{{$dataLembaga->md_ket}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-1">5.</div>
                                    <div class="col-2">Penyerahan Anak</div>
                                    <div class="col-1">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="pa_sudah" disabled {{$dataLembaga->pa_sudah == 'Sudah' ? 'checked' : ''}}>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$dataLembaga->pa_tanggal}}</div>
                                    <div class="col-2">
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="pa_tempatLo" disabled {{$dataLembaga->pa_tempat == 'Gereja Lokal' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="pa_tempatLo">
                                          Gereja Lokal
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="pa_tempatLa" disabled {{$dataLembaga->pa_tempat == 'Gereja Lain' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="pa_tempatLa">
                                          Gereja Lain
                                        </label>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$dataLembaga->pa_file}}</div>
                                    <div class="col-2">{{$dataLembaga->pa_ket}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-1">6.</div>
                                    <div class="col-2">Evangelism Explosion</div>
                                    <div class="col-1">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="ee_sudah" disabled {{$dataLembaga->ee_sudah == 'Sudah' ? 'checked' : ''}}>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$dataLembaga->ee_tanggal}}</div>
                                    <div class="col-2">
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="ee_tempatLo" disabled {{$dataLembaga->ee_tempat == 'Gereja Lokal' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="ee_tempatLo">
                                          Gereja Lokal
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="ee_tempatLa" disabled {{$dataLembaga->ee_tempat == 'Gereja Lain' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="ee_tempatLa">
                                          Gereja Lain
                                        </label>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$dataLembaga->ee_file}}</div>
                                    <div class="col-2">{{$dataLembaga->ee_ket}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-1">7.</div>
                                    <div class="col-2">Tgl berakhir ikatan dinas</div>
                                    <div class="col-1">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="bid_sudah" disabled {{$dataLembaga->bid_sudah == 'Sudah' ? 'checked' : ''}}>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$dataLembaga->bid_tanggal}}</div>
                                    <div class="col-2">
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="bid_tempatLo" disabled {{$dataLembaga->bid_tempat == 'Gereja Lokal' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="bid_tempatLo">
                                          Gereja Lokal
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="bid_tempatLa" disabled {{$dataLembaga->bid_tempat == 'Gereja Lain' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="bid_tempatLa">
                                          Gereja Lain
                                        </label>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$dataLembaga->bid_file}}</div>
                                    <div class="col-2">{{$dataLembaga->bid_ket}}</div>
                                  </div>
                                  <div class="row p-2">
                                    <div class="col-1">8.</div>
                                    <div class="col-2">Praktek 2 Tahun</div>
                                    <div class="col-1">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="pdt_sudah" disabled {{$dataLembaga->pdt_sudah == 'Sudah' ? 'checked' : ''}}>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$dataLembaga->pdt_tanggal}}</div>
                                    <div class="col-2">
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="pdt_tempatLo" disabled {{$dataLembaga->pdt_tempat == 'Gereja Lokal' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="pdt_tempatLo">
                                          Gereja Lokal
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="pdt_tempatLa" disabled {{$dataLembaga->pdt_tempat == 'Gereja Lain' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="pdt_tempatLa">
                                          Gereja Lain
                                        </label>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$dataLembaga->pdt_file}}</div>
                                    <div class="col-2">{{$dataLembaga->pdt_ket}}</div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Kembali</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal Lihat Data -->
                  <!-- Modal Ubah Data -->
                  <div class="modal fade" id="ubahData{{$dataLembaga->id_user}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahData{{$dataLembaga->id_user}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahData{{$dataLembaga->id_user}}Label">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Data Ketua Kelompok
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('ketua-kelompok.updatePengurusPM', $dataLembaga->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group-input">
                              <div class="form-header-group mb-3">
                                <h6>PERSONAL</h6>
                              </div>
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editTglRegistrasiKetuaKelompok" class="col-sm-3 px-1">Tgl Registrasi <span class="required-input">(*)</span></label>
                                    <div class="col-sm-9">
                                      <input type="date" name="editTglRegistrasiKetuaKelompok" class="form-control form-control-sm" id="editTglRegistrasiKetuaKelompok" value="{{$dataLembaga->tanggal_registKK}}">
                                      @error('editTglRegistrasiKetuaKelompok')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editReferensiKetuaKelompok" class="col-sm-3 px-1">Referensi Dari</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editReferensiKetuaKelompok" class="form-control form-control-sm" id="editReferensiKetuaKelompok" placeholder="Referensi Dari" value="{{$dataLembaga->refrensiKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editSapaanKetuaKelompok" class="col-sm-3 px-1">Sapaan</label>
                                    <div class="col-sm-9">
                                      <select class="form-select form-select-sm" name="editSapaanKetuaKelompok" id="editSapaanKetuaKelompok" aria-label=".form-select-sm editSapaanKetuaKelompok">
                                        <option value="{{$dataLembaga->sapaanKK}}">{{$dataLembaga->sapaanKK}}</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editGelarAwalanKetuaKelompok" class="col-sm-3 px-1">Gelar Awalan</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editGelarAwalanKetuaKelompok" class="form-control form-control-sm" id="editGelarAwalanKetuaKelompok" placeholder="Gelar Awalan" value="{{$dataLembaga->gelar_awalanKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editNamaKetuaKelompok" class="col-sm-3 px-1">Nama Lengkap <span class="required-input">(*)</span></label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editNamaKetuaKelompok" class="form-control form-control-sm" id="editNamaKetuaKelompok" placeholder="cth: Angelica Gabriel" value="{{$dataLembaga->nama_lengkapKK}}">
                                      @error('editNamaKetuaKelompok')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editGelarAkhiranKetuaKelompok" class="col-sm-3 px-1">Gelar Akhiran</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editGelarAkhiranKetuaKelompok" class="form-control form-control-sm" id="editGelarAkhiranKetuaKelompok" placeholder="Gelar Akhiran" value="{{$dataLembaga->gelar_akhiranKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editNamaPanggilanKetuaKelompok" class="col-sm-3 px-1">Nama Panggilan</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editNamaPanggilanKetuaKelompok" class="form-control form-control-sm" id="editNamaPanggilanKetuaKelompok" placeholder="cth: Angel" value="{{$dataLembaga->nama_panggilanKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editPeranKetuaKelompok" class="col-sm-3 px-1">Peran dalam Keluarga</label>
                                    <div class="col-sm-9">
                                      <select class="form-select form-select-sm" name="editPeranKetuaKelompok" id="editPeranKetuaKelompok" aria-label=".form-select-sm editPeranKetuaKelompok">
                                        <option value="{{$dataLembaga->peranKK}}"> {{$dataLembaga->peranKK}}</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editJenisIdentitasKetuaKelompok" class="col-sm-3 px-1">Jenis Identitas</label>
                                    <div class="col-sm-9">
                                      <select class="form-select form-select-sm" name="editJenisIdentitasKetuaKelompok" id="editJenisIdentitasKetuaKelompok" aria-label=".form-select-sm editJenisIdentitasKetuaKelompok">
                                        <option value="{{$dataLembaga->jenis_identitasKK}}"> {{$dataLembaga->jenis_identitasKK}}</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editNoIdentitasKetuaKelompok" class="col-sm-3 px-1">No. Identitas</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editNoIdentitasKetuaKelompok" class="form-control form-control-sm" id="editNoIdentitasKetuaKelompok" placeholder="cth: 12*********" value="{{$dataLembaga->no_identitasKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editTempatLahirKetuaKelompok" class="col-sm-3 px-1">Tempat, Tgl Lahir</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="editTempatLahirKetuaKelompok" class="form-control form-control-sm" id="editTempatLahirKetuaKelompok" placeholder="cth: Bandung" value="{{$dataLembaga->tempat_lahirKK}}">
                                    </div>
                                    <div class="col-sm-1">
                                      <p>/</p>
                                    </div>
                                    <div class="col-sm-3">
                                      <input type="date" name="editTglLahirKetuaKelompok" class="form-control form-control-sm" id="editTglLahirKetuaKelompok" value="{{$dataLembaga->tanggal_lahirKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editJenisKelaminKetuaKelompok" class="col-sm-3 px-1">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editJenisKelaminKetuaKelompok" id="jenisKelaminPKetuaKelompok" value="Pria" {{$dataLembaga->jkKK == 'Pria' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="jenisKelaminPKetuaKelompok">Pria</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editJenisKelaminKetuaKelompok" id="jenisKelaminWKetuaKelompok" value="Wanita" {{$dataLembaga->jkKK == 'Wanita' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="jenisKelaminWKetuaKelompok">Wanita</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editGolonganDarahKetuaKelompok" class="col-sm-3 px-1">Golongan Darah</label>
                                    <div class="col-sm-9">
                                      <select class="form-select form-select-sm" name="editGolonganDarahKetuaKelompok" id="editGolonganDarahKetuaKelompok" aria-label=".form-select-sm editGolonganDarahKetuaKelompok">
                                        <option value="{{$dataLembaga->goldarKK}}"> {{$dataLembaga->goldarKK}}</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">AB</option>
                                        <option value="O">O</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editStatusPernikahanKetuaKelompok" class="col-sm-3 px-1">Status Pernikahan</label>
                                    <div class="col-sm-9">
                                      <select class="form-select form-select-sm" name="editStatusPernikahanKetuaKelompok" id="editStatusPernikahanKetuaKelompok" aria-label=".form-select-sm editStatusPernikahanKetuaKelompok">
                                        <option value="{{$dataLembaga->status_pernikahanKK}}"> {{$dataLembaga->status_pernikahanKK}}</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editFotoKetuaKelompok" class="col-sm-3 px-1">Foto</label>
                                    <div class="col-sm-9">
                                      <input type="file" name="editFotoKetuaKelompok" class="form-control form-control-sm" id="editFotoKetuaKelompok" value="{{$dataLembaga->fotoKK}}">
                                      @error('editFotoKetuaKelompok')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editFotoBitmapKetuaKelompok" class="col-sm-3 px-1">Foto Bitmap</label>
                                    <div class="col-sm-9">
                                      <input type="file" name="editFotoBitmapKetuaKelompok" class="form-control form-control-sm" id="editFotoBitmapKetuaKelompok" value="{{$dataLembaga->foto_bitmapKK}}">
                                      @error('editFotoBitmapKetuaKelompok')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group-input">
                              <div class="form-header-group mb-3">
                                <h6>TEMPAT TINGGAL</h6>
                              </div>
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editAlamatKetuaKelompok" class="col-sm-3 px-1">Alamat</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editAlamatKetuaKelompok" class="form-control form-control-sm" id="editAlamatKetuaKelompok" placeholder="Alamat" value="{{$dataLembaga->alamatKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editKeteranganArahKetuaKelompok" class="col-sm-3 px-1">Keterangan Arah</label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control form-control-sm" name="editKeteranganArahKetuaKelompok" id="editKeteranganArahKetuaKelompok" rows="3" placeholder="Keterangan Arah"> {{$dataLembaga->ket_arahKK}}</textarea>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editPetaKetuaKelompok" class="col-sm-3 px-1">Peta</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editPetaKetuaKelompok" class="form-control form-control-sm" id="editPetaKetuaKelompok" placeholder="Peta" value="{{$dataLembaga->petaKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editNegaraKetuaKelompok" class="col-sm-3 px-1">Negara</label>
                                    <div class="col-sm-9">
                                      <select class="form-select form-select-sm" name="editNegaraKetuaKelompok" id="editNegaraKetuaKelompok" aria-label=".form-select-sm editNegaraKetuaKelompok">
                                        <option value="{{$dataLembaga->negaraKK}}"> {{$dataLembaga->negaraKK}}</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editProvinsiKetuaKelompok" class="col-sm-3 px-1">Provinsi</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editProvinsiKetuaKelompok" class="form-control form-control-sm" id="editProvinsiKetuaKelompok" placeholder="Provinsi" value="{{$dataLembaga->provinsiKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editKotaKetuaKelompok" class="col-sm-3 px-1">Kota</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editKotaKetuaKelompok" class="form-control form-control-sm" id="editKotaKetuaKelompok" placeholder="Kota" value="{{$dataLembaga->kotaKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editKecamatanKetuaKelompok" class="col-sm-3 px-1">Kecamatan</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editKecamatanKetuaKelompok" class="form-control form-control-sm" id="editKecamatanKetuaKelompok" placeholder="Kecamatan" value="{{$dataLembaga->kecamatanKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editKelurahanKetuaKelompok" class="col-sm-3 px-1">Kelurahan</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editKelurahanKetuaKelompok" class="form-control form-control-sm" id="editKelurahanKetuaKelompok" placeholder="Kelurahan" value="{{$dataLembaga->kelurahanKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editKodePosKetuaKelompok" class="col-sm-3 px-1">Kode Pos</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editKodePosKetuaKelompok" class="form-control form-control-sm" id="editKodePosKetuaKelompok" placeholder="Kode Pos" value="{{$dataLembaga->kode_posKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editDusunKetuaKelompok" class="col-sm-3 px-1">Dusun (Desa)</label>
                                    <div class="col-sm-9">
                                      <select class="form-select form-select-sm" name="editDusunKetuaKelompok" aria-label=".form-select-sm editDusunKetuaKelompok">
                                        <option value="{{$dataLembaga->dusunKK}}"> {{$dataLembaga->dusunKK}}</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editRtRwKetuaKelompok" class="col-sm-3 px-1">RT / RW</label>
                                    <div class="col-sm-4">
                                      <input type="text" name="rtKetuaKelompok" class="form-control form-control-sm" id="editRtRwKetuaKelompok" placeholder="RT" value="{{$dataLembaga->rtKK}}">
                                    </div>
                                    <div class="col-sm-1">
                                      <p>/</p>
                                    </div>
                                    <div class="col-sm-4">
                                      <input type="text" name="rwKetuaKelompok" class="form-control form-control-sm" id="editRtRwKetuaKelompok" placeholder="RW" value="{{$dataLembaga->rwKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editAreaKetuaKelompok" class="col-sm-3 px-1">Area</label>
                                    <div class="col-sm-9">
                                      <select class="form-select form-select-sm" name="editAreaKetuaKelompok" id="editAreaKetuaKelompok" aria-label=".form-select-sm editAreaKetuaKelompok">
                                        <option value="{{$dataLembaga->areaKK}}"> {{$dataLembaga->areaKK}}</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group-input">
                              <div class="form-header-group mb-3">
                                <h6>KONTAK</h6>
                              </div>
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editNoTelpSKetuaKelompok" class="col-sm-3 px-1">No Telp 1</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editNoTelpSKetuaKelompok" class="form-control form-control-sm" id="editNoTelpSKetuaKelompok" placeholder="cth: +62" value="{{$dataLembaga->no_telpKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editTelpRumahKetuaKelompok" class="col-sm-3 px-1">Telp. Rumah 2</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editTelpRumahKetuaKelompok" class="form-control form-control-sm" id="editTelpRumahKetuaKelompok" placeholder="cth: +622174130258" value="{{$dataLembaga->no_rumahKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editNoHpSKetuaKelompok" class="col-sm-3 px-1">No HP 1</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editNoHpSKetuaKelompok" class="form-control form-control-sm" id="editNoHpSKetuaKelompok" placeholder="cth: +62" value="{{$dataLembaga->no_hpsatuKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editTerimaSMSKetuaKelompok" class="col-sm-3 px-1">Bisa Terima SMS?</label>
                                    <div class="col-sm-9 pt-1">
                                      <div class="form-check form-switch">
                                        <input class="form-check-input" name="editTerimaSMSKetuaKelompok" type="checkbox" id="editTerimaSMSKetuaKelompok" value="Ya" {{$dataLembaga->bisa_smsKK == 'Ya' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="editTerimaSMSKetuaKelompok">Ya</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editNoHpDKetuaKelompok" class="col-sm-3 px-1">No HP 2</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editNoHpDKetuaKelompok" class="form-control form-control-sm" id="editNoHpDKetuaKelompok" placeholder="cth: +62856789456" value="{{$dataLembaga->no_hpduaKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editNoLainKetuaKelompok" class="col-sm-3 px-1">No Lainnya</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editNoLainKetuaKelompok" class="form-control form-control-sm" id="editNoLainKetuaKelompok" placeholder="mis: Pin BB" value="{{$dataLembaga->no_lainnyaKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editFaxKetuaKelompok" class="col-sm-3 px-1">Fax. Rumah</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editFaxKetuaKelompok" class="form-control form-control-sm" id="editFaxKetuaKelompok" placeholder="FAX" value="{{$dataLembaga->fax_rumahKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editEmailKetuaKelompok" class="col-sm-3 px-1">Email</label>
                                    <div class="col-sm-9">
                                      <input type="email" name="editEmailKetuaKelompok" class="form-control form-control-sm" id="editEmailKetuaKelompok" placeholder="cth: email@gmail.com" value="{{$dataLembaga->alamat_surelKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editTerimaEmailKetuaKelompok" class="col-sm-3 px-1">Bisa Terima Email?</label>
                                    <div class="col-sm-9 pt-1">
                                      <div class="form-check form-switch">
                                        <input class="form-check-input" name="editTerimaEmailKetuaKelompok" type="checkbox" id="editTerimaEmailKetuaKelompok" value="Ya" {{$dataLembaga->no_hpsatuKK == 'Ya' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="editTerimaEmailKetuaKelompok">Ya</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editWebsiteKetuaKelompok" class="col-sm-3 px-1">Website</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editWebsiteKetuaKelompok" class="form-control form-control-sm" id="editWebsiteKetuaKelompok" placeholder="cth: Facebook, Twitter, etc" value="{{$dataLembaga->websiteKK}}">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group-input">
                              <div class="form-header-group mb-3">
                                <h6>PEKERJAAN</h6>
                              </div>
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editPekerjaanKetuaKelompok" class="col-sm-3 px-1">Pekerjaan</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select form-select-sm" name="editPekerjaanKetuaKelompok" id="editPekerjaanKetuaKelompok" aria-label=".form-select-sm editPekerjaanKetuaKelompok">
                                          <option value="{{$dataLembaga->pekerjaanKK}}"> {{$dataLembaga->pekerjaanKK}}</option>
                                          @foreach ($pekerjaans as $pekerjaan)
                                            <option value="{{$pekerjaan->nama_pekerjaanPJ}}">{{$pekerjaan->nama_pekerjaanPJ}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="col-1">
                                        <a href="#tambahPekerjaan" data-bs-toggle="modal" class="fs-5">
                                          <i class="bi bi-plus-lg text-success text-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Pekerjaan"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editJabatanKetuaKelompok" class="col-sm-3 px-1">Jabatan Dalam Pekerjaan</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editJabatanKetuaKelompok" class="form-control form-control-sm" id="editJabatanKetuaKelompok" placeholder="cth: Manager, Staff, etc" value="{{$dataLembaga->jabatanKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editStatusPekerjaanKetuaKelompok" class="col-sm-3 px-1">Status Pekerjaan</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select form-select-sm" name="editStatusPekerjaanKetuaKelompok" id="editStatusPekerjaanKetuaKelompok" aria-label=".form-select-sm editStatusPekerjaanKetuaKelompok">
                                          <option value="{{$dataLembaga->status_pekerjaanKK}}"> {{$dataLembaga->status_pekerjaanKK}}</option>
                                          @foreach ($statusPekerjaans as $statusPekerjaan)
                                            <option value="{{$statusPekerjaan->status_pekerjaanSPJ}}">{{$statusPekerjaan->status_pekerjaanSPJ}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="col-1">
                                        <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Status Pekerjaan" class="fs-5">
                                          <i class="bi bi-plus-lg text-success text-center"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editNamaPerusahaanKetuaKelompok" class="col-sm-3 px-1">Nama Perusahaan</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editNamaPerusahaanKetuaKelompok" class="form-control form-control-sm" id="editNamaPerusahaanKetuaKelompok" placeholder="Nama Perusahaan" value="{{$dataLembaga->nama_perusahaanKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editSektorIndustriKetuaKelompok" class="col-sm-3 px-1">Sektor Industri</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select form-select-sm" name="editSektorIndustriKetuaKelompok" id="editSektorIndustriKetuaKelompok" aria-label=".form-select-sm editSektorIndustriKetuaKelompok">
                                          <option value="{{$dataLembaga->sektor_industriKK}}"> {{$dataLembaga->sektor_industriKK}}</option>
                                          @foreach ($sektorIndustris as $sektorIndustri)
                                            <option value="{{$sektorIndustri->sektor_industriSI}}">{{$sektorIndustri->sektor_industriSI}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="col-1">
                                        <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Sektor Industri" class="fs-5">
                                          <i class="bi bi-plus-lg text-success text-center"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editAlamatKantorKetuaKelompok" class="col-sm-3 px-1">Alamat Kantor</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editAlamatKantorKetuaKelompok" class="form-control form-control-sm" id="editAlamatKantorKetuaKelompok" placeholder="Alamat Kantor" value="{{$dataLembaga->alamat_kantorKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editTelpKantorKetuaKelompok" class="col-sm-3 px-1">Telp. Kantor</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editTelpKantorKetuaKelompok" class="form-control form-control-sm" id="editTelpKantorKetuaKelompok" placeholder="cth: +62" value="{{$dataLembaga->telp_kantorKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editExtKetuaKelompok" class="col-sm-3 px-1">Ext.</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editExtKetuaKelompok" class="form-control form-control-sm" id="editExtKetuaKelompok" placeholder="EXT" value="{{$dataLembaga->extKK}}">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group-input">
                              <div class="form-header-group mb-3">
                                <h6>STUDI & MINAT</h6>
                              </div>
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editTingkatPendidikanKetuaKelompok" class="col-sm-3 px-1">Tingkat Pendidikan</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select form-select-sm" name="editTingkatPendidikanKetuaKelompok" id="editTingkatPendidikanKetuaKelompok" aria-label="form-select-sm editTingkatPendidikanKetuaKelompok">
                                          <option value="{{$dataLembaga->tingkat_pendidikanKK}}"> {{$dataLembaga->tingkat_pendidikanKK}}</option>
                                          @foreach ($tingkatPendidikans as $tingkatPendidikan)
                                            <option value="{{$tingkatPendidikan->tingkat_pendidikan}}">{{$tingkatPendidikan->tingkat_pendidikan}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="col-1">
                                        <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Tingkat Pendidikan" class="fs-5">
                                          <i class="bi bi-plus-lg text-success text-center"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editSekolahKetuaKelompok" class="col-sm-3 px-1">Sekolah/Univ (Saat ini Ditempuh)</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select form-select-sm" name="editSekolahKetuaKelompok" id="editSekolahKetuaKelompok" aria-label="form-select-sm editSekolahKetuaKelompok">
                                          <option value="{{$dataLembaga->sekolah_univKK}}"> {{$dataLembaga->sekolah_univKK}}</option>
                                          @foreach ($sekolahUnivs as $sekolahUniv)
                                            <option value="{{$sekolahUniv->sekolah_univ}}">{{$sekolahUniv->sekolah_univ}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="col-1">
                                        <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Sekolah/Univ" class="fs-5">
                                          <i class="bi bi-plus-lg text-success text-center"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editBKetertarikanKetuaKelompok{{$dataLembaga->id}}" class="col-sm-3 px-1">Bidang Ketertarikan</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-control" name="editBKetertarikanKetuaKelompok[]" style="width: 100%;" id="editBKetertarikanKetuaKelompok{{$dataLembaga->id}}" aria-label="multiple select editBKetertarikanKetuaKelompok{{$dataLembaga->id}}" multiple>
                                          <option value="{{$dataLembaga->bidang_ketertarikanKK}}"> {{$dataLembaga->bidang_ketertarikanKK}}</option>
                                          @foreach ($bidKetertarikans as $bidKetertarikan)
                                            <option value="{{$bidKetertarikan->bidang_ketertarikan}}">{{$bidKetertarikan->bidang_ketertarikan}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="col-1">
                                        <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Bidang Ketertarikan" class="fs-5">
                                          <i class="bi bi-plus-lg text-success text-center"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editBKeterampilanKetuaKelompok{{$dataLembaga->id}}" class="col-sm-3 px-1">Bidang Keterampilan</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-control" name="editBKeterampilanKetuaKelompok[]" id="editBKeterampilanKetuaKelompok{{$dataLembaga->id}}" style="width: 100%;" aria-label="multiple select editBKeterampilanKetuaKelompok{{$dataLembaga->id}}" multiple>
                                          <option value="{{$dataLembaga->bidang_keterampilanKK}}"> {{$dataLembaga->bidang_keterampilanKK}}</option>
                                          @foreach ($bidKeterampilans as $bidKeterampilan)
                                            <option value="{{$bidKeterampilan->bidang_keterampilan}}">{{$bidKeterampilan->bidang_keterampilan}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="col-1">
                                        <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Bidang Keterampilan" class="fs-5">
                                          <i class="bi bi-plus-lg text-success text-center"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group-input">
                              <div class="form-header-group mb-3">
                                <h6>CATATAN</h6>
                              </div>
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editCatatanKetuaKelompok" class="col-sm-3 px-1">Catatan</label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control form-control-sm" name="editCatatanKetuaKelompok" id="editCatatanKetuaKelompok" rows="3" placeholder="Catatan"> {{$dataLembaga->catatanKK}}</textarea>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editStatusKetuaKelompok" class="col-sm-3 px-1">Status</label>
                                    <div class="col-sm-9">
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editStatusKetuaKelompok" id="statusAKetuaKelompok" value="Aktif" {{$dataLembaga->statusKK == 'Aktif' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="statusAKetuaKelompok">Aktif</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editStatusKetuaKelompok" id="statusTaKetuaKelompok" value="Tidak Aktif" {{$dataLembaga->statusKK == 'Tidak Aktif' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="statusTaKetuaKelompok">Tidak Aktif</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editVerifEmailKetuaKelompok" class="col-sm-3 px-1">Email Sudah Verifikasi?</label>
                                    <div class="col-sm-9 pt-1">
                                      <div class="form-check form-switch">
                                        <input class="form-check-input" name="editVerifEmailKetuaKelompok" type="checkbox" id="editVerifEmailKetuaKelompok" {{$dataLembaga->verif_emailKK == 'Ya' ? 'checked' : ''}}>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group-input">
                              <div class="form-header-group mb-3">
                                <h6>KOLOM CADANGAN (ISIAN TEKS)</h6>
                              </div>
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editNoRekKetuaKelompok" class="col-sm-3 px-1">Nomor Rekening</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editNoRekKetuaKelompok" class="form-control form-control-sm" id="editNoRekKetuaKelompok" placeholder="123456789" value="{{$dataLembaga->no_rekeningKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editPerBeasiswaKetuaKelompok" class="col-sm-3 px-1">Periode Beasiswa</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editPerBeasiswaKetuaKelompok" class="form-control form-control-sm" id="editPerBeasiswaKetuaKelompok" placeholder="Periode Beasiswa" value="{{$dataLembaga->periode_beasiswaKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editPerKerjaPKetuaKelompok" class="col-sm-3 px-1">Periode Kerja Praktik</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editPerKerjaPKetuaKelompok" class="form-control form-control-sm" id="editPerKerjaPKetuaKelompok" placeholder="Periode Kerja Praktik" value="{{$dataLembaga->periode_kerja_praktikKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editRiwayatPelSKetuaKelompok" class="col-sm-3 px-1">Riwayat Pelayanan 1</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editRiwayatPelSKetuaKelompok" class="form-control form-control-sm" id="editRiwayatPelSKetuaKelompok" placeholder="Riwayat Pelayanan 1" value="{{$dataLembaga->riwayat_pelayananSatuKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editRiwayatPelDKetuaKelompok" class="col-sm-3 px-1">Riwayat Pelayanan 2</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editRiwayatPelDKetuaKelompok" class="form-control form-control-sm" id="editRiwayatPelDKetuaKelompok" placeholder="Riwayat Pelayanan 2" value="{{$dataLembaga->riwayat_pelayananDuaKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editRiwayatPelTKetuaKelompok" class="col-sm-3 px-1">Riwayat Pelayanan 3</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editRiwayatPelTKetuaKelompok" class="form-control form-control-sm" id="editRiwayatPelTKetuaKelompok" placeholder="Riwayat Pelayanan 3" value="{{$dataLembaga->riwayat_pelayananTigaKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editRiwayatPelEKetuaKelompok" class="col-sm-3 px-1">Riwayat Pelayanan 4</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editRiwayatPelEKetuaKelompok" class="form-control form-control-sm" id="editRiwayatPelEKetuaKelompok" placeholder="Riwayat Pelayanan 4" value="{{$dataLembaga->riwayat_pelayananEmpatKK}}">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group-input">
                              <div class="form-header-group mb-3">
                                <h6>KOLOM CADANGAN (PILIHAN)</h6>
                              </div>
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editPilihanSKetuaKelompok" class="col-sm-3 px-1"></label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select form-select-sm" name="editPilihanSKetuaKelompok" id="editPilihanSKetuaKelompok" aria-label=".form-select-sm editPilihanSKetuaKelompok">
                                          <option value="{{$dataLembaga->kolom_cadanganPSatuKK}}"> {{$dataLembaga->kolom_cadanganPSatuKK}}</option>
                                          @foreach ($kc_pilsatus as $kc_pilsatu)
                                            <option value="{{$kc_pilsatu->kc_pilsatu}}">{{$kc_pilsatu->kc_pilsatu}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="col-1">
                                        <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Pilihan Satu" class="fs-5">
                                          <i class="bi bi-plus-lg text-success text-center"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editPilihanDKetuaKelompok" class="col-sm-3 px-1"></label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select form-select-sm" name="editPilihanDKetuaKelompok" id="editPilihanDKetuaKelompok" aria-label=".form-select-sm editPilihanDKetuaKelompok">
                                          <option value="{{$dataLembaga->kolom_cadanganPDuaKK}}"> {{$dataLembaga->kolom_cadanganPDuaKK}}</option>
                                          @foreach ($kc_pilduas as $kc_pildua)
                                            <option value="{{$kc_pildua->kc_pildua}}">{{$kc_pildua->kc_pildua}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="col-1">
                                        <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Pilihan Dua" class="fs-5">
                                          <i class="bi bi-plus-lg text-success text-center"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editPilihanTKetuaKelompok" class="col-sm-3 px-1"></label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select form-select-sm" name="editPilihanTKetuaKelompok" id="editPilihanTKetuaKelompok" aria-label=".form-select-sm editPilihanTKetuaKelompok">
                                          <option value="{{$dataLembaga->kolom_cadanganPTigaKK}}"> {{$dataLembaga->kolom_cadanganPTigaKK}}</option>
                                          @foreach ($kc_piltigas as $kc_piltiga)
                                            <option value="{{$kc_piltiga->kc_piltiga}}">{{$kc_piltiga->kc_piltiga}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="col-1">
                                        <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Pilihan Tiga" class="fs-5">
                                          <i class="bi bi-plus-lg text-success text-center"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editPilihanEKetuaKelompok" class="col-sm-3 px-1"></label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select form-select-sm" name="editPilihanEKetuaKelompok" id="editPilihanEKetuaKelompok" aria-label=".form-select-sm editPilihanEKetuaKelompok">
                                          <option value="{{$dataLembaga->kolom_cadanganPEmpatKK}}"> {{$dataLembaga->kolom_cadanganPEmpatKK}}</option>
                                          @foreach ($kc_pilempats as $kc_pilempat)
                                            <option value="{{$kc_pilempat->kc_pilempat}}">{{$kc_pilempat->kc_pilempat}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="col-1">
                                        <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Pilihan Empat" class="fs-5">
                                          <i class="bi bi-plus-lg text-success text-center"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editPilihanLKetuaKelompok" class="col-sm-3 px-1"></label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select form-select-sm" name="editPilihanLKetuaKelompok" id="editPilihanLKetuaKelompok" aria-label=".form-select-sm editPilihanLKetuaKelompok">
                                          <option value="{{$dataLembaga->kolom_cadanganPLimaKK}}"> {{$dataLembaga->kolom_cadanganPLimaKK}}</option>
                                          @foreach ($kc_pillimas as $kc_pillima)
                                            <option value="{{$kc_pillima->kc_pillima}}">{{$kc_pillima->kc_pillima}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="col-1">
                                        <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Pilihan Lima" class="fs-5">
                                          <i class="bi bi-plus-lg text-success text-center"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editPilihanEnKetuaKelompok" class="col-sm-3 px-1"></label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select form-select-sm" name="editPilihanEnKetuaKelompok" id="editPilihanEnKetuaKelompok" aria-label=".form-select-sm editPilihanEnKetuaKelompok">
                                          <option value="{{$dataLembaga->kolom_cadanganPEnamKK}}"> {{$dataLembaga->kolom_cadanganPEnamKK}}</option>
                                          @foreach ($kc_pilenams as $kc_pilenam)
                                            <option value="{{$kc_pilenam->kc_pilenam}}">{{$kc_pilenam->kc_pilenam}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="col-1">
                                        <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Pilihan Enam" class="fs-5">
                                          <i class="bi bi-plus-lg text-success text-center"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editPilihanTuKetuaKelompok" class="col-sm-3 px-1"></label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select form-select-sm" name="editPilihanTuKetuaKelompok" id="editPilihanTuKetuaKelompok" aria-label=".form-select-sm editPilihanTuKetuaKelompok">
                                          <option value="{{$dataLembaga->kolom_cadanganPTujuhKK}}"> {{$dataLembaga->kolom_cadanganPTujuhKK}}</option>
                                          @foreach ($kc_piltujuhs as $kc_piltujuh)
                                            <option value="{{$kc_piltujuh->kc_piltujuh}}">{{$kc_piltujuh->kc_piltujuh}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="col-1">
                                        <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Pilihan Tujuh" class="fs-5">
                                          <i class="bi bi-plus-lg text-success text-center"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group-input">
                              <div class="form-header-group mb-3">
                                <h6>KOLOM CADANGAN (PILIHAN GANDA)</h6>
                              </div>
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editPilihanGSKetuaKelompok{{$dataLembaga->id}}" class="col-sm-3 px-1">Personality - MBTI</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select" name="editPilihanGSKetuaKelompok[]" style="width: 100%;" id="editPilihanGSKetuaKelompok{{$dataLembaga->id}}" aria-label="multiple select editPilihanGSKetuaKelompok{{$dataLembaga->id}}" multiple>
                                          <option value="{{$dataLembaga->personality_mbtiKK}}">{{$dataLembaga->personality_mbtiKK}}</option>
                                          @foreach ($persMbtis as $persMbti)
                                            <option value="{{$persMbti->mbti}}">{{$persMbti->mbti}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="col-1">
                                        <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Personality - MBTI" class="fs-5">
                                          <i class="bi bi-plus-lg text-success text-center"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editPilihanGDKetuaKelompok{{$dataLembaga->id}}" class="col-sm-3 px-1">Personality - Holland</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select" name="editPilihanGDKetuaKelompok[]" style="width: 100%;" id="editPilihanGDKetuaKelompok{{$dataLembaga->id}}" aria-label="multiple select editPilihanGDKetuaKelompok{{$dataLembaga->id}}" multiple>
                                          <option value="{{$dataLembaga->personality_hollandKK}}">{{$dataLembaga->personality_hollandKK}}</option>
                                          @foreach ($persHollands as $persHolland)
                                            <option value="{{$persHolland->holland}}">{{$persHolland->holland}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="col-1">
                                        <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Personality - Holland" class="fs-5">
                                          <i class="bi bi-plus-lg text-success text-center"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editPilihanGTKetuaKelompok{{$dataLembaga->id}}" class="col-sm-3 px-1">Spiritual Gifts</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select" name="editPilihanGTKetuaKelompok[]" style="width: 100%;" id="editPilihanGTKetuaKelompok{{$dataLembaga->id}}" aria-label="multiple select editPilihanGTKetuaKelompok{{$dataLembaga->id}}" multiple>
                                          <option value="{{$dataLembaga->spiritual_giftsKK}}">{{$dataLembaga->spiritual_giftsKK}}</option>
                                          @foreach ($spiritGifts as $spiritGift)
                                            <option value="{{$spiritGift->gifts}}">{{$spiritGift->gifts}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="col-1">
                                        <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Spiritual Gifts" class="fs-5">
                                          <i class="bi bi-plus-lg text-success text-center"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editPilihanGEKetuaKelompok{{$dataLembaga->id}}" class="col-sm-3 px-1">Abilities</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select" name="editPilihanGEKetuaKelompok[]" style="width: 100%;" id="editPilihanGEKetuaKelompok{{$dataLembaga->id}}" aria-label="multiple select editPilihanGEKetuaKelompok{{$dataLembaga->id}}" multiple>
                                          <option value="{{$dataLembaga->abilitiesKK}}">{{$dataLembaga->abilitiesKK}}</option>
                                          @foreach ($abilities as $ability)
                                            <option value="{{$ability->abilities}}">{{$ability->abilities}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="col-1">
                                        <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Abilities" class="fs-5">
                                          <i class="bi bi-plus-lg text-success text-center"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editPilihanGLKetuaKelompok{{$dataLembaga->id}}" class="col-sm-3 px-1">Ganda 5</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select" name="editPilihanGLKetuaKelompok[]" style="width: 100%;" id="editPilihanGLKetuaKelompok{{$dataLembaga->id}}" aria-label="multiple select editPilihanGLKetuaKelompok{{$dataLembaga->id}}" multiple>
                                          <option value="{{$dataLembaga->kolom_cadanganPGLimaKK}}">{{$dataLembaga->kolom_cadanganPGLimaKK}}</option>
                                          @foreach ($gandaLimas as $gandaLima)
                                            <option value="{{$gandaLima->ganda_lima}}">{{$gandaLima->ganda_lima}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="col-1">
                                        <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Ganda 5" class="fs-5">
                                          <i class="bi bi-plus-lg text-success text-center"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editPilihanGEnKetuaKelompok{{$dataLembaga->id}}" class="col-sm-3 px-1">Kemampuan Bahasa</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select" name="editPilihanGEnKetuaKelompok[]" style="width: 100%;" id="editPilihanGEnKetuaKelompok{{$dataLembaga->id}}" aria-label="multiple select editPilihanGEnKetuaKelompok{{$dataLembaga->id}}" multiple>
                                          <option value="{{$dataLembaga->kemampuan_bahasaKK}}">{{$dataLembaga->kemampuan_bahasaKK}}</option>
                                          @foreach ($kemBahasas as $kemBahasa)
                                            <option value="{{$kemBahasa->kem_bahasa}}">{{$kemBahasa->kem_bahasa}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="col-1">
                                        <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Kemampuan Bahasa" class="fs-5">
                                          <i class="bi bi-plus-lg text-success text-center"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editPilihanGTuKetuaKelompok{{$dataLembaga->id}}" class="col-sm-3 px-1">Pernah menderita penyakit</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select" name="editPilihanGTuKetuaKelompok[]" style="width: 100%;" id="editPilihanGTuKetuaKelompok{{$dataLembaga->id}}" aria-label="multiple select editPilihanGTuKetuaKelompok{{$dataLembaga->id}}" multiple>
                                          <option value="{{$dataLembaga->penyakitKK}}">{{$dataLembaga->penyakitKK}}</option>
                                         
                                        </select>
                                      </div>
                                      <div class="col-1">
                                        <a href=""  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah List Penyakit" class="fs-5">
                                          <i class="bi bi-plus-lg text-success text-center"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group-input">
                              <div class="form-header-group mb-3">
                                <h6>KOLOM CADANGAN (CHECK BOX)</h6>
                              </div>
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editCheckSKetuaKelompok" class="col-sm-3 px-1"></label>
                                    <div class="col-sm-9 pt-1">
                                      <div class="form-check form-switch">
                                        <input class="form-check-input" name="editCheckSKetuaKelompok" type="checkbox" id="editCheckSKetuaKelompok" value="Ya" {{$dataLembaga->kolom_cadanganCBSatuKK == 'Ya' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="editCheckSKetuaKelompok">Ya</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editCheckDKetuaKelompok" class="col-sm-3 px-1"></label>
                                    <div class="col-sm-9 pt-1">
                                      <div class="form-check form-switch">
                                        <input class="form-check-input" name="editCheckDKetuaKelompok" type="checkbox" id="editCheckDKetuaKelompok" value="Ya" {{$dataLembaga->kolom_cadanganCBDuaKK == 'Ya' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="editCheckDKetuaKelompok">Ya</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editCheckTKetuaKelompok" class="col-sm-3 px-1"></label>
                                    <div class="col-sm-9 pt-1">
                                      <div class="form-check form-switch">
                                        <input class="form-check-input" name="editCheckTKetuaKelompok" type="checkbox" id="editCheckTKetuaKelompok" value="Ya" {{$dataLembaga->kolom_cadanganCBTigaKK == 'Ya' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="editCheckTKetuaKelompok">Ya</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editCheckEKetuaKelompok" class="col-sm-3 px-1"></label>
                                    <div class="col-sm-9 pt-1">
                                      <div class="form-check form-switch">
                                        <input class="form-check-input" name="editCheckEKetuaKelompok" type="checkbox" id="editCheckEKetuaKelompok" value="Ya" {{$dataLembaga->kolom_cadanganCBEmpatKK == 'Ya' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="editCheckEKetuaKelompok">Ya</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editCheckLKetuaKelompok" class="col-sm-3 px-1"></label>
                                    <div class="col-sm-9 pt-1">
                                      <div class="form-check form-switch">
                                        <input class="form-check-input" name="editCheckLKetuaKelompok" type="checkbox" id="editCheckLKetuaKelompok" value="Ya" {{$dataLembaga->kolom_cadanganCBLimaKK == 'Ya' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="editCheckLKetuaKelompok">Ya</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editCheckEnKetuaKelompok" class="col-sm-3 px-1"></label>
                                    <div class="col-sm-9 pt-1">
                                      <div class="form-check form-switch">
                                        <input class="form-check-input" name="editCheckEnKetuaKelompok" type="checkbox" id="editCheckEnKetuaKelompok" value="Ya" {{$dataLembaga->kolom_cadanganCBEnamKK == 'Ya' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="editCheckEnKetuaKelompok">Ya</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editCheckTuKetuaKelompok" class="col-sm-3 px-1"></label>
                                    <div class="col-sm-9 pt-1">
                                      <div class="form-check form-switch">
                                        <input class="form-check-input" name="editCheckTuKetuaKelompok" type="checkbox" id="editCheckTuKetuaKelompok" value="Ya" {{$dataLembaga->kolom_cadanganCBTujuhKK == 'Ya' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="editCheckTuKetuaKelompok">Ya</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group-input">
                              <div class="form-header-group mb-3">
                                <h6>TANGGAL PENTING</h6>
                              </div>
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="" class="col-sm-3 px-1">Baptis Anak</label>
                                    <div class="col-sm-9">
                                      <label for="" class="">Sudah?</label>
                                      <div class="form-check">
                                        <input class="form-check-input" name="editSudahBaptisAnakKetuaKelompok" type="checkbox" value="" id="editSudahBaptisAnakKetuaKelompok" {{$dataLembaga->ba_sudahKK == 'Sudah' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editSudahBaptisAnakKetuaKelompok">
                                          Sudah
                                        </label>
                                      </div>
                                      <hr>
                                      <label for="editTglBaptisAnakKetuaKelompok" class="">Tanggal</label>
                                      <input type="date" name="editTglBaptisAnakKetuaKelompok" class="form-control form-control-sm" id="editTglBaptisAnakKetuaKelompok" value="{{$dataLembaga->ba_tanggalKK}}">
                                      <hr>
                                      <label for="" class="">Tempat</label><br>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatBaptisAnakKetuaKelompok" id="editTempatBaptisAnakKetuaKelompok" value="Gereja Lokal" {{$dataLembaga->ba_tempatKK == 'Gereja Lokal' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatBaptisAnakKetuaKelompok">Gereja Lokal</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatBaptisAnakKetuaKelompok" id="editTempatBaptisAnakLKetuaKelompok" value="Gereja Lain" {{$dataLembaga->ba_tempatKK == 'Gereja Lain' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatBaptisAnakLKetuaKelompok">Gereja Lain</label>
                                      </div>
                                      <hr>
                                      <label for="editFileUploadBaptisAnakKetuaKelompok" class="">File</label>
                                      <input type="file" name="editFileUploadBaptisAnakKetuaKelompok" class="form-control form-control-sm" id="editFileUploadBaptisAnakKetuaKelompok" value="{{$dataLembaga->ba_fileKK}}">
                                      @error('editFileUploadBaptisAnakKetuaKelompok')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                      <hr>
                                      <label for="editKetBaptisAnakKetuaKelompok" class="">Keterangan</label>
                                      <textarea class="form-control form-control-sm" name="editKetBaptisAnakKetuaKelompok" id="editKetBaptisAnakKetuaKelompok" rows="3" placeholder="Keterangan">{{$dataLembaga->ba_ketKK}}</textarea>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <hr>
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="" class="col-sm-3 px-1">Menikah</label>
                                    <div class="col-sm-9">
                                      <label for="" class="">Sudah?</label>
                                      <div class="form-check">
                                        <input class="form-check-input" name="editSudahMenikahKetuaKelompok" type="checkbox" value="" id="editSudahMenikahKetuaKelompok" {{$dataLembaga->menikah_sudahKK == 'Sudah' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editSudahMenikahKetuaKelompok">
                                          Sudah
                                        </label>
                                      </div>
                                      <hr>
                                      <label for="editTglMenikahKetuaKelompok" class="">Tanggal</label>
                                      <input type="date" name="editTglMenikahKetuaKelompok" class="form-control form-control-sm" id="editTglMenikahKetuaKelompok" value="{{$dataLembaga->menikah_tanggalKK}}">
                                      <hr>
                                      <label for="" class="">Tempat</label><br>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatMenikahKetuaKelompok" id="editTempatMenikahKetuaKelompok" value="Gereja Lokal" {{$dataLembaga->menikah_tempatKK == 'Gereja Lokal' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatMenikahKetuaKelompok">Gereja Lokal</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatMenikahKetuaKelompok" id="editTempatMenikahLKetuaKelompok" value="Gereja Lain" {{$dataLembaga->menikah_tempatKK == 'Gereja Lain' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatMenikahLKetuaKelompok">Gereja Lain</label>
                                      </div>
                                      <hr>
                                      <label for="editFileUploadMenikahKetuaKelompok" class="">File</label>
                                      <input type="file" name="editFileUploadMenikahKetuaKelompok" class="form-control form-control-sm" id="editFileUploadMenikahKetuaKelompok" value="{{$dataLembaga->menikah_fileKK}}">
                                      @error('editFileUploadMenikahKetuaKelompok')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                      <hr>
                                      <label for="editKetMenikahKetuaKelompok" class="">Keterangan</label>
                                      <textarea class="form-control form-control-sm" name="editKetMenikahKetuaKelompok" id="editKetMenikahKetuaKelompok" rows="3" placeholder="Keterangan">{{$dataLembaga->menikah_ketKK}}</textarea>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <hr>
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="" class="col-sm-3 px-1">Baptis</label>
                                    <div class="col-sm-9">
                                      <label for="" class="">Sudah?</label>
                                      <div class="form-check">
                                        <input class="form-check-input" name="editSudahBaptisKetuaKelompok" type="checkbox" value="" id="editSudahBaptisKetuaKelompok" {{$dataLembaga->bap_sudahKK == 'Sudah' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editSudahBaptisKetuaKelompok">
                                          Sudah
                                        </label>
                                      </div>
                                      <hr>
                                      <label for="editTglBaptisKetuaKelompok" class="">Tanggal</label>
                                      <input type="date" name="editTglBaptisKetuaKelompok" class="form-control form-control-sm" id="editTglBaptisKetuaKelompok" value="{{$dataLembaga->bap_tanggalKK}}">
                                      <hr>
                                      <label for="" class="">Tempat</label><br>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatBaptisKetuaKelompok" id="editTempatBaptisKetuaKelompok" value="Gereja Lokal" {{$dataLembaga->bap_tempatKK == 'Gereja Lokal' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatBaptisKetuaKelompok">Gereja Lokal</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatBaptisKetuaKelompok" id="editTempatBaptisLKetuaKelompok" value="Gereja Lain" {{$dataLembaga->bap_tempatKK == 'Gereja Lain' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatBaptisLKetuaKelompok">Gereja Lain</label>
                                      </div>
                                      <hr>
                                      <label for="editFileUploadBaptisKetuaKelompok" class="">File</label>
                                      <input type="file" name="editFileUploadBaptisKetuaKelompok" class="form-control form-control-sm" id="editFileUploadBaptisKetuaKelompok" value="{{$dataLembaga->bap_fileKK}}">
                                      @error('editFileUploadBaptisKetuaKelompok')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                      <hr>
                                      <label for="editKetBaptisKetuaKelompok" class="">Keterangan</label>
                                      <textarea class="form-control form-control-sm" name="editKetBaptisKetuaKelompok" id="editKetBaptisKetuaKelompok" rows="3" placeholder="Keterangan">{{$dataLembaga->bap_ketKK}}</textarea>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <hr>
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="" class="col-sm-3 px-1">Meninggal Dunia</label>
                                    <div class="col-sm-9">
                                      <label for="" class="">Sudah?</label>
                                      <div class="form-check">
                                        <input class="form-check-input" name="editSudahMeninggalDuniaKetuaKelompok" type="checkbox" value="" id="editSudahMeninggalDuniaKetuaKelompok" {{$dataLembaga->md_sudahKK == 'Sudah' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editSudahMeninggalDuniaKetuaKelompok">
                                          Sudah
                                        </label>
                                      </div>
                                      <hr>
                                      <label for="editTglMeninggalDuniaKetuaKelompok" class="">Tanggal</label>
                                      <input type="date" name="editTglMeninggalDuniaKetuaKelompok" class="form-control form-control-sm" id="editTglMeninggalDuniaKetuaKelompok" value="{{$dataLembaga->md_tanggalKK}}">
                                      <hr>
                                      <label for="" class="">Tempat</label><br>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatMeninggalDuniaKetuaKelompok" id="editTempatMeninggalDuniaKetuaKelompok" value="Gereja Lokal" {{$dataLembaga->md_tempatKK == 'Gereja Lokal' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatMeninggalDuniaKetuaKelompok">Gereja Lokal</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatMeninggalDuniaKetuaKelompok" id="editTempatMeninggalDuniaLKetuaKelompok" value="Gereja Lain" {{$dataLembaga->md_tempatKK == 'Gereja Lain' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatMeninggalDuniaLKetuaKelompok">Gereja Lain</label>
                                      </div>
                                      <hr>
                                      <label for="editFileUploadMeninggalDuniaKetuaKelompok" class="">File</label>
                                      <input type="file" name="editFileUploadMeninggalDuniaKetuaKelompok" class="form-control form-control-sm" id="editFileUploadMeninggalDuniaKetuaKelompok" value="{{$dataLembaga->md_fileKK}}">
                                      @error('editFileUploadMeninggalDuniaKetuaKelompok')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                      <hr>
                                      <label for="editKetMeninggalDuniaKetuaKelompok" class="">Keterangan</label>
                                      <textarea class="form-control form-control-sm" name="editKetMeninggalDuniaKetuaKelompok" id="editKetMeninggalDuniaKetuaKelompok" rows="3" placeholder="Keterangan">{{$dataLembaga->md_ketKK}}</textarea>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <hr>
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="" class="col-sm-3 px-1">Penyerahan Anak</label>
                                    <div class="col-sm-9">
                                      <label for="" class="">Sudah?</label>
                                      <div class="form-check">
                                        <input class="form-check-input" name="editSudahPenyerahanAnakKetuaKelompok" type="checkbox" value="" id="editSudahPenyerahanAnakKetuaKelompok" {{$dataLembaga->pa_sudahKK == 'Sudah' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editSudahPenyerahanAnakKetuaKelompok">
                                          Sudah
                                        </label>
                                      </div>
                                      <hr>
                                      <label for="editTglPenyerahanAnakKetuaKelompok" class="">Tanggal</label>
                                      <input type="date" name="editTglPenyerahanAnakKetuaKelompok" class="form-control form-control-sm" id="editTglPenyerahanAnakKetuaKelompok" value="{{$dataLembaga->pa_tanggalKK}}">
                                      <hr>
                                      <label for="" class="">Tempat</label><br>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatPenyerahanAnakKetuaKelompok" id="editTempatPenyerahanAnakKetuaKelompok" value="Gereja Lokal" {{$dataLembaga->pa_tempatKK == 'Gereja Lokal' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatPenyerahanAnakKetuaKelompok">Gereja Lokal</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatPenyerahanAnakKetuaKelompok" id="editTempatPenyerahanAnakLKetuaKelompok" value="Gereja Lain" {{$dataLembaga->pa_tempatKK == 'Gereja Lain' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatPenyerahanAnakLKetuaKelompok">Gereja Lain</label>
                                      </div>
                                      <hr>
                                      <label for="editFileUploadPenyerahanAnakKetuaKelompok" class="">File</label>
                                      <input type="file" name="editFileUploadPenyerahanAnakKetuaKelompok" class="form-control form-control-sm" id="editFileUploadPenyerahanAnakKetuaKelompok" value="{{$dataLembaga->pa_fileKK}}">
                                      @error('editFileUploadPenyerahanAnakKetuaKelompok')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                      <hr>
                                      <label for="editKetPenyerahanAnakKetuaKelompok" class="">Keterangan</label>
                                      <textarea class="form-control form-control-sm" name="editKetPenyerahanAnakKetuaKelompok" id="editKetPenyerahanAnakKetuaKelompok" rows="3" placeholder="Keterangan">{{$dataLembaga->pa_ketKK}}</textarea>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <hr>
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="" class="col-sm-3 px-1">Evangelism Explosion</label>
                                    <div class="col-sm-9">
                                      <label for="" class="">Sudah?</label>
                                      <div class="form-check">
                                        <input class="form-check-input" name="editSudahEvangelismExplosionKetuaKelompok" type="checkbox" value="" id="editSudahEvangelismExplosionKetuaKelompok" {{$dataLembaga->ee_sudahKK == 'Sudah' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editSudahEvangelismExplosionKetuaKelompok">
                                          Sudah
                                        </label>
                                      </div>
                                      <hr>
                                      <label for="editTglEvangelismExplosionKetuaKelompok" class="">Tanggal</label>
                                      <input type="date" name="editTglEvangelismExplosionKetuaKelompok" class="form-control form-control-sm" id="editTglEvangelismExplosionKetuaKelompok" value="{{$dataLembaga->ee_tanggalKK}}">
                                      <hr>
                                      <label for="" class="">Tempat</label><br>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatEvangelismExplosionKetuaKelompok" id="editTempatEvangelismExplosionKetuaKelompok" value="Gereja Lokal" {{$dataLembaga->ee_tempatKK == 'Gereja Lokal' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatEvangelismExplosionKetuaKelompok">Gereja Lokal</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatEvangelismExplosionKetuaKelompok" id="editTempatEvangelismExplosionLKetuaKelompok" value="Gereja Lain" {{$dataLembaga->ee_tempatKK == 'Gereja Lain' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatEvangelismExplosionLKetuaKelompok">Gereja Lain</label>
                                      </div>
                                      <hr>
                                      <label for="editFileUploadEvangelismExplosionKetuaKelompok" class="">File</label>
                                      <input type="file" name="editFileUploadEvangelismExplosionKetuaKelompok" class="form-control form-control-sm" id="editFileUploadEvangelismExplosionKetuaKelompok" value="{{$dataLembaga->ee_fileKK}}">
                                      @error('editFileUploadEvangelismExplosionKetuaKelompok')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                      <hr>
                                      <label for="editKetEvangelismExplosionKetuaKelompok" class="">Keterangan</label>
                                      <textarea class="form-control form-control-sm" name="editKetEvangelismExplosionKetuaKelompok" id="editKetEvangelismExplosionKetuaKelompok" rows="3" placeholder="Keterangan">{{$dataLembaga->ee_ketKK}}</textarea>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <hr>
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="" class="col-sm-3 px-1">Tgl Berakhir Ikatan Dinas</label>
                                    <div class="col-sm-9">
                                      <label for="" class="">Sudah?</label>
                                      <div class="form-check">
                                        <input class="form-check-input" name="editSudahIkatanDinasKetuaKelompok" type="checkbox" value="" id="editSudahIkatanDinasKetuaKelompok" {{$dataLembaga->bid_sudahKK == 'Sudah' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editSudahIkatanDinasKetuaKelompok">
                                          Sudah
                                        </label>
                                      </div>
                                      <hr>
                                      <label for="editTglIkatanDinasKetuaKelompok" class="">Tanggal</label>
                                      <input type="date" name="editTglIkatanDinasKetuaKelompok" class="form-control form-control-sm" id="editTglIkatanDinasKetuaKelompok" value="{{$dataLembaga->bid_tanggalKK}}">
                                      <hr>
                                      <label for="" class="">Tempat</label><br>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatIkatanDinasKetuaKelompok" id="editTempatIkatanDinasKetuaKelompok" value="Gereja Lokal" {{$dataLembaga->bid_tempatKK == 'Gereja Lokal' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatIkatanDinasKetuaKelompok">Gereja Lokal</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatIkatanDinasKetuaKelompok" id="editTempatIkatanDinasLKetuaKelompok" value="Gereja Lain" {{$dataLembaga->bid_tempatKK == 'Gereja Lain' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatIkatanDinasLKetuaKelompok">Gereja Lain</label>
                                      </div>
                                      <hr>
                                      <label for="editFileUploadIkatanDinasKetuaKelompok" class="">File</label>
                                      <input type="file" name="editFileUploadIkatanDinasKetuaKelompok" class="form-control form-control-sm" id="editFileUploadIkatanDinasKetuaKelompok" value="{{$dataLembaga->bid_fileKK}}">
                                      @error('editFileUploadIkatanDinasKetuaKelompok')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                      <hr>
                                      <label for="editKetIkatanDinasKetuaKelompok" class="">Keterangan</label>
                                      <textarea class="form-control form-control-sm" name="editKetIkatanDinasKetuaKelompok" id="editKetIkatanDinasKetuaKelompok" rows="3" placeholder="Keterangan">{{$dataLembaga->bid_ketKK}}</textarea>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <hr>
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="" class="col-sm-3 px-1">Praktek 2 Tahun</label>
                                    <div class="col-sm-9">
                                      <label for="" class="">Sudah?</label>
                                      <div class="form-check">
                                        <input class="form-check-input" name="editSudahPrktkDuaThnKetuaKelompok" type="checkbox" value="" id="editSudahPrktkDuaThnKetuaKelompok" {{$dataLembaga->pdt_sudahKK == 'Sudah' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editSudahPrktkDuaThnKetuaKelompok">
                                          Sudah
                                        </label>
                                      </div>
                                      <hr>
                                      <label for="editTglPrktkDuaThnKetuaKelompok" class="">Tanggal</label>
                                      <input type="date" name="editTglPrktkDuaThnKetuaKelompok" class="form-control form-control-sm" id="editTglPrktkDuaThnKetuaKelompok" value="{{$dataLembaga->pdt_tanggalKK}}">
                                      <hr>
                                      <label for="" class="">Tempat</label><br>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatPrktkDuaThnKetuaKelompok" id="editTempatPrktkDuaThnKetuaKelompok" value="Gereja Lokal" {{$dataLembaga->pdt_tempatKK == 'Gereja Lokal' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatPrktkDuaThnKetuaKelompok">Gereja Lokal</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatPrktkDuaThnKetuaKelompok" id="editTempatPrktkDuaThnLKetuaKelompok" value="Gereja Lain" {{$dataLembaga->pdt_tempatKK == 'Gereja Lain' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatPrktkDuaThnLKetuaKelompok">Gereja Lain</label>
                                      </div>
                                      <hr>
                                      <label for="editFileUploadPrktkDuaThnKetuaKelompok" class="">File</label>
                                      <input type="file" name="editFileUploadPrktkDuaThnKetuaKelompok" class="form-control form-control-sm" id="editFileUploadPrktkDuaThnKetuaKelompok" value="{{$dataLembaga->pdt_fileKK}}">
                                      @error('editFileUploadPrktkDuaThnKetuaKelompok')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                      <hr>
                                      <label for="editKetPrktkDuaThnKetuaKelompok" class="">Keterangan</label>
                                      <textarea class="form-control form-control-sm" name="editKetPrktkDuaThnKetuaKelompok" id="editKetPrktkDuaThnKetuaKelompok" rows="3" placeholder="Keterangan">{{$dataLembaga->pdt_ketKK}}</textarea>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group-input">
                              <div class="form-header-group mb-3">
                                <h6>KEANGGOTAN GRUP</h6>
                              </div>
                              <div class="input-center px-3">
                                <div class="">
                                  <div class="mb-3 row">
                                    <div class="col-3">
                                      <label for="editNamaGrupKetuaKelompok" class="">Nama Grup</label>
                                      <select class="form-select form-select-sm" name="editNamaGrupKetuaKelompok" id="editNamaGrupKetuaKelompok" aria-label=".form-select-sm editNamaGrupKetuaKelompok">
                                        <option value="{{$dataLembaga->nama_grupKK}}">{{$dataLembaga->nama_grupKK}}</option>
                                      </select>
                                    </div>
                                    <div class="col-3">
                                      <label for="editJbtnGrupKetuaKelompok" class="">Jabatan Dalam Grup</label>
                                      <select class="form-select form-select-sm" name="editJbtnGrupKetuaKelompok" id="editJbtnGrupKetuaKelompok" aria-label=".form-select-sm editJbtnGrupKetuaKelompok">
                                        <option value="{{$dataLembaga->jbt_grupKK}}">{{$dataLembaga->jbt_grupKK}}</option>
                                      </select>
                                    </div>
                                    <div class="col-3">
                                      <label for="editTglGabungKetuaKelompok" class="">Tanggal Bergabung</label>
                                      <input type="date" name="editTglGabungKetuaKelompok" class="form-control form-control-sm" id="editTglGabungKetuaKelompok" value="{{$dataLembaga->tgl_gabung_grupKK}}">
                                    </div>
                                    <div class="col-3">
                                      <label for="editCttnMasukKetuaKelompok" class="">Catatan Masuk</label>
                                      <textarea class="form-control form-control-sm" name="editCttnMasukKetuaKelompok" id="editCttnMasukKetuaKelompok" rows="3" placeholder="Catatan Masuk Grup">{{$dataLembaga->catatan_masuk_grupKK}}</textarea>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group-input">
                              <div class="form-header-group mb-3">
                                <h6>Kata Sandi</h6>
                              </div>
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="kata_sandiLamaKetuaKelompok" class="col-sm-3 px-1">Masukkan Kata Sandi Lama</label>
                                    <div class="col-sm-9">
                                      <input class="form-control form-control-sm" type="password" name="kata_sandiLamaKetuaKelompok" id="kata_sandiLamaKetuaKelompok" rows="3" placeholder="********">
                                      @error('kata_sandiLamaKetuaKelompok')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editKata_sandiKetuaKelompok" class="col-sm-3 px-1">Kata Sandi</label>
                                    <div class="col-sm-9">
                                      <input class="form-control form-control-sm" type="password" name="editKata_sandiKetuaKelompok" id="editKata_sandiKetuaKelompok" rows="3" placeholder="********">
                                      @error('editKata_sandiKetuaKelompok')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="konfirmasi_editKata_sandiKetuaKelompok" class="col-sm-3 px-1">Konfirmasi Kata Sandi</label>
                                    <div class="col-sm-9">
                                      <input class="form-control form-control-sm" type="password" name="konfirmasi_editKata_sandiKetuaKelompok" id="konfirmasi_editKata_sandiKetuaKelompok" rows="3" placeholder="********">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer mt-2">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                              <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal Ubah Data -->
                  <!-- Modal Hapus Data -->
                  <div class="modal fade" id="hapusData{{$dataLembaga->id_user}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusData{{$dataLembaga->id_user}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusData{{$dataLembaga->id_user}}Label">
                            <i class="bi bi-trash text-danger"></i>
                            Hapus Data Ketua Kelompok
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('ketua-kelompok.destroyPengurusPM', $dataLembaga->id_user) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                            <p>Apa anda yakin ingin menghapus Ketua Lokasi {{$dataLembaga->nama_lengkapKK}} ini?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal Hapus Data -->
                  <!-- Modal Lihat Kelompok -->
                  <div class="modal fade" id="kelompokModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="kelompokLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="kelompokLabel">
                            <i class="bi bi-people text-primary"></i>
                            Kelompok
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-1">
                              No.
                            </div>
                            <div class="col-3">
                              ID Kelompok
                            </div>
                            <div class="col-4">
                              Nama Kelompok
                            </div>
                            <div class="col-3">
                              Tanggal Pembuatan
                            </div>
                          </div>
                          <hr>
                          <div id="namaKelompok"></div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal Lihat Kelompok -->
                @empty
                <div class="alert alert-danger">
                  Data Tidak Ada
                </div>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('javascript')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/i18n/id.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#bKetertarikanKetuaKelompok').select2({
        placeholder: "Pilih Bidang Ketertarikan",
        allowClear: true,
        language: "id",
        dropdownParent: $("#tambahData")
      });

      
      $('#bKeterampilanKetuaKelompok').select2({
        placeholder: "Pilih Bidang Keterampilan",
        allowClear: true,
        language: "id",
        dropdownParent: $("#tambahData")
      });

      
      $('#pilihanGSKetuaKelompok').select2({
        placeholder: "Personality - MBTI",
        allowClear: true,
        language: "id",
        dropdownParent: $("#tambahData")
      });

      
      $('#pilihanGDKetuaKelompok').select2({
        placeholder: "Personality - Holland",
        allowClear: true,
        language: "id",
        dropdownParent: $("#tambahData")
      });

      
      $('#pilihanGTKetuaKelompok').select2({
        placeholder: "Spiritual Gifts",
        allowClear: true,
        language: "id",
        dropdownParent: $("#tambahData")
      });

      
      $('#pilihanGEKetuaKelompok').select2({
        placeholder: "Abilities",
        allowClear: true,
        language: "id",
        dropdownParent: $("#tambahData")
      });

      
      $('#pilihanGLKetuaKelompok').select2({
        placeholder: "Pilihan Ganda Lima",
        allowClear: true,
        language: "id",
        dropdownParent: $("#tambahData")
      });

      
      $('#pilihanGEnKetuaKelompok').select2({
        placeholder: "Kemampuan Bahasa",
        allowClear: true,
        language: "id",
        dropdownParent: $("#tambahData")
      });

      
      $('#pilihanGTuKetuaKelompok').select2({
        placeholder: "Pernah Menderita Penyakit",
        allowClear: true,
        language: "id",
        dropdownParent: $("#tambahData")
      });

    });
      // Edit


    
      $(document).on('click', '#ubahData', function () {
        var idUser = $(this).attr('data-user');
        console.log(idUser);
        $('#editBKetertarikanKetuaKelompok'+idUser).select2({
          placeholder: "Pilih Bidang Ketertarikan",
          allowClear: true,
          language: "id",
          dropdownParent: $("#ubahData"+idUser)
        });

        
        $('#editBKeterampilanKetuaKelompok'+idUser).select2({
          placeholder: "Pilih Bidang Keterampilan",
          allowClear: true,
          language: "id",
          dropdownParent: $("#ubahData"+idUser)
        });

        
        $('#editPilihanGSKetuaKelompok'+idUser).select2({
          placeholder: "Personality - MBTI",
          allowClear: true,
          language: "id",
          dropdownParent: $("#ubahData"+idUser)
        });

        
        $('#editPilihanGDKetuaKelompok'+idUser).select2({
          placeholder: "Personality - Holland",
          allowClear: true,
          language: "id",
          dropdownParent: $("#ubahData"+idUser)
        });

        
        $('#editPilihanGTKetuaKelompok'+idUser).select2({
          placeholder: "Spiritual Gifts",
          allowClear: true,
          language: "id",
          dropdownParent: $("#ubahData"+idUser)
        });

        
        $('#editPilihanGEKetuaKelompok'+idUser).select2({
          placeholder: "Abilities",
          allowClear: true,
          language: "id",
          dropdownParent: $("#ubahData"+idUser)
        });

        
        $('#editPilihanGLKetuaKelompok'+idUser).select2({
          placeholder: "Pilihan Ganda Lima",
          allowClear: true,
          language: "id",
          dropdownParent: $("#ubahData"+idUser)
        });

        
        $('#editPilihanGEnKetuaKelompok'+idUser).select2({
          placeholder: "Kemampuan Bahasa",
          allowClear: true,
          language: "id",
          dropdownParent: $("#ubahData"+idUser)
        });

        
        $('#editPilihanGTuKetuaKelompok'+idUser).select2({
          placeholder: "Pernah Menderita Penyakit",
          allowClear: true,
          language: "id",
          dropdownParent: $("#ubahData"+idUser)
        });
      });
    
    $(document).on('click', '#lihatKelompokButton', function(event) {
      event.preventDefault();
      var href = $(this).data('attr');
      var id = $(this).data('id');
      $.get(href, function(result) {
        no = 1;
        html = '';
        $.each(result.namaKelompok, function(index, hasil) {
          $('#kelompokModal').modal("show");
          nos = no++;
          html += '<div class="row">';
          html += '<div class="col-1">'+nos+'.</div>';
          html += '<div class="col-3">'+hasil.id_kelompok+'</div>';
          html += '<div class="col-4">'+hasil.nama_kelompok+'</div>';
          html += '<div class="col-3">'+hasil.created_at+'</div>';
          html += '</div>';
          html += '<hr>';
        });
        $('#namaKelompok').empty('').append(html);
      });
    });
  </script>
@endsection