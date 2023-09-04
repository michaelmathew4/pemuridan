<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use App\Models\Ketua_lokasi;
use App\Models\Ketua_kelompok;
use App\Models\Peserta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBerandaController extends Controller
{
    public function index() {
        $countPengurus = Pengurus::count();
        $countKetua_lokasi = Ketua_lokasi::count();
        $countKetua_kelompok = Ketua_kelompok::count();
        $countPeserta = Peserta::count();

        return view('admin.index', compact(['countPengurus', 'countKetua_lokasi', 'countKetua_kelompok', 'countPeserta']));
    }
}
