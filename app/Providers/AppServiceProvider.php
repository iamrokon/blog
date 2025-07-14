<?php

namespace App\Providers;

use App\Models\Tenant;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('currentTenant', function () {
            // return the tenant however you manage it — hardcoded, session, request, etc.
            return Tenant::first(); // <-- temporary for testing
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);
    }
}
