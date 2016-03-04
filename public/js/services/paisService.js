angular.module('paisService', [])

.factory('Pais', function($http){
	return {
		//get all paises
		get : function(){
			return $http.get('/api/paises');
		},
		//show pais by id
		show : function(id) { 
			return $http.get('api/paises/' + id);
		},

		//save pais (paisData)
		save : function(mode , paisData, id) {
			if (mode == 'edit') {
				url = 'api/paises/'+paisData.id;
			}else{
				url = 'api/paises';
			}	
			return $http({
				method: 'POST',
				url: url,
				headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
				data: $.param(paisData)
			});
		},

		//delete pais
		destroy : function(id) {
			return $http.delete('api/paises/' + id);
		}
	}
});