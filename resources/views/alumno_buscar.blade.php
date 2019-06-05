@extends('layouts.plantilla_admin')


@section("contenido_principal")

    <div class="contenido-main">
                <div class="titulo-formulario">
                    <h2>Buscar <span>Alumno</span></h2>
                </div>
                <form class="formulario" action= "/buscaralumnos/pordni" role="form" method="POST">
                    {{csrf_field()}}
                <div class="container">
                    <div class="row ">
                        <div class="col-sm-4 col-sm-offset-2">
                            <input type="text" class="form-control" name="dni" id="dni" placeholder="Ingrese DNI" required>    
                        </div>
                    </div>
                    <div class="row">    
                        <div class="col-sm-4 col-sm-offset-3    ">
                            <button type="submit" class="btn boton-registrar btn-success" >BUSCAR</button>
                        </div>                        
                    </div>
                </div>
                </form>
                <!-- check if $buscar variable is set, display buscar result -->
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
                    @endforeach
                    @else
                        <div class="alert alert-danger" role="alert">
                            NO SE ENCONTRARON ALUMNOS 
                        </div>                    
                        @endif
                    @endif

            </div>

@endsection
