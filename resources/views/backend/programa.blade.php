@extends('layouts.app')

@section('content')
<div class="container" ng-app="plApp">
    <div class="row">

        <!--cursos modal-->
        <div class="modal fade" id="cursoModal" tabindex="-1" role="dialog" aria-labelledby="cursoModalLabel" aria-hidden="true" ng-controller="cursoController">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title" id="cursoModalLabel"> Cursos de Programas </h3>
                    </div>

                    <div class="modal-body">
                        <div ng-show="!showCreate">
                            <div class="">
                                <button type="button" id="btn-add" class="btn btn-primary" ng-click="showCreate=true">Agregar Curso</button>
                            </div>
                            <br>
                            <table datatable="ng" class="table table-condensed table-bordered table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Tipo 1</th>
                                        <th class="text-center">Tipo 2</th>
                                        <th class="text-center">Ciudad</th>
                                        <th class="text-center">Cursos</th>
                                        <th class="text-center">Instituto</th>
                                        <th class="text-center">Editar</th>
                                        <th class="text-center">Borrar</th>
                                    </tr>
                                </thead>
                                <tbody ng-show="broadcast = 'cfpLoadingBar:completed'" class="text-center">
                                    <tr ng-repeat="programa in programas">
                                        <td> <% programa.name_es %> </td>
                                        <td> <% programa.tipo.name_es %> </td>
                                        <td> <% programa.tipo.tipo %> </td>
                                        <td> <% programa.instituto.ciudad.name_es %> </td>
                                        <td><a href="#" title=""><i ng-click="modalCurso(programa.id)" class="fa fa-list-alt fa-lg" aria-hidden="true"></i></a></td>
                                        <td> <% programa.instituto.name %> </td>
                                        <td><button class="btn btn-info btn-sm" ng-click="modal('edit',programa.id)">Editar</button></td>
                                        <td><button class="btn btn-danger btn-sm" ng-click="deletePrograma(programa.id)">Eliminar</button></td>
                                    </tr>
                                </tbody>
                            </table>    
                        </div>
                        
                        <div ng-show="showCreate">
                            <form name="cursoForm" class="form-horizontal" novalidate="" ng-submit="submitCurso(mode, id)">
                                <div class="row">
                                    <div class="">
                                        <div class="form-group error">
                                            <label for="ciudad" class="col-md-4 control-label">Ciudad</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="ciudad" ng-model="selectedCiudad" ng-options="ciudad.name_es for ciudad in ciudades track by ciudad.id" required>
                                                    <option value="">Seleccione ciudad</option>
                                                </select>
                                                <p class="col-md-offset-3" ng-show="programaForm.ciudad.$error.required" class="help-inline">Ciudad es requerido.</p>
                                            </div>
                                        </div>
                                        <div class="form-group error">
                                            <label for="instituto" class="col-md-4 control-label">Instituto</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="instituto" ng-model="selectedInstituto" ng-options="instituto.name for instituto in institutos track by instituto.id" required>
                                                    <option value="">Seleccione Instituto</option>
                                                </select>
                                                <p class="col-md-offset-3" ng-show="programaForm.instituto.$error.required" class="help-inline">Insituto es requerido.</p>
                                            </div>
                                        </div>
                                        <div class="form-group error">
                                            <label for="tipo" class="col-md-4 control-label">Tipo</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="tipo" ng-model="selectedTipo" ng-options="tipo.name_es group by tipo.tipo for tipo in tipos track by tipo.id" required>
                                                    <option value="">Seleccione tipo</option>
                                                </select>
                                                <p class="col-md-offset-3" ng-show="programaForm.tipo.$error.required" class="help-inline">Tipo es requerido.</p>
                                            </div>
                                        </div>
                                        <div class="form-group error">
                                            <label for="name_es" class="col-md-4 control-label">Nombre español</label>
                                            <div class="col-md-4">
                                                <input class="form-control" type="text" name="name_es" value=" <% name_es %> " ng-model="programaData.name_es" required>
                                                <p class="col-md-offset-3" ng-show="programaForm.name_es.$invalid" class="help-inline">Nombre es requerido.</p>
                                            </div>
                                        </div>
                                        <div class="form-group error">
                                            <label for="name_en" class="col-md-4 control-label">Nombre inglés</label>
                                            <div class="col-md-4">
                                                <input class="form-control" type="text" name="name_en" value=" <% name_en %> " ng-model="programaData.name_en" required>
                                                <p class="col-md-offset-3" ng-show="programaForm.name_en.$invalid" class="help-inline">Nombre es requerido.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div ng-repeat="error in errors" class=" col-md-5">
                                        <p> <%error%> </p>
                                    </div>    
                                </div>
                                                    
                                <div class="row modal-footer">
                                    <button ng-click="showCreate=false" type="button" class="btn btn-default">Cancelar</button>
                                    <button type="submit" class="btn btn-primary" id="btn-save" ng-disabled="corsoForm.$invalid">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end modal-->


        <!--programas-->
        <div class="col-md-10 col-md-offset-1" ng-controller="programaController">
            <div class="panel panel-primary">
                <div class="panel-heading">
                <h4>Programas</h4>
                </div>
                <div class="panel-body">
                    <div class="">
                        <button type="button" id="btn-add" class="btn btn-primary" ng-click="modal('create')">Agregar Programa</button>
                    </div>
                    <br>
                    <table datatable="ng" class="table table-condensed table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Tipo 1</th>
                                <th class="text-center">Tipo 2</th>
                                <th class="text-center">Ciudad</th>
                                <th class="text-center">Cursos</th>
                                <th class="text-center">Instituto</th>
                                <th class="text-center">Editar</th>
                                <th class="text-center">Borrar</th>
                            </tr>
                        </thead>
                        <tbody ng-show="broadcast = 'cfpLoadingBar:completed'" class="text-center">
                            <tr ng-repeat="programa in programas">
                                <td> <% programa.name_es %> </td>
                                <td> <% programa.tipo.name_es %> </td>
                                <td> <% programa.tipo.tipo %> </td>
                                <td> <% programa.instituto.ciudad.name_es %> </td>
                                <td><a href="#" title=""><i ng-click="modalCurso(programa.id)" class="fa fa-list-alt fa-lg" aria-hidden="true"></i></a></td>
                                <td> <% programa.instituto.name %> </td>
                                <td><button class="btn btn-info btn-sm" ng-click="modal('edit',programa.id)">Editar</button></td>
                                <td><button class="btn btn-danger btn-sm" ng-click="deletePrograma(programa.id)">Eliminar</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--edit,create programas modal-->
            <div class="modal fade" id="programaModal" tabindex="-1" role="dialog" aria-labelledby="programaModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title" id="programaModalLabel"> <%form_title%> </h3>
                        </div>

                        <div class="modal-body">
                            <form ng-show="broadcast = 'cfpLoadingBar:completed'" name="programaForm" class="form-horizontal" novalidate="" ng-submit="submitPrograma(mode, id)">
                                <div class="row">
                                    <div class="">
                                        <div class="form-group error">
                                            <label for="ciudad" class="col-md-4 control-label">Ciudad</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="ciudad" ng-model="selectedCiudad" ng-options="ciudad.name_es for ciudad in ciudades track by ciudad.id" required>
                                                    <option value="">Seleccione ciudad</option>
                                                </select>
                                                <p class="col-md-offset-3" ng-show="programaForm.ciudad.$error.required" class="help-inline">Ciudad es requerido.</p>
                                            </div>
                                        </div>
                                        <div class="form-group error">
                                            <label for="instituto" class="col-md-4 control-label">Instituto</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="instituto" ng-model="selectedInstituto" ng-options="instituto.name for instituto in institutos track by instituto.id" required>
                                                    <option value="">Seleccione Instituto</option>
                                                </select>
                                                <p class="col-md-offset-3" ng-show="programaForm.instituto.$error.required" class="help-inline">Insituto es requerido.</p>
                                            </div>
                                        </div>
                                        <div class="form-group error">
                                            <label for="tipo" class="col-md-4 control-label">Tipo</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="tipo" ng-model="selectedTipo" ng-options="tipo.name_es group by tipo.tipo for tipo in tipos track by tipo.id" required>
                                                    <option value="">Seleccione tipo</option>
                                                </select>
                                                <p class="col-md-offset-3" ng-show="programaForm.tipo.$error.required" class="help-inline">Tipo es requerido.</p>
                                            </div>
                                        </div>
                                        <div class="form-group error">
                                            <label for="name_es" class="col-md-4 control-label">Nombre español</label>
                                            <div class="col-md-4">
                                                <input class="form-control" type="text" name="name_es" value=" <% name_es %> " ng-model="programaData.name_es" required>
                                                <p class="col-md-offset-3" ng-show="programaForm.name_es.$invalid" class="help-inline">Nombre es requerido.</p>
                                            </div>
                                        </div>
                                        <div class="form-group error">
                                            <label for="name_en" class="col-md-4 control-label">Nombre inglés</label>
                                            <div class="col-md-4">
                                                <input class="form-control" type="text" name="name_en" value=" <% name_en %> " ng-model="programaData.name_en" required>
                                                <p class="col-md-offset-3" ng-show="programaForm.name_en.$invalid" class="help-inline">Nombre es requerido.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div ng-repeat="error in errors" class=" col-md-5">
                                        <p> <%error%> </p>
                                    </div>    
                                </div>
                                                    
                                <div class="row modal-footer">
                                    <button type="submit" class="btn btn-primary" id="btn-save" ng-disabled="programaForm.$invalid">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end modal-->

        </div>

    </div>

</div>
@endsection
