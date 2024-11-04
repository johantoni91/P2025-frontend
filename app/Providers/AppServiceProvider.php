<?php

namespace App\Providers;

use App\Helpers\Shortcut;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        // if (!request()->routeIs('login') && !request()->routeIs('logout')) {
        //     View::share('dashboard', Shortcut::access());
        // }
    }
}
