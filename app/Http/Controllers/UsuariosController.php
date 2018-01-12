<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Regras;

class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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
      return [$user,$user->retornaRegras()];
    }

    public function remove(Request $request, $id)
    {
      DB::table('regras_user')->where('user_id', '=', $id)->delete();
      $user = User::destroy($id);
      return back();
    }
}
