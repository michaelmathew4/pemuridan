<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
  use HasFactory;
    
  /**
   * fillable
   *
   * @var array
   */
  protected $fillable = [
    'namaADM', 'jkADM', 'alamatADM', 'nohpADM', 'alamat_surelADM', 'nama_penggunaADM', 'kata_sandiADM', 'fotoADM', 'tingkatADM'
  ];
}
