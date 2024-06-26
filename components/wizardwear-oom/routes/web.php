<?php

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
});
