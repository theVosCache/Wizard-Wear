<?php

namespace TheVosCache\Editor\BlockEditor\Blocks;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class HeadingBlock extends Component
{
    public static array $config = [
        'type' => "heading-block",
        'icon' => 'fa-heading',
        'isContainer' => false
    ];

    public ?int $index;
    public ?string $renderMethod = null;
    public string $size;
    public string $text;

    public function addBlockToEditor(): void
    {
        $this->dispatch('editor-add-block', [
            "type" => "heading-block",
            "data" => [
                'size' => 'h1',
                'text' => '',
            ]
        ]);
    }

    public function change(): void
    {
        $this->dispatch('block-updated', [
            'index' => $this->index,
            'data' => [
                'size' => $this->size,
                'text' => $this->text
            ]
        ]);
    }

    public function mount(?array $data = null): void
    {
        if (!empty($data)){
            $this->size = $data['size'];
            $this->text = $data['text'];
        }
    }

    public function render(): View
    {
        if ($this->renderMethod === 'lib'){
            return view('editor::blocks.heading_block.lib');
        }

        if ($this->renderMethod === 'edit'){
            return view('editor::blocks.heading_block.edit');
        }

        return view('editor::blocks.heading_block.render');
    }
}