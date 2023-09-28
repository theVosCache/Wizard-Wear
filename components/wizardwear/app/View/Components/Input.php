<?php

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
            'switch' => view('components.input.switch'),
            default => view('components.input')
        };
    }
}
