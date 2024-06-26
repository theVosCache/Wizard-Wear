<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\Avatars;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, Uuid, SoftDeletes, Avatars;

    protected $appends = ['avatar_path'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
