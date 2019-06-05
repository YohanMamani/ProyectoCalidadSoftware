@extends('layouts.plantilla_admin')

@section("contenido_principal")

<div class="contenido-main">
    <div class="titulo-formulario">
            <h2>Reporte de <span>Módulos</span></h2>
    </div>
            <table class="table">
                <thead class="bg-primary">
                    <tr>
                        <th scope="col" width="2%">N°</th>
                        <th scope="col" width="15%">MÓDULO</th>
                        <th scope="col" width="15%">DURACIÓN</th>
                        <th scope="col" width="2%">ELIMINAR</th>
                        <th scope="col" width="2%">MODIFICAR</th>                        
                    </tr>
                </thead>
                <tbody>
                <?php $numero=1;?>  
                @foreach($modulos as $mod)
                    <tr>
                        <th scope="row">{{$numero++}}</th>                           
                        <th scope="row"><?php echo $mod->nombreMod ?></th>
                        <th scope="row"><?php echo $mod->duracion ?></th>
                        <th scope="row"><button class="btn btn-danger" data-catid={{$mod->id}} data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i></button></th>
                        <th scope="row"><button class="btn btn-warning" data-duracion={{$mod->duracion}} data-mytitle="{{$mod->nombreMod}}" data-catid={{$mod->id}} data-toggle="modal" data-target="#editmodulo"><i class="fas fa-pencil-alt"></i></button></th>          
                    </tr>
                @endforeach
                </tbody>
            </table>
            <br> 
                @if(Session::has('message'))
                <div class="alert alert-danger" role="alert">
                {{Session::get('message')}}
                </div>      
                @endif     
</div>

<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
 <h4 class="modal-title text-center" id="myModalLabel">Confirmación Eliminar</h4>   
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form action="/modulos/eliminarporid" method="post">
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

<div class="modal fade" id="editmodulo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar</h4>
      </div>
      <form action="/modulos/actualizarmodulo" method="post">
          {{csrf_field()}}
        <div class="modal-body">
        <div class="form-group">
            <label class="titulo-label">Nombre del Módulo</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value=""  required autofocus>
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
                <input type="number" class="form-control" name="duracion" id="duracion" value="" placeholder="Ej. 300" required>
            </div>
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
