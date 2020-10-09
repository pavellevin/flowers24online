<?php

namespace App\Providers;

use App\News;
use App\Period;
use Carbon\Carbon;
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
        view()->composer(['layouts.main'], function ($view) {
            $catalog = \App\Catalog::with('products')->get();
//            $catalog = \App\Catalog::all();
//            dd(count($catalog[0]->products));
            $news = \App\News::all();

            $view->with([
                'catalog' => $catalog,
                'news' => $news,
            ]);
        });

        view()->composer(['site.product', 'site.checkout'], function ($view) {
                if ($period = Period::where('start_time', '>', Carbon::now('Europe/Kiev')->addMinutes(30)->format('H:i:s'))
                    ->where('start_time', '<', '18:00:00')
                    ->orderBy('start_time', 'ASC')
                    ->first()) {
                $nearestperiod = $period->name;
            } else {
                    $nearestperiod = Carbon::tomorrow()->format('d-m-Y');
            }
//dd($nearestperiod);
            $view->with([
                'nearestperiod' => $nearestperiod
            ]);
        });
    }
}
