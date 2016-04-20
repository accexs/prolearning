angular.module('tipoService', [])

.factory('Tipo', function($http){
	return {
		//get all tipos
		get : function(){
			return $http.get('/api/tipos');
		},
		//show tipo by id
		show : function(id) { 
			return $http.get('api/tipos/' + id);
		},

		//save tipo (tipoData)
		save : function(mode , tipoData, id) {
			if (mode == 'edit') {
				url = 'api/tipos/'+tipoData.id;
			}else{
				url = 'api/tipos';
			}	
			return $http({
				method: 'POST',
				url: url,
				headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
				data: $.param(tipoData)
			});
		},

		//delete tipo
		destroy : function(id) {
			return $http.delete('api/tipos/' + id);
		}
	}
});