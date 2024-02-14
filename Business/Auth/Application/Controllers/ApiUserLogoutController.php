<?php

namespace Business\Auth\Application\Controllers;

use App\Http\Controllers\Controller;

class ApiUserLogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });

        return response()->json(['message' => 'Logged out'], 200);
    }
}
