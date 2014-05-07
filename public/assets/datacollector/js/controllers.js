'use strict';

/* Controllers */

angular.module('YearbookDataCollectorApp.controllers', [])
	.controller('IndexCtrl', ['$scope', '$location', '$anchorScroll', function($scope, $location, $anchorScroll) {
		$scope.previewImage = null;
		$scope.setPreview = function(image)
		{
			$scope.previewImage = image;
			$scope.gotoPreview();
		}

		$scope.gotoPreview = function ()
		{
		    // set the location.hash to the id of
		    // the element you wish to scroll to.
		    $location.hash('preview');

		    // call $anchorScroll()
		    $anchorScroll();
		  };
	}])
	.controller('QuestionsCtrl', ['$scope', function($scope) {
		function init () {
			$scope.answers = window.answers;
			var max = window.questionMax;

			for (var i = max - 1; i >= 0; i--) {
				console.log(max, answers[i]);
				if(typeof $scope.answers[i] == 'undefined')
				{
					$scope.answers[i] = {
						value: ''
					};
				}
			};

			return 'asd';
		}

		$scope.getCount = function(str) {
			if(typeof str != 'undefined')
			{
				return str.length;
			}

			return 0;
		}

		init();
	}])
	.controller('SocialMediaCtrl', ['$scope', function($scope) {
		function init () {
			$scope.accounts = window.accounts;
			var max = window.socialMediaMax;
			for (var i = max - 1; i >= 0; i--) {
				if(typeof $scope.accounts[i] == 'undefined')
				{
					$scope.accounts[i] = {
						type_id: '',
						username: ''
					};
				}
			};
		}

		$scope.types = window.types;

		var findTypeById = function(id)
		{
			for (var i = $scope.types.length - 1; i >= 0; i--) {
				if($scope.types[i].id == id)
				{
					return $scope.types[i];
				}
			};
		}

		$scope.showPreview = function(type, username) {
			if(type > 0 && username != undefined && username != '')
			{
				return true;
			}

			return false;
		}

		$scope.previewUrl = function(type, username)
		{
			var type = findTypeById(type);
			if(type)
			{
				return type.url.replace('{username}', username);
			}
		}

		init();
	}])
	.controller('PortfolioItemCtrl', ['$scope', function($scope) {
		var config = window.portfolioConfig;

		$scope.typeVisibile = function (portfolioType, mediaTypeSlug) {
			var allowed = config[portfolioType];
			if(allowed)
			{
				for (var i = allowed.length - 1; i >= 0; i--) {
					if(allowed[i] == mediaTypeSlug)
					{
						return true;
					}
				};
			}

			return false;
		}

		$scope.getWidth = function(portfolioType) {
			// @todo get data from config
			if(portfolioType == 1)
			{
				return 1200;
			}
			else
			{
				return 660;
			}
		}
		$scope.getHeight = function(portfolioType) {
			// @todo get data from config
			if(portfolioType == 1)
			{
				return 400;
			}
			else
			{
				return 830;
			}
		}

		$scope.showMediaType = function(a, b) {
			if(a == true && b == true)
			{
				return true;
			}
		}
	}]);
