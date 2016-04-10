@extends('layouts.app')

@section('content')
<div class="container" ng-app="plApp" ng-controller="ciudadController">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel-body">
                <button type="button" id="btn-add" class="btn btn-primary" ng-click="modal('create')">Agregar ciudad</button>
                <p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>
                <div class="" ng-hide="loading" ng-repeat="ciudad in ciudades">
                	<p>Nombre <% ciudad.name_es %> </p>
                	<p>Nombre en<% ciudad.name_en %> </p>
                	<p>
                		<button class="btn btn-detail" ng-click="modal('edit',ciudad.id)">Editar</button>
                		<a href="#" class="text-muted" ng-click="deleteCiudad(ciudad.id)">Eliminar</a>
                	</p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabel"> <%form_title%> </h3>
                </div>

                <div class="modal-body">
                    <form name="ciudadForm" class="form-horizontal" novalidate="" ng-submit="submitCiudad(mode, id, picFiles)" enctype="multipart/form-data">
                        <div class="row">
                                <div class="form-group error">
                                    <label for="pais" class="col-md-4 control-label">Pais</label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="pais" ng-model="selectedPais" ng-options="pais.name_es for pais in paises track by pais.id" required>
                                        <option value="">Seleccione pais</option>
                                        </select>
                                        <p class="col-md-offset-3" ng-show="ciudadForm.pais.$error.required" class="help-inline">Pais es requerido.</p>
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="name_es" class="col-md-4 control-label">Nombre español</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="name_es" value=" <% name_es %> " ng-model="ciudadData.name_es" required>
                                        <p class="col-md-offset-3" ng-show="ciudadForm.name_es.$invalid" class="help-inline">Nombre es requerido.</p>    
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="name_en" class="col-md-4 control-label">Nombre ingles</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="name_en" value=" <% name_en %> " ng-model="ciudadData.name_en" required>
                                        <p class="col-md-offset-3" ng-show="ciudadForm.name_en.$invalid"><small>Nombre es requerido</small></p>    
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="name_en" class="col-md-4 control-label">Informacion español</label>
                                    <div class="col-md-6">
                                        <textarea ui-tinymce class="form-control" type="text" name="info_es" value=" <% info_es %> " ng-model="ciudadData.info_es" required></textarea>
                                        <p class="col-md-offset-3" ng-show="ciudadForm.info_es.$invalid" class="help-inline">Informacion requerida.</p>
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="info_en" class="col-md-4 control-label">Informacion ingles</label>
                                    <div class="col-md-6">
                                        <textarea ui-tinymce class="form-control" type="text" name="info_en" value=" <% info_en %> " ng-model="ciudadData.info_en" required></textarea>
                                        <p class="col-md-offset-3" ng-show="ciudadForm.info_en.$invalid" class="help-inline">Informacion requerida.</p>
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="code" class="col-md-4 control-label">Código clima</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="code" value=" <% code %> " ng-model="ciudadData.code" required>
                                        <p class="col-md-offset-3" ng-show="ciudadForm.code.$invalid" class="help-inline">Informacion requerida.</p>
                                    </div>
                                </div>
                                <div ng-show="mode == 'edit'" class="form-group error">
                                    <label class="col-md-4 control-label" for="">Widget Clima</label>
                                    <div class="col-md-4">
                                        <i style="font-size: 40px" ng-class="icon"></i>
                                        <i style="font-size: 20px" class="wi wi-thermometer"></i><%weather.main.temp%>
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label class="col-md-4 control-label" for="img">Imagen 1</label>
                                    <div class="col-md-5">
                                        <input ngf-select accept="image/*" ng-model="picFiles[0]" class="form-control" type="file" name="img" ngf-max-size="2MB" ngf-model-invalid="errorFiles" ng-required="!thumb">
                                    </div>
                                    <div>
                                        <img class="col-md-2" ngf-thumbnail="thumb" class="thumb">
                                    </div>
                                </div>
                            </div>
                            <div ng-repeat="error in errors" class=" col-md-4">
                                <p> <%error%> </p>
                            </div>    
                        </div>
                                            
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="btn-save" ng-disabled="ciudadForm.$invalid">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
