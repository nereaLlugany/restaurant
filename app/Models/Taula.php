<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taula extends Model
{
    //
    protected $table = "taula";
    protected $fillable = ['capacity', 'num_taula'];

    public function reserves()
    {
        return $this->hasMany(Reserva::class);
    }
}
