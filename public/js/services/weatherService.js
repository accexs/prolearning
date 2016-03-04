angular.module('weatherService', [])

.factory('Weather', function($http){
	return {
		get : function(id) {
			url = 'http://api.openweathermap.org/data/2.5/weather?id='+id+'&appid=6604cb66bfd5de8d8f67780ec6c32105'
			return $http.get(url);
		}
	}
});