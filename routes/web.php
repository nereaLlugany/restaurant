<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Menu;
use App\Models\Reserva;
use App\Models\Resenya;

Route::get('/lang/{idioma}', [LanguageController::class, 'index'])->where('idioma', 'ca|en|es|fr|it|de');

Route::get('/', function () {
    $menus = Menu::all();
    $reservations = Reserva::with('taula')->get();
    $reviews = Resenya::with('usuari')->get();

    return view('home', compact('menus', 'reservations', 'reviews'));
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
