<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DndCharacter extends Model
{
    use HasFactory, SoftDeletes;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getHouseCrestAttribute(): ?string
    {
        return Storage::disk('public')->url(
            Str::lower($this->house) . "-house-crest.webp"
        );
    }

    public function avatar(): MorphOne
    {
        return $this->morphOne(Avatar::class, 'attached');
    }
}
