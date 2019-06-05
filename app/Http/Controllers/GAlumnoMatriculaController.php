<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Matricula;
use App\Alumno;
use App\Grupo;
use App\Modulo;
use App\Profesor;
use App\Periodo;

use App\Turno;
use App\Frecuencia;
use Auth;
class GAlumnoMatriculaController extends Controller
{

    function __construct(){
        $this->middleware('auth'); //solo deje pasar a los usuarios autenticados, 
                                        //si quieres pasar sin logearte t direccionar al hander(captura de excepcion)
    }

    function index(){
        return view('alumno_index');
    }

    function perfil(){
        $correo=Auth::user()->email;
        $alumno=Alumno::getAlumno($correo);
        $distrito=$alumno->distrito;
        $provincia=$distrito->provincia;
        $departamento=$provincia->departamento;
        return view('alumno_informacion',[
            'alumno'=>$alumno,
            'distrito'=>$distrito,
            'provincia'=>$provincia,
            'departamento'=>$departamento
            ]);
    }

    function reporteMatricula(){
        
        $correo=Auth::user()->email;
        $alumno=Alumno::getAlumno($correo);
        $matriculs=$alumno->matriculas; //genera las matriculas que tiene el alumno
        $periodo = array();
        $fil=0;
        foreach($matriculs as $mat){
            $periodo[$fil] = Periodo::find($mat->periodo_id);
            $fil++;
        }
        return view('alumno_reporte_matricula',[
            'matriculs'=>$matriculs,
            'periodo' => $periodo
        ]);
    }

    function mostrarDetalleMatricula($idgrupo){
        $grupo=Grupo::find($idgrupo);
        $modulo=$grupo->modulo;

        $grupo=Grupo::find($idgrupo);
        $profesor=$grupo->profesor;

        $grupo=Grupo::find($idgrupo);
        $turno=$grupo->turno;

        $grupo=Grupo::find($idgrupo);
        $frecuencia=$grupo->frecuencia;

        return view('alumno_matricula_detalle',[
            'grupo'=>$grupo,
            'modulo'=>$modulo,
            'profesor'=>$profesor,
            'turno'=>$turno,
            'frecuencia'=>$frecuencia
        ]);
    }

    function reporteEvaluaciones(){
      
        $correo=Auth::user()->email;
        $matriculas=Matricula::obtenerMatriculas($correo);
       
        $new_modulo=collect(new Modulo);
        $new_profesor=collect(new Profesor);
        $new_turno=collect(new Turno);
        $new_frecuencia=collect(new Frecuencia);

        foreach($matriculas as $matricula){
            $grupo=Grupo::find($matricula->grupo_id);
            $modulo=$grupo->modulo;
            $new_modulo->push($modulo);
        
            $profesor=$grupo->profesor;
            $new_profesor->push($profesor);

            $turno=$grupo->turno;
            $new_turno->push($turno);

            $frecuencia=$grupo->frecuencia;
            $new_frecuencia->push($frecuencia);
        }
        
        return view('alumno_reporte_evaluaciones',compact('matriculas','new_modulo','new_profesor','new_turno','new_frecuencia'));

    }

    function mostrarReporteNotas($id){

        $matricula=Matricula::find($id);
        $nomina=$matricula->nomina;
        
        return view('alumno_reporte_notas',compact('nomina','matricula'));
    }
}
