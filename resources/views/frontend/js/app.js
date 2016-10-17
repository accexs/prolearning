var frontPl = angular.module('frontPl',
	[
	'ui.router',
	'ngAnimate'
	]);

frontPl.config(function($stateProvider, $urlRouterProvider) {
    
    $urlRouterProvider.otherwise('/home');

    $stateProvider
    // routes
    .state('home', {
            url: '/home',
            templateUrl: 'partials/_home.html'
        })
    .state('programas', {
            url: '/programas',
            templateUrl: 'partials/_programas.html'
        })
    .state('destinos', {
            url: '/destinos',
            templateUrl: 'partials/_destinos.html'
        })
    .state('promociones', {
            url: '/promociones',
            templateUrl: 'partials/_promociones.html'
        })
    .state('presupuesto', {
            url: '/presupuesto',
            templateUrl: 'partials/_presupuesto.html'
        })
    .state('contactanos', {
            url: '/contactanos',
            templateUrl: 'partials/_contactanos.html'
        })
    .state('conocenos', {
            url: '/conocenos',
            templateUrl: 'partials/_conocenos.html'
        });

        
        
        
});