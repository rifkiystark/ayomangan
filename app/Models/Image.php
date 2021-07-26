<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function imageMenu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function imagePlace()
    {
        return $this->belongsTo(Place::class);
    }
}
