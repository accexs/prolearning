angular.module('cursoService', [])

.factory('Curso', function($http){
	return {
		//get all cursoes
		get : function(){
			return $http.get('api/cursos');
		},
		//show curso by id
		show : function(id){
			return $http.get('api/cursos/' + id);
		},
		//save curso (cursoData)
		save : function(mode , cursoData, id) {
			if (mode == 'edit') {
				url = 'api/cursos' + cursoData.id;
			}else{
				url = 'api/cursos';
			}
			return $http({
				method: 'POST',
				url: url,
				headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
				data: $.param(cursoData)
			});
		},
		//delete curso
		destroy : function(id){
			return $http.delete('api/cursos/' + id);
		}
		
	}
});