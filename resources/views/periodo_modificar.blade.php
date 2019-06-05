@extends('layouts.plantilla_admin')


@section("contenido_principal")

    <div class="contenido-main">
        <div class="titulo-formulario">
                    <h2>Modificar <span>Periodo</span></h2>
                </div>

                <form class="formulario" action= "{{route('periodo.update', $periodo->id)}}" role="form" method="POST">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="form-group">
                        <label class="titulo-label">Nombre</label>
                        <input type="text" class="form-control" value="{{$periodo->nombre}}" name="nombre" id="nombre" required>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="titulo-label">Fecha de Inicio</label>
                            <input type="date" class="form-control" value="{{$periodo->fechaInicio}}" name="fecha-inicio" id="fecha-inicio" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="titulo-label">Fecha de Término</label>
                            <input type="date" class="form-control" value="{{$periodo->fechaFin}}" name="fecha-fin" id="fecha-fin" required>
                        </div>
                        <div class="form-group col-md-4 ">
                            <label class="titulo-label">Estado</label>
                            <select  class="form-control"  name="estado" id="estado">
                            @if($periodo->estado == 1)
                                <option value="1" selected>Activo</option>
                                <option value="0">No activo</option>
                            @else
                                <option value="1">Activo</option>
                                <option value="0" selected>No activo</option>
                            @endif                
                            </select>
                        </div>
                    </div>
                    <div class="row">
                    <div class="botones">
                        <button type="submit" class="btn boton-registrar btn-success col-xs-4">Modificar</button>
                        <button type="reset" class="btn boton-limpiar btn-warning col-xs-4">Limpiar</button>
                    </div>
                    </div>


                </form>
            </div>
                            
    </div>

@endsection