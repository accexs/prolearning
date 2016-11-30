angular.module('programaCtrl', [])

// inject the programa service into our controller
.controller('programaController', function($scope, $http, Programa, Ciudad, Instituto, Tipo, Curso) {
	//object to hold all the data for the new programa form
	$scope.programaData = {};

	//get all programaes first and bind it to the $scope.programaes object
	//use the funcion created in service
	//GET ALL programas
	Programa.get($)
		.success(function(data) {
			$scope.programas = data;
		});

	

	$scope.modal = function(mode, id) {
		$scope.mode = mode;
		$scope.errors = "";
		//get ciudades
		Ciudad.get()
			.success(function(getData){
				$scope.ciudades = getData;
			});
		//get tipos 
		Tipo.get()
			.success(function(getData){
				$scope.tipos = getData;
			});
		//get institutos
		Instituto.get()
			.success(function(getData){
				$scope.institutos = getData;
			});

		//watch selectedCiudad value to get institutos
		$scope.$watch('selectedCiudad', function(value){
			if (value) {
				Instituto.getByCiudad(value.id)
					.success(function(getData){
						$scope.institutos = getData;
					});
			}
		});
		switch (mode) {
			case 'create':
				$scope.programaData = {
					'name_es' : '',
					'name_en' : ''};
				delete $scope.selectedCiudad;
				delete $scope.selectedInstituto;
				delete $scope.selectedTipo;
				$scope.form_title = "Agregar programa";
				break;
			case 'edit':
				$scope.form_title = "Editar programa";
				$scope.id = id;
				Programa.show(id)
					.success(function(data) {
						$scope.programaData = data;
						$scope.selectedInstituto = data.instituto;
						$scope.selectedCiudad = data.instituto.ciudad;
						$scope.selectedTipo = data.tipo;
					});
				break;
			default:
				break;
		}
		console.log(id);
		$('#programaModal').modal('show');
	}

	//modal for curso
	$scope.modalListCurso = function(programa_id) {
		$scope.showCreate = false;
		Curso.setProgramaId(programa_id);
		Curso.getByPrograma(programa_id)
			.success(function(getData) {
				$scope.cursos = getData;
			});
		$('#cursoModal').modal('show');
	};

	//function to handle submitting the form
	//SAVE programa
	$scope.submitPrograma = function(mode, id) {
		
		$scope.programaData.tipo = $scope.selectedTipo.id;
		$scope.programaData.instituto = $scope.selectedInstituto.id;

		//use the function created in service
		Programa.save(mode, $scope.programaData, id)
			.success(function(data) {
				if (data.code == 400) {
					$scope.errors = data.errors;
				}else{
					//$scope.programaForm.$dirty = false;
					//if successful, refresh programa list
					Programa.get()
						.success(function(getData) {
							$scope.programas = getData;
							$('#programaModal').modal('hide');
						});
				}
			})
			.error(function(data) {
				/* Act on the event */
				console.log(data);
			});
	};

	//function to handle delete programa
	$scope.deletePrograma = function(id) {
		//use function created in service
		Programa.destroy(id)
			.success(function(data){
				//if successful refresh programa list
				Programa.get()
					.success(function(getData){
						$scope.programas = getData;
					});
			});
	};
	
});
