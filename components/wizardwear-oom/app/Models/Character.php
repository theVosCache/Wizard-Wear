<?php

namespace App\Models;

use App\Models\Dnd\DndCharacter;
use App\Traits\Avatars;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Character extends Model
{
    use HasFactory, SoftDeletes, Uuid, Avatars;

    public function dndCharacter(): HasOne
    {
        return $this->hasOne(DndCharacter::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getHouseCrestImgPathAttribute(): string
    {
        $path = $this->house . "-house-crest.webp";
        if (Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->url($path);
        }

        return Storage::disk('public')->url('hogwarts-crest.webp');
    }
}
