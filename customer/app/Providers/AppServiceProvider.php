<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Jobs\CreateUserJob;
use App\Jobs\DeleteUserJob;

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
        $this->app->bindMethod([CreateUserJob::class, 'handle'], function ($job) {
            return $job->handle();
        });

        $this->app->bindMethod([DeleteUserJob::class, 'handle'], function ($job) {
            return $job->handle();
        });
    }
}
