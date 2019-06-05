<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modulo;
use App\Http\Requests\ModuloRequest;
use App\Opcionocupacional;
use App\Periodo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
class ModuloController extends Controller
{
    function __construct(){
        $this->middleware('auth');                            
    }

    function showRegistroModulo(){
        $lsOpcionesOcupacionales=Opcionocupacional::all();
        return view('modulo_registrar',['lsOpcionesOcup'=>$lsOpcionesOcupacionales]);
    }

    function registrarModulo(ModuloRequest $request){
        try {             
            $periodo_actual = Periodo::where('estado',1)->first();
            $modulo=new Modulo;
            $modulo->nombreMod=$request->nombre;
            $modulo->duracion=$request->duracion;
            if($modulo->duracion<=0){
                Session::flash('message', 'NUMERO DE HORAS INCORRECTOS');
                return redirect()->route('modulo.registrar');                 
            }
            $modulo->oo_id=$request->opcion_ocupacional;
            $modulo->estado=1;
            $modulo->periodo_id= $periodo_actual->id;
            $modulo->save();
            $confirmación="registro correctamente";
            $lsOpcionesOcup=Opcionocupacional::all();
            return view('modulo_registrar',compact('lsOpcionesOcup','confirmación'));
            }catch( QueryException  $e) { 
                Session::flash('message', 'VERIFIQUE LOS DATOS INGRESADOS');
                return redirect()->route('modulo.registrar'); 
            } 

    }




    
    
    function mostrarModulos(){
        
        /**
         * VISTA PARA MOSTRAR LOS MODULOS
         */
        $modulos=Modulo::orderBy('nombreMod','ASC')->paginate();
        $lsOpcionesOcup=Opcionocupacional::all();
        return view('modulo_listar',compact('modulos','lsOpcionesOcup'));
    }
    
    function getModulo($id){
        $modulo=Modulo::find($id);
        
        return view('getModulo',compact('modulo'));
    }

    function editarModulo(ModuloRequest $request,$id){
        $modulo=Modulo::find($id);

        $modulo->nombreMod=$request->nombre;
        $modulo->duracion=$request->duracion;
        $modulo->oo_id=$request->opcion_ocupacional;
        $modulo->estado=1;

        $modulo->save();

        return view('editarModulo');
    }

    function borrarModulo($id){
        $modulo=Modulo::find($id);
        $modulo->delete();
    }

    public function mostrarmodulo(){
    $modulos = Modulo::orderBy('created_at', 'DESC')->get();
    $lsOpcionesOcup=Opcionocupacional::all();
    return view('modulo_listar',compact('modulos','lsOpcionesOcup'));
    }

    public function eliminarmodulos($id){
        $modulo=Modulo::getModulo($id);
        $modulo->each->delete();
        //Flash::warning('El usuario ha sido eliminado correctamente');
        return redirect()->route('reporte.modulosall');
    }   

    public  function eliminarmodulo(Request $request){
        $id = request('category_id');
        $modulo=Modulo::getModulo($id);
        $modulo->each->delete();
        //Flash::warning('El usuario ha sido eliminado correctamente');
        Session::flash('message', 'EL USUARIO  HA SIDO ELIMINADO CORRECTAMENTE');
        return redirect()->route('reporte.modulosall');
    }
        public function eliminandomodulo (Request $request){
        $id = request('category_id');
        $modulo=Modulo::getModulo($id);
        $modulo->each->delete();
        Session::flash('message', 'El usuario ha sido eliminado correctamente');
        return redirect()->route('reporte.modulosall');
       }

       public function actualizarmodulo(Request $request){
        $id = request('category_id');
        $nombresmod=request('nombre');
        $duracion=request('duracion');
        $idopcion=request('opcion_ocupacional');
        $Modulo = Modulo::find($id);
        $Modulo->nombremod=$nombresmod;
        $Modulo->duracion=$duracion;
        if($Modulo->duracion<=0){
                Session::flash('message', 'NUMERO DE HORAS INCORRECTOS');
                return redirect()->route('modulo.show');                 
            }
        $Modulo->oo_id=$idopcion;
        $Modulo->save();
        $modulos = Modulo::orderBy('created_at', 'DESC')->get();
        $lsOpcionesOcup=Opcionocupacional::all();
        return view('modulo_listar',compact('modulos','lsOpcionesOcup'));

       } 
    public function actualizaropciones(Request $request){
        $id = request('category_id');
        $nombresFP=request('tittle');
        $idfamilia=request('familia');
        $opcion = Opcionocupacional::find($id);
        $opcion->nombreOO=$nombresFP;
        $opcion->fp_id=$idfamilia;
        $opcion->save();
        $opciones = Opcionocupacional::orderBy('created_at', 'DESC')->get();
        $FamiliasProf =Familiaprofesional::all();
        return view('opcion_listar',compact('FamiliasProf','opciones'));
    }
}
