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

	//************** Routes for Mela ************************//
	Route::get('/mela_add','Admin\MelaController@showadd');
	Route::post('/mela_add','Admin\MelaController@add');

	Route::get('/mela_update','Admin\MelaController@showupdate');
	Route::post('/mela_update','Admin\MelaController@update');

	Route::get('/search_mela','Admin\MelaController@showupdate');
	Route::post('/search_mela','Admin\MelaController@insertupdate');
	
	Route::get('/mela_delete/{id}','Admin\MelaController@delete');
	Route::get('/mela_list','Admin\MelaController@show');
	
	//*************** Routes for Prasangha ***********************//
	Route::get('/prasangha_add','Admin\PrasanghaController@showadd');
	Route::post('prasangha_add','Admin\PrasanghaController@add');

	Route::get('/prasangha_update','Admin\PrasanghaController@showupdate');
	Route::post('/prasangha_update','Admin\PrasanghaController@update');

	Route::get('/search_prasangha','Admin\PrasanghaController@showupdate');
	Route::post('/search_prasangha','Admin\PrasanghaController@insertupdate');

	Route::get('/prasangha_delete/{id}','Admin\PrasanghaController@delete');
	Route::get('/prasangha_list','Admin\PrasanghaController@show');

	//******************** Routes for Show **************************//
	Route::get('/show_add','Admin\ShowController@showadd');
	Route::post('/show_add','Admin\ShowController@add');

	Route::get('/show_update','Admin\ShowController@showupdate');
	Route::post('/show_update','Admin\ShowController@update');

	Route::get('/search_show','Admin\ShowController@showupdate');
	Route::post('/search_show','Admin\ShowController@insertupdate');

	Route::get('/show_delete','Admin\ShowController@delete');
	Route::get('/show_list','Admin\ShowController@show');

	//********************* Routes for Artist ********************************//
	Route::get('/artist_add','Admin\ArtistController@showadd');
	Route::post('/artist_add','Admin\ArtistController@add');

	Route::get('/artist_update','Admin\ArtistController@showupdate');
	Route::post('/artist_update','Admin\ArtistController@update');
	
	Route::get('/search_artist','Admin\ArtistController@showupdate');
	Route::post('/search_artist','Admin\ArtistController@insertupdate');

	Route::get('artist_delete','Admin\ArtistController@delete');
	Route::get('/artist_list','Admin\ArtistController@show');

	Route::get('/home', 'HomeController@index');
});



