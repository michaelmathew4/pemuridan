<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video_youtube extends Model
{
  use HasFactory;
    
  /**
   * fillable
   *
   * @var array
   */
  protected $fillable = [
    'judulVY', 'deskripsiVY', 'linkVY', 'gambarVY'
  ];
}
