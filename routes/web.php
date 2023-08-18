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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route Post
Route::get('/post/detail/{post:slug}', 'PostController@show')->name('post.show');
Route::get('/post/all', 'PostController@all')->name('post.all');

// Route Config
Route::get('/', 'ConfigController@show')->name('config.show');
Route::get('/dashboard/config', 'ConfigController@index')->name('dashboard.index')->middleware('admin');
Route::patch('/dashboard/config/update/{config}', 'ConfigController@update')->name('config.update')->middleware('admin');
