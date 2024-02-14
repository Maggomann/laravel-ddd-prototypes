<?php

namespace Business\Example\Application\Routes;

use App\Routes\Concerns\RouteGroup;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Business\Example\Application\Controllers\CreateExampleController;
use Business\Example\Application\Controllers\EditExampleController;
use Business\Example\Application\Controllers\ViewExampleController;
use Business\Example\Application\Controllers\ViewExampleListController;

class ExampleRoutes implements RouteGroup
{
    public static function register(): Router
    {
        return Route::group([], function () {
            Route::prefix('examples')
                ->group(function () {
                    Route::get('/', ViewExampleListController::class);
                    Route::get('/{example}', ViewExampleController::class);
                    Route::post('/', CreateExampleController::class);
                    Route::put('/{example}', EditExampleController::class);
                });
        });
    }
}
