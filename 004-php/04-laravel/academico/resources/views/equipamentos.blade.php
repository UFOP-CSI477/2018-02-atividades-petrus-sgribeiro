@extends('layout.app', ["current" => "equipamentos"])

@section('body')
<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Cadastro de Equipamentos</h5>

@if(count($eqps) > 0)
        <table class="table table-ordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
    @foreach($eqps as $eqp)
                <tr>
                    <td>{{$eqp->id}}</td>
                    <td>{{$eqp->nome}}</td>
                    <td>
                        <a href="/equipamentos/editar/{{$eqp->id}}" class="btn btn-sm btn-primary">Editar</a>
                        <a href="/equipamentos/apagar/{{$eqp->id}}" class="btn btn-sm btn-danger">Apagar</a>
                    </td>
                </tr>
    @endforeach                
            </tbody>
        </table>
@endif        
    </div>
    <div class="card-footer">
        <a href="/equipamentos/novo" class="btn btn-sm btn-primary" role="button">Novo Equipamento</a>
    </div>
</div>



@endsection