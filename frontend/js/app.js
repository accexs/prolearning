var frontPl = angular.module('frontPl',
	[
	'ui.router'
	]);

frontPl.config(function($stateProvider, $urlRouterProvider) {
    
    $urlRouterProvider.otherwise('/home');
    $stateProvider.state('home', {
            url: '/home',
            templateUrl: 'partials/home.html'
        });
        
        
        
});