@extends('layouts.adminLayout')

@section('content')
    <h1 style="color: white">Všechny rezervace</h1>

    <table class="table" style="color: white">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Jméno</th>
                <th scope="col">Příjmení</th>
                <th scope="col">Email</th>
                <th scope="col">Kurt</th>
                <th scope="col">Datum</th>
                <th scope="col">Začátek</th>
                <th scope="col">Konec</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <th scope="row"><a href="{{ route('reservations.show', ['reservation' => $reservation->id]) }}">{{ $reservation->id }}</a></th>
                    <td>{{ $reservation->player_name }}</td>
                    <td>{{ $reservation->player_surname }}</td>
                    <td>{{ $reservation->email }}</td>
                    <td>{{ $reservation->court }}</td>
                    <td>{{ $reservation->date }}</td>
                    <td>{{ $reservation->start_time }}</td>
                    <td>{{ $reservation->end_time }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection