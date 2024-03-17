<?php

declare(strict_types=1);

namespace TheVosCache\Editor\BlockEditor\Blocks;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class TextBlock extends Component
{
    public static array $config = [
        'type' => "text-block",
        'icon' => 'fa-align-center',
        'isContainer' => false
    ];

    public ?int $index;
    public ?string $renderMethod = null;
    public string $text;

    public function addBlockToEditor(): void
    {
        $this->dispatch('editor-add-block', [
            "type" => "text-block",
            "data" => [
                'text' => '',
            ]
        ]);
    }

    public function change(): void
    {
        $this->dispatch('block-updated', [
            'index' => $this->index,
            'data' => [
                'text' => $this->text
            ]
        ]);
    }

    public function mount(?array $data = null): void
    {
        if (!empty($data)) {
            $this->text = $data['text'];
        }
    }

    public function render(): View
    {
        if ($this->renderMethod === 'lib') {
            return view('editor::blocks.text_block.lib');
        }

        if ($this->renderMethod === 'edit') {
            return view('editor::blocks.text_block.edit');
        }

        return view('editor::blocks.text_block.render');
    }
}
