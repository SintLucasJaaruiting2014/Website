'use strict';

var app = angular.module('backend.profile.controllers', [
	'classy',
	'underscore',
	'backend.utils',
	'backend.profile.directives',
	'backend.profile.services',
	'infiniteScroll'
]);

app.classy.controller({
	name: 'ProfileCtrl',
	inject: [
		'$scope'
	],
	init: function() {
		//
	}
});

app.classy.controller({
	name: 'ProfileListCtrl',
	watch: {
		'search': function (newValue, oldValue) {
			this._reset();
		}
	},
	inject: [
		'$scope',
		'$state',
		'$stateParams',
		'ProfileRepository',
		'DataCache'
	],
	current: 0,
	total: 1,
	init: function() {
		this.$scope.$parent.title = 'Profielen';
		this.$scope.canLoad = true;
		this.$scope.filters = {
			approved: '',
			program: {
				data: {
					type_id: ''
				}
			}
		};
		this.loadItems();
	},
	navigate: function(item) {
		console.log(item);
		this.$state.go('app.profile.item', {id: item.id});
	},
	loadItems: function() {
		if(this.$scope.canLoad) {
			var self = this;
			var options = {
				embeds: ['user', 'program'],
				page: self.current + 1,
				sort: {
					approved: 'asc'
				},
				search: self.$scope.search
			};

			self.$scope.canLoad = false;

			self.ProfileRepository.get(options).then(function(response) {
				var items     = response.data;
				var paginator = response.pagination;

				self.current = paginator.current_page;
				self.total   = paginator.total_pages;

				self.$scope.pages[self.current] = items;
				if(self.current < self.total) {
					self.$scope.canLoad = true;
				}
			});
		}
	},
	_reset: function() {
		this.$scope.pages = [];
		this.$scope.canLoad = true;
		this.current = 0;
		this.loadItems();
	}
});

app.classy.controller({
	name: 'ProfileItemCtrl',
	inject: [
		'$scope',
		'$stateParams',
		'ProfileRepository'
	],
	init: function() {
		var self = this;
		var id = this.$stateParams.id;

		self.$scope.$parent.title = 'Profiel: laden...';

		self.ProfileRepository.find(id, [
			'answers',
			'portfolio_items',
			'program',
			'properties',
			'school_location',
			'social_media',
			'user',
			'year'
		]).then(function(response) {
			var item = response.data;
			var name = [
				item.first_name,
				item.last_name_prefix,
				item.last_name
			];

			self.$scope.item = item;
			self.$scope.$parent.title = 'Profiel: '+name.join(' ');
		});
	},
	toggleCompleted: function(item) {
		item.approved = ! item.approved;

		this.ProfileRepository.save({
			id: item.id,
			approved: item.approved
		}).then(function() {
			console.log('updated');
		});
	}
});
