@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2>Liste des vols</h2>
        <ul>
            @foreach($vols as $vol)
            <li> De {{$vol->lieu_depart->nom}} &agrave; {{$vol->lieu_arrivee->nom}} </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection