<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_peserta';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
      'id', 'id_peserta', 'nama_peserta', 'jk_peserta', 'tempat_lahir_peserta', 'tgl_lahir_peserta', 'alamat_peserta', 'no_hp_peserta', 'pekerjaan_peserta', 'suku_peserta', 'status_peserta', 'foto_peserta'
    ];

    public function skala() 
    {
      return $this->hasMany(Skala::class);  
    }

    public function catatan() 
    {
      return $this->hasMany(Catatan::class);  
    }
}
