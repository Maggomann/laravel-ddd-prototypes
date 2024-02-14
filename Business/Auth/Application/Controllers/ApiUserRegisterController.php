<?php

namespace Business\Auth\Application\Controllers;

use Business\Auth\Application\Resources\AuthUserResource;
use App\Http\Controllers\Controller;
use Business\Auth\Application\Requests\ApiRegisterRequest;
use Business\Auth\Domain\Actions\ApiRegisterAuhUserAction;
use Business\Auth\Domain\DataTransferObjects\ApiAuthUserDataTransferObject;

class ApiUserRegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ApiRegisterRequest $request)
    {
        $authUserData = ApiAuthUserDataTransferObject::fromRegisterRequest($request->validated());
        $authUserData = app(ApiRegisterAuhUserAction::class)->execute($authUserData);

        return AuthUserResource::make($authUserData);
    }
}
