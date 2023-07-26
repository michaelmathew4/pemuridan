<?php

namespace App\Http\Controllers;

use App\Models\Kc_pilihan;
use App\Models\Kc_pilsatu;
use App\Models\Kc_pildua;
use App\Models\Kc_piltiga;
use App\Models\Kc_pilempat;
use App\Models\Kc_pillima;
use App\Models\Kc_pilenam;
use App\Models\Kc_piltujuh;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KcPilihanController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $kc_pilsatus = Kc_pilsatu::all();
    $noKc_pilsatus = 1;
    $kc_pilduas = Kc_pildua::all();
    $noKc_pilduas = 1;
    $kc_piltigas = Kc_piltiga::all();
    $noKc_piltigas = 1;
    $kc_pilempats = Kc_pilempat::all();
    $noKc_pilempats = 1;
    $kc_pillimas = Kc_pillima::all();
    $noKc_pillimas = 1;
    $kc_pilenams = Kc_pilenam::all();
    $noKc_pilenams = 1;
    $kc_piltujuhs = Kc_piltujuh::all();
    $noKc_piltujuhs = 1;
    return view('admin.kolom-pilihan', compact(['kc_pilsatus', 'noKc_pilsatus', 'kc_pilduas', 'noKc_pilduas', 'kc_piltigas', 'noKc_piltigas', 'kc_pilempats', 'noKc_pilempats',
                                                'kc_pillimas', 'noKc_pillimas', 'kc_pilenams', 'noKc_pilenams', 'kc_piltujuhs', 'noKc_piltujuhs']));
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
    if ($request->sub == 'kc_pilsatu') {
      $request->validate([
        'kc_pilsatu'     => 'required'
      ],
      [
        'kc_pilsatu.required' => 'Pilihan 1 tidak boleh kosong.'
      ]);
  
      $input = new Kc_pilsatu;
      $input->kc_pilsatu = $request->kc_pilsatu;
      $input->save();
  
      if($input){
        return redirect()->route('kolom-pilihan.index')->with(['success' => 'Pilihan 1 Berhasil Disimpan!']);
      }else{
        return redirect()->route('kolom-pilihan.index')->with(['error' => 'Pilihan 1 Gagal Disimpan!']);
      }
    }

    if ($request->sub == 'kc_pildua') {
      $request->validate([
        'kc_pildua'     => 'required'
      ],
      [
        'kc_pildua.required' => 'Pilihan 2 tidak boleh kosong.'
      ]);
  
      $input = new Kc_pildua;
      $input->kc_pildua = $request->kc_pildua;
      $input->save();
  
      if($input){
        return redirect()->route('kolom-pilihan.index')->with(['success' => 'Pilihan 2 Berhasil Disimpan!']);
      }else{
        return redirect()->route('kolom-pilihan.index')->with(['error' => 'Pilihan 2 Gagal Disimpan!']);
      }
    }

    if ($request->sub == 'kc_piltiga') {
      $request->validate([
        'kc_piltiga'     => 'required'
      ],
      [
        'kc_piltiga.required' => 'Pilihan 3 tidak boleh kosong.'
      ]);
  
      $input = new Kc_piltiga;
      $input->kc_piltiga = $request->kc_piltiga;
      $input->save();
  
      if($input){
        return redirect()->route('kolom-pilihan.index')->with(['success' => 'Pilihan 3 Berhasil Disimpan!']);
      }else{
        return redirect()->route('kolom-pilihan.index')->with(['error' => 'Pilihan 3 Gagal Disimpan!']);
      }
    }

    if ($request->sub == 'kc_pilempat') {
      $request->validate([
        'kc_pilempat'     => 'required'
      ],
      [
        'kc_pilempat.required' => 'Pilihan 4 tidak boleh kosong.'
      ]);
  
      $input = new Kc_pilempat;
      $input->kc_pilempat = $request->kc_pilempat;
      $input->save();
  
      if($input){
        return redirect()->route('kolom-pilihan.index')->with(['success' => 'Pilihan 4 Berhasil Disimpan!']);
      }else{
        return redirect()->route('kolom-pilihan.index')->with(['error' => 'Pilihan 4 Gagal Disimpan!']);
      }
    }

    if ($request->sub == 'kc_pillima') {
      $request->validate([
        'kc_pillima'     => 'required'
      ],
      [
        'kc_pillima.required' => 'Pilihan 5 tidak boleh kosong.'
      ]);
  
      $input = new Kc_pillima;
      $input->kc_pillima = $request->kc_pillima;
      $input->save();
  
      if($input){
        return redirect()->route('kolom-pilihan.index')->with(['success' => 'Pilihan 5 Berhasil Disimpan!']);
      }else{
        return redirect()->route('kolom-pilihan.index')->with(['error' => 'Pilihan 5 Gagal Disimpan!']);
      }
    }

    if ($request->sub == 'kc_pilenam') {
      $request->validate([
        'kc_pilenam'     => 'required'
      ],
      [
        'kc_pilenam.required' => 'Pilihan 6 tidak boleh kosong.'
      ]);
  
      $input = new Kc_pilenam;
      $input->kc_pilenam = $request->kc_pilenam;
      $input->save();
  
      if($input){
        return redirect()->route('kolom-pilihan.index')->with(['success' => 'Pilihan 6 Berhasil Disimpan!']);
      }else{
        return redirect()->route('kolom-pilihan.index')->with(['error' => 'Pilihan 6 Gagal Disimpan!']);
      }
    }

    if ($request->sub == 'kc_piltujuh') {
      $request->validate([
        'kc_piltujuh'     => 'required'
      ],
      [
        'kc_piltujuh.required' => 'Pilihan 7 tidak boleh kosong.'
      ]);
  
      $input = new Kc_piltujuh;
      $input->kc_piltujuh = $request->kc_piltujuh;
      $input->save();
  
      if($input){
        return redirect()->route('kolom-pilihan.index')->with(['success' => 'Pilihan 7 Berhasil Disimpan!']);
      }else{
        return redirect()->route('kolom-pilihan.index')->with(['error' => 'Pilihan 7 Gagal Disimpan!']);
      }
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Kc_pilihan  $kc_pilihan
   * @return \Illuminate\Http\Response
   */
  public function show(Kc_pilihan $kc_pilihan)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Kc_pilihan  $kc_pilihan
   * @return \Illuminate\Http\Response
   */
  public function edit(Kc_pilihan $kc_pilihan)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Kc_pilihan  $kc_pilihan
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    if ($request->subEdit == 'kc_pilsatu') {
      $kcPilSatuEdit = Kc_pilsatu::findOrFail($id);
      $request->validate([
        'editKc_pilsatu'     => 'required'
      ],
      [
        'editKc_pilsatu.required' => 'Pilihan 1 tidak boleh kosong.'
      ]);

      $kcPilSatuEdit->update([
        'kc_pilsatu'     => $request->editKc_pilsatu
      ]);

      if($kcPilSatuEdit){
        return redirect()->route('kolom-pilihan.index')->with(['success' => 'Pilihan 1 Berhasil Diubah!']);
      }else{
        return redirect()->route('kolom-pilihan.index')->with(['error' => 'Pilihan 1 Gagal Diubah!']);
      }
    }

    if ($request->subEdit == 'kc_pildua') {
      $kcPilDuaEdit = Kc_pildua::findOrFail($id);
      $request->validate([
        'editKc_pildua'     => 'required'
      ],
      [
        'editKc_pildua.required' => 'Pilihan 2 tidak boleh kosong.'
      ]);

      $kcPilDuaEdit->update([
        'kc_pildua'     => $request->editKc_pildua
      ]);

      if($kcPilDuaEdit){
        return redirect()->route('kolom-pilihan.index')->with(['success' => 'Pilihan 2 Berhasil Diubah!']);
      }else{
        return redirect()->route('kolom-pilihan.index')->with(['error' => 'Pilihan 2 Gagal Diubah!']);
      }
    }

    if ($request->subEdit == 'kc_piltiga') {
      $kcPiltigaEdit = Kc_piltiga::findOrFail($id);
      $request->validate([
        'editKc_piltiga'     => 'required'
      ],
      [
        'editKc_piltiga.required' => 'Pilihan 3 tidak boleh kosong.'
      ]);

      $kcPiltigaEdit->update([
        'kc_piltiga'     => $request->editKc_piltiga
      ]);

      if($kcPiltigaEdit){
        return redirect()->route('kolom-pilihan.index')->with(['success' => 'Pilihan 3 Berhasil Diubah!']);
      }else{
        return redirect()->route('kolom-pilihan.index')->with(['error' => 'Pilihan 3 Gagal Diubah!']);
      }
    }

    if ($request->subEdit == 'kc_pilempat') {
      $kcPilempatEdit = Kc_pilempat::findOrFail($id);
      $request->validate([
        'editKc_pilempat'     => 'required'
      ],
      [
        'editKc_pilempat.required' => 'Pilihan 4 tidak boleh kosong.'
      ]);

      $kcPilempatEdit->update([
        'kc_pilempat'     => $request->editKc_pilempat
      ]);

      if($kcPilempatEdit){
        return redirect()->route('kolom-pilihan.index')->with(['success' => 'Pilihan 4 Berhasil Diubah!']);
      }else{
        return redirect()->route('kolom-pilihan.index')->with(['error' => 'Pilihan 4 Gagal Diubah!']);
      }
    }

    if ($request->subEdit == 'kc_pillima') {
      $kcPillimaEdit = Kc_pillima::findOrFail($id);
      $request->validate([
        'editKc_pillima'     => 'required'
      ],
      [
        'editKc_pillima.required' => 'Pilihan 5 tidak boleh kosong.'
      ]);

      $kcPillimaEdit->update([
        'kc_pillima'     => $request->editKc_pillima
      ]);

      if($kcPillimaEdit){
        return redirect()->route('kolom-pilihan.index')->with(['success' => 'Pilihan 5 Berhasil Diubah!']);
      }else{
        return redirect()->route('kolom-pilihan.index')->with(['error' => 'Pilihan 5 Gagal Diubah!']);
      }
    }

    if ($request->subEdit == 'kc_pilenam') {
      $kcPilenamEdit = Kc_pilenam::findOrFail($id);
      $request->validate([
        'editKc_pilenam'     => 'required'
      ],
      [
        'editKc_pilenam.required' => 'Pilihan 6 tidak boleh kosong.'
      ]);

      $kcPilenamEdit->update([
        'kc_pilenam'     => $request->editKc_pilenam
      ]);

      if($kcPilenamEdit){
        return redirect()->route('kolom-pilihan.index')->with(['success' => 'Pilihan 6 Berhasil Diubah!']);
      }else{
        return redirect()->route('kolom-pilihan.index')->with(['error' => 'Pilihan 6 Gagal Diubah!']);
      }
    }

    if ($request->subEdit == 'kc_piltujuh') {
      $kcPiltujuhEdit = Kc_piltujuh::findOrFail($id);
      $request->validate([
        'editKc_piltujuh'     => 'required'
      ],
      [
        'editKc_piltujuh.required' => 'Pilihan 7 tidak boleh kosong.'
      ]);

      $kcPiltujuhEdit->update([
        'kc_piltujuh'     => $request->editKc_piltujuh
      ]);

      if($kcPiltujuhEdit){
        return redirect()->route('kolom-pilihan.index')->with(['success' => 'Pilihan 7 Berhasil Diubah!']);
      }else{
        return redirect()->route('kolom-pilihan.index')->with(['error' => 'Pilihan 7 Gagal Diubah!']);
      }
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Kc_pilihan  $kc_pilihan
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    if (Kc_pilsatu::find($id)) {
      $deleteKcPilSatu = Kc_pilsatu::find($id);
      $deleteKcPilSatu->delete();
  
      if($deleteKcPilSatu){
        return redirect()->route('kolom-pilihan.index')->with(['success' => 'Pilihan 1 Berhasil Dihapus!']);
      }else{
        return redirect()->route('kolom-pilihan.index')->with(['error' => 'Pilihan 1 Gagal Dihapus!']);
      }
    }

    if (Kc_pildua::find($id)) {
      $deletekcPilDua = Kc_pildua::find($id);
      $deletekcPilDua->delete();
  
      if($deletekcPilDua){
        return redirect()->route('kolom-pilihan.index')->with(['success' => 'Pilihan 2 Berhasil Dihapus!']);
      }else{
        return redirect()->route('kolom-pilihan.index')->with(['error' => 'Pilihan 2 Gagal Dihapus!']);
      }
    }

    if (Kc_piltiga::find($id)) {
      $deletekcPilTiga = Kc_piltiga::find($id);
      $deletekcPilTiga->delete();
  
      if($deletekcPilTiga){
        return redirect()->route('kolom-pilihan.index')->with(['success' => 'Pilihan 3 Berhasil Dihapus!']);
      }else{
        return redirect()->route('kolom-pilihan.index')->with(['error' => 'Pilihan 3 Gagal Dihapus!']);
      }
    }

    if (Kc_pilempat::find($id)) {
      $deletekcPilEmpat = Kc_pilempat::find($id);
      $deletekcPilEmpat->delete();
  
      if($deletekcPilEmpat){
        return redirect()->route('kolom-pilihan.index')->with(['success' => 'Pilihan 4 Berhasil Dihapus!']);
      }else{
        return redirect()->route('kolom-pilihan.index')->with(['error' => 'Pilihan 4 Gagal Dihapus!']);
      }
    }

    if (Kc_pillima::find($id)) {
      $deletekcPilLima = Kc_pillima::find($id);
      $deletekcPilLima->delete();
  
      if($deletekcPilLima){
        return redirect()->route('kolom-pilihan.index')->with(['success' => 'Pilihan 5 Berhasil Dihapus!']);
      }else{
        return redirect()->route('kolom-pilihan.index')->with(['error' => 'Pilihan 5 Gagal Dihapus!']);
      }
    }

    if (Kc_pilenam::find($id)) {
      $deletekcPilEnam = Kc_pilenam::find($id);
      $deletekcPilEnam->delete();
  
      if($deletekcPilEnam){
        return redirect()->route('kolom-pilihan.index')->with(['success' => 'Pilihan 6 Berhasil Dihapus!']);
      }else{
        return redirect()->route('kolom-pilihan.index')->with(['error' => 'Pilihan 6 Gagal Dihapus!']);
      }
    }

    if (Kc_piltujuh::find($id)) {
      $deletekcPilTujuh = Kc_piltujuh::find($id);
      $deletekcPilTujuh->delete();
  
      if($deletekcPilTujuh){
        return redirect()->route('kolom-pilihan.index')->with(['success' => 'Pilihan 7 Berhasil Dihapus!']);
      }else{
        return redirect()->route('kolom-pilihan.index')->with(['error' => 'Pilihan 7 Gagal Dihapus!']);
      }
    }
  }
}
