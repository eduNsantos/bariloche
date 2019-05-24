<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	
	<!-- CSS -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
	<!-- Default theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.min.css"/>
	<style type="text/css">
		.form-control {
			border:1px 0 0 0 solid;
		}
	</style>
</head>
<body>
	<div id="app">
		<nav class="navbar navbar-expand-lg navbar-white bg-white" style="box-shadow: 5px 0 6px #cecece">
			<a class="navbar-brand" href=""><img style="max-width: 150px" src="{{ asset('storage/logo_bariloche_276x87px.jpg') }}"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav ml-auto text-right">
					<li class="nav-item">
						<a class="nav-link" href="{{ route('xml') }}">Procurar XML's</a>
					</li>
					<li class="nav-item">
						<a class="nav-link btn btn-outline-primary" id="criar-pastas" href="#" route="{{ route('criar_pastas') }}" @click="createFolders()">Criar pastas</a>
					</li>
				</div>
			</div>
		</nav>
		<div class="container-fluid mt-2 p-2">
			@section('body')

			@show
		</div>
	</div>
	<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js">
	</script>
	<script src="//cdn.datatables.net/plug-ins/1.10.19/sorting/date-eu.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="https://milankyncl.github.io/jquery-copy-to-clipboard/jquery.copy-to-clipboard.js"></script>
	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
</body>
</html>