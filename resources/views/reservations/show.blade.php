@extends('layouts.adminLayout')
@section('content')
  <h1 style="color: white">Reservation</h1>
  <ul style="color: white">
    <li>Jméno: {{ $reservation->player_name }}</li>
    <li>Příjmení: {{ $reservation->player_surname }}</li>
    <li>Email: {{ $reservation->email }}</li>
    <li>Kurt: {{ $reservation->court }}</li>
    <li>Datum: {{ $reservation->date }}</li>
    <li>Začátek: {{ $reservation->start_time }}</li>
    <li>Konec: {{ $reservation->end_time }}</li>
  </ul>
@endsection
