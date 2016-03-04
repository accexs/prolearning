angular.module('programaCtrl', [])

// inject the programa service into our controller
.controller('programaController', function($scope, $http, programa) {
	//object to hold all the data for the new programa form
	$scope.programaData = {};

	//loadin variable to show the spining loading icon
	$scope.loading = true;

	//get all programaes first and bind it to the $scope.programaes object
	//use the funcion created in service
	//GET ALL programaES
	programa.get()
		.success(function(data) {
			$scope.programas = data;
			$scope.loading = false;
		});

	$scope.modal = function(mode, id) {
		$scope.mode = mode;
		$scope.errors = "";
		switch (mode) {
			case 'create':
				$scope.programaData = {
					'name_es' : '',
					'name_en' : '',
					'info_es' : '',
					'info_en' : '',
					'code' : ''};
				$scope.form_title = "Agregar programa";
				break;
			case 'edit':
				$scope.form_title = "Editar programa";
				$scope.id = id;
				programa.show(id)
					.success(function(data) {
						$scope.programaData = data;
						$scope.loading = false;
					});
				break;
			default:
				break;
		}
		console.log(id);
		$('#myModal').modal('show');
	}

	//function to handle submitting the form
	//SAVE programa
	$scope.submitprograma = function(mode, id) {
		$scope.loading = true;
		//save programa pass comment data from the form
		//use the function created in service
		programa.save(mode, $scope.programaData, id)
			.success(function(data) {
				if (data.code == 400) {
					$scope.loading = false;
					$scope.errors = data.errors;
				}else{
					//$scope.programaForm.$dirty = false;
					//if successful, refresh programa list
					programa.get()
						.success(function(getData) {
							$scope.programas = getData;
							$scope.loading = false;
							$('#myModal').modal('hide');
						});
				}
			})
			.error(function(data) {
				/* Act on the event */
				console.log(data);
			});
	};

	//function to handle delete programa
	$scope.deleteprograma = function(id) {
		$scope.loading = true;
		//use function created in service
		programa.destroy(id)
			.success(function(data){
				//if successful refresh programa list
				programa.get()
					.success(function(getData){
						$scope.programas = getData;
						$scope.loading = false;
					});
			});
	};
	
});
