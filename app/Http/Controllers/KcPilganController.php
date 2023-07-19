<?php

namespace App\Http\Controllers;

use App\Models\Abilities;
use App\Models\Ganda_lima;
use App\Models\Kc_pilgan;
use App\Models\Kem_bahasa;
use App\Models\P_mbti;
use App\Models\Penyakit;
use App\Models\Pers_holland;
use App\Models\Spirit_gifts;
use Illuminate\Http\Request;

class KcPilganController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $pMbtis = P_mbti::all();
    $noPMbtis = 1;
    $persHollands = Pers_holland::all();
    $noPersHollands = 1;
    $spiritGifts = Spirit_gifts::all();
    $noSpiritGifts = 1;
    $abilities = Abilities::all();
    $noAbilities = 1;
    $gandaLimas = Ganda_lima::all();
    $noGandaLimas = 1;
    $kemBahasas = Kem_bahasa::all();
    $noKemBahasas = 1;
    $penyakits = Penyakit::all();
    $noPenyakits = 1;
    return view('admin.kolom-pilihan-ganda', compact(['pMbtis', 'noPMbtis', 'persHollands', 'noPersHollands', 'spiritGifts',
                'noSpiritGifts', 'abilities', 'noAbilities', 'gandaLimas', 'noGandaLimas', 'kemBahasas', 'noKemBahasas', 'penyakits', 'noPenyakits']));
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
    if ($request->sub == 'mbti') {
      $request->validate([
        'mbti'     => 'required'
      ],
      [
        'mbti.required' => 'MBTI tidak boleh kosong.'
      ]);
  
      $input = new P_mbti;
      $input->mbti = $request->mbti;
      $input->deskripsiMBTI = $request->deskripsiMBTI;
      $input->save();
  
      if($input){
        return redirect()->route('kolom-pilihan-ganda.index')->with(['success' => 'Personality - MBTI Berhasil Disimpan!']);
      }else{
        return redirect()->route('kolom-pilihan-ganda.index')->with(['error' => 'Personality - MBTI Gagal Disimpan!']);
      }
    }

    if ($request->sub == 'hld') {
      $request->validate([
        'holland'     => 'required'
      ],
      [
        'holland.required' => 'Holland tidak boleh kosong.'
      ]);
  
      $input = new Pers_holland;
      $input->holland = $request->holland;
      $input->deskripsiHLD = $request->deskripsiHLD;
      $input->save();
  
      if($input){
        return redirect()->route('kolom-pilihan-ganda.index')->with(['success' => 'Personality - Holland Berhasil Disimpan!']);
      }else{
        return redirect()->route('kolom-pilihan-ganda.index')->with(['error' => 'Personality - Holland Gagal Disimpan!']);
      }
    }

    if ($request->sub == 'sg') {
      $request->validate([
        'gifts'     => 'required'
      ],
      [
        'gifts.required' => 'Gifts tidak boleh kosong.'
      ]);
  
      $input = new Spirit_gifts;
      $input->gifts = $request->gifts;
      $input->deskripsiGFT = $request->deskripsiGFT;
      $input->save();
  
      if($input){
        return redirect()->route('kolom-pilihan-ganda.index')->with(['success' => 'Spiritual Gifts Berhasil Disimpan!']);
      }else{
        return redirect()->route('kolom-pilihan-ganda.index')->with(['error' => 'Spiritual Gifts Gagal Disimpan!']);
      }
    }

    if ($request->sub == 'ab') {
      $request->validate([
        'abilities'     => 'required'
      ],
      [
        'abilities.required' => 'Abilities tidak boleh kosong.'
      ]);
  
      $input = new Abilities;
      $input->abilities = $request->abilities;
      $input->deskripsiABL = $request->deskripsiABL;
      $input->save();
  
      if($input){
        return redirect()->route('kolom-pilihan-ganda.index')->with(['success' => 'Abilities Berhasil Disimpan!']);
      }else{
        return redirect()->route('kolom-pilihan-ganda.index')->with(['error' => 'Abilities Gagal Disimpan!']);
      }
    }

    if ($request->sub == 'gl') {
      $request->validate([
        'ganda_lima'     => 'required'
      ],
      [
        'ganda_lima.required' => 'Ganda Lima tidak boleh kosong.'
      ]);
  
      $input = new Ganda_lima;
      $input->ganda_lima = $request->ganda_lima;
      $input->deskripsiGL = $request->deskripsiGL;
      $input->save();
  
      if($input){
        return redirect()->route('kolom-pilihan-ganda.index')->with(['success' => 'Ganda Lima Berhasil Disimpan!']);
      }else{
        return redirect()->route('kolom-pilihan-ganda.index')->with(['error' => 'Ganda Lima Gagal Disimpan!']);
      }
    }

    if ($request->sub == 'kb') {
      $request->validate([
        'kem_bahasa'     => 'required'
      ],
      [
        'kem_bahasa.required' => 'Bahasa tidak boleh kosong.'
      ]);
  
      $input = new Kem_bahasa;
      $input->kem_bahasa = $request->kem_bahasa;
      $input->deskripsiKB = $request->deskripsiKB;
      $input->save();
  
      if($input){
        return redirect()->route('kolom-pilihan-ganda.index')->with(['success' => 'Kemampuan Bahasa Berhasil Disimpan!']);
      }else{
        return redirect()->route('kolom-pilihan-ganda.index')->with(['error' => 'Kemampuan Bahasa Gagal Disimpan!']);
      }
    }

    if ($request->sub == 'pk') {
      $request->validate([
        'penyakit'     => 'required'
      ],
      [
        'penyakit.required' => 'Penyakit tidak boleh kosong.'
      ]);
  
      $input = new Penyakit;
      $input->penyakit = $request->penyakit;
      $input->deskripsiPKT = $request->deskripsiPKT;
      $input->save();
  
      if($input){
        return redirect()->route('kolom-pilihan-ganda.index')->with(['success' => 'Penyakit Berhasil Disimpan!']);
      }else{
        return redirect()->route('kolom-pilihan-ganda.index')->with(['error' => 'Penyakit Gagal Disimpan!']);
      }
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Kc_pilgan  $kc_pilgan
   * @return \Illuminate\Http\Response
   */
  public function show(Kc_pilgan $kc_pilgan)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Kc_pilgan  $kc_pilgan
   * @return \Illuminate\Http\Response
   */
  public function edit(Kc_pilgan $kc_pilgan)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Kc_pilgan  $kc_pilgan
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    if ($request->subEdit == 'mbti') {
      $mbtiEdit = P_mbti::findOrFail($id);
      $request->validate([
        'editMbti'     => 'required'
      ],
      [
        'editMbti.required' => 'MBTI tidak boleh kosong.'
      ]);

      $mbtiEdit->update([
        'mbti'     => $request->editMbti,
        'deskripsiMBTI'     => $request->editDeskripsiMBTI
      ]);

      if($mbtiEdit){
        return redirect()->route('kolom-pilihan-ganda.index')->with(['success' => 'Personality - MBTI Berhasil Diubah!']);
      }else{
        return redirect()->route('kolom-pilihan-ganda.index')->with(['error' => 'Personality - MBTI Gagal Diubah!']);
      }
    }

    if ($request->subEdit == 'hld') {
      $hollandEdit = Pers_holland::findOrFail($id);
      $request->validate([
        'editHolland'     => 'required'
      ],
      [
        'editHolland.required' => 'Holland tidak boleh kosong.'
      ]);

      $hollandEdit->update([
        'holland'     => $request->editHolland,
        'deskripsiHLD'     => $request->editDeskripsiHLD
      ]);

      if($hollandEdit){
        return redirect()->route('kolom-pilihan-ganda.index')->with(['success' => 'Personality - Holland Berhasil Diubah!']);
      }else{
        return redirect()->route('kolom-pilihan-ganda.index')->with(['error' => 'Personality - Holland Gagal Diubah!']);
      }
    }

    if ($request->subEdit == 'sg') {
      $giftsEdit = Spirit_gifts::findOrFail($id);
      $request->validate([
        'editGifts'     => 'required'
      ],
      [
        'editGifts.required' => 'Gifts tidak boleh kosong.'
      ]);

      $giftsEdit->update([
        'gifts'     => $request->editGifts,
        'deskripsiGFT'     => $request->editDeskripsiGFT
      ]);

      if($giftsEdit){
        return redirect()->route('kolom-pilihan-ganda.index')->with(['success' => 'Spiritual Gifts Berhasil Diubah!']);
      }else{
        return redirect()->route('kolom-pilihan-ganda.index')->with(['error' => 'Spiritual Gifts Gagal Diubah!']);
      }
    }

    if ($request->subEdit == 'ab') {
      $abilitiesEdit = Abilities::findOrFail($id);
      $request->validate([
        'editAbilities'     => 'required'
      ],
      [
        'editAbilities.required' => 'Abilities tidak boleh kosong.'
      ]);

      $abilitiesEdit->update([
        'abilities'     => $request->editAbilities,
        'deskripsiABL'     => $request->editDeskripsiABL
      ]);

      if($abilitiesEdit){
        return redirect()->route('kolom-pilihan-ganda.index')->with(['success' => 'Abilities Berhasil Diubah!']);
      }else{
        return redirect()->route('kolom-pilihan-ganda.index')->with(['error' => 'Abilities Gagal Diubah!']);
      }
    }

    if ($request->subEdit == 'gl') {
      $gandaLimaEdit = Ganda_lima::findOrFail($id);
      $request->validate([
        'editGandaLima'     => 'required'
      ],
      [
        'editGandaLima.required' => 'Ganda Lima tidak boleh kosong.'
      ]);

      $gandaLimaEdit->update([
        'ganda_lima'     => $request->editGandaLima,
        'deskripsiGL'     => $request->editDeskripsiGL
      ]);

      if($gandaLimaEdit){
        return redirect()->route('kolom-pilihan-ganda.index')->with(['success' => 'Ganda Lima Berhasil Diubah!']);
      }else{
        return redirect()->route('kolom-pilihan-ganda.index')->with(['error' => 'Ganda Lima Gagal Diubah!']);
      }
    }

    if ($request->subEdit == 'kb') {
      $kemBahasaEdit = Kem_bahasa::findOrFail($id);
      $request->validate([
        'editKemBahasa'     => 'required'
      ],
      [
        'editKemBahasa.required' => 'Bahasa tidak boleh kosong.'
      ]);

      $kemBahasaEdit->update([
        'kem_bahasa'     => $request->editKemBahasa,
        'deskripsiKB'     => $request->editDeskripsiKB
      ]);

      if($kemBahasaEdit){
        return redirect()->route('kolom-pilihan-ganda.index')->with(['success' => 'Kemampuan Bahasa Berhasil Diubah!']);
      }else{
        return redirect()->route('kolom-pilihan-ganda.index')->with(['error' => 'Kemampuan Bahasa Gagal Diubah!']);
      }
    }

    if ($request->subEdit == 'pk') {
      $penyakitEdit = Penyakit::findOrFail($id);
      $request->validate([
        'editPenyakit'     => 'required'
      ],
      [
        'editPenyakit.required' => 'Penyakit tidak boleh kosong.'
      ]);

      $penyakitEdit->update([
        'penyakit'     => $request->editPenyakit,
        'deskripsiPKT'     => $request->editDeskripsiPKT
      ]);

      if($penyakitEdit){
        return redirect()->route('kolom-pilihan-ganda.index')->with(['success' => 'Penyakit Berhasil Diubah!']);
      }else{
        return redirect()->route('kolom-pilihan-ganda.index')->with(['error' => 'Penyakit Bahasa Gagal Diubah!']);
      }
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Kc_pilgan  $kc_pilgan
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    if (P_mbti::find($id)) {
      $deleteMbti = P_mbti::find($id);
      $deleteMbti->delete();
  
      if($deleteMbti){
        return redirect()->route('kolom-pilihan-ganda.index')->with(['success' => 'Personality - MBTI Berhasil Dihapus!']);
      }else{
        return redirect()->route('kolom-pilihan-ganda.index')->with(['error' => 'Personality - MBTI Gagal Dihapus!']);
      }
    }

    if (Pers_holland::find($id)) {
      $deleteHolland = Pers_holland::find($id);
      $deleteHolland->delete();
  
      if($deleteHolland){
        return redirect()->route('kolom-pilihan-ganda.index')->with(['success' => 'Personality - Holland Berhasil Dihapus!']);
      }else{
        return redirect()->route('kolom-pilihan-ganda.index')->with(['error' => 'Personality - Holland Gagal Dihapus!']);
      }
    }

    if (Spirit_gifts::find($id)) {
      $deleteGifts = Spirit_gifts::find($id);
      $deleteGifts->delete();
  
      if($deleteGifts){
        return redirect()->route('kolom-pilihan-ganda.index')->with(['success' => 'Spiritual Gifts Berhasil Dihapus!']);
      }else{
        return redirect()->route('kolom-pilihan-ganda.index')->with(['error' => 'Spiritual Gifts Gagal Dihapus!']);
      }
    }

    if (Abilities::find($id)) {
      $deleteAbilities = Abilities::find($id);
      $deleteAbilities->delete();
  
      if($deleteAbilities){
        return redirect()->route('kolom-pilihan-ganda.index')->with(['success' => 'Abilities Berhasil Dihapus!']);
      }else{
        return redirect()->route('kolom-pilihan-ganda.index')->with(['error' => 'Abilities Gagal Dihapus!']);
      }
    }

    if (Ganda_lima::find($id)) {
      $deleteGandaLima = Ganda_lima::find($id);
      $deleteGandaLima->delete();
  
      if($deleteGandaLima){
        return redirect()->route('kolom-pilihan-ganda.index')->with(['success' => 'Ganda Lima Berhasil Dihapus!']);
      }else{
        return redirect()->route('kolom-pilihan-ganda.index')->with(['error' => 'Ganda Lima Gagal Dihapus!']);
      }
    }
  }
}
