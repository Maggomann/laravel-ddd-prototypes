<?php

namespace Business\Auth\Api\Domain\Actions;

use Business\Auth\Api\Domain\DataTransferObjects\ApiAuthUserDataTransferObject;
use Business\Auth\Api\Domain\Traits\PreparesApiAuthUserDataTransferObject;
use Illuminate\Validation\UnauthorizedException;

class ApiLoginUserAction
{
    use PreparesApiAuthUserDataTransferObject;

    /**
     * @throws UnauthorizedException
     */
    public function execute(ApiAuthUserDataTransferObject $apiAuthUserDataTransferObject): ApiAuthUserDataTransferObject
    {
        $this->ensureThatTheUserLogsInSuccessfully($apiAuthUserDataTransferObject);

        return $this->prepareDataTransferObject($apiAuthUserDataTransferObject, request()->user());
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
