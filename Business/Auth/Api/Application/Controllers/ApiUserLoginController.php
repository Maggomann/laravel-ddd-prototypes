<?php

namespace Business\Auth\Api\Application\Controllers;

use App\Http\Controllers\Controller;
use Business\Auth\Api\Application\Requests\ApiUserLoginRequest;
use Business\Auth\Api\Application\Resources\ApiUserResource;
use Business\Auth\Api\Domain\Actions\ApiLoginUserAction;
use Business\Auth\Api\Domain\DataTransferObjects\ApiAuthUserDataTransferObject;

class ApiUserLoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ApiUserLoginRequest $request)
    {
        $authUserData = ApiAuthUserDataTransferObject::createFromLogin($request->validated());
        $authUserData = app(ApiLoginUserAction::class)->execute($authUserData);

        return ApiUserResource::make($authUserData);
    }
}
