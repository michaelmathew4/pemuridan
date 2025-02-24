<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    use HasFactory;
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
      'namaPRS', 'jkPRS', 'alamatPRS', 'nohpPRS', 'alamat_surelPRS', 'kata_sandiPRS', 
      'institusiPRS', 'fotoPRS'
    ];
}
