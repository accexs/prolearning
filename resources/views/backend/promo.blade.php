@extends('layouts.app')

@section('content')
<div class="container" ng-app="plApp">
	<div class="row">
		<div class="col-md-8" ng-controller="promoController">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4>Promociones</h4>
				</div>
				<div class="panel-body">
					<div class="">
						<button type="button" id="btn-add" class="btn btn-primary" ng-click="promocionModal('create')">Agregar Promoción</button>
					</div>
					<br>
					<table datatable="ng" class="table table-condensed table-bordered table-hover table-responsive">
						<thead>
							<tr>
								<th class="text-center">Titulo español</th>
								<th class="text-center">Editar</th>
								<th class="text-center">Borrar</th>
							</tr>
						</thead>
						<tbody ng-show="broadcast = 'cfpLoadingBar:completed'" class="text-center">
							<tr ng-repeat="promocion in promociones">
								<td><% promocion.name_es %></td>
								<td><button class="btn btn-info btn-sm" ng-click="promocionModal('edit',promocion.id)">Editar</button></td>
								<td><button class="btn btn-danger btn-sm" ng-click="deletepromocion(promocion.id)">Eliminar</button></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal fade" id="promocionModal" tabindex="-1" role="dialog" aria-labelledby="promocionModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h3 class="modal-title" id="promocionModalLabel"> <%form_title%> </h3>
					</div>

					<div class="modal-body">
						<form ng-show="broadcast = 'cfpLoadingBar:completed'" name="promocionForm" class="form-horizontal" novalidate="" ng-submit="submitPromocion(mode, id)">
							<div class="row">
							    <div class="">
							        <div class="form-group error">
							            <label for="name_es" class="col-md-4 control-label">Nombre español</label>
							            <div class="col-md-4">
							                <input class="form-control" type="text" name="name_es" value=" <% name_es %> " ng-model="promocionData.name_es" required>
							                <p class="col-md-offset-3" ng-show="promocionForm.name_es.$invalid" class="help-inline">Nombre es requerido.</p>
							            </div>
							        </div>
							        <div class="form-group error">
							            <label for="name_en" class="col-md-4 control-label">Nombre ingles</label>
							            <div class="col-md-4">
							                <input class="form-control" type="text" name="name_en" value=" <% name_en %> " ng-model="promocionData.name_en" required>
							                <p class="col-md-offset-3" ng-show="promocionForm.name_en.$invalid" class="help-inline">Nombre es requerido.</p>
							            </div>
							        </div>
							        <div class="form-group error">
							            <label for="desc_es" class="col-md-4 control-label">Descripcion español</label>
							            <div class="col-md-4">
							                <input class="form-control" type="text" name="desc_es" value=" <% desc_es %> " ng-model="promocionData.desc_es" required>
							                <p class="col-md-offset-3" ng-show="promocionForm.desc_es.$invalid" class="help-inline">Descripcion es requerido.</p>
							            </div>
							        </div>
							        <div class="form-group error">
							            <label for="desc_en" class="col-md-4 control-label">Descripcion ingles</label>
							            <div class="col-md-4">
							                <input class="form-control" type="text" name="desc_en" value=" <% desc_en %> " ng-model="promocionData.desc_en" required>
							                <p class="col-md-offset-3" ng-show="promocionForm.desc_en.$invalid" class="help-inline">Descripcion es requerido.</p>
							            </div>
							        </div>
							    </div>
							    <div ng-repeat="error in errors" class=" col-md-5">
							        <p> <%error%> </p>
							    </div>
							</div>
							                    
							<div class="row modal-footer">
							    <button type="submit" class="btn btn-primary" id="btn-save" ng-disabled="promocionForm.$invalid">Guardar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
@endsection