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
    <a class="nav-link collapsed" href="{{route('data-pengurus.index')}}">
      <i class="bi bi-person"></i>
      <span>Data Pengurus</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('data-ketua-lokasi.index')}}">
      <i class="bi bi-person-circle"></i>
      <span>Data Ketua Lokasi</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('data-ketua-kelompok.index')}}" class="active">
      <i class="bi bi-person-square"></i>
      <span>Data Ketua Kelompok</span>
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
    <h1>Data Ketua Kelompok</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/admin')}}">Admin</a></li>
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
                      <form action="{{ route('data-ketua-kelompok.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group-input">
                          <div class="form-header-group mb-3">
                            <h6>PERSONAL</h6>
                          </div>
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="idKetuaKelompok" class="col-sm-3 px-1">ID</label>
                                <div class="col-sm-9">
                                  <input type="text" name="idKetuaKelompoks" class="form-control form-control-sm" id="idKetuaKelompok" placeholder="ID">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="tglRegistrasiKetuaKelompok" class="col-sm-3 px-1">Tgl Registrasi <span class="required-input">(*)</span></label>
                                <div class="col-sm-9">
                                  <input type="date" name="tglRegistrasiKetuaKelompoks" class="form-control form-control-sm" id="tglRegistrasiKetuaKelompok">
                                  @error('tglRegistrasiKetuaKelompoks')
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
                                <label for="referensiKetuaKelompok" class="col-sm-3 px-1">Referensi Dari</label>
                                <div class="col-sm-9">
                                  <input type="text" name="referensiKetuaKelompoks" class="form-control form-control-sm" id="referensiKetuaKelompok" placeholder="Referensi Dari">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="sapaanKetuaKelompok" class="col-sm-3 px-1">Sapaan</label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="sapaanKetuaKelompoks" id="sapaanKetuaKelompok" aria-label=".form-select-sm sapaanKetuaKelompok">
                                    <option value="">-Sapaan-</option>
                                    <option value="Bapak">Bapak</option>
                                    <option value="Ibu">Ibu</option>
                                  </select>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="gelarAwalanKetuaKelompok" class="col-sm-3 px-1">Gelar Awalan</label>
                                <div class="col-sm-9">
                                  <input type="text" name="gelarAwalanKetuaKelompoks" class="form-control form-control-sm" id="gelarAwalanKetuaKelompok" placeholder="Gelar Awalan">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="namaKetuaKelompok" class="col-sm-3 px-1">Nama Lengkap <span class="required-input">(*)</span></label>
                                <div class="col-sm-9">
                                  <input type="text" name="namaKetuaKelompoks" class="form-control form-control-sm" id="namaKetuaKelompok" placeholder="cth: Angelica Gabriel">
                                  @error('namaKetuaKelompoks')
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
                                <label for="gelarAkhiranKetuaKelompok" class="col-sm-3 px-1">Gelar Akhiran</label>
                                <div class="col-sm-9">
                                  <input type="text" name="gelarAkhiranKetuaKelompoks" class="form-control form-control-sm" id="gelarAkhiranKetuaKelompok" placeholder="Gelar Akhiran">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="namaPanggilanKetuaKelompok" class="col-sm-3 px-1">Nama Panggilan</label>
                                <div class="col-sm-9">
                                  <input type="text" name="namaPanggilanKetuaKelompoks" class="form-control form-control-sm" id="namaPanggilanKetuaKelompok" placeholder="cth: Angel">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="peranKetuaKelompok" class="col-sm-3 px-1">Peran dalam Keluarga</label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="peranKetuaKelompoks" id="peranKetuaKelompok" aria-label=".form-select-sm peranKetuaKelompok">
                                    <option value="">-Peran dalam Keluarga-</option>
                                    <option value="Kepala Keluarga">Kepala Keluarga</option>
                                    <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                  </select>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="jenisIdentitasKetuaKelompok" class="col-sm-3 px-1">Jenis Identitas</label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="jenisIdentitasKetuaKelompoks" id="jenisIdentitasKetuaKelompok" aria-label=".form-select-sm jenisIdentitasKetuaKelompok">
                                    <option value="">-Jenis Identitas-</option>
                                    <option value="KTP">KTP</option>
                                    <option value="SIM">SIM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="noIdentitasKetuaKelompok" class="col-sm-3 px-1">No. Identitas</label>
                                <div class="col-sm-9">
                                  <input type="text" name="noIdentitasKetuaKelompoks" class="form-control form-control-sm" id="noIdentitasKetuaKelompok" placeholder="cth: 12*********">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="tempatLahirKetuaKelompok" class="col-sm-3 px-1">Tempat, Tgl Lahir</label>
                                <div class="col-sm-5">
                                  <input type="text" name="tempatLahirKetuaKelompoks" class="form-control form-control-sm" id="tempatLahirKetuaKelompok" placeholder="cth: Bandung">
                                </div>
                                <div class="col-sm-1">
                                  <p>/</p>
                                </div>
                                <div class="col-sm-3">
                                  <input type="date" name="tglLahirKetuaKelompoks" class="form-control form-control-sm" id="tglLahirKetuaKelompok">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="jenisKelaminKetuaKelompok" class="col-sm-3 px-1">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenisKelaminKetuaKelompoks" id="jenisKelaminPKetuaKelompok" value="Pria">
                                    <label class="form-check-label" for="jenisKelaminPKetuaKelompok">Pria</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenisKelaminKetuaKelompoks" id="jenisKelaminWKetuaKelompok" value="Wanita">
                                    <label class="form-check-label" for="jenisKelaminWKetuaKelompok">Wanita</label>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="golonganDarahKetuaKelompok" class="col-sm-3 px-1">Golongan Darah</label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="golonganDarahKetuaKelompoks" id="golonganDarahKetuaKelompok" aria-label=".form-select-sm golonganDarahKetuaKelompok">
                                    <option value="">-Golongan Darah-</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                  </select>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="statusPernikahanKetuaKelompok" class="col-sm-3 px-1">Status Pernikahan</label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="statusPernikahanKetuaKelompoks" id="statusPernikahanKetuaKelompok" aria-label=".form-select-sm statusPernikahanKetuaKelompok">
                                    <option value="">-Status Pernikahan-</option>
                                    <option value="Cerai">Cerai</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                  </select>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="fotoKetuaKelompok" class="col-sm-3 px-1">Foto</label>
                                <div class="col-sm-9">
                                  <input type="file" name="fotoKetuaKelompoks" class="form-control form-control-sm" id="fotoKetuaKelompok">
                                  @error('fotoKetuaKelompoks')
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
                                <label for="fotoBitmapKetuaKelompok" class="col-sm-3 px-1">Foto Bitmap</label>
                                <div class="col-sm-9">
                                  <input type="file" name="fotoBitmapKetuaKelompoks" class="form-control form-control-sm" id="fotoBitmapKetuaKelompok">
                                  @error('fotoBitmapKetuaKelompoks')
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
                                <label for="alamatKetuaKelompok" class="col-sm-3 px-1">Alamat</label>
                                <div class="col-sm-9">
                                  <input type="text" name="alamatKetuaKelompoks" class="form-control form-control-sm" id="alamatKetuaKelompok" placeholder="Alamat">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="keteranganArahKetuaKelompok" class="col-sm-3 px-1">Keterangan Arah</label>
                                <div class="col-sm-9">
                                  <textarea class="form-control form-control-sm" name="keteranganArahKetuaKelompoks" id="keteranganArahKetuaKelompok" rows="3" placeholder="Keterangan Arah"></textarea>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="petaKetuaKelompok" class="col-sm-3 px-1">Peta</label>
                                <div class="col-sm-9">
                                  <input type="text" name="petaKetuaKelompoks" class="form-control form-control-sm" id="petaKetuaKelompok" placeholder="Peta">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="negaraKetuaKelompok" class="col-sm-3 px-1">Negara</label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="negaraKetuaKelompoks" id="negaraKetuaKelompok" aria-label=".form-select-sm negaraKetuaKelompok">
                                    <option value="">-Negara-</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="USA">USA</option>
                                    <option value="England">England</option>
                                  </select>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="provinsiKetuaKelompok" class="col-sm-3 px-1">Provinsi</label>
                                <div class="col-sm-9">
                                  <input type="text" name="provinsiKetuaKelompoks" class="form-control form-control-sm" id="provinsiKetuaKelompok" placeholder="Provinsi">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="kotaKetuaKelompok" class="col-sm-3 px-1">Kota</label>
                                <div class="col-sm-9">
                                  <input type="text" name="kotaKetuaKelompoks" class="form-control form-control-sm" id="kotaKetuaKelompok" placeholder="Kota">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="kecamatanKetuaKelompok" class="col-sm-3 px-1">Kecamatan</label>
                                <div class="col-sm-9">
                                  <input type="text" name="kecamatanKetuaKelompoks" class="form-control form-control-sm" id="kecamatanKetuaKelompok" placeholder="Kecamatan">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="kelurahanKetuaKelompok" class="col-sm-3 px-1">Kelurahan</label>
                                <div class="col-sm-9">
                                  <input type="text" name="kelurahanKetuaKelompoks" class="form-control form-control-sm" id="kelurahanKetuaKelompok" placeholder="Kelurahan">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="kodePosKetuaKelompok" class="col-sm-3 px-1">Kode Pos</label>
                                <div class="col-sm-9">
                                  <input type="text" name="kodePosKetuaKelompoks" class="form-control form-control-sm" id="kodePosKetuaKelompok" placeholder="Kode Pos">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="dusunKetuaKelompok" class="col-sm-3 px-1">Dusun (Desa)</label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="dusunKetuaKelompoks" aria-label=".form-select-sm dusunKetuaKelompok">
                                    <option value="">-Dusun (desa)-</option>
                                  </select>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="rtRwKetuaKelompok" class="col-sm-3 px-1">RT / RW</label>
                                <div class="col-sm-4">
                                  <input type="text" name="rtKetuaKelompoks" class="form-control form-control-sm" id="rtRwKetuaKelompok" placeholder="RT">
                                </div>
                                <div class="col-sm-1">
                                  <p>/</p>
                                </div>
                                <div class="col-sm-4">
                                  <input type="text" name="rwKetuaKelompoks" class="form-control form-control-sm" id="rtRwKetuaKelompok" placeholder="RW">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="areaKetuaKelompok" class="col-sm-3 px-1">Area</label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="areaKetuaKelompoks" id="areaKetuaKelompok" aria-label=".form-select-sm areaKetuaKelompok">
                                    <option value="">-Area-</option>
                                    <option value="021">021</option>
                                    <option value="022">022</option>
                                  </select>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="lokasiKK" class="col-sm-3 px-1">Lokasi</label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="lokasiKKs" id="lokasiKK" aria-label=".form-select-sm lokasiKK">
                                    <option value="">-Lokasi-</option>
                                    @foreach ($lokasis as $lokasi)
                                      <option value="{{$lokasi->nama_lokasi}}">{{$lokasi->nama_lokasi}}</option>
                                    @endforeach
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
                                <label for="noTelpSKetuaKelompok" class="col-sm-3 px-1">No Telp 1</label>
                                <div class="col-sm-9">
                                  <input type="text" name="noTelpSKetuaKelompoks" class="form-control form-control-sm" id="noTelpSKetuaKelompok" placeholder="cth: +62">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="telpRumahKetuaKelompok" class="col-sm-3 px-1">Telp. Rumah 2</label>
                                <div class="col-sm-9">
                                  <input type="text" name="telpRumahKetuaKelompoks" class="form-control form-control-sm" id="telpRumahKetuaKelompok" placeholder="cth: +622174130258">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="noHpSKetuaKelompok" class="col-sm-3 px-1">No HP 1</label>
                                <div class="col-sm-9">
                                  <input type="text" name="noHpSKetuaKelompoks" class="form-control form-control-sm" id="noHpSKetuaKelompok" placeholder="cth: +62">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="terimaSMSKetuaKelompok" class="col-sm-3 px-1">Bisa Terima SMS?</label>
                                <div class="col-sm-9 pt-1">
                                  <div class="form-check form-switch">
                                    <input class="form-check-input" name="terimaSMSKetuaKelompoks" type="checkbox" id="terimaSMSKetuaKelompok" value="Ya">
                                    <label class="form-check-label" for="terimaSMSKetuaKelompok">Ya</label>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="noHpDKetuaKelompok" class="col-sm-3 px-1">No HP 2</label>
                                <div class="col-sm-9">
                                  <input type="text" name="noHpDKetuaKelompoks" class="form-control form-control-sm" id="noHpDKetuaKelompok" placeholder="cth: +62856789456">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="noLainKetuaKelompok" class="col-sm-3 px-1">No Lainnya</label>
                                <div class="col-sm-9">
                                  <input type="text" name="noLainKetuaKelompoks" class="form-control form-control-sm" id="noLainKetuaKelompok" placeholder="mis: Pin BB">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="faxKetuaKelompok" class="col-sm-3 px-1">Fax. Rumah</label>
                                <div class="col-sm-9">
                                  <input type="text" name="faxKetuaKelompoks" class="form-control form-control-sm" id="faxKetuaKelompok" placeholder="FAX">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="emailKetuaKelompok" class="col-sm-3 px-1">Email</label>
                                <div class="col-sm-9">
                                  <input type="email" name="emailKetuaKelompoks" class="form-control form-control-sm" id="emailKetuaKelompok" placeholder="cth: email@gmail.com">
                                  @if ($message = Session::get('error'))
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @endif
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="terimaEmailKetuaKelompok" class="col-sm-3 px-1">Bisa Terima Email?</label>
                                <div class="col-sm-9 pt-1">
                                  <div class="form-check form-switch">
                                    <input class="form-check-input" name="terimaEmailKetuaKelompoks" type="checkbox" id="terimaEmailKetuaKelompok" value="Ya">
                                    <label class="form-check-label" for="terimaEmailKetuaKelompok">Ya</label>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="websiteKetuaKelompok" class="col-sm-3 px-1">Website</label>
                                <div class="col-sm-9">
                                  <input type="text" name="websiteKetuaKelompoks" class="form-control form-control-sm" id="websiteKetuaKelompok" placeholder="cth: Facebook, Twitter, etc">
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
                                <label for="pekerjaanKetuaKelompok" class="col-sm-3 px-1">Pekerjaan</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select form-select-sm" name="pekerjaanKetuaKelompoks" id="pekerjaanKetuaKelompok" aria-label=".form-select-sm pekerjaanKetuaKelompok">
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
                                <label for="jabatanKetuaKelompok" class="col-sm-3 px-1">Jabatan Dalam Pekerjaan</label>
                                <div class="col-sm-9">
                                  <input type="text" name="jabatanKetuaKelompoks" class="form-control form-control-sm" id="jabatanKetuaKelompok" placeholder="cth: Manager, Staff, etc">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="statusPekerjaanKetuaKelompok" class="col-sm-3 px-1">Status Pekerjaan</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select form-select-sm" name="statusPekerjaanKetuaKelompoks" id="statusPekerjaanKetuaKelompok" aria-label=".form-select-sm statusPekerjaanKetuaKelompok">
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
                                <label for="namaPerusahaanKetuaKelompok" class="col-sm-3 px-1">Nama Perusahaan</label>
                                <div class="col-sm-9">
                                  <input type="text" name="namaPerusahaanKetuaKelompoks" class="form-control form-control-sm" id="namaPerusahaanKetuaKelompok" placeholder="Nama Perusahaan">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="sektorIndustriKetuaKelompok" class="col-sm-3 px-1">Sektor Industri</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select form-select-sm" name="sektorIndustriKetuaKelompoks" id="sektorIndustriKetuaKelompok" aria-label=".form-select-sm sektorIndustriKetuaKelompok">
                                      <option>-Sektor Industri-</option>
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
                                <label for="alamatKantorKetuaKelompok" class="col-sm-3 px-1">Alamat Kantor</label>
                                <div class="col-sm-9">
                                  <input type="text" name="alamatKantorKetuaKelompoks" class="form-control form-control-sm" id="alamatKantorKetuaKelompok" placeholder="Alamat Kantor">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="telpKantorKetuaKelompok" class="col-sm-3 px-1">Telp. Kantor</label>
                                <div class="col-sm-9">
                                  <input type="text" name="telpKantorKetuaKelompoks" class="form-control form-control-sm" id="telpKantorKetuaKelompok" placeholder="cth: +62">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="extKetuaKelompok" class="col-sm-3 px-1">Ext.</label>
                                <div class="col-sm-9">
                                  <input type="text" name="extKetuaKelompoks" class="form-control form-control-sm" id="extKetuaKelompok" placeholder="EXT">
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
                                <label for="tingkatPendidikanKetuaKelompok" class="col-sm-3 px-1">Tingkat Pendidikan</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select form-select-sm" name="tingkatPendidikanKetuaKelompoks" id="tingkatPendidikanKetuaKelompok" aria-label="form-select-sm tingkatPendidikanKetuaKelompok">
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
                                <label for="sekolahKetuaKelompok" class="col-sm-3 px-1">Sekolah/Univ (Saat ini Ditempuh)</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select form-select-sm" name="sekolahKetuaKelompoks" id="sekolahKetuaKelompok" aria-label="form-select-sm sekolahKetuaKelompok">
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
                                <label for="bKetertarikanKetuaKelompok" class="col-sm-3 px-1">Bidang Ketertarikan</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-control" name="bKetertarikanKetuaKelompoks[]" style="width: 100%;" id="bKetertarikanKetuaKelompok" aria-label="multiple select bKetertarikanKetuaKelompok" multiple>
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
                                <label for="bKeterampilanKetuaKelompok" class="col-sm-3 px-1">Bidang Keterampilan</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-control" name="bKeterampilanKetuaKelompoks[]" id="bKeterampilanKetuaKelompok" style="width: 100%;" aria-label="multiple select bKeterampilanKetuaKelompok" multiple>
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
                                <label for="catatanKetuaKelompok" class="col-sm-3 px-1">Catatan</label>
                                <div class="col-sm-9">
                                  <textarea class="form-control form-control-sm" name="catatanKetuaKelompoks" id="catatanKetuaKelompok" rows="3" placeholder="Catatan"></textarea>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="statusKetuaKelompok" class="col-sm-3 px-1">Status</label>
                                <div class="col-sm-9">
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="statusKetuaKelompoks" id="statusAKetuaKelompok" value="Aktif">
                                    <label class="form-check-label" for="statusAKetuaKelompok">Aktif</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="statusKetuaKelompoks" id="statusTaKetuaKelompok" value="Tidak Aktif">
                                    <label class="form-check-label" for="statusTaKetuaKelompok">Tidak Aktif</label>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="verifEmailKetuaKelompok" class="col-sm-3 px-1">Email Sudah Verifikasi?</label>
                                <div class="col-sm-9 pt-1">
                                  <div class="form-check form-switch">
                                    <input class="form-check-input" name="verifEmailKetuaKelompoks" type="checkbox" id="verifEmailKetuaKelompok" value="Ya">
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
                                <label for="noRekKetuaKelompok" class="col-sm-3 px-1">Nomor Rekening</label>
                                <div class="col-sm-9">
                                  <input type="text" name="noRekKetuaKelompoks" class="form-control form-control-sm" id="noRekKetuaKelompok" placeholder="123456789">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="perBeasiswaKetuaKelompok" class="col-sm-3 px-1">Periode Beasiswa</label>
                                <div class="col-sm-9">
                                  <input type="text" name="perBeasiswaKetuaKelompoks" class="form-control form-control-sm" id="perBeasiswaKetuaKelompok" placeholder="Periode Beasiswa">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="perKerjaPKetuaKelompok" class="col-sm-3 px-1">Periode Kerja Praktik</label>
                                <div class="col-sm-9">
                                  <input type="text" name="perKerjaPKetuaKelompoks" class="form-control form-control-sm" id="perKerjaPKetuaKelompok" placeholder="Periode Kerja Praktik">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="riwayatPelSKetuaKelompok" class="col-sm-3 px-1">Riwayat Pelayanan 1</label>
                                <div class="col-sm-9">
                                  <input type="text" name="riwayatPelSKetuaKelompoks" class="form-control form-control-sm" id="riwayatPelSKetuaKelompok" placeholder="Riwayat Pelayanan 1">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="riwayatPelDKetuaKelompok" class="col-sm-3 px-1">Riwayat Pelayanan 2</label>
                                <div class="col-sm-9">
                                  <input type="text" name="riwayatPelDKetuaKelompoks" class="form-control form-control-sm" id="riwayatPelDKetuaKelompok" placeholder="Riwayat Pelayanan 2">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="riwayatPelTKetuaKelompok" class="col-sm-3 px-1">Riwayat Pelayanan 3</label>
                                <div class="col-sm-9">
                                  <input type="text" name="riwayatPelTKetuaKelompoks" class="form-control form-control-sm" id="riwayatPelTKetuaKelompok" placeholder="Riwayat Pelayanan 3">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="riwayatPelEKetuaKelompok" class="col-sm-3 px-1">Riwayat Pelayanan 4</label>
                                <div class="col-sm-9">
                                  <input type="text" name="riwayatPelEKetuaKelompoks" class="form-control form-control-sm" id="riwayatPelEKetuaKelompok" placeholder="Riwayat Pelayanan 4">
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
                                <label for="pilihanSKetuaKelompok" class="col-sm-3 px-1"></label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select form-select-sm" name="pilihanSKetuaKelompoks" id="pilihanSKetuaKelompok" aria-label=".form-select-sm pilihanSKetuaKelompok">
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
                                <label for="pilihanDKetuaKelompok" class="col-sm-3 px-1"></label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select form-select-sm" name="pilihanDKetuaKelompoks" id="pilihanDKetuaKelompok" aria-label=".form-select-sm pilihanDKetuaKelompok">
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
                                <label for="pilihanTKetuaKelompok" class="col-sm-3 px-1"></label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select form-select-sm" name="pilihanTKetuaKelompoks" id="pilihanTKetuaKelompok" aria-label=".form-select-sm pilihanTKetuaKelompok">
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
                                <label for="pilihanEKetuaKelompok" class="col-sm-3 px-1"></label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select form-select-sm" name="pilihanEKetuaKelompoks" id="pilihanEKetuaKelompok" aria-label=".form-select-sm pilihanEKetuaKelompok">
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
                                <label for="pilihanLKetuaKelompok" class="col-sm-3 px-1"></label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select form-select-sm" name="pilihanLKetuaKelompoks" id="pilihanLKetuaKelompok" aria-label=".form-select-sm pilihanLKetuaKelompok">
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
                                <label for="pilihanEnKetuaKelompok" class="col-sm-3 px-1"></label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select form-select-sm" name="pilihanEnKetuaKelompoks" id="pilihanEnKetuaKelompok" aria-label=".form-select-sm pilihanEnKetuaKelompok">
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
                                <label for="pilihanTuKetuaKelompok" class="col-sm-3 px-1"></label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select form-select-sm" name="pilihanTuKetuaKelompoks" id="pilihanTuKetuaKelompok" aria-label=".form-select-sm pilihanTuKetuaKelompok">
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
                        <div class="form-group-input">
                          <div class="form-header-group mb-3">
                            <h6>KOLOM CADANGAN (PILIHAN GANDA)</h6>
                          </div>
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="pilihanGSKetuaKelompok" class="col-sm-3 px-1">Personality - MBTI</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select" name="pilihanGSKetuaKelompoks[]" style="width: 100%;" id="pilihanGSKetuaKelompok" aria-label="multiple select pilihanGSKetuaKelompok" multiple>
                                      <option>-Personality - MBTI-</option>
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
                                <label for="pilihanGDKetuaKelompok" class="col-sm-3 px-1">Personality - Holland</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select" name="pilihanGDKetuaKelompoks[]" style="width: 100%;" id="pilihanGDKetuaKelompok" aria-label="multiple select pilihanGDKetuaKelompok" multiple>
                                      <option>-Personality - Holland</option>
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
                                <label for="pilihanGTKetuaKelompok" class="col-sm-3 px-1">Spiritual Gifts</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select" name="pilihanGTKetuaKelompoks[]" style="width: 100%;" id="pilihanGTKetuaKelompok" aria-label="multiple select pilihanGTKetuaKelompok" multiple>
                                      <option>-Spiritual Gifts-</option>
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
                                <label for="pilihanGEKetuaKelompok" class="col-sm-3 px-1">Abilities</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select" name="pilihanGEKetuaKelompoks[]" style="width: 100%;" id="pilihanGEKetuaKelompok" aria-label="multiple select pilihanGEKetuaKelompok" multiple>
                                      <option>-Abilities-</option>
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
                                <label for="pilihanGLKetuaKelompok" class="col-sm-3 px-1">Ganda 5</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select" name="pilihanGLKetuaKelompoks[]" style="width: 100%;" id="pilihanGLKetuaKelompok" aria-label="multiple select pilihanGLKetuaKelompok" multiple>
                                      <option>-Ganda Lima-</option>
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
                                <label for="pilihanGEnKetuaKelompok" class="col-sm-3 px-1">Kemampuan Bahasa</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select" name="pilihanGEnKetuaKelompoks[]" style="width: 100%;" id="pilihanGEnKetuaKelompok" aria-label="multiple select pilihanGEnKetuaKelompok" multiple>
                                      <option>-Kemampuan Bahasa-</option>
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
                                <label for="pilihanGTuKetuaKelompok" class="col-sm-3 px-1">Pernah menderita penyakit</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select" name="pilihanGTuKetuaKelompoks[]" style="width: 100%;" id="pilihanGTuKetuaKelompok" aria-label="multiple select pilihanGTuKetuaKelompok" multiple>
                                      <option>-Pernah Menderita Penyakit-</option>
                                      @foreach ($penyakits as $penyakit)
                                        <option value="{{$penyakit->penyakit}}">{{$penyakit->penyakit}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="col-1">
                                    <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah List Penyakit" class="fs-5">
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
                                <label for="checkSKetuaKelompok" class="col-sm-3 px-1"></label>
                                <div class="col-sm-9 pt-1">
                                  <div class="form-check form-switch">
                                    <input class="form-check-input" name="checkSKetuaKelompoks" type="checkbox" id="checkSKetuaKelompok" value="Ya">
                                    <label class="form-check-label" for="checkSKetuaKelompok">Ya</label>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="checkDKetuaKelompok" class="col-sm-3 px-1"></label>
                                <div class="col-sm-9 pt-1">
                                  <div class="form-check form-switch">
                                    <input class="form-check-input" name="checkDKetuaKelompoks" type="checkbox" id="checkDKetuaKelompok" value="Ya">
                                    <label class="form-check-label" for="checkDKetuaKelompok">Ya</label>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="checkTKetuaKelompok" class="col-sm-3 px-1"></label>
                                <div class="col-sm-9 pt-1">
                                  <div class="form-check form-switch">
                                    <input class="form-check-input" name="checkTKetuaKelompoks" type="checkbox" id="checkTKetuaKelompok" value="Ya">
                                    <label class="form-check-label" for="checkTKetuaKelompok">Ya</label>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="checkEKetuaKelompok" class="col-sm-3 px-1"></label>
                                <div class="col-sm-9 pt-1">
                                  <div class="form-check form-switch">
                                    <input class="form-check-input" name="checkEKetuaKelompoks" type="checkbox" id="checkEKetuaKelompok" value="Ya">
                                    <label class="form-check-label" for="checkEKetuaKelompok">Ya</label>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="checkLKetuaKelompok" class="col-sm-3 px-1"></label>
                                <div class="col-sm-9 pt-1">
                                  <div class="form-check form-switch">
                                    <input class="form-check-input" name="checkLKetuaKelompoks" type="checkbox" id="checkLKetuaKelompok" value="Ya">
                                    <label class="form-check-label" for="checkLKetuaKelompok">Ya</label>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="checkEnKetuaKelompok" class="col-sm-3 px-1"></label>
                                <div class="col-sm-9 pt-1">
                                  <div class="form-check form-switch">
                                    <input class="form-check-input" name="checkEnKetuaKelompoks" type="checkbox" id="checkEnKetuaKelompok" value="Ya">
                                    <label class="form-check-label" for="checkEnKetuaKelompok">Ya</label>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="checkTuKetuaKelompok" class="col-sm-3 px-1"></label>
                                <div class="col-sm-9 pt-1">
                                  <div class="form-check form-switch">
                                    <input class="form-check-input" name="checkTuKetuaKelompoks" type="checkbox" id="checkTuKetuaKelompok" value="Ya">
                                    <label class="form-check-label" for="checkTuKetuaKelompok">Ya</label>
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
                                    <input class="form-check-input" name="sudahBaptisAnakKetuaKelompoks" type="checkbox" value="Sudah" id="sudahBaptisAnakKetuaKelompok">
                                    <label class="form-check-label" for="sudahBaptisAnakKetuaKelompok">
                                      Sudah
                                    </label>
                                  </div>
                                  <hr>
                                  <label for="tglBaptisAnakKetuaKelompok" class="">Tanggal</label>
                                  <input type="date" name="tglBaptisAnakKetuaKelompoks" class="form-control form-control-sm" id="tglBaptisAnakKetuaKelompok">
                                  <hr>
                                  <label for="" class="">Tempat</label><br>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatBaptisAnakKetuaKelompoks" id="tempatBaptisAnakKetuaKelompok" value="Gereja Lokal">
                                    <label class="form-check-label" for="tempatBaptisAnakKetuaKelompok">Gereja Lokal</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatBaptisAnakKetuaKelompoks" id="tempatBaptisAnakLKetuaKelompok" value="Gereja Lain">
                                    <label class="form-check-label" for="tempatBaptisAnakLKetuaKelompok">Gereja Lain</label>
                                  </div>
                                  <hr>
                                  <label for="fileUploadBaptisAnakKetuaKelompok" class="">File</label>
                                  <input type="file" name="fileUploadBaptisAnakKetuaKelompoks" class="form-control form-control-sm" id="fileUploadBaptisAnakKetuaKelompok">
                                  @error('fileUploadBaptisAnakKetuaKelompoks')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                  <hr>
                                  <label for="ketBaptisAnakKetuaKelompok" class="">Keterangan</label>
                                  <textarea class="form-control form-control-sm" name="ketBaptisAnakKetuaKelompoks" id="ketBaptisAnakKetuaKelompok" rows="3" placeholder="Keterangan"></textarea>
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
                                    <input class="form-check-input" name="sudahMenikahKetuaKelompoks" type="checkbox" value="Sudah" id="sudahMenikahKetuaKelompok">
                                    <label class="form-check-label" for="sudahMenikahKetuaKelompok">
                                      Sudah
                                    </label>
                                  </div>
                                  <hr>
                                  <label for="tglMenikahKetuaKelompok" class="">Tanggal</label>
                                  <input type="date" name="tglMenikahKetuaKelompoks" class="form-control form-control-sm" id="tglMenikahKetuaKelompok">
                                  <hr>
                                  <label for="" class="">Tempat</label><br>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatMenikahKetuaKelompoks" id="tempatMenikahKetuaKelompok" value="Gereja Lokal">
                                    <label class="form-check-label" for="tempatMenikahKetuaKelompok">Gereja Lokal</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatMenikahKetuaKelompoks" id="tempatMenikahLKetuaKelompok" value="Gereja Lain">
                                    <label class="form-check-label" for="tempatMenikahLKetuaKelompok">Gereja Lain</label>
                                  </div>
                                  <hr>
                                  <label for="fileUploadMenikahKetuaKelompok" class="">File</label>
                                  <input type="file" name="fileUploadMenikahKetuaKelompoks" class="form-control form-control-sm" id="fileUploadMenikahKetuaKelompok">
                                  @error('fileUploadMenikahKetuaKelompoks')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                  <hr>
                                  <label for="ketMenikahKetuaKelompok" class="">Keterangan</label>
                                  <textarea class="form-control form-control-sm" name="ketMenikahKetuaKelompoks" id="ketMenikahKetuaKelompok" rows="3" placeholder="Keterangan"></textarea>
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
                                    <input class="form-check-input" name="sudahBaptisKetuaKelompoks" type="checkbox" value="Sudah" id="sudahBaptisKetuaKelompok">
                                    <label class="form-check-label" for="sudahBaptisKetuaKelompok">
                                      Sudah
                                    </label>
                                  </div>
                                  <hr>
                                  <label for="tglBaptisKetuaKelompok" class="">Tanggal</label>
                                  <input type="date" name="tglBaptisKetuaKelompoks" class="form-control form-control-sm" id="tglBaptisKetuaKelompok">
                                  <hr>
                                  <label for="" class="">Tempat</label><br>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatBaptisKetuaKelompoks" id="tempatBaptisKetuaKelompok" value="Gereja Lokal">
                                    <label class="form-check-label" for="tempatBaptisKetuaKelompok">Gereja Lokal</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatBaptisKetuaKelompoks" id="tempatBaptisLKetuaKelompok" value="Gereja Lain">
                                    <label class="form-check-label" for="tempatBaptisLKetuaKelompok">Gereja Lain</label>
                                  </div>
                                  <hr>
                                  <label for="fileUploadBaptisKetuaKelompok" class="">File</label>
                                  <input type="file" name="fileUploadBaptisKetuaKelompoks" class="form-control form-control-sm" id="fileUploadBaptisKetuaKelompok">
                                  @error('fileUploadBaptisKetuaKelompoks')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                  <hr>
                                  <label for="ketBaptisKetuaKelompok" class="">Keterangan</label>
                                  <textarea class="form-control form-control-sm" name="ketBaptisKetuaKelompoks" id="ketBaptisKetuaKelompok" rows="3" placeholder="Keterangan"></textarea>
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
                                    <input class="form-check-input" name="sudahMeninggalDuniaKetuaKelompoks" type="checkbox" value="Sudah" id="sudahMeninggalDuniaKetuaKelompok">
                                    <label class="form-check-label" for="sudahMeninggalDuniaKetuaKelompok">
                                      Sudah
                                    </label>
                                  </div>
                                  <hr>
                                  <label for="tglMeninggalDuniaKetuaKelompok" class="">Tanggal</label>
                                  <input type="date" name="tglMeninggalDuniaKetuaKelompoks" class="form-control form-control-sm" id="tglMeninggalDuniaKetuaKelompok">
                                  <hr>
                                  <label for="" class="">Tempat</label><br>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatMeninggalDuniaKetuaKelompoks" id="tempatMeninggalDuniaKetuaKelompok" value="Gereja Lokal">
                                    <label class="form-check-label" for="tempatMeninggalDuniaKetuaKelompok">Gereja Lokal</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatMeninggalDuniaKetuaKelompoks" id="tempatMeninggalDuniaLKetuaKelompok" value="Gereja Lain">
                                    <label class="form-check-label" for="tempatMeninggalDuniaLKetuaKelompok">Gereja Lain</label>
                                  </div>
                                  <hr>
                                  <label for="fileUploadMeninggalDuniaKetuaKelompok" class="">File</label>
                                  <input type="file" name="fileUploadMeninggalDuniaKetuaKelompoks" class="form-control form-control-sm" id="fileUploadMeninggalDuniaKetuaKelompok">
                                  @error('fileUploadMeninggalDuniaKetuaKelompoks')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                  <hr>
                                  <label for="ketMeninggalDuniaKetuaKelompok" class="">Keterangan</label>
                                  <textarea class="form-control form-control-sm" name="ketMeninggalDuniaKetuaKelompoks" id="ketMeninggalDuniaKetuaKelompok" rows="3" placeholder="Keterangan"></textarea>
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
                                    <input class="form-check-input" name="sudahPenyerahanAnakKetuaKelompoks" type="checkbox" value="Sudah" id="sudahPenyerahanAnakKetuaKelompok">
                                    <label class="form-check-label" for="sudahPenyerahanAnakKetuaKelompok">
                                      Sudah
                                    </label>
                                  </div>
                                  <hr>
                                  <label for="tglPenyerahanAnakKetuaKelompok" class="">Tanggal</label>
                                  <input type="date" name="tglPenyerahanAnakKetuaKelompoks" class="form-control form-control-sm" id="tglPenyerahanAnakKetuaKelompok">
                                  <hr>
                                  <label for="" class="">Tempat</label><br>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatPenyerahanAnakKetuaKelompoks" id="tempatPenyerahanAnakKetuaKelompok" value="Gereja Lokal">
                                    <label class="form-check-label" for="tempatPenyerahanAnakKetuaKelompok">Gereja Lokal</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatPenyerahanAnakKetuaKelompoks" id="tempatPenyerahanAnakLKetuaKelompok" value="Gereja Lain">
                                    <label class="form-check-label" for="tempatPenyerahanAnakLKetuaKelompok">Gereja Lain</label>
                                  </div>
                                  <hr>
                                  <label for="fileUploadPenyerahanAnakKetuaKelompok" class="">File</label>
                                  <input type="file" name="fileUploadPenyerahanAnakKetuaKelompoks" class="form-control form-control-sm" id="fileUploadPenyerahanAnakKetuaKelompok">
                                  @error('fileUploadPenyerahanAnakKetuaKelompoks')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                  <hr>
                                  <label for="ketPenyerahanAnakKetuaKelompok" class="">Keterangan</label>
                                  <textarea class="form-control form-control-sm" name="ketPenyerahanAnakKetuaKelompoks" id="ketPenyerahanAnakKetuaKelompok" rows="3" placeholder="Keterangan"></textarea>
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
                                    <input class="form-check-input" name="sudahEvangelismExplosionKetuaKelompoks" type="checkbox" value="Sudah" id="sudahEvangelismExplosionKetuaKelompok">
                                    <label class="form-check-label" for="sudahEvangelismExplosionKetuaKelompok">
                                      Sudah
                                    </label>
                                  </div>
                                  <hr>
                                  <label for="tglEvangelismExplosionKetuaKelompok" class="">Tanggal</label>
                                  <input type="date" name="tglEvangelismExplosionKetuaKelompoks" class="form-control form-control-sm" id="tglEvangelismExplosionKetuaKelompok">
                                  <hr>
                                  <label for="" class="">Tempat</label><br>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatEvangelismExplosionKetuaKelompoks" id="tempatEvangelismExplosionKetuaKelompok" value="Gereja Lokal">
                                    <label class="form-check-label" for="tempatEvangelismExplosionKetuaKelompok">Gereja Lokal</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatEvangelismExplosionKetuaKelompoks" id="tempatEvangelismExplosionLKetuaKelompok" value="Gereja Lain">
                                    <label class="form-check-label" for="tempatEvangelismExplosionLKetuaKelompok">Gereja Lain</label>
                                  </div>
                                  <hr>
                                  <label for="fileUploadEvangelismExplosionKetuaKelompok" class="">File</label>
                                  <input type="file" name="fileUploadEvangelismExplosionKetuaKelompoks" class="form-control form-control-sm" id="fileUploadEvangelismExplosionKetuaKelompok">
                                  @error('fileUploadEvangelismExplosionKetuaKelompoks')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                  <hr>
                                  <label for="ketEvangelismExplosionKetuaKelompok" class="">Keterangan</label>
                                  <textarea class="form-control form-control-sm" name="ketEvangelismExplosionKetuaKelompoks" id="ketEvangelismExplosionKetuaKelompok" rows="3" placeholder="Keterangan"></textarea>
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
                                    <input class="form-check-input" name="sudahIkatanDinasKetuaKelompoks" type="checkbox" value="Sudah" id="sudahIkatanDinasKetuaKelompok">
                                    <label class="form-check-label" for="sudahIkatanDinasKetuaKelompok">
                                      Sudah
                                    </label>
                                  </div>
                                  <hr>
                                  <label for="tglIkatanDinasKetuaKelompok" class="">Tanggal</label>
                                  <input type="date" name="tglIkatanDinasKetuaKelompoks" class="form-control form-control-sm" id="tglIkatanDinasKetuaKelompok">
                                  <hr>
                                  <label for="" class="">Tempat</label><br>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatIkatanDinasKetuaKelompoks" id="tempatIkatanDinasKetuaKelompok" value="Gereja Lokal">
                                    <label class="form-check-label" for="tempatIkatanDinasKetuaKelompok">Gereja Lokal</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatIkatanDinasKetuaKelompoks" id="tempatIkatanDinasLKetuaKelompok" value="Gereja Lain">
                                    <label class="form-check-label" for="tempatIkatanDinasLKetuaKelompok">Gereja Lain</label>
                                  </div>
                                  <hr>
                                  <label for="fileUploadIkatanDinasKetuaKelompok" class="">File</label>
                                  <input type="file" name="fileUploadIkatanDinasKetuaKelompoks" class="form-control form-control-sm" id="fileUploadIkatanDinasKetuaKelompok">
                                  @error('fileUploadIkatanDinasKetuaKelompoks')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                  <hr>
                                  <label for="ketIkatanDinasKetuaKelompok" class="">Keterangan</label>
                                  <textarea class="form-control form-control-sm" name="ketIkatanDinasKetuaKelompoks" id="ketIkatanDinasKetuaKelompok" rows="3" placeholder="Keterangan"></textarea>
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
                                    <input class="form-check-input" name="sudahPrktkDuaThnKetuaKelompoks" type="checkbox" value="Sudah" id="sudahPrktkDuaThnKetuaKelompok">
                                    <label class="form-check-label" for="sudahPrktkDuaThnKetuaKelompok">
                                      Sudah
                                    </label>
                                  </div>
                                  <hr>
                                  <label for="tglPrktkDuaThnKetuaKelompok" class="">Tanggal</label>
                                  <input type="date" name="tglPrktkDuaThnKetuaKelompoks" class="form-control form-control-sm" id="tglPrktkDuaThnKetuaKelompok">
                                  <hr>
                                  <label for="" class="">Tempat</label><br>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatPrktkDuaThnKetuaKelompoks" id="tempatPrktkDuaThnKetuaKelompok" value="Gereja Lokal">
                                    <label class="form-check-label" for="tempatPrktkDuaThnKetuaKelompok">Gereja Lokal</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatPrktkDuaThnKetuaKelompoks" id="tempatPrktkDuaThnLKetuaKelompok" value="Gereja Lain">
                                    <label class="form-check-label" for="tempatPrktkDuaThnLKetuaKelompok">Gereja Lain</label>
                                  </div>
                                  <hr>
                                  <label for="fileUploadPrktkDuaThnKetuaKelompok" class="">File</label>
                                  <input type="file" name="fileUploadPrktkDuaThnKetuaKelompoks" class="form-control form-control-sm" id="fileUploadPrktkDuaThnKetuaKelompok">
                                  @error('fileUploadPrktkDuaThnKetuaKelompoks')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                  <hr>
                                  <label for="ketPrktkDuaThnKetuaKelompok" class="">Keterangan</label>
                                  <textarea class="form-control form-control-sm" name="ketPrktkDuaThnKetuaKelompoks" id="ketPrktk2ThnKetuaKelompok" rows="3" placeholder="Keterangan"></textarea>
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
                                  <label for="namaGrupKetuaKelompok" class="">Nama Grup</label>
                                  <select class="form-select form-select-sm" name="namaGrupKetuaKelompoks" id="namaGrupKetuaKelompok" aria-label=".form-select-sm namaGrupKetuaKelompok">
                                    <option value="">-Nama Grup-</option>
                                  </select>
                                </div>
                                <div class="col-3">
                                  <label for="jbtnGrupKetuaKelompok" class="">Jabatan Dalam Grup</label>
                                  <select class="form-select form-select-sm" name="jbtnGrupKetuaKelompoks" id="jbtnGrupKetuaKelompok" aria-label=".form-select-sm jbtnGrupKetuaKelompok">
                                    <option value="">-Jabatan Dalam Grup-</option>
                                  </select>
                                </div>
                                <div class="col-3">
                                  <label for="tglGabungKetuaKelompok" class="">Tanggal Bergabung</label>
                                  <input type="date" name="tglGabungKetuaKelompoks" class="form-control form-control-sm" id="tglGabungKetuaKelompok">
                                </div>
                                <div class="col-3">
                                  <label for="cttnMasukKetuaKelompok" class="">Catatan Masuk</label>
                                  <textarea class="form-control form-control-sm" name="cttnMasukKetuaKelompoks" id="cttnMasukKetuaKelompok" rows="3" placeholder="Keterangan"></textarea>
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
                                <label for="kata_sandiKetuaKelompok" class="col-sm-3 px-1">Kata Sandi</label>
                                <div class="col-sm-9">
                                  <input class="form-control form-control-sm" type="password" name="kata_sandiKetuaKelompoks" id="kata_sandiKetuaKelompok" rows="3" placeholder="********">
                                  @error('kata_sandiKetuaKelompoks')
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
                                <label for="konfirmasi_kata_sandiKetuaKelompok" class="col-sm-3 px-1">Konfirmasi Kata Sandi</label>
                                <div class="col-sm-9">
                                  <input class="form-control form-control-sm" type="password" name="konfirmasi_kata_sandiKetuaKelompoks" id="konfirmasi_kata_sandiKetuaKelompok" rows="3" placeholder="********">
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
                                <label for="institusiKetuaKelompoks" class="col-sm-3 px-1 form-label">Lembaga</label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="institusiKetuaKelompoks" id="institusiKetuaKelompoks">
                                    <option value="">-Lembaga-</option>
                                    <option value="PM (Parousia Ministry)">PM (Parousia Ministry)</option>
                                    <option value="GKP (Gereja Kristen Parousia)">GKP (Gereja Kristen Parousia)</option>
                                  </select>
                                  @error('institusiKetuaKelompoks')
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
                  <th scope="col">Ubah | Hapus</th>
                  <th scope="col">Kelompok</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($ketuaKelompoks as $ketuaKelompok)
                  <tr>
                    <th scope="row">{{$noKetuaKelompoks++}}</th>
                    <td>{{$ketuaKelompok->id_user}}</td>
                    <td>
                      <a href="#lihatData{{$ketuaKelompok->id_user}}" data-bs-toggle="modal" class="text-info">
                        {{$ketuaKelompok->nama_lengkapKK}} <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Data"></i>
                      </a>
                    </td>
                    <td>{{$ketuaKelompok->tanggal_registKK}}</td>
                    <td>{{$ketuaKelompok->tempat_lahirKK}}, {{$ketuaKelompok->tanggal_lahirKK}}</td>
                    <td>{{$ketuaKelompok->jkKK}}</td>
                    <td>{{$ketuaKelompok->alamatKK}}</td>
                    <td>
                      <div class="icon-action">
                        <a data-bs-target="#ubahData{{$ketuaKelompok->id_user}}" id="ubahData" data-bs-toggle="modal" class="text-primary" data-user="{{$ketuaKelompok->id}}">
                          <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                        </a>
                        |
                        <a href="#hapusData{{$ketuaKelompok->id_user}}" data-bs-toggle="modal" class="text-danger">
                          <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                        </a>
                      </div>
                    </td>
                    <td>
                      <a href="#kelompok{{$ketuaKelompok->id}}" data-bs-toggle="modal" class="text-primary fs-5">
                        <i class="bi bi-people" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Kelompok"></i>
                      </a>
                    </td>
                  </tr>
                  <!-- Modal Lihat Data -->
                  <div class="modal fade" id="lihatData{{$ketuaKelompok->id_user}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="lihatData{{$ketuaKelompok->id_user}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="lihatData{{$ketuaKelompok->id_user}}Label">
                            <i class="bi bi-info-circle text-info"></i>
                            Lihat Data Ketua Kelompok
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body bg-light">
                          <div class="d-flex align-items-start">
                            <div class="nav flex-column nav-pills me-3 shadow rounded w-25 bg-white p-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                              <button class="nav-link active" class="border-bottom" id="personal{{$ketuaKelompok->id}}-tab" data-bs-toggle="pill" data-bs-target="#personal{{$ketuaKelompok->id}}" type="button" role="tab" aria-controls="personal{{$ketuaKelompok->id}}" aria-selected="true">Personal</button>
                              <button class="nav-link" id="tempat-tinggal{{$ketuaKelompok->id}}-tab" data-bs-toggle="pill" data-bs-target="#tempat-tinggal{{$ketuaKelompok->id}}" type="button" role="tab" aria-controls="tempat-tinggal{{$ketuaKelompok->id}}" aria-selected="false">Tempat Tinggal</button>
                              <button class="nav-link" id="kontak{{$ketuaKelompok->id}}-tab" data-bs-toggle="pill" data-bs-target="#kontak{{$ketuaKelompok->id}}" type="button" role="tab" aria-controls="kontak{{$ketuaKelompok->id}}" aria-selected="false">Kontak</button>
                              <button class="nav-link" id="pekerjaan{{$ketuaKelompok->id}}-tab" data-bs-toggle="pill" data-bs-target="#pekerjaan{{$ketuaKelompok->id}}" type="button" role="tab" aria-controls="pekerjaan{{$ketuaKelompok->id}}" aria-selected="false">Pekerjaan</button>
                              <button class="nav-link" id="studi-minat{{$ketuaKelompok->id}}-tab" data-bs-toggle="pill" data-bs-target="#studi-minat{{$ketuaKelompok->id}}" type="button" role="tab" aria-controls="studi-minat{{$ketuaKelompok->id}}" aria-selected="false">Studi & Minat</button>
                              <button class="nav-link" id="catatan{{$ketuaKelompok->id}}-tab" data-bs-toggle="pill" data-bs-target="#catatan{{$ketuaKelompok->id}}" type="button" role="tab" aria-controls="catatan{{$ketuaKelompok->id}}" aria-selected="false">Catatan</button>
                              <button class="nav-link" id="kc-isian-text{{$ketuaKelompok->id}}-tab" data-bs-toggle="pill" data-bs-target="#kc-isian-text{{$ketuaKelompok->id}}" type="button" role="tab" aria-controls="kc-isian-text{{$ketuaKelompok->id}}" aria-selected="false">KC (Isian Text)</button>
                              <button class="nav-link" id="kc-pilihan{{$ketuaKelompok->id}}-tab" data-bs-toggle="pill" data-bs-target="#kc-pilihan{{$ketuaKelompok->id}}" type="button" role="tab" aria-controls="kc-pilihan{{$ketuaKelompok->id}}" aria-selected="false">KC (Pilihan)</button>
                              <button class="nav-link" id="kc-pilihan-ganda{{$ketuaKelompok->id}}-tab" data-bs-toggle="pill" data-bs-target="#kc-pilihan-ganda{{$ketuaKelompok->id}}" type="button" role="tab" aria-controls="kc-pilihan-ganda{{$ketuaKelompok->id}}" aria-selected="false">KC (Pilihan Ganda)</button>
                              <button class="nav-link" id="kc-check-box{{$ketuaKelompok->id}}-tab" data-bs-toggle="pill" data-bs-target="#kc-check-box{{$ketuaKelompok->id}}" type="button" role="tab" aria-controls="kc-check-box{{$ketuaKelompok->id}}" aria-selected="false">KC (Check Box)</button>
                              <button class="nav-link" id="tanggal-penting{{$ketuaKelompok->id}}-tab" data-bs-toggle="pill" data-bs-target="#tanggal-penting{{$ketuaKelompok->id}}" type="button" role="tab" aria-controls="tanggal-penting{{$ketuaKelompok->id}}" aria-selected="false">Tanggal Penting</button>
                              <button class="nav-link" id="keanggotaan-grup{{$ketuaKelompok->id}}-tab" data-bs-toggle="pill" data-bs-target="#keanggotaan-grup{{$ketuaKelompok->id}}" type="button" role="tab" aria-controls="keanggotaan-grup{{$ketuaKelompok->id}}" aria-selected="false">Keanggotaan Grup</button>
                            </div>
                            <div class="d-flex me-3" style="height: 495px;">
                              <div class="vr"></div>
                            </div>
                            <div class="tab-content w-100" id="v-pills-tabContent">
                              <div class="container bg-white mb-3 p-2 shadow rounded">
                                <img src="{{ asset('images/Ketua Kelompok/Foto/'.$ketuaKelompok->fotoKK) }}" class="img-fluid img-thumbnail rounded mx-auto d-block" alt="...">
                                <div class="text-center">
                                  <p class="fs-4 fw-bold mb-0">{{$ketuaKelompok->nama_lengkapKK}}</p>
                                  <span>({{$ketuaKelompok->nama_panggilanKK}})</span>
                                </div>
                              </div>
                              <hr class="text-secondary">
                              <!-- Personal -->
                              <div class="tab-pane fade show active w-auto" id="personal{{$ketuaKelompok->id}}" role="tabpanel" aria-labelledby="personal{{$ketuaKelompok->id}}-tab">
                                <div class="container bg-white shadow rounded mb-1">
                                  <p class="fs-4 text-dark fw-bold p-2">Personal</p>
                                </div>
                                <div class="detail-personal bg-white p-3 shadow rounded">
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">ID</div>
                                    <div class="col-8">{{$ketuaKelompok->id_user}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Tanggal Registrasi</div>
                                    <div class="col-8">{{$ketuaKelompok->tanggal_registKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Referensi Dari</div>
                                    <div class="col-8">{{$ketuaKelompok->refrensiKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Sapaan</div>
                                    <div class="col-8">{{$ketuaKelompok->sapaanKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Gelar Awalan</div>
                                    <div class="col-8">{{$ketuaKelompok->gelar_awalanKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Nama Lengkap</div>
                                    <div class="col-8">{{$ketuaKelompok->nama_lengkapKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Gelar Akhiran</div>
                                    <div class="col-8">{{$ketuaKelompok->gelar_akhiranKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Nama Panggilan</div>
                                    <div class="col-8">{{$ketuaKelompok->nama_panggilanKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Peran dalam Keluarga</div>
                                    <div class="col-8">{{$ketuaKelompok->peranKetuaKelompok}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Jenis Identitas</div>
                                    <div class="col-8">{{$ketuaKelompok->jenis_identitasKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">No. Identitas</div>
                                    <div class="col-8">{{$ketuaKelompok->no_iden}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Tempat / Tanggal Lahir</div>
                                    <div class="col-8">{{$ketuaKelompok->tempat_lahirKK}} / {{$ketuaKelompok->tanggal_lahirKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Jenis Kelamin</div>
                                    <div class="col-8">{{$ketuaKelompok->jkKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Golongan Darah</div>
                                    <div class="col-8">{{$ketuaKelompok->goldarKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Status Pernikahan</div>
                                    <div class="col-8">{{$ketuaKelompok->status_pernikahanKK}}</div>
                                  </div>
                                  <div class="row p-2">
                                    <div class="col-4">Foto Bitmap</div>
                                    <div class="col-8"><img src="{{ asset('images/Ketua Kelompok/Foto Bitmap/'.$ketuaKelompok->foto_bitmapKK) }}" class="img-fluid rounded" alt="..."></div>
                                  </div>
                                </div>
                              </div>
                              <!-- Tempat Tinggal -->
                              <div class="tab-pane fade" id="tempat-tinggal{{$ketuaKelompok->id}}" role="tabpanel" aria-labelledby="tempat-tinggal{{$ketuaKelompok->id}}-tab">
                                <div class="container bg-white shadow rounded">
                                  <p class="fs-4 text-dark fw-bold p-2">Tempat Tinggal</p>
                                </div>
                                <div class="tempat_tinggal bg-white p-3 shadow rounded">
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Alamat</div>
                                    <div class="col-8">{{$ketuaKelompok->alamatKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Keterangan Arah</div>
                                    <div class="col-8">{{$ketuaKelompok->ket_arahKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Peta</div>
                                    <div class="col-8"><a href="{{$ketuaKelompok->petaKK}}">{{$ketuaKelompok->petaKK}}</a></div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Negara</div>
                                    <div class="col-8">{{$ketuaKelompok->negaraKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Propinsi</div>
                                    <div class="col-8">{{$ketuaKelompok->provinsiKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Kota</div>
                                    <div class="col-8">{{$ketuaKelompok->kotaKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Kecamatan</div>
                                    <div class="col-8">{{$ketuaKelompok->kecamatanKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Kelurahan</div>
                                    <div class="col-8">{{$ketuaKelompok->kelurahanKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Kode Pos</div>
                                    <div class="col-8">{{$ketuaKelompok->kode_posKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Dusun (Desa)</div>
                                    <div class="col-8">{{$ketuaKelompok->dusunKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">RT / RW</div>
                                    <div class="col-8">{{$ketuaKelompok->rtKK}} / {{$ketuaKelompok->rwKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Area</div>
                                    <div class="col-8">{{$ketuaKelompok->areaKK}}</div>
                                  </div>
                                  <div class="row p-2">
                                    <div class="col-4">Lokasi</div>
                                    <div class="col-8">{{$ketuaKelompok->LokasiKK}}</div>
                                  </div>
                                </div>
                              </div>
                              <!-- Kontak -->
                              <div class="tab-pane fade" id="kontak{{$ketuaKelompok->id}}" role="tabpanel" aria-labelledby="kontak{{$ketuaKelompok->id}}-tab">
                                <div class="container bg-white shadow rounded">
                                  <p class="fs-4 text-dark fw-bold p-2">Kontak</p>
                                </div>
                                <div class="kontak bg-white p-3 shadow rounded">
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">No. Telp 1</div>
                                    <div class="col-8">{{$ketuaKelompok->no_telpKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Telp. Rumah 2</div>
                                    <div class="col-8">{{$ketuaKelompok->no_rumahKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">No. HP 1</div>
                                    <div class="col-8">{{$ketuaKelompok->no_hpsatuKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Bisa Terima SMS?</div>
                                    <div class="col-8">{{$ketuaKelompok->bisa_smsKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">No. HP 2</div>
                                    <div class="col-8">{{$ketuaKelompok->no_hpduaKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">No. Lainnya (mis: Pin BB)</div>
                                    <div class="col-8">{{$ketuaKelompok->no_lainnyaKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Fax. Rumah</div>
                                    <div class="col-8">{{$ketuaKelompok->fax_rumahKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Email</div>
                                    <div class="col-8">{{$ketuaKelompok->alamat_surelKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Bisa Terima Email?</div>
                                    <div class="col-8">{{$ketuaKelompok->bisa_emailKK}}</div>
                                  </div>
                                  <div class="row p-2">
                                    <div class="col-4">Website (Facebook, Twitter, etc)</div>
                                    <div class="col-8">{{$ketuaKelompok->websiteKK}}</div>
                                  </div>
                                </div>
                              </div>
                              <!-- Pekerjaan -->
                              <div class="tab-pane fade" id="pekerjaan{{$ketuaKelompok->id}}" role="tabpanel" aria-labelledby="pekerjaan{{$ketuaKelompok->id}}-tab">
                                <div class="container bg-white shadow rounded">
                                  <p class="fs-4 text-dark fw-bold p-2">Pekerjaan</p>
                                </div>
                                <div class="pekerjaan bg-white p-3 shadow rounded">
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Pekerjaan</div>
                                    <div class="col-8">{{$ketuaKelompok->pekerjaanKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Jabatan Dalam Pekerjaan</div>
                                    <div class="col-8">{{$ketuaKelompok->jabatanKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Status Pekerjaan</div>
                                    <div class="col-8">{{$ketuaKelompok->status_pekerjaanKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Nama Perusahaan</div>
                                    <div class="col-8">{{$ketuaKelompok->nama_perusahaanKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Alamat Kantor</div>
                                    <div class="col-8">{{$ketuaKelompok->alamat_kantorKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Telp. Kantor</div>
                                    <div class="col-8">{{$ketuaKelompok->telp_kantorKK}}</div>
                                  </div>
                                  <div class="row p-2">
                                    <div class="col-4">Ext.</div>
                                    <div class="col-8">{{$ketuaKelompok->extKK}}</div>
                                  </div>
                                </div>
                              </div>
                              <!-- Studi & Minat -->
                              <div class="tab-pane fade" id="studi-minat{{$ketuaKelompok->id}}" role="tabpanel" aria-labelledby="studi-minat{{$ketuaKelompok->id}}-tab">
                                <div class="container bg-white shadow rounded">
                                  <p class="fs-4 text-dark fw-bold p-2">Studi & Minat</p>
                                </div>
                                <div class="studi-minat bg-white p-3 shadow rounded">
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Tingkat Pendidikan</div>
                                    <div class="col-8">{{$ketuaKelompok->tingkat_pendidikanKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Sekolah/Univ (Saat ini sedang ditempuh)</div>
                                    <div class="col-8">{{$ketuaKelompok->sekolah_univKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Bidang Ketertarikan</div>
                                    <div class="col-8">{{$ketuaKelompok->bidang_ketertarikanKK}}</div>
                                  </div>
                                  <div class="row p-2">
                                    <div class="col-4">Bidang Keterampilan</div>
                                    <div class="col-8">{{$ketuaKelompok->bidang_keterampilanKK}}</div>
                                  </div>
                                </div>
                              </div>
                              <!-- Catatan -->
                              <div class="tab-pane fade" id="catatan{{$ketuaKelompok->id}}" role="tabpanel" aria-labelledby="catatan{{$ketuaKelompok->id}}-tab">
                                <div class="container bg-white shadow rounded">
                                  <p class="fs-4 text-dark fw-bold p-2">Catatan</p>
                                </div>
                                <div class="catatan bg-white p-3 shadow rounded">
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Catatan</div>
                                    <div class="col-8">{{$ketuaKelompok->catatanKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Status</div>
                                    <div class="col-8">{{$ketuaKelompok->statusKK}}</div>
                                  </div>
                                  <div class="row p-2">
                                    <div class="col-4">Email Sudah Verifikasi?</div>
                                    <div class="col-8">{{$ketuaKelompok->verif_email}}</div>
                                  </div>
                                </div>
                              </div>
                              <!-- Kolom Cadangan (Isian Text) -->
                              <div class="tab-pane fade" id="kc-isian-text{{$ketuaKelompok->id}}" role="tabpanel" aria-labelledby="kc-isian-text{{$ketuaKelompok->id}}-tab">
                                <div class="container bg-white shadow rounded">
                                  <p class="fs-4 text-dark fw-bold p-2">Kolom Cadangan (Isian Text)</p>
                                </div>
                                <div class="kolom-isian-text bg-white p-3 shadow rounded">
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Nomor Rekening</div>
                                    <div class="col-8">{{$ketuaKelompok->no_rekeningKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Periode Beasiswa</div>
                                    <div class="col-8">{{$ketuaKelompok->periode_beasiswaKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Periode Kerja Praktek</div>
                                    <div class="col-8">{{$ketuaKelompok->periode_kerja_praktikKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Riwayat Pelayanan 1</div>
                                    <div class="col-8">{{$ketuaKelompok->riwayat_pelayananSatuKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Riwayat Pelayanan 2</div>
                                    <div class="col-8">{{$ketuaKelompok->riwayat_pelayananDuaKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Riwayat Pelayanan 3</div>
                                    <div class="col-8">{{$ketuaKelompok->riwayat_pelayananTigaKK}}</div>
                                  </div>
                                  <div class="row p-2">
                                    <div class="col-4">Riwayat Pelayanan 4</div>
                                    <div class="col-8">{{$ketuaKelompok->riwayat_pelayananEmpatKK}}</div>
                                  </div>
                                </div>
                              </div>
                              <!-- Kolom Cadangan (Pilihan) -->
                              <div class="tab-pane fade" id="kc-pilihan{{$ketuaKelompok->id}}" role="tabpanel" aria-labelledby="kc-pilihan{{$ketuaKelompok->id}}-tab">
                                <div class="container bg-white shadow rounded">
                                  <p class="fs-4 text-dark fw-bold p-2">Kolom Cadangan (Pilihan)</p>
                                </div>
                                <div class="kolom-pilihan bg-white p-3 shadow rounded">
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4"></div>
                                    <div class="col-8">{{$ketuaKelompok->kolom_cadanganPSatuKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4"></div>
                                    <div class="col-8">{{$ketuaKelompok->kolom_cadanganPDuaKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4"></div>
                                    <div class="col-8">{{$ketuaKelompok->kolom_cadanganPTigaKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4"></div>
                                    <div class="col-8">{{$ketuaKelompok->kolom_cadanganPEmpatKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4"></div>
                                    <div class="col-8">{{$ketuaKelompok->kolom_cadanganPLimatKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4"></div>
                                    <div class="col-8">{{$ketuaKelompok->kolom_cadanganPEnamKK}}</div>
                                  </div>
                                  <div class="row p-2">
                                    <div class="col-4"></div>
                                    <div class="col-8">{{$ketuaKelompok->kolom_cadanganPTujuhKK}}</div>
                                  </div>
                                </div>
                              </div>
                              <!-- Kolom Cadangan (Pilihan Ganda) -->
                              <div class="tab-pane fade" id="kc-pilihan-ganda{{$ketuaKelompok->id}}" role="tabpanel" aria-labelledby="kc-pilihan-ganda{{$ketuaKelompok->id}}-tab">
                                <div class="container bg-white shadow rounded">
                                  <p class="fs-4 text-dark fw-bold p-2">Kolom Cadangan (Pilihan Ganda)</p>
                                </div>
                                <div class="kolom-pilihan-ganda bg-white p-3 shadow rounded">
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Personality - MBTI</div>
                                    <div class="col-8">{{$ketuaKelompok->personality_mbtiKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Personality - Holland</div>
                                    <div class="col-8">{{$ketuaKelompok->personality_hollandKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Spiritual Gifts</div>
                                    <div class="col-8">{{$ketuaKelompok->spiritual_giftsKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Abilities</div>
                                    <div class="col-8">{{$ketuaKelompok->abilitiesKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Ganda 5</div>
                                    <div class="col-8">{{$ketuaKelompok->kolom_cadanganPGLimaKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4">Kemampuan Bahasa</div>
                                    <div class="col-8">{{$ketuaKelompok->kemampuan_bahasaKK}}</div>
                                  </div>
                                  <div class="row p-2">
                                    <div class="col-4">Pernah Menderita Penyakit</div>
                                    <div class="col-8">{{$ketuaKelompok->penyakitKK}}</div>
                                  </div>
                                </div>
                              </div>
                              <!-- Kolom Cadangan (Check Box) -->
                              <div class="tab-pane fade" id="kc-check-box{{$ketuaKelompok->id}}" role="tabpanel" aria-labelledby="kc-check-box{{$ketuaKelompok->id}}-tab">
                                <div class="container bg-white shadow rounded">
                                  <p class="fs-4 text-dark fw-bold p-2">Kolom Cadangan (Check Box)</p>
                                </div>
                                <div class="kolom-check-box bg-white p-3 shadow rounded">
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4"></div>
                                    <div class="col-8">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="kolom_cadanganCBSatuKK" disabled {{$ketuaKelompok->kolom_cadanganCBSatuKK == "Ya" ? 'checked' : ''}}>
                                        <label class="form-check-label" for="kolom_cadanganCBSatuKK">
                                          Ya
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4"></div>
                                    <div class="col-8">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="kolom_cadanganCBDuaKK" disabled {{$ketuaKelompok->kolom_cadanganCBDuaKK == "Ya" ? 'checked' : ''}}>
                                        <label class="form-check-label" for="kolom_cadanganCBDuaKK">
                                          Ya
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4"></div>
                                    <div class="col-8">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="kolom_cadanganCBTigaKK" disabled {{$ketuaKelompok->kolom_cadanganCBTigaKK == "Ya" ? 'checked' : ''}}>
                                        <label class="form-check-label" for="kolom_cadanganCBTigaKK">
                                          Ya
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4"></div>
                                    <div class="col-8">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="kolom_cadanganCBEmpatKK" disabled {{$ketuaKelompok->kolom_cadanganCBEmpatKK == "Ya" ? 'checked' : ''}}>
                                        <label class="form-check-label" for="kolom_cadanganCBEmpatKK">
                                          Ya
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4"></div>
                                    <div class="col-8">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="kolom_cadanganCBLimaKK" disabled {{$ketuaKelompok->kolom_cadanganCBLimaKK == "Ya" ? 'checked' : ''}}>
                                        <label class="form-check-label" for="kolom_cadanganCBLimaKK">
                                          Ya
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-4"></div>
                                    <div class="col-8">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="kolom_cadanganCBEnamKK" disabled {{$ketuaKelompok->kolom_cadanganCBEnamKK == "Ya" ? 'checked' : ''}}>
                                        <label class="form-check-label" for="kolom_cadanganCBEnamKK">
                                          Ya
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row p-2">
                                    <div class="col-4"></div>
                                    <div class="col-8">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="kolom_cadanganCBTujuhKK" disabled {{$ketuaKelompok->kolom_cadanganCBTujuhKK == "Ya" ? 'checked' : ''}}>
                                        <label class="form-check-label" for="kolom_cadanganCBTujuhKK">
                                          Ya
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- Tanggal Penting -->
                              <div class="tab-pane fade" id="tanggal-penting{{$ketuaKelompok->id}}" role="tabpanel" aria-labelledby="tanggal-penting{{$ketuaKelompok->id}}-tab">
                                <div class="container bg-white shadow rounded">
                                  <p class="fs-4 text-dark fw-bold p-2">Tanggal Penting</p>
                                </div>
                                <div class="tanggal-penting bg-white p-3 shadow rounded">
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
                                        <input class="form-check-input" type="checkbox" value="" id="ba_sudahKK" disabled {{$ketuaKelompok->ba_sudahKK == 'Sudah' ? 'checked' : ''}}>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$ketuaKelompok->ba_tanggalKK}}</div>
                                    <div class="col-2">
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="ba_tempatLoKK" disabled {{$ketuaKelompok->ba_tempatKK == 'Gereja Lokal' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="ba_tempatLoKK">
                                          Gereja Lokal
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="ba_tempatLaKK" disabled {{$ketuaKelompok->ba_tempatKK == 'Gereja Lain' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="ba_tempatLaKK">
                                          Gereja Lain
                                        </label>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$ketuaKelompok->ba_fileKK}}</div>
                                    <div class="col-2">{{$ketuaKelompok->ba_ketKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-1">2.</div>
                                    <div class="col-2">Menikah</div>
                                    <div class="col-1">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="menikah_sudahKK" disabled {{$ketuaKelompok->menikah_sudahKK == 'Sudah' ? 'checked' : ''}}>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$ketuaKelompok->menikah_tanggalKK}}</div>
                                    <div class="col-2">
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="menikah_tempatLoKK" disabled {{$ketuaKelompok->menikah_tempatKK == 'Gereja Lokal' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="menikah_tempatLoKK">
                                          Gereja Lokal
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="menikah_tempatLaKK" disabled {{$ketuaKelompok->menikah_tempatKK == 'Gereja Lain' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="menikah_tempatLaKK">
                                          Gereja Lain
                                        </label>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$ketuaKelompok->menikah_fileKK}}</div>
                                    <div class="col-2">{{$ketuaKelompok->menikah_ketKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-1">3.</div>
                                    <div class="col-2">Baptis</div>
                                    <div class="col-1">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="bap_sudahKK" disabled {{$ketuaKelompok->bap_sudahKK == 'Sudah' ? 'checked' : ''}}>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$ketuaKelompok->bap_tanggalKK}}</div>
                                    <div class="col-2">
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="bap_tempatLoKK" disabled {{$ketuaKelompok->bap_tempatKK == 'Gereja Lokal' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="bap_tempatLoKK">
                                          Gereja Lokal
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="bap_tempatLaKK" disabled {{$ketuaKelompok->bap_tempatKK == 'Gereja Lain' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="bap_tempatLaKK">
                                          Gereja Lain
                                        </label>
                                      </div></div>
                                    <div class="col-2">{{$ketuaKelompok->bap_fileKK}}</div>
                                    <div class="col-2">{{$ketuaKelompok->bap_ketKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-1">4.</div>
                                    <div class="col-2">Meninggal Dunia</div>
                                    <div class="col-1">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="md_sudahKK" disabled {{$ketuaKelompok->md_sudahKK == 'Sudah' ? 'checked' : ''}}>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$ketuaKelompok->md_tanggalKK}}</div>
                                    <div class="col-2">
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="md_tempatLoKK" disabled {{$ketuaKelompok->md_tempatKK == 'Gereja Lokal' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="md_tempatLoKK">
                                          Gereja Lokal
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="md_tempatLaKK" disabled {{$ketuaKelompok->md_tempatKK == 'Gereja Lain' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="md_tempatLaKK">
                                          Gereja Lain
                                        </label>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$ketuaKelompok->md_fileKK}}</div>
                                    <div class="col-2">{{$ketuaKelompok->md_ketKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-1">5.</div>
                                    <div class="col-2">Penyerahan Anak</div>
                                    <div class="col-1">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="pa_sudahKK" disabled {{$ketuaKelompok->pa_sudahKK == 'Sudah' ? 'checked' : ''}}>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$ketuaKelompok->pa_tanggalKK}}</div>
                                    <div class="col-2">
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="pa_tempatLoKK" disabled {{$ketuaKelompok->pa_tempatKK == 'Gereja Lokal' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="pa_tempatLoKK">
                                          Gereja Lokal
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="pa_tempatLaKK" disabled {{$ketuaKelompok->pa_tempatKK == 'Gereja Lain' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="pa_tempatLaKK">
                                          Gereja Lain
                                        </label>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$ketuaKelompok->pa_fileKK}}</div>
                                    <div class="col-2">{{$ketuaKelompok->pa_ketKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-1">6.</div>
                                    <div class="col-2">Evangelism Explosion</div>
                                    <div class="col-1">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="ee_sudahKK" disabled {{$ketuaKelompok->ee_sudahKK == 'Sudah' ? 'checked' : ''}}>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$ketuaKelompok->ee_tanggalKK}}</div>
                                    <div class="col-2">
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="ee_tempatLoKK" disabled {{$ketuaKelompok->ee_tempatKK == 'Gereja Lokal' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="ee_tempatLoKK">
                                          Gereja Lokal
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="ee_tempatLaKK" disabled {{$ketuaKelompok->ee_tempatKK == 'Gereja Lain' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="ee_tempatLaKK">
                                          Gereja Lain
                                        </label>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$ketuaKelompok->ee_fileKK}}</div>
                                    <div class="col-2">{{$ketuaKelompok->ee_ketKK}}</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-1">7.</div>
                                    <div class="col-2">Tgl berakhir ikatan dinas</div>
                                    <div class="col-1">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="bid_sudahKK" disabled {{$ketuaKelompok->bid_sudahKK == 'Sudah' ? 'checked' : ''}}>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$ketuaKelompok->bid_tanggalKK}}</div>
                                    <div class="col-2">
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="bid_tempatLoKK" disabled {{$ketuaKelompok->bid_tempatKK == 'Gereja Lokal' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="bid_tempatLoKK">
                                          Gereja Lokal
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="bid_tempatLaKK" disabled {{$ketuaKelompok->bid_tempatKK == 'Gereja Lain' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="bid_tempatLaKK">
                                          Gereja Lain
                                        </label>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$ketuaKelompok->bid_fileKK}}</div>
                                    <div class="col-2">{{$ketuaKelompok->bid_ketKK}}</div>
                                  </div>
                                  <div class="row p-2">
                                    <div class="col-1">8.</div>
                                    <div class="col-2">Praktek 2 Tahun</div>
                                    <div class="col-1">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="pdt_sudahKK" disabled {{$ketuaKelompok->pdt_sudahKK == 'Sudah' ? 'checked' : ''}}>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$ketuaKelompok->pdt_tanggalKK}}</div>
                                    <div class="col-2">
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="pdt_tempatLoKK" disabled {{$ketuaKelompok->pdt_tempatKK == 'Gereja Lokal' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="pdt_tempatLoKK">
                                          Gereja Lokal
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="pdt_tempatLaKK" disabled {{$ketuaKelompok->pdt_tempatKK == 'Gereja Lain' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="pdt_tempatLaKK">
                                          Gereja Lain
                                        </label>
                                      </div>
                                    </div>
                                    <div class="col-2">{{$ketuaKelompok->pdt_fileKK}}</div>
                                    <div class="col-2">{{$ketuaKelompok->pdt_ketKK}}</div>
                                  </div>
                                </div>
                              </div>
                              <!-- Keanggotaan Grup -->
                              <div class="tab-pane fade" id="keanggotaan-grup{{$ketuaKelompok->id}}" role="tabpanel" aria-labelledby="keanggotaan-grup{{$ketuaKelompok->id}}-tab">
                                <div class="container bg-white shadow rounded">
                                  <p class="fs-4 text-dark fw-bold p-2">Keanggotaan Grup</p>
                                </div>
                                <div class="keanggotaan-grup bg-white p-3 shadow rounded">
                                  <div class="row p-2 border-bottom">
                                    <div class="col-3">Nama Group</div>
                                    <div class="col-3">Jabatan Dalam Group</div>
                                    <div class="col-3">Tanggal Bergabung</div>
                                    <div class="col-3">Catatan Masuk</div>
                                  </div>
                                  <div class="row p-2 border-bottom">
                                    <div class="col-3">{{$ketuaKelompok->nama_grupKK}}</div>
                                    <div class="col-3">{{$ketuaKelompok->jbt_grupKK}}</div>
                                    <div class="col-3">{{$ketuaKelompok->tgl_gabung_grupKK}}</div>
                                    <div class="col-3">{{$ketuaKelompok->catatan_masuk_grupKK}}</div>
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
                  <div class="modal fade" id="ubahData{{$ketuaKelompok->id_user}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahData{{$ketuaKelompok->id_user}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahData{{$ketuaKelompok->id_user}}Label">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Data Ketua Kelompok
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('data-ketua-kelompok.update', $ketuaKelompok->id) }}" method="post" enctype="multipart/form-data">
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
                                      <input type="date" name="editTglRegistrasiKetuaKelompok" class="form-control form-control-sm" id="editTglRegistrasiKetuaKelompok" value="{{$ketuaKelompok->tanggal_registKK}}">
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
                                      <input type="text" name="editReferensiKetuaKelompok" class="form-control form-control-sm" id="editReferensiKetuaKelompok" placeholder="Referensi Dari" value="{{$ketuaKelompok->refrensiKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editSapaanKetuaKelompok" class="col-sm-3 px-1">Sapaan</label>
                                    <div class="col-sm-9">
                                      <select class="form-select form-select-sm" name="editSapaanKetuaKelompok" id="editSapaanKetuaKelompok" aria-label=".form-select-sm editSapaanKetuaKelompok">
                                        <option value="{{$ketuaKelompok->sapaanKK}}">{{$ketuaKelompok->sapaanKK}}</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editGelarAwalanKetuaKelompok" class="col-sm-3 px-1">Gelar Awalan</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editGelarAwalanKetuaKelompok" class="form-control form-control-sm" id="editGelarAwalanKetuaKelompok" placeholder="Gelar Awalan" value="{{$ketuaKelompok->gelar_awalanKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editNamaKetuaKelompok" class="col-sm-3 px-1">Nama Lengkap <span class="required-input">(*)</span></label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editNamaKetuaKelompok" class="form-control form-control-sm" id="editNamaKetuaKelompok" placeholder="cth: Angelica Gabriel" value="{{$ketuaKelompok->nama_lengkapKK}}">
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
                                      <input type="text" name="editGelarAkhiranKetuaKelompok" class="form-control form-control-sm" id="editGelarAkhiranKetuaKelompok" placeholder="Gelar Akhiran" value="{{$ketuaKelompok->gelar_akhiranKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editNamaPanggilanKetuaKelompok" class="col-sm-3 px-1">Nama Panggilan</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editNamaPanggilanKetuaKelompok" class="form-control form-control-sm" id="editNamaPanggilanKetuaKelompok" placeholder="cth: Angel" value="{{$ketuaKelompok->nama_panggilanKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editPeranKetuaKelompok" class="col-sm-3 px-1">Peran dalam Keluarga</label>
                                    <div class="col-sm-9">
                                      <select class="form-select form-select-sm" name="editPeranKetuaKelompok" id="editPeranKetuaKelompok" aria-label=".form-select-sm editPeranKetuaKelompok">
                                        <option value="{{$ketuaKelompok->peranKK}}"> {{$ketuaKelompok->peranKK}}</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editJenisIdentitasKetuaKelompok" class="col-sm-3 px-1">Jenis Identitas</label>
                                    <div class="col-sm-9">
                                      <select class="form-select form-select-sm" name="editJenisIdentitasKetuaKelompok" id="editJenisIdentitasKetuaKelompok" aria-label=".form-select-sm editJenisIdentitasKetuaKelompok">
                                        <option value="{{$ketuaKelompok->jenis_identitasKK}}"> {{$ketuaKelompok->jenis_identitasKK}}</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editNoIdentitasKetuaKelompok" class="col-sm-3 px-1">No. Identitas</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editNoIdentitasKetuaKelompok" class="form-control form-control-sm" id="editNoIdentitasKetuaKelompok" placeholder="cth: 12*********" value="{{$ketuaKelompok->no_identitasKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editTempatLahirKetuaKelompok" class="col-sm-3 px-1">Tempat, Tgl Lahir</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="editTempatLahirKetuaKelompok" class="form-control form-control-sm" id="editTempatLahirKetuaKelompok" placeholder="cth: Bandung" value="{{$ketuaKelompok->tempat_lahirKK}}">
                                    </div>
                                    <div class="col-sm-1">
                                      <p>/</p>
                                    </div>
                                    <div class="col-sm-3">
                                      <input type="date" name="editTglLahirKetuaKelompok" class="form-control form-control-sm" id="editTglLahirKetuaKelompok" value="{{$ketuaKelompok->tanggal_lahirKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editJenisKelaminKetuaKelompok" class="col-sm-3 px-1">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editJenisKelaminKetuaKelompok" id="jenisKelaminPKetuaKelompok" value="Pria" {{$ketuaKelompok->jkKK == 'Pria' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="jenisKelaminPKetuaKelompok">Pria</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editJenisKelaminKetuaKelompok" id="jenisKelaminWKetuaKelompok" value="Wanita" {{$ketuaKelompok->jkKK == 'Wanita' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="jenisKelaminWKetuaKelompok">Wanita</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editGolonganDarahKetuaKelompok" class="col-sm-3 px-1">Golongan Darah</label>
                                    <div class="col-sm-9">
                                      <select class="form-select form-select-sm" name="editGolonganDarahKetuaKelompok" id="editGolonganDarahKetuaKelompok" aria-label=".form-select-sm editGolonganDarahKetuaKelompok">
                                        <option value="{{$ketuaKelompok->goldarKK}}"> {{$ketuaKelompok->goldarKK}}</option>
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
                                        <option value="{{$ketuaKelompok->status_pernikahanKK}}"> {{$ketuaKelompok->status_pernikahanKK}}</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editFotoKetuaKelompok" class="col-sm-3 px-1">Foto</label>
                                    <div class="col-sm-9">
                                      <input type="file" name="editFotoKetuaKelompok" class="form-control form-control-sm" id="editFotoKetuaKelompok" value="{{$ketuaKelompok->fotoKK}}">
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
                                      <input type="file" name="editFotoBitmapKetuaKelompok" class="form-control form-control-sm" id="editFotoBitmapKetuaKelompok" value="{{$ketuaKelompok->foto_bitmapKK}}">
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
                                      <input type="text" name="editAlamatKetuaKelompok" class="form-control form-control-sm" id="editAlamatKetuaKelompok" placeholder="Alamat" value="{{$ketuaKelompok->alamatKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editKeteranganArahKetuaKelompok" class="col-sm-3 px-1">Keterangan Arah</label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control form-control-sm" name="editKeteranganArahKetuaKelompok" id="editKeteranganArahKetuaKelompok" rows="3" placeholder="Keterangan Arah"> {{$ketuaKelompok->ket_arahKK}}</textarea>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editPetaKetuaKelompok" class="col-sm-3 px-1">Peta</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editPetaKetuaKelompok" class="form-control form-control-sm" id="editPetaKetuaKelompok" placeholder="Peta" value="{{$ketuaKelompok->petaKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editNegaraKetuaKelompok" class="col-sm-3 px-1">Negara</label>
                                    <div class="col-sm-9">
                                      <select class="form-select form-select-sm" name="editNegaraKetuaKelompok" id="editNegaraKetuaKelompok" aria-label=".form-select-sm editNegaraKetuaKelompok">
                                        <option value="{{$ketuaKelompok->negaraKK}}"> {{$ketuaKelompok->negaraKK}}</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editProvinsiKetuaKelompok" class="col-sm-3 px-1">Provinsi</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editProvinsiKetuaKelompok" class="form-control form-control-sm" id="editProvinsiKetuaKelompok" placeholder="Provinsi" value="{{$ketuaKelompok->provinsiKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editKotaKetuaKelompok" class="col-sm-3 px-1">Kota</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editKotaKetuaKelompok" class="form-control form-control-sm" id="editKotaKetuaKelompok" placeholder="Kota" value="{{$ketuaKelompok->kotaKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editKecamatanKetuaKelompok" class="col-sm-3 px-1">Kecamatan</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editKecamatanKetuaKelompok" class="form-control form-control-sm" id="editKecamatanKetuaKelompok" placeholder="Kecamatan" value="{{$ketuaKelompok->kecamatanKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editKelurahanKetuaKelompok" class="col-sm-3 px-1">Kelurahan</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editKelurahanKetuaKelompok" class="form-control form-control-sm" id="editKelurahanKetuaKelompok" placeholder="Kelurahan" value="{{$ketuaKelompok->kelurahanKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editKodePosKetuaKelompok" class="col-sm-3 px-1">Kode Pos</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editKodePosKetuaKelompok" class="form-control form-control-sm" id="editKodePosKetuaKelompok" placeholder="Kode Pos" value="{{$ketuaKelompok->kode_posKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editDusunKetuaKelompok" class="col-sm-3 px-1">Dusun (Desa)</label>
                                    <div class="col-sm-9">
                                      <select class="form-select form-select-sm" name="editDusunKetuaKelompok" aria-label=".form-select-sm editDusunKetuaKelompok">
                                        <option value="{{$ketuaKelompok->dusunKK}}"> {{$ketuaKelompok->dusunKK}}</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editRtRwKetuaKelompok" class="col-sm-3 px-1">RT / RW</label>
                                    <div class="col-sm-4">
                                      <input type="text" name="rtKetuaKelompok" class="form-control form-control-sm" id="editRtRwKetuaKelompok" placeholder="RT" value="{{$ketuaKelompok->rtKK}}">
                                    </div>
                                    <div class="col-sm-1">
                                      <p>/</p>
                                    </div>
                                    <div class="col-sm-4">
                                      <input type="text" name="rwKetuaKelompok" class="form-control form-control-sm" id="editRtRwKetuaKelompok" placeholder="RW" value="{{$ketuaKelompok->rwKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editAreaKetuaKelompok" class="col-sm-3 px-1">Area</label>
                                    <div class="col-sm-9">
                                      <select class="form-select form-select-sm" name="editAreaKetuaKelompok" id="editAreaKetuaKelompok" aria-label=".form-select-sm editAreaKetuaKelompok">
                                        <option value="{{$ketuaKelompok->areaKK}}"> {{$ketuaKelompok->areaKK}}</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editLokasiKK" class="col-sm-3 px-1">Lokasi</label>
                                    <div class="col-sm-9">
                                      <select class="form-select form-select-sm" name="editLokasiKKs" id="editLokasiKK" aria-label=".form-select-sm editLokasiKK">
                                        <option value="{{$ketuaKelompok->lokasiKK}}">{{$ketuaKelompok->lokasiKK}}</option>
                                        @foreach ($lokasis as $lokasi)
                                          <option value="{{$lokasi->nama_lokasi}}">{{$lokasi->nama_lokasi}}</option>
                                        @endforeach
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
                                      <input type="text" name="editNoTelpSKetuaKelompok" class="form-control form-control-sm" id="editNoTelpSKetuaKelompok" placeholder="cth: +62" value="{{$ketuaKelompok->no_telpKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editTelpRumahKetuaKelompok" class="col-sm-3 px-1">Telp. Rumah 2</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editTelpRumahKetuaKelompok" class="form-control form-control-sm" id="editTelpRumahKetuaKelompok" placeholder="cth: +622174130258" value="{{$ketuaKelompok->no_rumahKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editNoHpSKetuaKelompok" class="col-sm-3 px-1">No HP 1</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editNoHpSKetuaKelompok" class="form-control form-control-sm" id="editNoHpSKetuaKelompok" placeholder="cth: +62" value="{{$ketuaKelompok->no_hpsatuKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editTerimaSMSKetuaKelompok" class="col-sm-3 px-1">Bisa Terima SMS?</label>
                                    <div class="col-sm-9 pt-1">
                                      <div class="form-check form-switch">
                                        <input class="form-check-input" name="editTerimaSMSKetuaKelompok" type="checkbox" id="editTerimaSMSKetuaKelompok" value="Ya" {{$ketuaKelompok->bisa_smsKK == 'Ya' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="editTerimaSMSKetuaKelompok">Ya</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editNoHpDKetuaKelompok" class="col-sm-3 px-1">No HP 2</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editNoHpDKetuaKelompok" class="form-control form-control-sm" id="editNoHpDKetuaKelompok" placeholder="cth: +62856789456" value="{{$ketuaKelompok->no_hpduaKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editNoLainKetuaKelompok" class="col-sm-3 px-1">No Lainnya</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editNoLainKetuaKelompok" class="form-control form-control-sm" id="editNoLainKetuaKelompok" placeholder="mis: Pin BB" value="{{$ketuaKelompok->no_lainnyaKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editFaxKetuaKelompok" class="col-sm-3 px-1">Fax. Rumah</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editFaxKetuaKelompok" class="form-control form-control-sm" id="editFaxKetuaKelompok" placeholder="FAX" value="{{$ketuaKelompok->fax_rumahKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editEmailKetuaKelompok" class="col-sm-3 px-1">Email</label>
                                    <div class="col-sm-9">
                                      <input type="email" name="editEmailKetuaKelompok" class="form-control form-control-sm" id="editEmailKetuaKelompok" placeholder="cth: email@gmail.com" value="{{$ketuaKelompok->alamat_surelKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editTerimaEmailKetuaKelompok" class="col-sm-3 px-1">Bisa Terima Email?</label>
                                    <div class="col-sm-9 pt-1">
                                      <div class="form-check form-switch">
                                        <input class="form-check-input" name="editTerimaEmailKetuaKelompok" type="checkbox" id="editTerimaEmailKetuaKelompok" value="Ya" {{$ketuaKelompok->no_hpsatuKK == 'Ya' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="editTerimaEmailKetuaKelompok">Ya</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editWebsiteKetuaKelompok" class="col-sm-3 px-1">Website</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editWebsiteKetuaKelompok" class="form-control form-control-sm" id="editWebsiteKetuaKelompok" placeholder="cth: Facebook, Twitter, etc" value="{{$ketuaKelompok->websiteKK}}">
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
                                          <option value="{{$ketuaKelompok->pekerjaanKK}}"> {{$ketuaKelompok->pekerjaanKK}}</option>
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
                                      <input type="text" name="editJabatanKetuaKelompok" class="form-control form-control-sm" id="editJabatanKetuaKelompok" placeholder="cth: Manager, Staff, etc" value="{{$ketuaKelompok->jabatanKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editStatusPekerjaanKetuaKelompok" class="col-sm-3 px-1">Status Pekerjaan</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select form-select-sm" name="editStatusPekerjaanKetuaKelompok" id="editStatusPekerjaanKetuaKelompok" aria-label=".form-select-sm editStatusPekerjaanKetuaKelompok">
                                          <option value="{{$ketuaKelompok->status_pekerjaanKK}}"> {{$ketuaKelompok->status_pekerjaanKK}}</option>
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
                                      <input type="text" name="editNamaPerusahaanKetuaKelompok" class="form-control form-control-sm" id="editNamaPerusahaanKetuaKelompok" placeholder="Nama Perusahaan" value="{{$ketuaKelompok->nama_perusahaanKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editSektorIndustriKetuaKelompok" class="col-sm-3 px-1">Sektor Industri</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select form-select-sm" name="editSektorIndustriKetuaKelompok" id="editSektorIndustriKetuaKelompok" aria-label=".form-select-sm editSektorIndustriKetuaKelompok">
                                          <option value="{{$ketuaKelompok->sektor_industriKK}}"> {{$ketuaKelompok->sektor_industriKK}}</option>
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
                                      <input type="text" name="editAlamatKantorKetuaKelompok" class="form-control form-control-sm" id="editAlamatKantorKetuaKelompok" placeholder="Alamat Kantor" value="{{$ketuaKelompok->alamat_kantorKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editTelpKantorKetuaKelompok" class="col-sm-3 px-1">Telp. Kantor</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editTelpKantorKetuaKelompok" class="form-control form-control-sm" id="editTelpKantorKetuaKelompok" placeholder="cth: +62" value="{{$ketuaKelompok->telp_kantorKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editExtKetuaKelompok" class="col-sm-3 px-1">Ext.</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editExtKetuaKelompok" class="form-control form-control-sm" id="editExtKetuaKelompok" placeholder="EXT" value="{{$ketuaKelompok->extKK}}">
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
                                          <option value="{{$ketuaKelompok->tingkat_pendidikanKK}}"> {{$ketuaKelompok->tingkat_pendidikanKK}}</option>
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
                                          <option value="{{$ketuaKelompok->sekolah_univKK}}"> {{$ketuaKelompok->sekolah_univKK}}</option>
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
                                    <label for="editBKetertarikanKetuaKelompok{{$ketuaKelompok->id}}" class="col-sm-3 px-1">Bidang Ketertarikan</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-control" name="editBKetertarikanKetuaKelompok[]" style="width: 100%;" id="editBKetertarikanKetuaKelompok{{$ketuaKelompok->id}}" aria-label="multiple select editBKetertarikanKetuaKelompok{{$ketuaKelompok->id}}" multiple>
                                          <option value="{{$ketuaKelompok->bidang_ketertarikanKK}}"> {{$ketuaKelompok->bidang_ketertarikanKK}}</option>
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
                                    <label for="editBKeterampilanKetuaKelompok{{$ketuaKelompok->id}}" class="col-sm-3 px-1">Bidang Keterampilan</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-control" name="editBKeterampilanKetuaKelompok[]" id="editBKeterampilanKetuaKelompok{{$ketuaKelompok->id}}" style="width: 100%;" aria-label="multiple select editBKeterampilanKetuaKelompok{{$ketuaKelompok->id}}" multiple>
                                          <option value="{{$ketuaKelompok->bidang_keterampilanKK}}"> {{$ketuaKelompok->bidang_keterampilanKK}}</option>
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
                                      <textarea class="form-control form-control-sm" name="editCatatanKetuaKelompok" id="editCatatanKetuaKelompok" rows="3" placeholder="Catatan"> {{$ketuaKelompok->catatanKK}}</textarea>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editStatusKetuaKelompok" class="col-sm-3 px-1">Status</label>
                                    <div class="col-sm-9">
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editStatusKetuaKelompok" id="statusAKetuaKelompok" value="Aktif" {{$ketuaKelompok->statusKK == 'Aktif' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="statusAKetuaKelompok">Aktif</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editStatusKetuaKelompok" id="statusTaKetuaKelompok" value="Tidak Aktif" {{$ketuaKelompok->statusKK == 'Tidak Aktif' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="statusTaKetuaKelompok">Tidak Aktif</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editVerifEmailKetuaKelompok" class="col-sm-3 px-1">Email Sudah Verifikasi?</label>
                                    <div class="col-sm-9 pt-1">
                                      <div class="form-check form-switch">
                                        <input class="form-check-input" name="editVerifEmailKetuaKelompok" type="checkbox" id="editVerifEmailKetuaKelompok" {{$ketuaKelompok->verif_emailKK == 'Ya' ? 'checked' : ''}}>
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
                                      <input type="text" name="editNoRekKetuaKelompok" class="form-control form-control-sm" id="editNoRekKetuaKelompok" placeholder="123456789" value="{{$ketuaKelompok->no_rekeningKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editPerBeasiswaKetuaKelompok" class="col-sm-3 px-1">Periode Beasiswa</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editPerBeasiswaKetuaKelompok" class="form-control form-control-sm" id="editPerBeasiswaKetuaKelompok" placeholder="Periode Beasiswa" value="{{$ketuaKelompok->periode_beasiswaKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editPerKerjaPKetuaKelompok" class="col-sm-3 px-1">Periode Kerja Praktik</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editPerKerjaPKetuaKelompok" class="form-control form-control-sm" id="editPerKerjaPKetuaKelompok" placeholder="Periode Kerja Praktik" value="{{$ketuaKelompok->periode_kerja_praktikKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editRiwayatPelSKetuaKelompok" class="col-sm-3 px-1">Riwayat Pelayanan 1</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editRiwayatPelSKetuaKelompok" class="form-control form-control-sm" id="editRiwayatPelSKetuaKelompok" placeholder="Riwayat Pelayanan 1" value="{{$ketuaKelompok->riwayat_pelayananSatuKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editRiwayatPelDKetuaKelompok" class="col-sm-3 px-1">Riwayat Pelayanan 2</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editRiwayatPelDKetuaKelompok" class="form-control form-control-sm" id="editRiwayatPelDKetuaKelompok" placeholder="Riwayat Pelayanan 2" value="{{$ketuaKelompok->riwayat_pelayananDuaKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editRiwayatPelTKetuaKelompok" class="col-sm-3 px-1">Riwayat Pelayanan 3</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editRiwayatPelTKetuaKelompok" class="form-control form-control-sm" id="editRiwayatPelTKetuaKelompok" placeholder="Riwayat Pelayanan 3" value="{{$ketuaKelompok->riwayat_pelayananTigaKK}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editRiwayatPelEKetuaKelompok" class="col-sm-3 px-1">Riwayat Pelayanan 4</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editRiwayatPelEKetuaKelompok" class="form-control form-control-sm" id="editRiwayatPelEKetuaKelompok" placeholder="Riwayat Pelayanan 4" value="{{$ketuaKelompok->riwayat_pelayananEmpatKK}}">
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
                                          <option value="{{$ketuaKelompok->kolom_cadanganPSatuKK}}"> {{$ketuaKelompok->kolom_cadanganPSatuKK}}</option>
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
                                          <option value="{{$ketuaKelompok->kolom_cadanganPDuaKK}}"> {{$ketuaKelompok->kolom_cadanganPDuaKK}}</option>
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
                                          <option value="{{$ketuaKelompok->kolom_cadanganPTigaKK}}"> {{$ketuaKelompok->kolom_cadanganPTigaKK}}</option>
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
                                          <option value="{{$ketuaKelompok->kolom_cadanganPEmpatKK}}"> {{$ketuaKelompok->kolom_cadanganPEmpatKK}}</option>
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
                                          <option value="{{$ketuaKelompok->kolom_cadanganPLimaKK}}"> {{$ketuaKelompok->kolom_cadanganPLimaKK}}</option>
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
                                          <option value="{{$ketuaKelompok->kolom_cadanganPEnamKK}}"> {{$ketuaKelompok->kolom_cadanganPEnamKK}}</option>
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
                                          <option value="{{$ketuaKelompok->kolom_cadanganPTujuhKK}}"> {{$ketuaKelompok->kolom_cadanganPTujuhKK}}</option>
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
                                    <label for="editPilihanGSKetuaKelompok{{$ketuaKelompok->id}}" class="col-sm-3 px-1">Personality - MBTI</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select" name="editPilihanGSKetuaKelompok[]" style="width: 100%;" id="editPilihanGSKetuaKelompok{{$ketuaKelompok->id}}" aria-label="multiple select editPilihanGSKetuaKelompok{{$ketuaKelompok->id}}" multiple>
                                          <option value="{{$ketuaKelompok->personality_mbtiKK}}">{{$ketuaKelompok->personality_mbtiKK}}</option>
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
                                    <label for="editPilihanGDKetuaKelompok{{$ketuaKelompok->id}}" class="col-sm-3 px-1">Personality - Holland</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select" name="editPilihanGDKetuaKelompok[]" style="width: 100%;" id="editPilihanGDKetuaKelompok{{$ketuaKelompok->id}}" aria-label="multiple select editPilihanGDKetuaKelompok{{$ketuaKelompok->id}}" multiple>
                                          <option value="{{$ketuaKelompok->personality_hollandKK}}">{{$ketuaKelompok->personality_hollandKK}}</option>
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
                                    <label for="editPilihanGTKetuaKelompok{{$ketuaKelompok->id}}" class="col-sm-3 px-1">Spiritual Gifts</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select" name="editPilihanGTKetuaKelompok[]" style="width: 100%;" id="editPilihanGTKetuaKelompok{{$ketuaKelompok->id}}" aria-label="multiple select editPilihanGTKetuaKelompok{{$ketuaKelompok->id}}" multiple>
                                          <option value="{{$ketuaKelompok->spiritual_giftsKK}}">{{$ketuaKelompok->spiritual_giftsKK}}</option>
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
                                    <label for="editPilihanGEKetuaKelompok{{$ketuaKelompok->id}}" class="col-sm-3 px-1">Abilities</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select" name="editPilihanGEKetuaKelompok[]" style="width: 100%;" id="editPilihanGEKetuaKelompok{{$ketuaKelompok->id}}" aria-label="multiple select editPilihanGEKetuaKelompok{{$ketuaKelompok->id}}" multiple>
                                          <option value="{{$ketuaKelompok->abilitiesKK}}">{{$ketuaKelompok->abilitiesKK}}</option>
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
                                    <label for="editPilihanGLKetuaKelompok{{$ketuaKelompok->id}}" class="col-sm-3 px-1">Ganda 5</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select" name="editPilihanGLKetuaKelompok[]" style="width: 100%;" id="editPilihanGLKetuaKelompok{{$ketuaKelompok->id}}" aria-label="multiple select editPilihanGLKetuaKelompok{{$ketuaKelompok->id}}" multiple>
                                          <option value="{{$ketuaKelompok->kolom_cadanganPGLimaKK}}">{{$ketuaKelompok->kolom_cadanganPGLimaKK}}</option>
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
                                    <label for="editPilihanGEnKetuaKelompok{{$ketuaKelompok->id}}" class="col-sm-3 px-1">Kemampuan Bahasa</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select" name="editPilihanGEnKetuaKelompok[]" style="width: 100%;" id="editPilihanGEnKetuaKelompok{{$ketuaKelompok->id}}" aria-label="multiple select editPilihanGEnKetuaKelompok{{$ketuaKelompok->id}}" multiple>
                                          <option value="{{$ketuaKelompok->kemampuan_bahasaKK}}">{{$ketuaKelompok->kemampuan_bahasaKK}}</option>
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
                                    <label for="editPilihanGTuKetuaKelompok{{$ketuaKelompok->id}}" class="col-sm-3 px-1">Pernah menderita penyakit</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select" name="editPilihanGTuKetuaKelompok[]" style="width: 100%;" id="editPilihanGTuKetuaKelompok{{$ketuaKelompok->id}}" aria-label="multiple select editPilihanGTuKetuaKelompok{{$ketuaKelompok->id}}" multiple>
                                          <option value="{{$ketuaKelompok->penyakitKK}}">{{$ketuaKelompok->penyakitKK}}</option>
                                          @foreach ($penyakits as $penyakit)
                                            <option value="{{$penyakit->penyakit}}">{{$penyakit->penyakit}}</option>
                                          @endforeach
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
                                        <input class="form-check-input" name="editCheckSKetuaKelompok" type="checkbox" id="editCheckSKetuaKelompok" value="Ya" {{$ketuaKelompok->kolom_cadanganCBSatuKK == 'Ya' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="editCheckSKetuaKelompok">Ya</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editCheckDKetuaKelompok" class="col-sm-3 px-1"></label>
                                    <div class="col-sm-9 pt-1">
                                      <div class="form-check form-switch">
                                        <input class="form-check-input" name="editCheckDKetuaKelompok" type="checkbox" id="editCheckDKetuaKelompok" value="Ya" {{$ketuaKelompok->kolom_cadanganCBDuaKK == 'Ya' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="editCheckDKetuaKelompok">Ya</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editCheckTKetuaKelompok" class="col-sm-3 px-1"></label>
                                    <div class="col-sm-9 pt-1">
                                      <div class="form-check form-switch">
                                        <input class="form-check-input" name="editCheckTKetuaKelompok" type="checkbox" id="editCheckTKetuaKelompok" value="Ya" {{$ketuaKelompok->kolom_cadanganCBTigaKK == 'Ya' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="editCheckTKetuaKelompok">Ya</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editCheckEKetuaKelompok" class="col-sm-3 px-1"></label>
                                    <div class="col-sm-9 pt-1">
                                      <div class="form-check form-switch">
                                        <input class="form-check-input" name="editCheckEKetuaKelompok" type="checkbox" id="editCheckEKetuaKelompok" value="Ya" {{$ketuaKelompok->kolom_cadanganCBEmpatKK == 'Ya' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="editCheckEKetuaKelompok">Ya</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editCheckLKetuaKelompok" class="col-sm-3 px-1"></label>
                                    <div class="col-sm-9 pt-1">
                                      <div class="form-check form-switch">
                                        <input class="form-check-input" name="editCheckLKetuaKelompok" type="checkbox" id="editCheckLKetuaKelompok" value="Ya" {{$ketuaKelompok->kolom_cadanganCBLimaKK == 'Ya' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="editCheckLKetuaKelompok">Ya</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editCheckEnKetuaKelompok" class="col-sm-3 px-1"></label>
                                    <div class="col-sm-9 pt-1">
                                      <div class="form-check form-switch">
                                        <input class="form-check-input" name="editCheckEnKetuaKelompok" type="checkbox" id="editCheckEnKetuaKelompok" value="Ya" {{$ketuaKelompok->kolom_cadanganCBEnamKK == 'Ya' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="editCheckEnKetuaKelompok">Ya</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editCheckTuKetuaKelompok" class="col-sm-3 px-1"></label>
                                    <div class="col-sm-9 pt-1">
                                      <div class="form-check form-switch">
                                        <input class="form-check-input" name="editCheckTuKetuaKelompok" type="checkbox" id="editCheckTuKetuaKelompok" value="Ya" {{$ketuaKelompok->kolom_cadanganCBTujuhKK == 'Ya' ? 'checked' : ''}}>
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
                                        <input class="form-check-input" name="editSudahBaptisAnakKetuaKelompok" type="checkbox" value="" id="editSudahBaptisAnakKetuaKelompok" {{$ketuaKelompok->ba_sudahKK == 'Sudah' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editSudahBaptisAnakKetuaKelompok">
                                          Sudah
                                        </label>
                                      </div>
                                      <hr>
                                      <label for="editTglBaptisAnakKetuaKelompok" class="">Tanggal</label>
                                      <input type="date" name="editTglBaptisAnakKetuaKelompok" class="form-control form-control-sm" id="editTglBaptisAnakKetuaKelompok" value="{{$ketuaKelompok->ba_tanggalKK}}">
                                      <hr>
                                      <label for="" class="">Tempat</label><br>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatBaptisAnakKetuaKelompok" id="editTempatBaptisAnakKetuaKelompok" value="Gereja Lokal" {{$ketuaKelompok->ba_tempatKK == 'Gereja Lokal' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatBaptisAnakKetuaKelompok">Gereja Lokal</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatBaptisAnakKetuaKelompok" id="editTempatBaptisAnakLKetuaKelompok" value="Gereja Lain" {{$ketuaKelompok->ba_tempatKK == 'Gereja Lain' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatBaptisAnakLKetuaKelompok">Gereja Lain</label>
                                      </div>
                                      <hr>
                                      <label for="editFileUploadBaptisAnakKetuaKelompok" class="">File</label>
                                      <input type="file" name="editFileUploadBaptisAnakKetuaKelompok" class="form-control form-control-sm" id="editFileUploadBaptisAnakKetuaKelompok" value="{{$ketuaKelompok->ba_fileKK}}">
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
                                      <textarea class="form-control form-control-sm" name="editKetBaptisAnakKetuaKelompok" id="editKetBaptisAnakKetuaKelompok" rows="3" placeholder="Keterangan">{{$ketuaKelompok->ba_ketKK}}</textarea>
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
                                        <input class="form-check-input" name="editSudahMenikahKetuaKelompok" type="checkbox" value="" id="editSudahMenikahKetuaKelompok" {{$ketuaKelompok->menikah_sudahKK == 'Sudah' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editSudahMenikahKetuaKelompok">
                                          Sudah
                                        </label>
                                      </div>
                                      <hr>
                                      <label for="editTglMenikahKetuaKelompok" class="">Tanggal</label>
                                      <input type="date" name="editTglMenikahKetuaKelompok" class="form-control form-control-sm" id="editTglMenikahKetuaKelompok" value="{{$ketuaKelompok->menikah_tanggalKK}}">
                                      <hr>
                                      <label for="" class="">Tempat</label><br>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatMenikahKetuaKelompok" id="editTempatMenikahKetuaKelompok" value="Gereja Lokal" {{$ketuaKelompok->menikah_tempatKK == 'Gereja Lokal' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatMenikahKetuaKelompok">Gereja Lokal</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatMenikahKetuaKelompok" id="editTempatMenikahLKetuaKelompok" value="Gereja Lain" {{$ketuaKelompok->menikah_tempatKK == 'Gereja Lain' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatMenikahLKetuaKelompok">Gereja Lain</label>
                                      </div>
                                      <hr>
                                      <label for="editFileUploadMenikahKetuaKelompok" class="">File</label>
                                      <input type="file" name="editFileUploadMenikahKetuaKelompok" class="form-control form-control-sm" id="editFileUploadMenikahKetuaKelompok" value="{{$ketuaKelompok->menikah_fileKK}}">
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
                                      <textarea class="form-control form-control-sm" name="editKetMenikahKetuaKelompok" id="editKetMenikahKetuaKelompok" rows="3" placeholder="Keterangan">{{$ketuaKelompok->menikah_ketKK}}</textarea>
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
                                        <input class="form-check-input" name="editSudahBaptisKetuaKelompok" type="checkbox" value="" id="editSudahBaptisKetuaKelompok" {{$ketuaKelompok->bap_sudahKK == 'Sudah' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editSudahBaptisKetuaKelompok">
                                          Sudah
                                        </label>
                                      </div>
                                      <hr>
                                      <label for="editTglBaptisKetuaKelompok" class="">Tanggal</label>
                                      <input type="date" name="editTglBaptisKetuaKelompok" class="form-control form-control-sm" id="editTglBaptisKetuaKelompok" value="{{$ketuaKelompok->bap_tanggalKK}}">
                                      <hr>
                                      <label for="" class="">Tempat</label><br>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatBaptisKetuaKelompok" id="editTempatBaptisKetuaKelompok" value="Gereja Lokal" {{$ketuaKelompok->bap_tempatKK == 'Gereja Lokal' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatBaptisKetuaKelompok">Gereja Lokal</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatBaptisKetuaKelompok" id="editTempatBaptisLKetuaKelompok" value="Gereja Lain" {{$ketuaKelompok->bap_tempatKK == 'Gereja Lain' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatBaptisLKetuaKelompok">Gereja Lain</label>
                                      </div>
                                      <hr>
                                      <label for="editFileUploadBaptisKetuaKelompok" class="">File</label>
                                      <input type="file" name="editFileUploadBaptisKetuaKelompok" class="form-control form-control-sm" id="editFileUploadBaptisKetuaKelompok" value="{{$ketuaKelompok->bap_fileKK}}">
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
                                      <textarea class="form-control form-control-sm" name="editKetBaptisKetuaKelompok" id="editKetBaptisKetuaKelompok" rows="3" placeholder="Keterangan">{{$ketuaKelompok->bap_ketKK}}</textarea>
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
                                        <input class="form-check-input" name="editSudahMeninggalDuniaKetuaKelompok" type="checkbox" value="" id="editSudahMeninggalDuniaKetuaKelompok" {{$ketuaKelompok->md_sudahKK == 'Sudah' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editSudahMeninggalDuniaKetuaKelompok">
                                          Sudah
                                        </label>
                                      </div>
                                      <hr>
                                      <label for="editTglMeninggalDuniaKetuaKelompok" class="">Tanggal</label>
                                      <input type="date" name="editTglMeninggalDuniaKetuaKelompok" class="form-control form-control-sm" id="editTglMeninggalDuniaKetuaKelompok" value="{{$ketuaKelompok->md_tanggalKK}}">
                                      <hr>
                                      <label for="" class="">Tempat</label><br>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatMeninggalDuniaKetuaKelompok" id="editTempatMeninggalDuniaKetuaKelompok" value="Gereja Lokal" {{$ketuaKelompok->md_tempatKK == 'Gereja Lokal' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatMeninggalDuniaKetuaKelompok">Gereja Lokal</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatMeninggalDuniaKetuaKelompok" id="editTempatMeninggalDuniaLKetuaKelompok" value="Gereja Lain" {{$ketuaKelompok->md_tempatKK == 'Gereja Lain' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatMeninggalDuniaLKetuaKelompok">Gereja Lain</label>
                                      </div>
                                      <hr>
                                      <label for="editFileUploadMeninggalDuniaKetuaKelompok" class="">File</label>
                                      <input type="file" name="editFileUploadMeninggalDuniaKetuaKelompok" class="form-control form-control-sm" id="editFileUploadMeninggalDuniaKetuaKelompok" value="{{$ketuaKelompok->md_fileKK}}">
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
                                      <textarea class="form-control form-control-sm" name="editKetMeninggalDuniaKetuaKelompok" id="editKetMeninggalDuniaKetuaKelompok" rows="3" placeholder="Keterangan">{{$ketuaKelompok->md_ketKK}}</textarea>
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
                                        <input class="form-check-input" name="editSudahPenyerahanAnakKetuaKelompok" type="checkbox" value="" id="editSudahPenyerahanAnakKetuaKelompok" {{$ketuaKelompok->pa_sudahKK == 'Sudah' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editSudahPenyerahanAnakKetuaKelompok">
                                          Sudah
                                        </label>
                                      </div>
                                      <hr>
                                      <label for="editTglPenyerahanAnakKetuaKelompok" class="">Tanggal</label>
                                      <input type="date" name="editTglPenyerahanAnakKetuaKelompok" class="form-control form-control-sm" id="editTglPenyerahanAnakKetuaKelompok" value="{{$ketuaKelompok->pa_tanggalKK}}">
                                      <hr>
                                      <label for="" class="">Tempat</label><br>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatPenyerahanAnakKetuaKelompok" id="editTempatPenyerahanAnakKetuaKelompok" value="Gereja Lokal" {{$ketuaKelompok->pa_tempatKK == 'Gereja Lokal' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatPenyerahanAnakKetuaKelompok">Gereja Lokal</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatPenyerahanAnakKetuaKelompok" id="editTempatPenyerahanAnakLKetuaKelompok" value="Gereja Lain" {{$ketuaKelompok->pa_tempatKK == 'Gereja Lain' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatPenyerahanAnakLKetuaKelompok">Gereja Lain</label>
                                      </div>
                                      <hr>
                                      <label for="editFileUploadPenyerahanAnakKetuaKelompok" class="">File</label>
                                      <input type="file" name="editFileUploadPenyerahanAnakKetuaKelompok" class="form-control form-control-sm" id="editFileUploadPenyerahanAnakKetuaKelompok" value="{{$ketuaKelompok->pa_fileKK}}">
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
                                      <textarea class="form-control form-control-sm" name="editKetPenyerahanAnakKetuaKelompok" id="editKetPenyerahanAnakKetuaKelompok" rows="3" placeholder="Keterangan">{{$ketuaKelompok->pa_ketKK}}</textarea>
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
                                        <input class="form-check-input" name="editSudahEvangelismExplosionKetuaKelompok" type="checkbox" value="" id="editSudahEvangelismExplosionKetuaKelompok" {{$ketuaKelompok->ee_sudahKK == 'Sudah' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editSudahEvangelismExplosionKetuaKelompok">
                                          Sudah
                                        </label>
                                      </div>
                                      <hr>
                                      <label for="editTglEvangelismExplosionKetuaKelompok" class="">Tanggal</label>
                                      <input type="date" name="editTglEvangelismExplosionKetuaKelompok" class="form-control form-control-sm" id="editTglEvangelismExplosionKetuaKelompok" value="{{$ketuaKelompok->ee_tanggalKK}}">
                                      <hr>
                                      <label for="" class="">Tempat</label><br>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatEvangelismExplosionKetuaKelompok" id="editTempatEvangelismExplosionKetuaKelompok" value="Gereja Lokal" {{$ketuaKelompok->ee_tempatKK == 'Gereja Lokal' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatEvangelismExplosionKetuaKelompok">Gereja Lokal</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatEvangelismExplosionKetuaKelompok" id="editTempatEvangelismExplosionLKetuaKelompok" value="Gereja Lain" {{$ketuaKelompok->ee_tempatKK == 'Gereja Lain' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatEvangelismExplosionLKetuaKelompok">Gereja Lain</label>
                                      </div>
                                      <hr>
                                      <label for="editFileUploadEvangelismExplosionKetuaKelompok" class="">File</label>
                                      <input type="file" name="editFileUploadEvangelismExplosionKetuaKelompok" class="form-control form-control-sm" id="editFileUploadEvangelismExplosionKetuaKelompok" value="{{$ketuaKelompok->ee_fileKK}}">
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
                                      <textarea class="form-control form-control-sm" name="editKetEvangelismExplosionKetuaKelompok" id="editKetEvangelismExplosionKetuaKelompok" rows="3" placeholder="Keterangan">{{$ketuaKelompok->ee_ketKK}}</textarea>
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
                                        <input class="form-check-input" name="editSudahIkatanDinasKetuaKelompok" type="checkbox" value="" id="editSudahIkatanDinasKetuaKelompok" {{$ketuaKelompok->bid_sudahKK == 'Sudah' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editSudahIkatanDinasKetuaKelompok">
                                          Sudah
                                        </label>
                                      </div>
                                      <hr>
                                      <label for="editTglIkatanDinasKetuaKelompok" class="">Tanggal</label>
                                      <input type="date" name="editTglIkatanDinasKetuaKelompok" class="form-control form-control-sm" id="editTglIkatanDinasKetuaKelompok" value="{{$ketuaKelompok->bid_tanggalKK}}">
                                      <hr>
                                      <label for="" class="">Tempat</label><br>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatIkatanDinasKetuaKelompok" id="editTempatIkatanDinasKetuaKelompok" value="Gereja Lokal" {{$ketuaKelompok->bid_tempatKK == 'Gereja Lokal' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatIkatanDinasKetuaKelompok">Gereja Lokal</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatIkatanDinasKetuaKelompok" id="editTempatIkatanDinasLKetuaKelompok" value="Gereja Lain" {{$ketuaKelompok->bid_tempatKK == 'Gereja Lain' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatIkatanDinasLKetuaKelompok">Gereja Lain</label>
                                      </div>
                                      <hr>
                                      <label for="editFileUploadIkatanDinasKetuaKelompok" class="">File</label>
                                      <input type="file" name="editFileUploadIkatanDinasKetuaKelompok" class="form-control form-control-sm" id="editFileUploadIkatanDinasKetuaKelompok" value="{{$ketuaKelompok->bid_fileKK}}">
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
                                      <textarea class="form-control form-control-sm" name="editKetIkatanDinasKetuaKelompok" id="editKetIkatanDinasKetuaKelompok" rows="3" placeholder="Keterangan">{{$ketuaKelompok->bid_ketKK}}</textarea>
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
                                        <input class="form-check-input" name="editSudahPrktkDuaThnKetuaKelompok" type="checkbox" value="" id="editSudahPrktkDuaThnKetuaKelompok" {{$ketuaKelompok->pdt_sudahKK == 'Sudah' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editSudahPrktkDuaThnKetuaKelompok">
                                          Sudah
                                        </label>
                                      </div>
                                      <hr>
                                      <label for="editTglPrktkDuaThnKetuaKelompok" class="">Tanggal</label>
                                      <input type="date" name="editTglPrktkDuaThnKetuaKelompok" class="form-control form-control-sm" id="editTglPrktkDuaThnKetuaKelompok" value="{{$ketuaKelompok->pdt_tanggalKK}}">
                                      <hr>
                                      <label for="" class="">Tempat</label><br>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatPrktkDuaThnKetuaKelompok" id="editTempatPrktkDuaThnKetuaKelompok" value="Gereja Lokal" {{$ketuaKelompok->pdt_tempatKK == 'Gereja Lokal' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatPrktkDuaThnKetuaKelompok">Gereja Lokal</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editTempatPrktkDuaThnKetuaKelompok" id="editTempatPrktkDuaThnLKetuaKelompok" value="Gereja Lain" {{$ketuaKelompok->pdt_tempatKK == 'Gereja Lain' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="editTempatPrktkDuaThnLKetuaKelompok">Gereja Lain</label>
                                      </div>
                                      <hr>
                                      <label for="editFileUploadPrktkDuaThnKetuaKelompok" class="">File</label>
                                      <input type="file" name="editFileUploadPrktkDuaThnKetuaKelompok" class="form-control form-control-sm" id="editFileUploadPrktkDuaThnKetuaKelompok" value="{{$ketuaKelompok->pdt_fileKK}}">
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
                                      <textarea class="form-control form-control-sm" name="editKetPrktkDuaThnKetuaKelompok" id="editKetPrktkDuaThnKetuaKelompok" rows="3" placeholder="Keterangan">{{$ketuaKelompok->pdt_ketKK}}</textarea>
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
                                        <option value="{{$ketuaKelompok->nama_grupKK}}">{{$ketuaKelompok->nama_grupKK}}</option>
                                      </select>
                                    </div>
                                    <div class="col-3">
                                      <label for="editJbtnGrupKetuaKelompok" class="">Jabatan Dalam Grup</label>
                                      <select class="form-select form-select-sm" name="editJbtnGrupKetuaKelompok" id="editJbtnGrupKetuaKelompok" aria-label=".form-select-sm editJbtnGrupKetuaKelompok">
                                        <option value="{{$ketuaKelompok->jbt_grupKK}}">{{$ketuaKelompok->jbt_grupKK}}</option>
                                      </select>
                                    </div>
                                    <div class="col-3">
                                      <label for="editTglGabungKetuaKelompok" class="">Tanggal Bergabung</label>
                                      <input type="date" name="editTglGabungKetuaKelompok" class="form-control form-control-sm" id="editTglGabungKetuaKelompok" value="{{$ketuaKelompok->tgl_gabung_grupKK}}">
                                    </div>
                                    <div class="col-3">
                                      <label for="editCttnMasukKetuaKelompok" class="">Catatan Masuk</label>
                                      <textarea class="form-control form-control-sm" name="editCttnMasukKetuaKelompok" id="editCttnMasukKetuaKelompok" rows="3" placeholder="Catatan Masuk Grup">{{$ketuaKelompok->catatan_masuk_grupKK}}</textarea>
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
                  <div class="modal fade" id="hapusData{{$ketuaKelompok->id_user}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusData{{$ketuaKelompok->id_user}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusData{{$ketuaKelompok->id_user}}Label">
                            <i class="bi bi-trash text-danger"></i>
                            Hapus Data Ketua Kelompok
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          ...
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal Hapus Data -->
                  <!-- Modal Hapus Data -->
                  <div class="modal fade" id="kelompok{{$ketuaKelompok->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="kelompok{{$ketuaKelompok->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="kelompok{{$ketuaKelompok->id}}Label">
                            <i class="bi bi-people text-primary"></i>
                            Kelompok
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          ...
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal Hapus Data -->
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
        // console.log(idUser);
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
  </script>
@endsection