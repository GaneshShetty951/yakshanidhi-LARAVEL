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

Route::group(['middlewareGroups'=>['web']],function(){
	// Routes for Mela 
	Route::get('/mela_add','Admin\MelaController@showadd');
	Route::post('/mela_add','Admin\MelaController@add');

	Route::get('/mela_update','Admin\MelaController@showupdate');
	Route::get('/mela_list','Admin\MelaController@show');
	Route::get('/search_mela','Admin\MelaController@showupdate');
	Route::post('/search_mela','Admin\MelaController@insertupdate');
	Route::get('/home', 'HomeController@index');
});



