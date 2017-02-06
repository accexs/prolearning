angular.module('testimonioService', [])

.factory('Testimonio', function($http){
	return {
		//get all testimonios
		get : function(){
			return $http.get('/api/testimonios');
		},
		//show testimonio by id
		show : function(id) { 
			return $http.get('api/testimonios/' + id);
		},

		//save testimonio (testimonioData)
		save : function(mode , testimonioData, id) {
			if (mode == 'edit') {
				url = 'api/testimonios/'+testimonioData.id;
				method = 'PUT';
			}else{
				url = 'api/testimonios';
				method = 'POST';
			}	
			return $http({
				method: method,
				url: url,
				headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
				data: $.param(testimonioData)
			});
		},

		//delete testimonio
		destroy : function(id) {
			return $http.delete('api/testimonios/' + id);
		}
	}
});