'use strict';

// Declare app level module which depends on filters, and services
angular.module('YearbookDataCollectorApp', [
		'ngRoute',
		'YearbookDataCollectorApp.controllers'
	]).filter('range', function() {
		return function(input, total) {
			total = parseInt(total);
			for (var i = 0; i <= total; i++)
				input.push(i);
			return input;
		};
	});
