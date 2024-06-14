<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers as C;

Route::redirect(uri: '/', destination: '/dashboard')->name(name: 'root');

Route::middleware(['auth', 'verified'])->group(callback: function () {
    Route::get('/dashboard', [C\DashboardController::class, 'index'])->name(name: 'dashboard');
});
