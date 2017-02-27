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
		},
		//save programa (programaData)
		save : function(mode , programaData, id) {
			if (mode == 'edit') {
				method = 'PUT';
				url = 'api/programas/' + programaData.id;
			}else{
				method = 'POST';
				url = 'api/programas';
			}
			return $http({
				method: method,
				url: url,
				headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
				data: $.param(programaData)
			});
		},
		//delete programa
		destroy : function(id){
			return $http.delete('api/programas/' + id);
		}
		
	}
});