<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Familiaprofesional;

class Opcionocupacional extends Model
{
    protected $fillable=[
        'nombreOO',
        'fp_id'
    ];

    function familiaProfesional(){
        return $this->belongsTo(Familiaprofesional::class);
    }

     static function getopcion($id){
        return Opcionocupacional::where('id','=',$id )->get();
    }
}
