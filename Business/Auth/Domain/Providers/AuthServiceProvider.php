<?php

namespace Business\Auth\Domain\Providers;

use Business\Auth\Application\Routes\ApiUserRoutes;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->mapApiRoutes();
    }

    /**
     * Define the "api" routes for the application.
     */
    protected function mapApiRoutes(): void
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace('Business\Auth\Application\Controllers')
            ->group(function () {
                ApiUserRoutes::register();
            });
    }
}
