<?php

namespace Business\Auth\Domain\Actions;

use App\Models\User;

class ApiLogoutUserAction
{
    public function execute(User $user): void
    {
        $user->tokens->each(fn ($token) => $token->delete());
    }
}
