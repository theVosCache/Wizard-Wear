<?php

namespace App\Models\Cms;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Navigation extends Model
{
    use HasFactory, Uuid;

    protected $table = 'cms_navigations';

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Navigation::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Navigation::class, 'parent_id');
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
