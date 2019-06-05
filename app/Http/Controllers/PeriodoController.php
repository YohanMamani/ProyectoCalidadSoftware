<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Periodo;
use App\Matricula;
use App\Opcionocupacional;
use App\Familiaprofesional;
use App\Grupo;
use App\Modulo;
use App\Profesor;

use Illuminate\Support\Facades\DB;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodos = Periodo::all();
        return view('mant_periodo_academico',compact('periodos'));
    }
    public function mostrarperiodos()
    {
        $periodos = Periodo::all();
        return view('mant_periodo_academico',compact('periodos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("periodo_registrar");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(request('fecha-inicio')>=request('fecha-fin')){
        $periodos = Periodo::all();
        $truero="error"; 
        return view('mant_periodo_academico',compact('periodos','truero'));
        }
        Periodo::create([
                'nombre' => request('nombre'),
                'fechaInicio' => request('fecha-inicio'),
                'fechaFin' => request('fecha-fin'),
                'estado' => 0
        ]);
        
        $periodos = Periodo::all();
        return view('mant_periodo_academico',compact('periodos'));
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
        $periodo = Periodo::find($id);
        return view('periodo_modificar',compact('periodo'));
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
        $periodo = Periodo::find($id);
        if($periodo->estado == 0 && $request->estado == 1){
            $periodo_anterior = Periodo::where('estado',1)->first();
            $periodo_anterior->estado = 0;
            $periodo_anterior->save();
        }
        
        $periodo->nombre = $request->nombre;
        $periodo->fechaInicio = request('fecha-inicio');
        $periodo->fechaFin = request('fecha-fin');
        $periodo->estado = $request->estado;
        $periodo->save();
        return view('index');
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
    
    public function obtener_DatosGenerales(Request $request,$id){
        if($request->ajax()){
            $alumnos = DB::table('matriculas')->distinct('estudiante_dni')->where('periodo_id',$id)->get();
            $nro_alumnos = count($alumnos);
            
            $modulos_nuevos = Modulo::where('periodo_id',$id)->get();
            $nro_modulos = count($modulos_nuevos);
            
            $matriculas = Matricula::where('periodo_id',$id)->get();
            $nro_matriculas = count($matriculas);
            
            $grupos_periodo = Grupo::where('periodo_id',$id)->get();
            $nro_grupos = count($grupos_periodo);
            
            $profesores_periodo = Profesor::where('periodo_id',$id)->get();
            $nro_profesores = count($profesores_periodo);
            
            $modulos = Modulo::all();
            $modulodetalles = array();
            $fil=0;
            foreach($modulos as $mod){
                $grupos = Grupo::where('modulo_id',$mod->id)->where('periodo_id',$id)->get();
                $cant = 0;
                foreach($grupos as $grup){
                    $cant = $cant + $grup->nro_matriculados;
                };
                $modulodetalles[$fil] = array('modulo' =>$mod->nombreMod,
                                            'nro_matriculados'=>$cant,
                                              'nro_grupos' => count($grupos)
                                        );
                $fil++;
            }
            $indice_mayor=0;
            $mayor=0;
            for($con=0;$con<count($modulodetalles);$con++){
                if($mayor< $modulodetalles[$con]['nro_matriculados']){
                    $mayor = $modulodetalles[$con]['nro_matriculados'];
                    $indice_mayor = $con;
                }
            }
            $modulo_top = $modulodetalles[$indice_mayor]['modulo'];
            $modulo_top_matriculas = $modulodetalles[$indice_mayor]['nro_matriculados'];
            $modulo_top_grupos = $modulodetalles[$indice_mayor]['nro_grupos'];
            
            
            $penultimo_periodo = Periodo::find($id-1);
            
            if($penultimo_periodo == null){
                $diferencia_alumnos = 0;
            }else{
                $alumnos_periodoanterior = DB::table('matriculas')->distinct('estudiante_dni')->where('periodo_id',$penultimo_periodo->id)->get();
                $nro_alumnos_peranterior = count($alumnos_periodoanterior);
                $diferencia_alumnos = $nro_alumnos - $nro_alumnos_peranterior;
            };
            
            $datos = [
                'nro_alumnos' => $nro_alumnos,
                'nro_grupos' => $nro_grupos,
                'nro_profesores' => $nro_profesores,
                'modulo_top' => $modulo_top,
                'diferencia_alumnos' => $diferencia_alumnos,
                'nro_modulos' => $nro_modulos,
                'nro_matriculas' => $nro_matriculas,
                'modulo_top_grupos' => $modulo_top_grupos,
                'modulo_top_matriculas' => $modulo_top_matriculas
            ];
            
            return response()->json($datos);
        }
        
    }
    public function mostrar_datos_generales(){
        $periodos = Periodo::all();
        return view('historial_info_general',compact('periodos'));
    }
    
    public function eliminandoperiodo(Request $request){
        $id = request('category_id');
        $periodo = Periodo::getPeriodo($id);
        $periodo->each->delete();
        return redirect()->route('mostrar.modulosalll');

    }
 
    public function mostrar_datos_modulo(){
        $periodos = Periodo::all();
        return view('historial_modulos',compact('periodos'));
    }
    
    public function obtener_datos_modulo(Request $request,$id){
        if($request->ajax()){
            $modulos = Modulo::all();
            $modulodetalles = array();
            $fil=0;
            foreach($modulos as $mod){
                $opcion = Opcionocupacional::find($mod->oo_id);
                $familia = Familiaprofesional::find($opcion->fp_id);
                
                $grupos = Grupo::where('modulo_id',$mod->id)->where('periodo_id',$id)->get();
                $cant = 0;
                foreach($grupos as $grup){
                    $cant = $cant + $grup->nro_matriculados;
                };
                $modulodetalles[$fil] = array('nro' =>$mod->id,
                                              'modulo' =>$mod->nombreMod,
                                              'familia' =>$familia->nombreFP,
                                              'opcion' =>$opcion->nombreOO,
                                            'nro_matriculados'=>$cant,
                                              'nro_grupos' => count($grupos)
                                        );
                $fil++;
            }
            return response()->json($modulodetalles);
        }
    }
}
