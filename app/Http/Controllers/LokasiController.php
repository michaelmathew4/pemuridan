<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
    $lokasis = Lokasi::all();
    $no = 1;
    return view('admin.data-lokasi', compact(['lokasis', 'no']));
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
      'kode_lokasi'     => 'required',
      'nama_lokasi'   => 'required',
    ],
    [
      'kode_lokasi.required' => 'Kode Lokasi tidak boleh kosong.',
      'nama_lokasi.required' => 'Nama Lokasi tidak boleh kosong.',
    ]);


    $upload = new Lokasi;
    $upload->kode_lokasi = $request->kode_lokasi;
    $upload->nama_lokasi = $request->nama_lokasi;
    $upload->peta = $request->peta;
    $upload->save();

    if($upload){
      return redirect()->route('data-lokasi.index')->with(['success' => 'Data Lokasi Berhasil Disimpan!']);
    }else{
      return redirect()->route('data-lokasi.index')->with(['error' => 'Data Lokasi Gagal Disimpan!']);
    }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Lokasi  $lokasi
	 * @return \Illuminate\Http\Response
	 */
	public function show(Lokasi $lokasi)
	{
			//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Lokasi  $lokasi
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Lokasi $lokasi)
	{
			//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Lokasi  $lokasi
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
    $lokasiEdit = Lokasi::where('kode_lokasi',$id)->firstOrFail();
    $request->validate([
      'editKode_lokasi'     => 'required',
      'editNama_lokasi'   => 'required',
    ],
    [
      'editKode_lokasi.required' => 'Kode Lokasi tidak boleh kosong.',
      'editNama_lokasi.required' => 'Nama Lokasi tidak boleh kosong.',
    ]);

    $lokasiEdit->update([
      'kode_lokasi'     => $request->editKode_lokasi,
      'nama_lokasi'     => $request->editNama_lokasi,
      'peta'     => $request->editPeta
    ]);

    if($lokasiEdit){
      return redirect()->route('data-lokasi.index')->with(['success' => 'Data Lokasi Berhasil Diubah!']);
    }else{
      return redirect()->route('data-lokasi.index')->with(['error' => 'Data Lokasi Gagal Diubah!']);
    }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Lokasi  $lokasi
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
    $deleteLokasi = Lokasi::where('kode_lokasi',$id)->firstOrFail();
    $deleteLokasi->delete();

    if($deleteLokasi){
      return redirect()->route('data-lokasi.index')->with(['success' => 'Data Lokasi Berhasil Dihapus!']);
    }else{
      return redirect()->route('data-lokasi.index')->with(['error' => 'Data Lokasi Gagal Dihapus!']);
    }
	}
}
