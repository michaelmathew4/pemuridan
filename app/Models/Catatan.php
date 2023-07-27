<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    use HasFactory;


    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
      'catatan', 'id_peserta', 'tgl_kontak'
    ];

    public function peserta() 
    {
      return $this->belongsTo(Peserta::class);  
    }
}
