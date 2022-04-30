@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h2>Welcome to airline</h2>
        <div class="col-md-10">
            <form action="{{route('reservations.step.one.post')}}" method="POST" class="form">
                @csrf
                <div class="card">
                    <div class="card-header">Recherche de vols</div>
                    <div class="card-body">
                        <div class="options">
                            <input type="radio" class="btn-check" name="option" id="success-outlined" autocomplete="off" checked value="a">
                            <label class="btn btn-outline-primary" for="success-outlined">Aller</label>
                            <input type="radio" class="btn-check" name="option" id="danger-outlined" autocomplete="off" value="ar">
                            <label class="btn btn-outline-primary" for="danger-outlined">Aller - Retour</label>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Départ</label>
                                    <select name="lieu_depart" id="lieu_depart" class="form-control">
                                        @foreach($lieux as $lieu)
                                        <option value="{{$lieu->id}}">{{$lieu->nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Arrivée</label>
                                    <select name="lieu_arrivee" id="lieu_arrivee" class="form-control">
                                        @foreach($lieux as $lieu)
                                        <option value="{{$lieu->id}}">{{$lieu->nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date départ aller</label>
                                    <input type="date" name="date_depart_aller" id="date_depart_aller" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-6" id="date-retour">
                                <div class="form-group">
                                    <label>Date départ retour</label>
                                    <input type="date" name="date_depart_retour" id="date_depart_retour" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Passagers</label>
                            <input type="text" name="" id="" class="form-control" data-bs-toggle="modal" data-bs-target="#passagersModal" readonly>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Catégorie</label>
                            <select name="categorie" id="categorie" class="form-control">
                                @foreach($categories as $categorie)
                                <option value="{{$categorie->id}}">{{$categorie->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <input type="submit" value="Rechercher" class="btn btn-primary">
                    </div>
                    <div class="modal fade" id="passagersModal" tabindex="-1" aria-labelledby="passagersModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="passagersModalLabel">Passagers</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            @foreach($categorie_ages as $ca)
                                            <div>
                                                <label>{{$ca->designation}} ({{$ca->age_min}} &agrave; {{$ca->age_max}} ans)</label>
                                                <br>
                                                <button onclick="dec('pass-{{$ca->id}}')" type="button" class="number-button">-</button>
                                                <input name="pass-{{$ca->id}}" type="text" readonly value="0">
                                                <button onclick="inc('pass-{{$ca->id}}')" type="button" class="number-button">+</button>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
<script src="/js/number.js"></script>
<script>
    $(document).ready(function() {
        $("#date-retour").hide();
        $('input[type=radio][name=option]').change(function() {
            if (this.value === "ar") {
                $("#date-retour").show();
            } else {
                $("#date-retour").hide();
            }
        });
    });
</script>

@endsection