<?php

namespace App\Http\Controllers;

use Image;
use  File;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $dataAdmins = Admin::all();
    $no = 1;
    return view('admin.data-admin', compact(['dataAdmins', 'no']));
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
      'namaADM'     => 'required',
      'jkADM'   => 'required',
      'alamatADM'   => 'required',
      'nohpADM'   => 'required|numeric',
      'alamat_surelADM'   => 'required|email|regex:/^.+@.+$/i',
      'nama_penggunaADM'   => 'required',
      'kata_sandiADM'   => 'required',
      'tingkatADM'   => 'required',
      'fotoADM'     => 'image|mimes:png,jpg,jpeg'
    ],
    [
      'namaADM.required' => 'Nama tidak boleh kosong.',
      'jkADM.required' => 'Jenis Kelamin tidak boleh kosong.',
      'alamatADM.required' => 'Alamat tidak boleh kosong.',
      'nohpADM.required' => 'No Hp tidak boleh kosong.',
      'nohpADM.numeric' => 'No Hp harus berupa angka.',
      'alamat_surelADM.required' => 'Alamat Surel tidak boleh kosong.',
      'alamat_surelADM.required' => 'Alamat Surel harus berupa email.',
      'alamat_surelADM.required' => 'Alamat Surel harus menggunakan @.',
      'nama_penggunaADM.required' => 'Nama Pengguna tidak boleh kosong.',
      'kata_sandiADM.required' => 'Kata Sandi tidak boleh kosong.',
      'tingkatADM.required' => 'Tingkat tidak boleh kosong.',
      'fotoADM.image' => 'Berkas harus berupa Gambar.'
    ]);

    $fotoADMUpload = '';
    if ($request->hasfile('fotoADM')) {
      $destination = "images/Admin";
      $filename = $request->file('fotoADM');
      $filename->move($destination, $filename->getClientOriginalName());
      $fotoADMUpload = $filename->getClientOriginalName();
    }

    $upload = new Admin;
    $upload->namaADM = $request->namaADM;
    $upload->jkADM = $request->jkADM;
    $upload->alamatADM = $request->alamatADM;
    $upload->nohpADM = $request->nohpADM;
    $upload->alamat_surelADM = $request->alamat_surelADM;
    $upload->nama_penggunaADM = $request->nama_penggunaADM;
    $upload->kata_sandiADM = $request->kata_sandiADM;
    $upload->tingkatADM = $request->tingkatADM;
    $upload->fotoADM = $fotoADMUpload;
    $upload->save();

    if($upload){
      return redirect()->route('data-admin.index')->with(['success' => 'Admin Berhasil Disimpan!']);
    } else{
      return redirect()->route('data-admin.index')->with(['error' => 'Admin Gagal Disimpan!']);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Admin  $admin
   * @return \Illuminate\Http\Response
   */
  public function show(Admin $admin)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Admin  $admin
   * @return \Illuminate\Http\Response
   */
  public function edit(Admin $admin)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Admin  $admin
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $adminUpdate = Admin::findOrFail($id);
    if($request->file('editFotoADM') == "") {
      if ($request->editFotoTextADM == '') {
        $adminUpdate->update([
          'namaADM'     => $request->editNamaADM,
          'jkADM'   => $request->editJkADM,
          'alamatADM'   => $request->editAlamatADM,
          'nohpADM'   => $request->editNohpADM,
          'alamat_surelADM'   => $request->editAlamat_surelADM,
          'nama_penggunaADM'   => $request->editNama_penggunaADM,
          'kata_sandiADM'   => $request->editKata_sandiADM,
          'tingkatADM'   => $request->editTingkatADM,
          'fotoADM'     => ''
        ]);
      } else {
        $adminUpdate->update([
          'namaADM'     => $request->editNamaADM,
          'jkADM'   => $request->editJkADM,
          'alamatADM'   => $request->editAlamatADM,
          'nohpADM'   => $request->editNohpADM,
          'alamat_surelADM'   => $request->editAlamat_surelADM,
          'nama_penggunaADM'   => $request->editNama_penggunaADM,
          'kata_sandiADM'   => $request->editKata_sandiADM,
          'tingkatADM'   => $request->editTingkatADM
        ]);
      }
    } else {
      //hapus old image
      if ($adminUpdate->fotoADM != '') {
        $destination = 'images/Admin/'.$adminUpdate->fotoADM;
        if (File::exists($destination)) {
          File::delete($destination);
        }
      } else {
        //upload new image
        $destination = "images/Admin";
        $filename = $request->file('editFotoADM');
        $filename->move($destination, $filename->getClientOriginalName());
        $adminUpdate->update([
          'namaADM'     => $request->editNamaADM,
          'jkADM'   => $request->editJkADM,
          'alamatADM'   => $request->editAlamatADM,
          'nohpADM'   => $request->editNohpADM,
          'alamat_surelADM'   => $request->editAlamat_surelADM,
          'nama_penggunaADM'   => $request->editNama_penggunaADM,
          'kata_sandiADM'   => $request->editKata_sandiADM,
          'tingkatADM'   => $request->editTingkatADM,
          'fotoADM'     => $filename->getClientOriginalName()
        ]);
      }
    }
    if($adminUpdate){
      //redirect dengan pesan sukses
      return redirect()->route('data-admin.index')->with(['success' => 'Admin Berhasil Diubah!']);
    }else{
      //redirect dengan pesan error
      return redirect()->route('data-admin.index')->with(['error' => 'Admin Gagal Diubah!']);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Admin  $admin
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $deleteDataAdmin = Admin::find($id);
    if ($deleteDataAdmin->fotoADM != '') {
      $destination = 'images/Admin/'.$deleteDataAdmin->fotoADM;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    $deleteDataAdmin->delete();

    if($deleteDataAdmin){
      return redirect()->route('data-admin.index')->with(['success' => 'Admin Berhasil Dihapus!']);
    }else{
      return redirect()->route('data-admin.index')->with(['error' => 'Admin Gagal Dihapus!']);
    }
  }
}
