<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Regras;

class RegrasController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index(Request $request)
  {
    $request->user()->RegrasAutorizadas(['administrador', 'convidado']);
    $regras = Regras::all();
    return view('index', ['dados'=>$regras, 'url'=>'regras']);
  }

  public function new(Request $request)
  {
    $request->user()->RegrasAutorizadas(['administrador']);
    $titulo = $request->input('titulo');
    $descricao = $request->input('descricao');
    $tarefa = new Tarefa;
    $tarefa->titulo = $titulo;
    $tarefa->descricao = $descricao;

    $tarefa->save();
    return back();
  }

  public function edit($id)
  {
    $titulo = $request->input('titulo');
    $descricao = $request->input('descricao');
    $tarefa = Tarefa::find($id);
    $tarefa->titulo = $titulo;
    $tarefa->descricao = $descricao;

    $tarefa->save();
  }

  public function remove(Request $request, $id)
  {
    $request->user()->RegrasAutorizadas(['administrador']);
    Tarefa::destroy($id);
    return back();
  }

  public function tarefa(Request $request, $id)
  {
    $request->user()->RegrasAutorizadas(['administrador', 'convidado']);
    $tarefa = Tarefa::find($id);
    return $tarefa;
  }
}
