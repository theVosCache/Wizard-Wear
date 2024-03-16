<?php

namespace TheVosCache\Editor;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use TheVosCache\Editor\BlockEditor\BlockEditor;
use TheVosCache\Editor\BlockEditor\Blocks\HeadingBlock;
use TheVosCache\Editor\BlockEditor\Blocks\TextBlock;

class EditorServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
//        $this->publishesMigrations([
//            __DIR__.'/../database/migrations' => database_path('migrations'),
//        ]);

        $this->publishes([
            __DIR__.'/../config/editor.php' => config_path('editor.php'),
        ]);

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'editor');

        Livewire::component('block-editor', BlockEditor::class);
        Livewire::component('heading-block', HeadingBlock::class);
        Livewire::component('text-block', TextBlock::class);
    }
}
