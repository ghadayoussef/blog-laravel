<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/posts/{post}', 'Api\PostController@show')->name('posts.show')->middleware('auth:api');
Route::get('/posts','Api\PostController@index')->name('posts.index')->middleware('auth:api');
Route::post('/posts','Api\PostController@store')->middleware('auth:api');
// Route::group(['middleware'=>'auth:api'],function(){
//     Route::get('/posts', 'PostController@index')->name('posts.index');
//     Route::get('posts/create','PostController@create');
//     Route::post('posts','PostController@store');
//     Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
//     Route::get('/posts/{post}/edit','PostController@edit')->name('posts.edit');
//     Route::delete('/post/{post}','PostController@destroy')->name('posts.destroy');
//     Route::patch('/post/{post}','PostController@update')->name('posts.update');
// });