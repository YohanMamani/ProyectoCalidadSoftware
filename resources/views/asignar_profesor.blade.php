@extends('layouts.plantilla_admin')


@section("contenido_principal")

    <div class="contenido-main">
        <div class="titulo-formulario">
                    <h2>Realizar <span>Asignación de Docentes</span></h2>
                </div>

                <form class="formulario" action="{{ route('grupo.store') }}"  role="form"   method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="titulo-label">Profesor</label>
                        <select  class="form-control" name="nombres">
                                <option value="" selected>Seleccionar</option>
                                @foreach($profesores as $pro)
                                        <option value="{{$pro->id}}">{{$pro->nom_prof . " " . $pro->apePaterno_prof. " " .$pro->apeMaterno_prof}}</option>
                                @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="titulo-label">Módulo</label>
                        <select  class="form-control" name="modulo">
                                <option value="" selected>Seleccionar</option>
                                @foreach($modulos as $mod)
                                        <option value="{{$mod->id}}">{{$mod->nombreMod}}</option>
                                @endforeach
                        </select>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="titulo-label">Turno</label>
                            <select  class="form-control" name="turno">
                                <option value="" selected>Seleccionar</option>
                                @foreach($turnos as $tur)
                                        <option value="{{$tur->id}}">{{$tur->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="titulo-label">Frecuencia</label>
                            <select  class="form-control" name="frecuencia">
                                <option value="" selected>Seleccionar</option>
                                @foreach($frecuencias as $fre)
                                        <option value="{{$fre->id}}">{{$fre->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="titulo-label">Fecha de inicio</label>
                            <input type="date" class="form-control" name="fecha-inicio" placeholder="DD/MM/AAAA" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="titulo-label">Fecha de fin</label>
                            <input type="date" class="form-control" name="fecha-fin" placeholder="DD/MM/AAAA" required>
                        </div>
                    </div>

                    <div class="botones">
                        <button type="submit" class="btn boton-registrar btn-primary col-xs-4">Crear grupo</button>
                        <button type="reset" class="btn boton-limpiar btn-warning col-xs-4">Limpiar</button>
                    </div>

                </form>
    </div>

@endsection