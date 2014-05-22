<!DOCTYPE html>
<html lang="en" ng-app="backend">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{ asset('assets/backend/css/bootstrap.min.css') }}" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<title>SintLucas Jaaruiting</title>
</head>

<body>

	<div class="container">

		<div ui-view></div>

	</div>

	<script src="{{ asset('assets/backend/js/vendor/underscore.js') }}"></script>
	<script src="{{ asset('assets/backend/js/vendor/angular.js') }}"></script>
	<script src="{{ asset('assets/backend/js/vendor/angular-ui-router.js') }}"></script>
	<script src="{{ asset('assets/backend/js/vendor/angular-resource.js') }}"></script>
	<script src="{{ asset('assets/backend/js/vendor/angular-animate.js') }}"></script>
	<script src="{{ asset('assets/backend/js/vendor/angular-classy.js') }}"></script>
	<script src="{{ asset('assets/backend/js/vendor/infinite-scroll.js') }}"></script>

	<script src="{{ asset('assets/backend/js/underscore.js') }}"></script>
	<script src="{{ asset('assets/backend/js/utils.js') }}"></script>
	<script src="{{ asset('assets/backend/js/app.js') }}"></script>
	<script src="{{ asset('assets/backend/js/modules/profile/profile.js') }}"></script>
	<script src="{{ asset('assets/backend/js/modules/profile/controllers.js') }}"></script>
	<script src="{{ asset('assets/backend/js/modules/profile/directives.js') }}"></script>
	<script src="{{ asset('assets/backend/js/modules/profile/services.js') }}"></script>

	@include('partials.google.analytics')
</body>
</html>
