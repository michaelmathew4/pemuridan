<?php

namespace App\Http\Controllers;

use Image;
use  File;
use App\Models\Ketua_lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KetuaLokasiController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $lokasis = Ketua_lokasi::all();
    $no = 1;
    return view('admin.data-ketua-lokasi', compact(['lokasis', 'no']));
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
      'namaKL'     => 'required',
      'jkKL'   => 'required',
      'alamatKL'   => 'required',
      'nohpKL'   => 'required|numeric',
      'alamat_surelKL'   => 'required|email|regex:/^.+@.+$/i',
      'nama_penggunaKL'   => 'required',
      'kata_sandiKL'   => 'required',
      'lokasiKL'   => 'required',
      'fotoKL'     => 'image|mimes:png,jpg,jpeg'
    ],
    [
      'namaKL.required' => 'Nama tidak boleh kosong.',
      'jkKL.required' => 'Jenis Kelamin tidak boleh kosong.',
      'alamatKL.required' => 'Alamat tidak boleh kosong.',
      'nohpKL.required' => 'No Hp tidak boleh kosong.',
      'nohpKL.numeric' => 'No Hp harus berupa angka.',
      'alamat_surelKL.required' => 'Alamat Surel tidak boleh kosong.',
      'alamat_surelKL.required' => 'Alamat Surel harus berupa email.',
      'alamat_surelKL.required' => 'Alamat Surel harus menggunakan @.',
      'nama_penggunaKL.required' => 'Nama Pengguna tidak boleh kosong.',
      'kata_sandiKL.required' => 'Kata Sandi tidak boleh kosong.',
      'lokasiKL.required' => 'Kepengurusan tidak boleh kosong.',
      'fotoKL.image' => 'Berkas harus berupa Gambar.'
    ]);

    $fotoKLUpload = '';
    if ($request->hasfile('fotoKL')) {
      $destination = "images/Ketua Lokasi";
      $filename = $request->file('fotoKL');
      $filename->move($destination, $filename->getClientOriginalName());
      $fotoKLUpload = $filename->getClientOriginalName();
    }

    $upload = new Ketua_lokasi;
    $upload->namaKL = $request->namaKL;
    $upload->jkKL = $request->jkKL;
    $upload->alamatKL = $request->alamatKL;
    $upload->nohpKL = $request->nohpKL;
    $upload->alamat_surelKL = $request->alamat_surelKL;
    $upload->nama_penggunaKL = $request->nama_penggunaKL;
    $upload->kata_sandiKL = $request->kata_sandiKL;
    $upload->lokasiKL = $request->lokasiKL;
    $upload->fotoKL = $fotoKLUpload;
    $upload->save();

    if($upload){
      return redirect()->route('data-ketua-lokasi.index')->with(['success' => 'Ketua Lokasi Berhasil Disimpan!']);
    } else{
      return redirect()->route('data-ketua-lokasi.index')->with(['error' => 'Ketua Lokasi Gagal Disimpan!']);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Ketua_lokasi  $ketua_lokasi
   * @return \Illuminate\Http\Response
   */
  public function show(Ketua_lokasi $ketua_lokasi)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Ketua_lokasi  $ketua_lokasi
   * @return \Illuminate\Http\Response
   */
  public function edit(Ketua_lokasi $ketua_lokasi)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Ketua_lokasi  $ketua_lokasi
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $lokasiUpdate = Ketua_lokasi::findOrFail($id);
    if($request->file('editFotoKL') == "") {
      if ($request->editFotoTextKL == '') {
        $lokasiUpdate->update([
          'namaKL'     => $request->editNamaKL,
          'jkKL'   => $request->editJkKL,
          'alamatKL'   => $request->editAlamatKL,
          'nohpKL'   => $request->editNohpKL,
          'alamat_surelKL'   => $request->editAlamat_surelKL,
          'nama_penggunaKL'   => $request->editNama_penggunaKL,
          'kata_sandiKL'   => $request->editKata_sandiKL,
          'lokasiKL'   => $request->editLokasiKL,
          'fotoKL'     => ''
        ]);
      } else {
        $lokasiUpdate->update([
          'namaKL'     => $request->editNamaKL,
          'jkKL'   => $request->editJkKL,
          'alamatKL'   => $request->editAlamatKL,
          'nohpKL'   => $request->editNohpKL,
          'alamat_surelKL'   => $request->editAlamat_surelKL,
          'nama_penggunaKL'   => $request->editNama_penggunaKL,
          'kata_sandiKL'   => $request->editKata_sandiKL,
          'lokasiKL'   => $request->editLokasiKL
        ]);
      }
    } else {
      //hapus old image
      if ($lokasiUpdate->fotoKL != '') {
        $destination = 'images/Ketua Lokasi/'.$lokasiUpdate->fotoKL;
        if (File::exists($destination)) {
          File::delete($destination);
        }
      } else {
        //upload new image
        $destination = "images/Ketua Lokasi";
        $filename = $request->file('editFotoKL');
        $filename->move($destination, $filename->getClientOriginalName());
        $lokasiUpdate->update([
          'namaKL'     => $request->editNamaKL,
          'jkKL'   => $request->editJkKL,
          'alamatKL'   => $request->editAlamatKL,
          'nohpKL'   => $request->editNohpKL,
          'alamat_surelKL'   => $request->editAlamat_surelKL,
          'nama_penggunaKL'   => $request->editNama_penggunaKL,
          'kata_sandiKL'   => $request->editKata_sandiKL,
          'lokasiKL'   => $request->editLokasiKL,
          'fotoKL'     => $filename->getClientOriginalName()
        ]);
      }
    }
    if($lokasiUpdate){
      //redirect dengan pesan sukses
      return redirect()->route('data-ketua-lokasi.index')->with(['success' => 'Ketua Lokasi Berhasil Diubah!']);
    }else{
      //redirect dengan pesan error
      return redirect()->route('data-ketua-lokasi.index')->with(['error' => 'Ketua Lokasi Gagal Diubah!']);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Ketua_lokasi  $ketua_lokasi
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $deleteDataKetuaLokasi = Ketua_lokasi::find($id);
    if ($deleteDataKetuaLokasi->fotoKL != '') {
      $destination = 'images/Ketua Lokasi/'.$deleteDataKetuaLokasi->fotoKL;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    $deleteDataKetuaLokasi->delete();

    if($deleteDataKetuaLokasi){
      return redirect()->route('data-ketua-lokasi.index')->with(['success' => 'Ketua Lokasi Berhasil Dihapus!']);
    }else{
      return redirect()->route('data-ketua-lokasi.index')->with(['error' => 'Ketua Lokasi Gagal Dihapus!']);
    }
  }
}
