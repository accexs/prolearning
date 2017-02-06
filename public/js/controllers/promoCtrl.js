angular.module('promoCtrl', [])

// inject the promo service into our controller
.controller('promoController', function($scope, $http, Promo, Upload, $timeout, cfpLoadingBar) {
	//object to hold all the data for the new promo form
	$scope.promoData = {};
	//array for images
	$scope.picFiles = [];

	//GET ALL promos
	Promo.get()
		.success(function(data) {
			$scope.promos = data;
		});

	$scope.promoModal = function(mode, id) {
		$scope.mode = mode;
		$scope.errors = "";
		switch (mode) {
			case 'create':
				$scope.promoData = {
					'title_es' : '',
					'title_en' : '',
					'desc_es' : '',
					'desc_en' : ''};
				delete $scope.tumb;
				$scope.picFiles = [];
				$scope.form_title = "Agregar promoción";
				break;
			case 'edit':
				$scope.form_title = "Editar promoción";
				$scope.id = id;
				Promo.show(id)
					.success(function(data) {
						$scope.promoData = data;
						//get photos falta bucle for
						$scope.thumb = data.fotos[data.fotos.length-1].img
					});
				break;
			default:
				break;
		}
		console.log();
		$('#promoModal').modal('show');
	}

	//function to handle submitting the form
	//SAVE promo
	$scope.submitPromo = function(mode, id, picFiles) {
		//save promo pass comment data from the form
		//use the function created in service
		Promo.save(mode, $scope.promoData, id)
			.success(function(data) {
				if (data.code == false) {
					$scope.errors = data.errors;
				}else{
					//save picture if any
					for (var i = picFiles.length - 1; i >= 0; i--) {
						picFiles[i].upload = Upload.upload({
						url: 'api/fotos',
						data: {img: picFiles[i],promo_id: data.promo_id}
						});
					}

					//if successful, refresh promo list
					Promo.get()
						.success(function(getData) {
							$scope.promos = getData;
							$('#promoModal').modal('hide');
						});
				}
			})
			.error(function(data) {
				/* Act on the event */
				console.log(data);
			});
	};

	//function to handle delete promo
	$scope.deletePromo = function(id) {
		//use function created in service
		Promo.destroy(id)
			.success(function(data){
				//if successful refresh promo list
				Promo.get()
					.success(function(getData){
						$scope.promos = getData;
						$('#promoModal').modal('hide');
					});
			});
	};
	
});
