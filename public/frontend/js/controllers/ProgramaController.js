angular.module('ProgramaController', [
	'programaService'
	])

	.controller('ProgramaController', function($scope, Programa){

		Programa.get()
			.success(function(data){
				$scope.programas = data;
			});

	})

	//en caso de detalle de programa
	/*.controller('DestinoDetailController', function($scope, Destino, $stateParams){

		Destino.show($stateParams.id)
			.success(function(data){
				$scope.pais = data;
			});

		Destino.get()
			.success(function(data){
				$scope.destinos = data;
			});


	})*/

	
