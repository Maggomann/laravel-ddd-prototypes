<?php

namespace Auth\Application\Routes;

use App\Routes\Concerns\RouteGroup;
use Auth\Application\Controllers\RegisterApiAuthUserController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

class ApiAuthUserRoutes implements RouteGroup
{
    public static function register(): Router
    {
        return Route::group([], function () {
            Route::prefix('auth')
                ->group(function () {
                    Route::get('/register', RegisterApiAuthUserController::class);
                });
        });
    }
}
