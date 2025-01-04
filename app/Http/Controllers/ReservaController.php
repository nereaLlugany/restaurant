<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Taula;
use DateTime;

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
        $tables = Taula::all();
        return view('make_reservation', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
            'num_guests' => 'required|integer|min:1',
            'taula_id' => 'required|exists:taula,id',
            'estat' => 'nullable|string', 
        ]);

        $dateTime = $validated['date'] . ' ' . $validated['time'];
        $timezone = config('app.timezone');

        $dateTimeObj = \DateTime::createFromFormat('Y-m-d H:i', $dateTime, new \DateTimeZone($timezone));

        if (!$dateTimeObj) {
            session()->flash('error_debug', 'Invalid date and time combination: ' . $dateTime);
            return back()->withErrors(['date_time' => __('messages.invalid_date')])->withInput();
        }

        $table = Taula::find($validated['taula_id']);

        if ($validated['num_guests'] > $table->capacitat) {
            session()->flash('error_debug', 'Guests (' . $validated['num_guests'] . ') exceed table capacity (' . $table->capacitat . ').');
            return back()->withErrors(['date_time' => __('messages.invalid_num_guests')])->withInput();
        }

        try {
            Reserva::create([
                'users_id' => Auth::id(),
                'hora' => $dateTimeObj->format('Y-m-d H:i:s'),
                'num_guests' => $validated['num_guests'],
                'taula_id' => $validated['taula_id'],
                'estat' => 'pending',
            ]);

            session()->flash('success', __('messages.success_create_reservation'));
            return redirect()->route('reservations');
        } catch (\Exception $e) {
            session()->flash('error', __('messages.error_create_reservation'));
            return back()->withInput();
        }
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
    public function edit($id)
    {
        //
        $reservation = Reserva::findOrFail($id);
        $tables = Taula::all();
        $dateTime = new DateTime($reservation->hora);
        $reservationDate = $dateTime->format('Y-m-d');
        $reservationTime = $dateTime->format('H:i');
        $num_guests = $reservation->num_guests;
        $table_id = $reservation->taula_id;
        $status = $reservation->estat;

        return view('edit_reservation', compact('reservation', 'tables','reservationDate', 'reservationTime', 'num_guests', 'table_id'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reserva $reserva)
    {
        //
        $validatedData = $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
            'num_guests' => 'required|integer|min:1',
            'taula_id' => 'required|exists:taula,id',
            'estat' => 'nullable|string', 
        ]);

        $dateTime = $validatedData['date'] . ' ' . $validatedData['time'];
        $timezone = config('app.timezone');

        $dateTimeObj = \DateTime::createFromFormat('Y-m-d H:i', $dateTime, new \DateTimeZone($timezone));

        if (!$dateTimeObj) {
            session()->flash('error_debug', 'Invalid date and time combination: ' . $dateTime);
            return back()->withErrors(['date_time' => __('messages.invalid_date')])->withInput();
        }

        $table = Taula::find($validatedData['taula_id']);
        if ($validatedData['num_guests'] > $table->capacitat) {
            session()->flash('error_debug', 'Guests (' . $validatedData['num_guests'] . ') exceed table capacity (' . $table->capacitat . ').');
            return back()->withErrors(['date_time' => __('messages.invalid_num_guests')])->withInput();
        }

        try {
            $reserva->update([
                'hora' => $dateTimeObj->format('Y-m-d H:i:s'),
                'num_guests' => $validatedData['num_guests'],
                'taula_id' => $validatedData['taula_id'],
                'estat' => $validatedData['estat'],
            ]);
            $reserva = Reserva::find($request->route('reserva')); 

            session()->flash('success', __('messages.success_update_reservation'));
            return redirect()->route('reservations');
        } catch (\Exception $e) {
            session()->flash('error', __('messages.error_update_reservation'));
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $reserva = Reserva::findOrFail($id);
            $reserva->delete();

            session()->flash('success', __('messages.success_delete'));
            return redirect()->route('reservations');
        } catch (\Exception $e) {
            session()->flash('error', __('messages.error_delete'));
            return redirect()->route('reservations');
        }
    }

    public function userReservations()
    {
        $reserves = Reserva::where('users_id', Auth::id())->get();
        return view('reservations', ['reserves' => $reserves]);
    }

    public function confirm($id)
    {
        $reservation = Reserva::findOrFail($id);
        if ($reservation->estat === 'Pending' || $reservation->estat === 'pending') {
            $reservation->estat = 'Confirmed'; 
            $reservation->save();
        }

        return redirect()->back()->with('success', __('messages.confirm_reservation_success'));
    }

}
