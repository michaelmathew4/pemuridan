<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ketua_lokasi extends Model
{
    use HasFactory;
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
      'namaKL', 'jkKL', 'alamatKL', 'nohpKL', 'alamat_surelKL', 'nama_penggunaKL', 'kata_sandiKL', 'lokasiKL', 'fotoKL'
    ];
}
