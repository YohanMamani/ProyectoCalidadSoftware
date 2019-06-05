@extends("layouts.plantilla_admin")

@section("contenido_principal")
    <div class="contenido-main">
        <div class="titulo-formulario">
            <h2>Registrar <span>Opción Ocupacional</span></h2>
        </div>

        <form action="/RegistroOpcionOcupacional" method="POST">
        @csrf
            <div class="form-group">
                <label class="titulo-label">Nombre de la Opción Ocupacional</label>
                <input type="text" class="form-control" name="nombre"  required autofocus>
            </div>

            <div class="form-group">
                <label class="titulo-label">Familia profesional</label>
                <select  class="form-control" style="height:30px" name="familia"  required>
                    <option value="" selected>Seleccionar Familia Profesional</option>
                    @foreach($FamiliasProf as $Famprof)
                    <option value="{{$Famprof->id}}">{{$Famprof->nombreFP}}</option>
                    @endforeach
                </select>
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