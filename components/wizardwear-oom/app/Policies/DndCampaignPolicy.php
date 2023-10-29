<?php

namespace App\Policies;

use App\Models\DndCampaign;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DndCampaignPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DndCampaign $dndCampaign): bool
    {
        //
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
    public function update(User $user, DndCampaign $dndCampaign): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DndCampaign $dndCampaign): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, DndCampaign $dndCampaign): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, DndCampaign $dndCampaign): bool
    {
        //
    }
}
