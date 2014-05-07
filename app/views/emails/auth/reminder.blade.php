<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Wachtwoord opnieuw instellen</h2>

		<p>
			Je kunt je wachtwoord resetten op deze pagina: <a href="{{ URL::action('auth.controller@showPasswordReset', array($token)) }}">{{ URL::action('auth.controller@showPasswordReset', array($token)) }}</a>
		</p>
		<p>
			<strong>Let op, deze link vervalt na 60 minuten.</strong>
		</p>
	</body>
</html>
