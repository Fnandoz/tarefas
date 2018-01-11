<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/tarefas', 'TarefasConstroller@index');
Route::post('/home/tarefas/new', 'TarefasConstroller@new');
Route::post('/home/tarefas/{id}/edit', 'TarefasConstroller@edit');
Route::get('/home/tarefas/{id}', 'TarefasConstroller@tarefa');
Route::get('/home/tarefas/{id}/remove', 'TarefasConstroller@remove');

Route::get('/home/usuarios', 'UsuariosController@index');
Route::post('/home/usuarios/new', 'UsuariosController@new');
Route::post('/home/usuarios/{id}/edit', 'UsuariosController@edit');
Route::get('/home/usuarios/{id}', 'UsuariosController@usuario');
Route::get('/home/usuarios/{id}/remove', 'UsuariosController@remove');

Route::get('/home/regras', 'RegrasController@index');
Route::post('/home/regras/new', 'RegrasController@new');
Route::post('/home/usuarios/{id}/edit', 'RegrasController@edit');
Route::get('/home/regras/{id}', 'RegrasController@regra');
Route::get('/home/regras/{id}/remove', 'RegrasController@remove');
