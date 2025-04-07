<?php

namespace App\Providers;

use App\Models\Collection;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void // TODO: add caching
    {
        View::composer('components.header', function ($view) {
            $view->with('collections', Collection::all());
        });
    }
}
