<?php

declare(strict_types=1);

namespace App\Models\Dnd;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spell extends Model
{
    use HasFactory, Uuid;

    protected $table = 'dnd_spells';
}
