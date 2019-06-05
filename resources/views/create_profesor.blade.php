@extends('layouts.plantilla_admin')


@section("contenido_principal")

    <div class="contenido-main">
                <div class="titulo-formulario">
                    <h2>Registrar <span>Profesor</span></h2>
                </div>
                @if(Session::has('message'))
                <div class="alert alert-danger" role="alert">
                {{Session::get('message')}}
                </div>      
                @endif
                <form class="formulario" action="{{ route('profesor.store') }}"  role="form"   method="POST">
                <div class="row">                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="titulo-label">Nombres</label>
                        <input type="text" class="form-control" name="nombres" placeholder="Nombres" required autofocus>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="titulo-label">Apellido Paterno</label>
                            <input type="text" class="form-control" name="apellido-paterno" placeholder="Apellido Paterno" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="titulo-label">Apellido Materno</label>
                            <input type="text" class="form-control" name="apellido-materno" placeholder="Apellido Materno" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label class="titulo-label">Sexo</label>                            
                            <select  class="form-control"  name="sexo">
                                <option value="m" selected>Masculino</option>
                                <option value="f">Femenino</option>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <label class="titulo-label">Domicilio</label>
                            <input type="text" class="form-control" name="domicilio" placeholder="" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="titulo-label">Distrito</label>                            
                            <select  class="form-control" name="distrito"  required>
                                <option value="" selected>Seleccionar</option>
                                @foreach($distritos as $dis)
                                    <option value="{{$dis->id}}">{{$dis->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="titulo-label">Fecha de nacimiento</label>
                        <input type="date" class="form-control" name="fecha-nacimiento" placeholder="DD/MM/AAAA" required>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="titulo-label">DNI</label>
                            <input type="text" class="form-control" name="dni" placeholder="" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="titulo-label">Correo Electronico</label>
                            <input type="text" class="form-control" name="correo" placeholder="" required>
                        </div>
                    </div>
                </div>

                    <div class="row">
                      <div class="botones">
                        <button type="submit" class="btn boton-registrar btn-success col-xs-4">Registrar</button>
                        <button type="reset" class="btn boton-limpiar btn-warning col-xs-4">Limpiar</button>
                    </div>                   
                    </div>
   
                    
                    

                </form>
    </div>

<div class="modal modal-danger fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
 <h4 class="modal-title text-center" id="myModalLabel" style="color:red";>Confirmación</h4>   
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
