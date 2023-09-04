<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $wilayahs = Wilayah::all();
    $no = 1;
    return view('admin.data-wilayah', compact(['wilayahs', 'no']));
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
    $request->validate([
      'kode_wilayah'     => 'required',
      'nama_wilayah'   => 'required',
      'provinsi_wilayah'   => 'required',
      'negara_wilayah'   => 'required',
    ],
    [
      'kode_wilayah.required' => 'Kode Wilayah tidak boleh kosong.',
      'nama_wilayah.required' => 'Nama Wilayah tidak boleh kosong.',
      'provinsi_wilayah.required' => 'Provinsi tidak boleh kosong.',
      'negara_wilayah.required' => 'Negara tidak boleh kosong.',
    ]);


    $upload = new Wilayah;
    $upload->kode_wilayah = $request->kode_wilayah;
    $upload->nama_wilayah = $request->nama_wilayah;
    $upload->provinsi_wilayah = $request->provinsi_wilayah;
    $upload->negara_wilayah = $request->negara_wilayah;
    $upload->peta = $request->peta;
    $upload->save();

    if($upload){
      return redirect()->route('data-wilayah.index')->with(['success' => 'Data Wilayah Berhasil Disimpan!']);
    }else{
      return redirect()->route('data-wilayah.index')->with(['error' => 'Data Wilayah Gagal Disimpan!']);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Wilayah  $wilayah
   * @return \Illuminate\Http\Response
   */
  public function show(Wilayah $wilayah)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Wilayah  $wilayah
   * @return \Illuminate\Http\Response
   */
  public function edit(Wilayah $wilayah)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Wilayah  $wilayah
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $wilayahEdit = Wilayah::where('kode_wilayah',$id)->firstOrFail();
    $request->validate([
      'editKode_wilayah'     => 'required',
      'editNama_wilayah'   => 'required',
      'editProvinsi_wilayah'   => 'required',
      'editNegara_wilayah'   => 'required'
    ],
    [
      'editKode_wilayah.required' => 'Kode Wilayah tidak boleh kosong.',
      'editNama_wilayah.required' => 'Nama Wilayah tidak boleh kosong.',
      'editProvinsi_wilayah.required' => 'Provinsi tidak boleh kosong.',
      'editNegara_wilayah.required' => 'Negara tidak boleh kosong.'
    ]);

    $wilayahEdit->update([
      'kode_wilayah'     => $request->editKode_wilayah,
      'nama_wilayah'     => $request->editNama_wilayah,
      'provinsi_wilayah'     => $request->editProvinsi_wilayah,
      'negara_wilayah'     => $request->editNegara_wilayah,
      'peta'     => $request->editPeta
    ]);

    if($wilayahEdit){
      return redirect()->route('data-wilayah.index')->with(['success' => 'Data Wilayah Berhasil Diubah!']);
    }else{
      return redirect()->route('data-wilayah.index')->with(['error' => 'Data Wilayah Gagal Diubah!']);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Wilayah  $wilayah
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $deleteWilayah = Wilayah::where('kode_wilayah',$id)->firstOrFail();
    $deleteWilayah->delete();

    if($deleteWilayah){
      return redirect()->route('data-wilayah.index')->with(['success' => 'Data Wilayah Berhasil Dihapus!']);
    }else{
      return redirect()->route('data-wilayah.index')->with(['error' => 'Data Wilayah Gagal Dihapus!']);
    }
  }
}
