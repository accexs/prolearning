@extends('layouts.app')

@section('content')
<div class="container" ng-app="plApp">
	<div class="row">
		 <!--testimonios-->
		<div class="col-md-8 col-md-offset-2" ng-controller="testimonioController">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4>Testimionios</h4>
				</div>
				<div class="panel-body">
					<div class="">
						<button type="button" id="btn-add" class="btn btn-primary" ng-click="testimonioModal('create')">Agregar testimonio</button>
					</div>
					<br>
					<table datatable="ng" class="table table-condensed table-bordered table-hover table-responsive">
						<thead>
							<tr>
								<th class="text-center">Nombre</th>
								<th class="text-center">Ubicación</th>
								<th class="text-center">Estado</th>
								<th class="text-center">Editar</th>
								<th class="text-center">Borrar</th>
							</tr>
						</thead>
						<tbody ng-show="broadcast = 'cfpLoadingBar:completed'" class="text-center">
							<tr ng-repeat="testimonio in testimonios">
								<td><% testimonio.name %></td>
								<td><% testimonio.location %></td>
								<td><input type="checkbox" value=""></td>
								<td><button class="btn btn-info btn-sm" ng-click="testimonioModal('edit',testimonio.id)">Editar</button></td>
								<td><button class="btn btn-danger btn-sm" ng-click="deleteTestimonio(testimonio.id)">Eliminar</button></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			 <!--testimonios modal-->
			<div class="modal fade" id="testimonioModal" tabindex="-1" role="dialog" aria-labelledby="testimonioModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h3 class="modal-title" id="testimonioModalLabel"> <%form_title%> </h3>
						</div>

						<div class="modal-body">
							<form ng-show="broadcast = 'cfpLoadingBar:completed'" name="testimonioForm" class="form-horizontal" novalidate="" ng-submit="submitTestimonio(mode, id, picFiles)">
								<div class="row">
								    <div class="">
								        <div class="form-group error">
								            <label for="name" class="col-md-4 control-label">Nombre</label>
								            <div class="col-md-4">
								                <input class="form-control" type="text" name="name" value=" <% name %> " ng-model="testimonioData.name" required>
								                <p class="col-md-offset-3" ng-show="testimonioForm.name.$invalid" class="help-inline">Nombre es requerido.</p>
								            </div>
								        </div>
								        <div class="form-group error">
								            <label for="location" class="col-md-4 control-label">Ubicación</label>
								            <div class="col-md-4">
								                <input class="form-control" type="text" name="location" value=" <% location %> " ng-model="testimonioData.location" required>
								                <p class="col-md-offset-3" ng-show="testimonioForm.location.$invalid" class="help-inline">Ubicación es requerida.</p>
								            </div>
								        </div>
								        <div class="form-group error">
								            <label for="testimonio" class="col-md-4 control-label">Testimonio</label>
								            <div class="col-md-6">
								                <textarea ui-tinymce class="form-control" type="text" name="testimonio" value=" <% testimonio %> " ng-model="testimonioData.testimonio" required></textarea>
								                <p class="col-md-offset-3" ng-show="testimonioForm.testimonio.$invalid" class="help-inline">Testimonio es requerido.</p>
								            </div>
								        </div>
								        <div class="form-group error">
								            <label class="col-md-4 control-label" for="img">Foto</label>
								            <div class="col-md-5">
								                <input ngf-select accept="image/*" ng-model="picFiles[0]" class="form-control" type="file" name="img" ngf-max-size="2MB" ngf-model-invalid="errorFiles" ng-required="!thumb">
								            </div>
								        </div>
								        <div class="form-group error">
								            <label for="" class="col-md-4 control-label">Foto actual</label>
								            <img class="col-md-3 thumb" ngf-thumbnail="thumb">
								        </div>
								    </div>
								    <div ng-repeat="error in errors" class=" col-md-5">
								        <p> <%error%> </p>
								    </div>
								</div>
								                    
								<div class="row modal-footer">
								    <button type="submit" class="btn btn-primary" id="btn-save" ng-disabled="testimonioForm.$invalid">Guardar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
@endsection