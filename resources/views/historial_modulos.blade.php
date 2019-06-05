@extends('layouts.plantilla_admin')


@section("contenido_principal")

    <div class="contenido-main">
                
                <div class="titulo-formulario">
                    <h2><span> Historial de Modulos </span></h2>
                </div>
                
                
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <label class="titulo-label">Periodo:</label>
                        </div>
                        <div class="col-sm-3">
                            <select name="periodos" id="periodos" style="height:30px" class="form-control">
                                <option value="">Seleccionar</option>
                                @foreach($periodos as $per)
                                    <option value="{{$per->id}}">{{$per->nombre}}</option>
                                @endforeach
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
                        <!--    <button type="button" class="btn btn-success">+ Añadir</button>    -->
                        </div>
                    </div>
                    <br></br>
                    <table class="table table-hover table-bordered" id="tabla-modulos" name="tabla-modulos">
                        <thead class="bg-primary">
                            <tr>
                                <th scope="col" width="5%">  Codigo      </th>
                                <th scope="col" width="30%"> Nombre  </th>
                                <th scope="col" width="30%"> Familia Ocup.  </th>
                                <th scope="col" width="30%"> Opcion Ocup.     </th>
                                <th scope="col" width="5%"> Nro. Matriculados </th>
                                <th scope="col" width="5%">  Nro. Grupos </th>
                            </tr>
                        </thead>
                        <tbody id="cuerpo-tabla-modulos">
                            <!--
                            <tr>
                                <td> 1         </td>
                                <td> Ofimatica Excel </td>
                                <td> Informatica       </td>
                                <td> Tecnologia</td>
                                <td> 20              </td>
                                <td> 20              </td>    
                            </tr>
                            
                            -->
                        </tbody>
                    </table>
                </div>              
    </div>

@endsection