<?php

namespace TheVosCache\Editor;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use TheVosCache\Editor\Commands\EditorCommand;

class EditorServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('editor')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_editor_table')
            ->hasCommand(EditorCommand::class);
    }
}
