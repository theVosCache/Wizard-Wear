<?php

declare(strict_types=1);

namespace App\Http\Controllers\Dnd;

use App\Http\Controllers\Controller;
use App\Models\Dnd\DndCampaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlayerScreenController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DndCampaign $dndCampaign, Request $request)
    {
        $dndCharacter = $dndCampaign->dndCharacters->where('user_id', Auth::id())->first();
        return view('dnd.player_screen', compact('dndCampaign', 'dndCharacter'));
    }
}
