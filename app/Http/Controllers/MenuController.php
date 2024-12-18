<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all menus
        $menus = Menu::all();

        foreach ($menus as $menu) {
            $ingredientField = 'ingredients_' . app()->getLocale();

            if (!empty($menu->$ingredientField)) {
                $ingredients = [];
                $currentIngredient = '';
                $ingredientString = $menu->$ingredientField;

                for ($i = 0; $i < strlen($ingredientString); $i++) {
                    if ($ingredientString[$i] === ',') {
                        $ingredients[] = trim($currentIngredient);
                        $currentIngredient = '';
                    } else {
                        $currentIngredient .= $ingredientString[$i];
                    }
                }

                if (!empty($currentIngredient)) {
                    $ingredients[] = trim($currentIngredient);
                }

                $menu->processedIngredients = $ingredients;
            } else {
                $menu->processedIngredients = [];
            }
        }

        return view('menus', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        Menu::create($request->all());
        return redirect()->route('menus.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
        return view('menu.show', ['menu' => $menu]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
        return view('menu.edit', ['menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        //
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        $menu->update($request->all());
        return redirect()->route('menus.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
        $menu->delete();
        return redirect()->route('menus.index');
    }
}
