<?php

namespace App\Models;

use App\Traits\Avatars;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Character extends Model
{
    use HasFactory, SoftDeletes, Uuid, Avatars;

    public function getHouseCrestImgPathAttribute(): string
    {
        return asset("/storage/" . $this->house . "-house-crest.webp");
    }
}
