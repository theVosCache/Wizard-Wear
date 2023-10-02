<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Oom;

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

Route::redirect('/', 'login')->name('root');

Auth::routes();

Route::get('/lang/{locale}', function (string $locale) {
    if (!in_array($locale, ['en', 'nl'])) {
        abort(400);
    }

    App::setLocale($locale);

    return redirect()->back();
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [Oom\DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('admin')->as('admin.')->group(function () {
        Route::resources([
            'role' => Oom\Admin\RoleController::class,
            'page' => Oom\Admin\PageController::class
        ]);
    });
});