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
    $request->user()->RegrasAutorizadas(['administrador']);
    $regras = Regras::all();
    return view('index', ['dados'=>$regras, 'url'=>'regras']);
  }

  public function new(Request $request)
  {
    $request->user()->RegrasAutorizadas(['administrador']);
    $titulo = $request->input('titulo');
    $descricao = $request->input('descricao');
    $regras = new Regras;
    $regras->titulo = $titulo;
    $regras->descricao = $descricao;

    $regras->save();
    return back();
  }

  public function edit(Request $request, $id)
  {
    $request->user()->RegrasAutorizadas(['administrador']);
    $titulo = $request->input('titulo');
    $descricao = $request->input('descricao');
    $regras = Regras::find($id);
    $regras->titulo = $titulo;
    $regras->descricao = $descricao;

    $regras->save();
    return back();
  }

  public function remove(Request $request, $id)
  {
    $request->user()->RegrasAutorizadas(['administrador']);
    Regras::destroy($id);
    return back();
  }

  public function regra(Request $request, $id)
  {
    $request->user()->RegrasAutorizadas(['administrador', 'convidado']);
    $regra = Regras::find($id);
    return $regra;
  }
}
