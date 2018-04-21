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

use App\Category;
use App\Product;


Route::get('/', function () {
    $data = [
        'title' => 'ГеймсМаркет - Главная',
        'categories' => Category::all(),
        'products' => Product::all()
    ];
    return view('index', $data);
});

Route::get('/about', function () {
    $data = [
        'title' => 'ГеймсМаркет - О компании',
        'categories' => Category::all(),
        'products' => Product::all()->random(3)
    ];
    return view('about', $data);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/categories/', 'CategoryController@index');
    Route::get('/categories/create', 'CategoryController@create');
    Route::post('/categories/store', 'CategoryController@store');
    Route::get('/categories/edit/{cat_id}', 'CategoryController@edit');
    Route::post('/categories/update/{cat_id}', 'CategoryController@update');
    Route::get('/categories/destroy/{cat_id}', 'CategoryController@destroy');

    Route::get('/products/', 'ProductController@index');
    Route::get('/products/create', 'ProductController@create');
    Route::post('/products/store', 'ProductController@store');
    Route::get('/products/edit/{prod_id}', 'ProductController@edit');
    Route::post('/products/update/{prod_id}', 'ProductController@update');
    Route::get('/products/destroy/{prod_id}', 'ProductController@destroy');

    Route::get('/settings/', 'SettingsController@index');
    Route::post('/settings/store', 'SettingsController@store');
});

Route::get('/category/{cat_id}', 'CategoryController@content');
Route::get('/product/details/{prod_id}', 'ProductController@details');
Route::post('/user/info', 'UserController@info');
Route::post('/orders/new', 'OrderController@store');
Route::get('/orders/', 'OrderController@index');
