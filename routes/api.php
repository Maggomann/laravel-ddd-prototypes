<?php

use Business\Auth\Application\Routes\ApiUserRoutes;
use PrototypeOne\Application\Routes\PrototypeOneRoutes;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

ApiUserRoutes::register();
PrototypeOneRoutes::register();
