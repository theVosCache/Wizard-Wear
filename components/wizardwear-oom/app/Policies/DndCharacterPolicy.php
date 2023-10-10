<?php

namespace App\Policies;

use App\Models\DndCharacter;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DndCharacterPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole(Role::DND);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DndCharacter $dndCharacter): bool
    {
        return $user->hasRole(Role::DND) && $dndCharacter->user->id === $user->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole(Role::DND);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, DndCharacter $dndCharacter): bool
    {
        return $user->hasRole(Role::DND) && $dndCharacter->user->id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DndCharacter $dndCharacter): bool
    {
        return $user->hasRole(Role::DND) && $dndCharacter->user->id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, DndCharacter $dndCharacter): bool
    {
        return $user->hasRole(Role::DND) && $dndCharacter->user->id === $user->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, DndCharacter $dndCharacter): bool
    {
        return $user->hasRole(Role::DND) && $dndCharacter->user->id === $user->id;
    }
}
