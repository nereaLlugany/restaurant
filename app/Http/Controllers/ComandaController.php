<?php

namespace App\Http\Controllers;

use App\Models\Comanda;
use Illuminate\Http\Request;

class ComandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $comandes = Comanda::with('menus')->get();

        return view('dashboard', ['comanda' => $comandes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('comanda.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'data' => 'required|date',
            'total' => 'required|numeric',
        ]);

        Comanda::create($request->all());
        return redirect()->route('comandes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comanda $comanda)
    {
        //
        return view('comanda.show', ['comanda' => $comanda]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comanda $comanda)
    {
        //
        return view('comanda.edit', ['comanda' => $comanda]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comanda $comanda)
    {
        //
        $request->validate([
            'data' => 'required|date',
            'total' => 'required|numeric',
        ]);

        $comanda->update($request->all());
        return redirect()->route('comandes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comanda $comanda)
    {
        //
        $comanda->delete();
        return redirect()->route('comandes.index');
    }
}
