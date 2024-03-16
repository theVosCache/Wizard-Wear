<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class lang extends Component
{
    public function __construct(
        public string $translationString,
        public string $key,
        public array $data = [],
        public string $locale = 'nl'
    ) {
    }

    public function render(): string
    {
        $translationString = sprintf("%s.%s", $this->key , $this->translationString);
        $translation = __($translationString, $this->data, $this->locale);

        return ($translation !== $translationString) ? $translation : $this->translationString;
    }
}
