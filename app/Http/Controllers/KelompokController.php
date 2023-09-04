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
        $pesertaEdits = Peserta::join('kelompoks', 'kelompoks.id_peserta', 'pesertas.id_peserta')
                                ->where('peminta', auth()->user()->id_user)
                                ->first();
                                // dd($pesertaEdits);
        $kelompokGenSs = Kelompok::join('nama_kelompoks', 'nama_kelompoks.id_kelompok', 'kelompoks.id_kelompok')
                                  ->where('kelompoks.id_ketua_kelompok', auth()->user()->id_user)
                                  ->addSelect([
                                      'nama_peserta' => Peserta::select('nama_peserta')
                                          ->whereColumn('id_peserta', 'kelompoks.id_peserta')
                                          ->limit(1)])
                                  ->get();
        $kelompoksGenDs = [];
        $kelompoksGenTs = [];
        $kelompoksGenEs = [];
        $kelompoksGenLs = [];
        $branchLv = 2;
        $noBagan = 1;
        $kelompoksGenDuas = '';
        $kelompoksGenTigas = '';
        $kelompoksGenEmpats = '';
        $kelompoksGenLimas = '';
        //Gen 2
        foreach ($kelompokGenSs as $kelompokGenS) {
          $kelompoksGenDs[] = Kelompok::where('id_ketua_kelompok', $kelompokGenS->id_peserta)
                                      ->addSelect([
                                          'nama_peserta' => Peserta::select('nama_peserta')
                                              ->whereColumn('id_peserta', 'kelompoks.id_peserta')
                                              ->limit(1)])
                                      ->get();
          foreach ($kelompoksGenDs as $kelompoksGenD) {
            foreach ($kelompoksGenD as $kelompoksGenDua) {
              if ($kelompoksGenDua->id_ketua_kelompok == $kelompokGenS->id_peserta) {
                $kelompoksGenDuas = $kelompoksGenDs;
        //Mid Gen 2

        //Gen 3
                foreach ($kelompoksGenDuas as $kelompoksGenDua) {
                  foreach ($kelompoksGenDua as $kelompokGenDua) {
                    $kelompoksGenTs[] = Kelompok::where('id_ketua_kelompok', $kelompokGenDua->id_peserta)
                                                ->addSelect([
                                                    'nama_peserta' => Peserta::select('nama_peserta')
                                                        ->whereColumn('id_peserta', 'kelompoks.id_peserta')
                                                        ->limit(1)])
                                                ->get();
                    foreach ($kelompoksGenTs as $kelompoksGenT) {
                      foreach ($kelompoksGenT as $kelompoksGenTiga) {
                        if ($kelompoksGenTiga->id_ketua_kelompok == $kelompokGenDua->id_peserta) {
                          $kelompoksGenTigas = $kelompoksGenTs;
        //Mid Gen 3

        //Gen 4
                          foreach ($kelompoksGenTigas as $kelompoksGenTiga) {
                            foreach ($kelompoksGenTiga as $kelompokGenTiga) {
                              $kelompoksGenEs[] = Kelompok::where('id_ketua_kelompok', $kelompokGenTiga->id_peserta)
                                                          ->addSelect([
                                                              'nama_peserta' => Peserta::select('nama_peserta')
                                                                  ->whereColumn('id_peserta', 'kelompoks.id_peserta')
                                                                  ->limit(1)])
                                                          ->get();
                              foreach ($kelompoksGenEs as $kelompoksGenE) {
                                foreach ($kelompoksGenE as $kelompoksGenEmpat) {
                                  if ($kelompoksGenEmpat->id_ketua_kelompok == $kelompokGenTiga->id_peserta) {
                                    $kelompoksGenEmpats = $kelompoksGenEs;
        //Mid Gen 4

        //Gen 5
                                    foreach ($kelompoksGenEmpats as $kelompoksGenEmpat) {
                                      foreach ($kelompoksGenEmpat as $kelompokGenEmpat) {
                                        $kelompoksGenLs[] = Kelompok::where('id_ketua_kelompok', $kelompokGenEmpat->id_peserta)
                                                                    ->addSelect([
                                                                        'nama_peserta' => Peserta::select('nama_peserta')
                                                                            ->whereColumn('id_peserta', 'kelompoks.id_peserta')
                                                                            ->limit(1)])
                                                                    ->get();
                                        foreach ($kelompoksGenLs as $kelompoksGenL) {
                                          foreach ($kelompoksGenL as $kelompoksGenLima) {
                                            if ($kelompoksGenLima->id_ketua_kelompok == $kelompokGenEmpat->id_peserta) {
                                              $kelompoksGenLimas = $kelompoksGenLs;
        //Mid Gen 5

        //End Gen 5
                                            }
                                          }
                                        }
                                      }
                                    }

        //End Gen 4
                                  }
                                }
                              }
                            }
                          }

        //End Gen 3
                        }
                      }
                    }
                  }
                }

        //End Gen 2
              }
            }
          }
        }
        // dd($kelompokGenSs);
        // var_dump($pesertaKKs);
        return view('parousia-ministry.ketua-kelompok.kelompok', compact(['no', 'nama_kelompoks', 'pesertas', 'kelompokGenSs', 'kelompoksGenDuas', 'branchLv', 'pesertaEdits', 'noBagan', 'kelompoksGenTigas', 'kelompoksGenEmpats', 'kelompoksGenLimas']));
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
          'namaKelompok'     => 'required'
        ],
        [
          'namaKelompok.required' => 'Nama Kelompok tidak boleh kosong.'
        ]);

        
        $inputNamaKelompok = new Nama_kelompok;
        $inputNamaKelompok->id_kelompok = $this->randomCodes();
        $inputNamaKelompok->id_ketua_kelompok = auth()->user()->id_user;
        $inputNamaKelompok->nama_kelompok = $request->namaKelompok;
        $inputNamaKelompok->save();

        if(count($request->kontaks) != 0 ) {
          foreach ($request->kontaks as $kontak) {
            $input = new Kelompok;
            $input->id_kelompok = $inputNamaKelompok->id_kelompok;
            $input->nama_kelompok = $request->namaKelompok;
            $input->id_ketua_kelompok = auth()->user()->id_user;
            $input->id_peserta = $kontak;
            $input->save();
          }
        }
    
        if($inputNamaKelompok){
          return redirect()->route('ketua-kelompok.kelompok.index')->with(['success' => 'Kelompok Berhasil Disimpan!']);
        }else{
          return redirect()->route('ketua-kelompok.kelompok.index')->with(['error' => 'Kelompok Gagal Disimpan!']);
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
    public function update(Request $request, $id)
    {
      $request->validate([
        'namaKelompokEdits'     => 'required'
      ],
      [
        'namaKelompokEdits.required' => 'Nama Kelompok tidak boleh kosong.'
      ]);

      
      $inputNamaKelompok = Nama_kelompok::firstWhere('id_kelompok', $id);
      $inputNamaKelompok->update([
        'nama_kelompok'     => $request->namaKelompokEdits,
      ]);

      
      if(count($request->kontakEdits) != 0 ) {
        foreach ($request->kontakEdits as $kontak) {
          $input = new Kelompok;
          $input->id_kelompok = $inputNamaKelompok->id_kelompok;
          $input->nama_kelompok = $request->namaKelompokEdits;
          $input->id_ketua_kelompok = auth()->user()->id_user;
          $input->id_peserta = $kontak;
          $input->save();
        }
      }
  
      if($inputNamaKelompok){
        return redirect()->route('ketua-kelompok.kelompok.index')->with(['success' => 'Kelompok Berhasil Diubah!']);
      }else{
        return redirect()->route('ketua-kelompok.kelompok.index')->with(['error' => 'Kelompok Gagal Diubah!']);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelompok  $kelompok
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $deleteNamaKelompok = Nama_kelompok::firstWhere('id_kelompok', $id);
      $deleteKelompok = Kelompok::whereIn('id_kelompok', $id);
      $deleteKelompok->delete();
      $deleteNamaWKelompok->delete();
  
  
      if($deleteNamaWKelompok){
        return redirect()->route('ketua-kelompok.kelompok.index')->with(['success' => 'Kelompok Berhasil Dihapus!']);
      }else{
        return redirect()->route('ketua-kelompok.kelompok.index')->with(['error' => 'Kelompok Gagal Dihapus!']);
      }
    }






    // GKP
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexKelompokKKGKP()
    {
        $no = 1;
        $nama_kelompoks = Nama_kelompok::where('id_ketua_kelompok', auth()->user()->id_user)->get();
        $pesertas = Peserta::where('peminta', auth()->user()->id_user)->get();
        $pesertaEdits = Peserta::join('kelompoks', 'kelompoks.id_peserta', 'pesertas.id_peserta')
                                ->where('peminta', auth()->user()->id_user)
                                ->first();
                                // dd($pesertaEdits);
        $kelompokGenSs = Kelompok::join('nama_kelompoks', 'nama_kelompoks.id_kelompok', 'kelompoks.id_kelompok')
                                  ->where('kelompoks.id_ketua_kelompok', auth()->user()->id_user)
                                  ->addSelect([
                                      'nama_peserta' => Peserta::select('nama_peserta')
                                          ->whereColumn('id_peserta', 'kelompoks.id_peserta')
                                          ->limit(1)])
                                  ->get();
        $kelompoksGenDs = [];
        $kelompoksGenTs = [];
        $kelompoksGenEs = [];
        $kelompoksGenLs = [];
        $branchLv = 2;
        $noBagan = 1;
        $kelompoksGenDuas = '';
        $kelompoksGenTigas = '';
        $kelompoksGenEmpats = '';
        $kelompoksGenLimas = '';
        //Gen 2
        foreach ($kelompokGenSs as $kelompokGenS) {
          $kelompoksGenDs[] = Kelompok::where('id_ketua_kelompok', $kelompokGenS->id_peserta)
                                      ->addSelect([
                                          'nama_peserta' => Peserta::select('nama_peserta')
                                              ->whereColumn('id_peserta', 'kelompoks.id_peserta')
                                              ->limit(1)])
                                      ->get();
          foreach ($kelompoksGenDs as $kelompoksGenD) {
            foreach ($kelompoksGenD as $kelompoksGenDua) {
              if ($kelompoksGenDua->id_ketua_kelompok == $kelompokGenS->id_peserta) {
                $kelompoksGenDuas = $kelompoksGenDs;
        //Mid Gen 2

        //Gen 3
                foreach ($kelompoksGenDuas as $kelompoksGenDua) {
                  foreach ($kelompoksGenDua as $kelompokGenDua) {
                    $kelompoksGenTs[] = Kelompok::where('id_ketua_kelompok', $kelompokGenDua->id_peserta)
                                                ->addSelect([
                                                    'nama_peserta' => Peserta::select('nama_peserta')
                                                        ->whereColumn('id_peserta', 'kelompoks.id_peserta')
                                                        ->limit(1)])
                                                ->get();
                    foreach ($kelompoksGenTs as $kelompoksGenT) {
                      foreach ($kelompoksGenT as $kelompoksGenTiga) {
                        if ($kelompoksGenTiga->id_ketua_kelompok == $kelompokGenDua->id_peserta) {
                          $kelompoksGenTigas = $kelompoksGenTs;
        //Mid Gen 3

        //Gen 4
                          foreach ($kelompoksGenTigas as $kelompoksGenTiga) {
                            foreach ($kelompoksGenTiga as $kelompokGenTiga) {
                              $kelompoksGenEs[] = Kelompok::where('id_ketua_kelompok', $kelompokGenTiga->id_peserta)
                                                          ->addSelect([
                                                              'nama_peserta' => Peserta::select('nama_peserta')
                                                                  ->whereColumn('id_peserta', 'kelompoks.id_peserta')
                                                                  ->limit(1)])
                                                          ->get();
                              foreach ($kelompoksGenEs as $kelompoksGenE) {
                                foreach ($kelompoksGenE as $kelompoksGenEmpat) {
                                  if ($kelompoksGenEmpat->id_ketua_kelompok == $kelompokGenTiga->id_peserta) {
                                    $kelompoksGenEmpats = $kelompoksGenEs;
        //Mid Gen 4

        //Gen 5
                                    foreach ($kelompoksGenEmpats as $kelompoksGenEmpat) {
                                      foreach ($kelompoksGenEmpat as $kelompokGenEmpat) {
                                        $kelompoksGenLs[] = Kelompok::where('id_ketua_kelompok', $kelompokGenEmpat->id_peserta)
                                                                    ->addSelect([
                                                                        'nama_peserta' => Peserta::select('nama_peserta')
                                                                            ->whereColumn('id_peserta', 'kelompoks.id_peserta')
                                                                            ->limit(1)])
                                                                    ->get();
                                        foreach ($kelompoksGenLs as $kelompoksGenL) {
                                          foreach ($kelompoksGenL as $kelompoksGenLima) {
                                            if ($kelompoksGenLima->id_ketua_kelompok == $kelompokGenEmpat->id_peserta) {
                                              $kelompoksGenLimas = $kelompoksGenLs;
        //Mid Gen 5

        //End Gen 5
                                            }
                                          }
                                        }
                                      }
                                    }

        //End Gen 4
                                  }
                                }
                              }
                            }
                          }

        //End Gen 3
                        }
                      }
                    }
                  }
                }

        //End Gen 2
              }
            }
          }
        }
        // dd($kelompokGenSs);
        // var_dump($pesertaKKs);
        return view('gereja-kristen-parousia.ketua-kelompok.kelompok', compact(['no', 'nama_kelompoks', 'pesertas', 'kelompokGenSs', 'kelompoksGenDuas', 'branchLv', 'pesertaEdits', 'noBagan', 'kelompoksGenTigas', 'kelompoksGenEmpats', 'kelompoksGenLimas']));
    }

    function randomCodesGKP()
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
    public function storeKelompokKKGKP(Request $request)
    {
        $request->validate([
          'namaKelompok'     => 'required'
        ],
        [
          'namaKelompok.required' => 'Nama Kelompok tidak boleh kosong.'
        ]);

        
        $inputNamaKelompok = new Nama_kelompok;
        $inputNamaKelompok->id_kelompok = $this->randomCodesGKP();
        $inputNamaKelompok->id_ketua_kelompok = auth()->user()->id_user;
        $inputNamaKelompok->nama_kelompok = $request->namaKelompok;
        $inputNamaKelompok->save();

        if(count($request->kontaks) != 0 ) {
          foreach ($request->kontaks as $kontak) {
            $input = new Kelompok;
            $input->id_kelompok = $inputNamaKelompok->id_kelompok;
            $input->nama_kelompok = $inputNamaKelompok->namaKelompok;
            $input->id_ketua_kelompok = auth()->user()->id_user;
            $input->id_peserta = $kontak;
            $input->save();
          }
        }
    
        if($inputNamaKelompok){
          return redirect()->route('kelompok.indexKelompokKKGKP')->with(['success' => 'Kelompok Berhasil Disimpan!']);
        }else{
          return redirect()->route('kelompok.indexKelompokKKGKP')->with(['error' => 'Kelompok Gagal Disimpan!']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelompok  $kelompok
     * @return \Illuminate\Http\Response
     */
    public function updateKelompokKKGKP(Request $request, $id)
    {
      $request->validate([
        'namaKelompokEdits'     => 'required'
      ],
      [
        'namaKelompokEdits.required' => 'Nama Kelompok tidak boleh kosong.'
      ]);

      
      $inputNamaKelompok = Nama_kelompok::firstWhere('id_kelompok', $id);
      $inputNamaKelompok->update([
        'nama_kelompok'     => $request->namaKelompokEdits,
      ]);

      
      if(count($request->kontakEdits) != 0 ) {
        foreach ($request->kontakEdits as $kontak) {
          $input = new Kelompok;
          $input->id_kelompok = $inputNamaKelompok->id_kelompok;
          $input->nama_kelompok = $request->namaKelompok;
          $input->id_ketua_kelompok = auth()->user()->id_user;
          $input->id_peserta = $kontak;
          $input->save();
        }
      }
  
      if($inputNamaKelompok){
        return redirect()->route('kelompok.indexKelompokKKGKP')->with(['success' => 'Kelompok Berhasil Diubah!']);
      }else{
        return redirect()->route('kelompok.indexKelompokKKGKP')->with(['error' => 'Kelompok Gagal Diubah!']);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelompok  $kelompok
     * @return \Illuminate\Http\Response
     */
    public function destroyKelompokKKGKP($id)
    {
      $deleteNamaKelompok = Nama_kelompok::firstWhere('id_kelompok', $id);
      $deleteKelompok = Kelompok::whereIn('id_kelompok', $id);
      $deleteKelompok->delete();
      $deleteNamaWKelompok->delete();
  
  
      if($deleteNamaWKelompok){
        return redirect()->route('kelompok.indexKelompokKKGKP')->with(['success' => 'Kelompok Berhasil Dihapus!']);
      }else{
        return redirect()->route('kelompok.indexKelompokKKGKP')->with(['error' => 'Kelompok Gagal Dihapus!']);
      }
    }
}
