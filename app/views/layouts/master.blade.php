<!doctype html>
<html class="no-js" ng-app="YearbookApp">
<head>
	<meta charset="utf-8">
	<title>{{ $title }} - SintLucas Jaaruiting</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/styles/main.css"/>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	{{ $content }}

	@yield('scripts')
</body>
</html>
