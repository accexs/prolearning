var plApp = angular.module('plApp', 
		[
		'ngFileUpload',
		'angular-loading-bar',
		'ui.tinymce',
		'paisCtrl',
		'paisService',
		'ciudadCtrl',
		'ciudadService',
		'institutoCtrl',
		'institutoService',
		'weatherService'
		],
		function($interpolateProvider){
			$interpolateProvider.startSymbol('<%');
			$interpolateProvider.endSymbol('%>');
		});