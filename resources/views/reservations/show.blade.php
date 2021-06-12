@extends('layouts.adminLayout')
@section('content')
<div class="text-center my-5">
  <h1 class="h1 text-light">ID rezervace: {{$reservation->id}}</h1>
  <ul style="color: white">
    <li class="h2">Jméno: {{ $reservation->player_name }}</li>
    <li class="h2">Příjmení: {{ $reservation->player_surname }}</li>
    <li class="h2">Email: {{ $reservation->email }}</li>
    <li class="h2">Kurt: {{ $reservation->court }}</li>
    <li class="h2">Datum: {{ $reservation->date }}</li>
    <li class="h2">Začátek: {{ $reservation->start_time }}</li>
    <li class="h2">Konec: {{ $reservation->end_time }}</li>
  </ul>
</div>
@endsection
