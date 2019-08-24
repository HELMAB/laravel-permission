<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'post', 'middleware' => 'auth'], function () {
    Route::group(['middleware' => 'permission:write post'], function () {
        Route::get('create', 'PostController@create')->name('post.create');
        Route::post('store', 'PostController@store')->name('post.store');
    });
    Route::group(['middleware' => 'permission:edit post'], function () {
        Route::get('{id}/edit', 'PostController@edit')->name('post.edit');
        Route::post('update', 'PostController@update')->name('post.update');
        Route::post('store', 'PostController@store')->name('post.store');
    });

    Route::get('{id}/publish', 'PostController@publish')->middleware('permission:publish post')->name('post.publish');
    Route::get('{id}/delete', 'PostController@delete')->middleware('permission:delete post')->name('post.delete');
    Route::get('{id}/show', 'PostController@show')->name('post.show');
});
