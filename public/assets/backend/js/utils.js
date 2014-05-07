'use strict';

var app = angular.module('backend.utils', [
	'underscore',
	'ngResource'
]);

app.factory('DataCache', [function () {
	var data = {};
	return {
		get: function(key) {
			return data[key];
		},
		set: function(key, value) {
			data[key] = value;
		}
	};
}])

app.provider('Repository', [function () {
	var _baseUrl = null;

	this.setBaseUrl = function(baseUrl) {
		_baseUrl = baseUrl;
	};

	var formatEmbeds = function(embeds) {
		if(embeds instanceof Array)
		{
			return embeds.join();
		}

		return null;
	}

	this.$get = ['$resource', '$q', '_', function ($resource, $q, _) {
		return function(uri, model) {
			var resource = $resource(_baseUrl+uri+'/:id', {
				id: '@id',
				embeds: null,
				page: null,
				search: null
			},
			{
				'get':    { method:'GET' },
				'find':   { method:'GET' },
				'post':   { method:'POST' },
				'put':    { method:'PUT' },
				'delete': { method:'DELETE' }
			});

			return {
				newModel: function() {
					return model;
				},
				get: function(options) {
					var deferred = $q.defer();

					options.embeds = formatEmbeds(options.embeds);

					resource.get(options, function(response) {
					   deferred.resolve(response);
					});

					return deferred.promise;
				},
				find: function(id, embeds) {
					var deferred = $q.defer();

					embeds = formatEmbeds(embeds);

					resource.find({
						id: id,
						embeds: embeds
					}, function(response) {
					   deferred.resolve(response);
					});

					return deferred.promise;
				},
				save: function(item) {
					var deferred = $q.defer();
					var success = function(response) {
						deferred.resolve(response);
					};

					if(item.id) {
						resource.put(item, success);
					} else {
						resource.post(item, success);
					}


					return deferred.promise;
				},
				delete: function(id) {
					//
				}
			};
		}
	}];
}])
