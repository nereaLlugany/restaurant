<?php

namespace App\Http\Controllers;

use App\Models\Resenya;
use App\Models\Reserva;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
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
        $menus = Menu::all();
        return view('dashboard', compact('menus', 'resenyes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $menus = Menu::all();
        return view('resenya.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menu,id',
            'comentari' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Resenya::create([
            'users_id' => Auth::id(),
            'menu_id' => $request->menu_id,
            'comentari_en' => $request->comentari,
            'comentari_ca' => $request->comentari,
            'comentari_es' => $request->comentari,
            'comentari_eu' => $request->comentari,
            'comentari_fr' => $request->comentari,
            'comentari_de' => $request->comentari,
            'comentari_it' => $request->comentari,
            'comentari_zh' => $request->comentari,
            'comentari_ja' => $request->comentari,
            'comentari_ru' => $request->comentari,
            'puntuacio' => $request->rating,
        ]);

        return redirect()->back()->with('success', 'Review submitted successfully!');
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
            'puntuacio' => 'required|integer|min:1|max:5',
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
