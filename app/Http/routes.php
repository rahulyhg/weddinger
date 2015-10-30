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
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
    ]);


Route::get('/', 'WelcomeController@index');



Route::group(['middleware' => 'auth'], function () {

    Route::get('event',['as'=>'event.index','uses'=>'EventController@index']);
    Route::get('event/create',['as'=>'event.create','uses'=>'EventController@create']);
    Route::post('event',['as'=>'event.store','uses'=>'EventController@store']);
    Route::put('event/{eventSlug}',['as'=>'event.update','uses'=>'EventController@update']);
    Route::get('event/{eventSlug}',['as'=>'event.show','uses'=>'EventController@show']);

    Route::resource('event/{eventSlug}/menu','MenuController',['except'=>['show','edit']]);
    Route::resource('event/{eventSlug}/menu/menu-item','MenuItemController',['except'=>['store','show','edit','index','destroy']]);
    Route::delete('event/{eventSlug}/menu/{id}/menu-item/{menuItemId}',['as'=>'event.menu.menu-item.destroy','uses'=>'MenuItemController@destroy']);
    Route::put('event/{eventSlug}/menu/{id}/menu-item',['as'=>'event.menu.menu-item.store','uses'=>'MenuItemController@store']);


    Route::get('event/{eventSlug}/instastream/',['as'=>'event.instastream','uses'=>'InstastreamController@index']);
    Route::controller('event/{eventSlug}/instastream/hashtag','HashtagController',['postHashtag'=>'event.instastream.hashtag.create']);
});
