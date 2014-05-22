<!DOCTYPE html>
<html lang="en" ng-app="YearbookApp">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<title>{{ $title }} - SintLucas Jaaruiting</title>
</head>

<body>
	{{ $content }}

@yield('scripts')
</body>
</html>
