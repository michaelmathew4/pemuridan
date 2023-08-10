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
        <a href="{{route('video.index')}}" class="active">
          <i class="bi bi-play"></i><span>Video Youtube</span>
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
    <h1>Video Youtube</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/admin')}}">Admin</a></li>
        <li class="breadcrumb-item active">Video Youtube</li>
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
                <h5 class="card-title card-title-full">Video Youtube</h5>
              </div>
              <div class="col-3 text-end">
                <a href="#tambahDataVY" class="icon-add-data text-success" data-bs-toggle="modal">
                  <i class="bi bi-plus-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Data"></i>
                </a>
              </div>
              <!-- Modal Tambah Data -->
              <div class="modal fade" id="tambahDataVY" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahDataVYLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="tambahDataVYLabel">
                        <i class="bi bi-plus-circle text-success"></i>
                        Tambah Video Youtube
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                        <div class="form-group-input">
                          <div class="input-center ps-5">
                            <div class="w-75">
                              <div class="mb-3 row">
                                <label for="judulVY" class="col-sm-3 px-1 form-label">Judul</label>
                                <div class="col-sm-9">
                                  <input type="text" name="judulVY" class="form-control form-control-sm" id="judulVY" placeholder="Judul">
                                  @error('judulVY')
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
                                <label for="deskripsiVY" class="col-sm-3 px-1 form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                  <textarea class="form-control form-control-sm" name="deskripsiVY" id="deskripsiVY" rows="3" placeholder="Deskripsi"></textarea>
                                  @error('deskripsiVY')
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
                                <label for="linkVY" class="col-sm-3 px-1 form-label">Kode Video Youtube</label>
                                <div class="col-sm-9">
                                  <input type="text" name="linkVY" class="form-control form-control-sm" id="linkVY" placeholder="Kode Video Youtube">
                                  @error('linkVY')
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
                                <label for="gambarVY" class="col-sm-3 px-1 form-label">Gambar</label>
                                <div class="col-3">
                                  <img src="{{asset('images/no-image.png')}}" class="img-fluid" alt="" id="output" width="200">
                                </div>
                                <div class="col-6">
                                  <input type="file" name="gambarVY" class="form-control form-control-sm" id="gambarVY" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                  <div class="alert alert-info mt-1 text-start alert-size" role="alert">
                                    <div class="row p-0">
                                      <div class="col-1 text-center">
                                        <svg class="bi flex-shrink-0 me-2 mx-auto" width="15" height="15" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                                      </div>
                                      <div class="col-10">
                                        <p class="pt-1 text-wrap" style="font-size: 10pt;">
                                          Upload Gambar jika diperlukan. Dikarenakan Gambar akan otomatis menampilkan Thumbnail Video Youtube.
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                  @error('gambarVY')
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
                  <th scope="col">Judul</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Kode Video Youtube</th>
                  <th scope="col">Tanggal Input</th>
                  <th scope="col">Ubah | Hapus</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($videoYoutubes as $videoYoutube)
                  <tr>
                    <th scope="row">{{$no++}}</th>
                    <td>
                      <a href="#lihatData{{$videoYoutube->id}}" data-bs-toggle="modal" class="text-info">
                        {{$videoYoutube->judulVY}} <i class="bi bi-info-circle align-top info-detail" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Data"></i>
                      </a>
                    </td>
                    <td>{{$videoYoutube->deskripsiVY}}</td>
                    <td><a href="http://youtube.com/watch?v={{$videoYoutube->linkVY}}" target="_blank" rel="noopener noreferrer"><i class="bi bi-youtube text-dark"></i> {{$videoYoutube->linkVY}}</a></td>
                    <td>{{$videoYoutube->created_at->isoFormat('D-MM-Y, H:m:s')}}</td>
                    <td>
                      <div class="icon-action">
                        <a href="#ubahData{{$videoYoutube->id}}" data-bs-toggle="modal" class="text-primary">
                          <i class="bi bi-pencil-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Data"></i>
                        </a>
                        |
                        <a href="#hapusData{{$videoYoutube->id}}" data-bs-toggle="modal" class="text-danger">
                          <i class="bi bi-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal Lihat Data -->
                  <div class="modal fade" id="lihatData{{$videoYoutube->id}}"tabindex="-1" aria-labelledby="lihatData{{$videoYoutube->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="lihatData{{$videoYoutube->id}}Label">
                            <i class="bi bi-info-circle text-info"></i>
                            Lihat Video Youtube
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div>
                            <img class="img-fluid img-thumbnail mx-auto d-block" src="{{$videoYoutube->gambarVY != '' ?  asset('images/Video Youtube/').'/'.$videoYoutube->gambarVY : 'https://img.youtube.com/vi/'.$videoYoutube->linkVY.'/0.jpg'}}">
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
                                  <p class="text-start">{{$videoYoutube->judulVY}}</p>
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
                                <p class="text-start">{{$videoYoutube->deskripsiVY}}</p>
                                </div>
                              </div>
                              <div class="row mx-auto">
                                <div class="col-4">
                                  <p class="">Link Youtube</p> 
                                </div>
                                <div class="col-1">
                                  <p class="text-center">:</p> 
                                </div>
                                <div class="col-4">
                                <p class="text-start"><a href="http://youtube.com/watch?v={{$videoYoutube->linkVY}}" target="_blank" rel="noopener noreferrer"><i class="bi bi-youtube text-dark"></i> http://youtube.com/watch?v={{$videoYoutube->linkVY}}</a></p>
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
                  <div class="modal fade" id="ubahData{{$videoYoutube->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahData{{$videoYoutube->id}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ubahData{{$videoYoutube->id}}Label">
                            <i class="bi bi-pencil-square text-primary"></i>
                            Ubah Video Youtube
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('video.update', $videoYoutube->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="form-group-input">
                              <div class="input-center ps-5">
                                <div class="w-75">
                                  <div class="mb-3 row">
                                    <label for="editJudulVY" class="col-sm-3 px-1 form-label">Judul</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editJudulVY" class="form-control form-control-sm" id="editJudulVY" value="{{$videoYoutube->judulVY}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editDeskripsiVY" class="col-sm-3 px-1 form-label">Deskripsi</label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control form-control-sm" name="editDeskripsiVY" id="editDeskripsiVY" rows="3">{{$videoYoutube->deskripsiVY}}</textarea>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editLinkVY" class="col-sm-3 px-1 form-label">Kode Video Youtube</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="editLinkVY" class="form-control form-control-sm" id="editLinkVY" value="{{$videoYoutube->linkVY}}">
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="editGambarVY" class="col-sm-3 px-1 form-label">Gambar</label>
                                    <div class="col-3">
                                      <div class="position-relative wrapping-img-icon">
                                        <div class="display-hover">
                                          @if ($videoYoutube->gambarVY != '')
                                          <button type="button" class="btn btn-outline-danger position-absolute end-0" onchange="" onclick="document.getElementById('outputEdit{{$videoYoutube->id}}').src = document.getElementById('noImage{{$videoYoutube->id}}').src;
                                            document.getElementById('editGambarTextVY{{$videoYoutube->id}}').value = '';" data-user="{{$videoYoutube->id}}" id="buttonChange" data-bs-toggle="tooltip" data-bs-html="true" title="Hapus Gambar">
                                            <i class="bi bi-trash"></i>
                                          </button>
                                          @endif
                                        </div>
                                        <img src="{{asset('images/no-image.png')}}" width="100" alt="" id="noImage{{$videoYoutube->id}}" class="d-none">
                                        <img src="{{$videoYoutube->gambarVY != '' ?  asset('images/Video Youtube').'/'.$videoYoutube->gambarVY : asset('images/no-image.png')}}" class="img-fluid" alt="" data-user="{{$videoYoutube->id}}" id="outputEdit{{$videoYoutube->id}}" width="200">
                                        <!-- @if ($videoYoutube->gambarVY != '')
                                          <button type="button" class="btn btn-danger mt-1 btn-sm w-100" 
                                            onchange="" onclick="document.getElementById('outputEdit{{$videoYoutube->id}}').src = document.getElementById('noImage{{$videoYoutube->id}}').src;
                                            document.getElementById('editGambarTextVY{{$videoYoutube->id}}').value = '';" data-user="{{$videoYoutube->id}}" id="buttonChange"><i class="bi bi-trash"></i> Hapus</button>
                                        @endif -->
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <input type="file" name="editGambarVY" class="form-control form-control-sm" id="editGambarVY" 
                                        onchange="document.getElementById('outputEdit{{$videoYoutube->id}}').src = window.URL.createObjectURL(this.files[0]);
                                        document.getElementById('editGambarTextVY{{$videoYoutube->id}}').value = this.files[0].name;" value="{{$videoYoutube->gambarVY}}" data-user="{{$videoYoutube->id}}">
                                      <input type="text" name="editGambarTextVY" id="editGambarTextVY{{$videoYoutube->id}}" value="{{$videoYoutube->gambarVY}}" hidden>
                                      <div class="alert alert-info mt-1 text-start alert-size" role="alert">
                                        <div class="row p-0">
                                          <div class="col-1 text-center">
                                            <svg class="bi flex-shrink-0 me-2 mx-auto" width="15" height="15" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                                          </div>
                                          <div class="col-10">
                                            <p class="pt-1 text-wrap" style="font-size: 10pt;">
                                              Upload Gambar jika diperlukan. Dikarenakan Gambar akan otomatis menampilkan Thumbnail Video Youtube.
                                            </p>
                                          </div>
                                        </div>
                                      </div>
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
                  <div class="modal fade" id="hapusData{{$videoYoutube->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusData{{$videoYoutube->id}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="hapusData{{$videoYoutube->id}}Label">
                            <i class="bi bi-trash text-danger"></i>
                            Hapus Video Youtube
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('video.destroy', $videoYoutube->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                            <p>Apa anda yakin ingin menghapus Video Youtube {{$videoYoutube->judulVY}} ini?</p>
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