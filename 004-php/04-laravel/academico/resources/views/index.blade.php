@extends('principal')

@section('conteudo')

	<h1>Estados</h1>


		<p>{{ $e->nome}}-{{ $e->sigla}}</p>

	@endforeach

@endsection