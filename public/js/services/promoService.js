angular.module('promoService', [])

.factory('Promo', function($http){
	return {
		//get all promos
		get : function(){
			return $http.get('/api/promos');
		},
		//show promo by id
		show : function(id) { 
			return $http.get('api/promos/' + id);
		},

		//save promo (promoData)
		save : function(mode , promoData, id) {
			if (mode == 'edit') {
				url = 'api/promos/'+promoData.id;
				method = 'PUT';
			}else{
				url = 'api/promos';
				method = 'POST';
			}	
			return $http({
				method: method,
				url: url,
				headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
				data: $.param(promoData)
			});
		},

		//delete promo
		destroy : function(id) {
			return $http.delete('api/promos/' + id);
		}
	}
});