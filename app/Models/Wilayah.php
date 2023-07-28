<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
      'kode_wilayah', 'nama_wilayah', 'provinsi_wilayah', 'negara_wilayah', 'peta'
    ];
}
