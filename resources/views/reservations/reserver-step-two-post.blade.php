@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h2>Confirmation réservation</h2>
        <div class="card">
            <div class="card-header">
                <h3>Votre voyage</h3>
            </div>
            <div class="card-body">
                <h4>{{$detail["vol"]->lieu_depart->nom}} &agrave; {{$detail["vol"]->lieu_arrivee->nom}}</h4>
                <p>Montant total : {{$detail["montant"]}} Ar</p>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3>Les passagers</h3>
            </div>
            <div class="card-body">
                @foreach($detail["passagers_details"] as $passager)
                <div class="card">
                    <p>Nom: {{$passager["nom"]}}</p>
                    <p>Prenom: {{$passager["prenom"]}}</p>
                    <p>Mail: {{$passager["mail"]}}</p>
                    <p>Tel: {{$passager["tel"]}}</p>
                    <p>Adresse: {{$passager["adresse"]}}</p>
                </div>
                @endforeach
            </div>
            <div class="card-footer">
                <form action="{{route('reservations.step.three')}}" method="post">
                    @csrf
                    <input type="submit" value="Valider réservation" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection