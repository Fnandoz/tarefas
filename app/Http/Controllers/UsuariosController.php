<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Regras;

class UsuariosController extends Controller
{
    public function index(Request $request)
    {
      $regras = Regras::all();
      $usuarios = User::all();

      return view('usuarios', ['usuarios'=>$usuarios, 'regras'=>$regras]);
    }

    public function new(Request $request)
    {
      $regra = Regras::where('nome', $request->input('regra'))->firstOrFail();

      $user = new User();
      $user->name = $request->input('nome');
      $user->email = $request->input('email');
      $user->password = bcrypt($request->input('senha'));
      $user->save();
      $user->regras()->attach($regra);

      return back();
    }

    public function usuario(Request $request, $id)
    {
      $user = User::find($id);
      return $user->regras();
    }
}
