<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_pekerjaan extends Model
{
  use HasFactory;
  
  /**
   * fillable
   *
   * @var array
   */
  protected $fillable = [
    'status_pekerjaanSPJ', 'deskripsiSPJ'
  ];
}
