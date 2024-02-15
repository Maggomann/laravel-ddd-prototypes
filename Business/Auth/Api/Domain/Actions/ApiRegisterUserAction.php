<?php

namespace Business\Auth\Api\Domain\Actions;

use App\Models\User;
use Business\Auth\Api\Domain\DataTransferObjects\ApiAuthUserDataTransferObject;
use Business\Auth\Api\Domain\Traits\PreparesApiAuthUserDataTransferObject;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ApiRegisterUserAction
{
    use PreparesApiAuthUserDataTransferObject;

    public function __construct(
        private User $user
    ) {
    }

    public function execute(ApiAuthUserDataTransferObject $apiAuthUserDataTransferObject): ApiAuthUserDataTransferObject
    {
        $this->createUser($apiAuthUserDataTransferObject);
        $this->ensureThatTheUserExists();

        return $this->prepareDataTransferObject($apiAuthUserDataTransferObject, $this->user);
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
}
