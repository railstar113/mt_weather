<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mountain extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'nameKana',
    'prefecture_id',
    'address',
    'latitude',
    'longitude',
  ];

  // $mountain->prefecture
  public function prefecture()
  {
    return $this->belongsTo(Prefecture::class);
  }
}
