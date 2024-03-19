<?php

declare(strict_types=1);

namespace TheVosCache\Editor;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use TheVosCache\Editor\BlockEditor\BlockEditor;
use TheVosCache\Editor\BlockEditor\BlockRenderer;
use TheVosCache\Editor\BlockEditor\Blocks\HeadingBlock;
use TheVosCache\Editor\BlockEditor\Blocks\TextBlock;
use TheVosCache\Editor\BlockEditor\Blocks\TextWithImageLeftBlock;

class EditorServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/editor.php' => config_path('editor.php'),
        ]);

        $this->mergeConfigFrom(__DIR__ . '/../config/editor.php', 'editor');

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'editor');

        Livewire::component('block-editor', BlockEditor::class);
        Livewire::component('block-renderer', BlockRenderer::class);
        Livewire::component('heading-block', HeadingBlock::class);
        Livewire::component('text-block', TextBlock::class);
        Livewire::component('text-with-image-left-block', TextWithImageLeftBlock::class);
    }
}
