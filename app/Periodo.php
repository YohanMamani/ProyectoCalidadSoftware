<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $fillable = ['nombre','fechaInicio','fechaFin','estado'];

        static function getPeriodo($id){
        
        return Periodo::where('id','=',$id )->get();
    }
}
