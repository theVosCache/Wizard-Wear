<?php

namespace TheVosCache\Editor\BlockEditor;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\On;
use Livewire\Component;
use TheVosCache\Editor\BlockEditor\Blocks\HeadingBlock;

class BlockEditor extends Component
{
    public array $blocks = [];
    public ?Model $model;

    public array $availableBlocks = [
        HeadingBlock::class
    ];

    public function mount(?string $jsonBlocks = null): void
    {
        if (!empty($jsonBlocks)) {
            $this->blocks = json_decode(json: $jsonBlocks, associative: true);
        }
    }

    #[On('editor-add-block')]
    public function addBlock(array $blockData): void
    {
        $this->blocks[] = $blockData;
    }

    public function render(): View
    {
        return view(view: 'editor::block_editor');
    }
}