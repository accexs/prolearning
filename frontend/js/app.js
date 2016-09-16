var frontPl = angular.module('frontPl',
	[
	'ui.router',
	'ngAnimate'
	])

frontPl.config(function($stateProvider, $urlRouterProvider) {
    
    $urlRouterProvider.otherwise('/home');
    
    $stateProvider.state('home', {
            url: '/home',
            templateUrl: '_partials/_home.html'
        });
        
        
        
});