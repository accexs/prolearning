var frontPl = angular.module('frontPl',
	[
    'HomeController',
    'DestinoController',
	'ui.router',
	'ngAnimate'
	]);

frontPl.config(function($stateProvider, $urlRouterProvider) {

    
    $urlRouterProvider.otherwise('/home');

    $stateProvider
    // routes
    .state('home', {
            url: '/home',
            views: {
                'content': {
                    templateUrl: 'frontend/partials/_home.html',
                    controller: 'HomeController'
                },
                'footer': {
                    templateUrl: 'frontend/partials/_footer.html'
                }
            }
        })
    .state('programas', {
            url: '/programas',
            views: {
                'content': {
                    templateUrl: 'frontend/partials/_programas.html'
                },
                'footer': {
                    templateUrl: 'frontend/partials/_footer.html'
                }
            }
        })
    .state('destinos', {
            url: '/destinos',
            views: {
                'content': {
                    templateUrl: 'frontend/partials/_destinos.html',
                    controller: 'DestinoController'
                },
                'footer': {
                    templateUrl: 'frontend/partials/_footer.html'
                }
            }
        })
    .state('destinosDetail', {
            url: '/destinos/:id',
            views: {
                'content': {
                    templateUrl: 'frontend/partials/_destino.html',
                    controller: 'DestinoDetailController'
                },
                'footer': {
                    templateUrl: 'frontend/partials/_footer.html'
                }
            }
        })
    .state('promociones', {
            url: '/promociones',
            views: {
                'content': {
                    templateUrl: 'frontend/partials/_promociones.html'
                },
                'footer': {
                    templateUrl: 'frontend/partials/_footer.html'
                }
            }
        })
    .state('presupuesto', {
            url: '/presupuesto',
            views: {
                'content': {
                    templateUrl: 'frontend/partials/_presupuesto.html'
                },
                'footer': {
                    templateUrl: 'frontend/partials/_footer.html'
                }
            }
        })
    .state('contactanos', {
            url: '/contactanos',
            views: {
                'content': {
                    templateUrl: 'frontend/partials/_contactanos.html'
                },
                'footer': {
                    templateUrl: 'frontend/partials/_footer.html'
                }
            }
        })
    .state('conocenos', {
            url: '/conocenos',
            views: {
                'content': {
                    templateUrl: 'frontend/partials/_conocenos.html'
                },
                'footer': {
                    templateUrl: 'frontend/partials/_footer.html'
                }
            }
        });

        
        
        
});

frontPl.run(function($rootScope){
    //the above code here
    $rootScope.$on('$stateChangeSuccess',function(){
    $("html, body").animate({ scrollTop: 0 }, 200);
    })
});