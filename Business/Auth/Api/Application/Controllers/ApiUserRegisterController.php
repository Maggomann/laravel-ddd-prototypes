<?php

namespace Business\Auth\Api\Application\Controllers;

use App\Http\Controllers\Controller;
use Business\Auth\Api\Application\Requests\ApiUserRegisterRequest;
use Business\Auth\Api\Application\Resources\ApiUserResource;
use Business\Auth\Api\Domain\Actions\ApiRegisterUserAction;
use Business\Auth\Api\Domain\DataTransferObjects\ApiAuthUserDataTransferObject;

class ApiUserRegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ApiUserRegisterRequest $request)
    {
        $authUserData = ApiAuthUserDataTransferObject::createFromRegistration($request->validated());
        $authUserData = app(ApiRegisterUserAction::class)->execute($authUserData);

        return ApiUserResource::make($authUserData);
    }
}
