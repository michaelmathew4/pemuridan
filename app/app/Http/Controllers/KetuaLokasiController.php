<?php

namespace App\Http\Controllers;

use Image;
use  File;
use App\Models\Ketua_lokasi;
use App\Models\Lokasi;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class KetuaLokasiController extends Controller
{
  // public function __construct()
  // {
  //   $this->middleware(['auth', 'cekRole:Pengurus'], ['except' => ['index']]);
  // }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $lokasis = Ketua_lokasi::all();
    $no = 1;
    $lokasiWilayahs = Lokasi::all();

    return view('admin.data-ketua-lokasi', compact(['lokasis', 'no', 'lokasiWilayahs']));
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
      'alamat_surelKL'   => 'required|email|regex:/^.+@.+$/i|unique:users,email',
      'kata_sandiKL'   => 'required',
      'lokasiKL'   => 'required',
      'institusiKL'   => 'required',
      'fotoKL'     => 'image|mimes:png,jpg,jpeg'
    ],
    [
      'namaKL.required' => 'Nama tidak boleh kosong.',
      'jkKL.required' => 'Jenis Kelamin tidak boleh kosong.',
      'alamatKL.required' => 'Alamat tidak boleh kosong.',
      'nohpKL.required' => 'No Hp tidak boleh kosong.',
      'nohpKL.numeric' => 'No Hp harus berupa angka.',
      'alamat_surelKL.required' => 'Alamat Surel tidak boleh kosong.',
      'alamat_surelKL.email' => 'Alamat Surel harus berupa email.',
      'alamat_surelKL.regex' => 'Alamat Surel harus menggunakan @.',
      'alamat_surelKL.unique' => 'Alamat Surel sudah ada.',
      'kata_sandiKL.required' => 'Kata Sandi tidak boleh kosong.',
      'lokasiKL.required' => 'Kepengurusan tidak boleh kosong.',
      'institusiKL.required' => 'Naungan tidak boleh kosong.',
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
    $upload->kata_sandiKL = $request->kata_sandiKL;
    $upload->lokasiKL = $request->lokasiKL;
    $upload->institusiKL = $request->institusiKL;
    $upload->fotoKL = $fotoKLUpload;
    $upload->save();

    if($upload){
      if ($request->institusiKL == 'PM (Parousia Ministry)') {
        $institusi = 'PM';
      } else {
        $institusi = 'GKP';
      }
      $addUser = new User;
      $addUser->name = $request->namaKL;
      $addUser->email = $request->alamat_surelKL;
      $addUser->password = bcrypt($request->kata_sandiKL);
      $addUser->role = 'Lokasi';
      $addUser->institusi = $institusi;
      $addUser->remember_token = Str::random(60);
      $addUser->save();
      
      if ($addUser) {
        return redirect()->route('data-ketua-lokasi.index')->with(['success' => 'Ketua Lokasi Berhasil Disimpan!']);
      } else{
        return redirect()->route('data-ketua-lokasi.index')->with(['error' => 'Ketua Lokasi Gagal Disimpan!']);
      }
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
          'kata_sandiKL'   => $request->editKata_sandiKL,
          'lokasiKL'   => $request->editLokasiKL,
          'institusiKL'   => $request->editInstitusiKL,
          'fotoKL'     => ''
        ]);
      } else {
        $lokasiUpdate->update([
          'namaKL'     => $request->editNamaKL,
          'jkKL'   => $request->editJkKL,
          'alamatKL'   => $request->editAlamatKL,
          'nohpKL'   => $request->editNohpKL,
          'alamat_surelKL'   => $request->editAlamat_surelKL,
          'kata_sandiKL'   => $request->editKata_sandiKL,
          'lokasiKL'   => $request->editLokasiKL,
          'institusiKL'   => $request->editInstitusiiKL
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
          'kata_sandiKL'   => $request->editKata_sandiKL,
          'lokasiKL'   => $request->editLokasiKL,
          'institusiKL'   => $request->editInstitusiKL,
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
    $getUser = User::where('email', $deleteDataKetuaLokasi->alamat_surelKL);
    $getUser->delete();
    $deleteDataKetuaLokasi->delete();

    if($deleteDataKetuaLokasi){
      return redirect()->route('data-ketua-lokasi.index')->with(['success' => 'Ketua Lokasi Berhasil Dihapus!']);
    }else{
      return redirect()->route('data-ketua-lokasi.index')->with(['error' => 'Ketua Lokasi Gagal Dihapus!']);
    }
  }









  //Pengurus YMP
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function indexPengurusPM()
  {
    $lokasis = Ketua_lokasi::where('institusiKL', 'GKP (Gereja Kristen Parousia)');
    $no = 1;
    $lokasiWilayahs = Lokasi::all();

    return view('parousia-ministry.pengurus.ketua-lokasi', compact(['lokasis', 'no', 'lokasiWilayahs']));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function storePengurusPM(Request $request)
  {
    $request->validate([
      'namaKL'     => 'required',
      'jkKL'   => 'required',
      'alamatKL'   => 'required',
      'nohpKL'   => 'required|numeric',
      'alamat_surelKL'   => 'required|email|regex:/^.+@.+$/i|unique:users,email',
      'kata_sandiKL'   => 'required',
      'lokasiKL'   => 'required',
      'institusiKL'   => 'required',
      'fotoKL'     => 'image|mimes:png,jpg,jpeg'
    ],
    [
      'namaKL.required' => 'Nama tidak boleh kosong.',
      'jkKL.required' => 'Jenis Kelamin tidak boleh kosong.',
      'alamatKL.required' => 'Alamat tidak boleh kosong.',
      'nohpKL.required' => 'No Hp tidak boleh kosong.',
      'nohpKL.numeric' => 'No Hp harus berupa angka.',
      'alamat_surelKL.required' => 'Alamat Surel tidak boleh kosong.',
      'alamat_surelKL.email' => 'Alamat Surel harus berupa email.',
      'alamat_surelKL.regex' => 'Alamat Surel harus menggunakan @.',
      'alamat_surelKL.unique' => 'Alamat Surel sudah ada.',
      'kata_sandiKL.required' => 'Kata Sandi tidak boleh kosong.',
      'lokasiKL.required' => 'Kepengurusan tidak boleh kosong.',
      'institusiKL.required' => 'Naungan tidak boleh kosong.',
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
    $upload->kata_sandiKL = $request->kata_sandiKL;
    $upload->lokasiKL = $request->lokasiKL;
    $upload->institusiKL = $request->institusiKL;
    $upload->fotoKL = $fotoKLUpload;
    $upload->save();

    if($upload){
      if ($request->institusiKL == 'PM (Parousia Ministry)') {
        $institusi = 'PM';
      } else {
        $institusi = 'GKP';
      }
      $addUser = new User;
      $addUser->name = $request->namaKL;
      $addUser->email = $request->alamat_surelKL;
      $addUser->password = bcrypt($request->kata_sandiKL);
      $addUser->role = 'Lokasi';
      $addUser->institusi = $institusi;
      $addUser->remember_token = Str::random(60);
      $addUser->save();
      
      if ($addUser) {
        return redirect()->route('ketua-lokasi.indexPengurusPM')->with(['success' => 'Ketua Lokasi Berhasil Disimpan!']);
      } else{
        return redirect()->route('ketua-lokasi.indexPengurusPM')->with(['error' => 'Ketua Lokasi Gagal Disimpan!']);
      }
    } else{
      return redirect()->route('ketua-lokasi.indexPengurusPM')->with(['error' => 'Ketua Lokasi Gagal Disimpan!']);
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Ketua_lokasi  $ketua_lokasi
   * @return \Illuminate\Http\Response
   */
  public function updatePengurusPM(Request $request, $id)
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
          'kata_sandiKL'   => $request->editKata_sandiKL,
          'lokasiKL'   => $request->editLokasiKL,
          'institusiKL'   => $request->editInstitusiKL,
          'fotoKL'     => ''
        ]);
      } else {
        $lokasiUpdate->update([
          'namaKL'     => $request->editNamaKL,
          'jkKL'   => $request->editJkKL,
          'alamatKL'   => $request->editAlamatKL,
          'nohpKL'   => $request->editNohpKL,
          'alamat_surelKL'   => $request->editAlamat_surelKL,
          'kata_sandiKL'   => $request->editKata_sandiKL,
          'lokasiKL'   => $request->editLokasiKL,
          'institusiKL'   => $request->editInstitusiiKL
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
          'kata_sandiKL'   => $request->editKata_sandiKL,
          'lokasiKL'   => $request->editLokasiKL,
          'institusiKL'   => $request->editInstitusiKL,
          'fotoKL'     => $filename->getClientOriginalName()
        ]);
      }
    }
    if($lokasiUpdate){
      //redirect dengan pesan sukses
      return redirect()->route('ketua-lokasi.indexPengurusPM')->with(['success' => 'Ketua Lokasi Berhasil Diubah!']);
    }else{
      //redirect dengan pesan error
      return redirect()->route('ketua-lokasi.indexPengurusPM')->with(['error' => 'Ketua Lokasi Gagal Diubah!']);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Ketua_lokasi  $ketua_lokasi
   * @return \Illuminate\Http\Response
   */
  public function destroyPengurusPM($id)
  {
    $deleteDataKetuaLokasi = Ketua_lokasi::find($id);
    if ($deleteDataKetuaLokasi->fotoKL != '') {
      $destination = 'images/Ketua Lokasi/'.$deleteDataKetuaLokasi->fotoKL;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    $getUser = User::where('email', $deleteDataKetuaLokasi->alamat_surelKL);
    $getUser->delete();
    $deleteDataKetuaLokasi->delete();

    if($deleteDataKetuaLokasi){
      return redirect()->route('ketua-lokasi.indexPengurusPM')->with(['success' => 'Ketua Lokasi Berhasil Dihapus!']);
    }else{
      return redirect()->route('ketua-lokasi.indexPengurusPM')->with(['error' => 'Ketua Lokasi Gagal Dihapus!']);
    }
  }



  //Pengurus GKP
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function indexPengurusGKP()
  {
    $lokasis = Ketua_lokasi::where('institusiKL', 'GKP (Gereja Kristen Parousia)');
    $no = 1;
    $lokasiWilayahs = Lokasi::all();

    return view('gereja-kristen-parousia.pengurus.ketua-lokasi', compact(['lokasis', 'no', 'lokasiWilayahs']));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function storePengurusGKP(Request $request)
  {
    $request->validate([
      'namaKL'     => 'required',
      'jkKL'   => 'required',
      'alamatKL'   => 'required',
      'nohpKL'   => 'required|numeric',
      'alamat_surelKL'   => 'required|email|regex:/^.+@.+$/i|unique:users,email',
      'kata_sandiKL'   => 'required',
      'lokasiKL'   => 'required',
      'institusiKL'   => 'required',
      'fotoKL'     => 'image|mimes:png,jpg,jpeg'
    ],
    [
      'namaKL.required' => 'Nama tidak boleh kosong.',
      'jkKL.required' => 'Jenis Kelamin tidak boleh kosong.',
      'alamatKL.required' => 'Alamat tidak boleh kosong.',
      'nohpKL.required' => 'No Hp tidak boleh kosong.',
      'nohpKL.numeric' => 'No Hp harus berupa angka.',
      'alamat_surelKL.required' => 'Alamat Surel tidak boleh kosong.',
      'alamat_surelKL.email' => 'Alamat Surel harus berupa email.',
      'alamat_surelKL.regex' => 'Alamat Surel harus menggunakan @.',
      'alamat_surelKL.unique' => 'Alamat Surel sudah ada.',
      'kata_sandiKL.required' => 'Kata Sandi tidak boleh kosong.',
      'lokasiKL.required' => 'Kepengurusan tidak boleh kosong.',
      'institusiKL.required' => 'Naungan tidak boleh kosong.',
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
    $upload->kata_sandiKL = $request->kata_sandiKL;
    $upload->lokasiKL = $request->lokasiKL;
    $upload->institusiKL = $request->institusiKL;
    $upload->fotoKL = $fotoKLUpload;
    $upload->save();

    if($upload){
      if ($request->institusiKL == 'PM (Parousia Ministry)') {
        $institusi = 'PM';
      } else {
        $institusi = 'GKP';
      }
      $addUser = new User;
      $addUser->name = $request->namaKL;
      $addUser->email = $request->alamat_surelKL;
      $addUser->password = bcrypt($request->kata_sandiKL);
      $addUser->role = 'Lokasi';
      $addUser->institusi = $institusi;
      $addUser->remember_token = Str::random(60);
      $addUser->save();
      
      if ($addUser) {
        return redirect()->route('ketua-lokasi.indexPengurusGKP')->with(['success' => 'Ketua Lokasi Berhasil Disimpan!']);
      } else{
        return redirect()->route('ketua-lokasi.indexPengurusGKP')->with(['error' => 'Ketua Lokasi Gagal Disimpan!']);
      }
    } else{
      return redirect()->route('ketua-lokasi.indexPengurusGKP')->with(['error' => 'Ketua Lokasi Gagal Disimpan!']);
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Ketua_lokasi  $ketua_lokasi
   * @return \Illuminate\Http\Response
   */
  public function updatePengurusGKP(Request $request, $id)
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
          'kata_sandiKL'   => $request->editKata_sandiKL,
          'lokasiKL'   => $request->editLokasiKL,
          'institusiKL'   => $request->editInstitusiKL,
          'fotoKL'     => ''
        ]);
      } else {
        $lokasiUpdate->update([
          'namaKL'     => $request->editNamaKL,
          'jkKL'   => $request->editJkKL,
          'alamatKL'   => $request->editAlamatKL,
          'nohpKL'   => $request->editNohpKL,
          'alamat_surelKL'   => $request->editAlamat_surelKL,
          'kata_sandiKL'   => $request->editKata_sandiKL,
          'lokasiKL'   => $request->editLokasiKL,
          'institusiKL'   => $request->editInstitusiiKL
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
          'kata_sandiKL'   => $request->editKata_sandiKL,
          'lokasiKL'   => $request->editLokasiKL,
          'institusiKL'   => $request->editInstitusiKL,
          'fotoKL'     => $filename->getClientOriginalName()
        ]);
      }
    }
    if($lokasiUpdate){
      //redirect dengan pesan sukses
      return redirect()->route('ketua-lokasi.indexPengurusGKP')->with(['success' => 'Ketua Lokasi Berhasil Diubah!']);
    }else{
      //redirect dengan pesan error
      return redirect()->route('ketua-lokasi.indexPengurusGKP')->with(['error' => 'Ketua Lokasi Gagal Diubah!']);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Ketua_lokasi  $ketua_lokasi
   * @return \Illuminate\Http\Response
   */
  public function destroyPengurusGKP($id)
  {
    $deleteDataKetuaLokasi = Ketua_lokasi::find($id);
    if ($deleteDataKetuaLokasi->fotoKL != '') {
      $destination = 'images/Ketua Lokasi/'.$deleteDataKetuaLokasi->fotoKL;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    $getUser = User::where('email', $deleteDataKetuaLokasi->alamat_surelKL);
    $getUser->delete();
    $deleteDataKetuaLokasi->delete();

    if($deleteDataKetuaLokasi){
      return redirect()->route('ketua-lokasi.indexPengurusGKP')->with(['success' => 'Ketua Lokasi Berhasil Dihapus!']);
    }else{
      return redirect()->route('ketua-lokasi.indexPengurusGKP')->with(['error' => 'Ketua Lokasi Gagal Dihapus!']);
    }
  }
}
