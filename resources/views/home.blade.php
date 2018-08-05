<!DOCTYPE html>
<html>
<head>
	<title>My Phone</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}">
</head>
<body>
	
	<div id="app">

		<my-header></my-header>
		<div class="container"> 
			<router-view></router-view>
		</div>
	</div>

	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>