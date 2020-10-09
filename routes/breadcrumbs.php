<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > Shopping-card
Breadcrumbs::for('shopping_card', function ($trail) {
    $trail->parent('home');
    $trail->push('Корзина', route('shopping_card'));
});

// Home > Shop
Breadcrumbs::for('shop', function ($trail) {
    $trail->parent('home');
    $trail->push('Каталог', route('shop'));
});

// Home > News
Breadcrumbs::for('news', function ($trail) {
    $trail->parent('home');
    $trail->push('Новости', route('news'));
});

// Home > About Us
Breadcrumbs::for('about_us', function ($trail) {
    $trail->parent('home');
    $trail->push('О нас', route('about_us'));
});

// Home > Contacts
Breadcrumbs::for('contacts', function ($trail) {
    $trail->parent('home');
    $trail->push('Контакты', route('contacts'));
});

// Home > [Catalog]
Breadcrumbs::for('catalog', function ($trail, $catalog) {
    $trail->parent('home');
    $trail->push($catalog->name, route('catalog', $catalog->slug));
});

//Home > [Catalog] > [Product]
Breadcrumbs::for('product', function ($trail, $product) {
    $trail->parent('catalog', $product->catalog);
    $trail->push($product->name, route('product', $product->slug));
});

// Home > [New]
Breadcrumbs::for('new', function ($trail, $new) {
    $trail->parent('news');
    $trail->push($new->name, route('new', $new->slug));
});

