@extends("layouts.plantilla_admin")

@section("contenido_principal")
<div class="contenido-main">
        <div class="titulo-formulario">
            <h2>Registrar <span>Familia Profesional</span></h2>
        </div>

        <form action="/registrarFamiliaProfesional" method="POST">
            @csrf
            <div class="form-group">
                <label class="titulo-label">Nombre de la Familia Profesional</label>
                <input type="text" class="form-control" name="nombre"  required autofocus>
            </div>
                        
            <div class="botones">
                <button type="submit" class="btn boton-registrar btn-success col-xs-4">Registrar</button>
                
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