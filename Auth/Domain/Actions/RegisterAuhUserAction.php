<?php

namespace Auth\Domain\DataTransferObjects;

use App\Models\User;

class RegisterAuhUserAction
{
    public function execute(AuthUserDataTransferObject $authUserDataTransferObject): ?AuthUserDataTransferObject
    {
        $user = new User();
        $user->fill($authUserDataTransferObject->toArray());
        $user->save();

        if ($user->exists) {
            $authUserDataTransferObject->id = $user->id;
            $authUserDataTransferObject->password = null;
            $authUserDataTransferObject->token = $user->createToken('authToken')->plainTextToken;

            return $authUserDataTransferObject;
        }

        return null;
    }
}
