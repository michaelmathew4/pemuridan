@extends('layout.app')

@section('css')
  <link href="{{asset('assets/css/family-tree.css')}}" rel="stylesheet">
@endsection

@section('nav')
@endsection

@section('menu')
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('berandaDataKKPM')}}">
      <i class="bi bi-house"></i>
      <span>Beranda</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{route('ketua-kelompok.kelompok.index')}}">
      <i class="bi bi-people"></i>
      <span>Kelompok</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('data-kontak.indexDataKKPM')}}">
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
                    <form action="{{route('ketua-kelompok.kelompok.store')}}" method="POST" enctype="multipart/form-data">
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
                                    @foreach ($pesertas as $peserta)
                                      <option value="{{$peserta->id_peserta}}">{{$peserta->nama_peserta}}</option>
                                    @endforeach
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
                <th>Ubah | Hapus</th>
              </thead>
              <tbody>
                @forelse ($nama_kelompoks as $nama_kelompok)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$nama_kelompok->id_kelompok}}</td>
                    <td>
                      <a href="#lihatKelompok{{$nama_kelompok->id_kelompok}}" data-bs-toggle="modal" class="text-info">
                        {{$nama_kelompok->nama_kelompok}} <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Kelompok"></i>
                      </a>
                    </td>
                    <td>{{$nama_kelompok->created_at}}</td>
                    <td>
                      <div class="icon-action">
                        <a href="#ubahKelompok{{$nama_kelompok->id_kelompok}}" id="ubahKelompok" data-user="{{$nama_kelompok->id_kelompok}}" data-bs-toggle="modal" class="text-primary">
                          <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Kelompok"></i>
                        </a>
                        |
                        <a href="#hapusKelompok{{$nama_kelompok->id_kelompok}}" data-bs-toggle="modal" class="text-danger">
                          <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Kelompok"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Lihat Data -->
                  <div class="modal fade" id="lihatKelompok{{$nama_kelompok->id_kelompok}}" tabindex="-1" aria-labelledby="lihatKelompok{{$nama_kelompok->id_kelompok}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-scrollable">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="lihatKelompok{{$nama_kelompok->id_kelompok}}Label">
                            <i class="bi bi-info-circle text-info"></i>
                            Lihat Kelompok
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="border border-1">
                            <div class="bg-light text-center p-3 mb-2">
                              {{auth()->user()->name}}
                              <p>(Ketua Kelompok)</p>
                            </div>
                            <div class="container">
                              <div class="row p-1">
                                @foreach ($kelompoks as $kelompok)
                                  <div class="col-4 border">
                                    <p class="pt-2">{{$noBagan++}}. {{$kelompok->id_peserta}} (G1)</p>
                                    <hr>
                                    <ol>
                                      @if (is_array($pesertaKKs) || is_object($pesertaKKs))
                                        @foreach ($pesertaKKs as $pesertaKK)
                                          @foreach ($pesertaKK as $peserta)
                                            @if ($peserta->id_ketua_kelompok == $kelompok->id_peserta)
                                              <li>{{$peserta->id_peserta}} (G{{($peserta->id_ketua_kelompok == $kelompok->id_peserta) ? $branchLv : $branchLv++}})</li>
                                            @endif
                                          @endforeach
                                        @endforeach
                                      @endif
                                    </ol>
                                  </div>
                                @endforeach
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
                  <div class="modal fade" id="ubahKelompok{{$nama_kelompok->id_kelompok}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahKelompok{{$nama_kelompok->id_kelompok}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahKelompok{{$nama_kelompok->id_kelompok}}Label">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Kelompok
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('ketua-kelompok.kelompok.update', $nama_kelompok->id_kelompok) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="form-group-input">
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="namaKelompokEdit" class="col-sm-3 px-1 form-label">Nama Kelompok</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="namaKelompokEdits" class="form-control form-control-sm" id="namaKelompokEdit" placeholder="Nama Kelompok" value="{{$nama_kelompok->nama_kelompok}}">
                                      @error('namaKelompokEdit')
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
                                    <label for="kontakEdit{{$nama_kelompok->id_kelompok}}" class="col-sm-3 px-1 form-label">Kontak</label>
                                    <div class="col-sm-9">
                                      <select class="form-control" name="kontakEdits[]" style="width: 100%;" id="kontakEdit{{$nama_kelompok->id_kelompok}}" aria-label="multiple select kontakEdit{{$nama_kelompok->id_kelompok}}" multiple>
                                        @foreach ($pesertas as $peser)
                                          <option value="{{$peser->id_peserta}}" {{($pesertaEdits->id_peserta == $peser->id_peserta) ? 'selected' : ''}}>{{$peser->nama_peserta}}</option>
                                        @endforeach
                                      </select>
                                      @error('kontakEdit')
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
                  <div class="modal fade" id="hapusKelompok{{$nama_kelompok->id_kelompok}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusKelompok{{$nama_kelompok->id_kelompok}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusKelompok{{$nama_kelompok->id_kelompok}}Label">
                            <i class="bi bi-trash text-danger"></i>
                            Hapus Data Kontak
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('ketua-kelompok.kelompok.destroy', $nama_kelompok->id_kelompok) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                            <p>Apa anda yakin ingin menghapus Kelompok {{$nama_kelompok->nama_kelompok}} ini?</p>
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
  <script>
    $(document).ready(function() {
      $('#kontak').select2({
        placeholder: "Kontak",
        allowClear: true,
        language: "id",
        dropdownParent: $("#tambahData")
      });
      
    });
    $(document).on('click', '#ubahKelompok', function () {
      var idUser = $(this).attr('data-user');
      $('#kontakEdit'+idUser).select2({
        placeholder: "Kontak",
        allowClear: true,
        language: "id",
        dropdownParent: $("#ubahKelompok"+idUser)
      });
    });
  </script>
@endsection