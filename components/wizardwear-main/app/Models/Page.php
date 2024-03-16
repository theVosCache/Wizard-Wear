<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TheVosCache\Editor\Traits\HasContentBlocks;

class Page extends Model
{
    use HasFactory, Uuid, SoftDeletes, HasContentBlocks;

    protected $fillable = [
        'name', 'slug'
    ];
}
