<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Dnd\DndCampaign;
use App\Models\Dnd\DndCharacter;
use App\Traits\Uuid;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Uuid;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function defaultCharacter(): BelongsTo
    {
        return $this->belongsTo(Character::class);
    }

    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }

    public function dndCharacters(): HasMany
    {
        return $this->hasMany(DndCharacter::class);
    }

    public function dndCampaigns(): HasMany
    {
        return $this->hasMany(DndCampaign::class, 'dungeon_master_id');
    }

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    public function hasRole(string $slug): bool
    {
        return $this->roles()->where('slug', $slug)->count() === 1;
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
