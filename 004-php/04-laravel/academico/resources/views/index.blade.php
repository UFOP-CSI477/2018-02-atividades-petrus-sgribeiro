@extends('layout.app', ["current" => "home"])

@section('body')

<div class="jumbotron bg-light border border-secondary">
    <div class="row">
        <div class="card-deck">
            <div class="card border border-primary">
                <div class="card-body">
                    <h5 class="card-title">Cadastro de Registros</h5>
                    <p class="card=text">
                        Aqui você cadastra todos os seus registros.
                        Só não se esqueça de cadastrar previamente os equipamentos
                    </p>
                    <a href="/registros" class="btn btn-primary">Cadastre seus registros</a>
                </div>
            </div>
            <div class="card border border-primary">
                <div class="card-body">
                    <h5 class="card-title">Cadastro de Equipamentos</h5>
                    <p class="card=text">
                        Cadastre os equipamentos dos seus registros
                    </p>
                    <a href="/equipamentos" class="btn btn-primary">Cadastre seus equipamentos</a>
                </div>
            </div>            
        </div>
    </div>
</div>

@endsection