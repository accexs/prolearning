angular.module('programaService', [])

.factory('Programa', function($http){
	return {
		//get all programas
		get : function(){
			return $http.get('api/programas');
		},
		//show programa by id
		show : function(id){
			return $http.get('api/programas/' + id);
		}
		
	}
});