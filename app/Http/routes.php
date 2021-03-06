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

Route::get('/', "ArticleController@index");
Route::resource("article", "ArticleController");
Route::get('/feed', "ArticleController@feed");

Route::controllers(['auth' => 'Auth\AuthController']);

Route::group(['prefix' => env('APP_ADMIN_LOCATION', 'admin'), "middleware" => "auth"], function(){
	Route::get('/', "AdminController@index");
	Route::resource("article", "AdminArticleController");
	Route::get('article/{id}/config', "AdminArticleController@config");
});
