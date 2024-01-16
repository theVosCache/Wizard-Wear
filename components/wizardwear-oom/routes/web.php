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

    Route::prefix('/my-account')->as('my-account.')->group(function(){
        Route::get('/', [C\MyAccountController::class, 'show'])->name('index');
        Route::put('/', [C\MyAccountController::class, 'update'])->name('update');

        Route::resource('item', C\ItemController::class);
    });

    Route::prefix('/event')->as('event.')->group(function(){
        Route::get('/', [C\EventController::class, 'index'])->name('index');
    });

    Route::prefix('/dnd')->as('dnd.')->group(function () {
        Route::get('dnd-campaign/{dndCampaign}/join', [D\DndCampaignController::class, 'join'])->name('dnd-campaign.join');
        Route::post('dnd-campaign/{dndCampaign}/join', [D\DndCampaignController::class, 'joinHandle'])->name('dnd-campaign.join');

        Route::get('dnd-campaign/{dndCampaign}/edit-data', [D\DndCampaignController::class, 'editData'])->name('dnd-campaign.edit-data');
        Route::put('dnd-campaign/{dndCampaign}/edit-data', [D\DndCampaignController::class, 'updateData'])->name('dnd-campaign.update-data');

        Route::resource('dnd-campaign', D\DndCampaignController::class);

        Route::get('player-screen/{dndCampaign}', D\PlayerScreenController::class)->name('player-screen');
        Route::get('dm-screen/{dndCampaign}', D\DungeonMasterScreenController::class)->name('dm-screen');
    });

    Route::prefix('/admin')->as('admin.')->group(function () {
        Route::resource('role', A\RoleController::class);
        Route::resource('event', A\EventController::class);
    });
});

