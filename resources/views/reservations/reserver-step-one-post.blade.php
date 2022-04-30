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
        <p>Option : {{$option}}</p>
        <p>Classe : {{$categorie->designation}}</p>
        <h4>Aller</h4>
        <div class="row">
            @foreach($results['aller'] as $vol)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <b>{{$vol->lieu_depart->nom}} &agrave; {{$vol->lieu_arrivee->nom}}</b>
                        <p>{{$vol->avion->nom}}</p>
                    </div>
                    <label>{{$vol->date_depart}}</label>
                    <input type="radio" name="vol_aller" id="vol_aller" value="{{$vol->id}}">
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
            </div>
            <div class="col-md-4"></div>
        </div>
        @if($option == 'ar')
        <h4>Retour</h4>
        <div class="row">
            @foreach($results['retour'] as $vol)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <b>{{$vol->lieu_depart->nom}} &agrave; {{$vol->lieu_arrivee->nom}}</b>
                        <p>{{$vol->avion->nom}}</p>
                    </div>
                    <label>{{$vol->date_depart}}</label>
                    <input type="radio" name="vol_retour" id="vol_retour" value="{{$vol->id}}">
                </div>
            </div>
            @endforeach

        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="details-retour">
                    <div class="detail_retour" id="detail_retour"></div>
                    <div class="date_retour" id="date_retour"></div>
                    <div class="prix_retour" id="prix_retour">
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <a href="{{route('reservations.step.two')}}" class="btn btn-primary" id="valider">Réserver</a>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#valider").hide();
        $(":radio").change(function() {
            var names = {};
            $(':radio').each(function() {
                names[$(this).attr('name')] = true;
            });
            var count = 0;
            $.each(names, function() {
                count++;
            });
            if ($(':radio:checked').length === count) {
                $("#valider").show();
            }
        }).change();
        $('input[type=radio][name=vol_aller]').change(function() {
            $("#detail").html("<b>Date sélectionnée aller</b>");
            $.ajax({
                url: "{{route('reservations.step.two.prix')}}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    vol: this.value,
                    option: 'aller'
                },
                success: function(data) {
                    $("#prix").text('Total : ' + data.prix + 'Ar')
                    $("#date").text(data.date)
                }
            })
        });
        $('input[type=radio][name=vol_retour]').change(function() {
            $("#detail_retour").html("<b>Date sélectionnée retour</b>");
            $.ajax({
                url: "{{route('reservations.step.two.prix')}}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    vol: this.value,
                    option: 'retour'
                },
                success: function(data) {
                    $("#prix_retour").text('Total : ' + data.prix + 'Ar')
                    $("#date_retour").text(data.date)
                }
            })
        });
    });
</script>
@endsection