<?php

use App\Http\Controllers as C;
use App\Http\Controllers\Admin as A;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/login');

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [C\HomeController::class, 'index'])->name('home');

    Route::prefix('/admin')->as('admin.')->group(function(){
        Route::resource('role', A\RoleController::class);
    });
});

