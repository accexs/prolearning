angular.module('institutoCtrl', [])

// inject the instituto service into our controller
.controller('institutoController', function($scope, $http, instituto) {
	//object to hold all the data for the new instituto form
	$scope.institutoData = {};

	//loadin variable to show the spining loading icon
	//$scope.loading = true;

	//get all institutoes first and bind it to the $scope.institutoes object
	//use the funcion created in service
	//GET ALL institutoES
	instituto.get()
		.success(function(data) {
			$scope.institutos = data;
			$scope.loading = false;
		});

	$scope.modal = function(mode, id) {
		$scope.mode = mode;
		$scope.errors = "";
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
					'mail' : ''};
				$scope.form_title = "Agregar instituto";
				break;
			case 'edit':
				$scope.form_title = "Editar instituto";
				$scope.id = id;
				instituto.show(id)
					.success(function(data) {
						$scope.institutoData = data;
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
	//SAVE instituto
	$scope.submitinstituto = function(mode, id) {
		$scope.loading = true;
		//save instituto pass comment data from the form
		//use the function created in service
		instituto.save(mode, $scope.institutoData, id)
			.success(function(data) {
				if (data.code == 400) {
					$scope.loading = false;
					$scope.errors = data.errors;
				}else{
					//$scope.institutoForm.$dirty = false;
					//if successful, refresh instituto list
					instituto.get()
						.success(function(getData) {
							$scope.institutos = getData;
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

	//function to handle delete instituto
	$scope.deleteinstituto = function(id) {
		$scope.loading = true;
		//use function created in service
		instituto.destroy(id)
			.success(function(data){
				//if successful refresh instituto list
				instituto.get()
					.success(function(getData){
						$scope.institutos = getData;
						$scope.loading = false;
					});
			});
	};
	
});
