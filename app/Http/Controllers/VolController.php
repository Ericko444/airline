<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\CategorieAge;
use App\Models\Vol;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;

class VolController extends Controller
{
    public function index()
    {
        $vols = Vol::all();

        return view('vols.index', ['vols' => $vols]);
    }

    
}
