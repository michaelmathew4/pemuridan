<?php

namespace App\Http\Controllers;

use App\Models\Ketua_kelompok;
use App\Models\Pekerjaan;
use App\Models\Sektor_industri;
use App\Models\Status_pekerjaan;
use App\Models\Tingkat_pendidikan;
use App\Models\Sekolah_univ;
use App\Models\Bidang_keterampilan;
use App\Models\Bidang_ketertarikan;
use App\Models\P_mbti;
use App\Models\Pers_holland;
use App\Models\Spirit_gifts;
use App\Models\Abilities;
use Illuminate\Http\Request;

class KetuaKelompokController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $ketuaKelompoks = Ketua_kelompok::all();
    $noKetuaKelompoks = 1;

    //For Input
    $pekerjaans = Pekerjaan::all();
    $statusPekerjaans = Status_pekerjaan::all();
    $sektorIndustris = Sektor_industri::all();
    $tingkatPendidikans = Tingkat_pendidikan::all();
    $sekolahUnivs = Sekolah_univ::all();
    $bidKeterampilans = Bidang_keterampilan::all();
    $bidKetertarikans = Bidang_ketertarikan::all();
    $persMbtis = P_mbti::all();
    $persHollands = Pers_holland::all();
    $spiritualGifts = Spirit_gifts::all();
    $spiritualGifts = Abilities::all();

    return view('admin.data-ketua-kelompok', compact(['ketuaKelompoks', 'noKetuaKelompoks', 'pekerjaans', 'statusPekerjaans', 'sektorIndustris', 'tingkatPendidikans', 'sekolahUnivs',
                                                      'bidKeterampilans', 'bidKetertarikans', 'persMbtis', 'persHollands', 'spiritualGifts']));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Ketua_kelompok  $ketua_kelompok
   * @return \Illuminate\Http\Response
   */
  public function show(Ketua_kelompok $ketua_kelompok)
  {
      //
  } 

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Ketua_kelompok  $ketua_kelompok
   * @return \Illuminate\Http\Response
   */
  public function edit(Ketua_kelompok $ketua_kelompok)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Ketua_kelompok  $ketua_kelompok
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Ketua_kelompok $ketua_kelompok)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Ketua_kelompok  $ketua_kelompok
   * @return \Illuminate\Http\Response
   */
  public function destroy(Ketua_kelompok $ketua_kelompok)
  {
      //
  }
}
