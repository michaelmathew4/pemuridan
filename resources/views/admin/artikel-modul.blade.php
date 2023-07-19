@extends('layout.app')

@section('css')
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
    <a class="nav-link" data-bs-target="#data-master" data-bs-toggle="collapse" href="#">
      <i class="bi bi-list"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="data-master" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
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
        <a href="{{route('artikel-modul.index')}}" class="active">
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
    <h1>Artikel Modul</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/admin')}}">Admin</a></li>
        <li class="breadcrumb-item active">Artikel Modul</li>
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
                <h5 class="card-title card-title-full">Artikel Modul</h5>
              </div>
              <div class="col-3 text-end">
                <a href="#tambahDataAM" class="icon-add-data text-success" data-bs-toggle="modal">
                  <i class="bi bi-plus-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Data"></i>
                </a>
              </div>
              <!-- Modal Tambah Data -->
              <div class="modal fade" id="tambahDataAM" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahDataAMLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="tambahDataAMLabel">
                        <i class="bi bi-plus-circle text-success"></i>
                        Tambah Artikel Modul
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('artikel-modul.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                        <div class="form-group-input">
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="judulAM" class="col-sm-3 px-1 form-label">Judul</label>
                                <div class="col-sm-9">
                                  <input type="text" name="judulAM" class="form-control form-control-sm" id="judulAM" placeholder="Judul">
                                  @error('judulAM')
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
                                <label for="deskripsiAM" class="col-sm-3 px-1 form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                  <textarea class="form-control form-control-sm" name="deskripsiAM" id="deskripsiAM" rows="3" placeholder="Deskripsi"></textarea>
                                  @error('deskripsiAM')
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
                                <label for="gambarAM" class="col-sm-3 px-1 form-label">Gambar</label>
                                <div class="col-3">
                                  <img src="{{asset('images/no-image.png')}}" class="img-fluid" alt="" id="output" width="200">
                                </div>
                                <div class="col-6">
                                  <input type="file" name="gambarAM" class="form-control form-control-sm" id="gambarAM" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                  @error('gambarAM')
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
                  <th scope="col">Judul</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Tanggal Input</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($artikelModuls as $artikelModul)
                <tr>
                  <th scope="row">{{$no++}}</th>
                  <td>
                    <a href="#lihatData{{$artikelModul->id}}" data-bs-toggle="modal" class="text-info">
                      {{$artikelModul->judulAM}} <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Data"></i>
                    </a>
                  </td>
                  <td>{{$artikelModul->deskripsiAM}}</td>
                  <td>{{$artikelModul->created_at->isoFormat('D-MM-Y, H:m:s')}}</td>
                  <td>
                    <div class="icon-action">
                      <a href="#ubahData{{$artikelModul->id}}" data-bs-toggle="modal" class="text-primary">
                        <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                      </a>
                      |
                      <a href="#hapusData{{$artikelModul->id}}" data-bs-toggle="modal" class="text-danger">
                        <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                      </a>
                    </div>
                  </td>
                </tr>
                <!-- Modal Lihat Data -->
                <div class="modal fade" id="lihatData{{$artikelModul->id}}"tabindex="-1" aria-labelledby="lihatData{{$artikelModul->id}}Label" aria-hidden="true">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="lihatData{{$artikelModul->id}}Label">
                          <i class="bi bi-info-circle text-info"></i>
                          Lihat Artikel Modul
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div>
                          <img class="img-fluid img-thumbnail mx-auto d-block" width="200" src="{{ asset('images/Artikel Modul/') }}/{{ $artikelModul->gambarAM }}">
                          <hr>
                          <div class="mx-auto d-block" style="">
                            <div class="row mx-auto">
                              <div class="col-4" style="">
                                <p class="">Judul</p> 
                              </div>
                              <div class="col-1" style="">
                                <p class="text-center">:</p> 
                              </div>
                              <div class="col-4" style="">
                                <p class="text-start">{{$artikelModul->judulAM}}</p>
                              </div>
                            </div>
                            <div class="row mx-auto">
                              <div class="col-4">
                                <p class="">Deskripsi</p> 
                              </div>
                              <div class="col-1">
                                <p class="text-center">:</p> 
                              </div>
                              <div class="col-4">
                              <p class="text-start">{{$artikelModul->deskripsiAM}}</p>
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
                <div class="modal fade" id="ubahData{{$artikelModul->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahData{{$artikelModul->id}}Label" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="ubahData{{$artikelModul->id}}Label">
                          <i class="bi bi-pencil-square text-primary"></i>
                          Ubah Artikel Modul
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="{{ route('artikel-modul.update', $artikelModul->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                          <div class="form-group-input">
                            <div class="input-center ps-5">
                              <div class="w-75">
                                <div class="mb-3 row">
                                  <label for="editJudulAM" class="col-sm-3 px-1 form-label">Judul</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="editJudulAM" class="form-control form-control-sm" id="editJudulAM" value="{{$artikelModul->judulAM}}">
                                    @error('editjudulAM')
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
                                  <label for="editDeskripsiAM" class="col-sm-3 px-1 form-label">Deskripsi</label>
                                  <div class="col-sm-9">
                                    <textarea class="form-control form-control-sm" name="editDeskripsiAM" id="editDeskripsiAM" rows="3">{{$artikelModul->deskripsiAM}}</textarea>
                                    @error('editDeskripsiAM')
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
                                  <label for="editGambarAM" class="col-sm-3 px-1 form-label">Gambar</label>
                                  <div class="col-3">
                                    <img src="{{$artikelModul->gambarAM != '' ?  asset('images/Artikel Modul/').'/'.$artikelModul->gambarAM : asset('images/no-image.png')}}" class="img-fluid" alt="" id="outputEdit{{$artikelModul->id}}" width="200">
                                  </div>
                                  <div class="col-6">
                                   <input type="file" name="editGambarAM" class="form-control form-control-sm" id="editGambarAM" onchange="document.getElementById('outputEdit{{$artikelModul->id}}').src = window.URL.createObjectURL(this.files[0])">
                                    @error('editGambarAM')
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
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                          <button type="submit" class="btn btn-success">Simpan Data</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- End Modal Ubah Data -->
                <!-- Modal Hapus Data -->
                <div class="modal fade" id="hapusData{{$artikelModul->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusData{{$artikelModul->id}}Label" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="hapusData{{$artikelModul->id}}Label">
                          <i class="bi bi-trash text-danger"></i>
                          Hapus Artikel Modul
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="{{ route('artikel-modul.destroy', $artikelModul->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                          <p>Apa anda yakin ingin menghapus Artikel/Modul {{$artikelModul->judulAM}} ini?</p>
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