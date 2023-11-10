<?php

namespace App\Http\Controllers\Dnd;

use App\Http\Controllers\Controller;
use App\Models\DndCampaign;
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
