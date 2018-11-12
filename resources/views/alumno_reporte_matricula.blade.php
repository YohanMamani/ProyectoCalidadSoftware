@extends('layouts.plantilla_alumno')

@section('contenido_principal')

<div class="contenido-main">
    <div class="titulo-formulario">
        <h2>Reportes de <span>Matrícula</span></h2>
    </div>
    <form action="#" method='GET'>
        <table class="table">
            <thead class="bg-primary">
                <tr>
                    <th scope="col" width="15%">#Matrícula</th>
                    <th scope="col" width="15%">Numero de recibo</th>
                    <th scope="col" width="15%">DNI</th>
                    <th scope="col" width="15%">Fecha</th>
                    <th scope="col" width="15%">Monto</th>
                    <th scope="col" width="15%">Grupo</th>
                    <th scope="col" width="10%">Detalle</th>
                </tr>
            </thead>
            <tbody>
                @foreach($matriculs as $mtc)
                    <tr>
                        <th scope="row">{{ $mtc->id }}</th>
                        <td>{{ $mtc->numReciboPago }}</td>
                        <td>{{ $mtc->estudiante_dni }}</td>
                        <td>{{ $mtc->fecMat }}</td>
                        <td>{{ $mtc->montoLabo }}</td>
                        <td>{{ $mtc->grupo_id }}</td>
                                
                                <!--<td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#show">Ver</button></td>-->
                        <td><a href="{{ route('matricula.detalle',['idgrupo'=>$mtc->grupo_id]) }}" class="show-modal btn btn-info btn-sm" >Ver</a>
                            <i class="fa fa-eye"></i> 
                        </td>
                        <td><a href="{{ route('matricula.pdf',['idgrupo'=>$mtc->grupo_id,'id'=>$mtc->id]) }}" class="show-modal btn btn-info btn-sm" >Descargar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>      
        
    </form>    
</div>

@endsection  