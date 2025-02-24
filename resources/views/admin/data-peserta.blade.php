@extends('layout.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css" />
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
    <a class="nav-link collapsed" href="{{url('/admin/data-ketua-kelompok')}}">
      <i class="bi bi-person-square"></i>
      <span>Data Ketua Kelompok</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('/admin/data-peserta')}}">
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
    <h1>Data Kontak</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/admin')}}">Admin</a></li>
        <li class="breadcrumb-item active">Data Kontak</li>
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
                <h5 class="card-title card-title-full"><i class="bi bi-people"></i> Data Kontak</h5>
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
                      Tambah Data Kontak
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('data-peserta.store') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group-input">
                        <div class="form-header-group mb-3">
                          <h6>PERSONAL</h6>
                        </div>
                        <div class="input-center ps-5">
                          <div class="w-75">
                            <div class="mb-3 row">
                              <label for="tglKontakPeserta" class="col-sm-3 px-1">Tgl Kontak <span class="required-input">(*)</span></label>
                              <div class="col-sm-9">
                                <input type="date" required name="tglKontakPeserta" class="form-control form-control-sm" id="tglKontakPeserta">
                                @error('tglKontakPeserta')
                                  <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                    <p class="" style="font-size: 10pt;">
                                      <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                      {{ $message }}
                                    </p>
                                  </div>
                                @enderror
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="namaKontakPeserta" class="col-sm-3 px-1">Nama Kontak <span class="required-input">(*)</span></label>
                              <div class="col-sm-9">
                                <input type="text" name="namaKontakPeserta" required class="form-control form-control-sm" id="namaKontakPeserta" placeholder="cth: Angelica Gabriel">
                                @error('namaKontakPeserta')
                                  <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                    <p class="" style="font-size: 10pt;">
                                      <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                      {{ $message }}
                                    </p>
                                  </div>
                                @enderror
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="jenisKelaminPeserta" class="col-sm-3 px-1">Jenis Kelamin <span class="required-input">(*)</span></label>
                              <div class="col-sm-9">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="jenisKelaminPeserta" id="jenisKelaminPPeserta" value="Pria">
                                  <label class="form-check-label" for="jenisKelaminPPeserta">Pria</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="jenisKelaminPeserta" id="jenisKelaminWPeserta" value="Wanita">
                                  <label class="form-check-label" for="jenisKelaminWPeserta">Wanita</label>
                                </div>
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="skalaPeserta" class="col-sm-3 px-1">Skala <span class="default-value">(Nilai Bawaan -3)</span></label>
                              <div class="col-sm-9 range-wrap">
                                <input type="range" name="skalaPeserta"
                                  data-provide="slider"
                                  data-slider-ticks="[-3, -2, -1, 0, 1, 2, 3]"
                                  data-slider-ticks-labels='["-3", "-2", "-1", "0", "1", "2", "3"]'
                                  data-slider-ticks-positions="[0,16.6,33.2,49.8,66.4,83,100]"
                                  data-slider-min="-3"
                                  data-slider-max="3"
                                  data-slider-step="1"
                                  data-slider-value=""
                                  data-slider-tooltip="hide">
                                @error('skalaPeserta')
                                  <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                    <p class="" style="font-size: 10pt;">
                                      <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                      {{ $message }}
                                    </p>
                                  </div>
                                @enderror
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="catatanPeserta" class="col-sm-3 px-1">Catatan</label>
                              <div class="col-sm-9">
                                <textarea class="form-control" name="catatanPeserta" id="catatanPeserta" rows="3" placeholder="Catatan Peserta"></textarea>
                                @error('catatanPeserta')
                                  <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                    <p class="" style="font-size: 10pt;">
                                      <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                      {{ $message }}
                                    </p>
                                  </div>
                                @enderror
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="noHpPeserta" class="col-sm-3 px-1">Nomor HP</label>
                              <div class="col-sm-9">
                                <input class="form-control" type="text" name="noHpPeserta" placeholder="(9999)-999999999">
                                @error('noHpPeserta')
                                  <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                    <p class="" style="font-size: 10pt;">
                                      <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                      {{ $message }}
                                    </p>
                                  </div>
                                @enderror
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="alamatPeserta" class="col-sm-3 px-1">Alamat</label>
                              <div class="col-sm-9">
                                <textarea class="form-control" name="alamatPeserta" id="alamatPeserta" rows="3" placeholder="Alamat Peserta"></textarea>
                                @error('alamatPeserta')
                                  <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                    <p class="" style="font-size: 10pt;">
                                      <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                      {{ $message }}
                                    </p>
                                  </div>
                                @enderror
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="tempatLahirPeserta" class="col-sm-3 px-1">Tempat, Tgl Lahir</label>
                              <div class="col-sm-5">
                                <input type="text" name="tempatLahirPeserta" class="form-control form-control-sm" id="tempatLahirPeserta" placeholder="cth: Bandung">
                                @error('tempatLahirPeserta')
                                  <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                    <p class="" style="font-size: 10pt;">
                                      <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                      {{ $message }}
                                    </p>
                                  </div>
                                @enderror
                              </div>
                              <div class="col-sm-1">
                                <p>/</p>
                              </div>
                              <div class="col-sm-3">
                                <input type="date" name="tanggalLahirPeserta" class="form-control form-control-sm" id="tanggalLahirPeserta">
                                @error('tanggalLahirPeserta')
                                  <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                    <p class="" style="font-size: 10pt;">
                                      <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                      {{ $message }}
                                    </p>
                                  </div>
                                @enderror
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="pekerjaanPeserta" class="col-sm-3 px-1">Pekerjaan</label>
                              <div class="col-sm-9">
                                <select class="form-select form-select-sm" name="pekerjaanPeserta" id="pekerjaanPeserta" aria-label=".form-select-sm pekerjaanPeserta">
                                  <option selected>Open this select menu</option>
                                  <option value="1">One</option>
                                  <option value="2">Two</option>
                                  <option value="3">Three</option>
                                </select>
                                @error('pekerjaanPeserta')
                                  <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                    <p class="" style="font-size: 10pt;">
                                      <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                      {{ $message }}
                                    </p>
                                  </div>
                                @enderror
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="sukuPeserta" class="col-sm-3 px-1">Berasal Dari Suku</label>
                              <div class="col-sm-9">
                                <input type="text" name="sukuPeserta" class="form-control form-control-sm" id="sukuPeserta" placeholder="cth: Sunda">
                                @error('sukuPeserta')
                                  <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                    <p class="" style="font-size: 10pt;">
                                      <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                      {{ $message }}
                                    </p>
                                  </div>
                                @enderror
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="statusPeserta" class="col-sm-3 px-1">Status</label>
                              <div class="col-sm-9">
                                <div class="form-check form-switch">
                                  <input class="form-check-input" name="statusPeserta" type="checkbox" id="aktif" value="Aktif">
                                  <label class="form-check-label" for="aktif">Aktif</label>
                                </div>
                                @error('statusPeserta')
                                  <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                    <p class="" style="font-size: 10pt;">
                                      <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                      {{ $message }}
                                    </p>
                                  </div>
                                @enderror
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="fotoPeserta" class="col-sm-3 px-1">Foto</label>
                              <div class="col-sm-9">
                                <input type="file" name="fotoPeserta" class="form-control form-control-sm" id="fotoPeserta">
                                @error('fotoPeserta')
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
                  <th scope="col">Nama Kontak</th>
                  <th scope="col">No Telepon</th>
                  <th scope="col">Jenis Kelamin</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Skala</th>
                  <th scope="col">Catatan</th>
                  <th scope="col">Status</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($pesertas as $peserta)
                  <tr>
                    <th scope="row">{{$no++}}</th>
                    <td>
                      <a href="#lihatData{{$peserta->id_peserta}}" data-bs-toggle="modal" class="text-info">
                        {{$peserta->nama_peserta}} <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Data"></i>
                      </a>
                    </td>
                    <td>{{$peserta->no_hp_peserta}}</td>
                    <td>{{$peserta->jk_peserta}}</td>
                    <td>{{$peserta->alamat_peserta}}</td>
                    <td>
                      @foreach ($peserta->skala as $skala)
                        {{$skala->skala}}
                      @endforeach
                    </td>
                    <td>28</td>
                    <td>{{$peserta->status_peserta}}</td>
                    <td>
                      <div class="icon-action">
                        <a href="#ubahData{{$peserta->id_peserta}}" data-bs-toggle="modal" class="text-primary">
                          <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                        </a>
                        |
                        <a href="#hapusData{{$peserta->id_peserta}}" data-bs-toggle="modal" class="text-danger">
                          <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Lihat Data -->
                  <div class="modal fade" id="lihatData{{$peserta->id_peserta}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="lihatData{{$peserta->id_peserta}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="lihatData{{$peserta->id_peserta}}Label">
                            <i class="bi bi-info-circle text-info"></i>
                            Lihat Data Kontak
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
                  <div class="modal fade" id="ubahData{{$peserta->id_peserta}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahData{{$peserta->id_peserta}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahData{{$peserta->id_peserta}}Label">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Data Kontak
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
                  <div class="modal fade" id="hapusData{{$peserta->id_peserta}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusData{{$peserta->id_peserta}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusData{{$peserta->id_peserta}}Label">
                            <i class="bi bi-trash text-danger"></i>
                            Hapus Data Kontak
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
      <hr>
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <h5 class="card-title card-title-full"><i class="bi bi-check-circle"></i> Pengajuan Skala</h5>
              </div>
            </div>
            <hr>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Nama Peserta</th>
                  <th scope="col">Skala Lama</th>
                  <th scope="col">Skala Terbaru</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">Ketua Kelompok</th>
                  <th scope="col">Status</th>
                  <th scope="col">Setuju | Tolak</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>
                    <a href="#lihatData" data-bs-toggle="modal" class="text-info">
                      Brandon Jacob <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Data"></i>
                    </a>
                  </td>
                  <td>Designer</td>
                  <td>28</td>
                  <td>2016-05-25</td>
                  <td>2016-05-25</td>
                  <td>2016-05-25</td>
                  <td>
                    <div class="icon-action">
                      <a href="#terimaSkala" data-bs-toggle="modal" class="text-primary">
                        <i class="bi bi-check-lg" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Setuju"></i>
                      </a>
                      |
                      <a href="#tolakSkala" data-bs-toggle="modal" class="text-danger">
                        <i class="bi bi-x-lg" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tolak"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- Modal Terima Skala -->
            <div class="modal fade" id="terimaSkala" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="terimaSkalaLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="terimaSkalaLabel">
                      <i class="bi bi-check-lg text-primary"></i>
                      Terima Skala Peserta
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
            <!-- End Modal Terima Skala -->
            <!-- Modal Tolak Skala -->
            <div class="modal fade" id="tolakSkala" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tolakSkalaLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tolakSkalaLabel">
                      <i class="bi bi-trash text-danger"></i>
                      Tolak Skala Peserta
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
            <!-- End Modal Tolak Skala -->
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/bootstrap-slider.min.js"></script>
<script>

</script>
@endsection