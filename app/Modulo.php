<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $fillable=[
        'nombreMod',
        'duracion',
        'oo_id',
        'estado'
    ];
}
