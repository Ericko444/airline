@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2>Welcome to airline</h2>
        <a href="{{route('reservations.step.one')}}">Réserver un vol</a>
        <div class="col-md-10">
            <p class="message">{{session('message')}}</p>
        </div>
    </div>
</div>
</div>
@endsection