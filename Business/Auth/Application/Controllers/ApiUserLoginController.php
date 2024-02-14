<?php

namespace Business\Auth\Application\Controllers;

use App\Http\Controllers\Controller;
use Business\Auth\Application\Requests\ApiLoginRequest;
use Business\Auth\Application\Resources\AuthUserResource;
use Business\Auth\Domain\Actions\ApiLoginAuhUserAction;
use Business\Auth\Domain\DataTransferObjects\ApiAuthUserDataTransferObject;

class ApiUserLoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ApiLoginRequest $request)
    {
        $authUserData = ApiAuthUserDataTransferObject::fromLoginRequest($request->validated());
        $authUserData = app(ApiLoginAuhUserAction::class)->execute($authUserData);

        return AuthUserResource::make($authUserData);
    }
}
