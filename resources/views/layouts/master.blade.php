<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SIH3 - @yield('title')</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.1/css/bulma.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/app.css">
</head>
<body>
	
	<div id="app">
		
		@include('layouts.nav')

		<div class="container">

			@yield('contents')
		
		</div>

	</div>

	<footer class="footer">
		@include('layouts.footer')
	</footer>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCP1sgG-W732wsw6J4ZgOIO5ScTlJfdT_U"></script>
	<script src="/js/app.js"></script>

</body>
</html>