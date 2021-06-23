<?php

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

Route::get('/', 'App\Http\Controllers\loginController@index');
Route::get('/recuperar', 'App\Http\Controllers\loginController@recuperar');
Route::post('/recuperar', 'App\Http\Controllers\loginController@recuperar_process');
Route::get('/registrars', 'App\Http\Controllers\loginController@registrarse');
Route::post('/registrars', 'App\Http\Controllers\loginController@registrarse_save');
Route::post('/login', 'App\Http\Controllers\loginController@verificarlogin');