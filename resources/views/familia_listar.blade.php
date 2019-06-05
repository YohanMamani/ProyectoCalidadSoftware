@extends('layouts.plantilla_admin')

@section("contenido_principal")

<div class="contenido-main">
    <div class="titulo-formulario">
            <h2>Reporte de <span>Familias Profesionales</span></h2>

    </div>
            <table class="table">
                <thead class="bg-primary">
                    <tr>
                        <th scope="col" width="2%">N°</th>                      
                        <th scope="col" width="15%">FAMILIA PROFESIONAL</th>
                        <th scope="col" width="2%">Eliminar</th>
                        <th scope="col" width="2%">Actualizar</th>
                    </tr>
                </thead>
                <tbody>
                <?php $numero=1;?>  
                @foreach($familiasprofesionales as $fp)
                    <tr>
                        <th scope="row">{{$numero++}}</th>   
                        <th scope="row"><?php echo $fp->nombreFP ?></th>
                        <th scope="row"><button class="btn btn-danger" data-catid={{$fp->id}} data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i></button></th>
                        <th scope="row"><button class="btn btn-warning" data-mytitle="{{$fp->nombreFP}}" data-catid={{$fp->id}} data-toggle="modal" data-target="#edit"><i class="fas fa-pencil-alt"></i></button></th>                        
                    </tr>
                @endforeach
                </tbody>
            </table>
            <br>      
            
</div>


<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 <h4 class="modal-title text-center" id="myModalLabel">Confirmación Eliminar</h4>   

 </div>
      <form action="/familia/eliminarporid" method="post">
            {{csrf_field()}}
          <div class="modal-body">
                <p class="text-center">
                    ¿Seguro que deseas eliminar?
                </p>
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

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar</h4>
      </div>
      <form action="/familia/actualizarfamilia" method="post">
          {{csrf_field()}}
        <div class="modal-body">
            <div class="form-group">
              <label class="titulo-label">Nombre :</label>
              <input type="text" class="form-control" name="tittle"  id="title">
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
