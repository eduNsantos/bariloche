@extends('templates.user')

@section('links')
	@parent
	<script type="text/javascript" src="js/script.js"></script>
@endsection
@section('body')
	<form class="mx-auto col-8 shadow border p-5 my-4" action="{{ route('procurar_xml_caminho') }}" method="POST">
		@csrf
		<div class="form-row">
			<div class="form-group mx-auto">
				<label>Copie o caminho do mapeamento nota fiscal e cole aqui</label>		
				<input class="form-control" type="text" name="caminho" required>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group mx-auto">
				<input type="submit" class="btn btn-outline-primary" value="Procurar notas">
			</div>
		</div>
	</form>
@endsection
</body>
</html>