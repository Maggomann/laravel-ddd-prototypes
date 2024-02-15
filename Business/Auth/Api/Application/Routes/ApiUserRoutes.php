<?php

namespace Business\Auth\Api\Application\Routes;

use App\Routes\Concerns\RouteGroup;
use Business\Auth\Api\Application\Controllers\ApiUserController;
use Business\Auth\Api\Application\Controllers\ApiUserLoginController;
use Business\Auth\Api\Application\Controllers\ApiUserLogoutController;
use Business\Auth\Api\Application\Controllers\ApiUserRegisterController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

class ApiUserRoutes implements RouteGroup
{
    public static function register(): Router
    {
        return Route::group([], function () {
            Route::prefix('auth-api')
                ->group(function () {
                    Route::prefix('user')
                        ->group(function () {
                            Route::post('/register', ApiUserRegisterController::class);
                            Route::post('/login', ApiUserLoginController::class);

                            Route::middleware('auth:sanctum')
                                ->group(function () {
                                    Route::get('/', ApiUserController::class);
                                    Route::get('/logout', ApiUserLogoutController::class);
                                });
                        });
                });
        });
    }
}
