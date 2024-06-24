<?php

namespace App\Providers;

use App\Jobs\CreateUserJob;
use App\Jobs\DeleteUserJob;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Repositories\UserRepository::class,
            \App\Repositories\EloquentUserRepository::class
        );
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
