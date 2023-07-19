<?php

namespace App\Http\Controllers;

use Image;
use  File;
use App\Models\Artikel_modul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelModulController extends Controller
{
  /**
   * index
   *
   * @return void
   */
  public function index()
  {
    $artikelModuls = Artikel_modul::all();
    $no = 1;
    return view('admin.artikel-modul', compact(['artikelModuls', 'no']));
  }


  /**
  * show
  *
  * @param  mixed $request
  * @return void
  */
  // public function show()
  // {
  //   $artikelModuls = Artikel_modul::all();
  //   $no = 1;
  //   return view('admin.artikelModul', compact(['artikelModuls', 'no']));
  // }

  /**
  * store
  *
  * @param  mixed $request
  * @return void
  */
  public function store(Request $request)
  {
    $request->validate([
      'judulAM'     => 'required',
      'deskripsiAM'   => 'required',
      'gambarAM'     => 'required|image|mimes:png,jpg,jpeg'
    ],
    [
      'judulAM.required' => 'Nama tidak boleh kosong.',
      'deskripsiAM.required' => 'Deskripsi tidak boleh kosong.',
      'gambarAM.required' => 'Gambar tidak boleh kosong.',
      'gambarAM.image' => 'Berkas harus berupa Gambar.'
    ]);

    $upload = "N";
    if ($request->hasfile('gambarAM')) {
      $destination = "images/Artikel Modul";
      $filename = $request->file('gambarAM');
      $filename->move($destination, $filename->getClientOriginalName());
      $upload = "Y";
    }

    if ($upload == "Y") {
      $upload = new Artikel_modul;
      $upload->judulAM = $request->judulAM;
      $upload->deskripsiAM = $request->deskripsiAM;
      $upload->gambarAM = $filename->getClientOriginalName();
      $upload->save();
    }
    if($upload){
      return redirect()->route('artikel-modul.index')->with(['success' => 'Artikel/Modul Berhasil Disimpan!']);
    }else{
      return redirect()->route('artikel-modul.index')->with(['error' => 'Artikel/Modul Gagal Disimpan!']);
    }
  }

  /**
  * update
  *
  * @param  mixed $request
  * @param  mixed $blog
  * @return void
  */
  public function update(Request $request, $id)
  {
    $request->validate([
      'editJudulAM'     => 'required',
      'editDeskripsiAM'   => 'required',
      'editGambarAM'     => 'required|image|mimes:png,jpg,jpeg'
    ],
    [
      'editJudulAM.required' => 'Nama tidak boleh kosong.',
      'editDeskripsiAM.required' => 'Deskripsi tidak boleh kosong.',
      'editGambarAM.required' => 'Gambar tidak boleh kosong.',
      'editGambarAM.image' => 'Berkas harus berupa Gambar.'
    ]);

    $artikelM = Artikel_modul::findOrFail($id);
    if($request->file('editGambarAM') == "") {
      $artikelM->update([
        'judulAM'     => $request->editJudulAM,
        'deskripsiAM'   => $request->editDeskripsiAM
      ]);
    } else {
      //hapus old image
      $destination = 'images/Artikel Modul/'.$artikelM->gambarAM;
      if (File::exists($destination)) {
        File::delete($destination);
      }
      //upload new image
      $destination = "images/Artikel Modul";
      $filename = $request->file('editGambarAM');
      $filename->move($destination, $filename->getClientOriginalName());
      $artikelM->update([
        'judulAM'     => $request->editJudulAM,
        'deskripsiAM'   => $request->editDeskripsiAM,
        'gambarAM'     => $filename->getClientOriginalName()
      ]);
    }
    if($artikelM){
      //redirect dengan pesan sukses
      return redirect()->route('artikel-modul.index')->with(['success' => 'Artikel/Modul Berhasil Diubah!']);
    }else{
      //redirect dengan pesan error
      return redirect()->route('artikel-modul.index')->with(['error' => 'Artikel/Modul Gagal Diubah!']);
    }
  }

  /**
  * destroy
  *
  * @param  mixed $id
  * @return void
  */
  public function destroy($id)
  {
    $deleteArtikelModul = Artikel_modul::find($id);
    $destination = 'images/Artikel Modul/'.$deleteArtikelModul->gambarAM;
    if (File::exists($destination)) {
      File::delete($destination);
    }
    $deleteArtikelModul->delete();


    if($deleteArtikelModul){
      return redirect()->route('artikel-modul.index')->with(['success' => 'Artikel/Modul Berhasil Dihapus!']);
    }else{
      return redirect()->route('artikel-modul.index')->with(['error' => 'Artikel/Modul Gagal Dihapus!']);
    }
  }
}
