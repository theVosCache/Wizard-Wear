<?php

declare(strict_types=1);

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $type,
        public ?string $name = null,
        public ?string $label = null,
        public ?string $value = null
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return match ($this->type) {
            'errors' => view('components.input.errors'),
            'submit' => view('components.input.submit'),
            'boxes' => view('components.input.boxes'),
            'switch' => view('components.input.switch'),
            'select' => view('components.input.select'),
            default => view('components.input')
        };
    }
}
