@extends('layouts.app')
@section('content')
<div>
    <form action="/home/{{$url}}/new" method="POST">
       {{ csrf_field() }}
      <input type="text" name="titulo" placeholder="Titulo">
      <input type="text" name="descricao" placeholder="Descricao">
      <input type="submit">
    </form>
<div>

<div>
  <ul>
    @foreach($dados as $dado)
    <li>
      <p>
        @if($url=='tarefas')
        {{$dado->titulo}}
        @else
        {{$dado->nome}}
        @endif
        <a href="/home/{{$url}}/{{$dado->id}}/remove">Remover</a>
        <a href="/home/{{$url}}/{{$dado->id}}">Visualizar</a></p>
    </li>
  @endforeach
  </ul>
</div>
@endsection
