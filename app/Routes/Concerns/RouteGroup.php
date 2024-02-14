<?php

namespace App\Routes\Concerns;

use Illuminate\Routing\Router;
use Illuminate\Routing\RouteRegistrar;

interface RouteGroup
{
    public static function register(): Router|RouteRegistrar;
}
