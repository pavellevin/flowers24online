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

//DB::listen(function($query) {
//    var_dump($query->sql);
//    var_dump($query->bindings);
//    var_dump($query->time);
//});

Route::get('/setlocale/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.locales'))) {
        Session::put('locale', $locale);
    }

    return redirect()->back();
})->name('locale');

// Localization
Route::get('/lang-{lang}.js', function ($lang) {
    $locale = in_array($lang, config('app.locales')) ? $lang : config('app.fallback_locale');

    $files = glob(resource_path('lang/' . $locale . '/*.php'));
    $strings = [];

    foreach ($files as $file) {
        $name = basename($file, '.php');
        $strings[$name] = require $file;
    }

    header('Content-Type: text/javascript');
    echo('window.i18n = ' . json_encode($strings) . ';');
    exit();
})->name('assets.lang');

Route::get('/', 'FrontController@index')->name('index');

Route::get('/shop/{sortby?}', 'FrontController@shop')->name('shop');

Route::get('/product/{slug}', 'FrontController@getProduct')->name('product');

Route::get('/catalog/{slug}/filters={filter?}/{sortby?}', 'FrontController@getProductsByFilter');

Route::get('/catalog/{slug}/{sortby?}', 'FrontController@getProducts')->name('catalog');

Route::post('/search', 'FrontController@getProductsBySearch')->name('search');

Route::post('/create-order', 'FrontController@createOrder')->name('create_order');

Route::get('/checkout', 'FrontController@showCheckout')->name('show_checkout');

Route::post('/checkout', 'Auth\LoginController@login')->name('login_checkout');

Route::get('/confirm/{order_id}', 'FrontController@confirm')->name('confirm');

Route::get('/get-districts/{id}', 'FrontController@getDistricts')->name('get_districts');

Route::post('/add-to-newsletters', 'FrontController@mailing')->name('mailing');

Route::post('/add-review', 'FrontController@addReview')->name('add_review')->middleware('auth');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/news', 'FrontController@getNews')->name('news');

Route::get('/new/{slug}', 'FrontController@getNew')->name('new');

Route::get('/about-us', function () {
    return view('site.about_us');
})->name('about_us');

Route::get('/delivery', function () {
    return view('site.about_us');
})->name('delivery');

Route::get('/contacts', function () {
    return view('site.contacts');
})->name('contacts');

Route::get('/shopping-card', 'FrontController@showShoppingCard')->name('shopping_card');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
