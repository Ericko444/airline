<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lieu extends Model
{
    use HasFactory;

    public function vols_departs()
    {
        return $this->hasMany(Vol::class, 'lieu_depart_id');
    }

    public function vols_arrivees()
    {
        return $this->hasMany(Vol::class, 'lieu_arrivee_id');
    }
}
