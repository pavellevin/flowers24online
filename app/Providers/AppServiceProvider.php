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
            $catalog = \App\Catalog::with('products')->sortingPosition()->get();

            $news = \App\News::all();

            $view->with([
                'catalog' => $catalog,
                'news' => $news,
            ]);
        });

        view()->composer(['site.product', 'site.checkout'], function ($view) {
//            dd(Carbon::now('Europe/Kiev')->addMinutes(30)->format('H:i:s'));
                if ($period = Period::where('start_time', '>', Carbon::now('Europe/Kiev')->addMinutes(30)->format('H:i:s'))
                    ->where('start_time', '<', '19:00:00')
                    ->orderBy('start_time', 'ASC')
                    ->first()) {
                    $nearestperiod = $period->name;
                } else {
                    $nearestperiod = Carbon::tomorrow()->format('d-m-Y');
                }
//dd(\App\Setting::findOrFail(2)->value);

            $view->with([
                'nearestperiod' => $nearestperiod,
                'service_surprise' => \App\Setting::findOrFail(2)->value,
                'service_photo' => \App\Setting::findOrFail(3)->value,
                'service_branded_card' => \App\Setting::findOrFail(4)->value,
                'service_exact_time' => \App\Setting::findOrFail(5)->value,
                'service_morning_evening_delivery' => \App\Setting::findOrFail(6)->value,
                'coast_delivery' => \App\Setting::findOrFail(7)->value,
            ]);
        });
    }
}
