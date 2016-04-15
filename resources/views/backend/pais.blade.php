@extends('layouts.app')

@section('content')
<div class="container" ng-app="plApp" ng-controller="paisController">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel-body">
                <button type="button" id="btn-add" class="btn btn-primary" ng-click="modal('create')">Agregar Pais</button>
                <p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>
                <div class="" ng-hide="loading" ng-repeat="pais in paises">
                	<p>Nombre <% pais.name_es %> </p>
                	<p>Nombre en<% pais.name_en %> </p>
                	<p>
                		<button class="btn btn-detail" ng-click="modal('edit',pais.id)">Editar</button>
                		<a href="#" class="text-muted" ng-click="deletePais(pais.id)">Eliminar</a>
                	</p>
                </div>
            </div>
        </div>
    </div>

    <!--inicio modal-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabel"> <%form_title%> </h3>
                </div>

                <div class="modal-body">
                    <form name="paisForm" class="form-horizontal" novalidate="" ng-submit="submitPais(mode, id)">
                        <div class="row">
                            <div class="">
                                <div class="form-group error">
                                    <label for="name_es" class="col-md-4 control-label">Nombre español</label>
                                    <div class="col-md-4">
                                    	<input class="form-control" type="text" name="name_es" value=" <% name_es %> " ng-model="paisData.name_es" required>
                                    	<p class="col-md-offset-3" ng-show="paisForm.name_es.$invalid" class="help-inline">Nombre es requerido.</p>
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="name_en" class="col-md-4 control-label">Nombre ingles</label>
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
@endsection
