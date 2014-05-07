<!DOCTYPE html>
<html lang="en" ng-app="YearbookDataCollectorApp">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{ asset('assets/datacollector/css/bootstrap.min.css') }}" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<title>@yield('title') | SintLucas Jaaruiting</title>
	@yield('styles')
</head>

<body>

	<div class="container">

		@yield('content')

	</div>

	<script src="{{ asset('assets/datacollector/js/jquery.js') }}"></script>
	<script src="{{ asset('assets/datacollector/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/datacollector/js/angular.js') }}"></script>
	<script src="{{ asset('assets/datacollector/js/angular-route.js') }}"></script>
	<script src="{{ asset('assets/datacollector/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/datacollector/js/app.js') }}"></script>
	<script src="{{ asset('assets/datacollector/js/controllers.js') }}"></script>
	@yield('scripts')

	@include('partials.google.analytics')
</body>
</html>
