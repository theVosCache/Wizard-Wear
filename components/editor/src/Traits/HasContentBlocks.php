<?php

namespace TheVosCache\Editor\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use TheVosCache\Editor\Models\ContentBlock;

trait HasContentBlocks
{
    public function contentBlocks(): MorphMany
    {
        return $this->morphMany(ContentBlock::class, 'attached');
    }
}