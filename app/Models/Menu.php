<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $fillable = [
        'nom',
        'preu_total',
        'ingredients_en',
        'ingredients_ca',
        'ingredients_es',
        'ingredients_fr',
        'ingredients_de',
        'ingredients_it',
        'ingredients_zh',
        'ingredients_ru',
        'ingredients_ja',
        'ingredients_eu',
        'estat',
    ];

    protected $table = "menu";

    public function comanda()
    {
        return $this->hasMany(Comanda::class);
    }

    public function resenyes()
    {
        return $this->hasMany(Resenya::class);
    }
}
