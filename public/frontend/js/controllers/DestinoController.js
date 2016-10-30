angular.module('DestinoController', [
	'destinoService'
	])

	.controller('DestinoController', function($scope, Destino){

		Destino.get()
			.success(function(data){
				$scope.paises = data;
			});

});