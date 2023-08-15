<?php

namespace App\Http\Controllers;

use App\Models\Kelompok;
use App\Models\Nama_kelompok;
use App\Models\Peserta;
use Illuminate\Http\Request;

class KelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $nama_kelompoks = Nama_kelompok::where('id_ketua_kelompok', auth()->user()->id_user)->get();
        return view('parousia-ministry.lembaga.kelompok', compact(['no', 'nama_kelompoks']));
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
          'mbti'     => 'required'
        ],
        [
          'mbti.required' => 'MBTI tidak boleh kosong.'
        ]);
    
        $input = new P_mbti;
        $input->mbti = $request->mbti;
        $input->deskripsiMBTI = $request->deskripsiMBTI;
        $input->save();
    
        if($input){
          return redirect()->route('shape.index')->with(['success' => 'Personality - MBTI Berhasil Disimpan!']);
        }else{
          return redirect()->route('shape.index')->with(['error' => 'Personality - MBTI Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelompok  $kelompok
     * @return \Illuminate\Http\Response
     */
    public function show(Kelompok $kelompok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelompok  $kelompok
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelompok $kelompok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelompok  $kelompok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelompok $kelompok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelompok  $kelompok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelompok $kelompok)
    {
        //
    }
}
