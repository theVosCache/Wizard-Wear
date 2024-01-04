<?php

namespace App\Policies;

use App\Models\Dnd\DndCampaign;
use App\Models\Role;
use App\Models\User;

class DndCampaignPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasRole(Role::DND) || $user->hasRole(Role::DM);
    }

    public function view(User $user, DndCampaign $dndCampaign): bool
    {
        return $dndCampaign->dungeon_master_id === $user->id;
    }

    public function create(User $user): bool
    {
        return $user->hasRole(Role::DM);
    }

    public function update(User $user, DndCampaign $dndCampaign): bool
    {
        return $dndCampaign->dungeon_master_id === $user->id;
    }

    public function delete(User $user, DndCampaign $dndCampaign): bool
    {
        return $dndCampaign->dungeon_master_id === $user->id;
    }

    public function restore(User $user, DndCampaign $dndCampaign): bool
    {
        return $dndCampaign->dungeon_master_id === $user->id;
    }

    public function forceDelete(User $user, DndCampaign $dndCampaign): bool
    {
        return $dndCampaign->dungeon_master_id === $user->id;
    }

    public function join(User $user, DndCampaign $dndCampaign): bool
    {
        if (!$dndCampaign->allow_players_to_join) {
            return false;
        }

        if ($dndCampaign->dndCharacters->where('user_id', $user->id)->count() === 1) {
            return false;
        }

        return true;
    }
}
