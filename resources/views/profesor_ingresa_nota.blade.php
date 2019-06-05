@extends('layouts.plantilla_profesor')


@section("contenido_principal")

    <div class="contenido-main">
                <div class="titulo-formulario">
                    <h2>Ingresar <span> Notas </span></h2>
                </div>
                <form>
                    <div class="form-row"> 
                        <div class="form-group col-md-9">
                            <label class="titulo-label">Módulo</label>                            
                            <select  class="form-control" style="height:30px" name="modulo">
                                <option value="vacio" selected> </option>
                                <option value="modulo1">Módulo 1</option>
                                <option value="modulo2">Módulo 2</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">                            
                            <button  type="submit" class="btn boton-registrar btn-primary w100" style="width:150px; margin: 30px 20px"> Ver Listado
                            </button>
                        </div>
                    </div>
                </form>
                <form>
                    <table class="table">
                        <thead class="bg-primary">
                            <tr>
                                <th scope="col" width="15%">Orden</th>
                                <th scope="col" width="35%">Apellidos y Nombres</th>
                                <th scope="col" width="12%">Nota1</th>
                                <th scope="col" width="12%">Nota2</th>
                                <th scope="col" width="12%">Nota3</th>
                                <th scope="col" width="30%">P. Final</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Alumno1</td>
                                <td><input type="text" style ="width: 30px" required></td>
                                <td><input type="text" style ="width: 30px" required></td>
                                <td><input type="text" style ="width: 30px" required></td>
                                <td><div>Nota</div></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Alumno2</td>
                                <td><input type="text" style ="width: 30px" required></td>
                                <td><input type="text" style ="width: 30px" required></td>
                                <td><input type="text" style ="width: 30px" required></td>
                                <td><div>Nota</div></td>
                            </tr>
                            <tr>
                              <th scope="row">3</th>
                                <td>Alumno3</td>
                                <td><input type="text" style ="width: 30px" required></td>
                                <td><input type="text" style ="width: 30px" required></td>
                                <td><input type="text" style ="width: 30px" required></td>
                                <td><div>Nota</div></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="botones">
                        <button type="submit" class="btn boton-registrar btn col-xs-4" style ="background: #283E9F">Guardar</button>
                    </div>
                </form>
            </div>

@endsection