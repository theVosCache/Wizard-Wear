<?php

namespace TheVosCache\Editor;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use TheVosCache\Editor\BlockEditor\BlockEditor;
use TheVosCache\Editor\BlockEditor\Blocks\HeadingBlock;

class EditorServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'editor');

        Livewire::component('block-editor', BlockEditor::class);
        Livewire::component('heading-block', HeadingBlock::class);
    }
}
