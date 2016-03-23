@extends('layouts.app')

@section('content')
<div class="container" ng-app="plApp" ng-controller="institutoController">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel-body">
                <button type="button" id="btn-add" class="btn btn-primary" ng-click="modal('create')">Agregar Instituto</button>
                <p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>
                <div class="" ng-hide="loading" ng-repeat="instituto in institutos">
                	<p>Nombre <% instituto.name %> </p>
                	<p>
                		<button class="btn btn-detail" ng-click="modal('edit',instituto.id)">Editar</button>
                		<a href="#" class="text-muted" ng-click="deleteInstituto(instituto.id)">Eliminar</a>
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
                    <form name="institutoForm" class="form-horizontal" novalidate="" ng-submit="submitInstituto(mode, id, picFile)" enctype="multipart/form-data">
                        <div class="row">
                                <div class="form-group error">
                                    <label for="ciudad" class="col-md-4 control-label">Ciudad</label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="ciudad" ng-model="selectedCiudad" ng-options="ciudad.name_es for ciudad in ciudades track by ciudad.id" required>
                                        <option value="">Seleccione ciudad</option>
                                        </select>
                                        <p class="col-md-offset-3" ng-show="institutoForm.pais.$error.required" class="help-inline">Pais es requerido.</p>
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="name" class="col-md-4 control-label">Nombre</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="name" value=" <% name %> " ng-model="institutoData.name" required>
                                        <p class="col-md-offset-3" ng-show="institutoForm.name.$invalid" class="help-inline">Nombre es requerido.</p>    
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="desc_es" class="col-md-4 control-label">Descripción español</label>
                                    <div class="col-md-6">
                                        <textarea ui-tinymce class="form-control" type="text" name="desc_es" value=" <% desc_es %> " ng-model="institutoData.desc_es" required></textarea>
                                        <p class="col-md-offset-3" ng-show="institutoForm.desc_es.$invalid" class="help-inline">Descripción requerida.</p>
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="desc_en" class="col-md-4 control-label">Descripción ingles</label>
                                    <div class="col-md-6">
                                        <textarea ui-tinymce class="form-control" type="text" name="desc_en" value=" <% desc_en %> " ng-model="institutoData.desc_en" required></textarea>
                                        <p class="col-md-offset-3" ng-show="institutoForm.desc_en.$invalid" class="help-inline">Descripción requerida.</p>
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="code" class="col-md-4 control-label">Ubicación 1</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="location1" value=" <% location1 %> " ng-model="institutoData.location1" required>
                                        <p class="col-md-offset-3" ng-show="institutoForm.location1.$invalid" class="help-inline">Ubicación requerida.</p>
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="code" class="col-md-4 control-label">Coordenadas 1</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="coord1" value=" <% coord1 %> " ng-model="institutoData.coord1" required>
                                        <p class="col-md-offset-3" ng-show="institutoForm.coord1.$invalid" class="help-inline">Coordenadas requeridas.</p>
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="code" class="col-md-4 control-label">Ubicación 2</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="location2" value=" <% location2 %> " ng-model="institutoData.location2" required>
                                        <p class="col-md-offset-3" ng-show="institutoForm.location2.$invalid" class="help-inline">Ubicación requerida.</p>
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="code" class="col-md-4 control-label">Coordenadas 2</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="coord2" value=" <% coord2 %> " ng-model="institutoData.coord2" required>
                                        <p class="col-md-offset-3" ng-show="institutoForm.coord2.$invalid" class="help-inline">Coordenadas requeridas.</p>
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="code" class="col-md-4 control-label">Ubicación 3</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="location3" value=" <% location3 %> " ng-model="institutoData.location3" required>
                                        <p class="col-md-offset-3" ng-show="institutoForm.location3.$invalid" class="help-inline">Ubicación requerida.</p>
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="code" class="col-md-4 control-label">Coordenadas 3</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="coord3" value=" <% coord3 %> " ng-model="institutoData.coord3" required>
                                        <p class="col-md-offset-3" ng-show="institutoForm.coord3.$invalid" class="help-inline">Coordenadas requeridas.</p>
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label class="col-md-4 control-label" for="img1">Logo</label>
                                    <div class="col-md-5">
                                        <input ngf-select accept="image/*" ng-model="picFile" class="form-control" type="file" name="img1" ngf-max-size="2MB" ngf-model-invalid="errorFiles">
                                    </div>
                                    <div>
                                        <img class="col-md-2" ngf-thumbnail="picFile" class="thumb">
                                    </div>
                                </div>
                            </div>
                            <div ng-repeat="error in errors" class=" col-md-4">
                                <p> <%error%> </p>
                            </div>    
                        </div>
                                            
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="btn-save" ng-disabled="institutoForm.$invalid">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
