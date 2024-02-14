<?php

namespace Business\Auth\Domain\Actions;

use App\Models\User;
use Business\Auth\Domain\DataTransferObjects\ApiAuthUserDataTransferObject;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ApiRegisterUserAction
{
    public function __construct(
        private User $user
    ) {
    }

    public function execute(ApiAuthUserDataTransferObject $apiAuthUserDataTransferObject): ApiAuthUserDataTransferObject
    {
        $this->createUser($apiAuthUserDataTransferObject);
        $this->ensureThatTheUserExists();

        return $this->prepareDataTransferObject($apiAuthUserDataTransferObject);
    }

    /**
     * @throws ModelNotFoundException
     */
    private function ensureThatTheUserExists(): void
    {
        throw_unless($this->user, new ModelNotFoundException('User not found'));
    }

    private function createUser(ApiAuthUserDataTransferObject $apiAuthUserDataTransferObject): void
    {
        $this->user = new User();
        $this->user->fill($apiAuthUserDataTransferObject->toArray());
        $this->user->save();
    }

    private function prepareDataTransferObject(
        ApiAuthUserDataTransferObject $apiAuthUserDataTransferObject,
    ): ApiAuthUserDataTransferObject {
        $apiAuthUserDataTransferObject->id = $this->user->id;
        $apiAuthUserDataTransferObject->password = null;
        $apiAuthUserDataTransferObject->token = $this->user->createToken('authToken')->plainTextToken;

        return $apiAuthUserDataTransferObject;
    }
}
