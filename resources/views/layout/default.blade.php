<doctype HTML>
	<html lang="en">
	<head>
			<meta charset="UTF-8">
			<title>Document</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	</head>
	<body>
			<div class="container">
				@yield('content')
			</div>
			
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	        {{--<script>
             $('#flash-overlay-modal').modal();

             $('.comments__create-form').on('keydown', function(e) {
               if (e.keyCode == 13) {
               e.preventDefault();
               $(this).submit();
               }
           });
         </script>--}}
	</body>
	</html>