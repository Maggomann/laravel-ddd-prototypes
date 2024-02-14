<?php

namespace Business\Auth\Application\Controllers;

use App\Http\Controllers\Controller;
use Business\Auth\Application\Resources\ApiUserResource;
use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return ApiUserResource::make($request->user());
    }
}
