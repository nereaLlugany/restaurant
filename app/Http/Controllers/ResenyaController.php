<?php

namespace App\Http\Controllers;

use App\Models\Resenya;
use Illuminate\Http\Request;

class ResenyaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $resenyes = Resenya::all();
        return view('resenya.list', ['resenyes' => $resenyes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('resenya.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'text' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Resenya::create($request->all());
        return redirect()->route('resenyes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Resenya $resenya)
    {
        //
        return view('resenya.show', ['resenya' => $resenya]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resenya $resenya)
    {
        //
        return view('resenya.edit', ['resenya' => $resenya]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resenya $resenya)
    {
        //
        $request->validate([
            'text' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $resenya->update($request->all());
        return redirect()->route('resenyes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resenya $resenya)
    {
        //
        $resenya->delete();
        return redirect()->route('resenyes.index');
    }
}
