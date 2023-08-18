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
Route::get('/dashboard/post', 'PostController@index')->name('post.index')->middleware('admin');
Route::get('/dashboard/post/create', 'PostController@create')->name('post.create')->middleware('admin');
Route::post('/dashboard/post/store', 'PostController@store')->name('post.store')->middleware('admin');
Route::get('/dashboard/post/edit/{post}', 'PostController@edit')->name('post.edit')->middleware('admin');
Route::patch('/dashboard/post/update/{post}', 'PostController@update')->name('post.update')->middleware('admin');
Route::delete('/dashboard/post/destroy/{post}', 'PostController@destroy')->name('post.destroy')->middleware('admin');
// Route::get('/dashboard/page/detail/{post}', 'PostController@show')->name('post.show')->middleware('admin');
Route::get('/post/detail/{post}', 'PostController@show')->name('post.show');
Route::get('/post/all', 'PostController@all')->name('post.all');

// Route Config
Route::get('/', 'ConfigController@show')->name('config.show');
Route::get('/dashboard/config', 'ConfigController@index')->name('dashboard.index')->middleware('admin');
Route::patch('/dashboard/config/update/{config}', 'ConfigController@update')->name('config.update')->middleware('admin');

//Route Page
Route::get('/dashboard/page', 'PageController@index')->name('page.index')->middleware('admin');
Route::get('/dashboard/page/create', 'PageController@create')->name('page.create')->middleware('admin');
Route::post('/dashboard/page/store', 'PageController@store')->name('page.store')->middleware('admin');
Route::get('/dashboard/page/edit/{page}', 'PageController@edit')->name('page.edit')->middleware('admin');
Route::get('/page/detail/{page}', 'PageController@show')->name('page.show')->middleware('admin');
Route::patch('/dashboard/page/update/{page}', 'PageController@update')->name('page.update')->middleware('admin');
Route::delete('/dashboard/page/destroy/{page}', 'PageController@destroy')->name('page.destroy')->middleware('admin');

// Route Menu
Route::get('dashboard/menu', 'CategoryController@index')->name('category-subcategory.list');
Route::post('dashboard/category-subcategory/save-nested-categories', 'CategoryController@saveNestedCategories')->name('category-subcategory.save-nested-categories');
Route::get('dashboard/category-subcategory/create', 'CategoryController@create')->name('category-subcategory.create');
Route::post('dashboard/category-subcategory/save', 'CategoryController@store')->name('category-subcategory.store');
Route::get('dashboard/category-subcategory/edit/{category_id}', 'CategoryController@edit')->name('category-subcategory.edit');
Route::get('dashboard/category-subcategory/remove/{category_id}', 'CategoryController@remove')->name('category-subcategory.remove');

// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });