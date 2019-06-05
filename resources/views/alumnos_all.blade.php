@extends('layouts.plantilla_admin')

@section("contenido_principal")

<div class="contenido-main">
    <div class="titulo-formulario">
            <h2>Reporte de <span>Alumnos</span></h2>
    </div>
        <form action="#" method='GET'>
            <table class="table">
                <thead class="bg-primary">
                    <tr>
                        <th scope="col" width="10%">DNI</th>
                        <th scope="col" width="15%">NOMBRES</th>
                        <th scope="col" width="15%">APELLIDO PARTERNO</th>
                        <th scope="col" width="15%">APELLIDO MATERNO</th>
                        <th scope="col" width="15%">SEXO</th>
                        <th scope="col" width="15%">CORREO</th>
                        <th scope="col" width="10%">FECHA NACIMIENTO</th>
                        <th scope="col" width="10%">TELEFONO</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($alumnos as $alumno)
                    <tr>
                        <th scope="row"><?php echo $alumno->dni ?></th>
                        <th scope="row"><?php echo $alumno->nombres ?></th>
                        <th scope="row"><?php echo $alumno->apePaterno ?></th>
                        <th scope="row"><?php echo $alumno->apeMaterno ?></th>
                        <th scope="row"><?php echo $alumno->sexo ?></th>
                        <th scope="row"><?php echo $alumno->correo ?></th>
                        <th scope="row"><?php echo $alumno->fnacimiento ?></th>
                        <th scope="row"><?php echo $alumno->telefono ?></th>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <br>      
            
        </form>              
</div>
@endsection 
