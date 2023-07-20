@extends('layout.app')

@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
@endsection

@section('nav')
@endsection

@section('menu')
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{url('/admin')}}">
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
        <a href="{{url('/admin/data-wilayah')}}">
          <i class="bi bi-map"></i><span>Data Wilayah</span>
        </a>
      </li>
      <li>
        <a href="{{url('/admin/data-lokasi')}}">
          <i class="bi bi-geo-alt"></i><span>Data Lokasi</span>
        </a>
      </li>
      <li>
        <a href="{{url('/admin/artikelModul')}}">
          <i class="bi bi-journal-text"></i><span>Artikel/Modul</span>
        </a>
      </li>
      <li>
        <a href="{{url('/admin/video')}}">
          <i class="bi bi-play"></i><span>Video Youtube</span>
        </a>
      </li>
      <li>
        <a href="{{url('/admin/shape')}}">
          <i class="bi bi-suit-heart"></i><span>SHAPE</span>
        </a>
      </li>
      <li>
        <a href="{{url('/admin/pekerjaan')}}">
          <i class="bi bi-person-workspace"></i><span>Pekerjaan</span>
        </a>
      </li>
      <li>
        <a href="{{url('/admin/studi-minat')}}">
          <i class="bi bi-book"></i><span>Studi & Minat</span>
        </a>
      </li>
      <li>
        <a href="{{url('/admin/kolom-pilihan')}}">
          <i class="bi bi-ui-checks-grid"></i><span>Kolom Cadangan (Pilihan)</span>
        </a>
      </li>
      <li>
        <a href="{{url('/admin/kolom-pilihan-ganda')}}">
          <i class="bi bi-ui-checks"></i><span>Kolom Cadangan (Pilihan Ganda)</span>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{url('/admin/data-admin')}}">
      <i class="bi bi-person-bounding-box"></i>
      <span>Data Admin</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{url('/admin/data-pengurus')}}">
      <i class="bi bi-person"></i>
      <span>Data Pengurus</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{url('/admin/data-ketua-lokasi')}}">
      <i class="bi bi-person-circle"></i>
      <span>Data Ketua Lokasi</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('/admin/data-ketua-kelompok')}}">
      <i class="bi bi-person-square"></i>
      <span>Data Ketua Kelompok</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{url('/admin/data-peserta')}}">
      <i class="bi bi-people"></i>
      <span>Data Peserta</span>
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
                                <label for="tglRegistrasiKetuaKelompok" class="col-sm-3 px-1">Tgl Registrasi <span class="required-input">(*)</span></label>
                                <div class="col-sm-9">
                                  <input type="date" name="tglRegistrasiKetuaKelompok" class="form-control form-control-sm" id="tglRegistrasiKetuaKelompok">
                                  @error('tglRegistrasiKetuaKelompok')
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
                                  <input type="text" name="referensiKetuaKelompok" class="form-control form-control-sm" id="referensiKetuaKelompok" placeholder="Referensi Dari">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="sapaanKetuaKelompok" class="col-sm-3 px-1">Sapaan</label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="sapaanKetuaKelompok" id="sapaanKetuaKelompok" aria-label=".form-select-sm sapaanKetuaKelompok">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                  </select>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="gelarAwalanKetuaKelompok" class="col-sm-3 px-1">Gelar Awalan</label>
                                <div class="col-sm-9">
                                  <input type="text" name="gelarAwalanKetuaKelompok" class="form-control form-control-sm" id="gelarAwalanKetuaKelompok" placeholder="Gelar Awalan">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="namaKetuaKelompok" class="col-sm-3 px-1">Nama Lengkap <span class="required-input">(*)</span></label>
                                <div class="col-sm-9">
                                  <input type="text" name="namaKetuaKelompok" class="form-control form-control-sm" id="namaKetuaKelompok" placeholder="cth: Angelica Gabriel">
                                  @error('namaKetuaKelompok')
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
                                  <input type="text" name="gelarAkhiranKetuaKelompok" class="form-control form-control-sm" id="gelarAkhiranKetuaKelompok" placeholder="Gelar Akhiran">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="namaPanggilanKetuaKelompok" class="col-sm-3 px-1">Nama Panggilan</label>
                                <div class="col-sm-9">
                                  <input type="text" name="namaPanggilanKetuaKelompok" class="form-control form-control-sm" id="namaPanggilanKetuaKelompok" placeholder="cth: Angel">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="peranKetuaKelompok" class="col-sm-3 px-1">Peran dalam Keluarga</label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="peranKetuaKelompok" id="peranKetuaKelompok" aria-label=".form-select-sm peranKetuaKelompok">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                  </select>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="jenisIdentitasKetuaKelompok" class="col-sm-3 px-1">Jenis Identitas</label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="jenisIdentitasKetuaKelompok" id="jenisIdentitasKetuaKelompok" aria-label=".form-select-sm jenisIdentitasKetuaKelompok">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                  </select>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="tempatLahirKetuaKelompok" class="col-sm-3 px-1">Tempat, Tgl Lahir</label>
                                <div class="col-sm-5">
                                  <input type="text" name="tempatLahirKetuaKelompok" class="form-control form-control-sm" id="tempatLahirKetuaKelompok" placeholder="cth: Bandung">
                                </div>
                                <div class="col-sm-1">
                                  <p>/</p>
                                </div>
                                <div class="col-sm-3">
                                  <input type="date" name="tglLahirKetuaKelompok" class="form-control form-control-sm" id="tglLahirKetuaKelompok">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="jenisKelaminKetuaKelompok" class="col-sm-3 px-1">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenisKelaminKetuaKelompok" id="jenisKelaminPKetuaKelompok" value="Pria">
                                    <label class="form-check-label" for="jenisKelaminPKetuaKelompok">Pria</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenisKelaminKetuaKelompok" id="jenisKelaminWKetuaKelompok" value="Wanita">
                                    <label class="form-check-label" for="jenisKelaminWKetuaKelompok">Wanita</label>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="golonganDarahKetuaKelompok" class="col-sm-3 px-1">Golongan Darah</label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="golonganDarahKetuaKelompok" id="golonganDarahKetuaKelompok" aria-label=".form-select-sm golonganDarahKetuaKelompok">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                  </select>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="statusPernikahanKetuaKelompok" class="col-sm-3 px-1">Status Pernikahan</label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="statusPernikahanKetuaKelompok" id="statusPernikahanKetuaKelompok" aria-label=".form-select-sm statusPernikahanKetuaKelompok">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                  </select>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="fotoKetuaKelompok" class="col-sm-3 px-1">Foto</label>
                                <div class="col-sm-9">
                                  <input type="file" name="fotoKetuaKelompok" class="form-control form-control-sm" id="fotoKetuaKelompok">
                                  @error('fotoKetuaKelompok')
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
                                  <input type="file" name="fotoBitmapKetuaKelompok" class="form-control form-control-sm" id="fotoBitmapKetuaKelompok">
                                  @error('fotoBitmapKetuaKelompok')
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
                                  <input type="text" name="alamatKetuaKelompok" class="form-control form-control-sm" id="alamatKetuaKelompok" placeholder="Alamat">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="keteranganArahKetuaKelompok" class="col-sm-3 px-1">Keterangan Arah</label>
                                <div class="col-sm-9">
                                  <textarea class="form-control" name="keteranganArahKetuaKelompok" id="keteranganArahKetuaKelompok" rows="3" placeholder="Keterangan Arah"></textarea>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="petaKetuaKelompok" class="col-sm-3 px-1">Peta</label>
                                <div class="col-sm-9">
                                  <input type="text" name="petaKetuaKelompok" class="form-control form-control-sm" id="petaKetuaKelompok" placeholder="Peta">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="negaraKetuaKelompok" class="col-sm-3 px-1">Negara</label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="negaraKetuaKelompok" id="negaraKetuaKelompok" aria-label=".form-select-sm negaraKetuaKelompok">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                  </select>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="provinsiKetuaKelompok" class="col-sm-3 px-1">Provinsi</label>
                                <div class="col-sm-9">
                                  <input type="text" name="provinsiKetuaKelompok" class="form-control form-control-sm" id="provinsiKetuaKelompok" placeholder="Provinsi">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="kotaKetuaKelompok" class="col-sm-3 px-1">Kota</label>
                                <div class="col-sm-9">
                                  <input type="text" name="kotaKetuaKelompok" class="form-control form-control-sm" id="kotaKetuaKelompok" placeholder="Kota">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="kecamatanKetuaKelompok" class="col-sm-3 px-1">Kecamatan</label>
                                <div class="col-sm-9">
                                  <input type="text" name="kecamatanKetuaKelompok" class="form-control form-control-sm" id="kecamatanKetuaKelompok" placeholder="Kecamatan">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="kelurahanKetuaKelompok" class="col-sm-3 px-1">Kelurahan</label>
                                <div class="col-sm-9">
                                  <input type="text" name="kelurahanKetuaKelompok" class="form-control form-control-sm" id="kelurahanKetuaKelompok" placeholder="Kelurahan">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="kodePosKetuaKelompok" class="col-sm-3 px-1">Kode Pos</label>
                                <div class="col-sm-9">
                                  <input type="text" name="kodePosKetuaKelompok" class="form-control form-control-sm" id="kodePosKetuaKelompok" placeholder="Kode Pos">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="dusunKetuaKelompok" class="col-sm-3 px-1">Dusun (Desa)</label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="dusunKetuaKelompok" aria-label=".form-select-sm dusunKetuaKelompok">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                  </select>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="rtRwKetuaKelompok" class="col-sm-3 px-1">RT / RW</label>
                                <div class="col-sm-4">
                                  <input type="text" name="rtKetuaKelompok" class="form-control form-control-sm" id="rtRwKetuaKelompok" placeholder="RT">
                                </div>
                                <div class="col-sm-1">
                                  <p>/</p>
                                </div>
                                <div class="col-sm-4">
                                  <input type="text" name="rwKetuaKelompok" class="form-control form-control-sm" id="rtRwKetuaKelompok" placeholder="RW">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="areaKetuaKelompok" class="col-sm-3 px-1">Area</label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="areaKetuaKelompok" id="areaKetuaKelompok" aria-label=".form-select-sm areaKetuaKelompok">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
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
                                  <input type="text" name="noTelpSKetuaKelompok" class="form-control form-control-sm" id="noTelpSKetuaKelompok" placeholder="cth: +62">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="telpRumahKetuaKelompok" class="col-sm-3 px-1">Telp. Rumah 2</label>
                                <div class="col-sm-9">
                                  <input type="text" name="telpRumahKetuaKelompok" class="form-control form-control-sm" id="telpRumahKetuaKelompok" placeholder="cth: +622174130258">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="noHpSKetuaKelompok" class="col-sm-3 px-1">No HP 1</label>
                                <div class="col-sm-9">
                                  <input type="text" name="noHpSKetuaKelompok" class="form-control form-control-sm" id="noHpSKetuaKelompok" placeholder="cth: +62">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="terimaSMSKetuaKelompok" class="col-sm-3 px-1">Bisa Terima SMS?</label>
                                <div class="col-sm-9 pt-1">
                                  <div class="form-check form-switch">
                                    <input class="form-check-input" name="terimaSMSKetuaKelompok" type="checkbox" id="terimaSMSKetuaKelompok">
                                    <label class="form-check-label" for="terimaSMSKetuaKelompok">Ya</label>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="noHpDKetuaKelompok" class="col-sm-3 px-1">No HP 2</label>
                                <div class="col-sm-9">
                                  <input type="text" name="noHpDKetuaKelompok" class="form-control form-control-sm" id="noHpDKetuaKelompok" placeholder="cth: +62856789456">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="noLainKetuaKelompok" class="col-sm-3 px-1">No Lainnya</label>
                                <div class="col-sm-9">
                                  <input type="text" name="noLainKetuaKelompok" class="form-control form-control-sm" id="noLainKetuaKelompok" placeholder="mis: Pin BB">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="faxKetuaKelompok" class="col-sm-3 px-1">Fax. Rumah</label>
                                <div class="col-sm-9">
                                  <input type="text" name="faxKetuaKelompok" class="form-control form-control-sm" id="faxKetuaKelompok" placeholder="FAX">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="emailKetuaKelompok" class="col-sm-3 px-1">Email</label>
                                <div class="col-sm-9">
                                  <input type="email" name="emailKetuaKelompok" class="form-control form-control-sm" id="emailKetuaKelompok" placeholder="cth: email@gmail.com">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="terimaEmailKetuaKelompok" class="col-sm-3 px-1">Bisa Terima Email?</label>
                                <div class="col-sm-9 pt-1">
                                  <div class="form-check form-switch">
                                    <input class="form-check-input" name="terimaEmailKetuaKelompok" type="checkbox" id="terimaEmailKetuaKelompok">
                                    <label class="form-check-label" for="terimaEmailKetuaKelompok">Ya</label>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="websiteKetuaKelompok" class="col-sm-3 px-1">Website</label>
                                <div class="col-sm-9">
                                  <input type="text" name="websiteKetuaKelompok" class="form-control form-control-sm" id="websiteKetuaKelompok" placeholder="cth: Facebook, Twitter, etc">
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
                                    <select class="form-select form-select-sm" name="pekerjaanKetuaKelompok" id="pekerjaanKetuaKelompok" aria-label=".form-select-sm pekerjaanKetuaKelompok">
                                      <option selected>-Pekerjaan-</option>
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
                                  <input type="text" name="jabatanKetuaKelompok" class="form-control form-control-sm" id="jabatanKetuaKelompok" placeholder="cth: Manager, Staff, etc">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="statusPekerjaanKetuaKelompok" class="col-sm-3 px-1">Status Pekerjaan</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select form-select-sm" name="statusPekerjaanKetuaKelompok" id="statusPekerjaanKetuaKelompok" aria-label=".form-select-sm statusPekerjaanKetuaKelompok">
                                      <option selected>-Status Pekerjaan-</option>
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
                                <label for="namaPerusahaanKetuaKelompok" class="col-sm-3 px-1">Nama Perusahaan</label>
                                <div class="col-sm-9">
                                  <input type="text" name="namaPerusahaanKetuaKelompok" class="form-control form-control-sm" id="namaPerusahaanKetuaKelompok" placeholder="Nama Perusahaan">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="sektorIndustriKetuaKelompok" class="col-sm-3 px-1">Sektor Industri</label>
                                <div class="col-sm-9 row">
                                  <div class="col-11">
                                    <select class="form-select form-select-sm" name="sektorIndustriKetuaKelompok" id="sektorIndustriKetuaKelompok" aria-label=".form-select-sm sektorIndustriKetuaKelompok">
                                      <option selected>-Sektor Industri-</option>
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
                                  <input type="text" name="alamatKantorKetuaKelompok" class="form-control form-control-sm" id="alamatKantorKetuaKelompok" placeholder="Alamat Kantor">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="telpKantorKetuaKelompok" class="col-sm-3 px-1">Telp. Kantor</label>
                                <div class="col-sm-9">
                                  <input type="text" name="telpKantorKetuaKelompok" class="form-control form-control-sm" id="telpKantorKetuaKelompok" placeholder="cth: +62">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="extKetuaKelompok" class="col-sm-3 px-1">Ext.</label>
                                <div class="col-sm-9">
                                  <input type="text" name="extKetuaKelompok" class="form-control form-control-sm" id="extKetuaKelompok" placeholder="EXT">
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
                                    <select class="form-select form-select-sm" name="tingkatPendidikanKetuaKelompok" id="tingkatPendidikanKetuaKelompok" aria-label="form-select-sm tingkatPendidikanKetuaKelompok">
                                      <option selected>-Tingkat Pendidikan-</option>
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
                                    <select class="form-select form-select-sm" name="sekolahKetuaKelompok" id="sekolahKetuaKelompok" aria-label="form-select-sm sekolahKetuaKelompok">
                                      <option selected>-Sekolah / Universitas</option>
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
                                    <select class="form-control" name="bKetertarikanKetuaKelompok[]" style="width: 100%;" id="bKetertarikanKetuaKelompok" aria-label="multiple select bKetertarikanKetuaKelompok" multiple>
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
                                    <select class="form-control" name="bKeterampilanKetuaKelompok[]" id="bKeterampilanKetuaKelompok" style="width: 100%;" aria-label="multiple select bKeterampilanKetuaKelompok" multiple>
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
                                  <textarea class="form-control" name="catatanKetuaKelompok" id="catatanKetuaKelompok" rows="3" placeholder="Catatan"></textarea>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="statusKetuaKelompok" class="col-sm-3 px-1">Status</label>
                                <div class="col-sm-9">
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="statusKetuaKelompok" id="statusAKetuaKelompok" value="Aktif">
                                    <label class="form-check-label" for="statusAKetuaKelompok">Aktif</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="statusKetuaKelompok" id="statusTaKetuaKelompok" value="Tidak Aktif">
                                    <label class="form-check-label" for="statusTaKetuaKelompok">Tidak Aktif</label>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="verifEmailKetuaKelompok" class="col-sm-3 px-1">Email Sudah Verifikasi?</label>
                                <div class="col-sm-9 pt-1">
                                  <div class="form-check form-switch">
                                    <input class="form-check-input" name="verifEmailKetuaKelompok" type="checkbox" id="verifEmailKetuaKelompok">
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
                                  <input type="text" name="noRekKetuaKelompok" class="form-control form-control-sm" id="noRekKetuaKelompok" placeholder="123456789">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="perBeasiswaKetuaKelompok" class="col-sm-3 px-1">Periode Beasiswa</label>
                                <div class="col-sm-9">
                                  <input type="text" name="perBeasiswaKetuaKelompok" class="form-control form-control-sm" id="perBeasiswaKetuaKelompok" placeholder="Periode Beasiswa">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="perKerjaPKetuaKelompok" class="col-sm-3 px-1">Periode Kerja Praktik</label>
                                <div class="col-sm-9">
                                  <input type="text" name="perKerjaPKetuaKelompok" class="form-control form-control-sm" id="perKerjaPKetuaKelompok" placeholder="Periode Kerja Praktik">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="riwayatPelSKetuaKelompok" class="col-sm-3 px-1">Riwayat Pelayanan 1</label>
                                <div class="col-sm-9">
                                  <input type="text" name="riwayatPelSKetuaKelompok" class="form-control form-control-sm" id="riwayatPelSKetuaKelompok" placeholder="Riwayat Pelayanan 1">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="riwayatPelDKetuaKelompok" class="col-sm-3 px-1">Riwayat Pelayanan 2</label>
                                <div class="col-sm-9">
                                  <input type="text" name="riwayatPelDKetuaKelompok" class="form-control form-control-sm" id="riwayatPelDKetuaKelompok" placeholder="Riwayat Pelayanan 2">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="riwayatPelTKetuaKelompok" class="col-sm-3 px-1">Riwayat Pelayanan 3</label>
                                <div class="col-sm-9">
                                  <input type="text" name="riwayatPelTKetuaKelompok" class="form-control form-control-sm" id="riwayatPelTKetuaKelompok" placeholder="Riwayat Pelayanan 3">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="riwayatPelEKetuaKelompok" class="col-sm-3 px-1">Riwayat Pelayanan 4</label>
                                <div class="col-sm-9">
                                  <input type="text" name="riwayatPelEKetuaKelompok" class="form-control form-control-sm" id="riwayatPelEKetuaKelompok" placeholder="Riwayat Pelayanan 4">
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
                                    <select class="form-select form-select-sm" name="pilihanSKetuaKelompok" id="pilihanSKetuaKelompok" aria-label=".form-select-sm pilihanSKetuaKelompok">
                                      <option selected>Open this select menu</option>
                                      <option value="1">One</option>
                                      <option value="2">Two</option>
                                      <option value="3">Three</option>
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
                                    <select class="form-select form-select-sm" name="pilihanDKetuaKelompok" id="pilihanDKetuaKelompok" aria-label=".form-select-sm pilihanDKetuaKelompok">
                                      <option selected>Open this select menu</option>
                                      <option value="1">One</option>
                                      <option value="2">Two</option>
                                      <option value="3">Three</option>
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
                                    <select class="form-select form-select-sm" name="pilihanTKetuaKelompok" id="pilihanTKetuaKelompok" aria-label=".form-select-sm pilihanTKetuaKelompok">
                                      <option selected>Open this select menu</option>
                                      <option value="1">One</option>
                                      <option value="2">Two</option>
                                      <option value="3">Three</option>
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
                                    <select class="form-select form-select-sm" name="pilihanEKetuaKelompok" id="pilihanEKetuaKelompok" aria-label=".form-select-sm pilihanEKetuaKelompok">
                                      <option selected>Open this select menu</option>
                                      <option value="1">One</option>
                                      <option value="2">Two</option>
                                      <option value="3">Three</option>
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
                                    <select class="form-select form-select-sm" name="pilihanLKetuaKelompok" id="pilihanLKetuaKelompok" aria-label=".form-select-sm pilihanLKetuaKelompok">
                                      <option selected>Open this select menu</option>
                                      <option value="1">One</option>
                                      <option value="2">Two</option>
                                      <option value="3">Three</option>
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
                                    <select class="form-select form-select-sm" name="pilihanEnKetuaKelompok" id="pilihanEnKetuaKelompok" aria-label=".form-select-sm pilihanEnKetuaKelompok">
                                      <option selected>Open this select menu</option>
                                      <option value="1">One</option>
                                      <option value="2">Two</option>
                                      <option value="3">Three</option>
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
                                    <select class="form-select form-select-sm" name="pilihanTuKetuaKelompok" id="pilihanTuKetuaKelompok" aria-label=".form-select-sm pilihanTuKetuaKelompok">
                                      <option selected>Open this select menu</option>
                                      <option value="1">One</option>
                                      <option value="2">Two</option>
                                      <option value="3">Three</option>
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
                                    <select class="form-select" name="pilihanGSKetuaKelompok[]" style="width: 100%;" id="pilihanGSKetuaKelompok" aria-label="multiple select pilihanGSKetuaKelompok" multiple>
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
                                    <select class="form-select" name="pilihanGDKetuaKelompok[]" style="width: 100%;" id="pilihanGDKetuaKelompok" aria-label="multiple select pilihanGDKetuaKelompok" multiple>
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
                                    <select class="form-select" name="pilihanGTKetuaKelompok[]" style="width: 100%;" id="pilihanGTKetuaKelompok" aria-label="multiple select pilihanGTKetuaKelompok" multiple>
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
                                    <select class="form-select" name="pilihanGEKetuaKelompok[]" style="width: 100%;" id="pilihanGEKetuaKelompok" aria-label="multiple select pilihanGEKetuaKelompok" multiple>
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
                                    <select class="form-select" name="pilihanGLKetuaKelompok[]" style="width: 100%;" id="pilihanGLKetuaKelompok" aria-label="multiple select pilihanGLKetuaKelompok" multiple>
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
                                    <select class="form-select" name="pilihanGEnKetuaKelompok[]" style="width: 100%;" id="pilihanGEnKetuaKelompok" aria-label="multiple select pilihanGEnKetuaKelompok" multiple>
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
                                    <select class="form-select" name="pilihanGTuKetuaKelompok[]" style="width: 100%;" id="pilihanGTuKetuaKelompok" aria-label="multiple select pilihanGTuKetuaKelompok" multiple>
                                      <option>-Pernah Menderita Penyakit-</option>
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
                                <label for="checkSKetuaKelompok" class="col-sm-3 px-1"></label>
                                <div class="col-sm-9 pt-1">
                                  <div class="form-check form-switch">
                                    <input class="form-check-input" name="checkSKetuaKelompok" type="checkbox" id="checkSKetuaKelompok">
                                    <label class="form-check-label" for="checkSKetuaKelompok">Ya</label>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="checkDKetuaKelompok" class="col-sm-3 px-1"></label>
                                <div class="col-sm-9 pt-1">
                                  <div class="form-check form-switch">
                                    <input class="form-check-input" name="checkDKetuaKelompok" type="checkbox" id="checkDKetuaKelompok">
                                    <label class="form-check-label" for="checkDKetuaKelompok">Ya</label>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="checkTKetuaKelompok" class="col-sm-3 px-1"></label>
                                <div class="col-sm-9 pt-1">
                                  <div class="form-check form-switch">
                                    <input class="form-check-input" name="checkTKetuaKelompok" type="checkbox" id="checkTKetuaKelompok">
                                    <label class="form-check-label" for="checkTKetuaKelompok">Ya</label>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="checkEKetuaKelompok" class="col-sm-3 px-1"></label>
                                <div class="col-sm-9 pt-1">
                                  <div class="form-check form-switch">
                                    <input class="form-check-input" name="checkEKetuaKelompok" type="checkbox" id="checkEKetuaKelompok">
                                    <label class="form-check-label" for="checkEKetuaKelompok">Ya</label>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="checkLKetuaKelompok" class="col-sm-3 px-1"></label>
                                <div class="col-sm-9 pt-1">
                                  <div class="form-check form-switch">
                                    <input class="form-check-input" name="checkLKetuaKelompok" type="checkbox" id="checkLKetuaKelompok">
                                    <label class="form-check-label" for="checkLKetuaKelompok">Ya</label>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="checkEnKetuaKelompok" class="col-sm-3 px-1"></label>
                                <div class="col-sm-9 pt-1">
                                  <div class="form-check form-switch">
                                    <input class="form-check-input" name="checkEnKetuaKelompok" type="checkbox" id="checkEnKetuaKelompok">
                                    <label class="form-check-label" for="checkEnKetuaKelompok">Ya</label>
                                  </div>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="checkTuKetuaKelompok" class="col-sm-3 px-1"></label>
                                <div class="col-sm-9 pt-1">
                                  <div class="form-check form-switch">
                                    <input class="form-check-input" name="checkTuKetuaKelompok" type="checkbox" id="checkTuKetuaKelompok">
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
                                    <input class="form-check-input" name="sudahBaptisAnakKetuaKelompok" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      Sudah
                                    </label>
                                  </div>
                                  <hr>
                                  <label for="tglBaptisAnakKetuaKelompok" class="">Tanggal</label>
                                  <input type="date" name="tglBaptisAnakKetuaKelompok" class="form-control form-control-sm" id="tglBaptisAnakKetuaKelompok">
                                  <hr>
                                  <label for="" class="">Tempat</label><br>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatBaptisAnakKetuaKelompok" id="tempatBaptisAnakKetuaKelompok" value="Gereja Lokal">
                                    <label class="form-check-label" for="tempatBaptisAnakKetuaKelompok">Gereja Lokal</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatBaptisAnakKetuaKelompok" id="tempatBaptisAnakLKetuaKelompok" value="Gereja Lain">
                                    <label class="form-check-label" for="tempatBaptisAnakLKetuaKelompok">Gereja Lain</label>
                                  </div>
                                  <hr>
                                  <label for="fileUploadBaptisAnakKetuaKelompok" class="">File</label>
                                  <input type="file" name="fileUploadBaptisAnakKetuaKelompok" class="form-control form-control-sm" id="fileUploadBaptisAnakKetuaKelompok">
                                  @error('fileUploadBaptisAnakKetuaKelompok')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                  <hr>
                                  <label for="ketBaptisAnakKetuaKelompok" class="">Keterangan</label>
                                  <textarea class="form-control" name="ketBaptisAnakKetuaKelompok" id="ketBaptisAnakKetuaKelompok" rows="3" placeholder="Keterangan"></textarea>
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
                                    <input class="form-check-input" name="sudahMenikahKetuaKelompok" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      Sudah
                                    </label>
                                  </div>
                                  <hr>
                                  <label for="tglMenikahKetuaKelompok" class="">Tanggal</label>
                                  <input type="date" name="tglMenikahKetuaKelompok" class="form-control form-control-sm" id="tglMenikahKetuaKelompok">
                                  <hr>
                                  <label for="" class="">Tempat</label><br>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatMenikahKetuaKelompok" id="tempatMenikahKetuaKelompok" value="Gereja Lokal">
                                    <label class="form-check-label" for="tempatMenikahKetuaKelompok">Gereja Lokal</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatMenikahKetuaKelompok" id="tempatMenikahLKetuaKelompok" value="Gereja Lain">
                                    <label class="form-check-label" for="tempatMenikahLKetuaKelompok">Gereja Lain</label>
                                  </div>
                                  <hr>
                                  <label for="fileUploadMenikahKetuaKelompok" class="">File</label>
                                  <input type="file" name="fileUploadMenikahKetuaKelompok" class="form-control form-control-sm" id="fileUploadMenikahKetuaKelompok">
                                  @error('fileUploadMenikahKetuaKelompok')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                  <hr>
                                  <label for="ketMenikahKetuaKelompok" class="">Keterangan</label>
                                  <textarea class="form-control" name="ketMenikahKetuaKelompok" id="ketMenikahKetuaKelompok" rows="3" placeholder="Keterangan"></textarea>
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
                                    <input class="form-check-input" name="sudahBaptisKetuaKelompok" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      Sudah
                                    </label>
                                  </div>
                                  <hr>
                                  <label for="tglBaptisKetuaKelompok" class="">Tanggal</label>
                                  <input type="date" name="tglBaptisKetuaKelompok" class="form-control form-control-sm" id="tglBaptisKetuaKelompok">
                                  <hr>
                                  <label for="" class="">Tempat</label><br>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatBaptisKetuaKelompok" id="tempatBaptisKetuaKelompok" value="Gereja Lokal">
                                    <label class="form-check-label" for="tempatBaptisKetuaKelompok">Gereja Lokal</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatBaptisKetuaKelompok" id="tempatBaptisLKetuaKelompok" value="Gereja Lain">
                                    <label class="form-check-label" for="tempatBaptisLKetuaKelompok">Gereja Lain</label>
                                  </div>
                                  <hr>
                                  <label for="fileUploadBaptisKetuaKelompok" class="">File</label>
                                  <input type="file" name="fileUploadBaptisKetuaKelompok" class="form-control form-control-sm" id="fileUploadBaptisKetuaKelompok">
                                  @error('fileUploadBaptisKetuaKelompok')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                  <hr>
                                  <label for="ketBaptisKetuaKelompok" class="">Keterangan</label>
                                  <textarea class="form-control" name="ketBaptisKetuaKelompok" id="ketBaptisKetuaKelompok" rows="3" placeholder="Keterangan"></textarea>
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
                                    <input class="form-check-input" name="sudahMeninggalDuniaKetuaKelompok" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      Sudah
                                    </label>
                                  </div>
                                  <hr>
                                  <label for="tglMeninggalDuniaKetuaKelompok" class="">Tanggal</label>
                                  <input type="date" name="tglMeninggalDuniaKetuaKelompok" class="form-control form-control-sm" id="tglMeninggalDuniaKetuaKelompok">
                                  <hr>
                                  <label for="" class="">Tempat</label><br>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatMeninggalDuniaKetuaKelompok" id="tempatMeninggalDuniaKetuaKelompok" value="Gereja Lokal">
                                    <label class="form-check-label" for="tempatMeninggalDuniaKetuaKelompok">Gereja Lokal</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatMeninggalDuniaKetuaKelompok" id="tempatMeninggalDuniaLKetuaKelompok" value="Gereja Lain">
                                    <label class="form-check-label" for="tempatMeninggalDuniaLKetuaKelompok">Gereja Lain</label>
                                  </div>
                                  <hr>
                                  <label for="fileUploadMeninggalDuniaKetuaKelompok" class="">File</label>
                                  <input type="file" name="fileUploadMeninggalDuniaKetuaKelompok" class="form-control form-control-sm" id="fileUploadMeninggalDuniaKetuaKelompok">
                                  @error('fileUploadMeninggalDuniaKetuaKelompok')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                  <hr>
                                  <label for="ketMeninggalDuniaKetuaKelompok" class="">Keterangan</label>
                                  <textarea class="form-control" name="ketMeninggalDuniaKetuaKelompok" id="ketMeninggalDuniaKetuaKelompok" rows="3" placeholder="Keterangan"></textarea>
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
                                    <input class="form-check-input" name="sudahPenyerahanAnakKetuaKelompok" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      Sudah
                                    </label>
                                  </div>
                                  <hr>
                                  <label for="tglPenyerahanAnakKetuaKelompok" class="">Tanggal</label>
                                  <input type="date" name="tglPenyerahanAnakKetuaKelompok" class="form-control form-control-sm" id="tglPenyerahanAnakKetuaKelompok">
                                  <hr>
                                  <label for="" class="">Tempat</label><br>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatPenyerahanAnakKetuaKelompok" id="tempatPenyerahanAnakKetuaKelompok" value="Gereja Lokal">
                                    <label class="form-check-label" for="tempatPenyerahanAnakKetuaKelompok">Gereja Lokal</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatPenyerahanAnakKetuaKelompok" id="tempatPenyerahanAnakLKetuaKelompok" value="Gereja Lain">
                                    <label class="form-check-label" for="tempatPenyerahanAnakLKetuaKelompok">Gereja Lain</label>
                                  </div>
                                  <hr>
                                  <label for="fileUploadPenyerahanAnakKetuaKelompok" class="">File</label>
                                  <input type="file" name="fileUploadPenyerahanAnakKetuaKelompok" class="form-control form-control-sm" id="fileUploadPenyerahanAnakKetuaKelompok">
                                  @error('fileUploadPenyerahanAnakKetuaKelompok')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                  <hr>
                                  <label for="ketPenyerahanAnakKetuaKelompok" class="">Keterangan</label>
                                  <textarea class="form-control" name="ketPenyerahanAnakKetuaKelompok" id="ketPenyerahanAnakKetuaKelompok" rows="3" placeholder="Keterangan"></textarea>
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
                                    <input class="form-check-input" name="sudahEvangelismExplosionKetuaKelompok" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      Sudah
                                    </label>
                                  </div>
                                  <hr>
                                  <label for="tglEvangelismExplosionKetuaKelompok" class="">Tanggal</label>
                                  <input type="date" name="tglEvangelismExplosionKetuaKelompok" class="form-control form-control-sm" id="tglEvangelismExplosionKetuaKelompok">
                                  <hr>
                                  <label for="" class="">Tempat</label><br>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatEvangelismExplosionKetuaKelompok" id="tempatEvangelismExplosionKetuaKelompok" value="Gereja Lokal">
                                    <label class="form-check-label" for="tempatEvangelismExplosionKetuaKelompok">Gereja Lokal</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatEvangelismExplosionKetuaKelompok" id="tempatEvangelismExplosionLKetuaKelompok" value="Gereja Lain">
                                    <label class="form-check-label" for="tempatEvangelismExplosionLKetuaKelompok">Gereja Lain</label>
                                  </div>
                                  <hr>
                                  <label for="fileUploadEvangelismExplosionKetuaKelompok" class="">File</label>
                                  <input type="file" name="fileUploadEvangelismExplosionKetuaKelompok" class="form-control form-control-sm" id="fileUploadEvangelismExplosionKetuaKelompok">
                                  @error('fileUploadEvangelismExplosionKetuaKelompok')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                  <hr>
                                  <label for="ketEvangelismExplosionKetuaKelompok" class="">Keterangan</label>
                                  <textarea class="form-control" name="ketEvangelismExplosionKetuaKelompok" id="ketEvangelismExplosionKetuaKelompok" rows="3" placeholder="Keterangan"></textarea>
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
                                    <input class="form-check-input" name="sudahIkatanDinasKetuaKelompok" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      Sudah
                                    </label>
                                  </div>
                                  <hr>
                                  <label for="tglIkatanDinasKetuaKelompok" class="">Tanggal</label>
                                  <input type="date" name="tglIkatanDinasKetuaKelompok" class="form-control form-control-sm" id="tglIkatanDinasKetuaKelompok">
                                  <hr>
                                  <label for="" class="">Tempat</label><br>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatIkatanDinasKetuaKelompok" id="tempatIkatanDinasKetuaKelompok" value="Gereja Lokal">
                                    <label class="form-check-label" for="tempatIkatanDinasKetuaKelompok">Gereja Lokal</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatIkatanDinasKetuaKelompok" id="tempatIkatanDinasLKetuaKelompok" value="Gereja Lain">
                                    <label class="form-check-label" for="tempatIkatanDinasLKetuaKelompok">Gereja Lain</label>
                                  </div>
                                  <hr>
                                  <label for="fileUploadIkatanDinasKetuaKelompok" class="">File</label>
                                  <input type="file" name="fileUploadIkatanDinasKetuaKelompok" class="form-control form-control-sm" id="fileUploadIkatanDinasKetuaKelompok">
                                  @error('fileUploadIkatanDinasKetuaKelompok')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                  <hr>
                                  <label for="ketIkatanDinasKetuaKelompok" class="">Keterangan</label>
                                  <textarea class="form-control" name="ketIkatanDinasKetuaKelompok" id="ketIkatanDinasKetuaKelompok" rows="3" placeholder="Keterangan"></textarea>
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
                                    <input class="form-check-input" name="sudahPrktkDuaThnKetuaKelompok" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      Sudah
                                    </label>
                                  </div>
                                  <hr>
                                  <label for="tglPrktkDuaThnKetuaKelompok" class="">Tanggal</label>
                                  <input type="date" name="tglPrktkDuaThnKetuaKelompok" class="form-control form-control-sm" id="tglPrktkDuaThnKetuaKelompok">
                                  <hr>
                                  <label for="" class="">Tempat</label><br>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatPrktkDuaThnKetuaKelompok" id="tempatPrktkDuaThnKetuaKelompok" value="Gereja Lokal">
                                    <label class="form-check-label" for="tempatPrktkDuaThnKetuaKelompok">Gereja Lokal</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempatPrktkDuaThnKetuaKelompok" id="tempatPrktkDuaThnLKetuaKelompok" value="Gereja Lain">
                                    <label class="form-check-label" for="tempatPrktkDuaThnLKetuaKelompok">Gereja Lain</label>
                                  </div>
                                  <hr>
                                  <label for="fileUploadPrktkDuaThnKetuaKelompok" class="">File</label>
                                  <input type="file" name="fileUploadPrktkDuaThnKetuaKelompok" class="form-control form-control-sm" id="fileUploadPrktkDuaThnKetuaKelompok">
                                  @error('fileUploadPrktkDuaThnKetuaKelompok')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                  <hr>
                                  <label for="ketPrktkDuaThnKetuaKelompok" class="">Keterangan</label>
                                  <textarea class="form-control" name="ketPrktkDuaThnKetuaKelompok" id="ketPrktk2ThnKetuaKelompok" rows="3" placeholder="Keterangan"></textarea>
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
                                  <select class="form-select form-select-sm" name="namaGrupKetuaKelompok" id="namaGrupKetuaKelompok" aria-label=".form-select-sm namaGrupKetuaKelompok">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                  </select>
                                </div>
                                <div class="col-3">
                                  <label for="jbtnGrupKetuaKelompok" class="">Jabatan Dalam Grup</label>
                                  <select class="form-select form-select-sm" name="jbtnGrupKetuaKelompok" id="jbtnGrupKetuaKelompok" aria-label=".form-select-sm jbtnGrupKetuaKelompok">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                  </select>
                                </div>
                                <div class="col-3">
                                  <label for="tglGabungKetuaKelompok" class="">Tanggal Bergabung</label>
                                  <input type="date" name="tglGabungKetuaKelompok" class="form-control form-control-sm" id="tglGabungKetuaKelompok">
                                </div>
                                <div class="col-3">
                                  <label for="cttnMasukKetuaKelompok" class="">Catatan Masuk</label>
                                  <textarea class="form-control" name="cttnMasukKetuaKelompok" id="cttnMasukKetuaKelompok" rows="3" placeholder="Keterangan"></textarea>
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
                                  <input class="form-control" type="password" name="kata_sandiKetuaKelompok" id="kata_sandiKetuaKelompok" rows="3" placeholder="********">
                                  @error('kata_sandiKetuaKelompok')
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
                                  <input class="form-control" type="password" name="konfirmasi_kata_sandiKetuaKelompok" id="konfirmasi_kata_sandiKetuaKelompok" rows="3" placeholder="********">
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
                </tr>
              </thead>
              <tbody>
                @forelse ($ketuaKelompoks as $ketuaKelompok)
                  <tr>
                    <th scope="row">{{$noKetuaKelompoks++}}</th>
                    <td>{{$ketuaKelompok->id}}</td>
                    <td>
                      <a href="#lihatData" data-bs-toggle="modal" class="text-info">
                        {{$ketuaKelompok->nama_lengkapKK}} <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Data"></i>
                      </a>
                    </td>
                    <td>{{$ketuaKelompok->tanggal_registKK}}</td>
                    <td>{{$ketuaKelompok->tempat_lahirKK}}, {{$ketuaKelompok->tanggal_lahirKK}}</td>
                    <td>{{$ketuaKelompok->jkKK}}</td>
                    <td>{{$ketuaKelompok->alamatKK}}</td>
                    <td>
                      <div class="icon-action">
                        <a href="#ubahData" data-bs-toggle="modal" class="text-primary">
                          <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                        </a>
                        |
                        <a href="#hapusData" data-bs-toggle="modal" class="text-danger">
                          <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Lihat Data -->
                  <div class="modal fade" id="lihatData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="lihatDataLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="lihatDataLabel">
                            <i class="bi bi-info-circle text-info"></i>
                            Lihat Data Ketua Kelompok
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
                  <!-- End Modal Lihat Data -->
                  <!-- Modal Ubah Data -->
                  <div class="modal fade" id="ubahData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahDataLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahDataLabel">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Data Ketua Kelompok
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
                  <!-- End Modal Ubah Data -->
                  <!-- Modal Hapus Data -->
                  <div class="modal fade" id="hapusData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusDataLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusDataLabel">
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
  </script>
@endsection