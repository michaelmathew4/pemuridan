<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use App\Models\Status_pekerjaan;
use App\Models\Sektor_industri;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $pekerjaans = Pekerjaan::all();
    $noPekerjaans = 1;
    $status_pekerjaans = Status_pekerjaan::all();
    $noStatusPekerjaan = 1;
    $sektor_industries = Sektor_industri::all();
    $noSektorIndustri = 1;
    return view('admin.pekerjaan', compact(['pekerjaans', 'status_pekerjaans', 'sektor_industries', 'noPekerjaans', 'noStatusPekerjaan', 'noSektorIndustri']));
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
    if ($request->sub == 'p') {
      $request->validate([
        'nama_pekerjaanPJ'     => 'required',
        'deskripsi_pekerjaanPJ'   => 'required'
      ],
      [
        'nama_pekerjaanPJ.required' => 'Pekerjaan tidak boleh kosong.',
        'deskripsi_pekerjaanPJ.required' => 'Deskripsi tidak boleh kosong.'
      ]);
  
      $input = new Pekerjaan;
      $input->nama_pekerjaanPJ = $request->nama_pekerjaanPJ;
      $input->deskripsi_pekerjaanPJ = $request->deskripsi_pekerjaanPJ;
      $input->save();
  
      if($input){
        return redirect()->route('pekerjaan.index')->with(['success' => 'Pekerjaan Berhasil Disimpan!']);
      }else{
        return redirect()->route('pekerjaan.index')->with(['error' => 'Pekerjaan Gagal Disimpan!']);
      }
    }

    if ($request->sub == 'sp') {
      $request->validate([
        'status_pekerjaanSPJ'     => 'required',
        'deskripsiSPJ'   => 'required'
      ],
      [
        'status_pekerjaanSPJ.required' => 'Pekerjaan tidak boleh kosong.',
        'deskripsiSPJ.required' => 'Deskripsi tidak boleh kosong.'
      ]);
  
      $input = new Status_pekerjaan;
      $input->status_pekerjaanSPJ = $request->status_pekerjaanSPJ;
      $input->deskripsiSPJ = $request->deskripsiSPJ;
      $input->save();
  
      if($input){
        return redirect()->route('pekerjaan.index')->with(['success' => 'Status Pekerjaan Berhasil Disimpan!']);
      }else{
        return redirect()->route('pekerjaan.index')->with(['error' => 'Status Pekerjaan Gagal Disimpan!']);
      }
    }

    if ($request->sub == 'si') {
      $request->validate([
        'sektor_industriSI'     => 'required',
        'deskripsiSI'   => 'required'
      ],
      [
        'sektor_industriSI.required' => 'Pekerjaan tidak boleh kosong.',
        'deskripsiSI.required' => 'Deskripsi tidak boleh kosong.'
      ]);
  
      $input = new Sektor_industri;
      $input->sektor_industriSI = $request->sektor_industriSI;
      $input->deskripsiSI = $request->deskripsiSI;
      $input->save();
  
      if($input){
        return redirect()->route('pekerjaan.index')->with(['success' => 'Sektor Industri Berhasil Disimpan!']);
      }else{
        return redirect()->route('pekerjaan.index')->with(['error' => 'Sektor Industri Gagal Disimpan!']);
      }
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Pekerjaan  $pekerjaan
   * @return \Illuminate\Http\Response
   */
  public function show(Pekerjaan $pekerjaan)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Pekerjaan  $pekerjaan
   * @return \Illuminate\Http\Response
   */
  public function edit(Pekerjaan $pekerjaan)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Pekerjaan  $pekerjaan
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    if ($request->subEdit == 'p') {
      $pekerjaanEdit = Pekerjaan::findOrFail($id);
      $request->validate([
        'editNamaPekerjaanPJ'     => 'required',
        'editDeskripsiPekerjaanPJ'   => 'required'
      ],
      [
        'editNamaPekerjaanPJ.required' => 'Pekerjaan tidak boleh kosong.',
        'editDeskripsiPekerjaanPJ.required' => 'Deskripsi tidak boleh kosong.'
      ]);

      $pekerjaanEdit->update([
        'nama_pekerjaanPJ'     => $request->editNamaPekerjaanPJ,
        'deskripsi_pekerjaanPJ'   => $request->editDeskripsiPekerjaanPJ
      ]);

      if($pekerjaanEdit){
        return redirect()->route('pekerjaan.index')->with(['success' => 'Pekerjaan Berhasil Diubah!']);
      }else{
        return redirect()->route('pekerjaan.index')->with(['error' => 'Pekerjaan Gagal Diubah!']);
      }
    }

    if ($request->subEdit == 'sp') {
      $statusPekerjaanEdit = Status_pekerjaan::findOrFail($id);
      $request->validate([
        'editStatusPekerjaanSPJ'     => 'required',
        'editDeskripsiSPJ'   => 'required'
      ],
      [
        'editStatusPekerjaanSPJ.required' => 'Status Pekerjaan tidak boleh kosong.',
        'editDeskripsiSPJ.required' => 'Deskripsi tidak boleh kosong.'
      ]);

      $statusPekerjaanEdit->update([
        'status_pekerjaanSPJ'     => $request->editStatusPekerjaanSPJ,
        'deskripsiSPJ'   => $request->editDeskripsiSPJ
      ]);

      if($statusPekerjaanEdit){
        return redirect()->route('pekerjaan.index')->with(['success' => 'Status Pekerjaan Berhasil Diubah!']);
      }else{
        return redirect()->route('pekerjaan.index')->with(['error' => 'Status Pekerjaan Gagal Diubah!']);
      }
    }

    
    if ($request->subEdit == 'si') {
      $sektorIndustriEdit = Sektor_industri::findOrFail($id);
      $request->validate([
        'editSektorIndustriSI'     => 'required',
        'editDeskripsiSI'   => 'required'
      ],
      [
        'editSektorIndustriSI.required' => 'Sektor Industri tidak boleh kosong.',
        'editDeskripsiSI.required' => 'Deskripsi tidak boleh kosong.'
      ]);

      $sektorIndustriEdit->update([
        'sektor_industriSI'     => $request->editSektorIndustriSI,
        'deskripsiSI'   => $request->editDeskripsiSI
      ]);

      if($sektorIndustriEdit){
        return redirect()->route('pekerjaan.index')->with(['success' => 'Sektor Industri Berhasil Diubah!']);
      }else{
        return redirect()->route('pekerjaan.index')->with(['error' => 'Sektor Industri Gagal Diubah!']);
      }
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Pekerjaan  $pekerjaan
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    if (Pekerjaan::find($id)) {
      $deletePekerjaan = Pekerjaan::find($id);
      $deletePekerjaan->delete();
  
  
      if($deletePekerjaan){
        return redirect()->route('pekerjaan.index')->with(['success' => 'Pekerjaan Berhasil Dihapus!']);
      }else{
        return redirect()->route('pekerjaan.index')->with(['error' => 'Pekerjaan Gagal Dihapus!']);
      }
    }

    if (Status_pekerjaan::find($id)) {
      $deleteStatusPekerjaan = Status_pekerjaan::find($id);
      $deleteStatusPekerjaan->delete();
  
  
      if($deleteStatusPekerjaan){
        return redirect()->route('pekerjaan.index')->with(['success' => 'Status Pekerjaan Berhasil Dihapus!']);
      }else{
        return redirect()->route('pekerjaan.index')->with(['error' => 'Status Pekerjaan Gagal Dihapus!']);
      }
    }

    
    if (Sektor_industri::find($id)) {
      $deleteSektorIndustri = Sektor_industri::find($id);
      $deleteSektorIndustri->delete();
  
  
      if($deleteSektorIndustri){
        return redirect()->route('pekerjaan.index')->with(['success' => 'Sektor Industri Berhasil Dihapus!']);
      }else{
        return redirect()->route('pekerjaan.index')->with(['error' => 'Sektor Industri Gagal Dihapus!']);
      }
    }
  }
}
