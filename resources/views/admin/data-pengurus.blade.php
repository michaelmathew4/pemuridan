@extends('layout.app')

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
    <a class="nav-link" href="{{url('/admin/data-pengurus')}}">
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
    <h1>Data Pengurus</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/admin')}}">Admin</a></li>
        <li class="breadcrumb-item active">Data Pengurus</li>
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
                <h5 class="card-title card-title-full">Data Pengurus</h5>
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
                        Tambah Data Pengurus
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('data-pengurus.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                        <div class="form-group-input">
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="namaPRS" class="col-sm-3 px-1 form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                  <input type="text" name="namaPRS" class="form-control form-control-sm" id="namaPRS" placeholder="Nama Lengkap">
                                  @error('namaPRS')
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
                                <label for="jkPRS" class="col-sm-3 px-1 form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jkPRS" id="laki" value="Laki-laki">
                                    <label class="form-check-label" for="laki">Laki-laki</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jkPRS" id="perempuan" value="Perempuan">
                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                  </div>
                                  @error('jkPRS')
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
                                <label for="alamatPRS" class="col-sm-3 px-1 form-label">Alamat</label>
                                <div class="col-sm-9">
                                  <textarea class="form-control form-control-sm" name="alamatPRS" id="alamatPRS" rows="3" placeholder="Alamat"></textarea>
                                  @error('alamatPRS')
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
                                <label for="nohpPRS" class="col-sm-3 px-1 form-label">No Hp</label>
                                <div class="col-sm-9">
                                  <input type="number" name="nohpPRS" class="form-control form-control-sm" id="nohpPRS" placeholder="08123456789">
                                  @error('nohpPRS')
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
                                <label for="alamat_surelPRS" class="col-sm-3 px-1 form-label">Alamat Surel</label>
                                <div class="col-sm-9">
                                  <input type="email" name="alamat_surelPRS" class="form-control form-control-sm" id="alamat_surelPRS" placeholder="Alamat Surel">
                                  @error('alamat_surelPRS')
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
                                <label for="kata_sandiPRS" class="col-sm-3 px-1 form-label">Kata Sandi</label>
                                <div class="col-sm-9">
                                  <input type="password" name="kata_sandiPRS" class="form-control form-control-sm" id="kata_sandiPRS" placeholder="******">
                                  @error('kata_sandiPRS')
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
                                <label for="kepengurusanPRS" class="col-sm-3 px-1 form-label">Kepengurusan</label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="kepengurusanPRS" id="kepengurusanPRS">
                                    <option value="">-Kepengurusan-</option>
                                    <option value="BPH J2 / YMP (Yayasan Ministry Parousia)">BPH J2 / YMP (Yayasan Ministry Parousia)</option>
                                    <option value="GKP (Gereja Kristen Parousia)">GKP (Gereja Kristen Parousia)</option>
                                  </select>
                                  @error('kepengurusanPRS')
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
                                <label for="fotoPRS" class="col-sm-3 px-1 form-label">Foto</label>
                                <div class="col-3">
                                  <img src="{{asset('images/no-user.png')}}" class="img-fluid" alt="" id="output" width="200">
                                </div>
                                <div class="col-6">
                                  <input type="file" name="fotoPRS" class="form-control form-control-sm" id="fotoPRS" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                  @error('fotoPRS')
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
                  <th scope="col">Kepengurusan</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($penguruses as $pengurus)
                  <tr>
                    <th scope="row">{{$no++}}</th>
                    <td>
                      <a href="#lihatData{{$pengurus->id}}" data-bs-toggle="modal" class="text-info">
                        {{$pengurus->namaPRS}} <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Data"></i>
                      </a>
                    </td>
                    <td>{{$pengurus->jkPRS}}</td>
                    <td>{{$pengurus->alamatPRS}}</td>
                    <td>{{$pengurus->nohpPRS}}</td>
                    <td>{{$pengurus->alamat_surelPRS}}</td>
                    <td>{{$pengurus->institusiPRS}}</td>
                    <td>
                      <div class="icon-action">
                        <a href="#ubahData{{$pengurus->id}}" data-bs-toggle="modal" class="text-primary">
                          <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                        </a>
                        |
                        <a href="#hapusData{{$pengurus->id}}" data-bs-toggle="modal" class="text-danger">
                          <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Lihat Data -->
                  <div class="modal fade" id="lihatData{{$pengurus->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="lihatData{{$pengurus->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="lihatData{{$pengurus->id}}Label">
                            <i class="bi bi-info-circle text-info"></i>
                            Lihat Data Pengurus
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-3 p-0">
                              <div class="position-relative wrapping-img-icon">
                                <img class="img-fluid img-thumbnail mx-auto d-block img-profile-detail" src="{{($pengurus->fotoPRS != '') ? asset('images/Pengurus/').'/'.$pengurus->fotoPRS : asset('images/no-user.png')}}" alt="">
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
                                  <p class="text-start">{{$pengurus->namaPRS}}</p>
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
                                <p class="text-start">{{$pengurus->jkPRS}}</p>
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
                                <p class="text-start">{{$pengurus->alamatPRS}}</p>
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
                                <p class="text-start">{{$pengurus->nohpPRS}}</p>
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
                                <p class="text-start">{{$pengurus->alamat_surelPRS}}</p>
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
                                <p class="text-start">{{$pengurus->kata_sandiPRS}}</p>
                                </div>
                              </div>
                              <div class="row mx-auto p-0 pt-1 border-bottom">
                                <div class="col-4 pt-2">
                                  <p class="">Kepengurusan</p> 
                                </div>
                                <div class="col-1 pt-2">
                                  <p class="text-center">:</p> 
                                </div>
                                <div class="col-4 pt-2">
                                <p class="text-start">{{$pengurus->institusiPRS}}</p>
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
                  <div class="modal fade" id="ubahData{{$pengurus->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahData{{$pengurus->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahData{{$pengurus->id}}Label">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Data Pengurus
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('data-pengurus.update', $pengurus->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="form-group-input">
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editNamaPRS" class="col-sm-3 px-1 form-label">Nama Lengkap</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editNamaPRS" class="form-control form-control-sm" id="editNamaPRS" placeholder="Nama Lengkap" value="{{$pengurus->namaPRS}}">
                                      @error('editNamaPRS')
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
                                    <label for="editJkPRS" class="col-sm-3 px-1 form-label">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editJkPRS"id="laki" value="Laki-laki" {{($pengurus->jkPRS == 'Laki-laki') ? 'checked' : ''}} >
                                        <label class="form-check-label" for="laki">Laki-laki</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editJkPRS" id="perempuan" value="Perempuan" {{($pengurus->jkPRS == 'Perempuan') ? 'checked' : ''}}>
                                        <label class="form-check-label" for="perempuan">Perempuan</label>
                                      </div>
                                      @error('editJkPRS')
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
                                    <label for="editAlamatPRS" class="col-sm-3 px-1 form-label">Alamat</label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control form-control-sm" name="editAlamatPRS" id="editAlamatPRS" rows="3" placeholder="Alamat">{{$pengurus->alamatPRS}}</textarea>
                                      @error('editAlamatPRS')
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
                                    <label for="editNohpPRS" class="col-sm-3 px-1 form-label">No Hp</label>
                                    <div class="col-sm-9">
                                      <input type="number" name="editNohpPRS" class="form-control form-control-sm" id="editNohpPRS" placeholder="08123456789" value="{{$pengurus->nohpPRS}}">
                                      @error('editNohpPRS')
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
                                    <label for="editAlamat_surelPRS" class="col-sm-3 px-1 form-label">Alamat Surel</label>
                                    <div class="col-sm-9">
                                      <input type="email" name="editAlamat_surelPRS" class="form-control form-control-sm" id="editAlamat_surelPRS" placeholder="Alamat Surel" value="{{$pengurus->alamat_surelPRS}}">
                                      @error('editAlamat_surelPRS')
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
                                    <label for="editKata_sandiPRS" class="col-sm-3 px-1 form-label">Kata Sandi</label>
                                    <div class="col-sm-9">
                                      <input type="password" name="editKata_sandiPRS" class="form-control form-control-sm" id="editKata_sandiPRS" placeholder="******" value="{{$pengurus->kata_sandiPRS}}">
                                      @error('editKata_sandiPRS')
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
                                    <label for="editKepengurusanPRS" class="col-sm-3 px-1 form-label">Kepengurusan</label>
                                    <div class="col-sm-9">
                                      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="editKepengurusanPRS" id="editKepengurusanPRS">
                                        <option value="{{$pengurus->kepengurusanPRS}}">{{$pengurus->kepengurusanPRS}}</option>
                                        <option value="BPH J2 / YMP (Yayasan Ministry Parousia)">BPH J2 / YMP (Yayasan Ministry Parousia)</option>
                                        <option value="GKP (Gereja Kristen Parousia)">GKP (Gereja Kristen Parousia)</option>
                                      </select>
                                      @error('editKepengurusanPRS')
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
                                    <label for="editFotoPRS" class="col-sm-3 px-1 form-label">Foto</label>
                                    <div class="col-3">
                                      <div class="position-relative wrapping-img-icon">
                                        <div class="">
                                          @if ($pengurus->fotoPRS != '')
                                            <button type="button" class="btn btn-danger position-absolute end-0" onchange="" onclick="document.getElementById('outputEdit{{$pengurus->id}}').src = document.getElementById('noImage{{$pengurus->id}}').src;
                                              document.getElementById('editFotoTextPRS{{$pengurus->id}}').value = '';" data-user="{{$pengurus->id}}" id="buttonChange" data-bs-toggle="tooltip" data-bs-html="true" title="Hapus Gambar">
                                              <i class="bi bi-trash"></i>
                                            </button>
                                          @endif
                                        </div>
                                        <img src="{{asset('images/no-user.png')}}" width="100" alt="" id="noImage{{$pengurus->id}}" class="d-none">
                                        <img src="{{($pengurus->fotoPRS != '') ? asset('images/Pengurus/').'/'.$pengurus->fotoPRS : asset('images/no-user.png')}} " class="img-fluid" alt="" id="outputEdit{{$pengurus->id}}" width="200">
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <input type="file" name="editFotoPRS" class="form-control form-control-sm" id="editFotoPRS" onchange="document.getElementById('outputEdit{{$pengurus->id}}').src = window.URL.createObjectURL(this.files[0])">
                                      <input type="text" name="editFotoTextPRS" id="editFotoTextPRS{{$pengurus->id}}" value="{{$pengurus->fotoPRS}}" hidden>
                                      @error('editFotoPRS')
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
                  <div class="modal fade" id="hapusData{{$pengurus->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusData{{$pengurus->id}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusData{{$pengurus->id}}Label">
                            <i class="bi bi-trash text-danger"></i>
                            Hapus Data Pengurus
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('data-pengurus.destroy', $pengurus->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                            <p>Apa anda yakin ingin menghapus Pengurus {{$pengurus->namaPRS}} ini?</p>
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