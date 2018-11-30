@extends('layout.app', ["current" => "equipamentos"])

@section('body')

<div class="card border">
    <div class="card-body">
        <form action="/equipamentos" method="POST">
            @csrf
            <div class="form-group">
                <label for="nomeEquipamento">Nome do Equipamento</label>
                <input type="text" class="form-control" name="nomeEquipamento" 
                       id="nomeEquipamento" placeholder="Nome do Equipamento">
            </div>
@if($errors->any())
            <div class="card-footer">
        @foreach($errors->all() as $error)
                <div class="aler alert-danger" role="alert">
                    {{ $error }}
                </div>
        @endforeach
            </div>
@endif
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button type="cancel" class="btn btn-danger btn-sm">Cancel</button>
        
        </form>
    </div>
</div>

@endsection