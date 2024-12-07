<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function index($idioma){ 
        App::setlocale($idioma);  
        session()->put('idioma', $idioma);  

        return redirect()->back(); 
    }
 }
