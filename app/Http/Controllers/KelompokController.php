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
        $pesertas = Peserta::where('peminta', auth()->user()->id_user)->get();
        $kelompoks = Kelompok::where('id_ketua_kelompok', auth()->user()->id_user)->get();
        return view('parousia-ministry.lembaga.kelompok', compact(['no', 'nama_kelompoks', 'pesertas', 'kelompoks']));
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

    function randomCodes()
    {
      do {
        $kode = random_int(100000000, 999999999);
      } while (Nama_kelompok::where("id_kelompok", "=", $kode)->first());
  
      return $kode;
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
          'namaKelompok'     => 'required',
          'kontaks'     => 'required',
        ],
        [
          'namaKelompok.required' => 'Nama Kelompok tidak boleh kosong.',
          'kontaks.required' => 'Data Kontak tidak boleh kosong.'
        ]);

        
        $inputNamaKelompok = new Nama_kelompok;
        $inputNamaKelompok->id_kelompok = $this->randomCodes();
        $inputNamaKelompok->id_ketua_kelompok = auth()->user()->id_user;
        $inputNamaKelompok->nama_kelompok = $request->namaKelompok;
        $inputNamaKelompok->save();

        
        foreach ($request->kontaks as $kontak) {
          $input = new Kelompok;
          $input->id_kelompok = $inputNamaKelompok->id_kelompok;
          $input->nama_kelompok = $request->namaKelompok;
          $input->id_ketua_kelompok = auth()->user()->id_user;
          $input->id_peserta = $kontak;
          $input->save();
        }
    
        if($inputNamaKelompok){
          return redirect()->route('kelompok.index')->with(['success' => 'Kelompok Berhasil Disimpan!']);
        }else{
          return redirect()->route('kelompok.index')->with(['error' => 'Kelompok Gagal Disimpan!']);
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
