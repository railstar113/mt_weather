<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'region',
    ];

    // $prefecture->mountains
    public function mountains()
    {
        return $this->hasMany(Mountain::class);
    }
}
