angular.module('testimonioCtrl', [])

// inject the testimonio service into our controller
.controller('testimonioController', function($scope, $http, Testimonio, Upload, $timeout, cfpLoadingBar) {
	//object to hold all the data for the new testimonio form
	$scope.testimonioData = {};
	//array for images
	$scope.picFiles = [];

	//GET ALL testimonios
	Testimonio.get()
		.success(function(data) {
			$scope.testimonios = data;
		});

	$scope.testimonioModal = function(mode, id) {
		$scope.mode = mode;
		$scope.errors = "";
		switch (mode) {
			case 'create':
				$scope.testimonioData = {
					'name' : '',
					'text_testimonio' : '',
					'location' : ''};
				delete $scope.tumb;
				$scope.picFiles = [];
				$scope.form_title = "Agregar testimonio";
				break;
			case 'edit':
				$scope.form_title = "Editar testimonio";
				$scope.id = id;
				Testimonio.show(id)
					.success(function(data) {
						$scope.testimonioData = data;
						//get photos falta bucle for
						$scope.thumb = data.fotos[data.fotos.length-1].img
					});
				break;
			default:
				break;
		}
		console.log();
		$('#testimonioModal').modal('show');
	}

	//function to handle submitting the form
	//SAVE testimonio
	$scope.submitTestimonio = function(mode, id, picFiles) {
		//save testimonio pass comment data from the form
		//use the function created in service
		Testimonio.save(mode, $scope.testimonioData, id)
			.success(function(data) {
				if (data.code == false) {
					$scope.errors = data.errors;
				}else{
					//save picture if any
					for (var i = picFiles.length - 1; i >= 0; i--) {
						picFiles[i].upload = Upload.upload({
						url: 'api/fotos',
						data: {img: picFiles[i],testimonio_id: data.testimonio_id}
						});
					}

					//if successful, refresh testimonio list
					Testimonio.get()
						.success(function(getData) {
							$scope.testimonios = getData;
							$('#testimonioModal').modal('hide');
						});
				}
			})
			.error(function(data) {
				/* Act on the event */
				console.log(data);
			});
	};

	//function to handle delete testimonio
	$scope.deleteTestimonio = function(id) {
		//use function created in service
		Testimonio.destroy(id)
			.success(function(data){
				//if successful refresh testimonio list
				Testimonio.get()
					.success(function(getData){
						$scope.testimonios = getData;
						$('#testimonioModal').modal('hide');
					});
			});
	};
	
});
