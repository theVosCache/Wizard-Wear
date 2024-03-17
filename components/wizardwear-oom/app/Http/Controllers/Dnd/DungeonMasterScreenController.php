<?php

declare(strict_types=1);

namespace App\Http\Controllers\Dnd;

use App\Http\Controllers\Controller;
use App\Models\Dnd\DndCampaign;
use Illuminate\Http\Request;

class DungeonMasterScreenController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DndCampaign $dndCampaign, Request $request)
    {
        return view('dnd.dungeon_master_screen', compact('dndCampaign'));
    }
}
