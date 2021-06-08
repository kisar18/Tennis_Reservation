@extends('layouts.adminLayout')

@section('content')
    <h1 style="color: white">Všechny rezervace, pro detail klikněte na ID rezervace</h1>

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
                <th scope="col">Akce</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <th scope="row"><a href="{{ route('reservations.show', ['reservation' => $reservation->id]) }}" class="text-light">{{ $reservation->id }}</a></th>
                    <td>{{ $reservation->player_name }}</td>
                    <td>{{ $reservation->player_surname }}</td>
                    <td>{{ $reservation->email }}</td>
                    <td>{{ $reservation->court }}</td>
                    <td>{{ $reservation->date }}</td>
                    <td>{{ $reservation->start_time }}</td>
                    <td>{{ $reservation->end_time }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('reservations.edit', ['reservation' => $reservation->id]) }}" class="btn btn-warning">Upravit</a>
                            <a href={{ 'destroy/'.$reservation['id'] }} class="btn btn-danger" onclick="return confirm('Opravdu chcete zrušit rezervaci')">Smazat</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection