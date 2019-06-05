<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    //
    protected $fillable = ['nom_prof', 'apePaterno_prof', 'apeMaterno_prof','sexo_prof','fechaNac_prof','domicilio','distritoDom_id','estado_prof','dni','correo','periodo_id'];
    
    public static function getProfesor($id){
        $profesor = Profesor::find($id);
        return $profesor;
    }
    
     public static function getProfesorpordni($dni){

        return Profesor::where('dni','=',$dni )->get();
        
    }

        
    
}
