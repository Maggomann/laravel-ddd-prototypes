<?php

namespace Business\Auth\Domain\Actions;

use App\Models\User;
use Business\Auth\Domain\DataTransferObjects\ApiAuthUserDataTransferObject;
use Business\Auth\Domain\DataTransferObjects\AuthUserDataTransferObject;

class ApiRegisterAuhUserAction
{
    public function execute(ApiAuthUserDataTransferObject $apiAuthUserDataTransferObject): ?ApiAuthUserDataTransferObject
    {
        $user = new User();
        $user->fill($apiAuthUserDataTransferObject->toArray());
        $user->save();

        if ($user->exists) {
            $apiAuthUserDataTransferObject->id = $user->id;
            $apiAuthUserDataTransferObject->password = null;
            $apiAuthUserDataTransferObject->token = $user->createToken('authToken')->plainTextToken;

            return $apiAuthUserDataTransferObject;
        }

        return null;
    }
}
