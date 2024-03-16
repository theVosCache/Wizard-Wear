<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers as C;
use App\Http\Controllers\Admin as A;

Auth::routes();

Route::get('/', [C\HomeController::class, 'index'])->name('root');


Route::prefix('admin')->as('admin.')->middleware('auth')->group(function(){
    Route::resources([
        'page' => A\PageController::class
    ]);
});
