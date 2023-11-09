<?php

use App\Http\Controllers as C;
use App\Http\Controllers\Admin as A;
use App\Http\Controllers\Dnd as D;
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
    Route::get('/my-account', [C\MyAccountController::class, 'show'])->name('my-account');
    Route::put('/my-account', [C\MyAccountController::class, 'update'])->name('my-account.update');


    Route::prefix('/dnd')->as('dnd.')->group(function () {
        Route::get('dnd-campaign/{dndCampaign}/join', [D\DndCampaignController::class, 'join'])->name('dnd-campaign.join');
        Route::post('dnd-campaign/{dndCampaign}/join', [D\DndCampaignController::class, 'joinHandle'])->name('dnd-campaign.join');

        Route::get('dnd-campaign/{dndCampaign}/edit-data', [D\DndCampaignController::class, 'editData'])->name('dnd-campaign.edit-data');
        Route::put('dnd-campaign/{dndCampaign}/edit-data', [D\DndCampaignController::class, 'updateData'])->name('dnd-campaign.update-data');

        Route::resource('dnd-campaign', D\DndCampaignController::class);

        Route::get('player-screen/{dndCampaign}', D\PlayerScreenController::class)->name('player-screen');
    });

    Route::prefix('/admin')->as('admin.')->group(function () {
        Route::resource('role', A\RoleController::class);
    });
});

