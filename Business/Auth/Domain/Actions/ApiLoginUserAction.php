<?php

namespace Business\Auth\Domain\Actions;

use Business\Auth\Domain\DataTransferObjects\ApiAuthUserDataTransferObject;
use Illuminate\Validation\UnauthorizedException;

class ApiLoginUserAction
{
    public function execute(ApiAuthUserDataTransferObject $apiAuthUserDataTransferObject): ?ApiAuthUserDataTransferObject
    {
        $this->ensureUserIsAttemptedToLogin($apiAuthUserDataTransferObject);

        $user = request()->user();

        if ($user->exists) {
            $apiAuthUserDataTransferObject->id = $user->id;
            $apiAuthUserDataTransferObject->password = null;
            $apiAuthUserDataTransferObject->token = $user->createToken('authToken')->plainTextToken;

            return $apiAuthUserDataTransferObject;
        }

        return null;
    }

    /**
     * @throws UnauthorizedException
     */
    private function ensureUserIsAttemptedToLogin(ApiAuthUserDataTransferObject $apiAuthUserDataTransferObject): void
    {
        auth()->attempt([
            'email' => $apiAuthUserDataTransferObject->email,
            'password' => $apiAuthUserDataTransferObject->password,
        ]);

        throw_if(! auth()->check(), new UnauthorizedException('Invalid credentials'));
    }
}
