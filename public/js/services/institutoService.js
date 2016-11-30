angular.module('institutoService', [])

.factory('Instituto', function($http){
	return {
		//get all institutoes
		get : function(){
			return $http.get('api/institutos');
		},
		//get all institutos for a ciudad
		getByCiudad : function(id){
			return $http.get('api/institutos/ciudad/' + id);
		},
		//show instituto by id
		show : function(id){
			return $http.get('api/institutos/' + id);
		},
		//save instituto (institutoData)
		save : function(mode , institutoData, id) {
			if (mode == 'edit') {
				url = 'api/institutos/' + institutoData.id;
				method = 'PUT';
			}else{
				url = 'api/institutos';
				method = 'POST';
			}
			return $http({
				method: method,
				url: url,
				headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
				data: $.param(institutoData)
			});
		},
		//delete instituto
		destroy : function(id){
			return $http.delete('api/institutos/' + id);
		}
		
	}
});