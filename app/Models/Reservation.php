<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'vol_aller_id',
        'vol_retour_id',
        'montant',
        'places',
        'categorie_id',
    ];

    public function passagers()
    {
        return $this->hasMany(Passager::class);
    }

    public function vol_aller()
    {
        return $this->belongsTo(Vol::class, 'vol_aller_id');
    }

    public function vol_retour()
    {
        return $this->belongsTo(Vol::class, 'vol_retour_id');
    }
}
