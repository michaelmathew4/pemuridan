<?php

namespace App\Http\Controllers;

use App\Models\Bidang_keterampilan;
use App\Models\Bidang_ketertarikan;
use App\Models\Sekolah_univ;
use App\Models\Studi_minat;
use App\Models\Tingkat_pendidikan;
use Illuminate\Http\Request;

class StudiMinatController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $tingkatPendidikans = Tingkat_pendidikan::all();
    $noTingkatPendidikans = 1;
    $sekolahUnivs = Sekolah_univ::all();
    $noSekolahUnivs = 1;
    $bidangKetertarikans = Bidang_ketertarikan::all();
    $noBidangKetertarikans = 1;
    $bidangKeterampilans = Bidang_keterampilan::all();
    $noBidangKeterampilans = 1;
    return view('admin.studi-minat', compact(['tingkatPendidikans', 'noTingkatPendidikans', 'sekolahUnivs', 'noSekolahUnivs', 'bidangKetertarikans', 'noBidangKetertarikans', 'bidangKeterampilans', 'noBidangKeterampilans']));
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
    if ($request->sub == 'tp') {
      $request->validate([
        'tingkat_pendidikan'     => 'required'
      ],
      [
        'tingkat_pendidikan.required' => 'Tingkat Pendidikan tidak boleh kosong.'
      ]);
  
      $input = new Tingkat_pendidikan;
      $input->tingkat_pendidikan = $request->tingkat_pendidikan;
      $input->save();
  
      if($input){
        return redirect()->route('studi-minat.index')->with(['success' => 'Tingkat Pendidikan Berhasil Disimpan!']);
      }else{
        return redirect()->route('studi-minat.index')->with(['error' => 'Tingkat Pendidikan Gagal Disimpan!']);
      }
    }

    if ($request->sub == 'su') {
      $request->validate([
        'sekolah_univ'     => 'required'
      ],
      [
        'sekolah_univ.required' => 'Sekolah Univ tidak boleh kosong.'
      ]);
  
      $input = new Sekolah_univ;
      $input->sekolah_univ = $request->sekolah_univ;
      $input->save();
  
      if($input){
        return redirect()->route('studi-minat.index')->with(['success' => 'Sekolah Univ Berhasil Disimpan!']);
      }else{
        return redirect()->route('studi-minat.index')->with(['error' => 'Sekolah Univ Gagal Disimpan!']);
      }
    }
    
    if ($request->sub == 'bk') {
      $request->validate([
        'bidang_ketertarikan'     => 'required'
      ],
      [
        'bidang_ketertarikan.required' => 'Bidang Ketertarikan tidak boleh kosong.'
      ]);
  
      $input = new Bidang_ketertarikan;
      $input->bidang_ketertarikan = $request->bidang_ketertarikan;
      $input->save();
  
      if($input){
        return redirect()->route('studi-minat.index')->with(['success' => 'Bidang Ketertarikan Berhasil Disimpan!']);
      }else{
        return redirect()->route('studi-minat.index')->with(['error' => 'Bidang Ketertarikan Gagal Disimpan!']);
      }
    }
    
    if ($request->sub == 'bkp') {
      $request->validate([
        'bidang_keterampilan'     => 'required'
      ],
      [
        'bidang_keterampilan.required' => 'Bidang Keterampilan tidak boleh kosong.'
      ]);
  
      $input = new Bidang_keterampilan;
      $input->bidang_keterampilan = $request->bidang_keterampilan;
      $input->save();
  
      if($input){
        return redirect()->route('studi-minat.index')->with(['success' => 'Bidang Keterampilan Berhasil Disimpan!']);
      }else{
        return redirect()->route('studi-minat.index')->with(['error' => 'Bidang Keterampilan Gagal Disimpan!']);
      }
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Studi_minat  $studi_minat
   * @return \Illuminate\Http\Response
   */
  public function show(Studi_minat $studi_minat)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Studi_minat  $studi_minat
   * @return \Illuminate\Http\Response
   */
  public function edit(Studi_minat $studi_minat)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Studi_minat  $studi_minat
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    if ($request->subEdit == 'tp') {
      $tingkatPendidikanEdit = Tingkat_pendidikan::findOrFail($id);
      $request->validate([
        'editTingkatPendidikan'     => 'required'
      ],
      [
        'editTingkatPendidikan.required' => 'Tingkat Pendidikan tidak boleh kosong.'
      ]);

      $tingkatPendidikanEdit->update([
        'tingkat_pendidikan'     => $request->editTingkatPendidikan
      ]);

      if($tingkatPendidikanEdit){
        return redirect()->route('studi-minat.index')->with(['success' => 'Tingkat Pendidikan Berhasil Diubah!']);
      }else{
        return redirect()->route('studi-minat.index')->with(['error' => 'Tingkat Pendidikan Gagal Diubah!']);
      }
    }

    if ($request->subEdit == 'su') {
      $sekolahUnivEdit = Sekolah_univ::findOrFail($id);
      $request->validate([
        'editSekolahUniv'     => 'required'
      ],
      [
        'editSekolahUniv.required' => 'Sekolah Univ tidak boleh kosong.'
      ]);

      $sekolahUnivEdit->update([
        'sekolah_univ'     => $request->editSekolahUniv
      ]);

      if($sekolahUnivEdit){
        return redirect()->route('studi-minat.index')->with(['success' => 'Sekolah Univ Berhasil Diubah!']);
      }else{
        return redirect()->route('studi-minat.index')->with(['error' => 'Sekolah Univ Gagal Diubah!']);
      }
    }

    if ($request->subEdit == 'bk') {
      $bidangKetertarikanEdit = Bidang_ketertarikan::findOrFail($id);
      $request->validate([
        'editBidangKetertarikan'     => 'required'
      ],
      [
        'editBidangKetertarikan.required' => 'Bidang Ketertarikan tidak boleh kosong.'
      ]);

      $bidangKetertarikanEdit->update([
        'bidang_ketertarikan'     => $request->editBidangKetertarikan
      ]);

      if($bidangKetertarikanEdit){
        return redirect()->route('studi-minat.index')->with(['success' => 'Bidang Ketertarikan Berhasil Diubah!']);
      }else{
        return redirect()->route('studi-minat.index')->with(['error' => 'Bidang Ketertarikan Gagal Diubah!']);
      }
    }

    if ($request->subEdit == 'bkp') {
      $bidangKeterampilanEdit = Bidang_keterampilan::findOrFail($id);
      $request->validate([
        'editBidangKeterampilan'     => 'required'
      ],
      [
        'editBidangKeterampilan.required' => 'Bidang Keterampilan tidak boleh kosong.'
      ]);

      $bidangKeterampilanEdit->update([
        'bidang_keterampilan'     => $request->editBidangKeterampilan
      ]);

      if($bidangKeterampilanEdit){
        return redirect()->route('studi-minat.index')->with(['success' => 'Bidang Keterampilan Berhasil Diubah!']);
      }else{
        return redirect()->route('studi-minat.index')->with(['error' => 'Bidang Keterampilan Gagal Diubah!']);
      }
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Studi_minat  $studi_minat
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    if (Tingkat_pendidikan::find($id)) {
      $deleteTingkatPendidikan = Tingkat_pendidikan::find($id);
      $deleteTingkatPendidikan->delete();
  
      if($deleteTingkatPendidikan){
        return redirect()->route('studi-minat.index')->with(['success' => 'Tingkat Pendidikan Berhasil Dihapus!']);
      }else{
        return redirect()->route('studi-minat.index')->with(['error' => 'Tingkat Pendidikan Gagal Dihapus!']);
      }
    }

    if (Sekolah_univ::find($id)) {
      $deleteSekolahUniv = Sekolah_univ::find($id);
      $deleteSekolahUniv->delete();
  
      if($deleteSekolahUniv){
        return redirect()->route('studi-minat.index')->with(['success' => 'Sekolah Univ Berhasil Dihapus!']);
      }else{
        return redirect()->route('studi-minat.index')->with(['error' => 'Sekolah Univ Gagal Dihapus!']);
      }
    }

    if (Bidang_ketertarikan::find($id)) {
      $deleteBidangKetertarikan = Bidang_ketertarikan::find($id);
      $deleteBidangKetertarikan->delete();
  
      if($deleteBidangKetertarikan){
        return redirect()->route('studi-minat.index')->with(['success' => 'Bidang Ketertarikan Berhasil Dihapus!']);
      }else{
        return redirect()->route('studi-minat.index')->with(['error' => 'Bidang Ketertarikan Gagal Dihapus!']);
      }
    }

    if (Bidang_keterampilan::find($id)) {
      $deleteBidangKeterampilan = Bidang_keterampilan::find($id);
      $deleteBidangKeterampilan->delete();
  
      if($deleteBidangKeterampilan){
        return redirect()->route('studi-minat.index')->with(['success' => 'Bidang Keterampilan Berhasil Dihapus!']);
      }else{
        return redirect()->route('studi-minat.index')->with(['error' => 'Bidang Keterampilan Gagal Dihapus!']);
      }
    }
  }
}
