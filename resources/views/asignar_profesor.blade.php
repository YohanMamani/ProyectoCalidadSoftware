@extends('layouts.plantilla_admin')


@section("contenido_principal")

    <div class="contenido-main">
        <div class="titulo-formulario">
                    <h2>Realizar <span>Asignación de Docentes</span></h2>
                </div>
                
                @if(session()->has('msj'))
                    <div class="alert alert-danger" role="alert">{{ session('msj') }} </div>
                    <br>
                @else
                
                @endif
                
                <form class="formulario" action="{{ route('grupo.store') }}"  role="form"   method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="titulo-label">Profesor</label>
                        <select  class="form-control" style="height:30px" name="nombres">
                                <option value="" selected>Seleccionar</option>
                                @foreach($profesores as $pro)
                                        <option value="{{$pro->id}}">{{$pro->nom_prof . " " . $pro->apePaterno_prof. " " .$pro->apeMaterno_prof}}</option>
                                @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="titulo-label">Módulo</label>
                        <select  class="form-control" style="height:30px" name="modulo">
                                <option value="" selected>Seleccionar</option>
                                @foreach($modulos as $mod)
                                        <option value="{{$mod->id}}">{{$mod->nombreMod}}</option>
                                @endforeach
                        </select>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="titulo-label">Turno</label>
                            <select  class="form-control" style="height:30px" name="turno">
                                <option value="" selected>Seleccionar</option>
                                @foreach($turnos as $tur)
                                        <option value="{{$tur->id}}">{{$tur->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="titulo-label">Frecuencia</label>
                            <select  class="form-control" style="height:30px" name="frecuencia">
                                <option value="" selected>Seleccionar</option>
                                @foreach($frecuencias as $fre)
                                        <option value="{{$fre->id}}">{{$fre->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
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
<div class="modal modal-danger fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
 <h4 class="modal-title" id="myModalLabel">Confirmación</h4>   
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
          <div class="modal-body">
            <div class="titulo-label">                <p class="text-center">
                <strong>SE ASIGNÓ CORRECTAMENTE EL PROFESOR</strong>
                </p></div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">ACEPTAR</button>
          </div>
    </div>
  </div>
</div>
@endsection