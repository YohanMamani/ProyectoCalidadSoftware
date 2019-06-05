<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use App\Profesor;
use App\Distrito;
use App\User;
use App\Matricula;
use App\Alumno;
use App\Grupo;
use App\Nomina;
use App\Periodo;
use Auth;

use Illuminate\Http\Request;

class ProfesorController extends Controller
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
        return view('profesor_index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $distritos = Distrito::where('provincia_id',15)->get();
        return view('create_profesor',compact('distritos'));
    }
   
    public function registrarprofesor()
    {
        $distritos = Distrito::where('provincia_id',15)->get();
        return view('create_profesor',compact('distritos'));
    }

    public function obtenerProfesor(Request $request, $id){
        
        if($request->ajax()){
            $prof = Profesor::getProfesor($id);
            return response()->json($prof);
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
        /*SE PUEDE MEJORAR USANDO CLASES REQUEST
        $this->validate($request,['nombres'=>'required', 'apellido-paterno'=>'required', 'apellido-materno'=>'required','sexo'=>'required','fecha-nacimiento'=>'required']);
        */
        try{
          $fechanacimiento = request('fecha-nacimiento');
          if ($fechanacimiento >= now()->toDateString()){
            Session::flash('message', 'INGRESO DE FECHA INCORRECTO');
            return redirect()->route('registrar.profesor'); 
        }
        $periodo_actual = Periodo::where('estado',1)->first();
        Profesor::create([
                'nom_prof' => request('nombres'),
                'apePaterno_prof' => request('apellido-paterno'),
                'apeMaterno_prof' => request('apellido-materno'),
                'sexo_prof' => request('sexo'),
                'fechaNac_prof' => request('fecha-nacimiento'),
                'domicilio' => request('domicilio'),
                'distritoDom_id' => request('distrito'),
                'estado_prof' => 1 ,                    //el profesor esta activo               
                'dni' => request('dni'),
                'correo' => request('correo'),
                'periodo_id' => $periodo_actual->id
        ]);
        
        User::create(
            [
                'name'=>request('nombres'),
                'email'=>request('correo'),
                'user_type'=>'profesor',
                'password'=>bcrypt(request('dni'))
            ]
        );
        $confirmación="registro correctamente";
        $distritos = Distrito::where('provincia_id',15)->get();
        return view('create_profesor',compact('distritos','confirmación'));
                  }catch( QueryException  $e) { 
                Session::flash('message', 'VERIFIQUE LOS DATOS INGRESADOS');
                return redirect()->route('registrar.profesor'); 
        } 
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
    
    
    public function modificar(Request $request)
    {
        /*
        $this->validate($request,[ 'nombre'=>'required', 'resumen'=>'required', 'npagina'=>'required', 'edicion'=>'required', 'autor'=>'required', 'npagina'=>'required', 'precio'=>'required']);
        */
        $idprofesor = request('idprof');
        $profesor = Profesor::getProfesor((integer)$idprofesor);
        $profesor->nom_prof = request('nombres');
        $profesor->apePaterno_prof = request('apellido-paterno');
        $profesor->apeMaterno_prof = request('apellido-materno');
        $profesor->sexo_prof = request('sexo');
        $profesor->fechaNac_prof = request('fecha-nacimiento');
        $profesor->domicilio = request('domicilio');
        $profesor->distritoDom_id = request('distrito');
        $profesor->estado_prof = request('estado');
        $profesor->dni = request('dni');
        $profesor->correo = request('correo');
        $profesor->save();
        
        $usuario=Auth::user();
        $usuario->name=request('nombres');
        $usuario->email=request('correo');
        $usuario->password=bcrypt(request('dni'));
        $usuario->save();
        //return redirect()->route('profesor.index')->with('message','Registro actualizado satisfactoriamente');
 
        return view('profesor_index');
    }
    
    public function edit_inicial()
    {
        $profesores = Profesor::all();
        $distritos = Distrito::where('provincia_id',15)->get();
        return view('profesor_modificar',compact('profesores','distritos'));
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
    
    public function lista_profesores()
    {
        $profesores= Profesor::all();
        return view('administrador_listar_profesores',compact('profesores'));
    }
    
    public function buscarprofesorpag()
    {
        
        return view('profesor_buscar');
    }

    public function eliminarprofesorpag()
    {
        
        return view('profesor_eliminar');
    }
    
    public function profesoreliminar(){
        return view('profesor_eliminar');
    }

    public function eliminarprofesor(Request $request){
        dd("sadasd");
        $dni = request('category_id');
        $profesor=Profesor::getProfesorpordni($dni);
        $profesor->each->delete();
        //Flash::warning('El usuario ha sido eliminado correctamente');
        Session::flash('message', 'El usuario ha sido eliminado correctamente');
        return redirect()->route('profesor.eliminar');
       } 


    public function eliminandoprofesor (Request $request){
        $dni = request('category_id');
        $profesor=Profesor::getProfesorpordni($dni);
        $profesor->each->delete();
        Session::flash('message', 'El usuario ha sido eliminado correctamente');
        return redirect()->route('profesor.eliminar');
       } 


    public function buscarprofesor(Request $request){
        $dni=$request->input('dni');
        $profesor=Profesor::getProfesorpordni($dni);
        return view('profesor_buscar')->with('profesor',$profesor);
    }
    
    public function buscarprofesoreliminar(Request $request){
        $dni=$request->input('dni');
        $profesor=Profesor::getProfesorpordni($dni);
        return view('profesor_eliminar')->with('profesor',$profesor);
    }

// METODOS PARA PERFIL PROFESOR *******************************************
    
    public function verPerfil(){
        return view('profesor_informacion');
    }
    
    public function verModulos(){
        return view('profesor_ver_modulo');
    }
    
    public function ingresarNotas(){
        return view('profesor_ingresa_nota');
    }
    
    public function cambiarContraseña(){
        return view('profesor_cambiar_contraseña');
    }
    
    public function mostrarAlumnos_modulo($id_grupo){
        $matriculas = Matricula::where('grupo_id',$id_grupo)->get();
        $grupo = Grupo::find($id_grupo);
        $alumnosdetalles = array();
        $fil=0;
        
        foreach($matriculas as $matricula){
            
            $alumno = Alumno::find($matricula->estudiante_dni);
            $nomina = Nomina::where('matricula_id',$matricula->id)->first();
            if($nomina == null){
                $alumnosdetalles[$fil] = array('nro' =>$alumno->dni,
                                                  'apellido-paterno'=>$alumno->apePaterno,
                                                  'apellido-materno'=>$alumno->apeMaterno,
                                                  'nombres' =>$alumno->nombres,
                                                  'fnacimiento' =>$alumno->fnacimiento,
                                                  'nro_matricula'=>$matricula->id,
                                                  'nota3' => "-"
                                            );
                $fil++;
            }else{
                $alumnosdetalles[$fil] = array('nro' =>$alumno->dni,
                                                  'apellido-paterno'=>$alumno->apePaterno,
                                                  'apellido-materno'=>$alumno->apeMaterno,
                                                  'nombres' =>$alumno->nombres,
                                                  'fnacimiento' =>$alumno->fnacimiento,
                                                  'nro_matricula'=>$matricula->id,
                                                  'nota3' => $nomina->nota3
                                            );
                $fil++;
            }            
        }
        
        return view('profesor_alumnos_x_modulo', compact('alumnosdetalles','grupo'));
    }
    
    public function registrar_nomina(Request $request){
        if($request->ajax()){
            
            $id_matricula = explode(" ",$request->myModalLabel);
            $nota1 = (integer)$request->nota1;
            $nota2 = (integer)$request->nota2;
            $nota3 = ($nota1 + $nota2)/2;

            Nomina::create(
                [
                    'nota1'=>$nota1,
                    'nota2'=>$nota2,
                    'nota3'=>$nota3,
                    'observacion'=>$request->observaciones,
                    'matricula_id'=>(integer)$id_matricula[1]
                ]
            );           
        }
        
    }
}
