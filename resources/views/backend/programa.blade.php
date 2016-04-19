@extends('layouts.app')

@section('content')
<div class="container" ng-app="plApp">
    <div class="row">
        <!--programas-->
        <div class="" ng-controller="programaController">
            <div class="panel panel-primary">
                <div class="panel-heading">
                <h4>Programas</h4>
                </div>
                <div class="panel-body">
                    <div class="">
                        <button type="button" id="btn-add" class="btn btn-primary" ng-click="modal('create')">Agregar Programas</button>
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
                                <td><% programa.name_es %></td>
                                <td><% programa.tipo %></td>
                                <td>Ciudad</td>
                                <td>Instituto</td>
                                <td>Cursos</td>
                                <td><button class="btn btn-info btn-sm" ng-click="modal('edit',pais.id)">Editar</button></td>
                                <td><button class="btn btn-danger btn-sm" ng-click="deletePais(pais.id)">Eliminar</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--programas modal-->
            <div class="modal fade" id="programaModal" tabindex="-1" role="dialog" aria-labelledby="programaModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title" id="programaModalLabel"> <%form_title%> </h3>
                        </div>

                        <div class="modal-body">
                            <form ng-show="broadcast = 'cfpLoadingBar:completed'" name="paisForm" class="form-horizontal" novalidate="" ng-submit="submitPrograma(mode, id)">
                                <div class="row">
                                    <div class="">
                                        <div class="form-group error">
                                            <label for="ciudad" class="col-md-4 control-label">Ciudad</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="ciudad" ng-model="selectedCiudad" ng-options="ciudad.name_es for ciudad in ciudades track by ciudad.id" required>
                                                    <option value="0">Seleccione ciudad</option>
                                                </select>
                                                <p class="col-md-offset-3" ng-show="programaForm.pais.$error.required" class="help-inline">Ciudad es requerido.</p>
                                            </div>
                                        </div>
                                        <div class="form-group error">
                                            <label for="instituto" class="col-md-4 control-label">Instituto</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="instituto" ng-model="selectedInstituto" ng-options="instituto.name for instituto in institutos track by instituto.id" required>
                                                    <option value="0">Seleccione Instituto</option>
                                                </select>
                                                <p class="col-md-offset-3" ng-show="programaForm.pais.$error.required" class="help-inline">Ciudad es requerido.</p>
                                            </div>
                                        </div>
                                        <div class="form-group error">
                                            <label for="name_es" class="col-md-4 control-label">Nombre español</label>
                                            <div class="col-md-4">
                                                <input class="form-control" type="text" name="name_es" value=" <% name_es %> " ng-model="paisData.name_es" required>
                                                <p class="col-md-offset-3" ng-show="paisForm.name_es.$invalid" class="help-inline">Nombre es requerido.</p>
                                            </div>
                                        </div>
                                        <div class="form-group error">
                                            <label for="name_en" class="col-md-4 control-label">Nombre inglés</label>
                                            <div class="col-md-4">
                                                <input class="form-control" type="text" name="name_en" value=" <% name_en %> " ng-model="paisData.name_en" required>
                                                <p class="col-md-offset-3" ng-show="paisForm.name_en.$invalid" class="help-inline">Nombre es requerido.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div ng-repeat="error in errors" class=" col-md-5">
                                        <p> <%error%> </p>
                                    </div>    
                                </div>
                                                    
                                <div class="row modal-footer">
                                    <button type="submit" class="btn btn-primary" id="btn-save" ng-disabled="paisForm.$invalid">Guardar</button>
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
