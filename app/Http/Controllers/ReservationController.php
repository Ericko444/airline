<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\CategorieAge;
use App\Models\Lieu;
use App\Models\Passager;
use App\Models\Reservation;
use App\Models\Vol;
use Illuminate\Http\Request;
use DateInterval;
use DateTime;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    //

    public function reserverStepOne()
    {
        $lieux = Lieu::all();
        $categories = Categorie::all();
        $categorie_ages = CategorieAge::all();
        return view('reservations.reserver-step-one', ['lieux' => $lieux, 'categories' => $categories, 'categorie_ages' => $categorie_ages]);
    }

    public function verifPlaces($vol, $quantite, $categorie)
    {
        $verif = true;
        $occupied = 0;
        foreach ($vol->avion->place_avions as $place) {
            if ($place->categorie->id == $categorie) {
                $occupied = Reservation::select(DB::raw('SUM(reservations.places) AS places'))->where('reservations.categorie_id', $categorie)->get();
                if ($quantite + $occupied[0]->places > $place->places) {
                    $verif = false;
                }
            }
        }

        return $verif;
    }

    public function reserverStepOnePost(Request $request)
    {

        $validateData = $request->validate(
            [
                'lieu_depart' => 'required',
                'lieu_arrivee' => 'required',
                'date_depart_aller' => 'required',
                'categorie' => 'required',
                'option' => 'required',
            ]
        );
        $classe = request('categorie');
        $classe = Categorie::findOrFail($classe);
        $categs = CategorieAge::all();
        $passagers = [];
        $nombre = 0;
        foreach ($categs as $categ) {
            if (request('pass-' . $categ->id) != null && request('pass-' . $categ->id) != "0") {
                $nb = intval(request('pass-' . $categ->id));
                $passagers[$categ->id] = $nb;
                $nombre += $nb;
            }
        }
        $validateData["passagers"] = $passagers;
        $validateData["nombre"] = $nombre;
        $request->session()->put('requete', $validateData);
        $date = new DateTime(request('date_depart_aller'));
        $dateFrom = $date->sub(new DateInterval('P3D'))->format('Y-m-d');
        $dateTo = $date->add(new DateInterval('P6D'))->format('Y-m-d');
        $results = [];
        $results['aller'] = Vol::whereRaw("(date_depart >= ? AND date_depart <= ?)", [
            $dateFrom . " 00:00:00",
            $dateTo . " 23:59:59"
        ])
            ->where('lieu_depart_id', request('lieu_depart'))
            ->where('lieu_arrivee_id', request('lieu_arrivee'))
            ->get();

        $valiny = [];

        foreach ($results['aller'] as $vol) {
            if ($this->verifPlaces($vol, $nombre, $classe->id)) {
                $valiny['aller'][] = $vol;
            }
        }

        if (
            request('date_depart_retour') &&
            request('date_depart_retour') != ""
        ) {
            $date = new DateTime(request('date_depart_retour'));
            $dateFrom = $date->sub(new DateInterval('P3D'))->format('Y-m-d');
            $dateTo = $date->add(new DateInterval('P6D'))->format('Y-m-d');
            $results['retour'] = Vol::whereRaw("(date_depart >= ? AND date_depart <= ?)", [
                $dateFrom . " 00:00:00",
                $dateTo . " 23:59:59"
            ])
                ->where('lieu_depart_id', request('lieu_arrivee'))
                ->where('lieu_arrivee_id', request('lieu_depart'))
                ->get();


            foreach ($results['retour'] as $vol) {
                if ($this->verifPlaces($vol, $nombre, $classe->id)) {
                    $valiny['retour'][] = $vol;
                }
            }
        }

        return view('reservations.reserver-step-one-post', ['results' => $valiny, 'passagers' => $passagers, 'categorie' => $classe, 'option' => $validateData['option']]);
    }



    public function getPrix(Request $request)
    {
        $vol_id = $request->input('vol');
        $option = $request->input('option');
        $vol = Vol::findOrFail($vol_id);
        $requete = $request->session()->get('requete');
        $passagers = $requete['passagers'];
        $categorie = $requete['categorie'];
        $montant = 0;
        foreach ($passagers as $passager => $value) {
            foreach ($vol->tarif_vols as $tarif) {
                if ($tarif->categorie_age->id == $passager && $tarif->categorie->id == $categorie) {
                    $montant += ($tarif->montant * $value);
                }
            }
        }
        $requete['montant_' . $option] = $montant;
        $requete['vol_' . $option] = $vol;
        $request->session()->put('requete', $requete);
        $date = date_create($vol->date_depart);
        $date = date_format($date, 'l d/m/y H:i:s');
        return response()->json(['prix' => $montant, 'date' => $date]);
    }

    public function reserverStepTwo(Request $request)
    {
        $requete = $request->session()->get('requete');
        return view('reservations.reserver-step-two', ['detail' => $requete]);
    }

    public function reserverStepTwoPost(Request $request)
    {
        $passagers = [];
        $requete = $request->session()->get('requete');
        $validateData = $request->validate(
            [
                'nom' => 'required',
                'prenom' => 'required',
                'mail' => 'required',
                'tel' => 'required',
                'adresse' => 'required',
            ]
        );
        for ($i = 0; $i < count($validateData["nom"]); $i++) {
            array_push($passagers, ["nom" => $validateData["nom"][$i], "prenom" => $validateData["prenom"][$i], "mail" => $validateData["mail"][$i], "mail" => $validateData["mail"][$i], "tel" => $validateData["tel"][$i], "adresse" => $validateData["adresse"][$i]]);
        }
        $requete['passagers_details'] = $passagers;
        $request->session()->put('requete', $requete);
        return view('reservations.reserver-step-two-post', ['detail' => $requete]);
    }

    public function reserverStepThree(Request $request)
    {
        $requete = $request->session()->get('requete');
        $montant = $requete['option'] == "ar" ? $requete['montant_aller'] + $requete['montant_retour'] : $requete['montant_aller'];
        $reservation_inserted = $requete['option'] == "ar" ? Reservation::create([
            'vol_aller_id' => $requete['vol_aller']->id,
            'vol_retour_id' => $requete['vol_retour']->id,
            'montant' => $montant,
            'places' => $requete['nombre'],
            'categorie_id' => $requete['categorie'],
        ]) : Reservation::create([
            'vol_aller_id' => $requete['vol_aller']->id,
            'montant' => $montant,
            'places' => $requete['nombre'],
            'categorie_id' => $requete['categorie'],
        ]);
        foreach ($requete['passagers_details'] as $passager) {
            $pass = new Passager();
            $pass->nom = $passager["nom"];
            $pass->prenom = $passager["prenom"];
            $pass->mail = $passager["mail"];
            $pass->tel = $passager["tel"];
            $pass->adresse = $passager["adresse"];
            $pass->reservation_id = $reservation_inserted->id;

            $pass->save();
        }
        return redirect('/')->with('message', 'Réservation effectuée');
    }
}
