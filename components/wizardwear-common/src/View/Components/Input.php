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
            'errors'    => view('ww::components.input.errors'),
            'submit'    => view('ww::components.input.submit'),
            'boxes'     => view('ww::components.input.boxes'),
            'switch'    => view('ww::components.input.switch'),
            default     => view('ww::components.input.input')
        };
    }
}
