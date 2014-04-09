<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="/assets/ico/favicon.ico">
	<title>Navbar Template for Bootstrap</title>
	<link href="/assets/css/bootstrap.min.css" rel="stylesheet">

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>

	<div class="container">

		<div class="jumbotron">
			<h1>Jaarboek data inname</h1>
			<p>Op deze website kun je alle data ingeven voor het jaarboek. Ook hebben we een aantal vragen en filters die jullie mogen invullen.</p>
			<div class="progress">
				<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
					60% compleet
				</div>
			</div>
		</div>

		@yield('content')

	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="/assets/js/bootstrap.min.js"></script>
</body>
</html>
