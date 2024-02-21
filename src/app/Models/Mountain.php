<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Mountain -> mountainsテーブルに紐づけてくれる
class Mountain extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'kana',
        'prefecture_code',
        'address',
        'latitude',
        'longitude',
    ];

    // $mountain->prefecture
    public function post()
    {
        return $this->belongsTo(Prefecture::class);
    }
}
