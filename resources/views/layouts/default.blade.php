<doctype HTML>
	<html lang="en">
	<head>
			<meta charset="UTF-8">
			<title>Document</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
			<link href="{!! URL::asset('css/main.css') !!}" rel="stylesheet" type="text/css" >
	</head>
	<body>

		@include('layouts.partials.nav')

			<div class="container">
				@yield('content')
			</div>
			
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</body>
	</html>