@extends('layout.app')

@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
@endsection

@section('nav')
@endsection

@section('menu')
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('admin')}}">
      <i class="bi bi-house"></i>
      <span>Beranda</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#data-master" data-bs-toggle="collapse" href="#">
      <i class="bi bi-list"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="data-master" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{route('data-lokasi.index')}}">
          <i class="bi bi-geo-alt"></i><span>Data Lokasi</span>
        </a>
      </li>
      <li>
        <a href="{{route('artikel-modul.index')}}">
          <i class="bi bi-journal-text"></i><span>Artikel/Modul</span>
        </a>
      </li>
      <li>
        <a href="{{route('video.index')}}">
          <i class="bi bi-play"></i><span>Video Youtube</span>
        </a>
      </li>
      <li>
        <a href="{{route('pekerjaan.index')}}">
          <i class="bi bi-person-workspace"></i><span>Pekerjaan</span>
        </a>
      </li>
      <li>
        <a href="{{route('studi-minat.index')}}">
          <i class="bi bi-book"></i><span>Studi & Minat</span>
        </a>
      </li>
      <li>
        <a href="{{route('kolom-pilihan.index')}}">
          <i class="bi bi-ui-checks-grid"></i><span>Kolom Cadangan (Pilihan)</span>
        </a>
      </li>
      <li>
        <a href="{{route('shape.index')}}">
          <i class="bi bi-suit-heart"></i><span>SHAPE</span>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('data-admin.index')}}">
      <i class="bi bi-person-bounding-box"></i>
      <span>Data Admin</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('data-ketua-lokasi.index')}}">
      <i class="bi bi-person-circle"></i>
      <span>Data Ketua Lokasi</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('data-lembaga.index')}}" class="active">
      <i class="bi bi-person-square"></i>
      <span>Data Lembaga</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('data-kontak.index')}}">
      <i class="bi bi-people"></i>
      <span>Data Kontak</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{url('/admin/data-laporan')}}">
      <i class="bi bi-bar-chart-line"></i>
      <span>Laporan</span>
    </a>
  </li>
@endsection

@section('main')
  <div class="pagetitle">
    <h1>Data Lembaga</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/admin')}}">Admin</a></li>
        <li class="breadcrumb-item active">Data Lembaga</li>
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
                <h5 class="card-title card-title-full">Data Lembaga</h5>
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
                        Tambah Data
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('data-lembaga.store') }}" method="post" enctype="multipart/form-data">
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
                                    <option value="Ketua Lokasi">Ketua Lokasi</option>
                                    <option value="Utusan">Utusan</option>
                                    <option value="Ketua Kelompok">Ketua Kelompok</option>
                                    <option value="Beasiswa">Beasiswa</option>
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
                                    <input type="text" name="sapaanDatas" class="form-control form-control-sm" id="sapaanData" placeholder="Sapaan">
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
                                    <input type="text" name="namaPanggilanDatas" class="form-control form-control-sm" id="namaPanggilanData" placeholder="Angel">
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="peranData" class="col-sm-3 px-1">Peran dalam Keluarga</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="peranDatas" class="form-control form-control-sm" id="peranData" placeholder="Peran Dalam Keluarga">
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="jenisIdentitasData" class="col-sm-3 px-1">Jenis Identitas</label>
                                <div class="col-sm-9">
                                  <input type="text" name="jenisIdentitasDatas" class="form-control form-control-sm" id="jenisIdentitasData" placeholder="Peran Dalam Keluarga">
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
                                  <input type="text" name="statusPernikahanDatas" class="form-control form-control-sm" id="statusPernikahanData" placeholder="cth: Bandung">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="suku" class="col-sm-3 px-1">Suku</label>
                                <div class="col-sm-9">
                                  <input type="text" name="sukus" class="form-control form-control-sm" id="suku" placeholder="Sunda">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="noRekData" class="col-sm-3 px-1">Nomor Rekening</label>
                                <div class="col-sm-9">
                                  <input type="text" name="noRekDatas" class="form-control form-control-sm" id="noRekData" placeholder="123456789">
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
                                  <input type="text" name="negaraDatas" class="form-control form-control-sm" id="negaraData" placeholder="Negara">
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
                                  <input type="text" name="dusunDatas" class="form-control form-control-sm" id="dusunData" placeholder="Kelurahan">
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
                                  <input type="text" name="areaDatas" class="form-control form-control-sm" id="areaData" placeholder="Area">
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
                                <label for="noHpSData" class="col-sm-3 px-1">No HP 1</label>
                                <div class="col-sm-9">
                                  <input type="text" name="noHpSDatas" class="form-control form-control-sm" id="noHpSData" placeholder="cth: +62">
                                </div>
                              </div>
                              <div id="sembunyiData4" class="divTampil4">
                                <div class="mb-3 row">
                                  <label for="noTelpSData" class="col-sm-3 px-1">No Telp 1</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="noTelpSDatas" class="form-control form-control-sm" id="noTelpSData" placeholder="cth: +62">
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="telpRumahData" class="col-sm-3 px-1">Telp. Rumah 2</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="telpRumahDatas" class="form-control form-control-sm" id="telpRumahData" placeholder="cth: +622174130258">
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
                                <label for="emailData" class="col-sm-3 px-1">Email <span class="required-input">(*)</span></label>
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
                              <div class="mb-3 row">
                                <label for="riwayatPelLData" class="col-sm-3 px-1">Riwayat Pelayanan 5</label>
                                <div class="col-sm-9">
                                  <input type="text" name="riwayatPelLDatas" class="form-control form-control-sm" id="riwayatPelLData" placeholder="Riwayat Pelayanan 4">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="riwayatPelEnData" class="col-sm-3 px-1">Riwayat Pelayanan 6</label>
                                <div class="col-sm-9">
                                  <input type="text" name="riwayatPelEnDatas" class="form-control form-control-sm" id="riwayatPelEnData" placeholder="Riwayat Pelayanan 4">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="riwayatPelTuData" class="col-sm-3 px-1">Riwayat Pelayanan 7</label>
                                <div class="col-sm-9">
                                  <input type="text" name="riwayatPelTuDatas" class="form-control form-control-sm" id="riwayatPelTuData" placeholder="Riwayat Pelayanan 4">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="riwayatPelDeData" class="col-sm-3 px-1">Riwayat Pelayanan 8</label>
                                <div class="col-sm-9">
                                  <input type="text" name="riwayatPelDeDatas" class="form-control form-control-sm" id="riwayatPelDeData" placeholder="Riwayat Pelayanan 4">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="riwayatPelSemData" class="col-sm-3 px-1">Riwayat Pelayanan 9</label>
                                <div class="col-sm-9">
                                  <input type="text" name="riwayatPelSemDatas" class="form-control form-control-sm" id="riwayatPelSemData" placeholder="Riwayat Pelayanan 4">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="riwayatPelSepData" class="col-sm-3 px-1">Riwayat Pelayanan 10</label>
                                <div class="col-sm-9">
                                  <input type="text" name="riwayatPelSepDatas" class="form-control form-control-sm" id="riwayatPelSepData" placeholder="Riwayat Pelayanan 4">
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
                        <a id="lihatKelompokButton" data-bs-target="#kelompokModal" data-bs-toggle="modal" data-attr="{{route('data-lembaga.show', $dataLembaga->id_user)}}" data-id="{{$dataLembaga->id_user}}" class="text-primary fs-5">
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
                                <img src="{{ $dataLembaga->foto != '' ? asset('images/Data Lembaga/Foto/'.$dataLembaga->foto) : asset('images/no-user.png') }}" class="img-fluid img-thumbnail rounded mx-auto d-block w-25" alt="...">
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
                                    <div class="col-4">Suku</div>
                                    <div class="col-8">{{$dataLembaga->suku}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Nomor Rekening</div>
                                    <div class="col-8">{{$dataLembaga->no_rekening}}</div>
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
                                  <div class="row p-2">
                                    <div class="col-4">Riwayat Pelayanan 5</div>
                                    <div class="col-8">{{$dataLembaga->riwayat_pelayananLima}}</div>
                                  </div>
                                  <div class="row p-2">
                                    <div class="col-4">Riwayat Pelayanan 6</div>
                                    <div class="col-8">{{$dataLembaga->riwayat_pelayananEnam}}</div>
                                  </div>
                                  <div class="row p-2">
                                    <div class="col-4">Riwayat Pelayanan 7</div>
                                    <div class="col-8">{{$dataLembaga->riwayat_pelayananTujuh}}</div>
                                  </div>
                                  <div class="row p-2">
                                    <div class="col-4">Riwayat Pelayanan 8</div>
                                    <div class="col-8">{{$dataLembaga->riwayat_pelayananDelapan}}</div>
                                  </div>
                                  <div class="row p-2">
                                    <div class="col-4">Riwayat Pelayanan 9</div>
                                    <div class="col-8">{{$dataLembaga->riwayat_pelayananSembilan}}</div>
                                  </div>
                                  <div class="row p-2">
                                    <div class="col-4">Riwayat Pelayanan 10</div>
                                    <div class="col-8">{{$dataLembaga->riwayat_pelayananSepuluh}}</div>
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
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahData{{$dataLembaga->id_user}}Label">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Data Lembaga
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('data-lembaga.update', $dataLembaga->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group-input">
                              <div class="form-header-group mb-3">
                                <h6>PERSONAL</h6>
                              </div>
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editUntukPendataan{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Untuk <span class="required-input">(*)</span></label>
                                    <div class="col-sm-9">
                                      <select class="form-select form-select-sm" name="editUntukPendataans" id="editUntukPendataan{{$dataLembaga->id_user}}" aria-label=".form-select-sm editUntukPendataan{{$dataLembaga->id_user}}">
                                        <option value="">-Untuk-</option>
                                        <option value="Pengurus" {{($dataLembaga->data_lembaga == 'Pengurus' ? 'selected' : '')}}>Pengurus</option>
                                        <option value="Ketua Kelompok" {{($dataLembaga->data_lembaga == 'Ketua Lokasi' ? 'selected' : '')}}>Ketua Lokasi</option>
                                        <option value="Utusan" {{($dataLembaga->data_lembaga == 'Utusan' ? 'selected' : '')}}>Utusan</option>
                                        <option value="Ketua Kelompok" {{($dataLembaga->data_lembaga == 'Ketua Kelompok' ? 'selected' : '')}}>Ketua Kelompok</option>
                                        <option value="Beasiswa" {{($dataLembaga->data_lembaga == 'Beasiswa' ? 'selected' : '')}}>Beasiswa</option>
                                      </select>
                                      @error('editUntukPendataans')
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
                                    <label for="editIdData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">ID <span class="required-input">(*)</span></label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editIdDatas" class="form-control form-control-sm" id="editIdData{{$dataLembaga->id_user}}" placeholder="ID" value="{{$dataLembaga->id_user}}">
                                      @error('editIdDatas')
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
                                    <label for="editTglRegistrasi{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Tgl Registrasi <span class="required-input">(*)</span></label>
                                    <div class="col-sm-9">
                                      <input type="date" name="editTglRegistrasiDatas" class="form-control form-control-sm" id="editTglRegistrasi{{$dataLembaga->id_user}}" value="{{$dataLembaga->tanggal_regist}}">
                                      @error('editTglRegistrasiDatas')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                    </div>
                                  </div>
                                  <div id="sembunyiDataEdit1{{$dataLembaga->id_user}}" class="divTampilEdit1{{$dataLembaga->id_user}}">
                                    <div class="mb-3 row">
                                      <label for="editReferensiData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Referensi Dari</label>
                                      <div class="col-sm-9">
                                        <input type="text" name="editReferensiDatas" class="form-control form-control-sm" id="editReferensiData{{$dataLembaga->id_user}}" placeholder="Referensi Dari" value="{{$dataLembaga->refrensi}}">
                                      </div>
                                    </div>
                                    <div class="mb-3 row">
                                      <label for="editSapaanData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Sapaan</label>
                                      <div class="col-sm-9">
                                        <input type="text" name="editSapaanDatas" class="form-control form-control-sm" id="editSapaanData{{$dataLembaga->id_user}}" placeholder="Referensi Dari" value="{{$dataLembaga->sapaan}}">
                                      </div>
                                    </div>
                                    <div class="mb-3 row">
                                      <label for="editGelarAwalanData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Gelar Awalan</label>
                                      <div class="col-sm-9">
                                        <input type="text" name="editGelarAwalanDatas" class="form-control form-control-sm" id="editGelarAwalanData{{$dataLembaga->id_user}}" placeholder="Gelar Awalan" value="{{$dataLembaga->gelar_awalan}}">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editNamaData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Nama Lengkap <span class="required-input">(*)</span></label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editNamaDatas" class="form-control form-control-sm" id="editNamaData{{$dataLembaga->id_user}}" placeholder="cth: Angelica Gabriel" value="{{$dataLembaga->nama_lengkap}}">
                                      @error('editNamaDatas')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                    </div>
                                  </div>
                                  <div id="sembunyiDataEdit2{{$dataLembaga->id_user}}" class="divTampilEdit2{{$dataLembaga->id_user}}">
                                    <div class="mb-3 row">
                                      <label for="editGelarAkhiranData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Gelar Akhiran</label>
                                      <div class="col-sm-9">
                                        <input type="text" name="editGelarAkhiranDatas" class="form-control form-control-sm" id="editGelarAkhiranData{{$dataLembaga->id_user}}" placeholder="Gelar Akhiran" value="{{$dataLembaga->gelar_akhiran}}">
                                      </div>
                                    </div>
                                    <div class="mb-3 row">
                                      <label for="editNamaPanggilanData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Nama Panggilan</label>
                                      <div class="col-sm-9">
                                        <input type="text" name="editNamaPanggilanDatas" class="form-control form-control-sm" id="editNamaPanggilanData{{$dataLembaga->id_user}}" placeholder="cth: Angel" value="{{$dataLembaga->nama_panggilan}}">
                                      </div>
                                    </div>
                                    <div class="mb-3 row">
                                      <label for="editPeranData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Peran dalam Keluarga</label>
                                      <div class="col-sm-9">
                                        <input type="text" name="editPeranDatas" class="form-control form-control-sm" id="editPeranData{{$dataLembaga->id_user}}" placeholder="cth: Angel" value="{{$dataLembaga->peran}}">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editJenisIdentitasData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Jenis Identitas</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editJenisIdentitasDatas" class="form-control form-control-sm" id="editJenisIdentitasData{{$dataLembaga->id_user}}" placeholder="cth: Angel" value="{{$dataLembaga->jenis_identitas}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editNoIdentitasData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">No. Identitas</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editNoIdentitasDatas" class="form-control form-control-sm" id="editNoIdentitasData{{$dataLembaga->id_user}}" placeholder="cth: 12*********" value="{{$dataLembaga->no_identitas}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editTempatLahirData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Tempat, Tgl Lahir</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="editTempatLahirDatas" class="form-control form-control-sm" id="editTempatLahirData{{$dataLembaga->id_user}}" placeholder="cth: Bandung" value="{{$dataLembaga->tempat_lahir}}">
                                    </div>
                                    <div class="col-sm-1">
                                      <p>/</p>
                                    </div>
                                    <div class="col-sm-3">
                                      <input type="date" name="editTglLahirDatas" class="form-control form-control-sm" id="editTglLahirData{{$dataLembaga->id_user}}" value="{{$dataLembaga->tanggal_lahir}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editJenisKelaminData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editJenisKelaminDatas" id="editJenisKelaminPData{{$dataLembaga->id_user}}" value="Pria" {{$dataLembaga->jK == 'Pria' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="editJenisKelaminPData{{$dataLembaga->id_user}}">Pria</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editJenisKelaminDatas" id="editJenisKelaminWData{{$dataLembaga->id_user}}" value="Wanita" {{$dataLembaga->jK == 'Wanita' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="editJenisKelaminWData{{$dataLembaga->id_user}}">Wanita</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editGolonganDarahData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Golongan Darah</label>
                                    <div class="col-sm-9">
                                      <select class="form-select form-select-sm" name="editGolonganDarahDatas" id="editGolonganDarahData{{$dataLembaga->id_user}}" aria-label=".form-select-sm editGolonganDarahData{{$dataLembaga->id_user}}">
                                        <option value="">-Golongan Darah-</option>
                                        <option value="A" {{$dataLembaga->goldar == 'A' ? 'selected' : ''}}>A</option>
                                        <option value="B" {{$dataLembaga->goldar == 'B' ? 'selected' : ''}}>B</option>
                                        <option value="AB" {{$dataLembaga->goldar == 'AB' ? 'selected' : ''}}>AB</option>
                                        <option value="O" {{$dataLembaga->goldar == 'O' ? 'selected' : ''}}>O</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editStatusPernikahanData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Status Pernikahan</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editStatusPernikahanDatas" class="form-control form-control-sm" id="editStatusPernikahanData{{$dataLembaga->id_user}}" placeholder="Sunda" value="{{$dataLembaga->status_pernikahan}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editSukuData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Suku</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editSukuDatas" class="form-control form-control-sm" id="editSukuData{{$dataLembaga->id_user}}" placeholder="Sunda" value="{{$dataLembaga->suku}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editNoRekData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Nomor Rekening</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editNoRekData{{$dataLembaga->id_user}}" class="form-control form-control-sm" id="editNoRekData{{$dataLembaga->id_user}}" placeholder="123456789" value="{{$dataLembaga->no_rekening}}">
                                    </div>
                                  </div>
                                  <div id="sembunyiDataEdit3{{$dataLembaga->id_user}}" class="divTampilEdit3{{$dataLembaga->id_user}}">
                                    <div class="mb-3 row">
                                      <label for="editFotoData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Foto</label>
                                      <div class="col-sm-9">
                                        <input type="file" name="editFotoDatas" class="form-control form-control-sm" id="editFotoData{{$dataLembaga->id_user}}">
                                        @error('editFotoDatas')
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
                                      <label for="editFotoBitmapData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Foto Bitmap</label>
                                      <div class="col-sm-9">
                                        <input type="file" name="editFotoBitmapDatas" class="form-control form-control-sm" id="editFotoBitmapData{{$dataLembaga->id_user}}">
                                        @error('editFotoBitmapDatas')
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
                                    <label for="editAlamatData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Alamat</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editAlamatDatas" class="form-control form-control-sm" id="editAlamatData{{$dataLembaga->id_user}}" placeholder="Alamat" value="{{$dataLembaga->alamat}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editKeteranganArahData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Keterangan Arah</label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control form-control-sm" name="editKeteranganArahDatas" id="editKeteranganArahData{{$dataLembaga->id_user}}" rows="3" placeholder="Keterangan Arah">{{$dataLembaga->ket_arah}}</textarea>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editPetaData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Peta</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editPetaDatas" class="form-control form-control-sm" id="editPetaData{{$dataLembaga->id_user}}" placeholder="Peta" value="{{$dataLembaga->peta}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editNegaraData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Negara</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editNegaraDatas" class="form-control form-control-sm" id="editNegaraData{{$dataLembaga->id_user}}" placeholder="Peta" value="{{$dataLembaga->negara}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editProvinsiData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Provinsi</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editProvinsiDatas" class="form-control form-control-sm" id="editProvinsiData{{$dataLembaga->id_user}}" placeholder="Provinsi" value="{{$dataLembaga->provinsi}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editKotaData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Kota</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editKotaDatas" class="form-control form-control-sm" id="editKotaData{{$dataLembaga->id_user}}" placeholder="Kota" value="{{$dataLembaga->kota}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editKecamatanData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Kecamatan</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editKecamatanDatas" class="form-control form-control-sm" id="editKecamatanData{{$dataLembaga->id_user}}" placeholder="Kecamatan" value="{{$dataLembaga->kecamatan}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editKelurahanData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Kelurahan</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editKelurahanDatas" class="form-control form-control-sm" id="editKelurahanData{{$dataLembaga->id_user}}" placeholder="Kelurahan" value="{{$dataLembaga->kelurahan}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editKodePosData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Kode Pos</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editKodePosDatas" class="form-control form-control-sm" id="editKodePosData{{$dataLembaga->id_user}}" placeholder="Kode Pos" value="{{$dataLembaga->kode_pos}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editDusunData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Dusun (Desa)</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editDusunDatas" class="form-control form-control-sm" id="editDusunData{{$dataLembaga->id_user}}" placeholder="Kode Pos" value="{{$dataLembaga->dusun}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editRtData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">RT / RW</label>
                                    <div class="col-sm-4">
                                      <input type="text" name="editRtDatas" class="form-control form-control-sm" id="editRtData{{$dataLembaga->id_user}}" placeholder="RT" value="{{$dataLembaga->rt}}">
                                    </div>
                                    <div class="col-sm-1">
                                      <p>/</p>
                                    </div>
                                    <div class="col-sm-4">
                                      <input type="text" name="editRwDatas" class="form-control form-control-sm" id="editRtRwData{{$dataLembaga->id_user}}" placeholder="RW" value="{{$dataLembaga->rw}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editAreaData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Area</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editAreaDatas" class="form-control form-control-sm" id="editAreaData{{$dataLembaga->id_user}}" placeholder="RW" value="{{$dataLembaga->area}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editLokasiData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Lokasi <span class="required-input">(*)</span></label>
                                    <div class="col-sm-9">
                                      <select class="form-select form-select-sm" name="editLokasis" id="editLokasiData{{$dataLembaga->id_user}}" aria-label=".form-select-sm editLokasiData{{$dataLembaga->id_user}}">
                                        <option value="">-Lokasi-</option>
                                        @foreach ($lokasis as $lokasi)
                                          <option value="{{$lokasi->nama_lokasi}}" {{($lokasi->nama_lokasi == $dataLembaga->lokasi) ? 'selected' : '' }}>{{$lokasi->nama_lokasi}}</option>
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
                                    <label for="editNoHpSData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">No HP 1</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editNoHpSDatas" class="form-control form-control-sm" id="editNoHpSData{{$dataLembaga->id_user}}" placeholder="cth: +62" value="{{$dataLembaga->no_hpsatu}}">
                                    </div>
                                  </div>
                                  <div id="sembunyiDataEdit4{{$dataLembaga->id_user}}" class="divTampilEdit4{{$dataLembaga->id_user}}">
                                    <div class="mb-3 row">
                                      <label for="editNoTelpSData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">No Telp 1</label>
                                      <div class="col-sm-9">
                                        <input type="text" name="editNoTelpSDatas" class="form-control form-control-sm" id="editNoTelpSData{{$dataLembaga->id_user}}" placeholder="cth: +62" value="{{$dataLembaga->no_telp}}">
                                      </div>
                                    </div>
                                    <div class="mb-3 row">
                                      <label for="editTelpRumahData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Telp. Rumah 2</label>
                                      <div class="col-sm-9">
                                        <input type="text" name="editTelpRumahDatas" class="form-control form-control-sm" id="editTelpRumahData{{$dataLembaga->id_user}}" placeholder="cth: +622174130258" value="{{$dataLembaga->no_rumah}}">
                                      </div>
                                    </div>
                                    <div class="mb-3 row">
                                      <label for="editTerimaSMSData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Bisa Terima SMS?</label>
                                      <div class="col-sm-9 pt-1">
                                        <div class="form-check form-switch">
                                          <input class="form-check-input" name="editTerimaSMSDatas" type="checkbox" id="editTerimaSMSData{{$dataLembaga->id_user}}" value="Ya" {{$dataLembaga->bisa_sms == 'Ya' ? 'checked' : ''}}>
                                          <label class="form-check-label" for="editTerimaSMSData{{$dataLembaga->id_user}}">Ya</label>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="mb-3 row">
                                      <label for="editNoHpDData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">No HP 2</label>
                                      <div class="col-sm-9">
                                        <input type="text" name="editNoHpDDatas" class="form-control form-control-sm" id="editNoHpDData{{$dataLembaga->id_user}}" placeholder="cth: +62856789456" value="{{$dataLembaga->no_hpdua}}">
                                      </div>
                                    </div>
                                    <div class="mb-3 row">
                                      <label for="editNoLainData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">No Lainnya</label>
                                      <div class="col-sm-9">
                                        <input type="text" name="editNoLainDatas" class="form-control form-control-sm" id="editNoLainData{{$dataLembaga->id_user}}" placeholder="mis: Pin BB" value="{{$dataLembaga->no_lainnya}}">
                                      </div>
                                    </div>
                                    <div class="mb-3 row">
                                      <label for="editFaxData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Fax. Rumah</label>
                                      <div class="col-sm-9">
                                        <input type="text" name="editFaxDatas" class="form-control form-control-sm" id="editFaxData{{$dataLembaga->id_user}}" placeholder="FAX" value="{{$dataLembaga->fax_rumah}}">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="emailData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Email <span class="required-input">(*)</span></label>
                                    <div class="col-sm-9">
                                      <input type="email" name="emailDatas" class="form-control form-control-sm" id="emailData{{$dataLembaga->id_user}}" placeholder="cth: email@gmail.com">
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
                                  <div id="sembunyiDataEdit5{{$dataLembaga->id_user}}" class="divTampilEdit5{{$dataLembaga->id_user}}">
                                    <div class="mb-3 row">
                                      <label for="editTerimaEmailData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Bisa Terima Email?</label>
                                      <div class="col-sm-9 pt-1">
                                        <div class="form-check form-switch">
                                          <input class="form-check-input" name="editTerimaEmailDatas" type="checkbox" id="editTerimaEmailData{{$dataLembaga->id_user}}" value="Ya" {{$dataLembaga->bisa_email == 'Ya' ? 'checked' : ''}}>
                                          <label class="form-check-label" for="editTerimaEmailData{{$dataLembaga->id_user}}">Ya</label>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div id="sembunyiDataEdit6{{$dataLembaga->id_user}}" class="divTampilEdit6{{$dataLembaga->id_user}}">
                                    <div class="mb-3 row">
                                      <label for="editWebsiteData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Website</label>
                                      <div class="col-sm-9">
                                        <input type="text" name="editWebsiteDatas" class="form-control form-control-sm" id="editWebsiteData{{$dataLembaga->id_user}}" placeholder="cth: Facebook, Twitter, etc" value="{{$dataLembaga->website}}">
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
                                    <label for="editPekerjaanData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Pekerjaan</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select form-select-sm" name="editPekerjaanDatas" id="editPekerjaanData{{$dataLembaga->id_user}}" aria-label=".form-select-sm editPekerjaanData{{$dataLembaga->id_user}}">
                                          <option value="">-Pekerjaan-</option>
                                          @foreach ($pekerjaans as $pekerjaan)
                                            <option value="{{$pekerjaan->nama_pekerjaanPJ}}" {{($pekerjaan->nama_pekerjaanPJ == $dataLembaga->pekerjaan) ? 'selected' : ''}}>{{$pekerjaan->nama_pekerjaanPJ}}</option>
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
                                    <label for="editJabatanData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Jabatan Dalam Pekerjaan</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editJabatanDatas" class="form-control form-control-sm" id="editJabatanData{{$dataLembaga->id_user}}" placeholder="cth: Manager, Staff, etc" value="{{$dataLembaga->jabatan}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editStatusPekerjaanData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Status Pekerjaan</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select form-select-sm" name="editStatusPekerjaanDatas" id="editStatusPekerjaanData{{$dataLembaga->id_user}}" aria-label=".form-select-sm editStatusPekerjaanData{{$dataLembaga->id_user}}">
                                          <option value="">-Status Pekerjaan-</option>
                                          @foreach ($statusPekerjaans as $statusPekerjaan)
                                            <option value="{{$statusPekerjaan->status_pekerjaanSPJ}}" {{($statusPekerjaan->status_pekerjaanSPJ == $dataLembaga->status_pekerjaan) ? 'selected' : ''}}>{{$statusPekerjaan->status_pekerjaanSPJ}}</option>
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
                                    <label for="editNamaPerusahaanData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Nama Perusahaan</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editNamaPerusahaanDatas" class="form-control form-control-sm" id="editNamaPerusahaanData{{$dataLembaga->id_user}}" placeholder="Nama Perusahaan" value="{{$dataLembaga->nama_perusahaan}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="sektorIndustriData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Sektor Industri</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select form-select-sm" name="sektorIndustriDatas" id="sektorIndustriData{{$dataLembaga->id_user}}" aria-label=".form-select-sm sektorIndustriData{{$dataLembaga->id_user}}">
                                          <option value="">-Sektor Industri-</option>
                                          @foreach ($sektorIndustris as $sektorIndustri)
                                            <option value="{{$sektorIndustri->sektor_industriSI}}" {{($sektorIndustri->sektor_industriSI == $dataLembaga->sektor_industri) ? 'selected' : ''}}>{{$sektorIndustri->sektor_industriSI}}</option>
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
                                    <label for="editAlamatKantorData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Alamat Kantor</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editAlamatKantorDatas" class="form-control form-control-sm" id="editAlamatKantorData{{$dataLembaga->id_user}}" placeholder="Alamat Kantor" value="{{$dataLembaga->alamat_kantor}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editTelpKantorData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Telp. Kantor</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editTelpKantorDatas" class="form-control form-control-sm" id="editTelpKantorData{{$dataLembaga->id_user}}" placeholder="cth: +62" value="{{$dataLembaga->telp_kantor}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editExtData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Ext.</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editExtDatas" class="form-control form-control-sm" id="editExtData{{$dataLembaga->id_user}}" placeholder="EXT" value="{{$dataLembaga->ext}}">
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
                                    <label for="editTingkatPendidikanData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Tingkat Pendidikan</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select form-select-sm" name="editTingkatPendidikanDatas" id="editTingkatPendidikanData{{$dataLembaga->id_user}}" aria-label="form-select-sm editTingkatPendidikanData{{$dataLembaga->id_user}}">
                                          <option value="">-Tingkat Pendidikan-</option>
                                          @foreach ($tingkatPendidikans as $tingkatPendidikan)
                                            <option value="{{$tingkatPendidikan->tingkat_pendidikan}}" {{($tingkatPendidikan->tingkat_pendidikan == $dataLembaga->tingkat_pendidikan) ? 'selected' : ''}}>{{$tingkatPendidikan->tingkat_pendidikan}}</option>
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
                                    <label for="editSekolahData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Sekolah/Univ (Saat ini Ditempuh)</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select form-select-sm" name="editSekolahDatas" id="editSekolahData{{$dataLembaga->id_user}}" aria-label="form-select-sm editSekolahData{{$dataLembaga->id_user}}">
                                          <option value="">-Sekolah / Universitas</option>
                                          @foreach ($sekolahUnivs as $sekolahUniv)
                                            <option value="{{$sekolahUniv->sekolah_univ}}" {{($sekolahUniv->sekolah_univ == $dataLembaga->sekolah_univ) ? 'selected' : ''}}>{{$sekolahUniv->sekolah_univ}}</option>
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
                                    <label for="editBKetertarikandataLembaga{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Bidang Ketertarikan</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-control" name="editBKetertarikandataLembagas[]" style="width: 100%;" id="editBKetertarikandataLembaga{{$dataLembaga->id_user}}" aria-label="multiple select editBKetertarikandataLembaga{{$dataLembaga->id_user}}" multiple>
                                          <option>-Bidang Ketertarikan-</option>
                                          @foreach ($bidKetertarikans as $bidKetertarikan)
                                            <option value="{{$bidKetertarikan->bidang_ketertarikan}}" {{($bidKetertarikan->bidang_ketertarikan == $dataLembaga->bidang_ketertarikan) ? 'selected' : ''}}>{{$bidKetertarikan->bidang_ketertarikan}}</option>
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
                                    <label for="editBKeterampilandataLembaga{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Bidang Keterampilan</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-control" name="editBKeterampilandataLembagas[]" id="editBKeterampilandataLembaga{{$dataLembaga->id_user}}" style="width: 100%;" aria-label="multiple select editBKeterampilandataLembaga{{$dataLembaga->id_user}}" multiple>
                                          <option>Bidang Keterampilan</option>
                                          @foreach ($bidKeterampilans as $bidKeterampilan)
                                            <option value="{{$bidKeterampilan->bidang_keterampilan}}" {{($bidKeterampilan->bidang_keterampilan == $dataLembaga->bidang_keterampilan) ? 'selected' : ''}}>{{$bidKeterampilan->bidang_keterampilan}}</option>
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
                                    <label for="editCatatanData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Catatan</label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control form-control-sm" name="editCatatanDatas" id="editCatatanData{{$dataLembaga->id_user}}" rows="3" placeholder="Catatan"> {{$dataLembaga->catatan}}</textarea>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editStatusData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Status</label>
                                    <div class="col-sm-9">
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editStatusDatas" id="statusAData{{$dataLembaga->id_user}}" value="Aktif" {{$dataLembaga->status == 'Aktif' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="statusAData{{$dataLembaga->id_user}}">Aktif</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editStatusDatas" id="statusTaData{{$dataLembaga->id_user}}" value="Tidak Aktif" {{$dataLembaga->status == 'Tidak Aktif' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="statusTaData{{$dataLembaga->id_user}}">Tidak Aktif</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div id="sembunyiDataEdit7{{$dataLembaga->id_user}}" class="divTampilEdit7{{$dataLembaga->id_user}}">
                                    <div class="mb-3 row">
                                      <label for="editVerifEmailData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Email Sudah Verifikasi?</label>
                                      <div class="col-sm-9 pt-1">
                                        <div class="form-check form-switch">
                                          <input class="form-check-input" name="editVerifEmailDatas" type="checkbox" id="editVerifEmailData{{$dataLembaga->id_user}}" {{$dataLembaga->verif_email == 'Ya' ? 'checked' : ''}}>
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
                                    <label for="editPerBeasiswaData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Periode Beasiswa</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editPerBeasiswaDatas" class="form-control form-control-sm" id="editPerBeasiswaData{{$dataLembaga->id_user}}" placeholder="Periode Beasiswa" value="{{$dataLembaga->periode_beasiswa}}">
                                    </div>
                                  </div>
                                  <div id="sembunyiDataEdit12{{$dataLembaga->id_user}}" class="divTampilEdit12{{$dataLembaga->id_user}}">
                                    <div class="mb-3 row nominalTampil" id="nominalHide">
                                      <label for="editNominal{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Nominal</label>
                                      <div class="col-9">
                                        <div id="editInputNominal{{$dataLembaga->id_user}}">
                                          <div class="position-relative">
                                            <div class="position-absolute top-50 start-100 ms-1 translate-middle-y">
                                              <button type="button" class="btn btn-transparent p-0" id="editTambahNominal{{$dataLembaga->id_user}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah Input Nominal">
                                                <i class="bi bi-plus-circle fs-5 text-success d-inline"></i>
                                              </button>
                                            </div>
                                            <div class="row">
                                              <div class="col-6">
                                                <input type="text" name="editTambahNominals[0][ket_nominal]" class="form-control form-control-sm" id="editKetNominal{{$dataLembaga->id_user}}" placeholder="Keterangan Nominal">
                                              </div>
                                              <div class="col-6">
                                                <input type="text" name="editTambahNominals[0][nominal]" class="form-control form-control-sm" id="editNominal{{$dataLembaga->id_user}}" placeholder="Nominal">
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editPerKerjaPData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Periode Kerja Praktik</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editPerKerjaPDatas" class="form-control form-control-sm" id="editPerKerjaPData{{$dataLembaga->id_user}}" placeholder="Periode Kerja Praktik" value="{{$dataLembaga->periode_kerja_praktiK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editRiwayatPelSData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Riwayat Pelayanan 1</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editRiwayatPelSDatas" class="form-control form-control-sm" id="editRiwayatPelSData{{$dataLembaga->id_user}}" placeholder="Riwayat Pelayanan 1" value="{{$dataLembaga->riwayat_pelayananSatu}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editRiwayatPelDData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Riwayat Pelayanan 2</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editRiwayatPelDDatas" class="form-control form-control-sm" id="editRiwayatPelDData{{$dataLembaga->id_user}}" placeholder="Riwayat Pelayanan 2" value="{{$dataLembaga->riwayat_pelayananDua}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editRiwayatPelTData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Riwayat Pelayanan 3</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editRiwayatPelTDatas" class="form-control form-control-sm" id="editRiwayatPelTData{{$dataLembaga->id_user}}" placeholder="Riwayat Pelayanan 3" value="{{$dataLembaga->riwayat_pelayananTiga}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editRiwayatPelEData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Riwayat Pelayanan 4</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editRiwayatPelEDatas" class="form-control form-control-sm" id="editRiwayatPelEData{{$dataLembaga->id_user}}" placeholder="Riwayat Pelayanan 4" value="{{$dataLembaga->riwayat_pelayananEmpat}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="riwayatPelLData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Riwayat Pelayanan 5</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="riwayatPelLDatas" class="form-control form-control-sm" id="riwayatPelLData{{$dataLembaga->id_user}}" placeholder="Riwayat Pelayanan 5" value="{{$dataLembaga->riwayat_pelayananLima}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="riwayatPelEnData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Riwayat Pelayanan 6</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="riwayatPelEnDatas" class="form-control form-control-sm" id="riwayatPelEnData{{$dataLembaga->id_user}}" placeholder="Riwayat Pelayanan 6" value="{{$dataLembaga->riwayat_pelayananEnam}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="riwayatPelTuData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Riwayat Pelayanan 7</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="riwayatPelTuDatas" class="form-control form-control-sm" id="riwayatPelTuData{{$dataLembaga->id_user}}" placeholder="Riwayat Pelayanan 7" value="{{$dataLembaga->riwayat_pelayananTujuh}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="riwayatPelDeData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Riwayat Pelayanan 8</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="riwayatPelDeDatas" class="form-control form-control-sm" id="riwayatPelDeData{{$dataLembaga->id_user}}" placeholder="Riwayat Pelayanan 8" value="{{$dataLembaga->riwayat_pelayananDelapan}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="riwayatPelSemData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Riwayat Pelayanan 9</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="riwayatPelSemDatas" class="form-control form-control-sm" id="riwayatPelSemData{{$dataLembaga->id_user}}" placeholder="Riwayat Pelayanan 9" value="{{$dataLembaga->riwayat_pelayananSembilan}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="riwayatPelSepData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Riwayat Pelayanan 10</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="riwayatPelSepDatas" class="form-control form-control-sm" id="riwayatPelSepData{{$dataLembaga->id_user}}" placeholder="Riwayat Pelayanan 10" value="{{$dataLembaga->riwayat_pelayananSepuluh}}">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div id="sembunyiDataEdit8{{$dataLembaga->id_user}}" class="divTampilEdit8{{$dataLembaga->id_user}}">
                              <div class="form-group-input">
                                <div class="form-header-group mb-3">
                                  <h6>KOLOM CADANGAN (PILIHAN)</h6>
                                </div>
                                <div class="input-center ps-5">
                                  <div class="w-75">
                                    <div class="mb-3 row">
                                      <label for="editPilihanSData{{$dataLembaga->id_user}}" class="col-sm-3 px-1"></label>
                                      <div class="col-sm-9 row">
                                        <div class="col-11">
                                          <select class="form-select form-select-sm" name="editPilihanSDatas" id="editPilihanSData{{$dataLembaga->id_user}}" aria-label=".form-select-sm editPilihanSData{{$dataLembaga->id_user}}">
                                            <option value="{{$dataLembaga->kolom_cadanganPSatu}}"> {{$dataLembaga->kolom_cadanganPSatu}}</option>
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
                                      <label for="editPilihanDData{{$dataLembaga->id_user}}" class="col-sm-3 px-1"></label>
                                      <div class="col-sm-9 row">
                                        <div class="col-11">
                                          <select class="form-select form-select-sm" name="editPilihanDDatas" id="editPilihanDData{{$dataLembaga->id_user}}" aria-label=".form-select-sm editPilihanDData{{$dataLembaga->id_user}}">
                                            <option value="{{$dataLembaga->kolom_cadanganPDua}}"> {{$dataLembaga->kolom_cadanganPDua}}</option>
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
                                      <label for="editPilihanTData{{$dataLembaga->id_user}}" class="col-sm-3 px-1"></label>
                                      <div class="col-sm-9 row">
                                        <div class="col-11">
                                          <select class="form-select form-select-sm" name="editPilihanTDatas" id="editPilihanTData{{$dataLembaga->id_user}}" aria-label=".form-select-sm editPilihanTData{{$dataLembaga->id_user}}">
                                            <option value="{{$dataLembaga->kolom_cadanganPTiga}}"> {{$dataLembaga->kolom_cadanganPTiga}}</option>
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
                                      <label for="editPilihanEData{{$dataLembaga->id_user}}" class="col-sm-3 px-1"></label>
                                      <div class="col-sm-9 row">
                                        <div class="col-11">
                                          <select class="form-select form-select-sm" name="editPilihanEDatas" id="editPilihanEData{{$dataLembaga->id_user}}" aria-label=".form-select-sm editPilihanEData{{$dataLembaga->id_user}}">
                                            <option value="{{$dataLembaga->kolom_cadanganPEmpat}}"> {{$dataLembaga->kolom_cadanganPEmpat}}</option>
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
                                      <label for="editPilihanLData{{$dataLembaga->id_user}}" class="col-sm-3 px-1"></label>
                                      <div class="col-sm-9 row">
                                        <div class="col-11">
                                          <select class="form-select form-select-sm" name="editPilihanLDatas" id="editPilihanLData{{$dataLembaga->id_user}}" aria-label=".form-select-sm editPilihanLData{{$dataLembaga->id_user}}">
                                            <option value="{{$dataLembaga->kolom_cadanganPLima}}"> {{$dataLembaga->kolom_cadanganPLima}}</option>
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
                                      <label for="editPilihanEnData{{$dataLembaga->id_user}}" class="col-sm-3 px-1"></label>
                                      <div class="col-sm-9 row">
                                        <div class="col-11">
                                          <select class="form-select form-select-sm" name="editPilihanEnDatas" id="editPilihanEnData{{$dataLembaga->id_user}}" aria-label=".form-select-sm editPilihanEnData{{$dataLembaga->id_user}}">
                                            <option value="{{$dataLembaga->kolom_cadanganPEnam}}"> {{$dataLembaga->kolom_cadanganPEnam}}</option>
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
                                      <label for="editPilihanTuData{{$dataLembaga->id_user}}" class="col-sm-3 px-1"></label>
                                      <div class="col-sm-9 row">
                                        <div class="col-11">
                                          <select class="form-select form-select-sm" name="editPilihanTuDatas" id="editPilihanTuData{{$dataLembaga->id_user}}" aria-label=".form-select-sm editPilihanTuData{{$dataLembaga->id_user}}">
                                            <option value="{{$dataLembaga->kolom_cadanganPTujuh}}"> {{$dataLembaga->kolom_cadanganPTujuh}}</option>
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
                                    <label for="editPilihanGSdataLembaga{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Personality - MBTI</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select" name="editPilihanGSdataLembagas[]" style="width: 100%;" id="editPilihanGSdataLembaga{{$dataLembaga->id_user}}" aria-label="multiple select editPilihanGSdataLembaga{{$dataLembaga->id_user}}" multiple>
                                          <option value="{{$dataLembaga->personality_mbti}}">{{$dataLembaga->personality_mbti}}</option>
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
                                    <label for="editPilihanGDdataLembaga{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Personality - Holland</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select" name="editPilihanGDdataLembagas[]" style="width: 100%;" id="editPilihanGDdataLembaga{{$dataLembaga->id_user}}" aria-label="multiple select editPilihanGDdataLembaga{{$dataLembaga->id_user}}" multiple>
                                          <option value="{{$dataLembaga->personality_holland}}">{{$dataLembaga->personality_holland}}</option>
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
                                    <label for="editPilihanGTdataLembaga{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Spiritual Gifts</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select" name="editPilihanGTdataLembagas[]" style="width: 100%;" id="editPilihanGTdataLembaga{{$dataLembaga->id_user}}" aria-label="multiple select editPilihanGTdataLembaga{{$dataLembaga->id_user}}" multiple>
                                          <option value="{{$dataLembaga->spiritual_gifts}}">{{$dataLembaga->spiritual_gifts}}</option>
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
                                    <label for="editPilihanGEdataLembaga{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Abilities</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select" name="editPilihanGEdataLembagas[]" style="width: 100%;" id="editPilihanGEdataLembaga{{$dataLembaga->id_user}}" aria-label="multiple select editPilihanGEdataLembaga{{$dataLembaga->id_user}}" multiple>
                                          <option value="{{$dataLembaga->abilities}}">{{$dataLembaga->abilities}}</option>
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
                                    <label for="editExperienceDataLembaga{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Experience</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select" name="editExperienceDataLembagas[]" style="width: 100%;" id="editExperienceDataLembaga{{$dataLembaga->id_user}}" aria-label="multiple select editExperienceDataLembaga{{$dataLembaga->id_user}}" multiple>
                                          <option value="{{$dataLembaga->kolom_cadanganPGLima}}">{{$dataLembaga->kolom_cadanganPGLima}}</option>
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
                                    <label for="editPilihanGEndataLembaga{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Kemampuan Bahasa</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select" name="editPilihanGEndataLembagas[]" style="width: 100%;" id="editPilihanGEndataLembaga{{$dataLembaga->id_user}}" aria-label="multiple select editPilihanGEndataLembaga{{$dataLembaga->id_user}}" multiple>
                                          <option value="{{$dataLembaga->kemampuan_bahasa}}">{{$dataLembaga->kemampuan_bahasa}}</option>
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
                            <div id="sembunyiDataEdit9{{$dataLembaga->id_user}}" class="divTampilEdit9{{$dataLembaga->id_user}}">
                              <div class="form-group-input">
                                <div class="form-header-group mb-3">
                                  <h6>KOLOM CADANGAN (CHECK BOX)</h6>
                                </div>
                                <div class="input-center ps-5">
                                  <div class="w-75">
                                    <div class="mb-3 row">
                                      <label for="editCheckSData{{$dataLembaga->id_user}}" class="col-sm-3 px-1"></label>
                                      <div class="col-sm-9 pt-1">
                                        <div class="form-check form-switch">
                                          <input class="form-check-input" name="editCheckSDatas" type="checkbox" id="editCheckSData{{$dataLembaga->id_user}}" value="Ya" {{$dataLembaga->kolom_cadanganCBSatu == 'Ya' ? 'checked' : ''}}>
                                          <label class="form-check-label" for="editCheckSData{{$dataLembaga->id_user}}">Ya</label>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="mb-3 row">
                                      <label for="editCheckDData{{$dataLembaga->id_user}}" class="col-sm-3 px-1"></label>
                                      <div class="col-sm-9 pt-1">
                                        <div class="form-check form-switch">
                                          <input class="form-check-input" name="editCheckDDatas" type="checkbox" id="editCheckDData{{$dataLembaga->id_user}}" value="Ya" {{$dataLembaga->kolom_cadanganCBDua == 'Ya' ? 'checked' : ''}}>
                                          <label class="form-check-label" for="editCheckDData{{$dataLembaga->id_user}}">Ya</label>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="mb-3 row">
                                      <label for="editCheckTData{{$dataLembaga->id_user}}" class="col-sm-3 px-1"></label>
                                      <div class="col-sm-9 pt-1">
                                        <div class="form-check form-switch">
                                          <input class="form-check-input" name="editCheckTDatas" type="checkbox" id="editCheckTData{{$dataLembaga->id_user}}" value="Ya" {{$dataLembaga->kolom_cadanganCBTiga == 'Ya' ? 'checked' : ''}}>
                                          <label class="form-check-label" for="editCheckTData{{$dataLembaga->id_user}}">Ya</label>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="mb-3 row">
                                      <label for="editCheckEData{{$dataLembaga->id_user}}" class="col-sm-3 px-1"></label>
                                      <div class="col-sm-9 pt-1">
                                        <div class="form-check form-switch">
                                          <input class="form-check-input" name="editCheckEDatas" type="checkbox" id="editCheckEData{{$dataLembaga->id_user}}" value="Ya" {{$dataLembaga->kolom_cadanganCBEmpat == 'Ya' ? 'checked' : ''}}>
                                          <label class="form-check-label" for="editCheckEData{{$dataLembaga->id_user}}">Ya</label>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="mb-3 row">
                                      <label for="editCheckLData{{$dataLembaga->id_user}}" class="col-sm-3 px-1"></label>
                                      <div class="col-sm-9 pt-1">
                                        <div class="form-check form-switch">
                                          <input class="form-check-input" name="editCheckLDatas" type="checkbox" id="editCheckLData{{$dataLembaga->id_user}}" value="Ya" {{$dataLembaga->kolom_cadanganCBLima == 'Ya' ? 'checked' : ''}}>
                                          <label class="form-check-label" for="editCheckLData{{$dataLembaga->id_user}}">Ya</label>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="mb-3 row">
                                      <label for="editCheckEnData{{$dataLembaga->id_user}}" class="col-sm-3 px-1"></label>
                                      <div class="col-sm-9 pt-1">
                                        <div class="form-check form-switch">
                                          <input class="form-check-input" name="editCheckEnDatas" type="checkbox" id="editCheckEnData{{$dataLembaga->id_user}}" value="Ya" {{$dataLembaga->kolom_cadanganCBEnam == 'Ya' ? 'checked' : ''}}>
                                          <label class="form-check-label" for="editCheckEnData{{$dataLembaga->id_user}}">Ya</label>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="mb-3 row">
                                      <label for="editCheckTuData{{$dataLembaga->id_user}}" class="col-sm-3 px-1"></label>
                                      <div class="col-sm-9 pt-1">
                                        <div class="form-check form-switch">
                                          <input class="form-check-input" name="editCheckTuDatas" type="checkbox" id="editCheckTuData{{$dataLembaga->id_user}}" value="Ya" {{$dataLembaga->kolom_cadanganCBTujuh == 'Ya' ? 'checked' : ''}}>
                                          <label class="form-check-label" for="editCheckTuData{{$dataLembaga->id_user}}">Ya</label>
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
                              <div id="sembunyiDataEdit10{{$dataLembaga->id_user}}" class="divTampilEdit10{{$dataLembaga->id_user}}">
                                <div class="input-center ps-5">
                                  <div class="w-75">
                                    <div class="mb-3 row">
                                      <label for="" class="col-sm-3 px-1">Baptis Anak</label>
                                      <div class="col-sm-9">
                                        <label for="" class="">Sudah?</label>
                                        <div class="form-check">
                                          <input class="form-check-input" name="editSudahBaptisAnakDatas" type="checkbox" value="" id="editSudahBaptisAnakData{{$dataLembaga->id_user}}" {{$dataLembaga->ba_sudah == 'Sudah' ? 'checked' : '' }}>
                                          <label class="form-check-label" for="editSudahBaptisAnakData{{$dataLembaga->id_user}}">
                                            Sudah
                                          </label>
                                        </div>
                                        <hr>
                                        <label for="editTglBaptisAnakData{{$dataLembaga->id_user}}" class="">Tanggal</label>
                                        <input type="date" name="editTglBaptisAnakDatas" class="form-control form-control-sm" id="editTglBaptisAnakData{{$dataLembaga->id_user}}" value="{{$dataLembaga->ba_tanggal}}">
                                        <hr>
                                        <label for="" class="">Tempat</label><br>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="editTempatBaptisAnakDatas" id="editTempatBaptisAnakData{{$dataLembaga->id_user}}" value="Gereja Lokal" {{$dataLembaga->ba_tempat == 'Gereja Lokal' ? 'checked' : '' }}>
                                          <label class="form-check-label" for="editTempatBaptisAnakData{{$dataLembaga->id_user}}">Gereja Lokal</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="editTempatBaptisAnakDatas" id="editTempatBaptisAnakLData{{$dataLembaga->id_user}}" value="Gereja Lain" {{$dataLembaga->ba_tempat == 'Gereja Lain' ? 'checked' : '' }}>
                                          <label class="form-check-label" for="editTempatBaptisAnakLData{{$dataLembaga->id_user}}">Gereja Lain</label>
                                        </div>
                                        <hr>
                                        <label for="editFileUploadBaptisAnakData{{$dataLembaga->id_user}}" class="">File</label>
                                        <input type="file" name="editFileUploadBaptisAnakDatas" class="form-control form-control-sm" id="editFileUploadBaptisAnakData{{$dataLembaga->id_user}}" value="{{$dataLembaga->ba_file}}">
                                        @error('editFileUploadBaptisAnakDatas')
                                          <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                            <p class="p-1 pb-0" style="font-size: 10pt;">
                                              <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                              {{ $message }}
                                            </p>
                                          </div>
                                        @enderror
                                        <hr>
                                        <label for="editKetBaptisAnakData{{$dataLembaga->id_user}}" class="">Keterangan</label>
                                        <textarea class="form-control form-control-sm" name="editKetBaptisAnakDatas" id="editKetBaptisAnakData{{$dataLembaga->id_user}}" rows="3" placeholder="Keterangan">{{$dataLembaga->ba_ket}}</textarea>
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
                                        <input class="form-check-input" name="editSudahMenikahDatas" type="checkbox" value="" id="editSudahMenikahData{{$dataLembaga->id_user}}" {{$dataLembaga->menikah_sudah == 'Sudah' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editSudahMenikahData{{$dataLembaga->id_user}}">
                                          Sudah
                                        </label>
                                      </div>
                                      <hr>
                                      <label for="editTglMenikahData{{$dataLembaga->id_user}}" class="">Tanggal</label>
                                      <input type="date" name="editTglMenikahDatas" class="form-control form-control-sm" id="editTglMenikahData{{$dataLembaga->id_user}}" value="{{$dataLembaga->menikah_tanggal}}">
                                      <hr>
                                      <label for="" class="">Tempat</label><br>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatMenikahDatas" id="editTempatMenikahData{{$dataLembaga->id_user}}" value="Gereja Lokal" {{$dataLembaga->menikah_tempat == 'Gereja Lokal' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatMenikahData{{$dataLembaga->id_user}}">Gereja Lokal</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatMenikahDatas" id="editTempatMenikahLData{{$dataLembaga->id_user}}" value="Gereja Lain" {{$dataLembaga->menikah_tempat == 'Gereja Lain' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatMenikahLData{{$dataLembaga->id_user}}">Gereja Lain</label>
                                      </div>
                                      <hr>
                                      <label for="editFileUploadMenikahData{{$dataLembaga->id_user}}" class="">File</label>
                                      <input type="file" name="editFileUploadMenikahDatas" class="form-control form-control-sm" id="editFileUploadMenikahData{{$dataLembaga->id_user}}" value="{{$dataLembaga->menikah_file}}">
                                      @error('editFileUploadMenikahDatas')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                      <hr>
                                      <label for="editKetMenikahData{{$dataLembaga->id_user}}" class="">Keterangan</label>
                                      <textarea class="form-control form-control-sm" name="editKetMenikahDatas" id="editKetMenikahData{{$dataLembaga->id_user}}" rows="3" placeholder="Keterangan">{{$dataLembaga->menikah_ket}}</textarea>
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
                                        <input class="form-check-input" name="editSudahBaptisDatas" type="checkbox" value="" id="editSudahBaptisData{{$dataLembaga->id_user}}" {{$dataLembaga->bap_sudah == 'Sudah' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editSudahBaptisData{{$dataLembaga->id_user}}">
                                          Sudah
                                        </label>
                                      </div>
                                      <hr>
                                      <label for="editTglBaptisData{{$dataLembaga->id_user}}" class="">Tanggal</label>
                                      <input type="date" name="editTglBaptisDatas" class="form-control form-control-sm" id="editTglBaptisData{{$dataLembaga->id_user}}" value="{{$dataLembaga->bap_tanggal}}">
                                      <hr>
                                      <label for="" class="">Tempat</label><br>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatBaptisDatas" id="editTempatBaptisData{{$dataLembaga->id_user}}" value="Gereja Lokal" {{$dataLembaga->bap_tempat == 'Gereja Lokal' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatBaptisData{{$dataLembaga->id_user}}">Gereja Lokal</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatBaptisDatas" id="editTempatBaptisLData{{$dataLembaga->id_user}}" value="Gereja Lain" {{$dataLembaga->bap_tempat == 'Gereja Lain' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatBaptisLData{{$dataLembaga->id_user}}">Gereja Lain</label>
                                      </div>
                                      <hr>
                                      <label for="editFileUploadBaptisData{{$dataLembaga->id_user}}" class="">File</label>
                                      <input type="file" name="editFileUploadBaptisDatas" class="form-control form-control-sm" id="editFileUploadBaptisData{{$dataLembaga->id_user}}" value="{{$dataLembaga->bap_file}}">
                                      @error('editFileUploadBaptisDatas')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                      <hr>
                                      <label for="editKetBaptisData{{$dataLembaga->id_user}}" class="">Keterangan</label>
                                      <textarea class="form-control form-control-sm" name="editKetBaptisDatas" id="editKetBaptisData{{$dataLembaga->id_user}}" rows="3" placeholder="Keterangan">{{$dataLembaga->bap_ket}}</textarea>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <hr>
                              <div id="sembunyiDataEdit11{{$dataLembaga->id_user}}" class="divTampilEdit11{{$dataLembaga->id_user}}">
                                <div class="input-center ps-5">
                                  <div class="w-75">
                                    <div class="mb-3 row">
                                      <label for="" class="col-sm-3 px-1">Meninggal Dunia</label>
                                      <div class="col-sm-9">
                                        <label for="" class="">Sudah?</label>
                                        <div class="form-check">
                                          <input class="form-check-input" name="editSudahMeninggalDuniaDatas" type="checkbox" value="" id="editSudahMeninggalDuniaData{{$dataLembaga->id_user}}" {{$dataLembaga->md_sudah == 'Sudah' ? 'checked' : '' }}>
                                          <label class="form-check-label" for="editSudahMeninggalDuniaData{{$dataLembaga->id_user}}">
                                            Sudah
                                          </label>
                                        </div>
                                        <hr>
                                        <label for="editTglMeninggalDuniaData{{$dataLembaga->id_user}}" class="">Tanggal</label>
                                        <input type="date" name="editTglMeninggalDuniaDatas" class="form-control form-control-sm" id="editTglMeninggalDuniaData{{$dataLembaga->id_user}}" value="{{$dataLembaga->md_tanggal}}">
                                        <hr>
                                        <label for="" class="">Tempat</label><br>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="editTempatMeninggalDuniaDatas" id="editTempatMeninggalDuniaData{{$dataLembaga->id_user}}" value="Gereja Lokal" {{$dataLembaga->md_tempat == 'Gereja Lokal' ? 'checked' : '' }}>
                                          <label class="form-check-label" for="editTempatMeninggalDuniaData{{$dataLembaga->id_user}}">Gereja Lokal</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="editTempatMeninggalDuniaDatas" id="editTempatMeninggalDuniaLData{{$dataLembaga->id_user}}" value="Gereja Lain" {{$dataLembaga->md_tempat == 'Gereja Lain' ? 'checked' : '' }}>
                                          <label class="form-check-label" for="editTempatMeninggalDuniaLData{{$dataLembaga->id_user}}">Gereja Lain</label>
                                        </div>
                                        <hr>
                                        <label for="editFileUploadMeninggalDuniaData{{$dataLembaga->id_user}}" class="">File</label>
                                        <input type="file" name="editFileUploadMeninggalDuniaDatas" class="form-control form-control-sm" id="editFileUploadMeninggalDuniaData{{$dataLembaga->id_user}}" value="{{$dataLembaga->md_file}}">
                                        @error('editFileUploadMeninggalDuniaDatas')
                                          <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                            <p class="p-1 pb-0" style="font-size: 10pt;">
                                              <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                              {{ $message }}
                                            </p>
                                          </div>
                                        @enderror
                                        <hr>
                                        <label for="editKetMeninggalDuniaData{{$dataLembaga->id_user}}" class="">Keterangan</label>
                                        <textarea class="form-control form-control-sm" name="editKetMeninggalDuniaDatas" id="editKetMeninggalDuniaData{{$dataLembaga->id_user}}" rows="3" placeholder="Keterangan">{{$dataLembaga->md_ket}}</textarea>
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
                                          <input class="form-check-input" name="editSudahPenyerahanAnakDatas" type="checkbox" value="" id="editSudahPenyerahanAnakData{{$dataLembaga->id_user}}" {{$dataLembaga->pa_sudah == 'Sudah' ? 'checked' : '' }}>
                                          <label class="form-check-label" for="editSudahPenyerahanAnakData{{$dataLembaga->id_user}}">
                                            Sudah
                                          </label>
                                        </div>
                                        <hr>
                                        <label for="editTglPenyerahanAnakData{{$dataLembaga->id_user}}" class="">Tanggal</label>
                                        <input type="date" name="editTglPenyerahanAnakDatas" class="form-control form-control-sm" id="editTglPenyerahanAnakData{{$dataLembaga->id_user}}" value="{{$dataLembaga->pa_tanggal}}">
                                        <hr>
                                        <label for="" class="">Tempat</label><br>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="editTempatPenyerahanAnakDatas" id="editTempatPenyerahanAnakData{{$dataLembaga->id_user}}" value="Gereja Lokal" {{$dataLembaga->pa_tempat == 'Gereja Lokal' ? 'checked' : '' }}>
                                          <label class="form-check-label" for="editTempatPenyerahanAnakData{{$dataLembaga->id_user}}">Gereja Lokal</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="editTempatPenyerahanAnakDatas" id="editTempatPenyerahanAnakLData{{$dataLembaga->id_user}}" value="Gereja Lain" {{$dataLembaga->pa_tempat == 'Gereja Lain' ? 'checked' : '' }}>
                                          <label class="form-check-label" for="editTempatPenyerahanAnakLData{{$dataLembaga->id_user}}">Gereja Lain</label>
                                        </div>
                                        <hr>
                                        <label for="editFileUploadPenyerahanAnakData{{$dataLembaga->id_user}}" class="">File</label>
                                        <input type="file" name="editFileUploadPenyerahanAnakDatas" class="form-control form-control-sm" id="editFileUploadPenyerahanAnakData{{$dataLembaga->id_user}}" value="{{$dataLembaga->pa_file}}">
                                        @error('editFileUploadPenyerahanAnakDatas')
                                          <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                            <p class="p-1 pb-0" style="font-size: 10pt;">
                                              <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                              {{ $message }}
                                            </p>
                                          </div>
                                        @enderror
                                        <hr>
                                        <label for="editKetPenyerahanAnakData{{$dataLembaga->id_user}}" class="">Keterangan</label>
                                        <textarea class="form-control form-control-sm" name="editKetPenyerahanAnakDatas" id="editKetPenyerahanAnakData{{$dataLembaga->id_user}}" rows="3" placeholder="Keterangan">{{$dataLembaga->pa_ket}}</textarea>
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
                                          <input class="form-check-input" name="editSudahEvangelismExplosionDatas" type="checkbox" value="" id="editSudahEvangelismExplosionData{{$dataLembaga->id_user}}" {{$dataLembaga->ee_sudah == 'Sudah' ? 'checked' : '' }}>
                                          <label class="form-check-label" for="editSudahEvangelismExplosionData{{$dataLembaga->id_user}}">
                                            Sudah
                                          </label>
                                        </div>
                                        <hr>
                                        <label for="editTglEvangelismExplosionData{{$dataLembaga->id_user}}" class="">Tanggal</label>
                                        <input type="date" name="editTglEvangelismExplosionDatas" class="form-control form-control-sm" id="editTglEvangelismExplosionData{{$dataLembaga->id_user}}" value="{{$dataLembaga->ee_tanggal}}">
                                        <hr>
                                        <label for="" class="">Tempat</label><br>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="editTempatEvangelismExplosionDatas" id="editTempatEvangelismExplosionData{{$dataLembaga->id_user}}" value="Gereja Lokal" {{$dataLembaga->ee_tempat == 'Gereja Lokal' ? 'checked' : '' }}>
                                          <label class="form-check-label" for="editTempatEvangelismExplosionData{{$dataLembaga->id_user}}">Gereja Lokal</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="editTempatEvangelismExplosionDatas" id="editTempatEvangelismExplosionLData{{$dataLembaga->id_user}}" value="Gereja Lain" {{$dataLembaga->ee_tempat == 'Gereja Lain' ? 'checked' : '' }}>
                                          <label class="form-check-label" for="editTempatEvangelismExplosionLData{{$dataLembaga->id_user}}">Gereja Lain</label>
                                        </div>
                                        <hr>
                                        <label for="editFileUploadEvangelismExplosionData{{$dataLembaga->id_user}}" class="">File</label>
                                        <input type="file" name="editFileUploadEvangelismExplosionDatas" class="form-control form-control-sm" id="editFileUploadEvangelismExplosionData{{$dataLembaga->id_user}}" value="{{$dataLembaga->ee_file}}">
                                        @error('editFileUploadEvangelismExplosionDatas')
                                          <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                            <p class="p-1 pb-0" style="font-size: 10pt;">
                                              <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                              {{ $message }}
                                            </p>
                                          </div>
                                        @enderror
                                        <hr>
                                        <label for="editKetEvangelismExplosionData{{$dataLembaga->id_user}}" class="">Keterangan</label>
                                        <textarea class="form-control form-control-sm" name="editKetEvangelismExplosionDatas" id="editKetEvangelismExplosionData{{$dataLembaga->id_user}}" rows="3" placeholder="Keterangan">{{$dataLembaga->ee_ket}}</textarea>
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
                                          <input class="form-check-input" name="editSudahIkatanDinasDatas" type="checkbox" value="" id="editSudahIkatanDinasData{{$dataLembaga->id_user}}" {{$dataLembaga->bid_sudah == 'Sudah' ? 'checked' : '' }}>
                                          <label class="form-check-label" for="editSudahIkatanDinasData{{$dataLembaga->id_user}}">
                                            Sudah
                                          </label>
                                        </div>
                                        <hr>
                                        <label for="editTglIkatanDinasData{{$dataLembaga->id_user}}" class="">Tanggal</label>
                                        <input type="date" name="editTglIkatanDinasDatas" class="form-control form-control-sm" id="editTglIkatanDinasData{{$dataLembaga->id_user}}" value="{{$dataLembaga->bid_tanggal}}">
                                        <hr>
                                        <label for="" class="">Tempat</label><br>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="editTempatIkatanDinasDatas" id="editTempatIkatanDinasData{{$dataLembaga->id_user}}" value="Gereja Lokal" {{$dataLembaga->bid_tempat == 'Gereja Lokal' ? 'checked' : '' }}>
                                          <label class="form-check-label" for="editTempatIkatanDinasData{{$dataLembaga->id_user}}">Gereja Lokal</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="editTempatIkatanDinasDatas" id="editTempatIkatanDinasLData{{$dataLembaga->id_user}}" value="Gereja Lain" {{$dataLembaga->bid_tempat == 'Gereja Lain' ? 'checked' : '' }}>
                                          <label class="form-check-label" for="editTempatIkatanDinasLData{{$dataLembaga->id_user}}">Gereja Lain</label>
                                        </div>
                                        <hr>
                                        <label for="editFileUploadIkatanDinasData{{$dataLembaga->id_user}}" class="">File</label>
                                        <input type="file" name="editFileUploadIkatanDinasDatas" class="form-control form-control-sm" id="editFileUploadIkatanDinasData{{$dataLembaga->id_user}}" value="{{$dataLembaga->bid_file}}">
                                        @error('editFileUploadIkatanDinasDatas')
                                          <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                            <p class="p-1 pb-0" style="font-size: 10pt;">
                                              <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                              {{ $message }}
                                            </p>
                                          </div>
                                        @enderror
                                        <hr>
                                        <label for="editKetIkatanDinasData{{$dataLembaga->id_user}}" class="">Keterangan</label>
                                        <textarea class="form-control form-control-sm" name="editKetIkatanDinasDatas" id="editKetIkatanDinasData{{$dataLembaga->id_user}}" rows="3" placeholder="Keterangan">{{$dataLembaga->bid_ket}}</textarea>
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
                                          <input class="form-check-input" name="editSudahPrktkDuaThnDatas" type="checkbox" value="" id="editSudahPrktkDuaThnData{{$dataLembaga->id_user}}" {{$dataLembaga->pdt_sudah == 'Sudah' ? 'checked' : '' }}>
                                          <label class="form-check-label" for="editSudahPrktkDuaThnData{{$dataLembaga->id_user}}">
                                            Sudah
                                          </label>
                                        </div>
                                        <hr>
                                        <label for="editTglPrktkDuaThnData{{$dataLembaga->id_user}}" class="">Tanggal</label>
                                        <input type="date" name="editTglPrktkDuaThnDatas" class="form-control form-control-sm" id="editTglPrktkDuaThnData{{$dataLembaga->id_user}}" value="{{$dataLembaga->pdt_tanggal}}">
                                        <hr>
                                        <label for="" class="">Tempat</label><br>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="editTempatPrktkDuaThnDatas" id="editTempatPrktkDuaThnData{{$dataLembaga->id_user}}" value="Gereja Lokal" {{$dataLembaga->pdt_tempat == 'Gereja Lokal' ? 'checked' : '' }}>
                                          <label class="form-check-label" for="editTempatPrktkDuaThnData{{$dataLembaga->id_user}}">Gereja Lokal</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="editTempatPrktkDuaThnDatas" id="editTempatPrktkDuaThnLData{{$dataLembaga->id_user}}" value="Gereja Lain" {{$dataLembaga->pdt_tempat == 'Gereja Lain' ? 'checked' : '' }}>
                                          <label class="form-check-label" for="editTempatPrktkDuaThnLData{{$dataLembaga->id_user}}">Gereja Lain</label>
                                        </div>
                                        <hr>
                                        <label for="editFileUploadPrktkDuaThnData{{$dataLembaga->id_user}}" class="">File</label>
                                        <input type="file" name="editFileUploadPrktkDuaThnDatas" class="form-control form-control-sm" id="editFileUploadPrktkDuaThnData{{$dataLembaga->id_user}}" value="{{$dataLembaga->pdt_file}}">
                                        @error('editFileUploadPrktkDuaThnDatas')
                                          <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                            <p class="p-1 pb-0" style="font-size: 10pt;">
                                              <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                              {{ $message }}
                                            </p>
                                          </div>
                                        @enderror
                                        <hr>
                                        <label for="editKetPrktkDuaThnData{{$dataLembaga->id_user}}" class="">Keterangan</label>
                                        <textarea class="form-control form-control-sm" name="editKetPrktkDuaThnDatas" id="editKetPrktkDuaThnData{{$dataLembaga->id_user}}" rows="3" placeholder="Keterangan">{{$dataLembaga->pdt_ket}}</textarea>
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
                                    <label for="kata_sandiLamaData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Masukan Kata Sandi Lama</label>
                                    <div class="col-sm-9">
                                      <input class="form-control form-control-sm" type="password" name="kata_sandiLamaDatas" id="kata_sandiLamaData{{$dataLembaga->id_user}}" rows="3" placeholder="********">
                                      @error('kata_sandiLamaData')
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
                                    <label for="editKata_sandiData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Kata Sandi <span class="required-input">(*)</span></label>
                                    <div class="col-sm-9">
                                      <input class="form-control form-control-sm" type="password" name="editKata_sandiDatas" id="editKata_sandiData{{$dataLembaga->id_user}}" rows="3" placeholder="********">
                                      @error('editKata_sandiDatas')
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
                                    <label for="editKonfirmasi_kata_sandiData{{$dataLembaga->id_user}}" class="col-sm-3 px-1">Konfirmasi Kata Sandi <span class="required-input">(*)</span></label>
                                    <div class="col-sm-9">
                                      <input class="form-control form-control-sm" type="password" name="editKonfirmasi_kata_sandiDatas" id="editKonfirmasi_kata_sandiData{{$dataLembaga->id_user}}" rows="3" placeholder="********">
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
                                    <label for="editInstitusiData{{$dataLembaga->id_user}}" class="col-sm-3 px-1 form-label">Lembaga <span class="required-input">(*)</span></label>
                                    <div class="col-sm-9">
                                      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="editInstitusiDatas" id="editInstitusiData{{$dataLembaga->id_user}}">
                                        <option value="">-Lembaga-</option>
                                        <option value="PM (Parousia Ministry)" {{($dataLembaga->institusi == "PM (Parousia Ministry)" ? 'selected' : '')}}>PM (Parousia Ministry)</option>
                                        <option value="GKP (Gereja Kristen Parousia)" {{($dataLembaga->institusi == "GKP (Gereja Kristen Parousia)" ? 'selected' : '')}}>GKP (Gereja Kristen Parousia)</option>
                                      </select>
                                      @error('editInstitusiDatas')
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
                  <!-- End Modal Ubah Data -->
                  <!-- Modal Hapus Data -->
                  <div class="modal fade" id="hapusData{{$dataLembaga->id_user}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusData{{$dataLembaga->id_user}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusData{{$dataLembaga->id_user}}Label">
                            <i class="bi bi-trash text-danger"></i>
                            Hapus Data Lembaga
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('data-lembaga.destroy', $dataLembaga->id_user) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                            <p>Apa anda yakin ingin menghapus Data Lembaga {{$dataLembaga->nama_lengkap}} ini?</p>
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
      $('#bKetertarikanData').select2({
        placeholder: "Pilih Bidang Ketertarikan",
        allowClear: true,
        language: "id",
        dropdownParent: $("#tambahData")
      });

      
      $('#bKeterampilanData').select2({
        placeholder: "Pilih Bidang Keterampilan",
        allowClear: true,
        language: "id",
        dropdownParent: $("#tambahData")
      });

      
      $('#pilihanGSData').select2({
        placeholder: "Personality - MBTI",
        allowClear: true,
        language: "id",
        dropdownParent: $("#tambahData")
      });

      
      $('#pilihanGDData').select2({
        placeholder: "Personality - Holland",
        allowClear: true,
        language: "id",
        dropdownParent: $("#tambahData")
      });

      
      $('#pilihanGTData').select2({
        placeholder: "Spiritual Gifts",
        allowClear: true,
        language: "id",
        dropdownParent: $("#tambahData")
      });

      
      $('#pilihanGEData').select2({
        placeholder: "Abilities",
        allowClear: true,
        language: "id",
        dropdownParent: $("#tambahData")
      });

      
      $('#ExperienceData').select2({
        placeholder: "Experience",
        allowClear: true,
        language: "id",
        dropdownParent: $("#tambahData")
      });

      
      $('#pilihanGEnData').select2({
        placeholder: "Kemampuan Bahasa",
        allowClear: true,
        language: "id",
        dropdownParent: $("#tambahData")
      });

    });

    $(document).on('click', '#ubahDataButton', function () {
      var idUser = $(this).attr('data-user');
      // console.log(idUser);
      $('#editBKetertarikandataLembaga'+idUser).select2({
        placeholder: "Pilih Bidang Ketertarikan",
        allowClear: true,
        language: "id",
        dropdownParent: $("#ubahData"+idUser)
      });

      
      $('#editBKeterampilandataLembaga'+idUser).select2({
        placeholder: "Pilih Bidang Keterampilan",
        allowClear: true,
        language: "id",
        dropdownParent: $("#ubahData"+idUser)
      });

      
      $('#editPilihanGSdataLembaga'+idUser).select2({
        placeholder: "Personality - MBTI",
        allowClear: true,
        language: "id",
        dropdownParent: $("#ubahData"+idUser)
      });

      
      $('#editPilihanGDdataLembaga'+idUser).select2({
        placeholder: "Personality - Holland",
        allowClear: true,
        language: "id",
        dropdownParent: $("#ubahData"+idUser)
      });

      
      $('#editPilihanGTdataLembaga'+idUser).select2({
        placeholder: "Spiritual Gifts",
        allowClear: true,
        language: "id",
        dropdownParent: $("#ubahData"+idUser)
      });

      
      $('#editPilihanGEdataLembaga'+idUser).select2({
        placeholder: "Abilities",
        allowClear: true,
        language: "id",
        dropdownParent: $("#ubahData"+idUser)
      });

      
      $('#editExperienceDataLembaga'+idUser).select2({
        placeholder: "Pilihan Ganda Lima",
        allowClear: true,
        language: "id",
        dropdownParent: $("#ubahData"+idUser)
      });

      
      $('#editPilihanGEndataLembaga'+idUser).select2({
        placeholder: "Kemampuan Bahasa",
        allowClear: true,
        language: "id",
        dropdownParent: $("#ubahData"+idUser)
      });

    
      $('#editUntukPendataan'+idUser).on('change', function(){
        var isiData = $(this).val(); 
        if (isiData == "Beasiswa") {
          $("div.divTampilEdit1"+idUser).show();
          $("div.divTampilEdit2"+idUser).show();
          $("div.divTampilEdit3"+idUser).show();
          $("div.divTampilEdit4"+idUser).show();
          $("div.divTampilEdit5"+idUser).show();
          $("div.divTampilEdit6"+idUser).show();
          $("div.divTampilEdit7"+idUser).show();
          $("div.divTampilEdit8"+idUser).show();
          $("div.divTampilEdit9"+idUser).show();
          $("div.divTampilEdit10"+idUser).show();
          $("div.divTampilEdit11"+idUser).show();
          $("#sembunyiDataEdit1"+idUser).hide();
          $("#sembunyiDataEdit2"+idUser).hide();
          $("#sembunyiDataEdit3"+idUser).hide();
          $("#sembunyiDataEdit4"+idUser).hide();
          $("#sembunyiDataEdit5"+idUser).hide();
          $("#sembunyiDataEdit6"+idUser).hide();
          $("#sembunyiDataEdit7"+idUser).hide();
          $("#sembunyiDataEdit8"+idUser).hide();
          $("#sembunyiDataEdit9"+idUser).hide();
          $("#sembunyiDataEdit10"+idUser).hide();
          $("#sembunyiDataEdit11"+idUser).hide();
        } else {
          $("div.divTampilEdit1"+idUser).show();
          $("div.divTampilEdit2"+idUser).show();
          $("div.divTampilEdit3"+idUser).show();
          $("div.divTampilEdit4"+idUser).show();
          $("div.divTampilEdit5"+idUser).show();
          $("div.divTampilEdit6"+idUser).show();
          $("div.divTampilEdit7"+idUser).show();
          $("div.divTampilEdit8"+idUser).show();
          $("div.divTampilEdit9"+idUser).show();
          $("div.divTampilEdit10"+idUser).show();
          $("div.divTampilEdit11"+idUser).show();
        }

        if (isiData == "Beasiswa" || isiData == "Utusan") {
          $("div.divTampilEdit12"+idUser).show();
        } else {
          $("#sembunyiDataEdit12"+idUser).hide();
        }
      });

      
      var e = 0;
      $("#editTambahNominal"+idUser).click(function(){
        ++e;
        $("#editInputNominal"+idUser).append('<div class="position-relative mt-1" id="editInputNominalTambah'+idUser+e+'"><div class="position-absolute top-50 start-100 ms-1 translate-middle-y"><button type="button" class="btn btn-transparent p-0 editHapusNominal'+idUser+'" id="'+e+'"><i class="bi bi-x-circle fs-5 text-danger d-inline"></i></button></div><div class="row"><div class="col-6"><input type="text" name="editTambahNominals['+e+'][ket_nominal]" class="form-control form-control-sm" id="editKetNominal" placeholder="Keterangan Nominal"></div><div class="col-6"><input type="text" name="editTambahNominals['+e+'][nominal]" class="form-control form-control-sm" id="editNominals" placeholder="Nominal"></div></div></div>');
      });
      
      $(document).on('click', '.editHapusNominal'+idUser, function(){   
        var button_id = $(this).attr("id");   
        $('#editInputNominalTambah'+idUser+button_id+'').remove(); 
      });

    });
    
    $(document).ready(function(){
      $('#untukPendataan').on('change', function(){
        var isiData = $(this).val(); 
        if (isiData == "Beasiswa") {
          $("div.divTampil1").show();
          $("div.divTampil2").show();
          $("div.divTampil3").show();
          $("div.divTampil4").show();
          $("div.divTampil5").show();
          $("div.divTampil6").show();
          $("div.divTampil7").show();
          $("div.divTampil8").show();
          $("div.divTampil9").show();
          $("div.divTampil10").show();
          $("div.divTampil11").show();
          $("#sembunyiData1").hide();
          $("#sembunyiData2").hide();
          $("#sembunyiData3").hide();
          $("#sembunyiData4").hide();
          $("#sembunyiData5").hide();
          $("#sembunyiData6").hide();
          $("#sembunyiData7").hide();
          $("#sembunyiData8").hide();
          $("#sembunyiData9").hide();
          $("#sembunyiData10").hide();
          $("#sembunyiData11").hide();
        } else {
          $("div.divTampil1").show();
          $("div.divTampil2").show();
          $("div.divTampil3").show();
          $("div.divTampil4").show();
          $("div.divTampil5").show();
          $("div.divTampil6").show();
          $("div.divTampil7").show();
          $("div.divTampil8").show();
          $("div.divTampil9").show();
          $("div.divTampil10").show();
          $("div.divTampil11").show();
        }

        if (isiData == "Beasiswa" || isiData == "Utusan") {
          $("div.divTampilEdit12").show();
        } else {
          $("#sembunyiDataEdit12").hide();
        }
      });
    });


    var i = 0;
    $("#tambahNominal").click(function(){
      ++i;
      $("#inputNominal").append('<div class="position-relative mt-1" id="inputNominalTambah'+i+'"><div class="position-absolute top-50 start-100 ms-1 translate-middle-y"><button type="button" class="btn btn-transparent p-0 hapusNominal" id="'+i+'"><i class="bi bi-x-circle fs-5 text-danger d-inline"></i></button></div><div class="row"><div class="col-6"><input type="text" name="tambahNominals['+i+'][ket_nominal]" class="form-control form-control-sm" id="ketNominal" placeholder="Keterangan Nominal"></div><div class="col-6"><input type="text" name="tambahNominals['+i+'][nominal]" class="form-control form-control-sm" id="nominal" placeholder="Nominal"></div></div></div>');
    });
   
    $(document).on('click', '.hapusNominal', function(){   
      var button_id = $(this).attr("id");   
      $('#inputNominalTambah'+button_id+'').remove(); 
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