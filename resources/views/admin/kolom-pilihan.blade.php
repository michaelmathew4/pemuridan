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
                        <form action="{{ route('kolom-pilihan.update', $kc_pilsatu->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="form-group-input">
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editKc_pilsatu" class="col-sm-3 px-1 form-label">Pilihan 1</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editKc_pilsatu" class="form-control form-control-sm" id="editKc_pilsatu" value="{{$kc_pilsatu->kc_pilsatu}}">
                                      @error('editKc_pilsatu')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                    </div>
                                  </div>
                                  <input type="text" name="subEdit" value="kc_pilsatu" hidden>
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
                        <form action="{{ route('kolom-pilihan.destroy', $kc_pilsatu->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                            <p>Apa anda yakin ingin menghapus Pilihan 1 {{$kc_pilsatu->kc_pilsatu}} ini?</p>
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
                    <form action="{{ route('kolom-pilihan.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                        <div class="form-group-input">
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="kc_pildua" class="col-sm-3 px-1 form-label">Pilihan 2</label>
                                <div class="col-sm-9">
                                  <input type="text" name="kc_pildua" class="form-control form-control-sm" id="kc_pildua" placeholder="Pilihan 2">
                                  @error('kc_pildua')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                </div>
                              </div>
                              <input type="text" name="sub" value="kc_pildua" hidden>
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
                  <th scope="col">Pilihan 2</th>
                  <th scope="col">Tanggal Input</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($kc_pilduas as $kc_pildua)
                  <tr>
                    <th scope="row">{{$noKc_pilduas++}}</th>
                    <td>{{$kc_pildua->kc_pildua}}</td>
                    <td>{{$kc_pildua->created_at}}</td>
                    <td>
                      <div class="icon-action">
                        <a href="#ubahKolCadPilDua{{$kc_pildua->id}}" data-bs-toggle="modal" class="text-primary">
                          <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                        </a>
                        |
                        <a href="#hapusKolCadPilDua{{$kc_pildua->id}}" data-bs-toggle="modal" class="text-danger">
                          <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Ubah Data -->
                  <div class="modal fade" id="ubahKolCadPilDua{{$kc_pildua->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahKolCadPilDua{{$kc_pildua->id}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahKolCadPilDua{{$kc_pildua->id}}Label">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Kolom Cadangan (Pilihan) 2
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('kolom-pilihan.update', $kc_pildua->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="form-group-input">
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editKc_pildua" class="col-sm-3 px-1 form-label">Pilihan 2</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editKc_pildua" class="form-control form-control-sm" id="editKc_pildua" value="{{$kc_pildua->kc_pildua}}">
                                      @error('editKc_pildua')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                    </div>
                                  </div>
                                  <input type="text" name="subEdit" value="kc_pildua" hidden>
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
                  <div class="modal fade" id="hapusKolCadPilDua{{$kc_pildua->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusKolCadPilDua{{$kc_pildua->id}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusKolCadPilDua{{$kc_pildua->id}}Label">
                            <i class="bi bi-trash text-danger"></i>
                            Hapus Kolom Cadangan (Pilihan) 2
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('kolom-pilihan.destroy', $kc_pildua->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                            <p>Apa anda yakin ingin menghapus Pilihan 2 {{$kc_pildua->kc_pildua}} ini?</p>
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
                    <form action="{{ route('kolom-pilihan.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                        <div class="form-group-input">
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="kc_piltiga" class="col-sm-3 px-1 form-label">Pilihan 3</label>
                                <div class="col-sm-9">
                                  <input type="text" name="kc_piltiga" class="form-control form-control-sm" id="kc_piltiga" placeholder="Pilihan 3">
                                  @error('kc_piltiga')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                </div>
                              </div>
                              <input type="text" name="sub" value="kc_piltiga" hidden>
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
                  <th scope="col">Pilihan 3</th>
                  <th scope="col">Tanggal Input</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($kc_piltigas as $kc_piltiga)
                  <tr>
                    <th scope="row">{{$noKc_piltigas++}}</th>
                    <td>{{$kc_piltiga->kc_piltiga}}</td>
                    <td>{{$kc_piltiga->created_at}}</td>
                    <td>
                      <div class="icon-action">
                        <a href="#ubahKolCadPilTiga{{$kc_piltiga->id}}" data-bs-toggle="modal" class="text-primary">
                          <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                        </a>
                        |
                        <a href="#hapusKolCadPilTiga{{$kc_piltiga->id}}" data-bs-toggle="modal" class="text-danger">
                          <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Ubah Data -->
                  <div class="modal fade" id="ubahKolCadPilTiga{{$kc_piltiga->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahKolCadPilTiga{{$kc_piltiga->id}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahKolCadPilTiga{{$kc_piltiga->id}}Label">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Kolom Cadangan (Pilihan) 3
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('kolom-pilihan.update', $kc_piltiga->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="form-group-input">
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editKc_piltiga" class="col-sm-3 px-1 form-label">Pilihan 3</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editKc_piltiga" class="form-control form-control-sm" id="editKc_piltiga" value="{{$kc_piltiga->kc_piltiga}}">
                                      @error('editKc_piltiga')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                    </div>
                                  </div>
                                  <input type="text" name="subEdit" value="kc_piltiga" hidden>
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
                  <div class="modal fade" id="hapusKolCadPilTiga{{$kc_piltiga->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusKolCadPilTiga{{$kc_piltiga->id}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusKolCadPilTiga{{$kc_piltiga->id}}Label">
                            <i class="bi bi-trash text-danger"></i>
                            Hapus Kolom Cadangan (Pilihan) 3
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('kolom-pilihan.destroy', $kc_piltiga->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                            <p>Apa anda yakin ingin menghapus Pilihan 3 {{$kc_piltiga->kc_piltiga}} ini?</p>
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
                    <form action="{{ route('kolom-pilihan.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                        <div class="form-group-input">
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="kc_pilempat" class="col-sm-3 px-1 form-label">Pilihan 4</label>
                                <div class="col-sm-9">
                                  <input type="text" name="kc_pilempat" class="form-control form-control-sm" id="kc_pilempat" placeholder="Pilihan 4">
                                  @error('kc_pilempat')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                </div>
                              </div>
                              <input type="text" name="sub" value="kc_pilempat" hidden>
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
                  <th scope="col">Pilihan 4</th>
                  <th scope="col">Tanggal Input</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($kc_pilempats as $kc_pilempat)
                  <tr>
                    <th scope="row">{{$noKc_pilempats++}}</th>
                    <td>{{$kc_pilempat->kc_pilempat}}</td>
                    <td>{{$kc_pilempat->created_at}}</td>
                    <td>
                      <div class="icon-action">
                        <a href="#ubahKolCadPilEmpat{{$kc_pilempat->id}}" data-bs-toggle="modal" class="text-primary">
                          <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                        </a>
                        |
                        <a href="#hapusKolCadPilEmpat" data-bs-toggle="modal" class="text-danger">
                          <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Ubah Data -->
                  <div class="modal fade" id="ubahKolCadPilEmpat{{$kc_pilempat->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahKolCadPilEmpat{{$kc_pilempat->id}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahKolCadPilEmpat{{$kc_pilempat->id}}Label">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Kolom Cadangan (Pilihan) 4
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('kolom-pilihan.update', $kc_pilempat->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="form-group-input">
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editKc_pilempat" class="col-sm-3 px-1 form-label">Pilihan 4</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editKc_pilempat" class="form-control form-control-sm" id="editKc_pilempat" value="{{$kc_pilempat->kc_pilempat}}">
                                      @error('editKc_pilempat')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                    </div>
                                  </div>
                                  <input type="text" name="subEdit" value="kc_pilempat" hidden>
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
                        <form action="{{ route('kolom-pilihan.destroy', $kc_pilempat->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                            <p>Apa anda yakin ingin menghapus Pilihan 4 {{$kc_pilempat->kc_pilempat}} ini?</p>
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
                    <form action="{{ route('kolom-pilihan.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                        <div class="form-group-input">
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="kc_pillima" class="col-sm-3 px-1 form-label">Pilihan 5</label>
                                <div class="col-sm-9">
                                  <input type="text" name="kc_pillima" class="form-control form-control-sm" id="kc_pillima" placeholder="Pilihan 5">
                                  @error('kc_pillima')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                </div>
                              </div>
                              <input type="text" name="sub" value="kc_pillima" hidden>
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
                  <th scope="col">Pilihan 5</th>
                  <th scope="col">Tanggal Input</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($kc_pillimas as $kc_pillima)
                  <tr>
                    <th scope="row">{{$noKc_pillimas++}}</th>
                    <td>{{$kc_pillima->kc_pillima}}</td>
                    <td>{{$kc_pillima->created_at}}</td>
                    <td>
                      <div class="icon-action">
                        <a href="#ubahKolCadPilLima{{$kc_pillima->id}}" data-bs-toggle="modal" class="text-primary">
                          <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                        </a>
                        |
                        <a href="#hapusKolCadPilLima{{$kc_pillima->id}}" data-bs-toggle="modal" class="text-danger">
                          <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Ubah Data -->
                  <div class="modal fade" id="ubahKolCadPilLima{{$kc_pillima->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahKolCadPilLima{{$kc_pillima->id}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahKolCadPilLima{{$kc_pillima->id}}Label">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Kolom Cadangan (Pilihan) 5
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('kolom-pilihan.update', $kc_pillima->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="form-group-input">
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editKc_pillima" class="col-sm-3 px-1 form-label">Pilihan 5</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editKc_pillima" class="form-control form-control-sm" id="editKc_pillima" value="{{$kc_pillima->kc_pillima}}">
                                      @error('editKc_pillima')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                    </div>
                                  </div>
                                  <input type="text" name="subEdit" value="kc_pillima" hidden>
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
                  <div class="modal fade" id="hapusKolCadPilLima{{$kc_pillima->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusKolCadPilLima{{$kc_pillima->id}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusKolCadPilLima{{$kc_pillima->id}}Label">
                            <i class="bi bi-trash text-danger"></i>
                            Hapus Kolom Cadangan (Pilihan) 5
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('kolom-pilihan.destroy', $kc_pillima->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                            <p>Apa anda yakin ingin menghapus Pilihan 5 {{$kc_pillima->kc_pillima}} ini?</p>
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
                    <form action="{{ route('kolom-pilihan.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                        <div class="form-group-input">
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="kc_pilenam" class="col-sm-3 px-1 form-label">Pilihan 6</label>
                                <div class="col-sm-9">
                                  <input type="text" name="kc_pilenam" class="form-control form-control-sm" id="kc_pilenam" placeholder="Pilihan 6">
                                  @error('kc_pilenam')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                </div>
                              </div>
                              <input type="text" name="sub" value="kc_pilenam" hidden>
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
                  <th scope="col">Pilihan 6</th>
                  <th scope="col">Tanggal Input</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($kc_pilenams as $kc_pilenam)
                  <tr>
                    <th scope="row">{{$noKc_pilenams++}}</th>
                    <td>{{$kc_pilenam->kc_pilenam}}</td>
                    <td>{{$kc_pilenam->created_at}}</td>
                    <td>
                      <div class="icon-action">
                        <a href="#ubahKolCadPilEnam{{$kc_pilenam->id}}" data-bs-toggle="modal" class="text-primary">
                          <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                        </a>
                        |
                        <a href="#hapusKolCadPilEnam{{$kc_pilenam->id}}" data-bs-toggle="modal" class="text-danger">
                          <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Ubah Data -->
                  <div class="modal fade" id="ubahKolCadPilEnam{{$kc_pilenam->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahKolCadPilEnam{{$kc_pilenam->id}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahKolCadPilEnam{{$kc_pilenam->id}}Label">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Kolom Cadangan (Pilihan) 6
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('kolom-pilihan.update', $kc_pilenam->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="form-group-input">
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editKc_pilenam" class="col-sm-3 px-1 form-label">Pilihan 6</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editKc_pilenam" class="form-control form-control-sm" id="editKc_pilenam" value="{{$kc_pilenam->kc_pilenam}}">
                                      @error('editKc_pilenam')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                    </div>
                                  </div>
                                  <input type="text" name="subEdit" value="kc_pilenam" hidden>
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
                  <div class="modal fade" id="hapusKolCadPilEnam{{$kc_pilenam->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusKolCadPilEnam{{$kc_pilenam->id}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusKolCadPilEnam{{$kc_pilenam->id}}Label">
                            <i class="bi bi-trash text-danger"></i>
                            Hapus Kolom Cadangan (Pilihan) 6
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('kolom-pilihan.destroy', $kc_pilenam->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                            <p>Apa anda yakin ingin menghapus Pilihan 6 {{$kc_pilenam->kc_pilenam}} ini?</p>
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
                    <form action="{{ route('kolom-pilihan.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                        <div class="form-group-input">
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="kc_piltujuh" class="col-sm-3 px-1 form-label">Pilihan 7</label>
                                <div class="col-sm-9">
                                  <input type="text" name="kc_piltujuh" class="form-control form-control-sm" id="kc_piltujuh" placeholder="Pilihan 7">
                                  @error('kc_piltujuh')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                </div>
                              </div>
                              <input type="text" name="sub" value="kc_piltujuh" hidden>
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
                  <th scope="col">Pilihan 7</th>
                  <th scope="col">Tanggal Input</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($kc_piltujuhs as $kc_piltujuh)
                  <tr>
                    <th scope="row">{{$noKc_piltujuhs++}}</th>
                    <td>{{$kc_piltujuh->kc_piltujuh}} </td>
                    <td>{{{$kc_piltujuh->created_at}}}</td>
                    <td>
                      <div class="icon-action">
                        <a href="#ubahKolCadPilTujuh{{$kc_piltujuh->id}}" data-bs-toggle="modal" class="text-primary">
                          <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                        </a>
                        |
                        <a href="#hapusKolCadPilTujuh" data-bs-toggle="modal" class="text-danger">
                          <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Ubah Data -->
                  <div class="modal fade" id="ubahKolCadPilTujuh{{$kc_piltujuh->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahKolCadPilTujuh{{$kc_piltujuh->id}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahKolCadPilTujuh{{$kc_piltujuh->id}}Label">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Kolom Cadangan (Pilihan) 7
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('kolom-pilihan.update', $kc_piltujuh->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="form-group-input">
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editKc_piltujuh" class="col-sm-3 px-1 form-label">Pilihan 7</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editKc_piltujuh" class="form-control form-control-sm" id="editKc_piltujuh" value="{{$kc_piltujuh->kc_piltujuh}}">
                                      @error('editKc_piltujuh')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="p-1 pb-0" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                    </div>
                                  </div>
                                  <input type="text" name="subEdit" value="kc_piltujuh" hidden>
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
                        <form action="{{ route('kolom-pilihan.destroy', $kc_piltujuh->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                            <p>Apa anda yakin ingin menghapus Pilihan 7 {{$kc_piltujuh->kc_piltujuh}} ini?</p>
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