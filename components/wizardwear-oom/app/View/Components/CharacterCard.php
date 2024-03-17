<?php

declare(strict_types=1);

namespace App\View\Components;

use App\Models\Character;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class CharacterCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Character $character
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.character-card');
    }
}
