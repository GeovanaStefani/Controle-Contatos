<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/contatos', 'App\Http\Controllers\ContatosController@index')
            ->name('listar_contatos')
            ->middleware('autenticador');
Route::get('/contatos/adicionar', 'App\Http\Controllers\ContatosController@create')
            ->name('form_criar_contato')
            ->middleware('autenticador');
Route::post('/contatos/adicionar', 'App\Http\Controllers\ContatosController@store');
Route::post('/contatos/remover/{id}', 'App\Http\Controllers\ContatosController@destroy');
Route::delete('/contatos/remover/{id}', 'App\Http\Controllers\ContatosController@destroy');
Route::get('/contatos/{contatoId}/enderecos', 'App\Http\Controllers\EnderecosController@index')
    ->name('listar_enderecos');

Route::get('/contatos/{contatoId}/dados', 'App\Http\Controllers\DadosController@index');
Route::post('/contatos/{contatoid}/dados', 'App\Http\Controllers\ContatosController@editar');


Route::get('/contato/{id}/CadastrarEndereco', 'App\Http\Controllers\EnderecosController@cadastrar');
Route::post('/contato/{id}/CadastrarEndereco', 'App\Http\Controllers\EnderecosController@salvar');

Route::get('/enderecos/{id}', 'App\Http\Controllers\EnderecosController@exibir');
Route::post('/enderecos/remover/{id}', 'App\Http\Controllers\EnderecosController@destroy');
Route::delete('/enderecos/remover/{id}', 'App\Http\Controllers\EnderecosController@destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/entrar', 'App\Http\Controllers\EntrarController@index');
Route::post('/entrar', 'App\Http\Controllers\EntrarController@entrar');
Route::get('/registrar', 'App\Http\Controllers\RegistroController@create');
Route::post('/registrar', 'App\Http\Controllers\RegistroController@store');

Route::get('/sair', function () {
    Auth::logout();
    return redirect('/entrar');
});