<?php

declare(strict_types=1);

namespace TheVosCache\Editor\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use TheVosCache\Editor\Traits\Uuid;

/**
 * @property int $index
 * @property string $type
 * @property array $data
 * @property array $data_preview
 */
class ContentBlock extends Model
{
    use Uuid, SoftDeletes;

    protected $fillable = ['index', 'type', 'data'];

    protected $casts = [
        'data' => 'json',
        'data_preview' => 'json'
    ];

    public function attached(): MorphTo
    {
        return $this->morphTo();
    }
}
