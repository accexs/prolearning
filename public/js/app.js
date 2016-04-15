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
		'weatherService',
		'datatables'
		],
		function($interpolateProvider){
			$interpolateProvider.startSymbol('<%');
			$interpolateProvider.endSymbol('%>');
		});