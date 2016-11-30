angular.module('paisCtrl', [])

// inject the Pais service into our controller
.controller('paisController', function($scope, $http, Pais) {
	//object to hold all the data for the new pais form
	$scope.paisData = {};

	//get all paises first and bind it to the $scope.paises object
	//use the funcion created in service
	//GET ALL PAISES
	Pais.get()
		.success(function(data) {
			$scope.paises = data;
		});

	$scope.paisModal = function(mode, id) {
		$scope.mode = mode;
		$scope.errors = "";
		switch (mode) {
			case 'create':
				$scope.paisData = {
					'name_es' : '',
					'name_en' : ''};
				$scope.form_title = "Agregar pais";
				break;
			case 'edit':
				$scope.form_title = "Editar pais";
				$scope.id = id;
				Pais.show(id)
					.success(function(data) {
						$scope.paisData = data;
					});
				break;
			default:
				break;
		}
		console.log();
		$('#paisModal').modal('show');
	}

	//function to handle submitting the form
	//SAVE PAIS
	$scope.submitPais = function(mode, id) {
		//save pais pass comment data from the form
		//use the function created in service
		Pais.save(mode, $scope.paisData, id)
			.success(function(data) {
				if (data.code == 400) {
					//$scope.loading = false;
					$scope.errors = data.errors;
				}else{
					//$scope.paisForm.$dirty = false;
					//if successful, refresh pais list
					Pais.get()
						.success(function(getData) {
							$scope.paises = getData;
							$('#paisModal').modal('hide');
						});
				}
			})
			.error(function(data) {
				/* Act on the event */
				console.log(data);
			});
	};

	//function to handle delete pais
	$scope.deletePais = function(id) {
		//use function created in service
		Pais.destroy(id)
			.success(function(data){
				//if successful refresh pais list
				Pais.get()
					.success(function(getData){
						$scope.paises = getData;
						$('#paisModal').modal('hide');
					});
			});
	};
	
});
