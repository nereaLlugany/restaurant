<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resenya extends Model
{
    //
    protected $table = "resenya";
    protected $fillable = [
        'menu_id',
        'users_id',
        'comentari_en',
        'comentari_ca',
        'comentari_es',
        'comentari_fr',
        'comentari_de',
        'comentari_it',
        'comentari_zh',
        'comentari_ja',
        'comentari_ru',
        'comentari_eu',
        'puntuacio',
    ];
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }


    public function usuari()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
