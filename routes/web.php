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

//Route Info graphic
Route::get('/dashboard/infographic', 'InfographicController@index')->name('infographic.index')->middleware('admin');
Route::get('/dashboard/infographic/create', 'InfographicController@create')->name('infographic.create')->middleware('admin');
Route::post('/dashboard/infographic/store', 'InfographicController@store')->name('infographic.store')->middleware('admin');
Route::get('/dashboard/infographic/edit/{infographic}', 'InfographicController@edit')->name('infographic.edit')->middleware('admin');
Route::patch('/dashboard/infographic/update/{infographic}', 'InfographicController@update')->name('infographic.update')->middleware('admin');
Route::delete('/dashboard/infographic/destroy/{infographic}', 'InfographicController@destroy')->name('infographic.destroy')->middleware('admin');

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


//Route File
Route::get('/dashboard/file', 'FileController@index')->name('file.index')->middleware('admin');
Route::get('/dashboard/file/create', 'FileController@create')->name('file.create')->middleware('admin');
Route::post('/dashboard/file/store', 'FileController@store')->name('file.store')->middleware('admin');
Route::get('/dashboard/file/edit/{file}', 'FileController@edit')->name('file.edit')->middleware('admin');
Route::patch('/dashboard/file/update/{file}', 'FileController@update')->name('file.update')->middleware('admin');
Route::delete('/dashboard/file/destroy/{file}', 'FileController@destroy')->name('file.destroy')->middleware('admin');

// Route Info/Pengumuman
Route::get('/dashboard/info', 'InfoController@index')->name('info.index')->middleware('admin');
Route::get('/dashboard/info/create', 'InfoController@create')->name('info.create')->middleware('admin');
Route::post('/dashboard/info/store', 'InfoController@store')->name('info.store')->middleware('admin');
Route::get('/dashboard/info/edit/{info}', 'InfoController@edit')->name('info.edit')->middleware('admin');
Route::patch('/dashboard/info/update/{info}', 'InfoController@update')->name('info.update')->middleware('admin');
Route::delete('/dashboard/info/destroy/{info}', 'InfoController@destroy')->name('info.destroy')->middleware('admin');

//Route hero slider
Route::get('/dashboard/slider', 'SliderController@index')->name('slider.index')->middleware('admin');
Route::get('/dashboard/slider/create', 'SliderController@create')->name('slider.create')->middleware('admin');
Route::post('/dashboard/slider/store', 'SliderController@store')->name('slider.store')->middleware('admin');
Route::get('/dashboard/slider/edit/{slider}', 'SliderController@edit')->name('slider.edit')->middleware('admin');
Route::patch('/dashboard/slider/update/{slider}', 'SliderController@update')->name('slider.update')->middleware('admin');
Route::delete('/dashboard/slider/destroy/{slider}', 'SliderController@destroy')->name('slider.destroy')->middleware('admin');

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

//Route Services
Route::get('/dashboard/service', 'ServiceController@index')->name('service.index')->middleware('admin');
Route::get('/dashboard/service/create', 'ServiceController@create')->name('service.create')->middleware('admin');
Route::post('/dashboard/service/store', 'ServiceController@store')->name('service.store')->middleware('admin');
Route::get('/dashboard/service/edit/{service}', 'ServiceController@edit')->name('service.edit')->middleware('admin');
Route::patch('/dashboard/service/update/{service}', 'ServiceController@update')->name('service.update')->middleware('admin');
Route::delete('/dashboard/service/destroy/{service}', 'ServiceController@destroy')->name('service.destroy')->middleware('admin');

//Route Video
Route::get('/dashboard/video', 'VideoController@index')->name('video.index')->middleware('admin');
Route::get('/dashboard/video/create', 'VideoController@create')->name('video.create')->middleware('admin');
Route::post('/dashboard/video/store', 'VideoController@store')->name('video.store')->middleware('admin');
Route::get('/dashboard/video/edit/{video}', 'VideoController@edit')->name('video.edit')->middleware('admin');
Route::patch('/dashboard/video/update/{video}', 'VideoController@update')->name('video.update')->middleware('admin');
Route::delete('/dashboard/video/destroy/{video}', 'VideoController@destroy')->name('video.destroy')->middleware('admin');

// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });