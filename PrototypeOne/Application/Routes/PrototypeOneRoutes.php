<?php

namespace PrototypeOne\Application\Routes;

use App\Routes\Concerns\RouteGroup;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use PrototypeOne\Application\Controllers\CreateExampleController;
use PrototypeOne\Application\Controllers\EditExampleController;
use PrototypeOne\Application\Controllers\ViewExampleController;
use PrototypeOne\Application\Controllers\ViewExampleListController;

class PrototypeOneRoutes implements RouteGroup
{
    public static function register(): Router
    {
        return Route::group([], function () {
            Route::prefix('prototype-one')
                ->group(function () {
                    Route::get('/', ViewExampleListController::class);
                    Route::get('/{example}', ViewExampleController::class);
                    Route::post('/', CreateExampleController::class);
                    Route::put('/{example}', EditExampleController::class);
                });
        });
    }
}
