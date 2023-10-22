<?php

namespace App\Policies;

use App\Models\DndSession;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DndSessionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole(Role::DM);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DndSession $dndSession): bool
    {
        return $user->hasRole(Role::DM);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole(Role::DM);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, DndSession $dndSession): bool
    {
        return $user->hasRole(Role::DM);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DndSession $dndSession): bool
    {
        return $user->hasRole(Role::DM);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, DndSession $dndSession): bool
    {
        return $user->hasRole(Role::DM);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, DndSession $dndSession): bool
    {
        return $user->hasRole(Role::DM);
    }
}
