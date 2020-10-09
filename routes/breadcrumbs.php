<?php

// Home
Breadcrumbs::for ('home', function ($trail) {
    $trail->push(__('messages.home'), route('index'));
});

// Home > Shopping-card
Breadcrumbs::for ('shopping_card', function ($trail) {
    $trail->parent('home');
    $trail->push(__('messages.cart'), route('shopping_card'));
});

// Home > Shop
Breadcrumbs::for ('shop', function ($trail) {
    $trail->parent('home');
    $trail->push(__('messages.catalog'), route('shop'));
});

// Home > News
Breadcrumbs::for ('news', function ($trail) {
    $trail->parent('home');
    $trail->push(__('messages.news'), route('news'));
});

// Home > About Us
Breadcrumbs::for ('about_us', function ($trail) {
    $trail->parent('home');
    $trail->push(__('messages.about us'), route('about_us'));
});

// Home > Contacts
Breadcrumbs::for ('contacts', function ($trail) {
    $trail->parent('home');
    $trail->push(__('messages.contacts'), route('contacts'));
});

// Home > Checkout
Breadcrumbs::for ('show_checkout', function ($trail) {
    $trail->parent('home');
    $trail->push(__('messages.checkout'), route('show_checkout'));
});

// Home > Login
Breadcrumbs::for ('login', function ($trail) {
    $trail->parent('home');
    $trail->push(__('messages.login'), route('login'));
});

// Home > Register
Breadcrumbs::for ('register', function ($trail) {
    $trail->parent('home');
    $trail->push(__('messages.register'), route('register'));
});

// Home > Reset password
Breadcrumbs::for ('password.request', function ($trail) {
    $trail->parent('home');
    $trail->push(__('messages.password request'), route('password.request'));
});

// Home > [Catalog]
Breadcrumbs::for ('catalog', function ($trail, $catalog) {
    $trail->parent('home');
    $trail->push($catalog->name, route('catalog', $catalog->slug));
});

//Home > [Catalog] > [Product]
Breadcrumbs::for ('product', function ($trail, $product) {
    $trail->parent('catalog', $product->catalog);
    $trail->push($product->name, route('product', $product->slug));
});

// Home > [New]
Breadcrumbs::for ('new', function ($trail, $new) {
    $trail->parent('news');
    $trail->push($new->name, route('new', $new->slug));
});

