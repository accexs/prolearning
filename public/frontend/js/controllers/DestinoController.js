angular.module('DestinoController', [
	'destinoService'
	])

	.controller('DestinoController', function($scope, Destino){

		Destino.get()
			.success(function(data){
				$scope.paises = data;
			});

	$scope.pais1 = 2;//usa
	$scope.pais2 = 12;//canada
	$scope.pais3 = 22;//francia
	$scope.pais4 = 32;//alemania
	$scope.pais5 = 42;//australia
	$scope.pais6 = 72;//inglaterra
	$scope.pais7 = 52;//malta
	$scope.pais8 = 62;//italia
	$scope.pais9 = 82;//sudafrica
	$scope.pais10 = 92;//irlanda
	$scope.pais11 = 102;//india

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

	
