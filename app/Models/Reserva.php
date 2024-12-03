<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    //
    protected $table="reserva";

    public function taula() {
        return $this->belongsTo(Taula::class);
    }

    public function usuari() {
        return $this->belongsTo(User::class);
    }
}
