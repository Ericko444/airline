<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    public function tarif_vols()
    {
        return $this->hasMany(TarifVol::class);
    }

    public function place_avions()
    {
        return $this->hasMany(PlaceAvion::class);
    }
}
