<?php

namespace TheVosCache\Editor\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use TheVosCache\Editor\Traits\Uuid;

class ContentBlocks extends Model
{
    use Uuid;

    public function attached(): MorphTo
    {
        return $this->morphTo();
    }
}