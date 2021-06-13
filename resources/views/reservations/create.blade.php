@extends('layouts.adminLayout')
@section('content')
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <script>
            var msg = '{{Session::get('alert')}}';
            var exist = '{{Session::has('alert')}}';
            if(exist) {
                alert(msg);
            }
        </script>

        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf

            <div class="form-group mt-3">
            <label for="player_name" class="text-light">Jméno:</label>
            <input type="text"
                class="form-control rounded" name="player_name" id="player_name" aria-describedby="helpId" placeholder="">
            </div>

            <div class="form-group mt-3">
            <label for="player_surname" class="text-light">Přijmení:</label>
            <input type="text"
                class="form-control rounded" name="player_surname" id="player_surname" aria-describedby="helpId" placeholder="">
            </div>

            <div class="form-group mt-3">
                <label for="email" class="text-light">Email:</label>
                <input type="text"
                    class="form-control rounded" name="email" id="email" aria-describedby="helpId" placeholder="">
            </div>

            <div class="form-group mt-3">
                <span>
                    <label for="court" class="text-light">Kurt:</label>
                    <select name="court" id="court" class="rounded">
                        <option value="Kurt 1">Kurt 1</option>
                        <option value="Kurt 2">Kurt 2</option>
                    </select>
                </span>

                <span class="mx-5">
                    <label for="Date" class="text-light">Datum:</label>
                    <input type="date" id="date" name="date" class="rounded">
                </span>

                <span class="mx-5">
                    <label for="start_time" class="text-light">Začátek:</label>
                    <select name="start_time" id="start_time" class="rounded">
                        <option value="09:00:00">9:00</option>
                        <option value="10:00:00">10:00</option>
                        <option value="11:00:00">11:00</option>
                        <option value="12:00:00">12:00</option>
                        <option value="13:00:00">13:00</option>
                        <option value="14:00:00">14:00</option>
                        <option value="15:00:00">15:00</option>
                        <option value="16:00:00">16:00</option>
                        <option value="17:00:00">17:00</option>
                        <option value="18:00:00">18:00</option>
                        <option value="19:00:00">19:00</option>
                    </select>
                </span>

                <span class="mx-5">
                    <label for="end_time" class="text-light">Konec:</label>
                    <select name="end_time" id="end_time" class="rounded">
                        <option value="10:00:00">10:00</option>
                        <option value="11:00:00">11:00</option>
                        <option value="12:00:00">12:00</option>
                        <option value="13:00:00">13:00</option>
                        <option value="14:00:00">14:00</option>
                        <option value="15:00:00">15:00</option>
                        <option value="16:00:00">16:00</option>
                        <option value="17:00:00">17:00</option>
                        <option value="18:00:00">18:00</option>
                        <option value="19:00:00">19:00</option>
                        <option value="20:00:00">20:00</option>
                    </select>
                </span>
            </div>

            <button type="submit" class="btn btn-primary mt-4">Rezervovat</button>
        </form>
    </div>
@endsection