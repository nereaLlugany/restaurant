<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all menus

        $menus = Menu::all();

        $conversionRates = [
            'en' => 1.0,
            'fr' => 1.0,
            'it' => 1.0,
            'de' => 1.0,
            'es' => 1.0,
            'zh' => 7.3,
            'ja' => 144.8,
            'ru' => 95.5,
        ];

        $currencySymbols = [
            'en' => '€',
            'fr' => '€',
            'it' => '€',
            'de' => '€',
            'es' => '€',
            'zh' => '¥',
            'ja' => '¥',
            'ru' => '₽',
        ];

        $locale = app()->getLocale();
        $rate = $conversionRates[$locale] ?? 1.0;
        $symbol = $currencySymbols[$locale] ?? '€';

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

            $menu->convertedPrice = number_format($menu->preu_total * $rate, 2);
            $menu->currencySymbol = $symbol;
        }


        return view('menus', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('create_menu');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'preu_total' => 'required|numeric|min:0',
            'estat' => 'required|boolean',
            'ingredients_en' => 'required|string',
            'ingredients_ca' => 'required|string',
            'ingredients_es' => 'required|string',
            'ingredients_fr' => 'required|string',
            'ingredients_de' => 'required|string',
            'ingredients_it' => 'required|string',
            'ingredients_zh' => 'required|string',
            'ingredients_ru' => 'required|string',
            'ingredients_ja' => 'required|string',
        ]);

        $menu = Menu::create([
            'nom' => $validatedData['nom'],
            'preu_total' => $validatedData['preu_total'],
            'estat' => $validatedData['estat'],
            'ingredients_en' => $validatedData['ingredients_en'],
            'ingredients_ca' => $validatedData['ingredients_ca'],
            'ingredients_es' => $validatedData['ingredients_es'],
            'ingredients_fr' => $validatedData['ingredients_fr'],
            'ingredients_de' => $validatedData['ingredients_de'],
            'ingredients_it' => $validatedData['ingredients_it'],
            'ingredients_zh' => $validatedData['ingredients_zh'],
            'ingredients_ru' => $validatedData['ingredients_ru'],
            'ingredients_ja' => $validatedData['ingredients_ja'],
        ]);

        session()->flash('success', __('messages.menu_created_success'));

        return redirect()->route('menus');
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
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('edit_menu', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        //
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'preu_total' => 'required|numeric|min:0',
            'estat' => 'required|boolean',
            'ingredients_en' => 'required|string',
            'ingredients_fr' => 'nullable|string',
            'ingredients_es' => 'nullable|string',
            'ingredients_it' => 'nullable|string',
            'ingredients_de' => 'nullable|string',
            'ingredients_zh' => 'nullable|string',
            'ingredients_ru' => 'nullable|string',
            'ingredients_ja' => 'nullable|string',
        ]);


        $menu->update($request->all());
        return redirect()->route('menus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect()->route('menus');
    }
}
