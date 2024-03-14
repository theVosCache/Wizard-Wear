<?php

namespace TheVosCache\Editor\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use TheVosCache\Editor\Models\ContentBlocks;

trait HasContentBlocks
{
    public function contentBlocks(): MorphMany
    {
        return $this->morphMany(ContentBlocks::class, 'contentBlocks');
    }
}