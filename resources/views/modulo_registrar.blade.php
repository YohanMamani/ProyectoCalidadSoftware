@extends('layouts.plantilla_admin')

@section("contenido_principal")
<div class="contenido-main">
    <div class="titulo-formulario">
        <h2>Registrar <span>Módulo</span></h2>
    </div>
               @if(Session::has('message'))
                <div class="alert alert-danger" role="alert">
                {{Session::get('message')}}
                </div>      
                @endif
    <form action="/registrarModulo" method="POST" >
    @csrf
        <div class="form-group">
            <label class="titulo-label">Nombre del Módulo</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre del módulo" required autofocus>
        </div>

        <div class="form-group">
            <label class="titulo-label">Opción ocupacional</label>                            
            <select  class="form-control"  name="opcion_ocupacional" required>
                <option value="" selected>Seleccionar Opcion Ocupacional</option>
                @foreach($lsOpcionesOcup as $OpcOcup)
                <option value="{{$OpcOcup->id}}">{{$OpcOcup->nombreOO}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-row">
            <div class="form-group col-md-20">
                <label class="titulo-label">Duración en horas</label>
                <input type="number" class="form-control" name="duracion" placeholder="Ej. 300" required>
            </div>
        </div>
        <div class="row">        
            <div class="botones">
            <button type="submit" class="btn boton-registrar btn-success col-xs-4" name="registro_modulo">Registrar</button>
        </div>
        </div>


    </form>
</div>

<div class="modal modal-danger fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
 <h4 class="modal-title text-center" id="myModalLabel">Confirmación</h4>   
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
          <div class="modal-body">
                <p class="text-center">
                <strong>SE REALIZÓ EL REGISTRO CON ÉXITO</strong>
                </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">ACEPTAR</button>
          </div>
    </div>
  </div>
</div>
@endsection
