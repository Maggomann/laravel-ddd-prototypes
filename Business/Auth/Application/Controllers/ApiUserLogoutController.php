<?php

namespace Business\Auth\Application\Controllers;

use App\Http\Controllers\Controller;
use Business\Auth\Domain\Actions\ApiLogoutUserAction;

class ApiUserLogoutController extends Controller
{
    public function __invoke()
    {
        app(ApiLogoutUserAction::class)->execute(request()->user());

        return response()->json(['message' => 'Logged out'], 200);
    }
}
