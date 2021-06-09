<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index', ['reservations' => $reservations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservationRequest $request)
    {
        $reservation = new Reservation();
        $reservation->player_name = $request->player_name;
        $reservation->player_surname = $request->player_surname;
        $reservation->email = $request->email;
        $reservation->court = $request->court;
        $reservation->date = $request->date;
        $reservation->start_time = $request->start_time;
        $reservation->end_time = $request->end_time;

        $existing = DB::table('reservations')->where(
            fn ($q) => $q->whereBetween('start_time', [$request->start_time, $request->end_time])
            ->orWhereBetween('end_time', [$request->start_time, $request->end_time])
            ->orWhere(
                fn ($q) => $q->where('start_time', '<', $request->end_time)
                ->where('end_time', '>', $request->end_time)
            )
        )
        ->where('court', $request->court)
        ->where('date', $request->date)
        ->get();

        if($existing->count() > 0) {
            $reservation->delete();
            return redirect()->back()->with('alert', 'Tento termín je na zvoleném kurtu už obsazen');
        }
        else {
            $reservation->save();
            return redirect()->route('reservations.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::find($id);
        if($reservation) {
            return view('reservations.show', array('reservation' => $reservation));
        }
        else {
            return view('reservations.not_found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservation = Reservation::find($id);
        return view('reservations.edit', ['reservation' => $reservation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservationRequest $request)
    {
        $reservation = Reservation::find($request->id);
        $reservation->player_name = $request->player_name;
        $reservation->player_surname = $request->player_surname;
        $reservation->email = $request->email;
        $reservation->court = $request->court;
        $reservation->date = $request->date;
        $reservation->start_time = $request->start_time;
        $reservation->end_time = $request->end_time;
        $reservation->save();

        return redirect()->route('reservations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();

        return redirect()->route('reservations.index');
    }
}
