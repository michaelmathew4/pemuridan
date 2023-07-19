<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sektor_industri extends Model
{
  use HasFactory;
  
  /**
   * fillable
   *
   * @var array
   */
  protected $fillable = [
    'sektor_industriSI', 'deskripsiSI'
  ];
}
