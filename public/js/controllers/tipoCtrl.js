angular.module('tipoCtrl', [])

// inject the tipo service into our controller
.controller('tipoController', function($scope, $http, Tipo) {
	//object to hold all the data for the new tipo form
	$scope.tipoData = {};

	//get all tipos first and bind it to the $scope.tipos object
	//use the funcion created in service
	//GET ALL tipos
	Tipo.get()
		.success(function(data) {
			$scope.tipos = data;
		});

	$scope.modal = function(mode, id) {
		$scope.mode = mode;
		$scope.errors = "";
		switch (mode) {
			case 'create':
				$scope.tipoData = {
					'name_es' : '',
					'name_en' : ''};
				$scope.form_title = "Agregar Tipo";
				break;
			case 'edit':
				$scope.form_title = "Editar Tipo";
				$scope.id = id;
				Tipo.show(id)
					.success(function(data) {
						$scope.tipoData = data;
					});
				break;
			default:
				break;
		}
		console.log();
		$('#tipoModal').modal('show');
	}

	//function to handle submitting the form
	//SAVE Tipo
	$scope.submitTipo = function(mode, id) {
		//save Tipo pass comment data from the form
		//use the function created in service
		Tipo.save(mode, $scope.tipoData, id)
			.success(function(data) {
				if (data.code == 400) {
					$scope.errors = data.errors;
				}else{
					//if successful, refresh pais list
					Pais.get()
						.success(function(getData) {
							$scope.tipos = getData;
						});
				}
			})
			.error(function(data) {
				/* Act on the event */
				console.log(data);
			});
	};

	//function to handle delete pais
	$scope.deleteTipo = function(id) {
		//use function created in service
		Tipo.destroy(id)
			.success(function(data){
				//if successful refresh Tipo list
				Tipo.get()
					.success(function(getData){
						$scope.tipos = getData;
					});
			});
	};
	
});
