@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
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
            <form action="{{route('reservations.step.two.post')}}" method="post">
                <div class="card-header">
                    <h3>Les passagers</h3>
                </div>
                <div class="card-body">
                    @csrf
                    @foreach($detail["passagers"] as $passager_cat => $value)
                    <div> @for($i = 1; $i <= $value; $i++) <div class="passager card">
                            <div class="card-header">
                                {{$passager_cat}} - {{$i}}
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" name="nom[]" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Prénom</label>
                                    <input type="text" name="prenom[]" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="mail[]" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Tel</label>
                                    <input type="text" name="tel[]" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Adresse</label>
                                    <input type="text" name="adresse[]" class="form-control">
                                </div>
                            </div>
                    </div>
                    @endfor
                </div>
                @endforeach

        </div>
        <div class="card-footer">
            <input type="submit" value="Réserver" class="btn btn-success">
        </div>
        </form>
    </div>
</div>
</div>
@endsection