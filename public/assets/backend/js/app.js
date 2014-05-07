'use strict';

var app = angular.module('backend', [
	'classy',
	'ngAnimate',
	'ui.router',
	'underscore',
	'backend.profile',
	'backend.utils'
]);

app.run(['$rootScope', '$state', function($rootScope, $state) {

	$rootScope.$on('$stateChangeStart',
	function(event, toState, toParams, fromState, fromParams) {
		// console.log(toState, toParams, fromState, fromParams);
	});
}]);

app.config(['RepositoryProvider', function (RepositoryProvider) {
	RepositoryProvider.setBaseUrl('/api/v1/');
}]);

app.config(['$stateProvider', '$urlRouterProvider', function($stateProvider, $urlRouterProvider)
{

	$urlRouterProvider.otherwise('/profile');

	$stateProvider
		.state('app', {
			abstract: true,
			templateUrl: '/assets/backend/partials/app.html',
			controller: 'AppCtrl'
		})
		// .state('app.dashboard', {
		// 	url: '/',
		// 	templateUrl: '/assets/backend/partials/dashboard.html',
		// 	controller: 'DashboardCtrl'
		// })
		.state('app.profile', {
			url: '/profile',
			templateUrl: '/assets/backend/partials/profile/list.html',
			controller: 'ProfileListCtrl'
		})
		.state('app.profile.item', {
			url: '/:id',
			templateUrl: '/assets/backend/partials/profile/item.html',
			controller: 'ProfileItemCtrl'
		});
}]);

app.classy.controller({
	name: 'AppCtrl',
	inject: [
		'$scope'
	],
	init: function() {
		//
	}
});

app.classy.controller({
	name: 'DashboardCtrl',
	inject: [
		'$scope'
	],
	init: function() {
		//
	}
});
