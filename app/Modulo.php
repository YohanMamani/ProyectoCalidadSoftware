<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $fillable=[
        'nombreMod',
        'duracion',
        'oo_id',
        'estado',
        'periodo_id'
    ];

    static function getmodulo($id){
        return Modulo::where('id','=',$id )->get();
    }
}
