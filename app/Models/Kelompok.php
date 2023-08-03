<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
      'id_kelompok', 'nama_kelompok', 'id_ketua_kelompok', 'id_peserta', 'generasi'
    ];
}
