<?php

namespace App\Models\Dnd;

use App\Casts\DndPlayerDataCast;
use App\Models\Character;
use App\Models\User;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DndCharacter extends Model
{
    use HasFactory, SoftDeletes, Uuid;

    protected $table = 'dnd_characters';

    protected $casts = [
        'data' => DndPlayerDataCast::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function character(): BelongsTo
    {
        return $this->belongsTo(Character::class);
    }

    public function dndCampaign(): BelongsTo
    {
        return $this->belongsTo(DndCampaign::class);
    }

    public function getCurrentHitPointsPercentageAttribute(): ?float
    {
        if (!empty($this->total_hit_points)) {
            return $this->current_hit_points / $this->total_hit_points;
        }

        return null;
    }

    public function getCurrentHitPointsColorAttribute(): string
    {
        if (!empty($this->currentHitPointsPercentage)) {
            if ($this->currentHitPointsPercentage > 0.8) {
                return 'bg-success';
            } elseif ($this->currentHitPointsPercentage > 0.25) {
                return 'bg-warning';
            }
        }

        return 'bg-danger';
    }
}
