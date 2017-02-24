<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(array('prefix' => 'api/v1/'), function()
{
    Route::resource('mela/', 'Api\MelaController@show');
    Route::resource('/mela/{mela_name}/','Api\MelaController@index');
    Route::resource('artist/', 'Api\ArtistController@show');
    Route::resource('prasangha/','Api\PrasanghaController@show');
});

Route::auth();

Route::get('/home', 'HomeController@index');
