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

// Route Menu
Route::get('dashboard/menu', 'CategoryController@index')->name('category-subcategory.list');
Route::post('dashboard/category-subcategory/save-nested-categories', 'CategoryController@saveNestedCategories')->name('category-subcategory.save-nested-categories');
Route::get('dashboard/category-subcategory/create', 'CategoryController@create')->name('category-subcategory.create');
Route::post('dashboard/category-subcategory/save', 'CategoryController@store')->name('category-subcategory.store');
Route::get('dashboard/category-subcategory/edit/{category_id}', 'CategoryController@edit')->name('category-subcategory.edit');
Route::get('dashboard/category-subcategory/remove/{category_id}', 'CategoryController@remove')->name('category-subcategory.remove');
