<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
    //
    protected $table = "comanda";

    public function menus()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function usuari()
    {
        return $this->belongsTo(User::class);
    }
}
