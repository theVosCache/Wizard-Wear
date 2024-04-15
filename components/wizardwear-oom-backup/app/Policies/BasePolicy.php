<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Role;
use App\Models\User;

class BasePolicy
{
    public function before(User $user, string $ability): bool|null
    {
        return $user->hasRole(Role::ADMIN);
    }
}
