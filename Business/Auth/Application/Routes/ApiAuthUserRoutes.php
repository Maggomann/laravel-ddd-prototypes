<?php

namespace Business\Auth\Application\Routes;

use App\Routes\Concerns\RouteGroup;
use Business\Auth\Application\Controllers\ApiRegisterController;
use Business\Auth\Application\Controllers\ApiUserController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

class ApiAuthUserRoutes implements RouteGroup
{
    public static function register(): Router
    {
        return Route::group([], function () {
            Route::prefix('auth-api')
                ->group(function () {
                        Route::post('/register', ApiRegisterController::class);

                        Route::middleware('auth:sanctum')
                            ->group(function () {
                                Route::get('/user',ApiUserController::class);
                        });
                });
        });
    }
}
