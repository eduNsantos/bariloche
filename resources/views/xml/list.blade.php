@extends('templates.user')

@section('body')
	<div class="col-12 mx-auto">
		<table id="table" class="table">
			<thead>
				<tr>	
					<th>Nota</th>
					<th>Chave</th>
					<th>Emissão</th>
					<th>Valor total (Reais)</th>
					<th>Fornecedor</th>
					<th>Finalidade</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($xmls as $xml)
					<tr>
						<td enable-copy="true" name="Número" class="nota">{{ $xml->getNumero() }}</td>
						<td enable-copy="true" name="Chave">{{ $xml->getChave() }}</td>
						<td enable-copy="true" name="Data de emissão">{{ $xml->getEmissao() }}</td>
						<td enable-copy="true" name="Valor do total">{{ $xml->getTotal() }}</td>
						<td enable-copy="true" name="Fornecedor">{{ $xml->getFornecedor() }}</td>
						<td enable-copy="true" name="Finalidade">{{ $xml->getFinalidade() }}</td>
					</tr>
				@empty
					<tr>
						<td colspan="6" class="text-center bg-light"> Nenhum arquivo encontrado </td>
					</tr>
				@endforelse
			</tbody>
		</table>
	</div>
@endsection