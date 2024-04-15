<?php

declare(strict_types=1);

namespace App\Models\Dnd;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Potion extends Model
{
    use HasFactory, Uuid, SoftDeletes;

    protected $table = 'dnd_potions';

    protected $fillable = [
        'name', 'rarity', 'potion_type', 'learned_in_year', '5e_equivalent',
        'effects', 'flawed', 'exceptional', 'galleon_price'
    ];
}
