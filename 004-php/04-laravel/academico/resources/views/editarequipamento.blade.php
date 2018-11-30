@extends('layout.app', ["current" => "equipamentos"])

@section('body')

<div class="card border">
    <div class="card-body">
        <form action="/equipamentos/{{$eqp->id}}" method="POST">
            @csrf
            @method('PATCH')
            
            <div class="form-group">
                <label for="nomeEquipamento">Nome do Equipamento</label>
                <input type="text" class="form-control" name="nomeEquipamento" value="{{$eqp->nome}}"
                       id="nomeEquipamento" placeholder="Nome do Equipamento">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button type="cancel" class="btn btn-danger btn-sm">Cancel</button>
        </form>
    </div>
</div>

@endsection