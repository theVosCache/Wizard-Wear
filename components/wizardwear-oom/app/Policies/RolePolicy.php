<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RolePolicy extends BasePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasRole(Role::ADMIN);
    }

    public function view(User $user, Role $role): bool
    {
        return $user->hasRole(Role::ADMIN);
    }

    public function create(User $user): bool
    {
        return $user->hasRole(Role::ADMIN);
    }

    public function update(User $user, Role $role): bool
    {
        return $user->hasRole(Role::ADMIN);
    }

    public function delete(User $user, Role $role): bool
    {
        return $user->hasRole(Role::ADMIN);
    }

    public function restore(User $user, Role $role): bool
    {
        return $user->hasRole(Role::ADMIN);
    }

    public function forceDelete(User $user, Role $role): bool
    {
        return $user->hasRole(Role::ADMIN);
    }
}
