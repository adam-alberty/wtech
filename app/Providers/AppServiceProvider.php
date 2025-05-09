<?php

namespace App\Providers;

use App\Models\Collection;
use Illuminate\Support\Facades\Cache;
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
    public function boot(): void
    {
        View::composer('components.header', function ($view) {
            $collections = Cache::remember('header_collections', now()->addHours(1), function () {
                return Collection::all();
            });
            $view->with('collections', $collections);
        });

    }
}
