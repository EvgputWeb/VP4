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
    return view('index')->with('title', 'ГеймсМаркет - Главная');
});
Route::get('/about', function () {
    return view('about')->with('title', 'ГеймсМаркет - О компании');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/categories/', 'CategoryController@index');
    Route::get('/categories/create', 'CategoryController@create');
    Route::post('/categories/store', 'CategoryController@store');
    Route::get('/categories/edit/{cat_id}', 'CategoryController@edit');
    Route::post('/categories/update/{cat_id}', 'CategoryController@update');
    Route::get('/categories/destroy/{cat_id}', 'CategoryController@destroy');
});