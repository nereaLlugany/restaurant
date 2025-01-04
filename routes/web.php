<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResenyaController;
use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Reserva;
use App\Models\Resenya;
use App\Models\Comanda;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/lang/{idioma}', [LanguageController::class, 'index'])->where('idioma', 'ca|en|es|eu|fr|it|de|zh|ja|ru');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

/* Home */

Route::get('/', function () {
    $menus = Menu::all();
    $reservations = Reserva::with('taula')->get();
    $reviews = Resenya::with('usuari')->get();

    return view('home', compact('menus', 'reservations', 'reviews'));
})->name('home');

/* Dashboard */

Route::get('/dashboard', function () {
    if (Auth::check()) {
        $user = Auth::user();

        $reservations = Reserva::where('users_id', $user->id)->with('taula')->get();

        $orders = Comanda::where('users_id', $user->id)->with('menus')->get();

        $resenyes = Resenya::where('users_id', $user->id)->get();

        $menus = Menu::all();

        return view('dashboard', compact('reservations', 'orders', 'resenyes', 'menus'));
    }

    return redirect()->route('login');
})->middleware(['auth', 'verified'])->name('dashboard');

/* Reservations */

Route::middleware('auth')->group(function () {
    Route::get('/reservations', [ReservaController::class, 'userReservations'])->name('reservations');
    Route::get('/reservation/make', [ReservaController::class, 'create'])->name('reserves.create')->middleware('auth');
    Route::post('/reservation/store', [ReservaController::class, 'store'])->name('reserves.store');
    Route::get('/reservations/{id}/edit', [ReservaController::class, 'edit'])->name('reserves.edit');
    Route::put('/reservation/update/{reserva}', [ReservaController::class, 'update'])->name('reserves.update')->middleware('auth');
    Route::delete('/reservation/delete/{id}', [ReservaController::class, 'destroy'])->name('reserves.destroy')->middleware('auth');
    Route::patch('/reserves/{reservation}/confirm', [ReservaController::class, 'confirm'])->name('reserves.confirm');
});

/* Menus */

Route::get('/menus', [MenuController::class, 'index'])->name('menus');
Route::post('/menus', [MenuController::class, 'store'])->name('menus.store');
Route::get('/menus/edit/{menu}', [MenuController::class, 'edit'])->name('menus.edit');
Route::put('/menus/{menu}', [MenuController::class, 'update'])->name('menus.update');
Route::get('/menu/edit/{id}', [MenuController::class, 'edit'])->name('edit_menu');

Route::middleware(['auth', 'can:administrar'])->group(function () {
    Route::get('/menu/edit/{id}', [MenuController::class, 'edit'])->name('edit_menu');
    Route::delete('/menu/delete/{id}', [MenuController::class, 'destroy'])->name('menus.destroy');
    Route::get('/menu/create', [MenuController::class, 'create'])->name('create_menu');
    Route::post('/menu/store', [MenuController::class, 'store'])->name('menus.store');
});

/* Reviews */

Route::post('/reviews', [ReservaController::class, 'store'])->name('reviews.store');
Route::get('/menu/{id}/reviews', [MenuController::class, 'showReviews'])->name('menu.reviews');

Route::post('/reviews/store', [ResenyaController::class, 'store'])->name('reviews.store');
Route::post('/review', [ResenyaController::class, 'store'])->middleware('auth');

/* About Us */

Route::get('/about-us', function () {
    return view('aboutus');
})->name('about-us');

/* Profile */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
