<?php

namespace Business\Auth\Application\Controllers;

use App\Http\Controllers\Controller;
use Business\Auth\Application\Requests\ApiUserLoginRequest;
use Business\Auth\Application\Resources\ApiUserResource;
use Business\Auth\Domain\Actions\ApiLoginUserAction;
use Business\Auth\Domain\DataTransferObjects\ApiAuthUserDataTransferObject;

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
