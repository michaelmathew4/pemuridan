@extends('layout.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css" />
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
    <a class="nav-link collapsed" href="{{route('data-lembaga.index')}}">
      <i class="bi bi-person-square"></i>
      <span>Data Lembaga</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('data-kontak.index')}}">
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
    <h1>Data Kontak</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin')}}">Admin</a></li>
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
                      <form action="{{ route('data-kontak.store') }}" method="post" enctype="multipart/form-data">
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
                                <label for="skalaPeserta" class="col-sm-3 px-1">Skala <span class="default-value">(Nilai Bawaan -3)</span> <span class="required-input">(*)</span></label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="skalaPeserta" id="skalaPeserta" aria-label=".form-select-sm skalaPeserta">
                                    <option value="">-Skala-</option>
                                    <option value="-3">Skala -3</option>
                                    <option value="-2">Skala -2</option>
                                    <option value="-1">Skala -1</option>
                                    <option value="0">Skala 0</option>
                                    <option value="1">Skala 1</option>
                                    <option value="2">Skala 2</option>
                                    <option value="3">Skala 3</option>
                                  </select>
                                  <!-- <input type="range" name="skalaPeserta"
                                    data-provide="slider"
                                    data-slider-ticks="[-3, -2, -1, 0, 1, 2, 3]"
                                    data-slider-ticks-labels='["-3", "-2", "-1", "0", "1", "2", "3"]'
                                    data-slider-ticks-positions="[0,16.6,33.2,49.8,66.4,83,100]"
                                    data-slider-min="-3"
                                    data-slider-max="3"
                                    data-slider-step="1"
                                    data-slider-value="-3"
                                    data-slider-tooltip="hide"> -->
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
                                <label for="catatanPeserta" class="col-sm-3 px-1">Catatan <span class="required-input">(*)</span></label>
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
                                <label for="noHpPeserta" class="col-sm-3 px-1">Nomor HP <span class="required-input">(*)</span></label>
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
                                <label for="alamatPeserta" class="col-sm-3 px-1">Alamat <span class="required-input">(*)</span></label>
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
                                <label for="tempatLahirPeserta" class="col-sm-3 px-1">Tempat, Tgl Lahir <span class="required-input">(*)</span></label>
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
                                <label for="pekerjaanPeserta" class="col-sm-3 px-1">Pekerjaan <span class="required-input">(*)</span></label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="pekerjaanPeserta" id="pekerjaanPeserta" aria-label=".form-select-sm pekerjaanPeserta">
                                    <option value="">-Pekerjaan-</option>
                                    <option value="Pegawai Negeri Sipil (PNS)">Pegawai Negeri Sipil (PNS)</option>
                                    <option value="Aparat TNI - POLRI">Aparat TNI - POLRI</option>
                                    <option value="Pegawai Swasta">Pegawai Swasta</option>
                                    <option value="Guru / Dosen">Guru / Dosen</option>
                                    <option value="Pelajar / Mahasiswa">Pelajar / Mahasiswa</option>
                                    <option value="Petani / Peternak">Petani / Peternak</option>
                                    <option value="Wiraswasta / Pengusaha">Wiraswasta / Pengusaha</option>
                                    <option value="Lain-lain">Lain-lain</option>
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
                                <label for="sukuPeserta" class="col-sm-3 px-1">Berasal Dari Suku <span class="required-input">(*)</span></label>
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
                                <label for="statusPeserta" class="col-sm-3 px-1">Status <span class="required-input">(*)</span></label>
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
                                <label for="lokasiPeserta" class="col-sm-3 px-1">Lokasi Kontak <span class="required-input">(*)</span></label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="lokasiPeserta" id="lokasiPeserta" aria-label=".form-select-sm lokasiPeserta">
                                    <option value="">-Lokasi Kontak-</option>
                                    @foreach ($lokasis as $lokasi)
                                      <option value="{{$lokasi->nama_lokasi}}">{{$lokasi->nama_lokasi}}</option>
                                    @endforeach
                                  </select>
                                  @error('lokasiPeserta')
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
                                <label for="institusiPeserta" class="col-sm-3 px-1 form-label">Lembaga <span class="required-input">(*)</span></label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="institusiPeserta" id="institusiPeserta">
                                    <option value="">-Lembaga-</option>
                                    <option value="BPH J2 / YMP (Yayasan Ministry Parousia)">BPH J2 / YMP (Yayasan Ministry Parousia)</option>
                                    <option value="GKP (Gereja Kristen Parousia)">GKP (Gereja Kristen Parousia)</option>
                                  </select>
                                  @error('institusiPeserta')
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
                                <label for="pemintaInput" class="col-sm-3 px-1">Peminta Input <span class="required-input">(*)</span></label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" name="pemintaInput" id="pemintaInput" aria-label=".form-select-sm pemintaInput">
                                    <option value="">-Peminta Input-</option>
                                    @foreach ($dataLembagas as $dataLembaga)
                                      <option value="{{$dataLembaga->id_user}}">{{$dataLembaga->nama_lengkap}} ({{$dataLembaga->data_lembaga}} / {{$dataLembaga->institusi}})</option>
                                    @endforeach
                                  </select>
                                  @error('pemintaInput')
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
                              <input type="text" name="inputTambah" id="" value="tambahData" hidden>
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
                  <th scope="col">Aktif/Tidak Aktif</th>
                  <th scope="col">Lokasi</th>
                  <th scope="col">Status</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($pesertas as $peserta)
                  <tr>
                    <th scope="row">{{$no++}}.</th>
                    <td>
                      <a href="#lihatData{{$peserta->id_peserta}}" data-bs-toggle="modal" class="text-info">
                        {{$peserta->nama_peserta}} <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Data"></i>
                      </a>
                    </td>
                    <td>{{$peserta->no_hp_peserta}}</td>
                    <td>{{$peserta->jk_peserta}}</td>
                    <td>{{$peserta->alamat_peserta}}</td>
                    <td>
                      <a data-bs-toggle="modal" id="lihatSkalaButton" class="text-info" data-attr="{{route('data-kontak.show', $peserta->id_peserta)}}" data-id="{{$peserta->id_peserta}}">
                        {{$peserta->skala}} <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Skala"></i>
                      </a>
                    </td>
                    <td>
                      <a data-bs-toggle="modal" id="lihatCatatanButton" class="text-info" data-attr="{{route('data-kontak.show', $peserta->id_peserta)}}" data-id="{{$peserta->id_peserta}}">
                        {{$peserta->catatan}} <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Catatan"></i>
                      </a>
                    </td>
                    <td>{{$peserta->status_peserta}}</td>
                    <td>{{$peserta->lokasi_peserta}}</td>
                    <td>
                      @if ($peserta->skala == '3')
                        <a href="#rubahStatus{{$peserta->id_peserta}}" data-bs-toggle="modal" class="text-info">
                          Peserta <i class="bi bi-arrow-left-right"></i> Ketua Kelompok
                        </a>
                      @else
                        Peserta
                      @endif
                    </td>
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
                  <div class="modal fade" id="lihatData{{$peserta->id_peserta}}" tabindex="-1" aria-labelledby="lihatData{{$peserta->id_peserta}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-scrollable">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="lihatData{{$peserta->id_peserta}}Label">
                            <i class="bi bi-info-circle text-info"></i>
                            Lihat Data Kontak
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="container">
                            <img src="{{ $peserta->foto_peserta != '' ? asset('images/Peserta/Foto/'.$peserta->foto_peserta) : asset('images/no-user.png') }}" class="img-fluid img-thumbnail rounded mx-auto d-block w-25" alt="...">
                          </div>
                          <hr>
                          <div class="content">
                            <div class="row p-2 border-bottom">
                              <div class="col-4">ID</div>
                              <div class="col-8">{{$peserta->id_peserta}}</div>
                            </div>
                            <div class="row p-2 border-bottom">
                              <div class="col-4">Nama Kontak</div>
                              <div class="col-8">{{$peserta->nama_peserta}}</div>
                            </div>
                            <div class="row p-2 border-bottom">
                              <div class="col-4">Tempat, Tanggal Lahir</div>
                              <div class="col-8">{{$peserta->tempat_lahir_peserta}}, {{$peserta->tgl_lahir_peserta}}</div>
                            </div>
                            <div class="row p-2 border-bottom">
                              <div class="col-4">Jenis Kelamin</div>
                              <div class="col-8">{{$peserta->jk_peserta}}</div>
                            </div>
                            <div class="row p-2 border-bottom">
                              <div class="col-4">No Handphone</div>
                              <div class="col-8">{{$peserta->no_hp_peserta}}</div>
                            </div>
                            <div class="row p-2 border-bottom">
                              <div class="col-4">Alamat</div>
                              <div class="col-8">{{$peserta->alamat_peserta}}</div>
                            </div>
                            <div class="row p-2 border-bottom">
                              <div class="col-4">Suku</div>
                              <div class="col-8">{{$peserta->suku_peserta}}</div>
                            </div>
                            <div class="row p-2 border-bottom">
                              <div class="col-4">Pekerjaan</div>
                              <div class="col-8">{{$peserta->pekerjaan_peserta}}</div>
                            </div>
                            <div class="row p-2 border-bottom">
                              <div class="col-4">Status</div>
                              <div class="col-8">{{$peserta->status_peserta}}</div>
                            </div>
                            <div class="row p-2">
                              <div class="col-4">Lokasi</div>
                              <div class="col-8">{{$peserta->lokasi_peserta}}</div>
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
                  <div class="modal fade" id="ubahData{{$peserta->id_peserta}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahData{{$peserta->id_peserta}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahData{{$peserta->id_peserta}}Label">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Data Kontak
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('data-kontak.update', $peserta->id_peserta) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group-input">
                              <div class="form-header-group mb-3">
                                <h6>PERSONAL</h6>
                              </div>
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editNamaKontakPeserta" class="col-sm-3 px-1">Nama Kontak <span class="required-input">(*)</span></label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editNamaKontakPeserta" required class="form-control form-control-sm" id="editNamaKontakPeserta" placeholder="cth: Angelica Gabriel" value="{{$peserta->nama_peserta}}">
                                      @error('editNamaKontakPeserta')
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
                                    <label for="editJenisKelaminPeserta" class="col-sm-3 px-1">Jenis Kelamin <span class="required-input">(*)</span></label>
                                    <div class="col-sm-9">
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editJenisKelaminPeserta" id="jenisKelaminPPeserta" value="Pria" {{($peserta->jk_peserta == 'Pria') ? 'checked' : ''}}>
                                        <label class="form-check-label" for="jenisKelaminPPeserta">Pria</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editJenisKelaminPeserta" id="jenisKelaminWPeserta" value="Wanita" {{($peserta->jk_peserta == 'Wanita') ? 'checked' : ''}}>
                                        <label class="form-check-label" for="jenisKelaminWPeserta">Wanita</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editNoHpPeserta" class="col-sm-3 px-1">Nomor HP</label>
                                    <div class="col-sm-9">
                                      <input class="form-control" type="text" name="editNoHpPeserta" placeholder="(9999)-999999999" value="{{$peserta->no_hp_peserta}}">
                                      @error('editNoHpPeserta')
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
                                    <label for="editAlamatPeserta" class="col-sm-3 px-1">Alamat</label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control" name="editAlamatPeserta" id="editAlamatPeserta" rows="3" placeholder="Alamat Peserta" value="{{$peserta->alamat_peserta}}">{{$peserta->alamat_peserta}}</textarea>
                                      @error('editAlamatPeserta')
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
                                    <label for="editTempatLahirPeserta" class="col-sm-3 px-1">Tempat, Tgl Lahir</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="editTempatLahirPeserta" class="form-control form-control-sm" id="editTempatLahirPeserta" placeholder="cth: Bandung" value="{{$peserta->tempat_lahir_peserta}}">
                                      @error('editTempatLahirPeserta')
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
                                      <input type="date" name="editTanggalLahirPeserta" class="form-control form-control-sm" id="editTanggalLahirPeserta" value="{{$peserta->tgl_lahir_peserta}}">
                                      @error('editTanggalLahirPeserta')
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
                                    <label for="editPekerjaanPeserta" class="col-sm-3 px-1">Pekerjaan</label>
                                    <div class="col-sm-9">
                                      <select class="form-select form-select-sm" name="editPekerjaanPeserta" id="editPekerjaanPeserta" aria-label=".form-select-sm editPekerjaanPeserta">
                                        <option value="{{$peserta->pekerjaan_peserta}}">{{$peserta->pekerjaan_peserta}}</option>
                                        <option value="Pegawai Negeri Sipil (PNS)">Pegawai Negeri Sipil (PNS)</option>
                                        <option value="Aparat TNI - POLRI">Aparat TNI - POLRI</option>
                                        <option value="Pegawai Swasta">Pegawai Swasta</option>
                                        <option value="Guru / Dosen">Guru / Dosen</option>
                                        <option value="Pelajar / Mahasiswa">Pelajar / Mahasiswa</option>
                                        <option value="Petani / Peternak">Petani / Peternak</option>
                                        <option value="Wiraswasta / Pengusaha">Wiraswasta / Pengusaha</option>
                                        <option value="Lain-lain">Lain-lain</option>
                                      </select>
                                      @error('editPekerjaanPeserta')
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
                                    <label for="editSukuPeserta" class="col-sm-3 px-1">Berasal Dari Suku</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editSukuPeserta" class="form-control form-control-sm" id="editSukuPeserta" placeholder="cth: Sunda" value="{{$peserta->suku_peserta}}">
                                      @error('editSukuPeserta')
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
                                    <label for="editStatusPeserta" class="col-sm-3 px-1">Status</label>
                                    <div class="col-sm-9">
                                      <div class="form-check form-switch">
                                        <input class="form-check-input" name="editStatusPeserta" type="checkbox" id="aktif" value="Aktif" {{($peserta->status_peserta == 'Aktif') ? 'checked' : ''}}>
                                        <label class="form-check-label" for="aktif">Aktif</label>
                                      </div>
                                      @error('editStatusPeserta')
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
                                    <label for="editLokasiPeserta" class="col-sm-3 px-1">Lokasi Kontak</label>
                                    <div class="col-sm-9">
                                      <select class="form-select form-select-sm" name="editLokasiPeserta" id="editLokasiPeserta" aria-label=".form-select-sm editLokasiPeserta">
                                        <option value="{{$peserta->lokasi_peserta}}">{{$peserta->lokasi_peserta}}</option>
                                        @foreach ($lokasis as $lokasi)
                                          <option value="{{$lokasi->nama_lokasi}}">{{$lokasi->nama_lokasi}}</option>
                                        @endforeach
                                      </select>
                                      @error('editLokasiPeserta')
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
                                    <label for="editInstitusiPeserta" class="col-sm-3 px-1 form-label">Naungan</label>
                                    <div class="col-sm-9">
                                      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="editInstitusiPeserta" id="editInstitusiPeserta">
                                        <option value="{{$peserta->institusi_peserta}}">{{$peserta->institusi_peserta}}</option>
                                        <option value="BPH J2 / YMP (Yayasan Ministry Parousia)">BPH J2 / YMP (Yayasan Ministry Parousia)</option>
                                        <option value="GKP (Gereja Kristen Parousia)">GKP (Gereja Kristen Parousia)</option>
                                      </select>
                                      @error('editInstitusiPeserta')
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
                                    <label for="editFotoPeserta" class="col-sm-3 px-1">Foto</label>
                                    <div class="col-sm-9">
                                      <input type="file" name="editFotoPeserta" class="form-control form-control-sm" id="editFotoPeserta">
                                      @error('editFotoPeserta')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                    </div>
                                  </div>
                                  <input type="text" name="inputTambah" id="" value="tambahData" hidden>
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
                        <form action="{{ route('data-kontak.destroy', $peserta->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                            <p>Apa anda yakin ingin menghapus Data Kontak {{$peserta->nama_peserta}} ini?</p>
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
                  <!-- Modal Lihat Skala -->
                  <div class="modal fade" id="lihatSkala" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="lihatSkalaLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="lihatSkalaLabel">
                            <i class="bi bi-graph-up text-info"></i>
                            Lihat Skala Kontak
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('data-kontak.store') }}" method="post">
                          @csrf
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-1">No.</div>
                              <div class="col-3">Tanggal Kontak</div>
                              <div class="col-2">Skala</div>
                              <div class="col-3">Status</div>
                              <div class="col-3">Keterangan</div>
                            </div>
                            <hr>
                            <div id="skalas"></div>
                            <div class="row">
                              <div class="col-1"></div>
                              <div class="col-3">
                                <input type="date" class="form-control form-control-sm" name="tambahTgl_kontak">
                                <input type="text" name="inputTambah" id="" value="inputSkala" hidden>
                                <input type="text" name="id_pesertaSkala" id="" value="{{$peserta->id_peserta}}" hidden>
                              </div>
                              <div class="col-2">
                                <select class="form-select form-select-sm" name="tambahSkalaPeserta" id="tambahSkalaPeserta" aria-label=".form-select-sm tambahSkalaPeserta">
                                  <option value="{{$peserta->skala}}">{{$peserta->skala}}</option>
                                  <option value="-3">Skala -3</option>
                                  <option value="-2">Skala -2</option>
                                  <option value="-1">Skala -1</option>
                                  <option value="0">Skala 0</option>
                                  <option value="1">Skala 1</option>
                                  <option value="2">Skala 2</option>
                                  <option value="3">Skala 3</option>
                                </select>
                              </div>
                              <div class="col-3"></div>
                              <div class="col-3">
                                <textarea class="form-control form-control-sm" name="tambahKeteranganSkalaPeserta" id="" cols="30" rows="3" placeholder="Tambah Keterangan"></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal Lihat Skala -->
                  <!-- Modal Lihat Catatan -->
                  <div class="modal fade" id="lihatCatatan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="lihatCatatanLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="lihatCatatanLabel">
                            <i class="bi bi-journal-text text-info"></i>
                            Lihat Catatan Kontak
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('data-kontak.store') }}" method="post">
                          @csrf
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-1">No.</div>
                              <div class="col-4">Tanggal Kontak</div>
                              <div class="col-7">Catatan</div>
                            </div>
                            <hr>
                            <div id="catatans"></div>
                            <div class="row">
                              <div class="col-1"></div>
                              <div class="col-4">
                                <input type="date" class="form-control form-control-sm" name="tambahTgl_kontakCatatan">
                                <input type="text" name="inputTambah" id="" value="inputCatatan" hidden>
                                <input type="text" name="id_pesertaCatatan" id="" value="{{$peserta->id_peserta}}" hidden>
                              </div>
                              <div class="col-7">
                                <textarea class="form-control form-control-sm" name="tambahCatatanPeserta" id="" cols="30" rows="3" placeholder="Tambah Catatan"></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal Lihat Catatan -->
                  
                  <!-- Modal Rubah Status -->
                  <div class="modal fade" id="rubahStatus{{$peserta->id_peserta}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="rubahStatus{{$peserta->id_peserta}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="rubahStatus{{$peserta->id_peserta}}Label">
                            <i class="bi bi-person-add text-success"></i>
                            Rubah Status
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
                                      <input class="form-control form-control-sm" name="untukPendataans" id="untukPendataan" value="Ketua Kelompok" disabled>
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
                                      <input type="text" name="idDatas" class="form-control form-control-sm" id="idData" placeholder="ID" value="{{$peserta->id_peserta}}">
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
                                      <input type="text" name="namaDatas" class="form-control form-control-sm" id="namaData" placeholder="cth: Angelica Gabriel" value="{{$peserta->nama_peserta}}">
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
                                      <input type="text" name="tempatLahirDatas" class="form-control form-control-sm" id="tempatLahirData" placeholder="cth: Bandung" value="{{$peserta->tempat_lahir_peserta}}">
                                    </div>
                                    <div class="col-sm-1">
                                      <p>/</p>
                                    </div>
                                    <div class="col-sm-3">
                                      <input type="date" name="tglLahirDatas" class="form-control form-control-sm" id="tglLahirData" value="{{$peserta->tgl_lahir_peserta}}">
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
                                      <input type="text" name="alamatDatas" class="form-control form-control-sm" id="alamatData" placeholder="Alamat" value="{{$peserta->alamat_peserta}}">
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
                                        <option value="{{$peserta->lokasi_peserta}}">{{$peserta->lokasi_peserta}}</option>
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
                                      <input type="text" name="noTelpSDatas" class="form-control form-control-sm" id="noTelpSData" placeholder="cth: +62" value="{{$peserta->no_hp_peserta}}">
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
                                          <option value="{{$peserta->pekerjaan_peserta}}">{{$peserta->pekerjaan_peserta}}</option>
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
                                    <label for="pilihanGDData" class="col-sm-3 px-1">Personality - Holland</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select" name="pilihanGDDatas[]" style="width: 100%;" id="pilihanGDData" aria-label="multiple select pilihanGDData" multiple>
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
                                    <label for="pilihanGTData" class="col-sm-3 px-1">Spiritual Gifts</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select" name="pilihanGTDatas[]" style="width: 100%;" id="pilihanGTData" aria-label="multiple select pilihanGTData" multiple>
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
                                    <label for="pilihanGEData" class="col-sm-3 px-1">Abilities</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select" name="pilihanGEDatas[]" style="width: 100%;" id="pilihanGEData" aria-label="multiple select pilihanGEData" multiple>
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
                                    <label for="ExperienceData" class="col-sm-3 px-1">Experience</label>
                                    <div class="col-sm-9 row">
                                      <div class="col-11">
                                        <select class="form-select" name="pilihanGLDatas[]" style="width: 100%;" id="ExperienceData" aria-label="multiple select ExperienceData" multiple>
                                          <option>-Experience-</option>
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
                  <!-- End Modal Rubah Status -->
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
      <!-- <hr>
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
            </table> -->
            <!-- Modal Terima Skala -->
            <!-- <div class="modal fade" id="terimaSkala" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="terimaSkalaLabel" aria-hidden="true">
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
            </div> -->
            <!-- End Modal Terima Skala -->
            <!-- Modal Tolak Skala -->
            <!-- <div class="modal fade" id="tolakSkala" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tolakSkalaLabel" aria-hidden="true">
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
            </div> -->
            <!-- End Modal Tolak Skala -->
          <!-- </div>
        </div>
      </div> -->
    </div>
  </section>
@endsection

@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/bootstrap-slider.min.js"></script>
<script>
  $(document).on('click', '#lihatSkalaButton', function(event) {
    event.preventDefault();
    var href = $(this).data('attr');
    var id = $(this).data('id');
    $.get(href, function(result) {
      no = 1;
      html = '';
      $.each(result.skala, function(index, hasil) {
        $('#lihatSkala').modal("show");
        nos = no++;
        html += '<div class="row">';
        html += '<div class="col-1">'+nos+'</div>';
        html += '<div class="col-3">'+hasil.tgl_kontak+'</div>';
        html += '<div class="col-2">'+hasil.skala+'</div>';
        html += '<div class="col-3">'+hasil.status+'</div>';
        html += '<div class="col-3">'+hasil.keterangan+'</div>';
        html += '</div>';
        html += '<hr>';
      });
      $('#skalas').empty('').append(html);
    });
  });
  $(document).on('click', '#lihatCatatanButton', function(event) {
    event.preventDefault();
    var href = $(this).data('attr');
    var id = $(this).data('id');
    $.get(href, function(result) {
      no = 1;
      html = '';
      $.each(result.catatan, function(index, hasil) {
        $('#lihatCatatan').modal("show");
        nos = no++;
        html += '<div class="row">';
        html += '<div class="col-1">'+nos+'</div>';
        html += '<div class="col-4">'+hasil.tgl_kontak+'</div>';
        html += '<div class="col-7">'+hasil.catatan+'</div>';
        html += '</div>';
        html += '<hr>';
      });
      $('#catatans').empty('').append(html);
    });
  });

  // <span class="d-block p1"></span><span class="More">...</span>
  // document.querySelectorAll('span.More').forEach(bttn=>{
  // bttn.dataset.state=0;
  // bttn.addEventListener('click',function(e){
  //   let span=this.previousElementSibling;
  //       span.dataset.tmp=span.textContent;
  //       span.textContent=span.dataset.content;
  //       span.dataset.content=span.dataset.tmp;
  //       this.innerHTML=this.dataset.state==1 ? '...' : 'Lebih Sedikit';
  //       this.dataset.state=1-this.dataset.state;
  //   });
  // });

  // document.querySelectorAll('span.p1').forEach(span=>{
  //   span.dataset.content=span.textContent;
  //   span.textContent=span.textContent.substr(0,10);
  // });
  
  $(document).ready(function(){
        var isiData = $('#untukPendataan').val(); 
        if (isiData == "Beasiswa" || isiData == "Utusan" || isiData == "Ketua Kelompok") {
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
      });
</script>
@endsection