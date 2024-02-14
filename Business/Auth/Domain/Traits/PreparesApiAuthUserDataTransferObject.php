<?php

namespace Business\Auth\Domain\Traits;

use App\Models\User;
use Business\Auth\Domain\DataTransferObjects\ApiAuthUserDataTransferObject;

trait PreparesApiAuthUserDataTransferObject
{
    private function prepareDataTransferObject(
        ApiAuthUserDataTransferObject $apiAuthUserDataTransferObject,
        User $user
    ): ApiAuthUserDataTransferObject {
        $apiAuthUserDataTransferObject->id = $user->id;
        $apiAuthUserDataTransferObject->password = null;
        $apiAuthUserDataTransferObject->token = $user->createToken('authToken')->plainTextToken;

        return $apiAuthUserDataTransferObject;
    }
}
