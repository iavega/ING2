<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
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
// Pagina Login
Route::get('/', 'App\Http\Controllers\usuarioController@loginIndex');
Route::post('/login', 'App\Http\Controllers\usuarioController@verificarLogin');
// Pagina Recuperar Contraseña
Route::get('/recuperar', 'App\Http\Controllers\usuarioController@recuperarIndex');
Route::post('/recuperar', 'App\Http\Controllers\usuarioController@recuperarContrasena');
// Pagina Registrarse
Route::get('/registrars', 'App\Http\Controllers\usuarioController@registrarseIndex');
Route::post('/registrars', 'App\Http\Controllers\usuarioController@registrarseGuardar');
// Pagina Dashboard
Route::get('/registrars',function(){

});
