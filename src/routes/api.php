<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'App\Http\Controllers\usuarioController@verificarLogin');
    Route::get('refresh', 'App\Http\Controllers\usuarioController@refresh');
    Route::get('me', 'App\Http\Controllers\usuarioController@me');
    Route::get('Questions', 'App\Http\Controllers\jugarController@get_questions');
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'game'
], function ($router) {
    Route::get('Questions', 'App\Http\Controllers\jugarController@get_questions');
});