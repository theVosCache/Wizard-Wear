<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes, Uuid;

    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->using(EventUser::class)->withPivot('id');
    }

    public function getIsOpenAttribute(): bool
    {
        $open = true;

        if (Carbon::now() > $this->start) {
            $open = false;
        }

        if (!empty($this->max_members)) {
            if (count($this->users) > $this->max_members) {
                $open = false;
            }
        }

        return $open;
    }
}
