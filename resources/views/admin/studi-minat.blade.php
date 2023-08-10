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
    <a class="nav-link" data-bs-target="#data-master" data-bs-toggle="collapse" href="#">
      <i class="bi bi-list"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="data-master" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
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
        <a href="{{route('studi-minat.index')}}" class="active">
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
    <h1>Studi & Minat</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/admin')}}">Admin</a></li>
        <li class="breadcrumb-item active">Data Master</li>
        <li class="breadcrumb-item active">Studi & Minat</li>
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
                <h5 class="card-title card-title-full">Tingkat Pendidikan</h5>
              </div>
              <div class="col-3 text-end">
                <a href="#tambahTngktPendidikan" class="icon-add-data text-success" data-bs-toggle="modal">
                  <i class="bi bi-plus-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Data"></i>
                </a>
              </div>
              <!-- Modal Tambah Data -->
              <div class="modal fade" id="tambahTngktPendidikan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahTngktPendidikanLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="tambahTngktPendidikanLabel">
                        <i class="bi bi-plus-circle text-success"></i>
                        Tambah Tingkat Pendidikan
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('studi-minat.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                        <div class="form-group-input">
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="tingkat_pendidikan" class="col-sm-3 px-1 form-label">Tingkat Pendidikan</label>
                                <div class="col-sm-9">
                                  <input type="text" name="tingkat_pendidikan" class="form-control form-control-sm" id="tingkat_pendidikan" placeholder="Tingkat Pendidikan">
                                  @error('tingkat_pendidikan')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                </div>
                              </div>
                              <input type="text" name="sub" value="tp" hidden>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" name="tingkatPendidikan_submit" class="btn btn-success">Simpan</button>
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
                  <th scope="col">Tingkat Pendidikan</th>
                  <th scope="col">Tanggal Input</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($tingkatPendidikans as $tingkatPendidikan)
                  <tr>
                    <th scope="row">{{$noTingkatPendidikans++}}</th>
                    <td>{{$tingkatPendidikan->tingkat_pendidikan}}</td>
                    <td>{{$tingkatPendidikan->created_at}}</td>
                    <td>
                      <div class="icon-action">
                        <a href="#ubahTngktPendidikan{{$tingkatPendidikan->id}}" data-bs-toggle="modal" class="text-primary">
                          <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                        </a>
                        |
                        <a href="#hapusTngktPendidikan{{$tingkatPendidikan->id}}" data-bs-toggle="modal" class="text-danger">
                          <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Ubah Data -->
                  <div class="modal fade" id="ubahTngktPendidikan{{$tingkatPendidikan->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahTngktPendidikan{{$tingkatPendidikan->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahTngktPendidikan{{$tingkatPendidikan->id}}Label">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Tingkat Pendidikan
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('studi-minat.update', $tingkatPendidikan->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="form-group-input">
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editTingkatPendidikan" class="col-sm-3 px-1 form-label">Tingkat Pendidikan</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editTingkatPendidikan" class="form-control form-control-sm" id="editTingkatPendidikan" placeholder="Judul" value="{{$tingkatPendidikan->tingkat_pendidikan}}">
                                      @error('editTingkatPendidikan')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                    </div>
                                  </div>
                                  <input type="text" name="subEdit" value="tp" hidden>
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
                  <div class="modal fade" id="hapusTngktPendidikan{{$tingkatPendidikan->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusTngktPendidikan{{$tingkatPendidikan->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusTngktPendidikan{{$tingkatPendidikan->id}}Label">
                            <i class="bi bi-trash text-danger"></i>
                            Hapus Tingkat Pendidikan
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('studi-minat.destroy', $tingkatPendidikan->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                            <p>Apa anda yakin ingin menghapus Tingkat Pendidikan {{$tingkatPendidikan->tingkat_pendidikan}} ini?</p>
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
                <h5 class="card-title card-title-full">Sekolah/Univ</h5>
              </div>
              <div class="col-3 text-end">
                <a href="#tambahSekolahUniv" class="icon-add-data text-success" data-bs-toggle="modal">
                  <i class="bi bi-plus-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Data"></i>
                </a>
              </div>
              <!-- Modal Tambah Data -->
              <div class="modal fade" id="tambahSekolahUniv" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahSekolahUnivLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="tambahSekolahUnivLabel">
                        <i class="bi bi-plus-circle text-success"></i>
                        Tambah Sekolah/Univ
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('studi-minat.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                        <div class="form-group-input">
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="sekolah_univ" class="col-sm-3 px-1 form-label">Sekolah / Univ</label>
                                <div class="col-sm-9">
                                  <input type="text" name="sekolah_univ" class="form-control form-control-sm" id="sekolah_univ" placeholder="Sekolah / Univ">
                                  @error('sekolah_univ')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                </div>
                              </div>
                              <input type="text" name="sub" value="su" hidden>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" name="sekolahUniv_submit" class="btn btn-success">Simpan</button>
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
                  <th scope="col">Sekolah / Univ</th>
                  <th scope="col">Tanggal Input</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($sekolahUnivs as $sekolahUniv)
                  <tr>
                    <th scope="row">{{$noSekolahUnivs++}}</th>
                    <td>{{$sekolahUniv->sekolah_univ}}</td>
                    <td>{{$sekolahUniv->created_at}}</td>
                    <td>
                      <div class="icon-action">
                        <a href="#ubahSekolahUniv{{$sekolahUniv->id}}" data-bs-toggle="modal" class="text-primary">
                          <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                        </a>
                        |
                        <a href="#hapusSekolahUniv{{$sekolahUniv->id}}" data-bs-toggle="modal" class="text-danger">
                          <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Ubah Data -->
                  <div class="modal fade" id="ubahSekolahUniv{{$sekolahUniv->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahSekolahUniv{{$sekolahUniv->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahSekolahUniv{{$sekolahUniv->id}}Label">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Sekolah/Univ
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('studi-minat.update', $sekolahUniv->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="form-group-input">
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editSekolahUniv" class="col-sm-3 px-1 form-label">Sekolah / Univ</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editSekolahUniv" class="form-control form-control-sm" id="editSekolahUniv" placeholder="Judul" value="{{$sekolahUniv->sekolah_univ}}">
                                      @error('editSekolahUniv')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                    </div>
                                  </div>
                                  <input type="text" name="subEdit" value="su" hidden>
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
                  <div class="modal fade" id="hapusSekolahUniv{{$sekolahUniv->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusSekolahUniv{{$sekolahUniv->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusSekolahUniv{{$sekolahUniv->id}}Label">
                            <i class="bi bi-trash text-danger"></i>
                            Hapus Sekolah/Univ
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('studi-minat.destroy', $sekolahUniv->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                            <p>Apa anda yakin ingin menghapus Sekolah / Univ {{$sekolahUniv->tingkat_pendidikan}} ini?</p>
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
                <h5 class="card-title card-title-full">Bidang Ketertarikan</h5>
              </div>
              <div class="col-3 text-end">
                <a href="#tambahTarikan" class="icon-add-data text-success" data-bs-toggle="modal">
                  <i class="bi bi-plus-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Data"></i>
                </a>
              </div>
              <!-- Modal Tambah Data -->
              <div class="modal fade" id="tambahTarikan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahTarikanLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="tambahTarikanLabel">
                        <i class="bi bi-plus-circle text-success"></i>
                        Tambah Bidang Ketertarikan
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('studi-minat.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                        <div class="form-group-input">
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="bidang_ketertarikan" class="col-sm-3 px-1 form-label">Bidang Ketertarikan</label>
                                <div class="col-sm-9">
                                  <input type="text" name="bidang_ketertarikan" class="form-control form-control-sm" id="bidang_ketertarikan" placeholder="Bidang Ketertarikan">
                                  @error('bidang_ketertarikan')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                </div>
                              </div>
                              <input type="text" name="sub" value="bk" hidden>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" name="sekolahUniv_submit" class="btn btn-success">Simpan</button>
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
                  <th scope="col">Bidang Ketertarikan</th>
                  <th scope="col">Tanggal Input</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($bidangKetertarikans as $bidangKetertarikan)
                  <tr>
                    <th scope="row">{{$noBidangKetertarikans++}}</th>
                    <td>{{$bidangKetertarikan->bidang_ketertarikan}}</td>
                    <td>{{$bidangKetertarikan->created_at}}</td>
                    <td>
                      <div class="icon-action">
                        <a href="#ubahTarikan{{$bidangKetertarikan->id}}" data-bs-toggle="modal" class="text-primary">
                          <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                        </a>
                        |
                        <a href="#hapusTarikan{{$bidangKetertarikan->id}}" data-bs-toggle="modal" class="text-danger">
                          <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Ubah Data -->
                  <div class="modal fade" id="ubahTarikan{{$bidangKetertarikan->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahTarikan{{$bidangKetertarikan->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahTarikan{{$bidangKetertarikan->id}}Label">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Bidang Ketertarikan
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('studi-minat.update', $bidangKetertarikan->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="form-group-input">
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editBidangKetertarikan" class="col-sm-3 px-1 form-label">Bidang Ketertarikan</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editBidangKetertarikan" class="form-control form-control-sm" id="editBidangKetertarikan" placeholder="Judul" value="{{$bidangKetertarikan->bidang_ketertarikan}}">
                                      @error('editBidangKetertarikan')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                    </div>
                                  </div>
                                  <input type="text" name="subEdit" value="bk" hidden>
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
                  <div class="modal fade" id="hapusTarikan{{$bidangKetertarikan->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusTarikan{{$bidangKetertarikan->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusTarikan{{$bidangKetertarikan->id}}Label">
                            <i class="bi bi-trash text-danger"></i>
                            Hapus Bidang Ketertarikan
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('studi-minat.destroy', $bidangKetertarikan->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                            <p>Apa anda yakin ingin menghapus Bidang Ketertarikan {{$bidangKetertarikan->bidang_ketertarikan}} ini?</p>
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
                <h5 class="card-title card-title-full">Bidang Keterampilan</h5>
              </div>
              <div class="col-3 text-end">
                <a href="#tambahTerampil" class="icon-add-data text-success" data-bs-toggle="modal">
                  <i class="bi bi-plus-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Data"></i>
                </a>
              </div>
              <!-- Modal Tambah Data -->
              <div class="modal fade" id="tambahTerampil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahTerampilLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="tambahTerampilLabel">
                        <i class="bi bi-plus-circle text-success"></i>
                        Tambah Bidang Keterampilan
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('studi-minat.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                        <div class="form-group-input">
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="bidang_keterampilan" class="col-sm-3 px-1 form-label">Bidang Keterampilan</label>
                                <div class="col-sm-9">
                                  <input type="text" name="bidang_keterampilan" class="form-control form-control-sm" id="bidang_keterampilan" placeholder="Bidang Keterampilan">
                                  @error('bidang_keterampilan')
                                    <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                      <p class="p-1 pb-0" style="font-size: 10pt;">
                                        <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        {{ $message }}
                                      </p>
                                    </div>
                                  @enderror
                                </div>
                              </div>
                              <input type="text" name="sub" value="bkp" hidden>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" name="bidangKeterampilan_submit" class="btn btn-success">Simpan</button>
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
                  <th scope="col">Bidang Keterampilan</th>
                  <th scope="col">Tanggal Input</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($bidangKeterampilans as $bidangKeterampilan)
                  <tr>
                    <th scope="row">{{$noBidangKeterampilans++}}</th>
                    <td>{{$bidangKeterampilan->bidang_keterampilan}}</td>
                    <td>{{$bidangKeterampilan->created_at}}</td>
                    <td>
                      <div class="icon-action">
                        <a href="#ubahTerampil{{$bidangKeterampilan->id}}" data-bs-toggle="modal" class="text-primary">
                          <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                        </a>
                        |
                        <a href="#hapusTerampil{{$bidangKeterampilan->id}}" data-bs-toggle="modal" class="text-danger">
                          <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Ubah Data -->
                  <div class="modal fade" id="ubahTerampil{{$bidangKeterampilan->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahTerampil{{$bidangKeterampilan->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahTerampil{{$bidangKeterampilan->id}}Label">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Bidang Keterampilan
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('studi-minat.update', $bidangKetertarikan->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="form-group-input">
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editBidangKeterampilan" class="col-sm-3 px-1 form-label">Bidang Keterampilan</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editBidangKeterampilan" class="form-control form-control-sm" id="editBidangKeterampilan" placeholder="Judul" value="{{$bidangKeterampilan->bidang_keterampilan}}">
                                      @error('editBidangKeterampilan')
                                        <div class="alert alert-danger d-flex align-items-center alert-size mt-2" role="alert">
                                          <p class="" style="font-size: 10pt;">
                                            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            {{ $message }}
                                          </p>
                                        </div>
                                      @enderror
                                    </div>
                                  </div>
                                  <input type="text" name="subEdit" value="bkp" hidden>
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
                  <div class="modal fade" id="hapusTerampil{{$bidangKeterampilan->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusTerampil{{$bidangKeterampilan->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusTerampil{{$bidangKeterampilan->id}}Label">
                            <i class="bi bi-trash text-danger"></i>
                            Hapus Bidang Keterampilan
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('studi-minat.destroy', $bidangKeterampilan->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                            <p>Apa anda yakin ingin menghapus Bidang Keterampilan {{$bidangKeterampilan->bidang_keterampilan}} ini?</p>
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