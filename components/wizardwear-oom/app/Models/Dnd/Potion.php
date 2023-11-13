<?php

namespace App\Models\Dnd;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potion extends Model
{
    use HasFactory, Uuid;

    protected $table = 'dnd_potions';
}
