<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description'];

    public function ships()
    {
        return $this->hasMany(Ship::class);
    }
}
