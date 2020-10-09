<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    $router->get('/auth/products', 'ProductsController@index')->name('products');
    $router->post('/auth/products', 'ProductsController@add')->name('add.product');
    $router->get('/auth/products/create', 'ProductsController@create')->name('create.product');
    $router->get('/auth/products/{id}', 'ProductsController@show')->name('show.product');
    $router->put('/auth/products/{id}', 'ProductsController@update')->name('update.product');
    $router->get('/auth/products/{id}/edit', 'ProductsController@edit')->name('edit.product');

    $router->get('/auth/catalog', 'CatalogController@index')->name('catalog');
    $router->post('/auth/catalog', 'CatalogController@add')->name('add.catalog');
    $router->get('/auth/catalog/create', 'CatalogController@create')->name('create.catalog');
    $router->get('/auth/catalog/{id}', 'CatalogController@show')->name('show.catalog');
    $router->put('/auth/catalog/{id}', 'CatalogController@update')->name('update.catalog');
    $router->get('/auth/catalog/{id}/edit', 'CatalogController@edit')->name('edit.catalog');

    $router->get('/auth/cities', 'CitiesController@index')->name('cities');
    $router->post('/auth/cities', 'CitiesController@store')->name('store.city');
    $router->get('/auth/cities/create', 'CitiesController@create')->name('create.city');
    $router->get('/auth/cities/{id}', 'CitiesController@show')->name('show.city');
    $router->put('/auth/cities/{id}', 'CitiesController@update')->name('update.city');
    $router->get('/auth/cities/{id}/edit', 'CitiesController@edit')->name('edit.city');

    $router->get('/auth/districts', 'DistrictsController@index')->name('districts');
    $router->post('/auth/districts', 'DistrictsController@store')->name('add.district');
    $router->get('/auth/districts/create', 'DistrictsController@create')->name('create.district');
    $router->get('/auth/districts/{id}', 'DistrictsController@show')->name('show.district');
    $router->put('/auth/districts/{id}', 'DistrictsController@update')->name('update.district');
    $router->get('/auth/districts/{id}/edit', 'DistrictsController@edit')->name('edit.district');

    $router->get('/auth/orders', 'OrdersController@index')->name('orders');
    $router->post('/auth/orders', 'OrdersController@store')->name('add.order');
    $router->get('/auth/orders/create', 'OrdersController@create')->name('create.order');
    $router->get('/auth/orders/{id}', 'OrdersController@show')->name('show.order');
    $router->put('/auth/orders/{id}', 'OrdersController@update')->name('update.order');
    $router->get('/auth/orders/{id}/edit', 'OrdersController@edit')->name('edit.order');

    $router->get('/auth/groups', 'GroupsController@index')->name('groups');
    $router->post('/auth/groups', 'GroupsController@store')->name('add.groups');
    $router->get('/auth/groups/create', 'GroupsController@create')->name('create.groups');
    $router->get('/auth/groups/{id}', 'GroupsController@show')->name('show.groups');
    $router->put('/auth/groups/{id}', 'GroupsController@update')->name('update.groups');
    $router->get('/auth/groups/{id}/edit', 'GroupsController@edit')->name('edit.groups');

    $router->get('/auth/attributes', 'AttributesController@index')->name('attributes');
    $router->post('/auth/attributes', 'AttributesController@store')->name('add.attributes');
    $router->get('/auth/attributes/create', 'AttributesController@create')->name('create.attributes');
    $router->get('/auth/attributes/{id}', 'AttributesController@show')->name('show.attributes');
    $router->put('/auth/attributes/{id}', 'AttributesController@update')->name('update.attributes');
    $router->get('/auth/attributes/{id}/edit', 'AttributesController@edit')->name('edit.attributes');

    $router->get('/auth/newsletters', 'NewsletterController@index')->name('newsletters');
    $router->post('/auth/newsletters', 'NewsletterController@store')->name('add.newsletter');
    $router->get('/auth/newsletters/create', 'NewsletterController@create')->name('create.newsletter');
    $router->get('/auth/newsletters/{id}', 'NewsletterController@show')->name('show.newsletter');
    $router->put('/auth/newsletters/{id}', 'NewsletterController@update')->name('update.newsletter');
    $router->get('/auth/newsletters/{id}/edit', 'NewsletterController@edit')->name('edit.newsletter');

    $router->get('/auth/news', 'NewsController@index')->name('news');
    $router->post('/auth/news', 'NewsController@add')->name('add.new');
    $router->get('/auth/news/create', 'NewsController@create')->name('create.new');
    $router->get('/auth/news/{id}', 'NewsController@show')->name('show.new');
    $router->put('/auth/news/{id}', 'NewsController@update')->name('update.new');

    $router->get('/auth/periods', 'PeriodsController@index')->name('periods');
    $router->post('/auth/periods', 'PeriodsController@store')->name('store.period');
    $router->get('/auth/periods/create', 'PeriodsController@create')->name('create.period');
    $router->get('/auth/periods/{id}', 'PeriodsController@show')->name('show.period');
    $router->put('/auth/periods/{id}', 'PeriodsController@update')->name('update.period');
    $router->get('/auth/periods/{id}/edit', 'PeriodsController@edit')->name('edit.period');

    $router->get('/auth/settings', 'SettingsController@index')->name('settings');
    $router->post('/auth/settings', 'SettingsController@store')->name('store.setting');
    $router->get('/auth/settings/create', 'SettingsController@create')->name('create.setting');
    $router->get('/auth/settings/{id}', 'SettingsController@show')->name('show.setting');
    $router->put('/auth/settings/{id}', 'SettingsController@update')->name('update.setting');
    $router->get('/auth/settings/{id}/edit', 'SettingsController@edit')->name('edit.setting');

    $router->get('/auth/reviews', 'ReviewController@index')->name('reviews');
    $router->get('/auth/reviews/{id}', 'ReviewController@show')->name('show.review');
    $router->put('/auth/reviews/{id}', 'ReviewController@update')->name('update.review');
    $router->get('/auth/reviews/{id}/edit', 'ReviewController@edit')->name('edit.review');

    $router->resource('newsletters', NewsletterController::class);

    $router->resource('news', NewsController::class);

    $router->resource('groups', GroupsController::class);

    $router->resource('attributes', AttributesController::class);

    $router->resource('periods', PeriodsController::class);

    $router->get('auth/clear-cache', function() {
        Artisan::call('optimize:clear');
        return Artisan::output();
    });

});
