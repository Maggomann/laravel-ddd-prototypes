<?php

namespace Auth\Application\Controllers;

use Auth\Application\Requests\RegisterRequest;
use Auth\Application\Resources\AuthUserResource;
use Auth\Domain\DataTransferObjects\AuthUserDataTransferObject;
use Auth\Domain\DataTransferObjects\RegisterAuhUserAction;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterRequest $request)
    {
        return 'test';
        $authUserData = AuthUserDataTransferObject::fromRegisterRequest($request->validated());
        $authUserData = app(RegisterAuhUserAction::class)->execute($authUserData);

        // return AuthUserResource::make($authUserData);
    }
}
