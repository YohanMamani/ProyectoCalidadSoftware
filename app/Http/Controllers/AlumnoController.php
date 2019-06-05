<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
//use Illuminate\Http\Request;
use App\Alumno;
use App\Distrito;
use App\Provincia;
use App\Departamento;
use App\User;

use Illuminate\Http\Request;

class AlumnoController extends Controller
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
        $distritos=Distrito::all();
        $provincias=Provincia::all();
        $departamentos=Departamento::all();
        return view('alumno_registrar',compact('distritos','provincias','departamentos'));
    }
    public function registraralumno()
    {
        $distritos=Distrito::all();
        $provincias=Provincia::all();
        $departamentos=Departamento::all();
        return view('alumno_registrar',compact('distritos','provincias','departamentos'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registrarte(Request $request)
    {
        //SE PUEDE MEJORAR USANDO CLASES REQUEST
        /*
        $this->validate($request,['dni'=>'required', 'nombres'=>'required', 'apePaterno'=>'required', 'apeMaterno'=>'required','sexo'=>'required','ecivil'=>'required','gradoInstruccion'=>'required', 'fnacimiento'=>'required',
                                  'ocupacion'=>'required','telefono'=>'required','correo'=>'required','domicilio'=>'required','idDistritoDom'=>'required']);
        */
        try {  
        $fechanacimiento = request('fecha-nacimiento');
        if ($fechanacimiento >= now()->toDateString()){
            Session::flash('message', 'INGRESO DE FECHA INCORRECTO');
            return redirect()->route('registrar.alumno'); 
        }

        Alumno::create([
                'dni' => request('dni'),
                'nombres' => request('nombres'),
                'apePaterno' => request('apellido-paterno'),
                'apeMaterno' => request('apellido-materno'),
                'sexo' => request('sexo'),
                'ecivil' => request('estado-civil'),
                'gradoInstruccion' => request('grado-instruccion'),
                'fnacimiento' => request('fecha-nacimiento'),
                'ocupacion' => request('ocupacion'),
                'telefono' => request('numero'),
                'correo' => request('email'),
                'domicilio' => request('domicilio'),
                'distrito_id' => request('distrito'),
                'estado_alumno' => 1                     //el profesor esta activo
        ]);
      
        User::create(
            [
                'name'=>request('nombres'),
                'email'=>request('email'),
                'user_type'=>'alumno',
                'password'=>bcrypt(request('dni'))
            ]
        );
        $distritos=Distrito::all();
        $provincias=Provincia::all();
        $departamentos=Departamento::all();
        $confirmación="registro correctamente";
        return view('alumno_registrar',compact('distritos','provincias','departamentos','confirmación'));
        
          }catch( QueryException  $e) { 
                Session::flash('message', 'VERIFIQUE LOS DATOS INGRESADOS');
                return redirect()->route('registrar.alumno'); 
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


    public function mostraralumnos(){
        $alumnos = Alumno::orderBy('created_at', 'DESC')->get();
        return view('alumnos_all')->with('alumnos',$alumnos);
    }

    public function buscaralumnopag(){
        return view('alumno_buscar');
       } 

    public function alumnoeliminar(){
        return view('alumno_eliminar');
       }
    public function buscaralumno(Request $request){
        $dni=$request->input('dni');
        $alumno=Alumno::getAlumno($dni);
        return view('alumno_buscar')->with('alumno',$alumno);
    }

    public function buscaralumnoeliminar(Request $request){
        $dni=$request->input('dni');
        $alumno=Alumno::getAlumno($dni);
        return view('alumno_eliminar')->with('alumno',$alumno);
    }

     public function eliminaralumno(Request $request){
        $dni = request('category_id');
        $alumno=Alumno::getAlumno($dni);
        $alumno->each->delete();
        //Flash::warning('El usuario ha sido eliminado correctamente');
        Session::flash('message', 'EL USUARIO  HA SIDO ELIMINADO CORRECTAMENTE');
        return redirect()->route('alumno.eliminar');
       }   


    public function editaralumno(){
        $alumnos = Alumno::all();
        $distritos = Distrito::where('provincia_id',15)->get();
        return view('alumno_modificar',compact('alumnos','distritos'));
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
    public function modificar(Request $request)
    {
        /*
        $this->validate($request,[ 'nombre'=>'required', 'resumen'=>'required', 'npagina'=>'required', 'edicion'=>'required', 'autor'=>'required', 'npagina'=>'required', 'precio'=>'required']);
        */
        $dnialumno = request('dni');
        $alumno = Alumno::getAlumno((integer)$dnialumno);
        $alumno->nombres = request('nombres');
        $alumno->apePaterno = request('apellido-paterno');
        $alumno->apeMaterno = request('apellido-materno');
        $alumno->sexo = request('sexo');
        $alumno->fnacimiento = request('fecha-nacimiento');
        $alumno->domicilio = request('domicilio');
        $alumno->distrito_id = request('distrito');
        $alumno->correo = request('correo');
        $alumno->save();
        
        $usuario=Auth::user();
        $usuario->name=request('nombres');
        $usuario->email=request('correo');
        $usuario->password=bcrypt(request('dni'));
        $usuario->save();
        //return redirect()->route('profesor.index')->with('message','Registro actualizado satisfactoriamente');
 
        return view('alumno_index');
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

    public function obtenerAlumno(Request $request, $dni){
        if($request->ajax()){
            $Alumno = Alumno::getAlumno($dni);
            return response()->json($Alumno);
        }
        
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
