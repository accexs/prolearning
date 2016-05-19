angular.module('cursoCtrl', [])

// inject the curso service into our controller
.controller('cursoController', function($scope, $http, Curso) {
	//object to hold all the data for the new curso form
	$scope.cursoData = {};

	$scope.showCreate = false;

	//get all cursos first and bind it to the $scope.cursoes object
	//use the funcion created in service
	//GET ALL cursoES
	Curso.get()
		.success(function(data) {
			$scope.cursos = data;
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
				Curso.show(id)
					.success(function(data) {
						$scope.cursoData = data;
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
		//save curso pass comment data from the form
		//use the function created in service
		Curso.save(mode, $scope.cursoData, id)
			.success(function(data) {
				if (data.code == 400) {
					$scope.errors = data.errors;
				}else{
					//$scope.cursoForm.$dirty = false;
					//if successful, refresh curso list
					Curso.get()
						.success(function(getData) {
							$scope.cursos = getData;
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
		//use function created in service
		Curso.destroy(id)
			.success(function(data){
				//if successful refresh curso list
				Curso.get()
					.success(function(getData){
						$scope.cursos = getData;
					});
			});
	};
	
});
