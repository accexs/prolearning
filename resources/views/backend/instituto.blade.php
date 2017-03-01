@extends('layouts.app')

@section('content')
<div class="container" ng-app="plApp">

    <div class="row">
        <!--institutos-->
        <div class="col-md-8 col-md-offset-2" ng-controller="institutoController">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Institutos</h4>
                </div>
                <div class="panel-body">
                    <div class="">
                        <button type="button" class="btn btn-primary" ng-click="modal('create')">Agregar instituto</button>
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
                            <tr ng-repeat="instituto in institutos">
                                <td><% instituto.name %></td>
                                <td><button class="btn btn-info btn-sm" ng-click="modal('edit',instituto.id)">Editar</button></td>
                                <td><button class="btn btn-danger btn-sm" ng-click="deleteInstituto(instituto.id)">Eliminar</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--institutos modal-->
            <div class="modal fade" id=myModal tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title" id="myModalLabel"> <% form_title %> </h3>
                        </div>

                        <div class="modal-body">
                            <form name="institutoForm" class="form-horizontal" novalidate="" ng-submit="submitInstituto(mode, id, picFiles)" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="">
                                        <div class="form-group error">
                                            <label for="ciudad" class="col-md-4 control-label">Ciudad</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="ciudad" ng-model="selectedCiudad" ng-options="ciudad.name_es for ciudad in ciudades track by ciudad.id" required>
                                                    <option value="">Seleccione ciudad</option>
                                                </select>
                                                <p class="col-md-offset-3" ng-show="institutoForm.pais.$error.required" class="help-inline">Ciudad es requerido.</p>
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
                                        <!--<div class="form-group error">
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
                                        </div>-->
                                        <div class="form-group error">
                                            <label class="col-md-4 control-label" for="img">Logo</label>
                                            <div class="col-md-5">
                                                <input ngf-select accept="image/*" ng-model="picFiles[0]" class="form-control" type="file" name="img" ngf-max-size="2MB" ngf-model-invalid="errorFiles" ng-required="">
                                            </div>
                                        </div>
                                        <div class=" form-group error">
                                            <label for="" class="col-md-4 control-label">Actual</label>
                                            <img class="col-md-3 thumb" ngf-thumbnail="thumb">
                                        </div>
                                        <div class="form-group error">
                                            <label for="reasons_es" class="col-md-4 control-label">Razones español</label>
                                            <div class="col-md-6">
                                                <textarea ui-tinymce class="form-control" type="text" name="reasons_es" value=" <% reasons_es %> " ng-model="institutoData.reasons_es" required></textarea>
                                                <p class="col-md-offset-3" ng-show="institutoForm.reasons_es.$invalid" class="help-inline">Razones requerida.</p>
                                            </div>
                                        </div>
                                        <div class="form-group error">
                                            <label for="reasons_en" class="col-md-4 control-label">Razones inglés</label>
                                            <div class="col-md-6">
                                                <textarea ui-tinymce class="form-control" type="text" name="reasons_en" value=" <% reasons_en %> " ng-model="institutoData.reasons_en" required></textarea>
                                                <p class="col-md-offset-3" ng-show="institutoForm.reasons_en.$invalid" class="help-inline">Razones requerida.</p>
                                            </div>
                                        </div>
                                        <div class="form-group error">
                                            <label for="website" class="col-md-4 control-label">Website</label>
                                            <div class="col-md-4">
                                                <input class="form-control" type="text" name="website" value=" <% website %> " ng-model="institutoData.website" required>
                                                <p class="col-md-offset-3" ng-show="institutoForm.website.$invalid" class="help-inline">Website requerido.</p>
                                            </div>
                                        </div>
                                        <div class="form-group error">
                                            <label for="tel" class="col-md-4 control-label">Teléfono</label>
                                            <div class="col-md-4">
                                                <input class="form-control" type="text" name="tel" value=" <% tel %> " ng-model="institutoData.tel" required>
                                                <p class="col-md-offset-3" ng-show="institutoForm.tel.$invalid" class="help-inline">Teléfono requerido.</p>
                                            </div>
                                        </div>
                                        <div class="form-group error">
                                            <label for="campustour_es" class="col-md-4 control-label">Campus Tour español</label>
                                            <div class="col-md-6">
                                                <textarea ui-tinymce class="form-control" type="text" name="campustour_es" value=" <% campustour_es %> " ng-model="institutoData.campustour_es" required></textarea>
                                                <p class="col-md-offset-3" ng-show="institutoForm.campustour_es.$invalid" class="help-inline">Campus Tour requerido.</p>
                                            </div>
                                        </div>
                                        <div class="form-group error">
                                            <label for="campustour_en" class="col-md-4 control-label">Campus Tour inglés</label>
                                            <div class="col-md-6">
                                                <textarea ui-tinymce class="form-control" type="text" name="campustour_en" value=" <% campustour_en %> " ng-model="institutoData.campustour_en" required></textarea>
                                                <p class="col-md-offset-3" ng-show="institutoForm.campustour_en.$invalid" class="help-inline">Campus Tour requerido.</p>
                                            </div>
                                        </div>
                                        <div class="form-group error">
                                            <label for="programs_es" class="col-md-4 control-label">Programas español</label>
                                            <div class="col-md-6">
                                                <textarea ui-tinymce class="form-control" type="text" name="programs_es" value=" <% programs_es %> " ng-model="institutoData.programs_es" required></textarea>
                                                <p class="col-md-offset-3" ng-show="institutoForm.programs_es.$invalid" class="help-inline">Programas requeridos.</p>
                                            </div>
                                        </div>
                                        <div class="form-group error">
                                            <label for="programs_en" class="col-md-4 control-label">Programas inglés</label>
                                            <div class="col-md-6">
                                                <textarea ui-tinymce class="form-control" type="text" name="programs_en" value=" <% programs_en %> " ng-model="institutoData.programs_en" required></textarea>
                                                <p class="col-md-offset-3" ng-show="institutoForm.programs_en.$invalid" class="help-inline">Programas requeridos.</p>
                                            </div>
                                        </div>
                                        <div class="form-group error">
                                            <label for="accomm_es" class="col-md-4 control-label">Alojamiento y estadía español</label>
                                            <div class="col-md-6">
                                                <textarea ui-tinymce class="form-control" type="text" name="accomm_es" value=" <% accomm_es %> " ng-model="institutoData.accomm_es" required></textarea>
                                                <p class="col-md-offset-3" ng-show="institutoForm.accomm_es.$invalid" class="help-inline">Alojamiento y estadía requeridos.</p>
                                            </div>
                                        </div>
                                        <div class="form-group error">
                                            <label for="accomm_en" class="col-md-4 control-label">Alojamiento y estadía inglés</label>
                                            <div class="col-md-6">
                                                <textarea ui-tinymce class="form-control" type="text" name="accomm_en" value=" <% accomm_en %> " ng-model="institutoData.accomm_en" required></textarea>
                                                <p class="col-md-offset-3" ng-show="institutoForm.accomm_en.$invalid" class="help-inline">Alojamiento y estadía requeridos.</p>
                                            </div>
                                        </div>
                                        <div class="form-group error">
                                            <label for="activities_es" class="col-md-4 control-label">Actividades extra español</label>
                                            <div class="col-md-6">
                                                <textarea ui-tinymce class="form-control" type="text" name="activities_es" value=" <% activities_es %> " ng-model="institutoData.activities_es" required></textarea>
                                                <p class="col-md-offset-3" ng-show="institutoForm.activities_es.$invalid" class="help-inline">Actividades extra requeridas.</p>
                                            </div>
                                        </div>
                                        <div class="form-group error">
                                            <label for="activities_en" class="col-md-4 control-label">Actividades extra inglés</label>
                                            <div class="col-md-6">
                                                <textarea ui-tinymce class="form-control" type="text" name="activities_en" value=" <% activities_en %> " ng-model="institutoData.activities_en" required></textarea>
                                                <p class="col-md-offset-3" ng-show="institutoForm.activities_en.$invalid" class="help-inline">Actividades extra requeridas.</p>
                                            </div>
                                        </div>
                                        <div class="form-group error">
                                            <label for="price" class="col-md-4 control-label">Precio</label>
                                            <div class="col-md-4">
                                                <input class="form-control" type="text" name="price" value=" <% price %> " ng-model="institutoData.price" required>
                                                <p class="col-md-offset-3" ng-show="institutoForm.price.$invalid" class="help-inline">Precio requerido.</p>
                                            </div>
                                        </div>
                                        <div class="form-group error">
                                            <label for="mail" class="col-md-4 control-label">Email</label>
                                            <div class="col-md-4">
                                                <input class="form-control" type="email" name="mail" value=" <% mail %> " ng-model="institutoData.mail" required>
                                                <p class="col-md-offset-3" ng-show="institutoForm.mail.$invalid" class="help-inline">Email requerido.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div ng-repeat="error in errors" class=" col-md-5">
                                        <p> <%error%> </p>
                                    </div>
                                </div>
                                <div class=" row modal-footer">
                                    <button type="submit" class="btn btn-primary" id="btn-save" ng-disabled="institutoForm.$invalid">Guardar</button>
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
