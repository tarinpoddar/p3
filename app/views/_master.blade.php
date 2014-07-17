<!doctype html>
<html>
<head>

	<title>@yield('title','Tarin P3')</title>
	
	<link href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/styles/styles.css" type="text/css">
	
	@yield('head')
	
</head>

<body>

	@yield('content')
	
	@yield('body')

	<!--
	<div class="bottom">
		<p class="footer">Tarin Poddar <br> tarinpoddar27@gmail.com</p>
	</div>
	-->	
</body>

</html>