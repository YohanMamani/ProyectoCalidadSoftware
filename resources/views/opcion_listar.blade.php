@extends('layouts.plantilla_admin')

@section("contenido_principal")

<div class="contenido-main">
    <div class="titulo-formulario">
            <h2>Reporte de <span>Opciones Ocupacionales</span></h2>
    </div>
            <table class="table">
                <thead class="bg-primary">
                    <tr>
                        <th scope="col" width="2%">N°</th>                                            
                        <th scope="col" width="15%">OPCION OCUPACIONAL</th>
                        <th scope="col" width="2%">Eliminar</th>
                        <th scope="col" width="2%">Actualizar</th>
                    </tr>
                </thead>
                <tbody>
                <?php $numero=1;?>  
                @foreach($opciones as $opcion)
                    <tr>
                        <th scope="row">{{$numero++}}</th>   
                        <th scope="row"><?php echo $opcion->nombreOO ?></th>
                        <th scope="row"><button class="btn btn-danger" data-catid={{$opcion->id}} data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i></button></th>
                        <th scope="row"><button class="btn btn-warning" data-mytitle="{{$opcion->nombreOO}}" data-catid={{$opcion->id}} data-fpid={{$opcion->fp_id}} data-toggle="modal" data-target="#editopcion"><i class="fas fa-pencil-alt"></i></button></th>                        
                    </tr>
                @endforeach
                </tbody>
            </table>
                @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                {{Session::get('message')}}
                </div>      
                @endif
            <br>      
</div>

<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
 <h4 class="modal-title text-center" id="myModalLabel">Confirmación Eliminar</h4>   
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form action="{{route('eliminar.opcion','test')}}" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
          <div class="modal-body">
                <p class="text-center">
                    ¿Seguro que deseas eliminar?
                </p>
                <input type="hidden" name="category_id" id="cat_id" value="">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-warning">Eliminar</button>
          </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editopcion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar</h4>
      </div>
      <form action="/opcion/actualizaropcion" method="post">
          {{csrf_field()}}
        <div class="modal-body">
        <div class="form-group">
            <label class="titulo-label">Nombre del Módulo</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre del módulo" required autofocus>
        </div>

        <div class="form-group">
            <label class="titulo-label">Opción ocupacional</label>                            
            <select  class="form-control"  name="opcion_ocupacional" required>
                <option value="" selected>Seleccionar Opcion Ocupacional</option>
                @foreach($opciones as $OpcOcup)
                <option value="{{$OpcOcup->id}}">{{$OpcOcup->nombreOO}}</option>
                @endforeach
            </select>
        </div>

                    
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