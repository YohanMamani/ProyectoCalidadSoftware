@extends('layouts.plantilla_admin')


@section("contenido_principal")

    <div class="contenido-main">
        <div class="titulo-formulario">
                    <h2>Registrar <span>Periodo</span></h2>
                </div>

                <form class="formulario" action= "{{route('periodo.store')}}" role="form" method="POST">
                    <div class="row">
                                        {{csrf_field()}}
                    <div class="form-group">
                        <label class="titulo-label">Nombre</label>
                        <input type="text" class="form-control" value="" name="nombre" id="nombre" placeholder="Ingrese nombre del periodo" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="titulo-label">Fecha de Inicio</label>
                            <input type="date" class="form-control" value="" name="fecha-inicio" id="fecha-inicio" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="titulo-label">Fecha de Término</label>
                            <input type="date" class="form-control" value="" name="fecha-fin" id="fecha-fin" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="titulo-label">Estado</label>
                            <select  class="form-control"  name="estado" id="estado" disabled>
                                 <option value="1">Activo</option>
                                <option value="0" selected>No activo</option>                
                            </select>
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
                            
    </div>
<div class='modal fade' id='modal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
  <div class='modal-dialog' role="document" >
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button'  data-dismiss='modal' aria-hidden='true'>x</button>
        <div class='modal-body'>
          <blockquote>
            <p style='text-align:justify;'>Registro exitoso<span id='error2'></span></p>
          </blockquote> 
        </div>
        <div class='modal-footer'>
          <a href='reporte_renov' data-dismiss='modal' class='btn btn-danger btnsalir'>Aceptar</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection