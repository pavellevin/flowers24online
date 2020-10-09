<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'FrontController@index')->name('index');

Route::get('/shop/{sortby?}', 'FrontController@shop')->name('shop');

Route::get('/product/{slug}',  'FrontController@getProduct')->name('product');

Route::get('/catalog/{slug}/filters={filter?}/{sortby?}', 'FrontController@getProductsByFilter');

Route::get('/catalog/{slug}/{sortby?}',  'FrontController@getProducts')->name('catalog');

Route::post('/search',  'FrontController@getProductsBySearch')->name('search');

Route::post('/create-order', 'FrontController@createOrder')->name('create_order');
Route::get('/checkout', 'FrontController@showCheckout')->name('show_checkout');
Route::post('/checkout',  'Auth\LoginController@login')->name('login_checkout');
Route::get('/confirm/{order_id}', 'FrontController@confirm')->name('confirm');

Route::get('/get-districts/{id}', 'FrontController@getDistricts')->name('get_districts');

Route::post('/add-to-newsletters', 'FrontController@mailing')->name('mailing');

Route::get('/logout',  'Auth\LoginController@logout')->name('logout');

Route::get('/news',  'FrontController@getNews')->name('news');

Route::get('/new/{slug}', 'FrontController@getNew')->name('new');

Route::get('/about-us', function () {
    return view('site.about_us');
})->name('about_us');

Route::get('/contacts', function () {
    return view('site.contacts');
})->name('contacts');

Route::get('/shopping-card', 'FrontController@showShoppingCard')->name('shopping_card');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
