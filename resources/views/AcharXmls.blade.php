@extends('templates.user')

@section('links')
	@parent
	<script type="text/javascript" src="js/script.js"></script>
@endsection
@section('body')
	<div class="col-8 mx-auto p-3 shadow bg-white my-2 border">
		<div class="text-center">
			<h1>XML's recebidos Bariloche</h1>
		</div>
		@if (!$arquivos)
			<div class="alert alert-info text-center">Caminho não encontrado</div>
			<div class="text-center">
				<a href="{{ route('index') }}" class="btn btn-primary">Inserir caminho novamente</a>
			</div>
		@else
			<div class="table-responsive">
				<form action="#" id="search">
					<div class="col-6 mx-auto text-center">
						<div class="form-group">
							<label>Pesquise a nota pelo número</label>
							<input type="search" name="numNota" class="form-control" placeholder="Digite o Nº da nota">
						</div>
						<div class="form-group btn-group">
							<button type="submit" class="btn btn-primary">Pesquisar nota</button><button type="reset" class="clear-search btn btn-outline-danger">Limpar pesquisa</button>
						</div>
					</div>
				</form>
				<div class="text-center">
					<small>Utilize Shift + Bola do mouse para ver mais informações para ao lado</small>
				</div>
				<table class="table table-bordered">
					<th class="text-center">Nº Nota</th>
					<th class="text-center">Chave de segurança</th>
					<th class="text-center">Fornecedor</th>
					<th class="text-center">Data de emissão</th>
					<th class="text-center">Valor da nota</th>
					@foreach ($arquivos as $arquivo)
						@php
							$chaveSemExt = substr($arquivo, 0, strpos($arquivo,'-nfe.xml'));
						@endphp

						@if (strlen($chaveSemExt) > 2)
							@php
								$xml = simplexml_load_file($caminho.'\\'.$arquivo);
							@endphp
							<tr>
								<td class="text-center align-middle num-nota">{{ ltrim(substr($chaveSemExt, 25, 9),'0') }}</td>
								<td class="text-center align-middle">{{ $chaveSemExt }}</td>
								<td class="text-center align-middle">{{ $xml->xNome }}</td>
								<td class="text-center align-middle">{{ date_format(date_create(substr($xml->dhEmi,0,10)), 'd/m/Y') }}</td>
								<td class="text-center align-middle">R$ {{ number_format(floatval($xml->vNF),2,',',' ') }}</td>
							</tr>
						@endif
					@endforeach
				</table>
			</div>
		@endif
	</div>
@endsection
</body>
</html>