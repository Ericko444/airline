<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vol extends Model
{
    use HasFactory;

    public function lieu_depart()
    {
        return $this->belongsTo(Lieu::class, 'lieu_depart_id');
    }

    public function lieu_arrivee()
    {
        return $this->belongsTo(Lieu::class, 'lieu_arrivee_id');
    }

    public function avion()
    {
        return $this->belongsTo(Avion::class);
    }

    public function tarif_vols()
    {
        return $this->hasMany(TarifVol::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
