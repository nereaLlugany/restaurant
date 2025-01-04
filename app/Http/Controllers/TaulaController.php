<?php

namespace App\Http\Controllers;

use App\Models\Taula;
use Illuminate\Http\Request;

class TaulaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $taules = Taula::all();
        return view('taula.list', ['taules' => $taules]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('taula.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'num_seients' => 'required|integer',
        ]);

        Taula::create($request->all());
        return redirect()->route('taules.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Taula $taula)
    {
        //
        return view('taula.show', ['taula' => $taula]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Taula $taula)
    {
        //
        return view('taula.edit', ['taula' => $taula]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Taula $taula)
    {
        //´
        $request->validate([
            'num_seients' => 'required|integer',
        ]);

        $taula->update($request->all());
        return redirect()->route('taules.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Taula $taula)
    {
        //
        $taula->delete();
        return redirect()->route('taules.index');
    }
}
