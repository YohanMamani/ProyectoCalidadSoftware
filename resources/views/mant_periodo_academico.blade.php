@extends('layouts.plantilla_admin')


@section("contenido_principal")

    <div class="contenido-main">
                
                <div class="titulo-formulario">
                    <h2><span> Periodos Academicos </span></h2>
                </div>
                
                
                <div class="">
                    <div class="row">
                        <div class="col-sm-2">
                            <label class="titulo-label">Ordenar por:</label>
                        </div>
                        <div class="col-sm-3">
                            <select name="orden" id="orden" style="height:30px" class="form-control">
                                <option value="">Seleccionar</option>
                                <option value="">Codigo</option>
                                <option value="">Nombre</option>
                            </select>
                        </div>
                        <div class="col-sm">
                        </div>
                        <div class="col-sm">
                        </div>
                        <div class="col-sm">
                        </div>
                        <div class="col-sm">
                        </div>
                        <div class="col-sm">
                            <a class="btn btn-success" href="{{route('periodo.create')}}">+ Añadir</a>
                        </div>
                    </div>
                    <br></br>
                    <table class="table table-hover">
                        <thead class="bg-primary">
                            <tr>
                                <th scope="col" width="10%">  Codigo      </th>
                                <th scope="col" width="20%"> Nombre  </th>
                                <th scope="col" width="15%"> Fecha Inicio  </th>
                                <th scope="col" width="15%"> Fecha Fin     </th>
                                <th scope="col" width="15%">  Estado </th>
                                <th scope="col" width="20%">  Operacion </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($periodos as $per)
                            <tr>
                                <td> {{$per->id}}          </td>
                                <td> {{$per->nombre}} </td>
                                <td> {{$per->fechaInicio}}       </td>
                                <td> {{$per->fechaFin}}</td>
                                @if($per->estado == 1)
                                    <td> Activo              </td>
                                @else
                                    <td> No activo              </td>
                                @endif
                                <td>
                                    <a class="btn btn-warning" href="{{action('PeriodoController@edit', $per->id)}}"><i class="fa fa-wrench"></i></a>
                                    <button class="btn btn-danger" data-catid={{$per->id}} data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @if(isset($truero)!=null)
                <div class="alert alert-danger" role="alert">
                    LA FECHA INICIAL NO PUEDE SER MAYOR A LA FINAL
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
      <form action="/periodos/eliminarporid" method="post">
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

    </div>



@endsection