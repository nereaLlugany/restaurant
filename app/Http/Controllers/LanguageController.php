<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function index($idioma)
    {
        App::setlocale($idioma);
        session()->put('idioma', $idioma);

        return redirect()->back();
    }

    public static function getLanguageNames()
    {
        return [
            'ca' => 'Català',
            'en' => 'English',
            'es' => 'Español',
            'eu' => 'Euskara',
            'fr' => 'Français',
            'de' => 'Deutsch',
            'it' => 'Italiano',
            "zh" => "中文 (Zhōngwén)",
            "ja" => "日本語 (Nihongo)",
            "ru" => "Русский (Russkiy)",
        ];
    }
}
