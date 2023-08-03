<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    // protected $primaryKey='id_peserta';

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
      'id', 'id_peserta', 'nama_peserta', 'jk_peserta', 'tempat_lahir_peserta', 'tgl_lahir_peserta', 'alamat_peserta',
      'no_hp_peserta', 'pekerjaan_peserta', 'suku_peserta', 'status_peserta', 'lokasi_peserta', 'institusi_peserta', 'foto_peserta'
    ];
}
