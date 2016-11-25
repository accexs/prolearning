var frontPl = angular.module('frontPl',
	[
    'HomeController',
    'DestinoController',
	'ui.router',
	'ngAnimate'
	]);

frontPl.config(function($stateProvider, $urlRouterProvider) {
    
    $urlRouterProvider.otherwise('frontend/home');

    $stateProvider
    // routes
    .state('home', {
            url: '/home',
            templateUrl: 'frontend/partials/_home.html',
            controller: 'HomeController'
        })
    .state('programas', {
            url: '/programas',
            templateUrl: 'frontend/partials/_programas.html'
        })
    .state('destinos', {
            url: '/destinos',
            templateUrl: 'frontend/partials/_destinos.html',
            controller: 'DestinoController'
        })
    .state('detail', {
            url: '/destinos/:id',
            templateUrl: 'frontend/partials/_destino.html',
            controller: 'DestinoDetailController'
        })
    .state('promociones', {
            url: '/promociones',
            templateUrl: 'frontend/partials/_promociones.html'
        })
    .state('presupuesto', {
            url: '/presupuesto',
            templateUrl: 'frontend/partials/_presupuesto.html'
        })
    .state('contactanos', {
            url: '/contactanos',
            templateUrl: 'frontend/partials/_contactanos.html'
        })
    .state('conocenos', {
            url: '/conocenos',
            templateUrl: 'frontend/partials/_conocenos.html'
        });

        
        
        
});