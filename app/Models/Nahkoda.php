<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nahkoda extends Model
{
    protected $fillable = [
        'nama',
        'pengalaman',
        'sertifikasi',
        'rating',
    ];
}
