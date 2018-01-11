@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard
                  @if(Auth::user()->checaRegra("administrador"))
                  Administrador
                  @else(Auth::user()->checaRegra("convidado"))
                  Convidado
                  @endif</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!<br>
                    <a href="/home/tarefas">Tarefas</a>
                    @if(Auth::user()->checaRegra("administrador"))
                    <a href="/home/usuarios">Usuarios</a>
                    <a href="/home/regras">Regras</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
