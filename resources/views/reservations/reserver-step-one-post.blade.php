@extends('layouts.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="container">
    <div class="row justify-content-center">
        <h2>Recherche des vols</h2>
        <p>
            @foreach($passagers as $passager => $value)
            {{$passager}}s : {{$value}},
            @endforeach
        </p>
        <p>Classe : {{$categorie->designation}}</p>
        <div class="row">
            @foreach($results as $vol)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <b>{{$vol->lieu_depart->nom}} &agrave; {{$vol->lieu_arrivee->nom}}</b>
                        <p>{{$vol->avion->nom}}</p>
                    </div>
                    <label>{{$vol->date_depart}}</label>
                    <input type="radio" name="vol" id="vol" value="{{$vol->id}}">
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="details">
                    <div class="detail" id="detail"></div>
                    <div class="date" id="date"></div>
                    <div class="prix" id="prix">
                    </div>
                </div>
                <a href="{{route('reservations.step.two')}}" class="btn btn-primary" id="valider">Réserver</a>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#valider").hide();
        $('input[type=radio][name=vol]').change(function() {
            $("#detail").html("<b>Date sélectionnée</b>");
            $.ajax({
                url: "{{route('reservations.step.two.prix')}}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    vol: this.value
                },
                success: function(data) {
                    $("#prix").text('Total : ' + data.prix + 'Ar')
                    $("#date").text(data.date)
                    $("#valider").show();
                }
            })
        });
    });
</script>
@endsection