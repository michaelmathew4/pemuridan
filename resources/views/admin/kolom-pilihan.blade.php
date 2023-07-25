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
        <a href="{{url('/admin/kolom-pilihan')}}" class="active">
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
    <h1>Kolom Cadangan (Pilihan)</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/admin')}}">Admin</a></li>
        <li class="breadcrumb-item active">Data Master</li>
        <li class="breadcrumb-item active">Kolom Cadangan (Pilihan)</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <h5 class="card-title card-title-full">Kolom Cadangan (Pilihan) 1</h5>
              </div>
              <div class="col-3 text-end">
                <a href="#tambahKolCadPilSatu" class="icon-add-data text-success" data-bs-toggle="modal">
                  <i class="bi bi-plus-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Data"></i>
                </a>
              </div>
            <!-- Modal Tambah Data -->
            <div class="modal fade" id="tambahKolCadPilSatu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahKolCadPilSatuLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tambahKolCadPilSatuLabel">
                      <i class="bi bi-plus-circle text-success"></i>
                      Tambah Kolom Cadangan (Pilihan) 1
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="{{ route('kolom-pilihan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                      <div class="form-group-input">
                        <div class="input-center ps-5">
                          <div class="w-75">
                            <div class="mb-3 row">
                              <label for="kc_pilsatu" class="col-sm-3 px-1 form-label">Pilihan 1</label>
                              <div class="col-sm-9">
                                <input type="text" name="kc_pilsatu" class="form-control form-control-sm" id="kc_pilsatu" placeholder="Pilihan 1">
                                @error('kc_pilsatu')
                                  <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                    <p class="p-1 pb-0" style="font-size: 10pt;">
                                      <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                      {{ $message }}
                                    </p>
                                  </div>
                                @enderror
                              </div>
                            </div>
                            <input type="text" name="sub" value="kc_pilsatu" hidden>
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
                  <th scope="col">Pilihan 1</th>
                  <th scope="col">Tanggal Input</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($kc_pilsatus as $kc_pilsatu)
                  <tr>
                    <th scope="row">{{$noKc_pilsatus++}}</th>
                    <td>{{$kc_pilsatu->kc_pilsatu}}</td>
                    <td>{{$kc_pilsatu->created_at}}</td>
                    <td>
                      <div class="icon-action">
                        <a href="#ubahKolCadPilSatu{{$kc_pilsatu->kc_pilsatu}}" data-bs-toggle="modal" class="text-primary">
                          <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                        </a>
                        |
                        <a href="#hapusKolCadPilSatu{{$kc_pilsatu->kc_pilsatu}}" data-bs-toggle="modal" class="text-danger">
                          <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Ubah Data -->
                  <div class="modal fade" id="ubahKolCadPilSatu{{$kc_pilsatu->kc_pilsatu}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahKolCadPilSatu{{$kc_pilsatu->kc_pilsatu}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahKolCadPilSatu{{$kc_pilsatu->kc_pilsatu}}Label">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Kolom Cadangan (Pilihan) 1
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
                  <div class="modal fade" id="hapusKolCadPilSatu{{$kc_pilsatu->kc_pilsatu}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusKolCadPilSatu{{$kc_pilsatu->kc_pilsatu}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusKolCadPilSatu{{$kc_pilsatu->kc_pilsatu}}Label">
                            <i class="bi bi-trash text-danger"></i>
                            Hapus Kolom Cadangan (Pilihan) 1
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
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <h5 class="card-title card-title-full">Kolom Cadangan (Pilihan) 2</h5>
              </div>
              <div class="col-3 text-end">
                <a href="#tambahKolCadPilDua" class="icon-add-data text-success" data-bs-toggle="modal">
                  <i class="bi bi-plus-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Data"></i>
                </a>
              </div>
            </div>
            <hr>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Name</th>
                  <th scope="col">Position</th>
                  <th scope="col">Age</th>
                  <th scope="col">Start Date</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>
                    <a href="#lihatKolCadPilDua" data-bs-toggle="modal" class="text-info">
                      Brandon Jacob <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Data"></i>
                    </a>
                  </td>
                  <td>Designer</td>
                  <td>28</td>
                  <td>2016-05-25</td>
                  <td>
                    <div class="icon-action">
                      <a href="#ubahKolCadPilDua" data-bs-toggle="modal" class="text-primary">
                        <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                      </a>
                      |
                      <a href="#hapusKolCadPilDua" data-bs-toggle="modal" class="text-danger">
                        <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- Modal Lihat Data -->
            <div class="modal fade" id="lihatKolCadPilDua" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="lihatKolCadPilDuaLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="lihatKolCadPilDuaLabel">
                      <i class="bi bi-info-circle text-info"></i>
                      Lihat Kolom Cadangan (Pilihan) 2
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
            <!-- Modal Tambah Data -->
            <div class="modal fade" id="tambahKolCadPilDua" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahKolCadPilDuaLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tambahKolCadPilDuaLabel">
                      <i class="bi bi-plus-circle text-success"></i>
                      Tambah Kolom Cadangan (Pilihan) 2
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
            <!-- End Modal Tambah Data -->
            <!-- Modal Ubah Data -->
            <div class="modal fade" id="ubahKolCadPilDua" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahKolCadPilDuaLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="ubahKolCadPilDuaLabel">
                      <i class="bi bi-pencil-square text-primary"></i>
                      Ubah Kolom Cadangan (Pilihan) 2
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
            <div class="modal fade" id="hapusKolCadPilDua" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusKolCadPilDuaLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="hapusKolCadPilDuaLabel">
                      <i class="bi bi-trash text-danger"></i>
                      Hapus Kolom Cadangan (Pilihan) 2
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
          </div>
        </div>
      </div>
      <hr>
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <h5 class="card-title card-title-full">Kolom Cadangan (Pilihan) 3</h5>
              </div>
              <div class="col-3 text-end">
                <a href="#tambahKolCadPilTiga" class="icon-add-data text-success" data-bs-toggle="modal">
                  <i class="bi bi-plus-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Data"></i>
                </a>
              </div>
            </div>
            <hr>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Name</th>
                  <th scope="col">Position</th>
                  <th scope="col">Age</th>
                  <th scope="col">Start Date</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>
                    <a href="#lihatKolCadPilTiga" data-bs-toggle="modal" class="text-info">
                      Brandon Jacob <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Data"></i>
                    </a>
                  </td>
                  <td>Designer</td>
                  <td>28</td>
                  <td>2016-05-25</td>
                  <td>
                    <div class="icon-action">
                      <a href="#ubahKolCadPilTiga" data-bs-toggle="modal" class="text-primary">
                        <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                      </a>
                      |
                      <a href="#hapusKolCadPilTiga" data-bs-toggle="modal" class="text-danger">
                        <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- Modal Lihat Data -->
            <div class="modal fade" id="lihatKolCadPilTiga" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="lihatKolCadPilTigaLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="lihatKolCadPilTigaLabel">
                      <i class="bi bi-info-circle text-info"></i>
                      Lihat Kolom Cadangan (Pilihan) 3
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
            <!-- Modal Tambah Data -->
            <div class="modal fade" id="tambahKolCadPilTiga" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahKolCadPilTigaLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tambahKolCadPilTigaLabel">
                      <i class="bi bi-plus-circle text-success"></i>
                      Tambah Kolom Cadangan (Pilihan) 3
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
            <!-- End Modal Tambah Data -->
            <!-- Modal Ubah Data -->
            <div class="modal fade" id="ubahKolCadPilTiga" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahKolCadPilTigaLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="ubahKolCadPilTigaLabel">
                      <i class="bi bi-pencil-square text-primary"></i>
                      Ubah Kolom Cadangan (Pilihan) 3
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
            <div class="modal fade" id="hapusKolCadPilTiga" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusKolCadPilTigaLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="hapusKolCadPilTigaLabel">
                      <i class="bi bi-trash text-danger"></i>
                      Hapus Kolom Cadangan (Pilihan) 3
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
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <h5 class="card-title card-title-full">Kolom Cadangan (Pilihan) 4</h5>
              </div>
              <div class="col-3 text-end">
                <a href="#tambahKolCadPilEmpat" class="icon-add-data text-success" data-bs-toggle="modal">
                  <i class="bi bi-plus-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Data"></i>
                </a>
              </div>
            </div>
            <hr>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Name</th>
                  <th scope="col">Position</th>
                  <th scope="col">Age</th>
                  <th scope="col">Start Date</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>
                    <a href="#lihatKolCadPilEmpat" data-bs-toggle="modal" class="text-info">
                      Brandon Jacob <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Data"></i>
                    </a>
                  </td>
                  <td>Designer</td>
                  <td>28</td>
                  <td>2016-05-25</td>
                  <td>
                    <div class="icon-action">
                      <a href="#ubahKolCadPilEmpat" data-bs-toggle="modal" class="text-primary">
                        <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                      </a>
                      |
                      <a href="#hapusKolCadPilEmpat" data-bs-toggle="modal" class="text-danger">
                        <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- Modal Lihat Data -->
            <div class="modal fade" id="lihatKolCadPilEmpat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="lihatKolCadPilEmpatLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="lihatKolCadPilEmpatLabel">
                      <i class="bi bi-info-circle text-info"></i>
                      Lihat Kolom Cadangan (Pilihan) 4
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
            <!-- Modal Tambah Data -->
            <div class="modal fade" id="tambahKolCadPilEmpat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahKolCadPilEmpatLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tambahKolCadPilEmpatLabel">
                      <i class="bi bi-plus-circle text-success"></i>
                      Tambah Kolom Cadangan (Pilihan) 4
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
            <!-- End Modal Tambah Data -->
            <!-- Modal Ubah Data -->
            <div class="modal fade" id="ubahKolCadPilEmpat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahKolCadPilEmpatLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="ubahKolCadPilEmpatLabel">
                      <i class="bi bi-pencil-square text-primary"></i>
                      Ubah Kolom Cadangan (Pilihan) 4
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
            <div class="modal fade" id="hapusKolCadPilEmpat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusKolCadPilEmpatLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="hapusKolCadPilEmpatLabel">
                      <i class="bi bi-trash text-danger"></i>
                      Hapus Kolom Cadangan (Pilihan) 4
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
          </div>
        </div>
      </div>
      <hr>
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <h5 class="card-title card-title-full">Kolom Cadangan (Pilihan) 5</h5>
              </div>
              <div class="col-3 text-end">
                <a href="#tambahKolCadPilLima" class="icon-add-data text-success" data-bs-toggle="modal">
                  <i class="bi bi-plus-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Data"></i>
                </a>
              </div>
            </div>
            <hr>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Name</th>
                  <th scope="col">Position</th>
                  <th scope="col">Age</th>
                  <th scope="col">Start Date</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>
                    <a href="#lihatKolCadPilLima" data-bs-toggle="modal" class="text-info">
                      Brandon Jacob <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Data"></i>
                    </a>
                  </td>
                  <td>Designer</td>
                  <td>28</td>
                  <td>2016-05-25</td>
                  <td>
                    <div class="icon-action">
                      <a href="#ubahKolCadPilLima" data-bs-toggle="modal" class="text-primary">
                        <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                      </a>
                      |
                      <a href="#hapusKolCadPilLima" data-bs-toggle="modal" class="text-danger">
                        <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- Modal Lihat Data -->
            <div class="modal fade" id="lihatKolCadPilLima" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="lihatKolCadPilLimaLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="lihatKolCadPilLimaLabel">
                      <i class="bi bi-info-circle text-info"></i>
                      Lihat Kolom Cadangan (Pilihan) 5
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
            <!-- Modal Tambah Data -->
            <div class="modal fade" id="tambahKolCadPilLima" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahKolCadPilLimaLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tambahKolCadPilLimaLabel">
                      <i class="bi bi-plus-circle text-success"></i>
                      Tambah Kolom Cadangan (Pilihan) 5
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
            <!-- End Modal Tambah Data -->
            <!-- Modal Ubah Data -->
            <div class="modal fade" id="ubahKolCadPilLima" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahKolCadPilLimaLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="ubahKolCadPilLimaLabel">
                      <i class="bi bi-pencil-square text-primary"></i>
                      Ubah Kolom Cadangan (Pilihan) 5
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
            <div class="modal fade" id="hapusKolCadPilLima" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusKolCadPilLimaLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="hapusKolCadPilLimaLabel">
                      <i class="bi bi-trash text-danger"></i>
                      Hapus Kolom Cadangan (Pilihan) 5
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
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <h5 class="card-title card-title-full">Kolom Cadangan (Pilihan) 6</h5>
              </div>
              <div class="col-3 text-end">
                <a href="#tambahKolCadPilEnam" class="icon-add-data text-success" data-bs-toggle="modal">
                  <i class="bi bi-plus-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Data"></i>
                </a>
              </div>
            </div>
            <hr>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Name</th>
                  <th scope="col">Position</th>
                  <th scope="col">Age</th>
                  <th scope="col">Start Date</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>
                    <a href="#lihatKolCadPilEnam" data-bs-toggle="modal" class="text-info">
                      Brandon Jacob <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Data"></i>
                    </a>
                  </td>
                  <td>Designer</td>
                  <td>28</td>
                  <td>2016-05-25</td>
                  <td>
                    <div class="icon-action">
                      <a href="#ubahKolCadPilEnam" data-bs-toggle="modal" class="text-primary">
                        <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                      </a>
                      |
                      <a href="#hapusKolCadPilEnam" data-bs-toggle="modal" class="text-danger">
                        <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- Modal Lihat Data -->
            <div class="modal fade" id="lihatKolCadPilEnam" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="lihatKolCadPilEnamLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="lihatKolCadPilEnamLabel">
                      <i class="bi bi-info-circle text-info"></i>
                      Lihat Kolom Cadangan (Pilihan) 6
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
            <!-- Modal Tambah Data -->
            <div class="modal fade" id="tambahKolCadPilEnam" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahKolCadPilEnamLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tambahKolCadPilEnamLabel">
                      <i class="bi bi-plus-circle text-success"></i>
                      Tambah Kolom Cadangan (Pilihan) 6
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
            <!-- End Modal Tambah Data -->
            <!-- Modal Ubah Data -->
            <div class="modal fade" id="ubahKolCadPilEnam" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahKolCadPilEnamLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="ubahKolCadPilEnamLabel">
                      <i class="bi bi-pencil-square text-primary"></i>
                      Ubah Kolom Cadangan (Pilihan) 6
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
            <div class="modal fade" id="hapusKolCadPilEnam" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusKolCadPilEnamLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="hapusKolCadPilEnamLabel">
                      <i class="bi bi-trash text-danger"></i>
                      Hapus Kolom Cadangan (Pilihan) 6
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
          </div>
        </div>
      </div>
      <hr>
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <h5 class="card-title card-title-full">Kolom Cadangan (Pilihan) 7</h5>
              </div>
              <div class="col-3 text-end">
                <a href="#tambahKolCadPilTujuh" class="icon-add-data text-success" data-bs-toggle="modal">
                  <i class="bi bi-plus-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Data"></i>
                </a>
              </div>
            </div>
            <hr>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Name</th>
                  <th scope="col">Position</th>
                  <th scope="col">Age</th>
                  <th scope="col">Start Date</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>
                    <a href="#lihatKolCadPilTujuh" data-bs-toggle="modal" class="text-info">
                      Brandon Jacob <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Data"></i>
                    </a>
                  </td>
                  <td>Designer</td>
                  <td>28</td>
                  <td>2016-05-25</td>
                  <td>
                    <div class="icon-action">
                      <a href="#ubahKolCadPilTujuh" data-bs-toggle="modal" class="text-primary">
                        <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                      </a>
                      |
                      <a href="#hapusKolCadPilTujuh" data-bs-toggle="modal" class="text-danger">
                        <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- Modal Lihat Data -->
            <div class="modal fade" id="lihatKolCadPilTujuh" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="lihatKolCadPilTujuhLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="lihatKolCadPilTujuhLabel">
                      <i class="bi bi-info-circle text-info"></i>
                      Lihat Kolom Cadangan (Pilihan) 7
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
            <!-- Modal Tambah Data -->
            <div class="modal fade" id="tambahKolCadPilTujuh" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahKolCadPilTujuhLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tambahKolCadPilTujuhLabel">
                      <i class="bi bi-plus-circle text-success"></i>
                      Tambah Kolom Cadangan (Pilihan) 7
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
            <!-- End Modal Tambah Data -->
            <!-- Modal Ubah Data -->
            <div class="modal fade" id="ubahKolCadPilTujuh" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahKolCadPilTujuhLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="ubahKolCadPilTujuhLabel">
                      <i class="bi bi-pencil-square text-primary"></i>
                      Ubah Kolom Cadangan (Pilihan) 7
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
            <div class="modal fade" id="hapusKolCadPilTujuh" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusKolCadPilTujuhLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="hapusKolCadPilTujuhLabel">
                      <i class="bi bi-trash text-danger"></i>
                      Hapus Kolom Cadangan (Pilihan) 7
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
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection