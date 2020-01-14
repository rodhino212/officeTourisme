<?php

use Illuminate\Http\Request;

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

Route::get('points','ApiController@getAllPoints');
Route::get('points/{id}','ApiController@getPoint');
Route::post('points','ApiController@createPoint');
Route::put('points/{id}','ApiController@updatePoint');
Route::delete('points/{id}','ApiController@deletePoint');

Route::get('villes','ApiController@getAllVille');

Route::get('categories','ApiController@getAllCategories');
Route::get('categories/{id}','ApiController@getCategorie');
Route::post('categories','ApiController@createCategorie');
Route::put('categories/{id}','ApiController@updateCategorie');
Route::delete('categories/{id}','ApiController@deleteCategorie');

Route::get('agents','ApiController@getAllAgents');
Route::get('agents/{id}','ApiController@getAgent');
Route::post('agents','ApiController@createAgent');
Route::put('agents/{id}','ApiController@updateAgent');
Route::delete('agents/{id}','ApiController@deleteAgent');