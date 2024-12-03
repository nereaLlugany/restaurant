<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table="menu";

    public function comanda() {
        return $this->belongsTo(Comanda::class);
    }

    public function resenyes() {
        return $this->hasMany(Resenya::class);
    }

}
