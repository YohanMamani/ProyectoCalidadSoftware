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
                    <th scope="col" width="15%">Nro. recibo</th>
                    <th scope="col" width="15%">DNI</th>
                    <th scope="col" width="15%">Fecha</th>
                    <th scope="col" width="15%">Monto</th>
                    <th scope="col" width="15%">Grupo</th>
                    <th scope="col" width="15%">Periodo</th>
                    <th scope="col" width="10%">Detalle</th>
                    <th scope="col" width="10%">Descarga</th>
                </tr>
            </thead>
            <tbody>
                   <?php $fil=0 ?>
                @foreach($matriculs as $mtc)
                   
                    <tr>
                        <th scope="row">{{ $mtc->id }}</th>
                        <td>{{ $mtc->numReciboPago }}</td>
                        <td>{{ $mtc->estudiante_dni }}</td>
                        <td>{{ $mtc->fecMat }}</td>
                        <td>{{ $mtc->montoLabo }}</td>
                        <td>{{ $mtc->grupo_id }}</td>
                        <td>{{ $periodo[$fil]->nombre }}</td>
                        <?php $fil++ ?>
        
                                <!--<td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#show">Ver</button></td>-->
                        <td><a href="{{ route('matricula.detalle',['idgrupo'=>$mtc->grupo_id]) }}" class="show-modal btn btn-info btn-sm" >Ver</a>
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