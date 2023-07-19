<?php

namespace App\Http\Controllers;

use Image;
use  File;
use App\Models\Shape;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShapeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $shapes = Shape::all();
    $no = 1;
    return view('admin.shape', compact(['shapes', 'no']));
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
      'shapeSP'     => 'required',
      'deskripsiSP'   => 'required'
    ],
    [
      'shapeSP.required' => 'Shape tidak boleh kosong.',
      'deskripsiSP.required' => 'Deskripsi tidak boleh kosong.'
    ]);

    $upload = new Shape;
    $upload->shapeSP = $request->shapeSP;
    $upload->deskripsiSP = $request->deskripsiSP;
    $upload->save();

    if($upload){
      return redirect()->route('shape.index')->with(['success' => 'SHAPE Berhasil Disimpan!']);
    }else{
      return redirect()->route('shape.index')->with(['error' => 'SHAPE Gagal Disimpan!']);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Shape  $shape
   * @return \Illuminate\Http\Response
   */
  public function show(Shape $shape)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Shape  $shape
   * @return \Illuminate\Http\Response
   */
  public function edit(Shape $shape)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Shape  $shape
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $shapeEdit = Shape::findOrFail($id);
    $request->validate([
      'editShapeSP'     => 'required',
      'editDeskripsiSP'   => 'required'
    ],
    [
      'editShapeSP.required' => 'Shape tidak boleh kosong.',
      'editDeskripsiSP.required' => 'Deskripsi tidak boleh kosong.'
    ]);

    $shapeEdit->update([
      'shapeSP'     => $request->editShapeSP,
      'deskripsiSP'   => $request->editDeskripsiSP
    ]);

    if($shapeEdit){
      return redirect()->route('shape.index')->with(['success' => 'SHAPE Berhasil Diubah!']);
    }else{
      return redirect()->route('shape.index')->with(['error' => 'SHAPE Gagal Diubah!']);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Shape  $shape
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $deleteShape = Shape::find($id);
    $deleteShape->delete();


    if($deleteShape){
      return redirect()->route('shape.index')->with(['success' => 'SHAPE Berhasil Dihapus!']);
    }else{
      return redirect()->route('shape.index')->with(['error' => 'SHAPE Gagal Dihapus!']);
    }
  }
}
