<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resenya extends Model
{
    //
    protected $table="resenya";

    public function menu() {
        return $this->belongsTo(Menu::class);
    }


    public function usuari() {
        return $this->belongsTo(User::class);
    }
}
