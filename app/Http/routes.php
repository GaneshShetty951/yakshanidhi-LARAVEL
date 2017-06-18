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

Route::get('/callback/{provider}', 'SocialAuthController@callback');
Route::get('/redirect/{provider}', 'SocialAuthController@redirect');

Route::get('/', ['middleware' =>'guest', function(){
  return view('auth.login');
}]);
Route::get('/session/put',function(){
	session(['test'=>'its working']);
	dd(session('test'));
});
Route::get('/session/get',function(){
	dd(session('test'));
});




Route::auth();

Route::post('/api/ajaxAuthenticate','Auth\AuthController@ajaxAuthenticate');
Route::post('/api/ajaxRegister', 'Auth\AuthController@ajaxRegister');
Route::post('/api/socialLogin','Auth\AuthController@socialLogin');
Route::post('/api/saveDevice','Auth\AuthController@saveDevice');
Route::get('/api/getComments/{pname}/{sid}','Api\ShowController@getComments');
Route::post('/api/saveComments','Api\ShowController@saveComments');
Route::get('/sendNotification','NotificationController@sendNotification');

Route::get('/api/artist/search/{aname}','Api\ArtistController@searchartist');
Route::get('/api/mela/search/{mname}','Api\MelaController@searchmela');
Route::get('/api/prasangha/search/{pname}','Api\PrasanghaController@searchprasangha');
Route::get('/api/show/search/{date}','Api\ShowController@searchshow');
Route::group(array('prefix' => 'api/v1/'), function()
{
	Route::resource('mela/', 'Api\MelaController@show');	
	Route::resource('artist/', 'Api\ArtistController@show');
	Route::resource('prasangha/','Api\PrasanghaController@show');
	Route::resource('show/','Api\ShowController@show');
});


Route::group(['middlewareGroups'=>['web','auth']],function(){

	Route::get('/search/artist','user\SearchController@showArtistSearch');
  	Route::post('/search/artist','user\SearchController@insertSearchArtist');
  	Route::get('/search/artist_result','user\SearchController@artistSearcResult');
  	Route::get('/search/{first_name}/artist','user\SearchController@showSingleArtist');

  	Route::get('/search/prasangha','user\SearchController@showPrasanghaSearch');
  	Route::post('/search/prasangha','user\SearchController@insertSearchPrasangha');
  	Route::get('/search/prasangha_result','user\SearchController@prasanghaSearchResult');
  	Route::get('/search/{pname}/prasangha','user\SearchController@showSinglePrasangha');

  	Route::get('/search/mela','user\SearchController@showMelaSearch');
  	Route::post('/search/mela','user\SearchController@insertSearchMela');
  	Route::get('/search/mela_result','user\SearchController@melaSearchResult');
  	Route::get('/search/{name}/mela','user\SearchController@showSingleMela');

  	Route::get('/search/show','user\SearchController@showSearch');
  	Route::post('/search/show','user\SearchController@insertSearchShow');
  	Route::get('/search/show_result','user\SearchController@showSearchResult');
  	Route::get('/search/{p_name}/{id}/show','user\SearchController@showSingleShow');

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

	Route::get('/show_delete/{id}','Admin\ShowController@delete');
	Route::get('/show_list','Admin\ShowController@show');

	//********************* Routes for Artist ********************************//
	Route::get('/artist_add','Admin\ArtistController@showadd');
	Route::post('/artist_add','Admin\ArtistController@add');
	Route::get('/artist_update','Admin\ArtistController@showupdate');
	Route::post('/artist_update','Admin\ArtistController@update');
	Route::get('/search_artist','Admin\ArtistController@showupdate');
	Route::post('/search_artist','Admin\ArtistController@insertupdate');
	Route::get('artist_delete/{id}','Admin\ArtistController@delete');
	Route::get('/artist_list','Admin\ArtistController@show');

	Route::get('/roles','Admin\RoleController@showrole');
	Route::post('/roles','Admin\RoleController@insertrole');

	Route::post('/role_update','Admin\RoleController@makemanager');
	Route::get('/role_delete/{user_id}','Admin\RoleController@delete');

	Route::get('/home', 'HomeController@index');
	Route::get('/admin','HomeController@admin');

	Route::get('/manager','Manager\ManagerController@man_show_add');
	Route::get('/man_show_add','Manager\ManagerController@man_show_add');
	Route::get('/man_show_update','Manager\ManagerController@man_show_update');
	Route::get('/man_show_list','Manager\ManagerController@man_show_list');
	Route::post('/show_add_man','Manager\ManagerController@show_add_man');
	Route::post('/man_search_show','Manager\ManagerController@man_search_show');
	Route::get('/man_search_show','Manager\ManagerController@man_show_update');
	Route::post('/man_show_update','Manager\ManagerController@man_show_update_add');
	Route::get('/man_show_delete/{id}','Manager\ManagerController@man_show_delete');

  //Routes for the  user
  Route::get('/mela/bhagavataru','user\UserController@melaBhagvataru');
  Route::get('/mela/vesha','user\UserController@melaVeshadhari');
  Route::get('/mela/chande','user\UserController@melaChande');
  Route::get('/mela/maddale','user\UserController@melaMaddale');

  Route::get('/mela/{name}','user\UserController@melaList');

  Route::get('/prasangha','user\UserController@showPrasangha');
  Route::get('/prasangha/{name}','user\UserController@showSinglePrasangha');

  Route::get('/artist/{header}/{artist_name}','user\UserController@singleArtist');

  Route::get('/Todays_show','user\UserController@todayShow');
  Route::get('/show/{p_name}/{show_id}','user\UserController@oneShow');
  Route::post('/comment','user\UserController@saveComment');


});
