angular.module('ciudadCtrl', [])

// inject the ciudad service into our controller
.controller('ciudadController', function($scope, $http, Ciudad,  Pais, Upload, $timeout, cfpLoadingBar) {
	//object to hold all the data for the new ciudad form
	$scope.ciudadData = {};
	//array for images
	$scope.picFiles = [];
	//array for thumbnails
	$scope.thumb = [];


	//get all ciudades first and bind it to the $scope.ciudades object
	//use the funcion created in service
	//GET ALL ciudades
	Ciudad.get()
		.success(function(data) {
			$scope.ciudades = data;
		});

	$scope.modal = function(mode, id) {
		$scope.mode = mode;
		$scope.errors = "";
		//get paises
		Pais.get()
			.success(function(getData){
				$scope.paises = getData;		
			});
		switch (mode) {
			case 'create':			
				$scope.ciudadData = {
					'name_es' : '',
					'name_en' : '',
					'info_es' : '',
					'info_en' : '',
					'pais' : ''};
				delete $scope.selectedPais;
				delete $scope.tumb;
				$scope.picFiles = [];
				$scope.form_title = "Agregar ciudad";
				break;
			case 'edit':
				$scope.form_title = "Editar ciudad";
				$scope.id = id;
				Ciudad.show(id)
					.success(function(data) {
						$scope.ciudadData = data;
						$scope.selectedPais = data.pais;
						//get photos falta bucle for
						$scope.thumb = data.fotos[data.fotos.length-1].img
					});
				break;
			default:
				break;
		}
		console.log();
		$('#ciudadModal').modal('show');
	}

	//function to handle submitting the form
	//SAVE ciudad
	$scope.submitCiudad = function(mode, id, picFiles) {
		//save ciudad pass comment data from the form
		$scope.ciudadData.pais =  $scope.selectedPais.id;
		//use the function created in service
		Ciudad.save(mode, $scope.ciudadData, id)
			.success(function(data) {
				if (data.code == false) {
					$scope.errors = data.errors;
				}else{
					//save picture if any
					for (var i = picFiles.length - 1; i >= 0; i--) {
						picFiles[i].upload = Upload.upload({
						url: 'api/fotos',
						data: {img: picFiles[i],ciudad_id: data.ciudad_id}
						});
					}



					//if successful, refresh ciudad list
					Ciudad.get()
						.success(function(getData) {
							$scope.ciudades = getData;
							$('#ciudadModal').modal('hide');
						});
				}
			})
			.error(function(data) {
				/* Act on the event */
				console.log(data);
			});
	};

	//upload img
	/*
	$scope.uploadPic = function(file) {
		file.upload = Upload.upload({
			url: 'api/upload',
			data: {file: file},
		});

		file.upload.then(function (response) {
		  $timeout(function () {
		    file.result = response.data;
		  });
		}, function (response) {
		  if (response.status > 0)
		    $scope.errorMsg = response.status + ': ' + response.data;
		}, function (evt) {
		  // Math.min is to fix IE which reports 200% sometimes
		  file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
		});
	}
	*/

	//function to handle delete ciudad
	$scope.deleteCiudad = function(id) {
		//use function created in service
		Ciudad.destroy(id)
			.success(function(data){
				//if successful refresh ciudad list
				Ciudad.get()
					.success(function(getData){
						$scope.ciudades = getData;
					});
			});
	};
	
});
