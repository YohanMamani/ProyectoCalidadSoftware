@extends('layouts.plantilla_admin')


@section("contenido_principal")

    <div class="contenido-main">
                <div class="titulo-formulario">
                    <h2>Eliminar <span>Profesor</span></h2>
                </div>
                <form class="formulario" action= "/buscarprofesoreliminar/pordni" role="form" method="POST">
                    {{csrf_field()}}
                <div class="container" style="margin: 0 auto 20px auto">
                    <div class="row ">
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

                @if (isset($profesor))
                    @if (count($profesor))
                    @foreach($profesor as $profe)
                    <div class="form-group">
                        <label class="titulo-label">Nombres</label>
                        <input type="text" class="form-control"   name="nombres" id="nombres" value="<?php echo $profe->nom_prof ?>" readonly>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="titulo-label">Apellido Paterno</label>
                            <input type="text" class="form-control" name="apellido-paterno" id="apellido-paterno" value="<?php echo $profe->apePaterno_prof ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="titulo-label">Apellido Materno</label>
                            <input type="text" class="form-control" name="apellido-materno" id="apellido-materno" value="<?php echo $profe->apeMaterno_prof ?>" readonly>
                        </div>
                    </div>

                    
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label class="titulo-label">Sexo</label>             
                            <input type="text" class="form-control" name="domicilio" id="domicilio" placeholder="" value="<?php echo $profe->sexo_prof ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="titulo-label">Domicilio</label>
                            <input type="text" class="form-control" name="domicilio" id="domicilio" placeholder="" value="<?php echo $profe->domicilio ?>" readonly>
                        </div>
                        <div class="form-group col-md-4">

                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="titulo-label">Fecha de nacimiento</label>
                            <input type="text" class="form-control" name="dni" id="dni" placeholder="" value="<?php echo $profe->fechaNac_prof ?>" readonly>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="titulo-label">DNI</label>
                            <input type="text" class="form-control" name="dni" id="dni" placeholder="" value="<?php echo $profe->dni ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="titulo-label">Correo Electronico</label>
                            <input type="text" class="form-control" name="correo" id="correo" placeholder="" value="<?php echo $profe->correo ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                       <th scope="row"><button class="btn btn-danger btn-lg" data-catid={{$profe->dni}} data-toggle="modal" data-target="#delete">Delete</button></th>
                    </div>

                    @endforeach
                    @else
                        <div class="alert alert-danger" role="alert">
                            NO SE ENCONTRARON PROFESORES 
                        </div>                    
                        @endif
                    @endif

            </div>
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
 <h4 class="modal-title text-center" id="myModalLabel">Confirmación Eliminar</h4>   
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

       

      </div>
      <form action="/profesor/eliminarpordni" method="post">
            {{csrf_field()}}
          <div class="modal-body">
                <p class="text-center">
                    ¿Seguro que deseas eliminar?
                </p>
                <input type="hidden" name="category_id" id="cat_id" value="">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </div>
      </form>
    </div>
  </div>
</div>
@endsection
