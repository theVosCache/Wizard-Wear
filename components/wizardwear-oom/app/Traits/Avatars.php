<?php

declare(strict_types=1);

namespace App\Traits;

use App\Models\Avatar as AvatarModel;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait Avatars
{
    public function avatar(): MorphOne
    {
        return $this->morphOne(AvatarModel::class, 'attached');
    }

    public function getAvatarPathAttribute(): string
    {
        if (empty($this->avatar)){
            return '';
        }

        return Storage::disk('public')->url($this->avatar?->storage_path) ?? '';
    }

    public function getHasAvatarAttribute(): string
    {
        return !empty($this->avatar);
    }
}
