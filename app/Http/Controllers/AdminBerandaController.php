<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use App\Models\Ketua_lokasi;
use App\Models\Ketua_kelompok;
use App\Models\Data_lembaga;
use App\Models\Peserta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBerandaController extends Controller
{
    public function index() {
        $countPengurus = Data_lembaga::where('data_lembaga', 'Pengurus')->count();
        $countKetua_lokasi = Ketua_lokasi::count();
        $countKetua_kelompok = Data_lembaga::where('data_lembaga', 'Ketua Kelompok')->count();
        $countPeserta = Peserta::count();

        return view('admin.index', compact(['countPengurus', 'countKetua_lokasi', 'countKetua_kelompok', 'countPeserta']));
    }
}
