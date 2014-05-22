'use strict';

var app = angular.module('YearbookApp', [
	'ngAnimate',
	'ui.router'
]);

app.config(['$stateProvider', '$urlRouterProvider', function($stateProvider, $urlRouterProvider)
{

	$urlRouterProvider.otherwise('/');

	$stateProvider
		.state('app', {
			abstract: true,
			templateUrl: '/assets/partials/app.html',
			controller: 'AppCtrl'
		})
		.state('app.profiles', {
			url: '/',
			templateUrl: '/assets/partials/profile/grid.html',
			controller: 'GridCtrl'
		})
		.state('app.profiles.item', {
			url: 'profile/:id',
			templateUrl: '/assets/partials/profile/item.html',
			controller: 'ProfileCtrl'
		});
}]);

app.controller('AppCtrl', ['$scope', function ($scope) {

	var visibles = {};

	$scope.toggle = function(type) {
		visibles[type] = ! visibles[type];
	};

	$scope.visible = function(type) {
		return visibles[type] == true ? true : false;
	};

}]);

app.controller('FilterCtrl', ['$scope', function ($scope) {

}]);

app.controller('GridCtrl', ['$scope', '$http', function($scope, $http) {

	$http.get('/api/v1/profile?page=5').success(function(response) {
		$scope.profiles = response.data;
	});

}]);

app.controller('ProfileCtrl', ['$scope', '$http', '$stateParams', function($scope, $http, $stateParams) {

	var id = $stateParams.id;

	$http.get('/api/v1/profile/'+id).success(function(response) {
		$scope.profile = response.data;
	});

	$http.get('/api/v1/profile/'+id+'/portfolio').success(function(response) {
		$scope.portfolio = response.data;
	});

}]);
