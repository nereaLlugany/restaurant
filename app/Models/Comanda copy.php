<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
    //
    protected $table="comanda";

    public function menus() {
        return $this->hasMany(Menu::class);
    }

    public function usuari() {
        return $this->belongsTo(User::class);
    }
}
