<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use App\Familiaprofesional;
use Illuminate\Http\Request;
use App\Http\Requests\FamiliaProfesionalRequest;    
class FamiliaprofesionalController extends Controller
{
    function __construct(){
        $this->middleware('auth');                                
    }

    function showRegistroFam(){
        return view('familia_registrar');
    }

    function registrarFamiliaPro(FamiliaProfesionalRequest $request){
        $familiaProf=new Familiaprofesional;
        $familiaProf->nombreFP=$request->nombre;
        $familiaProf->save();
        $confirmación="registro correctamente";

        return view('familia_registrar',compact('confirmación'));
    }

    public function mostrarfamilias(){
        $familiasprofesionales = Familiaprofesional::orderBy('created_at', 'DESC')->get();
        return view('familia_listar')->with('familiasprofesionales',$familiasprofesionales); 
    }

    public function actualizarfamiliares(Request $request){
        $id = request('category_id');
        $nombresFP=request('tittle');
        $familia = Familiaprofesional::find($id);
        $familia->nombreFP=$nombresFP;
        $familia->save();
        $familiasprofesionales = Familiaprofesional::orderBy('created_at', 'DESC')->get();
        return view('familia_listar')->with('familiasprofesionales',$familiasprofesionales);        
    }

    public function eliminandofamilia (Request $request){
        $id = request('category_id');
        $familia=Familiaprofesional::getfamilia($id);
        $familia->each->delete();
        Session::flash('message', 'El usuario ha sido eliminado correctamente');
        return redirect()->route('reporte.fpall');
       } 





    public function eliminarfamilia($id){
        $familia=Familiaprofesional::getfamilia($id);
        $familia->each->delete();
        //Flash::warning('El usuario ha sido eliminado correctamente');
        return redirect()->route('reporte.fpall');
       }   


}
