<?php

namespace App\Http\Controllers;

use App\Familiaprofesional;
use App\Opcionocupacional;
use App\Http\Requests\OpcionOcupacionalRequest;
//use Request; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
class OpcionocupacionalController extends Controller
{
    function __construct(){
        $this->middleware('auth');                          
    }

    function showRegistroOpcionOcup(){
        $lsfamiliasProfesionales=Familiaprofesional::all();
        return view('opcion_registrar',['FamiliasProf'=>$lsfamiliasProfesionales]);
    }

    function registroOpcionOcup(OpcionOcupacionalRequest $request){
        
        $opcionOcupacional=new Opcionocupacional;
        $opcionOcupacional->nombreOO=$request->nombre;
        $opcionOcupacional->fp_id=$request->familia;
        $opcionOcupacional->save();
        $confirmación="registro correctamente";
        $FamiliasProf=Familiaprofesional::all();
        return view('opcion_registrar',compact('FamiliasProf','confirmación') );
        //return redirect()->action('OpcionocupacionalController@showRegistroOpcionOcup');
    }

    public function mostraropciones(){  
        $opciones = Opcionocupacional::orderBy('created_at', 'DESC')->get();
        $FamiliasProf =Familiaprofesional::all();
        return view('opcion_listar',compact('FamiliasProf','opciones'));
    }

    /*public function eliminaropcion($id){
        $opcion=Opcionocupacional::getopcion($id);
        $opcion ->each->delete();
        //Flash::warning('El usuario ha sido eliminado correctamente');
        return redirect()->route('reporte.opcionesall');
    } */
    public function eliminaropcion(Request $request){
        $id = request('category_id');
        $opcion=Opcionocupacional::getopcion($id);
        //return $id;
        $opcion ->each->delete();
        Session::flash('message', 'La opcion ha sido eliminado correctamente');return redirect()->route('reporte.opcionesall');
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
