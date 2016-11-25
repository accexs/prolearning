angular.module('DestinoController', [
	'destinoService'
	])

	.controller('DestinoController', function($scope, Destino){

		Destino.get()
			.success(function(data){
				$scope.paises = data;
			});



	})

	.controller('DestinoDetailController', function($scope, Destino, $stateParams){

		Destino.show($stateParams.id)
			.success(function(data){
				$scope.pais = data;
			});



	})

	
