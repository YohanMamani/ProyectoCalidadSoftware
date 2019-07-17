<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profesor;
use App\Modulo;
use App\Turno;
use App\Frecuencia;
use App\Grupo;
use App\Periodo;


class GrupoController extends Controller
{

    function __construct(){
        $this->middleware('auth');                                 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profesores = Profesor::all();
        $modulos = Modulo::all();
        $turnos = Turno::all();
        $frecuencias = Frecuencia::all();
        return view('asignar_profesor',compact('profesores','modulos','turnos','frecuencias'));
    }
    
    public function listarGrupos(Request $request,$id){
        if($request->ajax()){
            $grupos = Grupo::getGrupo($id);
            return response()->json($grupos);
        }
        
    }
    
    public function BuscarGrupo(Request $request, $id){
        $fil2 = substr($id,0,1);
        if($request->ajax()){
            $grupo = Grupo::buscarGrupo($fil2);
            return response()->json($grupo);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $periodo_actual = Periodo::where('estado',1)->first();
        
        $cruce = $this->verificacion_grupos(request('nombres'),request('frecuencia'),request('turno'));
        if($cruce){
            return redirect()->route('grupo.create')->with('msj','Ya existe un horario igual para ese profesor');
        }else{
            Grupo::create([
                'fecInicio' => request('fecha-inicio'),
                'fecFin' => request('fecha-fin'),
                'profesor_id' => request('nombres'),
                'modulo_id' => request('modulo'),
                'turno_id' => request('turno'),
                'frecuencia_id' => request('frecuencia'),
                'periodo_id' => $periodo_actual->id,
                'nro_matriculados' => 0 //default
            ]);

            $confirmación="registro correctamente";
            $profesores = Profesor::all();
            $modulos = Modulo::all();
            $turnos = Turno::all();
            $frecuencias = Frecuencia::all();
            return view('asignar_profesor',compact('profesores','modulos','turnos','frecuencias','confirmación'));
        }
    }
    
    
    public function verificacion_grupos($id_profesor, $id_frecuencia, $id_turno){
        $resultado=false;
        
        $grupo_cruce = Grupo::where(['profesor_id'=> $id_profesor, 'turno_id'=>$id_frecuencia,'frecuencia_id'=>$id_frecuencia])->get();
        if($grupo_cruce->isEmpty()){
            
        }else{
            $resultado=true;
        }
        return $resultado;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
