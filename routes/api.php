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
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
*/

Route::group(['namespace' => 'api'], function()
{
    Route::group(['prefix' => 'v1', 'namespace' => 'v1'], function()
    {
       Route::get('allergics', 'AllergicsController@index');
       Route::post('allergics', 'AllergicsController@create');
       Route::delete('allergics/{id}', 'AllergicsController@destroy');
       Route::get('allergics/{id}', 'AllergicsController@show', function($id){});
       Route::get('allergics/{id}/edit', 'AllergicsController@edit', function($id){});
       Route::put('allergics/{id}/update', 'AllergicsController@update', function($id){});
    });

    Route::group(['prefix' => 'v2', 'namespace' => 'v2'], function()
    {
       Route::get('allergics', 'AllergicsController@index');
    });

});

