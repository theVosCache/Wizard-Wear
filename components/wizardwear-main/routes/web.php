<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers as C;
use App\Http\Controllers\Admin as A;

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

Auth::routes();
Route::get('/', C\HomeController::class)->name('root');

Route::middleware('auth')->prefix('admin')->as('admin.')->group(function(){
   Route::get('/', A\DashboardController::class)->name('dashboard');
});
