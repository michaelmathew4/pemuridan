@extends('layout.app')

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
        <a href="{{route('data-wilayah.index')}}">
          <i class="bi bi-map"></i><span>Data Wilayah</span>
        </a>
      </li>
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
        <a href="{{route('shape.index')}}">
          <i class="bi bi-suit-heart"></i><span>SHAPE</span>
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
        <a href="{{route('kolom-pilihan-ganda.index')}}">
          <i class="bi bi-ui-checks"></i><span>Kolom Cadangan (Pilihan Ganda)</span>
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
    <a class="nav-link" href="{{route('data-ketua-lokasi.index')}}" class="active">
      <i class="bi bi-person-circle"></i>
      <span>Data Ketua Lokasi</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('data-ketua-kelompok.index')}}">
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
    <h1>Data Ketua Lokasi</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/admin')}}">Admin</a></li>
        <li class="breadcrumb-item active">Data Ketua Lokasi</li>
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
                <h5 class="card-title card-title-full">Data Ketua Lokasi</h5>
              </div>
              <div class="col-3 text-end">
                <a href="#tambahData" class="icon-add-data text-success" data-bs-toggle="modal">
                  <i class="bi bi-person-add" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Data"></i>
                </a>
              </div>
              <!-- Modal Tambah Data -->
              <div class="modal fade" id="tambahData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="tambahDataLabel">
                        <i class="bi bi-person-add text-success"></i>
                        Tambah Data Ketua Lokasi
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('data-ketua-lokasi.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                        <div class="form-group-input">
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="namaKL" class="col-sm-3 px-1 form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                  <input type="text" name="namaKL" class="form-control form-control-sm" id="namaKL" placeholder="Nama Lengkap">
                                  @error('namaKL')
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
                                <label for="jkKL" class="col-sm-3 px-1 form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jkKL" id="laki" value="Laki-laki">
                                    <label class="form-check-label" for="laki">Laki-laki</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jkKL" id="perempuan" value="Perempuan">
                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                  </div>
                                  @error('jkKL')
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
                                <label for="alamatKL" class="col-sm-3 px-1 form-label">Alamat</label>
                                <div class="col-sm-9">
                                  <textarea class="form-control form-control-sm" name="alamatKL" id="alamatKL" rows="3" placeholder="Alamat"></textarea>
                                  @error('alamatKL')
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
                                <label for="nohpKL" class="col-sm-3 px-1 form-label">No Hp</label>
                                <div class="col-sm-9">
                                  <input type="number" name="nohpKL" class="form-control form-control-sm" id="nohpKL" placeholder="08123456789">
                                  @error('nohpKL')
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
                                <label for="alamat_surelKL" class="col-sm-3 px-1 form-label">Alamat Surel</label>
                                <div class="col-sm-9">
                                  <input type="email" name="alamat_surelKL" class="form-control form-control-sm" id="alamat_surelKL" placeholder="Alamat Surel">
                                  @error('alamat_surelKL')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
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
                                <label for="kata_sandiKL" class="col-sm-3 px-1 form-label">Kata Sandi</label>
                                <div class="col-sm-9">
                                  <input type="password" name="kata_sandiKL" class="form-control form-control-sm" id="kata_sandiKL" placeholder="******">
                                  @error('kata_sandiKL')
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
                                <label for="lokasiKL" class="col-sm-3 px-1 form-label">Lokasi</label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="lokasiKL" id="lokasiKL">
                                    <option value="">-Lokasi-</option>
                                    @foreach ($lokasiWilayahs as $lokasiWilayah)
                                      <option value="{{$lokasiWilayah->nama_lokasi}}">{{$lokasiWilayah->nama_lokasi}}</option>
                                    @endforeach
                                  </select>
                                  @error('lokasiKL')
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
                                <label for="institusiKL" class="col-sm-3 px-1 form-label">Naungan</label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="institusiKL" id="institusiKL">
                                    <option value="">-Naungan-</option>
                                    <option value="BPH J2 / YMP (Yayasan Ministry Parousia)">BPH J2 / YMP (Yayasan Ministry Parousia)</option>
                                    <option value="GKP (Gereja Kristen Parousia)">GKP (Gereja Kristen Parousia)</option>
                                  </select>
                                  @error('institusiKL')
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
                                <label for="fotoKL" class="col-sm-3 px-1 form-label">Foto</label>
                                <div class="col-3">
                                  <img src="{{asset('images/no-user.png')}}" class="img-fluid" alt="" id="output" width="200">
                                </div>
                                <div class="col-6">
                                  <input type="file" name="fotoKL" class="form-control form-control-sm" id="fotoKL" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                  @error('fotoKL')
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
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                      </div>
                    </form>
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
                  <th scope="col">Nama Lengkap</th>
                  <th scope="col">Jenis Kelamin</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">No HP</th>
                  <th scope="col">Alamat Surel</th>
                  <th scope="col">Lokasi</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($lokasis as $lokasi)
                  <tr>
                    <th scope="row">{{$no++}}</th>
                    <td>
                      <a href="#lihatData{{$lokasi->id}}" data-bs-toggle="modal" class="text-info">
                        {{$lokasi->namaKL}} <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Data"></i>
                      </a>
                    </td>
                    <td>{{$lokasi->jkKL}}</td>
                    <td>{{$lokasi->alamatKL}}</td>
                    <td>{{$lokasi->nohpKL}}</td>
                    <td>{{$lokasi->alamat_surelKL}}</td>
                    <td>{{$lokasi->lokasiKL}}</td>
                    <td>
                      <div class="icon-action">
                        <a href="#ubahData{{$lokasi->id}}" data-bs-toggle="modal" class="text-primary">
                          <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                        </a>
                        |
                        <a href="#hapusData{{$lokasi->id}}" data-bs-toggle="modal" class="text-danger">
                          <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Lihat Data -->
                  <div class="modal fade" id="lihatData{{$lokasi->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="lihatData{{$lokasi->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="lihatData{{$lokasi->id}}Label">
                            <i class="bi bi-info-circle text-info"></i>
                            Lihat Data Ketua Lokasi
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-3 p-0">
                              <div class="position-relative wrapping-img-icon">
                                <img class="img-fluid img-thumbnail mx-auto d-block img-profile-detail" src="{{($lokasi->fotoKL != '') ? asset('images/Ketua Lokasi/').'/'.$lokasi->fotoKL : asset('images/no-user.png')}}" alt="">
                              </div>
                            </div>
                            <div class="col-9 mx-auto d-block" style="">
                              <div class="row mx-auto p-0 pt-1 border-bottom">
                                <div class="col-4" style="">
                                  <p class=" my-auto">Nama Lengkap</p> 
                                </div>
                                <div class="col-1" style="">
                                  <p class="text-center">:</p> 
                                </div>
                                <div class="col-4" style="">
                                  <p class="text-start">{{$lokasi->namaKL}}</p>
                                </div>
                              </div>
                              <!-- <hr class="m-0 mb-1 bg-secondary text-black-40"> -->
                              <div class="row mx-auto pt-1 border-bottom">
                                <div class="col-4 pt-2">
                                  <p class="">Jenis Kelamin</p> 
                                </div>
                                <div class="col-1 pt-2">
                                  <p class="text-center">:</p> 
                                </div>
                                <div class="col-4 pt-2">
                                <p class="text-start">{{$lokasi->jkKL}}</p>
                                </div>
                              </div>
                              <div class="row mx-auto p-0 pt-1 border-bottom">
                                <div class="col-4 pt-2">
                                  <p class="">Alamat</p> 
                                </div>
                                <div class="col-1 pt-2">
                                  <p class="text-center">:</p> 
                                </div>
                                <div class="col-4 pt-2">
                                <p class="text-start">{{$lokasi->alamatKL}}</p>
                                </div>
                              </div>
                              <div class="row mx-auto p-0 pt-1 border-bottom">
                                <div class="col-4 pt-2">
                                  <p class="">No HP</p> 
                                </div>
                                <div class="col-1 pt-2">
                                  <p class="text-center">:</p> 
                                </div>
                                <div class="col-4 pt-2">
                                <p class="text-start">{{$lokasi->nohpKL}}</p>
                                </div>
                              </div>
                              <div class="row mx-auto p-0 pt-1 border-bottom">
                                <div class="col-4 pt-2">
                                  <p class="">Alamat Surel</p> 
                                </div>
                                <div class="col-1 pt-2">
                                  <p class="text-center">:</p> 
                                </div>
                                <div class="col-4 pt-2">
                                <p class="text-start">{{$lokasi->alamat_surelKL}}</p>
                                </div>
                              </div>
                              <div class="row mx-auto p-0 pt-1 border-bottom">
                                <div class="col-4 pt-2">
                                  <p class="">Nama Pengguna</p> 
                                </div>
                                <div class="col-1 pt-2">
                                  <p class="text-center">:</p> 
                                </div>
                                <div class="col-4 pt-2">
                                <p class="text-start">{{$lokasi->nama_penggunaKL}}</p>
                                </div>
                              </div>
                              <div class="row mx-auto p-0 pt-1 border-bottom">
                                <div class="col-4 pt-2">
                                  <p class="">Kata Sandi</p> 
                                </div>
                                <div class="col-1 pt-2">
                                  <p class="text-center">:</p> 
                                </div>
                                <div class="col-4 pt-2">
                                <p class="text-start">{{$lokasi->kata_sandiKL}}</p>
                                </div>
                              </div>
                              <div class="row mx-auto p-0 pt-1 border-bottom">
                                <div class="col-4 pt-2">
                                  <p class="">Lokasi</p> 
                                </div>
                                <div class="col-1 pt-2">
                                  <p class="text-center">:</p> 
                                </div>
                                <div class="col-4 pt-2">
                                <p class="text-start">{{$lokasi->lokasiKL}}</p>
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
                  <div class="modal fade" id="ubahData{{$lokasi->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahData{{$lokasi->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahData{{$lokasi->id}}Label">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Data Ketua Lokasi
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('data-ketua-lokasi.update', $lokasi->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="form-group-input">
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editNamaKL" class="col-sm-3 px-1 form-label">Nama Lengkap</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editNamaKL" class="form-control form-control-sm" id="editNamaKL" placeholder="Nama Lengkap" value="{{$lokasi->namaKL}}">
                                      @error('editNamaKL')
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
                                    <label for="editJkKL" class="col-sm-3 px-1 form-label">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editJkKL"id="laki" value="Laki-laki" {{($lokasi->jkKL == 'Laki-laki') ? 'checked' : ''}} >
                                        <label class="form-check-label" for="laki">Laki-laki</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editJkKL" id="perempuan" value="Perempuan" {{($lokasi->jkKL == 'Perempuan') ? 'checked' : ''}}>
                                        <label class="form-check-label" for="perempuan">Perempuan</label>
                                      </div>
                                      @error('editJkKL')
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
                                    <label for="editAlamatKL" class="col-sm-3 px-1 form-label">Alamat</label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control form-control-sm" name="editAlamatKL" id="editAlamatKL" rows="3" placeholder="Alamat">{{$lokasi->alamatKL}}</textarea>
                                      @error('editAlamatKL')
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
                                    <label for="editNohpKL" class="col-sm-3 px-1 form-label">No Hp</label>
                                    <div class="col-sm-9">
                                      <input type="number" name="editNohpKL" class="form-control form-control-sm" id="editNohpKL" placeholder="08123456789" value="{{$lokasi->nohpKL}}">
                                      @error('editNohpKL')
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
                                    <label for="editAlamat_surelKL" class="col-sm-3 px-1 form-label">Alamat Surel</label>
                                    <div class="col-sm-9">
                                      <input type="email" name="editAlamat_surelKL" class="form-control form-control-sm" id="editAlamat_surelKL" placeholder="Alamat Surel" value="{{$lokasi->alamat_surelKL}}">
                                      @error('editAlamat_surelKL')
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
                                    <label for="editNama_penggunaKL" class="col-sm-3 px-1 form-label">Nama Pengguna</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editNama_penggunaKL" class="form-control form-control-sm" id="editNama_penggunaKL" placeholder="Nama Pengguna" value="{{$lokasi->nama_penggunaKL}}">
                                      @error('editNama_penggunaKL')
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
                                    <label for="editKata_sandiKL" class="col-sm-3 px-1 form-label">Kata Sandi</label>
                                    <div class="col-sm-9">
                                      <input type="password" name="editKata_sandiKL" class="form-control form-control-sm" id="editKata_sandiKL" placeholder="******" value="{{$lokasi->kata_sandiKL}}">
                                      @error('editKata_sandiKL')
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
                                    <label for="editLokasiKL" class="col-sm-3 px-1 form-label">Lokasi</label>
                                    <div class="col-sm-9">
                                      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="editLokasiKL" id="editLokasiKL">
                                        <option value="{{$lokasi->lokasiKL}}">{{$lokasi->lokasiKL}}</option>
                                          @foreach ($lokasiWilayahs as $lokasiWilayah)
                                            <option value="{{$lokasiWilayah->kode_lokasi}}">{{$lokasiWilayah->nama_lokasi}}</option>
                                          @endforeach
                                      </select>
                                      @error('editLokasiKL')
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
                                    <label for="editFotoKL" class="col-sm-3 px-1 form-label">Foto</label>
                                    <div class="col-3">
                                      <div class="position-relative wrapping-img-icon">
                                        <div class="">
                                          @if ($lokasi->fotoKL != '')
                                            <button type="button" class="btn btn-danger position-absolute end-0" onchange="" onclick="document.getElementById('outputEdit{{$lokasi->id}}').src = document.getElementById('noImage{{$lokasi->id}}').src;
                                              document.getElementById('editFotoTextKL{{$lokasi->id}}').value = '';" data-user="{{$lokasi->id}}" id="buttonChange" data-bs-toggle="tooltip" data-bs-html="true" title="Hapus Gambar">
                                              <i class="bi bi-trash"></i>
                                            </button>
                                          @endif
                                        </div>
                                        <img src="{{asset('images/no-user.png')}}" width="100" alt="" id="noImage{{$lokasi->id}}" class="d-none">
                                        <img src="{{($lokasi->fotoKL != '') ? asset('images/Ketua Lokasi/').'/'.$lokasi->fotoKL : asset('images/no-user.png')}} " class="img-fluid" alt="" id="outputEdit{{$lokasi->id}}" width="200">
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <input type="file" name="editFotoKL" class="form-control form-control-sm" id="editFotoKL" onchange="document.getElementById('outputEdit{{$lokasi->id}}').src = window.URL.createObjectURL(this.files[0])">
                                      <input type="text" name="editFotoTextKL" id="editFotoTextKL{{$lokasi->id}}" value="{{$lokasi->fotoKL}}" hidden>
                                      @error('editFotoKL')
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
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal Ubah Data -->
                  <!-- Modal Hapus Data -->
                  <div class="modal fade" id="hapusData{{$lokasi->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusData{{$lokasi->id}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusData{{$lokasi->id}}Label">
                            <i class="bi bi-trash text-danger"></i>
                            Hapus Data Ketua Lokasi
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('data-ketua-lokasi.destroy', $lokasi->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                            <p>Apa anda yakin ingin menghapus Ketua Lokasi {{$lokasi->namaKL}} ini?</p>
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