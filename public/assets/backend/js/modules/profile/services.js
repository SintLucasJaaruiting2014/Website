'use strict';

var app = angular.module('backend.profile.services', [
	'backend.utils',
	'underscore'
]);


app.factory('ProfileRepository', ['Repository', function(Repository) {

	return Repository('profile/profile', {

	});
}]);
