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
        <a href="{{url('/admin/kolom-pilihan-ganda')}}" class="active">
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
    <h1>Kolom Cadangan (Pilihan Ganda)</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/admin')}}">Admin</a></li>
        <li class="breadcrumb-item active">Data Master</li>
        <li class="breadcrumb-item active">Kolom Cadangan (Pilihan Ganda)</li>
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
                <h5 class="card-title card-title-full">Personality - MBTI</h5>
              </div>
              <div class="col-3 text-end">
                <a href="#tambahPersMbti" class="icon-add-data text-success" data-bs-toggle="modal">
                  <i class="bi bi-plus-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Data"></i>
                </a>
              </div>
              <!-- Modal Tambah Data -->
              <div class="modal fade" id="tambahPersMbti" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahPersMbtiLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="tambahPersMbtiLabel">
                        <i class="bi bi-plus-circle text-success"></i>
                        Tambah Personality - MBTI
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('kolom-pilihan-ganda.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                        <div class="form-group-input">
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="mbti" class="col-sm-3 px-1 form-label">MBTI</label>
                                <div class="col-sm-9">
                                  <input type="text" name="mbti" class="form-control form-control-sm" id="mbti" placeholder="MBTI">
                                  @error('mbti')
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
                                <label for="deskripsiMBTI" class="col-sm-3 px-1 form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                  <textarea class="form-control form-control-sm" name="deskripsiMBTI" id="deskripsiMBTI" rows="3" placeholder="Deskripsi"></textarea>
                                  @error('deskripsiMBTI')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                </div>
                              </div>
                              <input type="text" name="sub" value="mbti" hidden>
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
                  <th scope="col">MBTI</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Tanggal Input</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($pMbtis as $pMbti)
                  <tr>
                    <th scope="row">{{$noPMbtis++}}</th>
                    <td>
                      <a href="#lihatPersMbti{{$pMbti->id}}" data-bs-toggle="modal" class="text-info">
                        {{$pMbti->mbti}} <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Data"></i>
                      </a>
                    </td>
                    <td>{{$pMbti->deskripsiMBTI}}</td>
                    <td>{{$pMbti->created_at}}</td>
                    <td>
                      <div class="icon-action">
                        <a href="#ubahPersMbti{{$pMbti->id}}" data-bs-toggle="modal" class="text-primary">
                          <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                        </a>
                        |
                        <a href="#hapusPersMbti{{$pMbti->id}}" data-bs-toggle="modal" class="text-danger">
                          <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Lihat Data -->
                  <div class="modal fade" id="lihatPersMbti{{$pMbti->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="lihatPersMbti{{$pMbti->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="lihatPersMbti{{$pMbti->id}}Label">
                            <i class="bi bi-info-circle text-info"></i>
                            Lihat Personality - MBTI
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="mx-auto d-block" style="">
                            <div class="row mx-auto">
                              <div class="col-4" style="">
                                <p class="">MBTI</p> 
                              </div>
                              <div class="col-1" style="">
                                <p class="text-center">:</p> 
                              </div>
                              <div class="col-4" style="">
                                <p class="text-start">{{$pMbti->mbti}}</p>
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
                              <p class="text-start">{{$pMbti->deskripsiMBTI}}</p>
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
                  <div class="modal fade" id="ubahPersMbti{{$pMbti->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahPersMbti{{$pMbti->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahPersMbti{{$pMbti->id}}Label">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Personality - MBTI
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('kolom-pilihan-ganda.update', $pMbti->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="form-group-input">
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editMbti" class="col-sm-3 px-1 form-label">MBTI</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editMbti" class="form-control form-control-sm" id="editMbti" value="{{$pMbti->mbti}}">
                                      @error('editMbti')
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
                                    <label for="editDeskripsiMBTI" class="col-sm-3 px-1 form-label">Deskripsi</label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control form-control-sm" name="editDeskripsiMBTI" id="editDeskripsiMBTI" rows="3">{{$pMbti->deskripsiMBTI}}</textarea>
                                      @error('editDeskripsiMBTI')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                    </div>
                                  </div>
                                  <input type="text" name="subEdit" value="mbti" hidden>
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
                  <div class="modal fade" id="hapusPersMbti{{$pMbti->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusPersMbti{{$pMbti->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusPersMbti{{$pMbti->id}}Label">
                            <i class="bi bi-trash text-danger"></i>
                            Hapus Personality - MBTI
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('kolom-pilihan-ganda.destroy', $pMbti->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                            <p>Apa anda yakin ingin menghapus Personality - MBTI {{$pMbti->mbti}} ini?</p>
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
        <hr>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <h5 class="card-title card-title-full">Personality - Holland</h5>
              </div>
              <div class="col-3 text-end">
                <a href="#tambahPersHolland" class="icon-add-data text-success" data-bs-toggle="modal">
                  <i class="bi bi-plus-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Data"></i>
                </a>
              </div>
              <!-- Modal Tambah Data -->
              <div class="modal fade" id="tambahPersHolland" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahPersHollandLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="tambahPersHollandLabel">
                        <i class="bi bi-plus-circle text-success"></i>
                        Tambah Personality - Holland
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('kolom-pilihan-ganda.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                        <div class="form-group-input">
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="holland" class="col-sm-3 px-1 form-label">Holland</label>
                                <div class="col-sm-9">
                                  <input type="text" name="holland" class="form-control form-control-sm" id="holland" placeholder="Holland">
                                  @error('holland')
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
                                <label for="deskripsiHLD" class="col-sm-3 px-1 form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                  <textarea class="form-control form-control-sm" name="deskripsiHLD" id="deskripsiHLD" rows="3" placeholder="Deskripsi"></textarea>
                                  @error('deskripsiHLD')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                </div>
                              </div>
                              <input type="text" name="sub" value="hld" hidden>
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
                  <th scope="col">Holland</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Tanggal Input</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($persHollands as $persHolland)
                  <tr>
                    <th scope="row">{{$noPersHollands++}}</th>
                    <td>
                      <a href="#lihatPersHolland{{$persHolland->id}}" data-bs-toggle="modal" class="text-info">
                        {{$persHolland->holland}} <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Data"></i>
                      </a>
                    </td>
                    <td>{{$persHolland->deskripsiHLD}}</td>
                    <td>{{$persHolland->created_at}}</td>
                    <td>
                      <div class="icon-action">
                        <a href="#ubahPersHolland{{$persHolland->id}}" data-bs-toggle="modal" class="text-primary">
                          <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                        </a>
                        |
                        <a href="#hapusPersHolland{{$persHolland->id}}" data-bs-toggle="modal" class="text-danger">
                          <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Lihat Data -->
                  <div class="modal fade" id="lihatPersHolland{{$persHolland->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="lihatPersHolland{{$persHolland->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="lihatPersHolland{{$persHolland->id}}Label">
                            <i class="bi bi-info-circle text-info"></i>
                            Lihat Personality - Holland
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="mx-auto d-block" style="">
                            <div class="row mx-auto">
                              <div class="col-4" style="">
                                <p class="">Holland</p> 
                              </div>
                              <div class="col-1" style="">
                                <p class="text-center">:</p> 
                              </div>
                              <div class="col-4" style="">
                                <p class="text-start">{{$persHolland->holland}}</p>
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
                              <p class="text-start">{{$persHolland->deskripsiHLD}}</p>
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
                  <div class="modal fade" id="ubahPersHolland{{$persHolland->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahPersHolland{{$persHolland->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahPersHolland{{$persHolland->id}}Label">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Personality - Holland
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('kolom-pilihan-ganda.update', $persHolland->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="form-group-input">
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editHolland" class="col-sm-3 px-1 form-label">Holland</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editHolland" class="form-control form-control-sm" id="editHolland" value="{{$persHolland->holland}}">
                                      @error('editHolland')
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
                                    <label for="editDeskripsiHLD" class="col-sm-3 px-1 form-label">Deskripsi</label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control form-control-sm" name="editDeskripsiHLD" id="editDeskripsiHLD" rows="3">{{$persHolland->deskripsiHLD}}</textarea>
                                      @error('editDeskripsiHLD')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                    </div>
                                  </div>
                                  <input type="text" name="subEdit" value="hld" hidden>
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
                  <div class="modal fade" id="hapusPersHolland{{$persHolland->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusPersHolland{{$persHolland->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusPersHolland{{$persHolland->id}}Label">
                            <i class="bi bi-trash text-danger"></i>
                            Hapus Personality - Holland
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('kolom-pilihan-ganda.destroy', $persHolland->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                            <p>Apa anda yakin ingin menghapus Personality - Holland {{$persHolland->holland}} ini?</p>
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
        <hr>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <h5 class="card-title card-title-full">Spiritual Gifts</h5>
              </div>
              <div class="col-3 text-end">
                <a href="#tambahSpiritualGifts" class="icon-add-data text-success" data-bs-toggle="modal">
                  <i class="bi bi-plus-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Data"></i>
                </a>
              </div>
              <!-- Modal Tambah Data -->
              <div class="modal fade" id="tambahSpiritualGifts" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahSpiritualGiftsLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="tambahSpiritualGiftsLabel">
                        <i class="bi bi-plus-circle text-success"></i>
                        Tambah Spiritual Gifts
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('kolom-pilihan-ganda.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                        <div class="form-group-input">
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="gifts" class="col-sm-3 px-1 form-label">Spiritual Gifts</label>
                                <div class="col-sm-9">
                                  <input type="text" name="gifts" class="form-control form-control-sm" id="gifts" placeholder="Spiritual Gifts">
                                  @error('gifts')
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
                                <label for="deskripsiGFT" class="col-sm-3 px-1 form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                  <textarea class="form-control form-control-sm" name="deskripsiGFT" id="deskripsiGFT" rows="3" placeholder="Deskripsi"></textarea>
                                  @error('deskripsiGFT')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                </div>
                              </div>
                              <input type="text" name="sub" value="sg" hidden>
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
                  <th scope="col">Gifts</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Tanggal Input</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($spiritGifts as $spiritGift)
                  <tr>
                    <th scope="row">{{$noSpiritGifts++}}</th>
                    <td>
                      <a href="#lihatSpiritualGifts{{$spiritGift->id}}" data-bs-toggle="modal" class="text-info">
                        {{$spiritGift->gifts}} <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Data"></i>
                      </a>
                    </td>
                    <td>{{$spiritGift->deskripsiGFT}}</td>
                    <td>{{$spiritGift->created_at}}</td>
                    <td>
                      <div class="icon-action">
                        <a href="#ubahSpiritualGifts{{$spiritGift->id}}" data-bs-toggle="modal" class="text-primary">
                          <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                        </a>
                        |
                        <a href="#hapusSpiritualGifts{{$spiritGift->id}}" data-bs-toggle="modal" class="text-danger">
                          <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Lihat Data -->
                  <div class="modal fade" id="lihatSpiritualGifts{{$spiritGift->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="lihatSpiritualGifts{{$spiritGift->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="lihatSpiritualGifts{{$spiritGift->id}}Label">
                            <i class="bi bi-info-circle text-info"></i>
                            Lihat Spiritual Gifts
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="mx-auto d-block" style="">
                            <div class="row mx-auto">
                              <div class="col-4" style="">
                                <p class="">Spiritual Gifts</p> 
                              </div>
                              <div class="col-1" style="">
                                <p class="text-center">:</p> 
                              </div>
                              <div class="col-4" style="">
                                <p class="text-start">{{$spiritGift->gifts}}</p>
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
                              <p class="text-start">{{$spiritGift->deskripsiGFT}}</p>
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
                  <div class="modal fade" id="ubahSpiritualGifts{{$spiritGift->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahSpiritualGifts{{$spiritGift->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahSpiritualGifts{{$spiritGift->id}}Label">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Spiritual Gifts
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('kolom-pilihan-ganda.update', $spiritGift->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="form-group-input">
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editGifts" class="col-sm-3 px-1 form-label">Spiritual Gifts</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editGifts" class="form-control form-control-sm" id="editGifts" value="{{$spiritGift->gifts}}">
                                      @error('editGifts')
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
                                    <label for="editDeskripsiGFT" class="col-sm-3 px-1 form-label">Deskripsi</label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control form-control-sm" name="editDeskripsiGFT" id="editDeskripsiGFT" rows="3">{{$spiritGift->deskripsiGFT}}</textarea>
                                      @error('editDeskripsiGFT')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                    </div>
                                  </div>
                                  <input type="text" name="subEdit" value="sg" hidden>
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
                  <div class="modal fade" id="hapusSpiritualGifts{{$spiritGift->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusSpiritualGifts{{$spiritGift->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusSpiritualGifts{{$spiritGift->id}}Label">
                            <i class="bi bi-trash text-danger"></i>
                            Hapus Spiritual Gifts
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('kolom-pilihan-ganda.destroy', $spiritGift->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                            <p>Apa anda yakin ingin menghapus Spiritual Gifts {{$spiritGift->gifts}} ini?</p>
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
        <hr>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <h5 class="card-title card-title-full">Abilities</h5>
              </div>
              <div class="col-3 text-end">
                <a href="#tambahAbilities" class="icon-add-data text-success" data-bs-toggle="modal">
                  <i class="bi bi-plus-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Data"></i>
                </a>
              </div>
              <!-- Modal Tambah Data -->
              <div class="modal fade" id="tambahAbilities" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahAbilitiesLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="tambahAbilitiesLabel">
                        <i class="bi bi-plus-circle text-success"></i>
                        Tambah Abilities
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('kolom-pilihan-ganda.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                        <div class="form-group-input">
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="abilities" class="col-sm-3 px-1 form-label">Abilities</label>
                                <div class="col-sm-9">
                                  <input type="text" name="abilities" class="form-control form-control-sm" id="abilities" placeholder="Abilities">
                                  @error('abilities')
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
                                <label for="deskripsiABL" class="col-sm-3 px-1 form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                  <textarea class="form-control form-control-sm" name="deskripsiABL" id="deskripsiABL" rows="3" placeholder="Deskripsi"></textarea>
                                  @error('deskripsiABL')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                </div>
                              </div>
                              <input type="text" name="sub" value="ab" hidden>
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
                  <th scope="col">Abilities</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Tanggal Input</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($abilities as $ability)
                  <tr>
                    <th scope="row">{{$noAbilities++}}</th>
                    <td>
                      <a href="#lihatAbilities{{$ability->id}}" data-bs-toggle="modal" class="text-info">
                        {{$ability->abilities}} <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Data"></i>
                      </a>
                    </td>
                    <td>{{$ability->deskripsiABL}}</td>
                    <td>{{$ability->created_at}}</td>
                    <td>
                      <div class="icon-action">
                        <a href="#ubahAbilities{{$ability->id}}" data-bs-toggle="modal" class="text-primary">
                          <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                        </a>
                        |
                        <a href="#hapusAbilities{{$ability->id}}" data-bs-toggle="modal" class="text-danger">
                          <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Lihat Data -->
                  <div class="modal fade" id="lihatAbilities{{$ability->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="lihatAbilities{{$ability->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="lihatAbilities{{$ability->id}}Label">
                            <i class="bi bi-info-circle text-info"></i>
                            Lihat Abilities
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="mx-auto d-block" style="">
                            <div class="row mx-auto">
                              <div class="col-4" style="">
                                <p class="">Abilities</p> 
                              </div>
                              <div class="col-1" style="">
                                <p class="text-center">:</p> 
                              </div>
                              <div class="col-4" style="">
                                <p class="text-start">{{$ability->abilities}}</p>
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
                              <p class="text-start">{{$ability->deskripsiABL}}</p>
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
                  <div class="modal fade" id="ubahAbilities{{$ability->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahAbilities{{$ability->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahAbilities{{$ability->id}}Label">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Abilities
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('kolom-pilihan-ganda.update', $ability->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="form-group-input">
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editAbilities" class="col-sm-3 px-1 form-label">Abilities</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editAbilities" class="form-control form-control-sm" id="editAbilities" value="{{$ability->abilities}}">
                                      @error('editAbilities')
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
                                    <label for="editDeskripsiABL" class="col-sm-3 px-1 form-label">Deskripsi</label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control form-control-sm" name="editDeskripsiABL" id="editDeskripsiABL" rows="3">{{$ability->deskripsiABL}}</textarea>
                                      @error('editDeskripsiABL')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                    </div>
                                  </div>
                                  <input type="text" name="subEdit" value="ab" hidden>
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
                  <div class="modal fade" id="hapusAbilities{{$ability->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusAbilities{{$ability->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusAbilities{{$ability->id}}Label">
                            <i class="bi bi-trash text-danger"></i>
                            Hapus Abilities
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('kolom-pilihan-ganda.destroy', $ability->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                            <p>Apa anda yakin ingin menghapus Abilities {{$ability->abilities}} ini?</p>
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
        <hr>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <h5 class="card-title card-title-full">Kolom Cadangan (Pilihan Ganda) 5</h5>
              </div>
              <div class="col-3 text-end">
                <a href="#tambahKolCadPilGadLima" class="icon-add-data text-success" data-bs-toggle="modal">
                  <i class="bi bi-plus-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Data"></i>
                </a>
              </div>
              <!-- Modal Tambah Data -->
              <div class="modal fade" id="tambahKolCadPilGadLima" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahKolCadPilGadLimaLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="tambahKolCadPilGadLimaLabel">
                        <i class="bi bi-plus-circle text-success"></i>
                        Tambah Kolom Cadangan (Pilihan Ganda) 5
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('kolom-pilihan-ganda.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                        <div class="form-group-input">
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="ganda_lima" class="col-sm-3 px-1 form-label">Ganda Lima</label>
                                <div class="col-sm-9">
                                  <input type="text" name="ganda_lima" class="form-control form-control-sm" id="ganda_lima" placeholder="Ganda Lima">
                                  @error('ganda_lima')
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
                                <label for="deskripsiGL" class="col-sm-3 px-1 form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                  <textarea class="form-control form-control-sm" name="deskripsiGL" id="deskripsiGL" rows="3" placeholder="Deskripsi"></textarea>
                                  @error('deskripsiGL')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                </div>
                              </div>
                              <input type="text" name="sub" value="gl" hidden>
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
                  <th scope="col">Pilihan Ganda 5</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Tanggal Input</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($gandaLimas as $gandaLima)
                  <tr>
                    <th scope="row">{{$noGandaLimas++}}</th>
                    <td>
                      <a href="#lihatKolCadPilGadLima{{$gandaLima->id}}" data-bs-toggle="modal" class="text-info">
                        {{$gandaLima->ganda_lima}} <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Data"></i>
                      </a>
                    </td>
                    <td>{{$gandaLima->deskripsiGL}}</td>
                    <td>{{$gandaLima->created_at}}</td>
                    <td>
                      <div class="icon-action">
                        <a href="#ubahKolCadPilGadLima{{$gandaLima->id}}" data-bs-toggle="modal" class="text-primary">
                          <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                        </a>
                        |
                        <a href="#hapusKolCadPilGadLima{{$gandaLima->id}}" data-bs-toggle="modal" class="text-danger">
                          <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Lihat Data -->
                  <div class="modal fade" id="lihatKolCadPilGadLima{{$gandaLima->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="lihatKolCadPilGadLima{{$gandaLima->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="lihatKolCadPilGadLima{{$gandaLima->id}}Label">
                            <i class="bi bi-info-circle text-info"></i>
                            Lihat Kolom Cadangan (Pilihan Ganda) 5
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="mx-auto d-block" style="">
                            <div class="row mx-auto">
                              <div class="col-4" style="">
                                <p class="">Ganda Lima</p> 
                              </div>
                              <div class="col-1" style="">
                                <p class="text-center">:</p> 
                              </div>
                              <div class="col-4" style="">
                                <p class="text-start">{{$gandaLima->ganda_lima}}</p>
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
                              <p class="text-start">{{$gandaLima->deskripsiGL}}</p>
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
                  <div class="modal fade" id="ubahKolCadPilGadLima{{$gandaLima->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahKolCadPilGadLima{{$gandaLima->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahKolCadPilGadLima{{$gandaLima->id}}Label">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Kolom Cadangan (Pilihan Ganda) 5
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('kolom-pilihan-ganda.update', $gandaLima->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="form-group-input">
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editGandaLima" class="col-sm-3 px-1 form-label">Ganda Lima</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editGandaLima" class="form-control form-control-sm" id="editGandaLima" value="{{$gandaLima->ganda_lima}}">
                                      @error('editGandaLima')
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
                                    <label for="editDeskripsiGL" class="col-sm-3 px-1 form-label">Deskripsi</label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control form-control-sm" name="editDeskripsiGL" id="editDeskripsiGL" rows="3">{{$gandaLima->deskripsiGL}}</textarea>
                                      @error('editDeskripsiGL')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                    </div>
                                  </div>
                                  <input type="text" name="subEdit" value="gl" hidden>
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
                  <div class="modal fade" id="hapusKolCadPilGadLima{{$gandaLima->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusKolCadPilGadLima{{$gandaLima->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusKolCadPilGadLima{{$gandaLima->id}}Label">
                            <i class="bi bi-trash text-danger"></i>
                            Hapus Kolom Cadangan (Pilihan Ganda) 5
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('kolom-pilihan-ganda.destroy', $gandaLima->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                            <p>Apa anda yakin ingin menghapus Ganda Lima {{$gandaLima->ganda_lima}} ini?</p>
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
        <hr>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <h5 class="card-title card-title-full">Kemampuan Bahasa</h5>
              </div>
              <div class="col-3 text-end">
                <a href="#tambahKemBahasa" class="icon-add-data text-success" data-bs-toggle="modal">
                  <i class="bi bi-plus-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Data"></i>
                </a>
              </div>
              <!-- Modal Tambah Data -->
              <div class="modal fade" id="tambahKemBahasa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahKemBahasaLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="tambahKemBahasaLabel">
                        <i class="bi bi-plus-circle text-success"></i>
                        Tambah Kemampuan Bahasa
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('kolom-pilihan-ganda.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                        <div class="form-group-input">
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="kem_bahasa" class="col-sm-3 px-1 form-label">Bahasa</label>
                                <div class="col-sm-9">
                                  <input type="text" name="kem_bahasa" class="form-control form-control-sm" id="kem_bahasa" placeholder="Bahasa">
                                  @error('kem_bahasa')
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
                                <label for="deskripsiKB" class="col-sm-3 px-1 form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                  <textarea class="form-control form-control-sm" name="deskripsiKB" id="deskripsiKB" rows="3" placeholder="Deskripsi"></textarea>
                                  @error('deskripsiKB')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                </div>
                              </div>
                              <input type="text" name="sub" value="kb" hidden>
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
                  <th scope="col">Bahasa</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Tanggal Input</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($kemBahasas as $kemBahasa)
                  <tr>
                    <th scope="row">{{$noKemBahasas++}}</th>
                    <td>
                      <a href="#lihatKemBahasa{{$kemBahasa->id}}" data-bs-toggle="modal" class="text-info">
                        {{$kemBahasa->kem_bahasa}} <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Data"></i>
                      </a>
                    </td>
                    <td>{{$kemBahasa->deskripsiKB}}</td>
                    <td>{{$kemBahasa->created_at}}</td>
                    <td>
                      <div class="icon-action">
                        <a href="#ubahKemBahasa{{$kemBahasa->id}}" data-bs-toggle="modal" class="text-primary">
                          <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                        </a>
                        |
                        <a href="#hapusKemBahasa{{$kemBahasa->id}}" data-bs-toggle="modal" class="text-danger">
                          <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Lihat Data -->
                  <div class="modal fade" id="lihatKemBahasa{{$kemBahasa->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="lihatKemBahasa{{$kemBahasa->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="lihatKemBahasa{{$kemBahasa->id}}Label">
                            <i class="bi bi-info-circle text-info"></i>
                            Lihat Kemampuan Bahasa
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="mx-auto d-block" style="">
                            <div class="row mx-auto">
                              <div class="col-4" style="">
                                <p class="">Bahasa</p> 
                              </div>
                              <div class="col-1" style="">
                                <p class="text-center">:</p> 
                              </div>
                              <div class="col-4" style="">
                                <p class="text-start">{{$kemBahasa->kem_bahasa}}</p>
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
                              <p class="text-start">{{$kemBahasa->deskripsiKB}}</p>
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
                  <div class="modal fade" id="ubahKemBahasa{{$kemBahasa->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahKemBahasa{{$kemBahasa->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahKemBahasa{{$kemBahasa->id}}Label">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Kemampuan Bahasa
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('kolom-pilihan-ganda.update', $kemBahasa->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="form-group-input">
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editKemBahasa" class="col-sm-3 px-1 form-label">Bahasa</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editKemBahasa" class="form-control form-control-sm" id="editKemBahasa" value="{{$kemBahasa->kem_bahasa}}">
                                      @error('editKemBahasa')
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
                                    <label for="editDeskripsiKB" class="col-sm-3 px-1 form-label">Deskripsi</label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control form-control-sm" name="editDeskripsiKB" id="editDeskripsiKB" rows="3">{{$kemBahasa->deskripsiKB}}</textarea>
                                      @error('editDeskripsiKB')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                    </div>
                                  </div>
                                  <input type="text" name="subEdit" value="kb" hidden>
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
                  <div class="modal fade" id="hapusKemBahasa{{$kemBahasa->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusKemBahasa{{$kemBahasa->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusKemBahasa{{$kemBahasa->id}}Label">
                            <i class="bi bi-trash text-danger"></i>
                            Hapus Kemampuan Bahasa
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('kolom-pilihan-ganda.destroy', $kemBahasa->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                            <p>Apa anda yakin ingin menghapus Bahasa {{$kemBahasa->kem_bahasa}} ini?</p>
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
        <hr>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <h5 class="card-title card-title-full">Penyakit</h5>
              </div>
              <div class="col-3 text-end">
                <a href="#tambahPenyakit" class="icon-add-data text-success" data-bs-toggle="modal">
                  <i class="bi bi-plus-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Data"></i>
                </a>
              </div>
              <!-- Modal Tambah Data -->
              <div class="modal fade" id="tambahPenyakit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahPenyakitLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="tambahPenyakitLabel">
                        <i class="bi bi-plus-circle text-success"></i>
                        Tambah Penyakit
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('kolom-pilihan-ganda.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                        <div class="form-group-input">
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="penyakit" class="col-sm-3 px-1 form-label">Penyakit</label>
                                <div class="col-sm-9">
                                  <input type="text" name="penyakit" class="form-control form-control-sm" id="penyakit" placeholder="Penyakit">
                                  @error('penyakit')
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
                                <label for="deskripsiPKT" class="col-sm-3 px-1 form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                  <textarea class="form-control form-control-sm" name="deskripsiPKT" id="deskripsiPKT" rows="3" placeholder="Deskripsi"></textarea>
                                  @error('deskripsiPKT')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                </div>
                              </div>
                              <input type="text" name="sub" value="pk" hidden>
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
                  <th scope="col">Penyakit</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Tanggal Input</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($penyakits as $penyakit)
                  <tr>
                    <th scope="row">{{$noPenyakits++}}</th>
                    <td>
                      <a href="#lihatPenyakit{{$penyakit->id}}" data-bs-toggle="modal" class="text-info">
                        {{$penyakit->penyakit}} <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Data"></i>
                      </a>
                    </td>
                    <td>{{$penyakit->deskripsiPKT}}</td>
                    <td>{{$penyakit->created_at}}</td>
                    <td>
                      <div class="icon-action">
                        <a href="#ubahPenyakit{{$penyakit->id}}" data-bs-toggle="modal" class="text-primary">
                          <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                        </a>
                        |
                        <a href="#hapusPenyakit{{$penyakit->id}}" data-bs-toggle="modal" class="text-danger">
                          <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Lihat Data -->
                  <div class="modal fade" id="lihatPenyakit{{$penyakit->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="lihatPenyakit{{$penyakit->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="lihatPenyakit{{$penyakit->id}}Label">
                            <i class="bi bi-info-circle text-info"></i>
                            Lihat Penyakit
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="mx-auto d-block" style="">
                            <div class="row mx-auto">
                              <div class="col-4" style="">
                                <p class="">Penyakit</p> 
                              </div>
                              <div class="col-1" style="">
                                <p class="text-center">:</p> 
                              </div>
                              <div class="col-4" style="">
                                <p class="text-start">{{$penyakit->penyakit}}</p>
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
                              <p class="text-start">{{$penyakit->deskripsiPKT}}</p>
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
                  <div class="modal fade" id="ubahPenyakit{{$penyakit->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahPenyakit{{$penyakit->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahPenyakit{{$penyakit->id}}Label">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Penyakit
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('kolom-pilihan-ganda.update', $penyakit->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="form-group-input">
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editPenyakit" class="col-sm-3 px-1 form-label">Penyakit</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editPenyakit" class="form-control form-control-sm" id="editPenyakit" value="{{$penyakit->penyakit}}">
                                      @error('editPenyakit')
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
                                    <label for="editDeskripsiPKT" class="col-sm-3 px-1 form-label">Deskripsi</label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control form-control-sm" name="editDeskripsiPKT" id="editDeskripsiPKT" rows="3">{{$penyakit->deskripsiPKT}}</textarea>
                                      @error('editDeskripsiPKT')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                    </div>
                                  </div>
                                  <input type="text" name="subEdit" value="pk" hidden>
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
                  <div class="modal fade" id="hapusPenyakit{{$penyakit->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusPenyakit{{$penyakit->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusPenyakit{{$penyakit->id}}Label">
                            <i class="bi bi-trash text-danger"></i>
                            Hapus Penyakit
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