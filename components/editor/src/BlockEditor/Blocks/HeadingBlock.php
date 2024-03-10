<?php

namespace TheVosCache\Editor\BlockEditor\Blocks;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class HeadingBlock extends Component
{
    public static array $config = [
        'type' => "Heading",
        'icon' => 'fa-heading',
        'isContainer' => false
    ];

    public string $renderMethod;
    public string $size;
    public string $text;

    public function addBlockToEditor(): void
    {
        $this->dispatch('editor-add-block', [
            "type" => $this::class,
            "data" => [
                'size' => '',
                'text' => '',
            ]
        ]);
    }

    public function render(): View
    {
        if ($this->renderMethod === 'lib'){
            return view('editor::blocks.heading_lib');
        }

        if ($this->renderMethod === 'edit'){
            return view('editor::blocks.heading_edit');
        }

        return view('editor::blocks.heading');
    }
}