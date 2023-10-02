<?php

namespace App\Providers;

use App\ActivityLog\ActivityLogger;
use Illuminate\Pagination\Paginator;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\ServiceProvider;
use Spatie\Activitylog\ActivityLogger as SpatieActivityLogger;

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
        // Paginator::useBootstrap();
        Debugbar::disable();
    }
}
