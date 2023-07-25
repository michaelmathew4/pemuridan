<?php

namespace App\Http\Controllers;

use App\Models\Kc_pilihan;
use App\Models\Kc_pilsatu;
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
    return view('admin.kolom-pilihan', compact(['kc_pilsatus', 'noKc_pilsatus']));
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
        'kc_pilsatu.required' => 'Pilihan Satu tidak boleh kosong.'
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
  public function update(Request $request, Kc_pilihan $kc_pilihan)
  {
    if ($request->subEdit == 'kc_pilsatu') {
      $kcPilSatuEdit = Kc_pilsatu::findOrFail($id);
      $request->validate([
        'editKc_pilsatu'     => 'required'
      ],
      [
        'editKc_pilsatu.required' => 'Pilihan Satu tidak boleh kosong.'
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
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Kc_pilihan  $kc_pilihan
   * @return \Illuminate\Http\Response
   */
  public function destroy(Kc_pilihan $kc_pilihan)
  {
    if (Kc_pilsatu::find($id)) {
      $deletekcPilSatu = Kc_pilsatu::find($id);
      $deletekcPilSatu->delete();
  
      if($deletekcPilSatu){
        return redirect()->route('kolom-pilihan.index')->with(['success' => 'Pilihan 1 MBTI Berhasil Dihapus!']);
      }else{
        return redirect()->route('kolom-pilihan.index')->with(['error' => 'Pilihan 1 MBTI Gagal Dihapus!']);
      }
    }
  }
}
