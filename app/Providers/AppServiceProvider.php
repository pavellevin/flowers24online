<?php

namespace App\Providers;

use App\News;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['layouts.main'], function($view)
        {
            $catalog = \App\Catalog::with('products')->get();
            $news = \App\News::all();

            $view->with([
                'catalog' => $catalog,
                'news' => $news
            ]);
        });

    }
}
