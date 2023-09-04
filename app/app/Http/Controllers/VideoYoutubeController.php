<?php

namespace App\Http\Controllers;

use Image;
use  File;
use App\Models\Video_youtube;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoYoutubeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $videoYoutubes = Video_youtube::all();
    $no = 1;
    return view('admin.video', compact(['videoYoutubes', 'no']));
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
      'judulVY'     => 'required',
      'deskripsiVY'   => 'required',
      'linkVY'   => 'required',
      'gambarVY'     => 'image|mimes:png,jpg,jpeg'
    ],
    [
      'judulVY.required' => 'Judul tidak boleh kosong.',
      'deskripsiVY.required' => 'Deskripsi tidak boleh kosong.',
      'linkVY.required' => 'Link tidak boleh kosong.',
      'gambarVY.image' => 'Berkas harus berupa Gambar.'
    ]);

    $gambarVYUpload = '';
    if ($request->hasfile('gambarVY')) {
      $destination = "images/Video Youtube";
      $filename = $request->file('gambarVY');
      $filename->move($destination, $filename->getClientOriginalName());
      $gambarVYUpload = $filename->getClientOriginalName();
    }

    $upload = new Video_youtube;
    $upload->judulVY = $request->judulVY;
    $upload->deskripsiVY = $request->deskripsiVY;
    $upload->linkVY = $request->linkVY;
    $upload->gambarVY = $gambarVYUpload;
    $upload->save();

    if($upload){
      return redirect()->route('video.index')->with(['success' => 'Video Youtube Berhasil Disimpan!']);
    }else{
      return redirect()->route('video.index')->with(['error' => 'Video Youtube Gagal Disimpan!']);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Video_youtube  $video_youtube
   * @return \Illuminate\Http\Response
   */
  public function show(Video_youtube $video_youtube)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Video_youtube  $video_youtube
   * @return \Illuminate\Http\Response
   */
  public function edit(Video_youtube $video_youtube)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Video_youtube  $video_youtube
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $videoYt = Video_youtube::findOrFail($id);
    if($request->file('editGambarVY') == "") {
      if ($request->editGambarTextVY == '') {
        $videoYt->update([
          'judulVY'     => $request->editJudulVY,
          'deskripsiVY'   => $request->editDeskripsiVY,
          'linkVY'   => $request->editLinkVY,
          'gambarVY'     => ''
        ]);
      } else {
        $videoYt->update([
        'judulVY'     => $request->editJudulVY,
        'deskripsiVY'   => $request->editDeskripsiVY,
        'linkVY'   => $request->editLinkVY
        ]);
      }
    } else {
      //hapus old image
      if ($videoYt->gambarVY != '') {
        $destination = 'images/Video Youtube/'.$videoYt->gambarVY;
        if (File::exists($destination)) {
          File::delete($destination);
        }
      } else {
        //upload new image
        $destination = "images/Video Youtube";
        $filename = $request->file('editGambarVY');
        $filename->move($destination, $filename->getClientOriginalName());
        $videoYt->update([
          'judulVY'     => $request->editJudulVY,
          'deskripsiVY'   => $request->editDeskripsiVY,
          'linkVY'   => $request->editLinkVY,
          'gambarVY'     => $filename->getClientOriginalName()
        ]);
      }
    }
    if($videoYt){
      //redirect dengan pesan sukses
      return redirect()->route('video.index')->with(['success' => 'Video Youtube Berhasil Diubah!']);
    }else{
      //redirect dengan pesan error
      return redirect()->route('video.index')->with(['error' => 'Video Youtube Gagal Diubah!']);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Video_youtube  $video_youtube
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $deleteVideoYoutube = Video_youtube::find($id);
    if ($deleteVideoYoutube->gambarVY != '') {
      $destination = 'images/Video Youtube/'.$deleteVideoYoutube->gambarVY;
      if (File::exists($destination)) {
        File::delete($destination);
      }
    }
    $deleteVideoYoutube->delete();


    if($deleteVideoYoutube){
      return redirect()->route('video.index')->with(['success' => 'Video Youtube Berhasil Dihapus!']);
    }else{
      return redirect()->route('video.index')->with(['error' => 'Video Youtube Gagal Dihapus!']);
    }
  }
}
