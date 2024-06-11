<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('App\Repositories\AddressRepository', 'App\Repositories\AddressRepositoryImpl');
        $this->app->bind('App\Repositories\CustomerRepository', 'App\Repositories\CustomerRepositoryImpl');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
