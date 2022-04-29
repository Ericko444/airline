<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avion extends Model
{
    use HasFactory;

    public function vols()
    {
        return $this->hasMany(Vol::class);
    }

    public function place_avions()
    {
        return $this->hasMany(PlaceAvion::class);
    }
}
