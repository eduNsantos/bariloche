<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	@section('links')
		<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/estilo.css') }}">
	@show
	<style type="text/css">
		.nav-link {
			color: red;
		}
	</style>
</head>
<body class="">
<nav class="navbar navbar-expand-lg navbar-white bg-white mb-3 border-bottom col-8 mx-auto">
	<a class="navbar-brand" href=""><img style="max-width: 150px" src="{{ asset('storage/logo_bariloche_276x87px.jpg') }}"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div class="navbar-nav ml-auto">
			<a class="nav-link" href="{{ route('index') }}">Procurar XML's</a>
		</div>
	</div>
</nav>
<div class="bg-light">
	@yield('body')
</div>
</body>
</html>