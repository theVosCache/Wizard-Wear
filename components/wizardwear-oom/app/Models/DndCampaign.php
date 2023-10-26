<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class DndCampaign extends Model
{
    use HasFactory, SoftDeletes, Uuid;

    protected $casts = [
        'next_session' => 'datetime',
    ];

    public function dungeonMaster(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function dndCharacters(): HasMany
    {
        return $this->hasMany(DndCharacter::class);
    }
}
