<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceAvion extends Model
{
    use HasFactory;

    public function avion()
    {
        return $this->belongsTo(PlaceAvion::class);
    }

    public function categorie_age()
    {
        return $this->belongsTo(CategorieAge::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
