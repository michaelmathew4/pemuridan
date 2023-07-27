<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skala;
use App\Models\Catatan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $pesertas = Peserta::all();
    $no = 1;
    return view('admin.data-peserta', compact(['pesertas', 'no']));
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

  function randomCode()
  {
    do {
      $kode = random_int(100000000, 999999999);
    } while (Peserta::where("id_peserta", "=", $kode)->first());

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
      'tglKontakPeserta'     => 'required',
      'namaKontakPeserta'     => 'required',
      'jenisKelaminPeserta'   => 'required',
      'skalaPeserta'   => 'required',
      'catatanPeserta'   => 'required',
      'alamatPeserta'   => 'required',
      'noHpPeserta'   => 'required|numeric',
      'tempatLahirPeserta'   => 'required',
      'tanggalLahirPeserta'   => 'required',
      'pekerjaanPeserta'   => 'required',
      'sukuPeserta'   => 'required',
      'fotoPRS'     => 'image|mimes:png,jpg,jpeg'
    ],
    [
      'namaKontakPeserta.required' => 'Nama tidak boleh kosong.',
      'jenisKelaminPeserta.required' => 'Jenis Kelamin tidak boleh kosong.',
      'skalaPeserta.required' => 'Skala tidak boleh kosong.',
      'catatanPeserta.required' => 'Catatan tidak boleh kosong.',
      'alamatPeserta.required' => 'Alamat tidak boleh kosong.',
      'noHpPeserta.required' => 'No Hp tidak boleh kosong.',
      'noHpPeserta.numeric' => 'No Hp harus berupa angka.',
      'tempatLahirPeserta.required' => 'Tempat Lahir tidak boleh kosong.',
      'tanggalLahirPeserta.required' => 'Tanggal Lahir tidak boleh kosong.',
      'pekerjaanPeserta.required' => 'Pekerjaan tidak boleh kosong.',
      'sukuPeserta.required' => 'Suku tidak boleh kosong.',
      'fotoPeserta.image' => 'Berkas harus berupa Gambar.'
    ]);

    $fotoPesertaUpload = '';
    if ($request->hasfile('fotoPeserta')) {
      $destination = "images/Peserta";
      $filename = $request->file('fotoPeserta');
      $filename->move($destination, $filename->getClientOriginalName());
      $fotoPesertaUpload = $filename->getClientOriginalName();
    }

    $upload = new Peserta;
    $upload->id_peserta = $this->randomCode();
    $upload->nama_peserta = $request->namaKontakPeserta;
    $upload->jk_peserta = $request->jenisKelaminPeserta;
    $upload->alamat_peserta = $request->alamatPeserta;
    $upload->no_hp_peserta = $request->noHpPeserta;
    $upload->tempat_lahir_peserta = $request->tempatLahirPeserta;
    $upload->tgl_lahir_peserta = $request->tanggalLahirPeserta;
    $upload->pekerjaan_peserta = $request->pekerjaanPeserta;
    $upload->suku_peserta = $request->sukuPeserta;
    $upload->status_peserta = $request->statusPeserta;
    $upload->foto_peserta = $fotoPesertaUpload;
    $upload->save();

    if($upload){
      $skala = new Skala;
      $skala->skala = $request->skalaPeserta;
      $skala->keterangan = $request->catatanPeserta;
      $skala->id_peserta = $upload->id_peserta;
      $skala->tgl_kontak = $request->tglKontakPeserta;
      $skala->status = 'Aktif';
      $skala->save();

      if ($skala) {
        $catatan = new Catatan;
        $catatan->catatan = $request->catatanPeserta;
        $catatan->id_peserta = $upload->id_peserta;
        $catatan->tgl_kontak = $request->tglKontakPeserta;
        $catatan->save();

        if ($catatan) {
          return redirect()->route('data-peserta.index')->with(['success' => 'Data Kontak Berhasil Disimpan!']);
        } else{
          return redirect()->route('data-peserta.index')->with(['error' => 'Data Kontak Gagal Disimpan!']);
        }
      } else{
        return redirect()->route('data-peserta.index')->with(['error' => 'Data Kontak Gagal Disimpan!']);
      }
    } else{
      return redirect()->route('data-peserta.index')->with(['error' => 'Data Kontak Gagal Disimpan!']);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function show(Peserta $peserta)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function edit(Peserta $peserta)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Peserta $peserta)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Peserta  $peserta
   * @return \Illuminate\Http\Response
   */
  public function destroy(Peserta $peserta)
  {
      //
  }
}
