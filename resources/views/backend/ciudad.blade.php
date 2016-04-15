@extends('layouts.app')

@section('content')
<div class="container" ng-app="plApp">
    <div class="row">
        <!--paises-->
        <div class="col-md-6" ng-controller="paisController">
            <div class="panel panel-primary">
                <div class="panel-heading">
                <h4>Paises</h4>
                </div>
                <div class="panel-body">
                    <div class="">
                        <button type="button" id="btn-add" class="btn btn-primary" ng-click="modal('create')">Agregar Pais</button>
                    </div>
                    <br>
                    <table datatable="ng" class="table table-condensed table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Editar</th>
                                <th class="text-center">Borrar</th>
                            </tr>
                        </thead>
                        <tbody ng-show="broadcast = 'cfpLoadingBar:completed'" class="text-center">
                            <tr ng-repeat="pais in paises">
                                <td><% pais.name_es %></td>
                                <td><button class="btn btn-info btn-sm" ng-click="modal('edit',pais.id)">Editar</button></td>
                                <td><button class="btn btn-danger btn-sm" ng-click="deletePais(pais.id)">Eliminar</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--paises modal-->
            <div class="modal fade" id="paisModal" tabindex="-1" role="dialog" aria-labelledby="paisModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title" id="paisModalLabel"> <%form_title%> </h3>
                        </div>

                        <div class="modal-body">
                            <form ng-show="broadcast = 'cfpLoadingBar:completed'" name="paisForm" class="form-horizontal" novalidate="" ng-submit="submitPais(mode, id)">
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

        <!--ciudades-->
        <div class="col-md-6" ng-controller="ciudadController">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Ciudades</h4>
                </div>
                <div class="panel-body">
                    <div class="">
                        <button type="button" id="btn-add" class="btn btn-primary" ng-click="modal('create')">Agregar ciudad</button>
                    </div>
                    <br>
                    <table datatable="ng" class="table table-condensed table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Editar</th>
                                <th class="text-center">Borrar</th>
                            </tr>
                        </thead>
                        <tbody ng-show="broadcast = 'cfpLoadingBar:completed'" class="text-center">
                            <tr ng-repeat="ciudad in ciudades">
                                <td><% ciudad.name_es %></td>
                                <td><button class="btn btn-info btn-sm" ng-click="modal('edit',ciudad.id)">Editar</button></td>
                                <td><button class="btn btn-danger btn-sm" ng-click="deleteCiudad(ciudad.id)">Eliminar</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--ciudades modal -->
            <div class="modal fade" id="ciudadModal" tabindex="-1" role="dialog" aria-labelledby="ciudadModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title" id="ciudadModalLabel"> <%form_title%> </h3>
                        </div>
                        <form ng-show="broadcast = 'cfpLoadingBar:completed'" name="ciudadForm" class="form-horizontal" novalidate="" ng-submit="submitCiudad(mode, id, picFiles)" enctype="multipart/form-data">
                            <div class="modal-body">
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
                                </div>
                                <div class="form-group error">
                                    <label for="" class="col-md-4 control-label">Actual</label>
                                    <img class="col-md-3" ngf-thumbnail="thumb" class="thumb">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="btn-save" ng-disabled="ciudadForm.$invalid">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--end modal-->
        </div>

    </div>

</div>
@endsection
