<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('role', function (string|array $role) {
            $check = false;

            if (is_array($role)) {
                foreach ($role as $r) {
                    if (Auth::user()->hasRole($r)) {
                        $check = true;
                    }
                }
            } else {
                $check = Auth::user()->hasRole($role);
            }

            return $check;
        });
    }
}
