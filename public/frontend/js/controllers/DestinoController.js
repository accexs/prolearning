angular.module('DestinoController', [
	'destinoService'
	])

	.controller('DestinoController', function($scope, Destino){

		Destino.get()
			.success(function(data){
				$scope.paises = data;
			});

	$scope.pais1 = 1;
	$scope.pais2 = 2;
	$scope.pais3 = 3;
	$scope.pais4 = 4;
	$scope.pais5 = 5;
	$scope.pais6 = 8;
	$scope.pais7 = 6;
	$scope.pais8 = 7;
	$scope.pais9 = 9;
	$scope.pais10 = 10;
	$scope.pais11 = 11;

	})

	.controller('DestinoDetailController', function($scope, Destino, $stateParams){

		Destino.show($stateParams.id)
			.success(function(data){
				$scope.pais = data;
			});

		Destino.get()
			.success(function(data){
				$scope.destinos = data;
			});


	})

	
