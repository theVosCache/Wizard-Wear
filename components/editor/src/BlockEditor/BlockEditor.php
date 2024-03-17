<?php

declare(strict_types=1);

namespace TheVosCache\Editor\BlockEditor;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;
use Livewire\Attributes\On;
use Livewire\Component;
use TheVosCache\Editor\BlockEditor\Blocks\HeadingBlock;
use TheVosCache\Editor\BlockEditor\Blocks\TextBlock;
use TheVosCache\Editor\Models\ContentBlock;
use TheVosCache\Editor\Traits\HasContentBlocks;

class BlockEditor extends Component
{
    public array $blocks = [];
    public Model $model;
    public ?string $redirectUrl;

    public array $availableBlocks;

    public function mount(Model $model): void
    {
        $this->availableBlocks = config('editor.available_blocks');
        $this->model = $model;

        if (!(collect(class_uses($model))->contains(HasContentBlocks::class))) {
            throw new InvalidArgumentException(
                "Model must use HasContentBlocks Trait"
            );
        }

        foreach ($this->model->contentBlocks->sortBy('index') as $block) {
            $this->blocks[$block->index] = [
                'type' => $block->type,
                'data' => $block->data
            ];
        }
    }

    public function save(): void
    {
        foreach ($this->blocks as $index => $blockData) {
            $block = $this->model->contentBlocks->where('index', $index)->first();
            if (empty($block)) {
                $block = new ContentBlock();
                $block->index = $index;
                $block->attached_type = $this->model::class;
                $block->attached_id = $this->model->id;
            }

            $block->type = $blockData['type'];
            $block->data = $blockData['data'];

            $block->save();
        }

        if (!empty($this->redirectUrl)) {
            session()->flash('success', 'Content blocks updated');
            $this->redirect($this->redirectUrl);
        }
    }

    #[On(event: 'editor-add-block')]
    public function addBlock(array $blockData): void
    {
        $blockCount = count($this->blocks);

        $this->blocks[$blockCount + 1] = $blockData;
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
