<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DndSession extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'start_at' => 'datetime',
        'data' => 'json'
    ];

    public function dungeonMaster(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
