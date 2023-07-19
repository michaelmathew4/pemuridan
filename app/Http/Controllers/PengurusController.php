<?php

namespace App\Http\Controllers;

use Image;
use  File;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengurusController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $penguruses = Pengurus::all();
    $no = 1;
    return view('admin.data-pengurus', compact(['penguruses', 'no']));
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
      'namaPRS'     => 'required',
      'jkPRS'   => 'required',
      'alamatPRS'   => 'required',
      'nohpPRS'   => 'required|numeric',
      'alamat_surelPRS'   => 'required|email|regex:/^.+@.+$/i',
      'nama_penggunaPRS'   => 'required',
      'kata_sandiPRS'   => 'required',
      'kepengurusanPRS'   => 'required',
      'fotoPRS'     => 'image|mimes:png,jpg,jpeg'
    ],
    [
      'namaPRS.required' => 'Nama tidak boleh kosong.',
      'jkPRS.required' => 'Jenis Kelamin tidak boleh kosong.',
      'alamatPRS.required' => 'Alamat tidak boleh kosong.',
      'nohpPRS.required' => 'No Hp tidak boleh kosong.',
      'nohpPRS.numeric' => 'No Hp harus berupa angka.',
      'alamat_surelPRS.required' => 'Alamat Surel tidak boleh kosong.',
      'alamat_surelPRS.required' => 'Alamat Surel harus berupa email.',
      'alamat_surelPRS.required' => 'Alamat Surel harus menggunakan @.',
      'nama_penggunaPRS.required' => 'Nama Pengguna tidak boleh kosong.',
      'kata_sandiPRS.required' => 'Kata Sandi tidak boleh kosong.',
      'kepengurusanPRS.required' => 'Kepengurusan tidak boleh kosong.',
      'fotoPRS.image' => 'Berkas harus berupa Gambar.'
    ]);

    $fotoPRSUpload = '';
    if ($request->hasfile('fotoPRS')) {
      $destination = "images/Pengurus";
      $filename = $request->file('fotoPRS');
      $filename->move($destination, $filename->getClientOriginalName());
      $fotoPRSUpload = $filename->getClientOriginalName();
    }

    $upload = new Pengurus;
    $upload->namaPRS = $request->namaPRS;
    $upload->jkPRS = $request->jkPRS;
    $upload->alamatPRS = $request->alamatPRS;
    $upload->nohpPRS = $request->nohpPRS;
    $upload->alamat_surelPRS = $request->alamat_surelPRS;
    $upload->nama_penggunaPRS = $request->nama_penggunaPRS;
    $upload->kata_sandiPRS = $request->kata_sandiPRS;
    $upload->kepengurusanPRS = $request->kepengurusanPRS;
    $upload->fotoPRS = $fotoPRSUpload;
    $upload->save();

    if($upload){
      return redirect()->route('data-pengurus.index')->with(['success' => 'Pengurus Berhasil Disimpan!']);
    } else{
      return redirect()->route('data-pengurus.index')->with(['error' => 'Pengurus Gagal Disimpan!']);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Pengurus  $pengurus
   * @return \Illuminate\Http\Response
   */
  public function show(Pengurus $pengurus)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Pengurus  $pengurus
   * @return \Illuminate\Http\Response
   */
  public function edit(Pengurus $pengurus)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Pengurus  $pengurus
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $pengurusUpdate = Pengurus::findOrFail($id);
    if($request->file('editFotoPRS') == "") {
      if ($request->editFotoTextPRS == '') {
        $pengurusUpdate->update([
          'namaPRS'     => $request->editNamaPRS,
          'jkPRS'   => $request->editJkPRS,
          'alamatPRS'   => $request->editAlamatPRS,
          'nohpPRS'   => $request->editNohpPRS,
          'alamat_surelPRS'   => $request->editAlamat_surelPRS,
          'nama_penggunaPRS'   => $request->editNama_penggunaPRS,
          'kata_sandiPRS'   => $request->editKata_sandiPRS,
          'kepengurusanPRS'   => $request->editKepengurusanPRS,
          'fotoPRS'     => ''
        ]);
      } else {
        $pengurusUpdate->update([
          'namaPRS'     => $request->editNamaPRS,
          'jkPRS'   => $request->editJkPRS,
          'alamatPRS'   => $request->editAlamatPRS,
          'nohpPRS'   => $request->editNohpPRS,
          'alamat_surelPRS'   => $request->editAlamat_surelPRS,
          'nama_penggunaPRS'   => $request->editNama_penggunaPRS,
          'kata_sandiPRS'   => $request->editKata_sandiPRS,
          'kepengurusanPRS'   => $request->editKepengurusanPRS
        ]);
      }
    } else {
      //hapus old image
      if ($pengurusUpdate->fotoPRS != '') {
        $destination = 'images/Pengurus/'.$pengurusUpdate->fotoPRS;
        if (File::exists($destination)) {
          File::delete($destination);
        }
      } else {
        //upload new image
        $destination = "images/Pengurus";
        $filename = $request->file('editFotoPRS');
        $filename->move($destination, $filename->getClientOriginalName());
        $pengurusUpdate->update([
          'namaPRS'     => $request->editNamaPRS,
          'jkPRS'   => $request->editJkPRS,
          'alamatPRS'   => $request->editAlamatPRS,
          'nohpPRS'   => $request->editNohpPRS,
          'alamat_surelPRS'   => $request->editAlamat_surelPRS,
          'nama_penggunaPRS'   => $request->editNama_penggunaPRS,
          'kata_sandiPRS'   => $request->editKata_sandiPRS,
          'kepengurusanPRS'   => $request->editKepengurusanPRS,
          'fotoPRS'     => $filename->getClientOriginalName()
        ]);
      }
    }
    if($pengurusUpdate){
      //redirect dengan pesan sukses
      return redirect()->route('data-pengurus.index')->with(['success' => 'Pengurus Berhasil Diubah!']);
    }else{
      //redirect dengan pesan error
      return redirect()->route('data-pengurus.index')->with(['error' => 'Pengurus Gagal Diubah!']);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Pengurus  $pengurus
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $deleteDataPengurus = Pengurus::find($id);
    if ($deleteDataPengurus->fotoPRS != '') {
      $destination = 'images/Pengurus/'.$deleteDataPengurus->fotoPRS;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    $deleteDataPengurus->delete();

    if($deleteDataPengurus){
      return redirect()->route('data-pengurus.index')->with(['success' => 'Pengurus Berhasil Dihapus!']);
    }else{
      return redirect()->route('data-pengurus.index')->with(['error' => 'Pengurus Gagal Dihapus!']);
    }
  }
}
