@extends('layouts.plantilla_admin')


@section("contenido_principal")

    <div class="contenido-main">
        <div class="titulo-formulario">
                    <h2>Informacion General de <span>Periodo</span></h2>
                </div>

                <form class="formulario" action= "" role="form" method="POST">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="form-row">
                        <div class="col-sm-2">
                            <label class="titulo-label">Periodo:</label>
                        </div>
                        <div class="col-sm">
                            <select  class="form-control" style="height:30px" name="periodo" id="periodo">
                                <option value="">Seleccionar</option>
                                @foreach($periodos as $per)
                                    <option value="{{$per->id}}">{{$per->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm"></div>
                        <div class="col-sm"></div>                        
                    </div>
                    <br></br>
                    <legend>Recursos</legend>
                    <div class="form-row">
                        <div class="col-sm">
                            <label class="titulo-label">Nuevos Modulos</label>
                            <input type="number_format" class="form-control" value="" name="nro-modulos" id="nro-modulos" required>
                        </div>
                        <div class="col-sm">
                            <label class="titulo-label">Nuevos Profesores</label>
                                <input type="number_format" class="form-control" value="" name="nro-profesores" id="nro-profesores" required>
                            </select>
                        </div>
                        <div class="col-sm">
                            <label class="titulo-label">Grupos Registrados</label>
                            <input type="number_format" class="form-control" value="" name="nro-grupos" id="nro-grupos" required>
                        </div>
                    </div>
                        <br></br>
                    <legend>Datos de Matricula</legend>
                    <div class="form-row">
                        <div class="col-sm">
                            <label class="titulo-label">Nro. Alumnos</label>
                            <input type="number_format" class="form-control" value="" name="nro-alumnos" id="nro-alumnos" required>
                        </div>
                        <div class="col-sm">
                            <label class="titulo-label">Matriculas Registradas</label>
                            <input type="number_format" class="form-control" value="" name="nro-matriculas" id="nro-matriculas" required>
                        </div>
                        <div class="col-sm">
                            <label class="titulo-label">Comparacion Periodo Anterior:</label>
                            <input type="text" class="form-control" value="" name="diferencia-alumnado" id="diferencia-alumnado" required>
                        </div>                     
                    </div>
                        <br></br>
                    <legend>Observaciones</legend>
                    <div class="form-row">
                        <div class="col-sm">
                            <label class="titulo-label">Modulo mas solicitado:</label>
                            <input type="text" class="form-control" value="" name="modulo-top" id="modulo-top" required>
                        </div>
                        <div class="col-sm">
                            <label class="titulo-label">Alumnos registrados:</label>
                            <input type="text" class="form-control" value="" name="modulo-top-matriculas" id="modulo-top-matriculas" required>
                        </div>
                        <div class="col-sm">
                            <label class="titulo-label">Grupos aperturados:</label>
                            <input type="text" class="form-control" value="" name="modulo-top-grupos" id="modulo-top-grupos" required>
                        </div>
                    </div>
                    <br></br>
                    <!--
                    <div class="botones">
                        <button type="submit" class="btn boton-registrar btn-success col-xs-4">Modificar</button>
                        <button type="reset" class="btn boton-limpiar btn-warning col-xs-4">Limpiar</button>
                    </div>
                    -->

                </form>
            </div>
                            
    </div>

@endsection