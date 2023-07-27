<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skala extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
      'skala', 'keterangan', 'id_peserta', 'tgl_kontak', 'status'
    ];

    public function peserta() 
    {
      return $this->belongsTo(Peserta::class);  
    }
}
