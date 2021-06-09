@extends('layouts.adminLayout')

@section('content')
    <h1 style="color: white">Všechny rezervace</h1>

    <table class="table text-center" style="color: white">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Příjmení</th>
                <th scope="col">Kurt</th>
                <th scope="col">Datum</th>
                <th scope="col">Začátek</th>
                <th scope="col">Konec</th>
                <th scope="col">Možnosti</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <th scope="row">{{ $reservation->id }}</th>
                    <td>{{ $reservation->player_surname }}</td>
                    <td>{{ $reservation->court }}</td>
                    <td>{{ $reservation->date }}</td>
                    <td>{{ $reservation->start_time }}</td>
                    <td>{{ $reservation->end_time }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('reservations.show', ['reservation' => $reservation->id]) }}" class="btn btn-primary rounded">Detail</a>
                            <a href="{{ route('reservations.edit', ['reservation' => $reservation->id]) }}" class="btn btn-warning rounded mx-2">Upravit</a>
                            <a href={{ 'destroy/'.$reservation['id'] }} class="btn btn-danger rounded" onclick="return confirm('Opravdu chcete zrušit rezervaci')">Smazat</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection