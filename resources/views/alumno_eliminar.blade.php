@extends('layouts.plantilla_admin')


@section("contenido_principal")

    <div class="contenido-main">
                <div class="titulo-formulario">
                    <h2>Eliminar <span>Alumno</span></h2>
                </div>
                <form class="formulario" action= "/buscarparaeliminar/pordni" role="form" method="POST">
                    {{csrf_field()}}
                <div class="container" style="margin: 0 auto 20px auto">
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-2">
                            <input type="text" class="form-control" name="dni" id="dni" placeholder="Ingrese DNI a eliminar" required>    
                        </div>
                        <div class="col-sm-4 col-sm-offset-3">
                            <button type="submit" class="btn boton-registrar btn-success col-xs-4" >BUSCAR</button>
                        </div>                        
                    </div>
                </div>
                </form>
                <!-- check if $buscar variable is set, display buscar result -->
                @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                {{Session::get('message')}}
                </div>      
                @endif

                @if (isset($alumno))
                    @if (count($alumno))
                    @foreach($alumno as $alumn)
                    <div class="form-group">
                        <label class="titulo-label">Nombres</label>
                        <input type="text" class="form-control"   name="nombres" id="nombres" value="<?php echo $alumn->nombres ?>" readonly>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="titulo-label">Apellido Paterno</label>
                            <input type="text" class="form-control" name="apellido-paterno" id="apellido-paterno" value="<?php echo $alumn->apePaterno ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="titulo-label">Apellido Materno</label>
                            <input type="text" class="form-control" name="apellido-materno" id="apellido-materno" value="<?php echo $alumn->apeMaterno ?>" readonly>
                        </div>
                    </div>

                    
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label class="titulo-label">Sexo</label>             
                            <input type="text" class="form-control" name="domicilio" id="domicilio" placeholder="" value="<?php echo $alumn->sexo ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="titulo-label">Domicilio</label>
                            <input type="text" class="form-control" name="domicilio" id="domicilio" placeholder="" value="<?php echo $alumn->domicilio ?>" readonly>
                        </div>
                        <div class="form-group col-md-4">

                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="titulo-label">Fecha de nacimiento</label>
                            <input type="text" class="form-control" name="dni" id="dni" placeholder="" value="<?php echo $alumn->fnacimiento ?>" readonly>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="titulo-label">DNI</label>
                            <input type="text" class="form-control" name="dni" id="dni" placeholder="" value="<?php echo $alumn->dni ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="titulo-label">Correo Electronico</label>
                            <input type="text" class="form-control" name="correo" id="correo" placeholder="" value="<?php echo $alumn->correo ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <th scope="row"><button class="btn btn-danger" data-catid={{$alumn->dni}} data-toggle="modal" data-target="#delete">Delete</button></th>
                    </div>

                    @endforeach
                    @else
                        <div class="alert alert-danger" role="alert">
                            NO SE ENCONTRARON ALUMNOS 
                        </div>                    
                        @endif
                    @endif

            </div>
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
 <h4 class="modal-title" id="myModalLabel">Confirmación Eliminar</h4>   
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

       

      </div>
      <form action="{{route('eliminar.alumno','test')}}" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
          <div class="modal-body">
            <p class="text-center "><label class="titulo-label">¿Seguro que deseas eliminar?</label></p>
                <input type="hidden" name="category_id" id="cat_id" value="">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">Confirmar</button>
          </div>
      </form>
    </div>
  </div>
</div>
@endsection
