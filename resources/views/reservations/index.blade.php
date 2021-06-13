@extends('layouts.adminLayout')

@section('content')
    <div class="d-flex justify-content-between">
        <h1 class="text-light my-4 h1">Všechny rezervace</h1>
        <form action="{{ url('/search') }}" class="inline-form my-4" method="GET">
            @csrf
            <div class="input-group">
                <input class="form-control" type="search" placeholder="Hledat" name="surname">
                <button class="btn btn-info" type="submit" value="Hledat">Hledat podle příjmení</button>
            </div>
        </form>
    </div>

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