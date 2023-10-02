<?php

declare(strict_types=1);

namespace TheVosCache\WizardwearCommon\Providers;

use App\View\Components\Input;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;


final class PackageServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands(
                commands: [],
            );
        }

        //$this->publishes([
        //    __DIR__.'/../config/courier.php' => config_path('courier.php'),
        //]);

        //$this->publishes([
        //    __DIR__.'/../lang' => $this->app->langPath('vendor/courier'),
        //]);

        //$this->mergeConfigFrom(
        //    __DIR__.'/../config/courier.php', 'courier'
        //);

        // $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // $this->loadTranslationsFrom(__DIR__.'/../lang', 'courier');

        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/courier'),
        ], 'public');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'ww');

         Blade::component('input', Input::class);
    }
}