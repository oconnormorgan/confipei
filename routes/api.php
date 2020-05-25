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

Route::middleware('auth:api')->group(function() {

});

Route::post('/login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout')->middleware('auth');

Route::get('/liste', 'ConfitureController@index');
Route::post('/create', 'ConfitureController@store');
Route::post('/confitures/{id}', 'ConfituresController@update')->where('id', "[0-9]+");
Route::get('/producteurs', 'ConfitureController@getProducteurs');
Route::get('/fruits', 'ConfitureController@getFruits');
Route::get('/users', 'UserController@index');

Route::get('/producteur, ProducteursController@index');
