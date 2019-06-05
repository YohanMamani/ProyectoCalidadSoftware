<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Opcionocupacional;

class Familiaprofesional extends Model
{
    protected $fillable=[
        'nombreFP'
    ];

    function opcOcupacionales(){
        return $this->hasMany(Opcionocupacional::class,'fp_id');
    }

     static function getfamilia($id){
        return Familiaprofesional::where('id','=',$id )->get();
    }
}
