<?php

namespace Business\Example\SubExample\Application\Routes;

use App\Routes\Concerns\RouteGroup;
use Business\Example\SubExample\Application\Controllers\CreateExampleController;
use Business\Example\SubExample\Application\Controllers\EditExampleController;
use Business\Example\SubExample\Application\Controllers\ViewExampleController;
use Business\Example\SubExample\Application\Controllers\ViewExampleListController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

class ExampleApiRoutes implements RouteGroup
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
