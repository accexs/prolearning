@extends('layouts.app')

@section('content')
<div class="container" ng-app="plApp">
	<div class="row">
		 <!--promos-->
		<div class="col-md-8 col-md-offset-2" ng-controller="promoController">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4>Promociones</h4>
				</div>
				<div class="panel-body">
					<div class="">
						<button type="button" id="btn-add" class="btn btn-primary" ng-click="promoModal('create')">Agregar Promoción</button>
					</div>
					<br>
					<table datatable="ng" class="table table-condensed table-bordered table-hover table-responsive">
						<thead>
							<tr>
								<th class="text-center">Titulo español</th>
								<th class="text-center">Estado</th>
								<th class="text-center">Editar</th>
								<th class="text-center">Borrar</th>
							</tr>
						</thead>
						<tbody ng-show="broadcast = 'cfpLoadingBar:completed'" class="text-center">
							<tr ng-repeat="promo in promos">
								<td><% promo.title_es %></td>
								<td><input type="checkbox" value=""></td>
								<td><button class="btn btn-info btn-sm" ng-click="promoModal('edit',promo.id)">Editar</button></td>
								<td><button class="btn btn-danger btn-sm" ng-click="deletePromo(promo.id)">Eliminar</button></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			 <!--promos modal-->
			<div class="modal fade" id="promoModal" tabindex="-1" role="dialog" aria-labelledby="promoModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h3 class="modal-title" id="promoModalLabel"> <%form_title%> </h3>
						</div>

						<div class="modal-body">
							<form ng-show="broadcast = 'cfpLoadingBar:completed'" name="promoForm" class="form-horizontal" novalidate="" ng-submit="submitPromo(mode, id, picFiles)">
								<div class="row">
								    <div class="">
								        <div class="form-group error">
								            <label for="title_es" class="col-md-4 control-label">Nombre español</label>
								            <div class="col-md-4">
								                <input class="form-control" type="text" name="title_es" value=" <% title_es %> " ng-model="promoData.title_es" required>
								                <p class="col-md-offset-3" ng-show="promoForm.title_es.$invalid" class="help-inline">Nombre es requerido.</p>
								            </div>
								        </div>
								        <div class="form-group error">
								            <label for="title_en" class="col-md-4 control-label">Nombre ingles</label>
								            <div class="col-md-4">
								                <input class="form-control" type="text" name="title_en" value=" <% title_en %> " ng-model="promoData.title_en" required>
								                <p class="col-md-offset-3" ng-show="promoForm.title_en.$invalid" class="help-inline">Nombre es requerido.</p>
								            </div>
								        </div>
								        <div class="form-group error">
								            <label for="desc_es" class="col-md-4 control-label">Descripcion español</label>
								            <div class="col-md-4">
								                <input class="form-control" type="text" name="desc_es" value=" <% desc_es %> " ng-model="promoData.desc_es" required>
								                <p class="col-md-offset-3" ng-show="promoForm.desc_es.$invalid" class="help-inline">Descripcion es requerido.</p>
								            </div>
								        </div>
								        <div class="form-group error">
								            <label for="desc_en" class="col-md-4 control-label">Descripcion ingles</label>
								            <div class="col-md-4">
								                <input class="form-control" type="text" name="desc_en" value=" <% desc_en %> " ng-model="promoData.desc_en" required>
								                <p class="col-md-offset-3" ng-show="promoForm.desc_en.$invalid" class="help-inline">Descripcion es requerido.</p>
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
								            <img class="col-md-3 thumb" ngf-thumbnail="thumb">
								        </div>
								    </div>
								    <div ng-repeat="error in errors" class=" col-md-5">
								        <p> <%error%> </p>
								    </div>
								</div>
								                    
								<div class="row modal-footer">
								    <button type="submit" class="btn btn-primary" id="btn-save" ng-disabled="promoForm.$invalid">Guardar</button>
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