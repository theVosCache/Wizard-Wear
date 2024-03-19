<?php

declare(strict_types=1);

namespace TheVosCache\Editor\BlockEditor;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;
use Livewire\Attributes\On;
use Livewire\Component;
use TheVosCache\Editor\BlockEditor\Blocks\HeadingBlock;
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
        if (!(collect(class_uses($model))->contains(HasContentBlocks::class))) {
            throw new InvalidArgumentException("Model doesn't use HasContentBlocks trait");
        }

        $this->availableBlocks = config('editor.available_blocks') ?? [];
        $this->model = $model;
    }

    public function render(): View
    {
        return view(view: 'editor::block_editor');
    }
}
