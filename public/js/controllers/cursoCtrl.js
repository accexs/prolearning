angular.module('cursoCtrl', [])

// inject the curso service into our controller
.controller('cursoController', function($scope, $http, Curso) {
	//object to hold all the data for the new curso form
	$scope.cursoData = {};

	$scope.showCreate = false;


	$scope.modalCurso = function(mode, id) {
		$scope.mode = mode;
		$scope.errors = "";
		switch (mode) {
			case 'create':
				$scope.cursoData = {
					'name_es' : '',
					'name_en' : '',
					'summary_es' : '',
					'summary_en' : '',
					'desc_es' : '',
					'desc_en' : '',
					'duration_es' : '',
					'duration_en' : '',
					'age_es' : '',
					'age_en' : '',
					'quantity_es' : '',
					'quantity_en' : '',
					'date_es' : '',
					'date_en' : ''};
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
		//$('#cursoModal').modal('show');
		//$scope.showCreate = true;
	}

	//function to handle submitting the form
	//SAVE curso
	$scope.submitCurso = function(mode, id) {
		$scope.cursoData.programa_id = Curso.getProgramaId();

		//use the function created in service
		Curso.save(mode, $scope.cursoData, id)
			.success(function(data) {
				if (data.code == 400) {
					$scope.errors = data.errors;
				}else{
					//$scope.cursoForm.$dirty = false;
					//if successful, refresh curso list
					Curso.getByPrograma(Curso.getProgramaId())
						.success(function(getData) {
							$scope.cursos = getData;
							$scope.showCreate = false;
						});
				}
			})
			.error(function(data) {
				/* Act on the event */
				console.log(data);
			});
	};

	//function to handle delete curso
	$scope.deleteCurso = function(id) {
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
