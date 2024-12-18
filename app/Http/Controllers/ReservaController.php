<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;
use DateInterval;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $reserves = Reserva::all();

        foreach ($reserves as $reservation) {
            $reservationDate = new DateTime($reservation->data);
            $today = new DateTime();

            if ($today > $reservationDate) {
                $reservation->delete();
            }
        }

        $reserves = Reserva::all();

        return view('dashboard', ['reserves' => $reserves]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('reserva.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'data' => 'required|date',
            'hora' => 'required|time',
            'taula_id' => 'required|exists:taulas,id',
        ]);

        Reserva::create($request->all());
        return redirect()->route('reserves.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reserva $reserva)
    {
        //
        return view('reserva.show', ['reserva' => $reserva]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reserva $reserva)
    {
        //
        return view('reserva.edit', ['reserva' => $reserva]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reserva $reserva)
    {
        //
        $request->validate([
            'data' => 'required|date',
            'hora' => 'required|time',
            'taula_id' => 'required|exists:taulas,id',
        ]);

        $reserva->update($request->all());
        return redirect()->route('reserves.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserva $reserva)
    {
        //
        $reserva->delete();
        return redirect()->route('reserves.index');
    }

    public function userReservations()
    {
        $reserves = Reserva::where('users_id', Auth::id())->get();
        return view('reservations', ['reserves' => $reserves]); 
    }
}
