angular.module('ciudadCtrl', [])

// inject the ciudad service into our controller
.controller('ciudadController', function($scope, $http, Ciudad, Weather, Pais, Upload, $timeout) {
	//object to hold all the data for the new ciudad form
	$scope.ciudadData = {};
	//object to hold weather data from openwather
	$scope.weather = {};
	//array for images
	$scope.picFiles = [];
	//loadin variable to show the spining loading icon
	//$scope.loading = true;

	//get all ciudades first and bind it to the $scope.ciudades object
	//use the funcion created in service
	//GET ALL ciudades
	Ciudad.get()
		.success(function(data) {
			$scope.ciudades = data;
			//$scope.loading = false;
		});

	$scope.modal = function(mode, id) {
		$scope.picFile = '';
		$scope.mode = mode;
		$scope.errors = "";
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
					'code' : '',
					'pais' : ''};
				delete $scope.selectedPais;
				$scope.picFiles = [];
				$scope.form_title = "Agregar ciudad";
				break;
			case 'edit':
				//$scope.loadingWeather = true;
				$scope.form_title = "Editar ciudad";
				$scope.id = id;
				Ciudad.show(id)
					.success(function(data) {
						$scope.ciudadData = data;
						//alert(data.fotos[0].img);
						Pais.show(data.pais_id)
							.success(function(getData){
								$scope.selectedPais = getData;
							});
						//get weather data
						Weather.get($scope.ciudadData.code)
							.success(function(data) {
								data.main.temp = Math.round(data.main.temp - 273.15) + '°C';
								code = data.weather[0].id;
								prefix = 'wi wi-';
								icon = '';
								$http.get('js/icons.json')
									.success(function(data){
										$scope.icon = $scope.icon + data[code].icon;
									});
								// If we are not in the ranges mentioned above, add a day/night prefix.
								if (!(code > 699 && code < 800) && !(code > 899 && code < 1000)) {
								    icon = 'day-' + icon;
								}
								$scope.icon =prefix + icon;
								$scope.weather = data;
								//$scope.loadingWeather = false;
							});
						//get photos falta bucle for
						$scope.picFiles[0] = data.fotos[data.fotos.length-1].img
						//$scope.loading = false;
					});
				break;
			default:
				break;
		}
		console.log();
		$('#myModal').modal('show');
	}

	//function to handle submitting the form
	//SAVE ciudad
	$scope.submitCiudad = function(mode, id, img) {
		//$scope.loading = true;
		//save ciudad pass comment data from the form
		//use the function created in service
		$scope.ciudadData.pais =  $scope.selectedPais.id;
		Ciudad.save(mode, $scope.ciudadData, id)
			.success(function(data) {
				if (data.code == 400) {
					//$scope.loading = false;
					$scope.errors = data.errors;
				}else{
					//$scope.ciudadForm.$dirty = false;
					//save picture if any
					alert(JSON.stringify(img.length));
					for (var i = img.length - 1; i >= 0; i--) {
						img[i].upload = Upload.upload({
						url: 'api/fotos',
						data: {img: img[i],ciudad_id: data.ciudad_id}
						});
					}



					//if successful, refresh ciudad list
					Ciudad.get()
						.success(function(getData) {
							$scope.ciudades = getData;
							//$scope.loading = false;
							$('#myModal').modal('hide');
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
		//$scope.loading = true;
		//use function created in service
		Ciudad.destroy(id)
			.success(function(data){
				//if successful refresh ciudad list
				Ciudad.get()
					.success(function(getData){
						$scope.ciudades = getData;
						//$scope.loading = false;
					});
			});
	};
	
});
