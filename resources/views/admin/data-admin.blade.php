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
    <a class="nav-link" href="{{url('/admin/data-admin')}}">
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
    <h1>Data Admin</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/admin')}}">Admin</a></li>
        <li class="breadcrumb-item active">Data Admin</li>
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
                <h5 class="card-title card-title-full">Data Admin</h5>
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
                        Tambah Data Admin
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('data-admin.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                        <div class="form-group-input">
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="namaADM" class="col-sm-3 px-1 form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                  <input type="text" name="namaADM" class="form-control form-control-sm" id="namaADM" placeholder="Nama Lengkap">
                                  @error('namaADM')
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
                                <label for="jkADM" class="col-sm-3 px-1 form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jkADM" id="laki" value="Laki-laki">
                                    <label class="form-check-label" for="laki">Laki-laki</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jkADM" id="perempuan" value="Perempuan">
                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                  </div>
                                  @error('jkADM')
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
                                <label for="alamatADM" class="col-sm-3 px-1 form-label">Alamat</label>
                                <div class="col-sm-9">
                                  <textarea class="form-control form-control-sm" name="alamatADM" id="alamatADM" rows="3" placeholder="Alamat"></textarea>
                                  @error('alamatADM')
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
                                <label for="nohpADM" class="col-sm-3 px-1 form-label">No Hp</label>
                                <div class="col-sm-9">
                                  <input type="number" name="nohpADM" class="form-control form-control-sm" id="nohpADM" placeholder="08123456789">
                                  @error('nohpADM')
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
                                <label for="alamat_surelADM" class="col-sm-3 px-1 form-label">Alamat Surel</label>
                                <div class="col-sm-9">
                                  <input type="email" name="alamat_surelADM" class="form-control form-control-sm" id="alamat_surelADM" placeholder="Alamat Surel">
                                  @error('alamat_surelADM')
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
                                <label for="kata_sandiADM" class="col-sm-3 px-1 form-label">Kata Sandi</label>
                                <div class="col-sm-9">
                                  <input type="password" name="kata_sandiADM" class="form-control form-control-sm" id="kata_sandiADM" placeholder="******">
                                  @error('kata_sandiADM')
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
                                <label for="tingkatADM" class="col-sm-3 px-1 form-label">Tingkat</label>
                                <div class="col-sm-9">
                                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="tingkatADM" id="tingkatADM">
                                    <option>Tingkatan Admin</option>
                                    <option value="Admin Tingkat 1">Admin Tingkat 1</option>
                                    <option value="Admin Tingkat 2">Admin Tingkat 2</option>
                                  </select>
                                  @error('tingkatADM')
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
                                <label for="fotoADM" class="col-sm-3 px-1 form-label">Foto</label>
                                <div class="col-3">
                                  <img src="{{asset('images/no-user.png')}}" class="img-fluid" alt="" id="output" width="200">
                                </div>
                                <div class="col-6">
                                  <input type="file" name="fotoADM" class="form-control form-control-sm" id="fotoADM" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                  @error('fotoADM')
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
                  <th scope="col">Tingkat</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($dataAdmins as $dataAdmin)
                  <tr>
                    <th scope="row">{{$no++}}</th>
                    <td>
                      <a href="#lihatData{{$dataAdmin->id}}" data-bs-toggle="modal" class="text-info">
                        {{$dataAdmin->namaADM}} <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Data"></i>
                      </a>
                    </td>
                    <td>{{$dataAdmin->jkADM}}</td>
                    <td>{{$dataAdmin->alamatADM}}</td>
                    <td>{{$dataAdmin->nohpADM}}</td>
                    <td>{{$dataAdmin->alamat_surelADM}}</td>
                    <td>{{$dataAdmin->tingkatADM}}</td>
                    <td>
                      <div class="icon-action">
                        <a href="#ubahData{{$dataAdmin->id}}" data-bs-toggle="modal" class="text-primary">
                          <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                        </a>
                        |
                        <a href="#hapusData{{$dataAdmin->id}}" data-bs-toggle="modal" class="text-danger">
                          <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Lihat Data -->
                  <div class="modal fade" id="lihatData{{$dataAdmin->id}}"tabindex="-1" aria-labelledby="lihatData{{$dataAdmin->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="lihatData{{$dataAdmin->id}}Label">
                            <i class="bi bi-info-circle text-info"></i>
                            Lihat Admin
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-3 p-0">
                              <div class="position-relative wrapping-img-icon">
                                <!-- <div class="display-hover text-dark">
                                  <a href="" class="position-absolute end-0 p-1 text-danger"><i class="bi bi-trash"></i> </a>
                                  @if ($dataAdmin->fotoADM != '')
                                    <a href="" class="position-absolute start-0 p-1 text-primary" onchange="" onclick="document.getElementById('outputEdit{{$dataAdmin->id}}').src = document.getElementById('noImage{{$dataAdmin->id}}').src;
                                      document.getElementById('editFotoTextADM{{$dataAdmin->id}}').value = '';" data-user="{{$dataAdmin->id}}" id="buttonChange"><i class="bi bi-pencil"></i> </a>
                                  @endif
                                </div> -->
                                <img class="img-fluid img-thumbnail mx-auto d-block img-profile-detail" src="{{($dataAdmin->fotoADM != '') ? asset('images/Admin/').'/'.$dataAdmin->fotoADM : asset('images/no-user.png')}}" alt="">
                                
                              </div>
                                <!-- <button type="button" class="btn btn-danger mt-1 btn-sm w-100" 
                                  onchange="" onclick="document.getElementById('outputEdit{{$dataAdmin->id}}').src = document.getElementById('noImage{{$dataAdmin->id}}').src;
                                  document.getElementById('editFotoTextADM{{$dataAdmin->id}}').value = '';" data-user="{{$dataAdmin->id}}" id="buttonChange">
                                  <i class="bi bi-trash"></i> Hapus
                                </button> -->
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
                                  <p class="text-start">{{$dataAdmin->namaADM}}</p>
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
                                <p class="text-start">{{$dataAdmin->jkADM}}</p>
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
                                <p class="text-start">{{$dataAdmin->alamatADM}}</p>
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
                                <p class="text-start">{{$dataAdmin->nohpADM}}</p>
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
                                <p class="text-start">{{$dataAdmin->alamat_surelADM}}</p>
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
                                <p class="text-start">{{$dataAdmin->kata_sandiADM}}</p>
                                </div>
                              </div>
                              <div class="row mx-auto p-0 pt-1 border-bottom">
                                <div class="col-4 pt-2">
                                  <p class="">Tingkat</p> 
                                </div>
                                <div class="col-1 pt-2">
                                  <p class="text-center">:</p> 
                                </div>
                                <div class="col-4 pt-2">
                                <p class="text-start">{{$dataAdmin->tingkatADM}}</p>
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
                  <div class="modal fade" id="ubahData{{$dataAdmin->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahData{{$dataAdmin->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahData{{$dataAdmin->id}}Label">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Data Admin
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('data-admin.update', $dataAdmin->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="form-group-input">
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editNamaADM" class="col-sm-3 px-1 form-label">Nama Lengkap</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editNamaADM" class="form-control form-control-sm" id="editNamaADM" placeholder="Nama Lengkap" value="{{$dataAdmin->namaADM}}">
                                      @error('editNamaADM')
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
                                    <label for="editJkADM" class="col-sm-3 px-1 form-label">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editJkADM"id="laki" value="Laki-laki" {{($dataAdmin->jkADM == 'Laki-laki') ? 'checked' : ''}} >
                                        <label class="form-check-label" for="laki">Laki-laki</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="editJkADM" id="perempuan" value="Perempuan" {{($dataAdmin->jkADM == 'Perempuan') ? 'checked' : ''}}>
                                        <label class="form-check-label" for="perempuan">Perempuan</label>
                                      </div>
                                      @error('editJkADM')
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
                                    <label for="editAlamatADM" class="col-sm-3 px-1 form-label">Alamat</label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control form-control-sm" name="editAlamatADM" id="editAlamatADM" rows="3" placeholder="Alamat">{{$dataAdmin->alamatADM}}</textarea>
                                      @error('editAlamatADM')
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
                                    <label for="editNohpADM" class="col-sm-3 px-1 form-label">No Hp</label>
                                    <div class="col-sm-9">
                                      <input type="number" name="editNohpADM" class="form-control form-control-sm" id="editNohpADM" placeholder="08123456789" value="{{$dataAdmin->nohpADM}}">
                                      @error('editNohpADM')
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
                                    <label for="editAlamat_surelADM" class="col-sm-3 px-1 form-label">Alamat Surel</label>
                                    <div class="col-sm-9">
                                      <input type="email" name="editAlamat_surelADM" class="form-control form-control-sm" id="editAlamat_surelADM" placeholder="Alamat Surel" value="{{$dataAdmin->alamat_surelADM}}">
                                      @error('editAlamat_surelADM')
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
                                    <label for="editKata_sandiADM" class="col-sm-3 px-1 form-label">Kata Sandi</label>
                                    <div class="col-sm-9">
                                      <input type="password" name="editKata_sandiADM" class="form-control form-control-sm" id="editKata_sandiADM" placeholder="******" value="{{$dataAdmin->kata_sandiADM}}">
                                      @error('editKata_sandiADM')
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
                                    <label for="editTingkatADM" class="col-sm-3 px-1 form-label">Tingkat</label>
                                    <div class="col-sm-9">
                                      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="editTingkatADM" id="editTingkatADM">
                                        <option value="{{$dataAdmin->tingkatADM}}">{{$dataAdmin->tingkatADM}}</option>
                                        <option value="Admin Tingkat 1">Admin Tingkat 1</option>
                                        <option value="Admin Tingkat 2">Admin Tingkat 2</option>
                                      </select>
                                      @error('editTingkatADM')
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
                                    <label for="editFotoADM" class="col-sm-3 px-1 form-label">Foto</label>
                                    <div class="col-3">
                                      <div class="position-relative wrapping-img-icon">
                                        <div class="">
                                          @if ($dataAdmin->fotoADM != '')
                                            <button type="button" class="btn btn-danger position-absolute end-0" onchange="" onclick="document.getElementById('outputEdit{{$dataAdmin->id}}').src = document.getElementById('noImage{{$dataAdmin->id}}').src;
                                              document.getElementById('editFotoTextADM{{$dataAdmin->id}}').value = '';" data-user="{{$dataAdmin->id}}" id="buttonChange" data-bs-toggle="tooltip" data-bs-html="true" title="Hapus Gambar">
                                              <i class="bi bi-trash"></i>
                                            </button>
                                          @endif
                                        </div>
                                        <img src="{{asset('images/no-user.png')}}" width="100" alt="" id="noImage{{$dataAdmin->id}}" class="d-none">
                                        <img src="{{($dataAdmin->fotoADM != '') ? asset('images/Admin/').'/'.$dataAdmin->fotoADM : asset('images/no-user.png')}} " class="img-fluid" alt="" id="outputEdit{{$dataAdmin->id}}" width="200">
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <input type="file" name="editFotoADM" class="form-control form-control-sm" id="editFotoADM" onchange="document.getElementById('outputEdit{{$dataAdmin->id}}').src = window.URL.createObjectURL(this.files[0])">
                                      <input type="text" name="editFotoTextADM" id="editFotoTextADM{{$dataAdmin->id}}" value="{{$dataAdmin->fotoADM}}" hidden>
                                      @error('editFotoADM')
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
                  <div class="modal fade" id="hapusData{{$dataAdmin->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusData{{$dataAdmin->id}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusData{{$dataAdmin->id}}Label">
                            <i class="bi bi-trash text-danger"></i>
                            Hapus Data Admin
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('data-admin.destroy', $dataAdmin->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                            <p>Apa anda yakin ingin menghapus Admin {{$dataAdmin->namaADM}} ini?</p>
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

@section('javascript')
@endsection