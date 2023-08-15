@extends('layout.app')

@section('css')
@endsection

@section('nav')
@endsection

@section('menu')
  <li class="nav-item">
    <a class="nav-link " href="{{route('berandaDataLembagaPM')}}">
      <i class="bi bi-house"></i>
      <span>Beranda</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('kelompok.index')}}">
      <i class="bi bi-people"></i>
      <span>Kelompok</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('data-kontak.indexDataLembagaPM')}}">
      <i class="bi bi-people"></i>
      <span>Data Kontak</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{url('/ketua-kelompok/data-laporan')}}">
      <i class="bi bi-bar-chart-line"></i>
      <span>Laporan</span>
    </a>
  </li>
@endsection

@section('main')
  <div class="pagetitle">
    <h1>Beranda</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Ketua Kelompok</a></li>
        <li class="breadcrumb-item active">Beranda</li>
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
                <h5 class="card-title card-title-full"><i class="bi bi-people"></i> Kelompok</h5>
              </div>
              <div class="col-3 text-end">
                <a href="#tambahData" class="icon-add-data text-success" data-bs-toggle="modal">
                  <i class="bi bi-plus-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Data"></i>
                </a>
              </div>
              <!-- Modal Tambah Data -->
              <div class="modal fade" id="tambahData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="tambahDataLabel">
                        <i class="bi bi-plus-circle text-success"></i>
                        Tambah Kelompok
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('kelompok.store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                        <div class="form-group-input">
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="namaKelompok" class="col-sm-3 px-1 form-label">Nama Kelompok</label>
                                <div class="col-sm-9">
                                  <input type="text" name="namaKelompok" class="form-control form-control-sm" id="namaKelompok" placeholder="Nama Kelompok">
                                  @error('namaKelompok')
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
                                <label for="kontak" class="col-sm-3 px-1 form-label">Kontak</label>
                                <div class="col-sm-9">
                                  <select class="form-control" name="kontaks[]" style="width: 100%;" id="kontak" aria-label="multiple select kontak" multiple>
                                    <option>-Kontak-</option>
                                  </select>
                                  @error('kontak')
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
            <table class="table table-responsive">
              <thead>
                <th>No.</th>
                <th>ID Kelompok</th>
                <th>Nama Kelompok</th>
                <th>Tanggal Pembuatan</th>
              </thead>
              <tbody>
                @forelse ($nama_kelompoks as $nama_kelompok)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$nama_kelompok->id_kelompok}}</td>
                    <td>{{$nama_kelompok->nama_kelompok}}</td>
                    <td>{{$nama_kelompok->created_at}}</td>
                  </tr>
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
  <script>
    $(document).ready(function() {
      $('#kontak').select2({
        placeholder: "Kontak",
        allowClear: true,
        language: "id",
        dropdownParent: $("#tambahData")
      });
    });
  </script>
@endsection