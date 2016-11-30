angular.module('institutoCtrl', [])

// inject the instituto service into our controller
.controller('institutoController', function($scope, $http, Instituto, Ciudad, Upload, $timeout) {
	//object to hold all the data for the new instituto form
	$scope.institutoData = {};
	//array for images
	$scope.picFiles = [];

	//get all institutoes first and bind it to the $scope.institutoes object
	//use the funcion created in service
	//GET ALL institutoES
	Instituto.get()
		.success(function(data) {
			$scope.institutos = data;
		});

	$scope.modal = function(mode, id) {
		$scope.mode = mode;
		$scope.errors = "";
		Ciudad.get()
			.success(function(getData){
				$scope.ciudades = getData;
			});
		switch (mode) {
			case 'create':
				$scope.institutoData = {
					'name' : '',
					'desc_es' : '',
					'desc_en' : '',
					'location1' : '',
					'coord1' : '',
					'location2' : '',
					'coord2' : '',
					'location3' : '',
					'coord3' : '',
					'reasons_es' : '',
					'reasons_en' : '',
					'website' : '',
					'tel' : '',
					'campustour_es' : '',
					'campustour_en' : '',
					'programs_es' : '',
					'programs_en' : '',
					'accomm_es' : '',
					'accomm_en' : '',
					'activities_es' : '',
					'activities_en' : '',
					'price' : '',
					'ciudad' : '',
					'mail' : ''};
				delete $scope.selectedCiudad;
				$scope.picFiles = [];
				$scope.form_title = "Agregar instituto";
				break;
			case 'edit':
				$scope.form_title = "Editar instituto";
				$scope.id = id;
				Instituto.show(id)
					.success(function(data) {
						$scope.institutoData = data;
						$scope.selectedCiudad = data.ciudad;
						//get photos falta bucle for
						$scope.thumb = data.fotos[data.fotos.length-1].img
					});
				break;
			default:
				break;
		}
		console.log(id);
		$('#myModal').modal('show');
	}

	//function to handle submitting the form
	//SAVE instituto
	$scope.submitInstituto = function(mode, id, img) {
		//save instituto pass comment data from the form
		//use the function created in service
		$scope.institutoData.ciudad = $scope.selectedCiudad.id;
		Instituto.save(mode, $scope.institutoData, id)
			.success(function(data) {
				if (data.code == 400) {
					//$scope.loading = false;
					$scope.errors = data.errors;
				}else{
					for (var i = img.length - 1; i >= 0; i--) {
						img[i].upload = Upload.upload({
						url: 'api/fotos',
						data: {img: img[i],instituto_id: data.instituto_id}
						});
					}

					//$scope.institutoForm.$dirty = false;
					//if successful, refresh instituto list
					Instituto.get()
						.success(function(getData) {
							$scope.institutos = getData;
							$('#myModal').modal('hide');
						});
				}
			})
			.error(function(data) {
				/* Act on the event */
				console.log(data);
			});
	};

	//function to handle delete instituto
	$scope.deleteInstituto = function(id) {
		//$scope.loading = true;
		//use function created in service
		Instituto.destroy(id)
			.success(function(data){
				//if successful refresh instituto list
				Instituto.get()
					.success(function(getData){
						$scope.institutos = getData;
					});
			});
	};
	
});
