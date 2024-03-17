<?php

declare(strict_types=1);

namespace TheVosCache\Editor\BlockEditor;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;
use Livewire\Attributes\On;
use Livewire\Component;
use TheVosCache\Editor\BlockEditor\Blocks\HeadingBlock;
use TheVosCache\Editor\BlockEditor\Blocks\TextBlock;
use TheVosCache\Editor\Models\ContentBlock;
use TheVosCache\Editor\Traits\HasContentBlocks;

class BlockRenderer extends Component
{
    public Collection $contentBlocks;

    public function mount(Collection $collection): void
    {
        $this->contentBlocks = $collection;
    }

    public function render(): View
    {
        return view(view: 'editor::block_renderer');
    }
}
