<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers as C;
use App\Http\Controllers\Admin as A;

Auth::routes();

Route::get('/', C\HomeController::class)->name('root');

Route::prefix('admin')->as('admin.')->middleware('auth')->group(function(){
    Route::resources([
        'page' => A\PageController::class
    ]);
});

Route::any('/{slug}', C\PageController::class)->where('slug', '.*');
