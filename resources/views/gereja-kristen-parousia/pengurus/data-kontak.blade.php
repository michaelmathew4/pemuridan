@extends('layout.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css" />
@endsection

@section('nav')
@endsection

@section('menu')
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('berandaPengurusGKP')}}">
      <i class="bi bi-house"></i>
      <span>Beranda</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('ketua-lokasi.indexPengurusGKP')}}">
      <i class="bi bi-person-circle"></i>
      <span>Data Ketua Lokasi</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('data-lembaga.indexPengurusGKP')}}">
      <i class="bi bi-person-square"></i>
      <span>Data Lembaga</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('data-kontak.indexPengurusGKP')}}">
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
    <h1>Data Kontak</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('berandaPengurusGKP')}}">Pengurus</a></li>
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
                    <form action="{{ route('data-kontak.storePengurusGKP') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group-input">
                        <div class="form-header-group mb-3">
                          <h6>PERSONAL</h6>
                        </div>
                        <div class="input-center ps-5">
                          <div class="w-75">
                            <input type="text" name="inputMethod" value="tambahDataBaru" hidden>
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
                                  <option value="PM (Parousia Ministry)">PM (Parousia Ministry)</option>
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
                      <a data-bs-toggle="modal" id="lihatSkalaButton" class="text-info" data-attr="{{route('data-kontak.showPengurusGKP', $peserta->id_peserta)}}" data-id="{{$peserta->id_peserta}}">
                        {{$peserta->skala}} <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Skala"></i>
                      </a>
                    </td>
                    <td>
                      <a data-bs-toggle="modal" id="lihatCatatanButton" class="text-info" data-attr="{{route('data-kontak.showPengurusGKP', $peserta->id_peserta)}}" data-id="{{$peserta->id_peserta}}">
                        {{$peserta->catatan}} <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Catatan"></i>
                      </a>
                    </td>
                    <td>{{$peserta->status_peserta}}</td>
                    <td>{{$peserta->lokasi_peserta}}</td>
                    <td>
                      @if ($peserta->skala == '3')
                        @if ($peserta->id_peserta == $peserta->id_user)
                          Ketua Kelompok
                        @else
                          <a href="#rubahStatus{{$peserta->id_peserta}}" data-bs-toggle="modal" class="text-info" id="ubahStatus" data-user="{{$peserta->id_peserta}}">
                            Peserta <i class="bi bi-arrow-right"></i> Ketua Kelompok
                          </a>
                        @endif
                      @else
                        Peserta
                      @endif
                    </td>
                    <td>
                      <div class="icon-action">
                        @if ($peserta->id_peserta == $peserta->id_user)
                          <a href="#ubahData{{$peserta->id_peserta}}" data-bs-toggle="modal" class="link-secondary pe-none" tabindex="-1" aria-disabled="true" disabled>
                            <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                          </a>
                        @else
                          <a href="#ubahData{{$peserta->id_peserta}}" data-bs-toggle="modal" class="text-primary">
                            <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                          </a>
                        @endif
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
                            <img src="{{ $peserta->foto_peserta != '' ? asset('images/Peserta/'.$peserta->foto_peserta) : asset('images/no-user.png') }}" class="img-fluid img-thumbnail rounded mx-auto d-block w-25" alt="...">
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
                          <form action="{{ route('data-kontak.updatePengurusGKP', $peserta->id_peserta) }}" method="post" enctype="multipart/form-data">
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
                                    <label for="editInstitusiPeserta" class="col-sm-3 px-1 form-label">Lembaga <span class="required-input">(*)</span></label>
                                    <div class="col-sm-9">
                                      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="editInstitusiPeserta" id="editInstitusiPeserta">
                                        <option value="{{$peserta->institusi}}">{{$peserta->institusi}}</option>
                                        <option value="PM (Parousia Ministry)">PM (Parousia Ministry)</option>
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
                                    <label for="editPemintaInput" class="col-sm-3 px-1">Peminta Input <span class="required-input">(*)</span></label>
                                    <div class="col-sm-9">
                                      <select class="form-select form-select-sm" name="editPemintaInput" id="editPemintaInput" aria-label=".form-select-sm editPemintaInput">
                                        <option value="{{$peserta->peminta}}">{{$peserta->nama_lengkap}}</option>
                                        @foreach ($dataLembagas as $dataLembaga)
                                          <option value="{{$dataLembaga->id_user}}">{{$dataLembaga->nama_lengkap}} ({{$dataLembaga->data_lembaga}} / {{$dataLembaga->institusi}})</option>
                                        @endforeach
                                      </select>
                                      @error('editPemintaInput')
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
                                  <input type="text" name="inputTambah" id="" value="ubahData" hidden>
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
                        <form action="{{ route('data-kontak.destroyPengurusGKP', $peserta->id) }}" method="POST">
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
                        <form action="{{ route('data-kontak.storePengurusGKP') }}" method="post">
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
                        <form action="{{ route('data-kontak.storePengurusGKP') }}" method="post">
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
</script>
@endsection