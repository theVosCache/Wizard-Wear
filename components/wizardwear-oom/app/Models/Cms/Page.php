<?php

namespace App\Models\Cms;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    use HasFactory, Uuid;

    protected $table = 'cms_pages';

    public function navigation(): HasMany
    {
        return $this->hasMany(Navigation::class, 'page_id');
    }

    protected function casts(): array
    {
        return [
            'content' => 'json'
        ];
    }
}
