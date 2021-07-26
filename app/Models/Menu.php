<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;


    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
