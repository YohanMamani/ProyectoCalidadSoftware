<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Modulo;
use App\Matricula;
use App\Frecuencia;
use App\Turno;
use App\Alumno;
use App\Profesor;
use App\Periodo;
use App\Grupo;


class MatriculaController extends Controller
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
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modulos = Modulo::all();
        $alumnos = Alumno::all();
        return view('matricula_formulario',compact('modulos','alumnos'));
    }
    
    
    
    public function obtenerFrecuencia(Request $request,$id){
        if($request->ajax()){
            $fil = substr($id,1,1);
            $frecuencia = Frecuencia::getFrecuencia($fil);
            return response()->json($frecuencia);
        }
        
    }
    
    public function obtenerTurno(Request $request,$id){
        if($request->ajax()){
            $fil2 = substr($id,2,1);
            $turno = Turno::getTurno($fil2);
            return response()->json($turno);
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
        $periodo_actual= Periodo::where('estado',1)->first();
        
        $fil2 = substr(request('grupo'),0,1);
        Matricula::create([
                'fecMat' => request('fecha'),
                'montoLabo' => 25.00,                       //valor por defecto
                'estudiante_dni' => request('nombres'),
                'numReciboPago' => request('recibo'),
                'grupo_id' => (integer)$fil2,
                'periodo_id' => $periodo_actual->id
        ]);
        
        $grupo = Grupo::find((integer)$fil2);
        $matriculados = $grupo->nro_matriculados; 
        $grupo->nro_matriculados = $matriculados + 1;
        $grupo->save();
        $confirmación="registro correctamente";
        $modulos = Modulo::all();
        $alumnos = Alumno::all();
        return view('matricula_formulario',compact('modulos','alumnos','confirmación'));
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

    function mostrarMatriculados(){
        /**
         * MOSTRAR A TODOS LOS ALUMNOS MATRICULADOS
         */
        $periodo_actual = Periodo::where('estado',1)->first();
        $matriculas=Matricula::where('periodo_id',$periodo_actual->id)->get();

        $new_alumno=collect(new Alumno);
        $new_modulo=collect(new Modulo);
        $new_profesor=collect(new Profesor);
        $new_turno=collect(new Turno);

        foreach($matriculas as $matricula){
            $alumno=$matricula->alumno;
            $new_alumno->push($alumno);

            $grupo=Grupo::find($matricula->grupo_id);
            $modulo=$grupo->modulo;
            $new_modulo->push($modulo);

            $profesor=$grupo->profesor;
            $new_profesor->push($profesor);

            $turno=$grupo->turno;
            $new_turno->push($turno);
        }

        return view('alumnos_matriculados',compact('matriculas','new_alumno','new_modulo','new_profesor','new_turno'));
    }

}
