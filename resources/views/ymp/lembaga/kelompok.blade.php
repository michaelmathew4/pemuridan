@extends('layout.app')

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
    <a class="nav-link collapsed" href="{{route('kelompokDataLembagaPM')}}">
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
            <h5 class="card-title card-title-full">Kelompok</h5>
            <hr>
            <table class="table table-responsive">
              <thead>
                <th>No.</th>
                <th>Nama Kontak</th>
                <th>Generasi</th>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection