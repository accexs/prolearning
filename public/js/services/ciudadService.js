angular.module('ciudadService', [])

.factory('Ciudad', function($http){
	return {
		//get all ciudades
		get : function(){
			return $http.get('api/ciudades');
		},
		//show ciudad by id
		show : function(id){
			return $http.get('api/ciudades/' + id);
		},
		//save ciudad (ciudadData)
		save : function(mode , ciudadData, id) {
			if (mode == 'edit') {
				url = 'api/ciudades/' + ciudadData.id;
				method = 'PUT'; 
			}else{
				method = 'POST';
				url = 'api/ciudades';
			}
			return $http({
				method: method,
				url: url,
				headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
				data: $.param(ciudadData)
			});
		},
		//delete ciudad
		destroy : function(id){
			return $http.delete('api/ciudades/' + id);
		}
		
	}
});