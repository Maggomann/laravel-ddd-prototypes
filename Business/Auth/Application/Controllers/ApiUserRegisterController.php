<?php

namespace Business\Auth\Application\Controllers;

use App\Http\Controllers\Controller;
use Business\Auth\Application\Requests\ApiUserRegisterRequest;
use Business\Auth\Application\Resources\ApiUserResource;
use Business\Auth\Domain\Actions\ApiRegisterUserAction;
use Business\Auth\Domain\DataTransferObjects\ApiAuthUserDataTransferObject;

class ApiUserRegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ApiUserRegisterRequest $request)
    {
        $authUserData = ApiAuthUserDataTransferObject::fromRegisterRequest($request->validated());
        $authUserData = app(ApiRegisterUserAction::class)->execute($authUserData);

        return ApiUserResource::make($authUserData);
    }
}
