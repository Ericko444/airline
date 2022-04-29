<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifVol extends Model
{
    use HasFactory;

    public function vol()
    {
        return $this->belongsTo(Vol::class);
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
