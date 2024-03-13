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
            return;
        }

        if (!empty($this->model)) {
            $this->blocks = json_decode(json: $this->model->blocks, associative: true);
        }
    }

    public function save()
    {g
        if (empty($this->model)) {
            return;
        }

        $this->model->blocks = json_encode($this->blocks);
        $this->model->save();
    }

    #[On(event: 'editor-add-block')]
    public function addBlock(array $blockData): void
    {
        $this->blocks[] = $blockData;
    }

    #[On(event: 'block-updated')]
    public function blockUpdated(array $blockUpdatedEvent): void
    {
        $index = $blockUpdatedEvent['index'];
        $data = $blockUpdatedEvent['data'];

        $this->blocks[$index]['data'] = $data;
    }

    public function render(): View
    {
        return view(view: 'editor::block_editor');
    }
}