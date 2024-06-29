<?php

use App\Http\Middleware\Require2FA;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers as C;

Route::redirect('/', '/dashboard')->name('root');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [C\DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('/profile')->as('profile.')->group(function () {
        Route::get('/information', [C\UserProfileController::class, 'index'])->name('information');
        Route::get('/2fa', [C\UserProfileController::class, 'twoFactorInformation'])
            ->name('2fa')->middleware('password.confirm');
    });

    Route::prefix('/admin')->as('admin.')->middleware(Require2FA::class)->group(function () {
       Route::resources([
           'role' => C\Admin\RoleController::class,
           'permission' => C\Admin\PermissionController::class,
       ]);
    });
});
