angular.module('destinoService', [])

.factory('Destino', function($http){
	return {
		//get all paises
		get : function(){
			return $http.get('api/paises');
		},
		//get all ciudades of pais
		get_ciudades : function(id){
			return $http.get('api/pais/'+id+'/ciudades');
		},
		//show pais by id
		show : function(id){
			return $http.get('api/paises/' + id);
		}
	}
});