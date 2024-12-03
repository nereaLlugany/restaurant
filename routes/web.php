<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantStatusController;

    
Route::get('/', function () {
    return view('welcome');
});
