@extends('layouts.app')
@section('content')
<div>
    <form action="/home/usuarios/new" method="POST">
       {{ csrf_field() }}
      <input type="text" name="nome" placeholder="nome">
      <input type="email" name="email" placeholder="email">
      <input type="password" name="senha" placeholder="senha">

      @foreach($regras as $regra)
      <br>
      <input type="checkbox" name="regra" value="{{$regra->nome}}">{{$regra->nome}}<br>
      @endforeach
      <input type="submit">
    </form>
<div>

<div>
  <ul>
    @foreach($usuarios as $user)
    <li>
      <p>
        {{$user->name}}
        <a href="/home/usuarios/{{$user->id}}/remove">Remover</a>
        <a href="/home/usuarios/{{$user->id}}">Visualizar</a></p>
    </li>
  @endforeach
  </ul>
</div>
@endsection
