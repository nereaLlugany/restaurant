<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Reserva;
use App\Models\Resenya;
use App\Models\Comanda;

Route::get('/lang/{idioma}', [LanguageController::class, 'index'])->where('idioma', 'ca|en|es|fr|it|de|zh|ja|ru');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/', function () {
    $menus = Menu::all();
    $reservations = Reserva::with('taula')->get();
    $reviews = Resenya::with('usuari')->get();

    return view('home', compact('menus', 'reservations', 'reviews'));
})->name('home');

Route::get('/dashboard', function () {
    if (Auth::check()) {
        $user = Auth::user();

        $reservations = Reserva::where('users_id', $user->id)->with('taula')->get();

        $orders = Comanda::where('users_id', $user->id)->with('menus')->get();

        return view('dashboard', compact('reservations', 'orders'));
    }

    return redirect()->route('login');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/reservations', [ReservaController::class, 'userReservations'])->middleware(['auth'])->name('reservations');

Route::get('/reservation/edit/{id}', [ReservaController::class, 'edit'])->name('reserves.edit')->middleware('auth');
Route::put('/reservation/update/{id}', [ReservaController::class, 'update'])->name('reserves.update')->middleware('auth');
Route::delete('/reservation/delete/{id}', [ReservaController::class, 'destroy'])->name('reserves.destroy')->middleware('auth');

Route::get('/menus', [MenuController::class, 'index'])->name('menus');
Route::post('/menus', [MenuController::class, 'store'])->name('menus.store');
Route::get('/menus/edit/{menu}', [MenuController::class, 'edit'])->name('menus.edit');
Route::put('/menus/{menu}', [MenuController::class, 'update'])->name('menus.update');
Route::get('/menu/edit/{id}', [MenuController::class, 'edit'])->name('edit_menu');



Route::get('/about-us', function () {
    return view('aboutus');
})->name('about-us');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'can:administrar'])->group(function () {
    Route::get('/menu/edit/{id}', [MenuController::class, 'edit'])->name('edit_menu');
    Route::delete('/menu/delete/{id}', [MenuController::class, 'destroy'])->name('menus.destroy');
    Route::get('/menu/create', [MenuController::class, 'create'])->name('create_menu');
    Route::post('/menu/store', [MenuController::class, 'store'])->name('menus.store');
});

require __DIR__ . '/auth.php';
