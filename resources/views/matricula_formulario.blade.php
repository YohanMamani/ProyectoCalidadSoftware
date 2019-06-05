@extends('layouts.plantilla_admin')


@section("contenido_principal")

    <div class="contenido-main">
                <div class="titulo-formulario">
                    <h2>Realizar <span>Matrícula</span></h2>
                </div>

                <form class="formulario" action="{{ route('matricula.store')}}" method="POST" role="form">
                   {{csrf_field()}}
                    <div class="form-row"> 
                        <div class="form-group col-md-9">
                            <label class="titulo-label">Nombres</label>
                            <select  class="form-control"  name="nombres">
                                   <option value="">Seleccionar</option>
                                    @foreach($alumnos as $alu)
                                        <option value="{{$alu->dni}}">{{$alu->nombres}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="titulo-label">Fecha</label>
                            <input type="date" class="form-control" name="fecha" value="<?php echo date("Y-m-d");?>" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-7">
                            <label class="titulo-label">Modulo</label>
                            <select  class="form-control" id="modulo">
                                   <option value="">Seleccionar</option>
                                    @foreach($modulos as $mod)
                                        <option value="{{$mod->id}}">{{$mod->nombreMod}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-1">
                            <label class="titulo-label">Grupo</label>
                            <select  class="form-control" id="grupo"  name="grupo">
                                   
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="titulo-label">Periodo</label>
                            <input type="text" class="form-control" id="fechas" name="fechas">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label class="titulo-label">Frecuencia</label>
                            <input type="text" class="form-control" id="frecuencia" autofocus>    
                        </div>
                        <div class="form-group col-md-5">
                            <label class="titulo-label">Turno</label>
                            <input type="text" class="form-control" id="turno"  autofocus>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="titulo-label">Nro. Recibo</label>
                            <input type="text" class="form-control" name="recibo" autofocus>
                        </div>
                    </div>
                    
                   

                    <div class="botones">
                        <button type="submit" class="btn boton-registrar btn-primary col-xs-4">Matricular</button>
                        <button type="reset" class="btn boton-limpiar btn-warning col-xs-4">Limpiar</button>
                    </div>

                </form>
                            
    </div>
<div class="modal modal-danger fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
 <h4 class="modal-title" id="myModalLabel">Confirmación</h4>   
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
          <div class="modal-body">
            <div class="titulo-label">                <p class="text-center">
                <strong>SE REALIZÓ LA MATRICULA CON ÉXITO</strong>
                </p></div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">ACEPTAR</button>
          </div>
    </div>
  </div>
</div>
@endsection