angular.module('cursoCtrl', [])

// inject the curso service into our controller
.controller('cursoController', function($scope, $http, curso) {
	//object to hold all the data for the new curso form
	$scope.cursoData = {};

	//loadin variable to show the spining loading icon
	$scope.loading = true;

	//get all cursoes first and bind it to the $scope.cursoes object
	//use the funcion created in service
	//GET ALL cursoES
	curso.get()
		.success(function(data) {
			$scope.cursos = data;
			$scope.loading = false;
		});

	$scope.modal = function(mode, id) {
		$scope.mode = mode;
		$scope.errors = "";
		switch (mode) {
			case 'create':
				$scope.cursoData = {
					'name_es' : '',
					'name_en' : '',
					'info_es' : '',
					'info_en' : '',
					'code' : ''};
				$scope.form_title = "Agregar curso";
				break;
			case 'edit':
				$scope.form_title = "Editar curso";
				$scope.id = id;
				curso.show(id)
					.success(function(data) {
						$scope.cursoData = data;
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
	//SAVE curso
	$scope.submitcurso = function(mode, id) {
		$scope.loading = true;
		//save curso pass comment data from the form
		//use the function created in service
		curso.save(mode, $scope.cursoData, id)
			.success(function(data) {
				if (data.code == 400) {
					$scope.loading = false;
					$scope.errors = data.errors;
				}else{
					//$scope.cursoForm.$dirty = false;
					//if successful, refresh curso list
					curso.get()
						.success(function(getData) {
							$scope.cursos = getData;
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

	//function to handle delete curso
	$scope.deletecurso = function(id) {
		$scope.loading = true;
		//use function created in service
		curso.destroy(id)
			.success(function(data){
				//if successful refresh curso list
				curso.get()
					.success(function(getData){
						$scope.cursos = getData;
						$scope.loading = false;
					});
			});
	};
	
});
