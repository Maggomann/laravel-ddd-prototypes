<?php

namespace Business\Auth\Domain\Actions;

use Business\Auth\Domain\DataTransferObjects\ApiAuthUserDataTransferObject;
use Illuminate\Validation\UnauthorizedException;

class ApiLoginUserAction
{
    /**
     * @throws UnauthorizedException
     */
    public function execute(ApiAuthUserDataTransferObject $apiAuthUserDataTransferObject): ApiAuthUserDataTransferObject
    {
        $this->ensureThatTheUserLogsInSuccessfully($apiAuthUserDataTransferObject);

        $apiAuthUserDataTransferObject->id = request()->user()->id;
        $apiAuthUserDataTransferObject->password = null;
        $apiAuthUserDataTransferObject->token = request()->user()->createToken('authToken')->plainTextToken;

        return $apiAuthUserDataTransferObject;
    }

    /**
     * @throws UnauthorizedException
     */
    private function ensureThatTheUserLogsInSuccessfully(
        ApiAuthUserDataTransferObject $apiAuthUserDataTransferObject
    ): void {
        $this->validateCredentials($apiAuthUserDataTransferObject);
        $this->ensureUserExists();
    }

    /**
     * @throws UnauthorizedException
     */
    private function ensureUserExists(): void
    {
        throw_unless(
            request()->user(),
            new UnauthorizedException('User not found')
        );
    }

    /**
     * @throws UnauthorizedException
     */
    private function validateCredentials(ApiAuthUserDataTransferObject $apiAuthUserDataTransferObject): void
    {
        $credentials = [
            'email' => $apiAuthUserDataTransferObject->email,
            'password' => $apiAuthUserDataTransferObject->password,
        ];

        throw_unless(
            auth()->attempt($credentials),
            new UnauthorizedException('Invalid credentials')
        );
    }
}
