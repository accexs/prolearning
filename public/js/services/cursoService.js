angular.module('cursoService', [])

.factory('Curso', function($http){

	var programa_id; 


	return {

		getProgramaId: function () {
            return property;
        },
        setProgramaId: function(value) {
            property = value;
        },

		//get all cursos
		get : function(){
			return $http.get('api/cursos');
		},
		//get all cursos by programa_id
		getByPrograma : function(programa_id){
			return $http.get('api/cursos/programa/' + programa_id);
		},
		//show curso by id
		show : function(id){
			return $http.get('api/cursos/' + id);
		},
		//save curso (cursoData)
		save : function(mode , cursoData, id) {
			if (mode == 'edit') {
				url = 'api/cursos/' + cursoData.id;
				method = 'PUT';
			}else{
				url = 'api/cursos';
				method = 'POST';
			}
			return $http({
				method: method,
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