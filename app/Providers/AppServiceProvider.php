<?php

namespace App\Providers;

use App\Models\Vehicle;
use Illuminate\Support\ServiceProvider;
use App\Observers\VehicleObserver;

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
        Vehicle::observe(VehicleObserver::class);
    }
}
