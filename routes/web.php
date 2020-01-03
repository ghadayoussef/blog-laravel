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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/posts',function(){
    return view('posts.index');
});

Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('posts/create','PostController@create');
Route::post('posts','PostController@store');
Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
Route::get('/posts/{post}/edit','PostController@edit')->name('posts.edit');
Route::delete('/post/{post}','PostController@destroy')->name('posts.destroy');
Route::patch('/post/{post}','PostController@update')->name('posts.update');