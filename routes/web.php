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

Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();

Route::group(['prefix' => 'stories'], function () {
   Route::get('/newest-stories', 'StoryController@getNewestStories')->name('newest.stories');

   Route::get('/finish-stories', 'StoryController@getFinishStories')->name('finish.stories');

   Route::get('/detail/{id}', 'StoryController@show')->name('detail.stories');

   Route::get('/get-list-chaps/{id}', 'StoryController@getListChaps')->name('get.list.chaps');

   Route::get('/show-chap/{id}', 'StoryController@showChap')->name('show.chap');
});

Route::group(['prefix' => 'categories'], function () {
   Route::get('/detail/{id}', 'CategoryController@show')->name('detail.category');

   Route::get('/all-stories-of-category/{id}', 'CategoryController@getAllStoriesOfCategory')->name('all.stories.of.category');
});

Route::group(['prefix' => 'ajax'], function () {
    Route::get('/get-list-chaps/{id}', 'AjaxController@getListChaps')->name('ajax.get.list.chaps');
});

Route::group(['prefix' => 'authors'], function () {
    Route::get('/detail/{id}', 'AuthorController@show')->name('detail.author');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'namespace' => 'Admin'], function () {
   Route::get('/', 'DashBoardController@index')->name('dashboard');

   Route::get('/category', 'CategoryController@index')->name('category.index');

   Route::post('/category', 'CategoryController@store');
   Route::get('/category/{id?}', 'CategoryController@show');
   Route::put('/category/{id?}', 'CategoryController@update');
   Route::delete('/category/{id?}', 'CategoryController@delete');

   Route::get('/story', 'StoryController@index')->name('story.index');
   Route::get('/chap', 'ChapController@index')->name('chap.index');
   Route::get('/author', 'AuthorController@index')->name('author.index');
   Route::get('/user', 'UserController@index')->name('user.index');
});

Route::group(['prefix' => 'ajax'], function () {
    Route::post('/search-ajax', 'AjaxController@autoComplete')->name('search.ajax');
});

Route::get('/check/{query}', 'StoryController@check');