'use strict';

var app = angular.module('YearbookApp', [
	'ui.router'
]);

app.config(['$stateProvider', '$urlRouterProvider', function($stateProvider, $urlRouterProvider)
{

	$urlRouterProvider.otherwise('/');

	$stateProvider
		.state('app', {
			abstract: true,
			templateUrl: '/assets/frontend/partials/app.html',
			controller: 'AppCtrl'
		})
		.state('app.grid', {
			url: '/',
			templateUrl: '/assets/frontend/partials/grid.html',
			controller: 'GridCtrl'
		});
}]);

app.controller('AppCtrl', ['$scope', function ($scope) {

}]);

app.controller('FilterCtrl', ['$scope', function ($scope) {

}]);

app.controller('GridCtrl', ['$scope', function($scope) {

}]);

app.controller('ProfileCtrl', ['$scope', function($scope) {

}]);
