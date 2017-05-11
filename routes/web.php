<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::pattern('id', '([0-9]+)');
Route::pattern('slug', '(.)+');

Route::group(['namespace' => 'FrontEnd'], function() {
	Route::get('', ['as'=> 'frontend.index.index', 'uses' => 'IndexController@index']);

	Route::get('about-us', ['as'=> 'frontend.infomation.aboutus', 'uses' => 'InformationController@aboutus']);
	Route::get('info/{slub}-{id}', ['as'=> 'frontend.infomation.info', 'uses' => 'InformationController@info']);
	
	Route::get('contact-us', ['as'=> 'frontend.contact.create', 'uses' => 'ContactController@create']);
	Route::post('contact-us', ['as'=> 'frontend.contact.store', 'uses' => 'ContactController@store']);

	Route::get('duration/day-tour', ['as'=> 'frontend.tour.daytour', 'uses' => 'TourController@daytour']);
	Route::get('duration/{id}-days', ['as'=> 'frontend.tour.daytrips', 'uses' => 'TourController@daytrips']);

	Route::get('travel-style/{slug}-{id}', ['as'=> 'frontend.tour.category', 'uses' => 'TourController@category']);
	Route::get('tour/{slug}-{id}.html', ['as'=> 'frontend.tour.detail', 'uses' => 'TourController@detail']);
	
	Route::get('destination/{slug}-{id}', ['as'=> 'frontend.tour.city', 'uses' => 'TourController@tourCity']);

	Route::get('things-to-do/{slug}-{id}', ['as'=> 'frontend.post.category', 'uses' => 'PostController@category']);
	Route::get('guide/{slug}-{id}.html', ['as'=> 'frontend.post.detail', 'uses' => 'PostController@detail']);

	Route::get('guide', ['as'=> 'frontend.post.index', 'uses' => 'PostController@index']);
});			


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function() {

	Route::group(['prefix' => 'things-to-do'], function(){
		Route::get('', ['as'=> 'admin.categoryPosts.index', 'uses' => 'CategoryPostController@index']);
		Route::post('', ['as'=> 'admin.categoryPosts.store', 'uses' => 'CategoryPostController@store']);
		Route::get('create', ['as'=> 'admin.categoryPosts.create', 'uses' => 'CategoryPostController@create']);
		Route::put('{id}', ['as'=> 'admin.categoryPosts.update', 'uses' => 'CategoryPostController@update']);
		Route::patch('{id}', ['as'=> 'admin.categoryPosts.update', 'uses' => 'CategoryPostController@update']);
		Route::delete('{id}', ['as'=> 'admin.categoryPosts.destroy', 'uses' => 'CategoryPostController@destroy']);
		Route::get('{id}', ['as'=> 'admin.categoryPosts.show', 'uses' => 'CategoryPostController@show']);
		Route::get('{id}/edit', ['as'=> 'admin.categoryPosts.edit', 'uses' => 'CategoryPostController@edit']);
	});

	Route::group(['prefix' => 'posts'], function(){
		Route::get('', ['as'=> 'admin.posts.index', 'uses' => 'PostController@index']);
		Route::post('', ['as'=> 'admin.posts.store', 'uses' => 'PostController@store']);
		Route::get('create', ['as'=> 'admin.posts.create', 'uses' => 'PostController@create']);
		Route::put('{id}', ['as'=> 'admin.posts.update', 'uses' => 'PostController@update']);
		Route::patch('{id}', ['as'=> 'admin.posts.update', 'uses' => 'PostController@update']);
		Route::delete('{id}', ['as'=> 'admin.posts.destroy', 'uses' => 'PostController@destroy']);
		Route::get('{id}', ['as'=> 'admin.posts.show', 'uses' => 'PostController@show']);
		Route::get('{id}/edit', ['as'=> 'admin.posts.edit', 'uses' => 'PostController@edit']);
	});

	Route::group(['prefix' => 'type-of-tours'], function(){
		Route::get('', ['as'=> 'admin.categoryTours.index', 'uses' => 'CategoryTourController@index']);
		Route::post('', ['as'=> 'admin.categoryTours.store', 'uses' => 'CategoryTourController@store']);
		Route::get('create', ['as'=> 'admin.categoryTours.create', 'uses' => 'CategoryTourController@create']);
		Route::put('{id}', ['as'=> 'admin.categoryTours.update', 'uses' => 'CategoryTourController@update']);
		Route::patch('{id}', ['as'=> 'admin.categoryTours.update', 'uses' => 'CategoryTourController@update']);
		Route::delete('{id}', ['as'=> 'admin.categoryTours.destroy', 'uses' => 'CategoryTourController@destroy']);
		Route::get('{id}', ['as'=> 'admin.categoryTours.show', 'uses' => 'CategoryTourController@show']);
		Route::get('{id}/edit', ['as'=> 'admin.categoryTours.edit', 'uses' => 'CategoryTourController@edit']);
	});

	Route::group(['prefix' => 'contacts'], function(){
		Route::get('', ['as'=> 'admin.contacts.index', 'uses' => 'ContactController@index']);
		Route::delete('{contacts}', ['as'=> 'admin.contacts.destroy', 'uses' => 'ContactController@destroy']);
		Route::get('{contacts}', ['as'=> 'admin.contacts.show', 'uses' => 'ContactController@show']);
	});

	Route::group(['prefix' => 'tours'], function(){
		Route::get('', ['as'=> 'admin.tours.index', 'uses' => 'TourController@index']);
		Route::post('', ['as'=> 'admin.tours.store', 'uses' => 'TourController@store']);
		Route::get('create', ['as'=> 'admin.tours.create', 'uses' => 'TourController@create']);
		Route::put('{tours}', ['as'=> 'admin.tours.update', 'uses' => 'TourController@update']);
		Route::patch('{tours}', ['as'=> 'admin.tours.update', 'uses' => 'TourController@update']);
		Route::delete('{tours}', ['as'=> 'admin.tours.destroy', 'uses' => 'TourController@destroy']);
		Route::get('{tours}', ['as'=> 'admin.tours.show', 'uses' => 'TourController@show']);
		Route::get('{tours}/edit', ['as'=> 'admin.tours.edit', 'uses' => 'TourController@edit']);
	});

	Route::group(['prefix' => 'information'], function(){
		Route::get('', ['as'=> 'admin.information.index', 'uses' => 'InformationController@index']);
		Route::post('', ['as'=> 'admin.information.store', 'uses' => 'InformationController@store']);
		Route::get('create', ['as'=> 'admin.information.create', 'uses' => 'InformationController@create']);
		Route::put('{information}', ['as'=> 'admin.information.update', 'uses' => 'InformationController@update']);
		Route::patch('{information}', ['as'=> 'admin.information.update', 'uses' => 'InformationController@update']);
		Route::delete('{information}', ['as'=> 'admin.information.destroy', 'uses' => 'InformationController@destroy']);
		Route::get('{information}', ['as'=> 'admin.information.show', 'uses' => 'InformationController@show']);
		Route::get('{information}/edit', ['as'=> 'admin.information.edit', 'uses' => 'InformationController@edit']);
	});

	Route::group(['prefix' => 'cities'], function(){
		Route::get('', ['as'=> 'admin.cities.index', 'uses' => 'CityController@index']);
		Route::post('', ['as'=> 'admin.cities.store', 'uses' => 'CityController@store']);
		Route::get('create', ['as'=> 'admin.cities.create', 'uses' => 'CityController@create']);
		Route::put('{cities}', ['as'=> 'admin.cities.update', 'uses' => 'CityController@update']);
		Route::patch('{cities}', ['as'=> 'admin.cities.update', 'uses' => 'CityController@update']);
		Route::delete('{cities}', ['as'=> 'admin.cities.destroy', 'uses' => 'CityController@destroy']);
		Route::get('{cities}', ['as'=> 'admin.cities.show', 'uses' => 'CityController@show']);
		Route::get('{cities}/edit', ['as'=> 'admin.cities.edit', 'uses' => 'CityController@edit']);
	});

	Route::group(['prefix' => 'users'], function(){
		Route::get('', ['as'=> 'admin.user.index', 'uses' => 'UserController@index']);
		Route::post('', ['as'=> 'admin.user.store', 'uses' => 'UserController@store']);
		Route::get('create', ['as'=> 'admin.user.create', 'uses' => 'UserController@create']);
		Route::put('{user}', ['as'=> 'admin.user.update', 'uses' => 'UserController@update']);
		Route::patch('{user}', ['as'=> 'admin.user.update', 'uses' => 'UserController@update']);
		Route::delete('{user}', ['as'=> 'admin.user.destroy', 'uses' => 'UserController@destroy']);
		Route::get('{user}', ['as'=> 'admin.user.show', 'uses' => 'UserController@show']);
		Route::get('{user}/edit', ['as'=> 'admin.user.edit', 'uses' => 'UserController@edit']);
	});
});		