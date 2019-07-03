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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();


Route::get('/login', 'AuthController@login')->name('login');
Route::post('/entrar', 'AuthController@entrar');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::get('/', 'DadosController@index')->name('index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('pesquisaprocesso/{numeroProcesso}', 'DadosController@consultaProcesso');
Route::get('validaprocesso/{numeroProcesso}', 'DadosController@confirmarProcesso');


Route::post('/statusatt/{data}', 'HomeController@editstatus');
Route::post('/deletarel', 			'HomeController@deletaagendamento');

Route::resource('/home', 'HomeController');

//caminho para a tela de alteração de senha
Route::get 	('/alterasenha',			'FuncionarioController@AlteraSenha');
Route::post	('/salvasenha',   		'FuncionarioController@SalvarSenha');
