<?php

declare(strict_types=1);

namespace TheVosCache\Editor\BlockEditor\Blocks;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class HeadingBlock extends Component
{
    public const string TYPE = 'heading-block';
    public const string ICON = 'fa-heading';
    public ?string $renderMethod = null;
    public ?Model $model;

    public function render(): View
    {
        if ($this->renderMethod === 'lib') {
            return view('editor::blocks.heading_block.lib');
        }

        if ($this->renderMethod === 'edit') {
            return view('editor::blocks.heading_block.edit');
        }

        return view('editor::blocks.heading_block.render');
    }
}
