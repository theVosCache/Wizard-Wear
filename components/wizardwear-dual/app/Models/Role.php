<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    public static array $roles = [
        'admin' => 'System Admin',
        'website_manager' => 'Website Manager',
        'board' => 'Board',

        'dnd_player' => 'Dungeon and Dragons player',
        'dnd_dm' => 'Dungeon Master'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
