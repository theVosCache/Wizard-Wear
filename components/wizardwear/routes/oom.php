<?php

use Illuminate\Support\Facades\App;
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

Route::redirect('/', 'login');

Auth::routes();

Route::get('/lang/{locale}', function (string $locale) {
    if (!in_array($locale, ['en', 'nl'])) {
        abort(400);
    }

    App::setLocale($locale);

    return redirect()->back();
});

Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'index'])->name('root');
