<?php

namespace App\Http\Controllers\Dnd;

use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Models\Dnd\DndCampaign;
use App\Models\Dnd\DndCharacter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DndCampaignController extends Controller
{
    public function __construct()
    {
//        $this->authorizeResource(DndCampaign::class);
    }

    public function index()
    {
        $campaigns = DndCampaign::all();
        return view('dnd.campaign.index', compact('campaigns'));
    }

    public function create()
    {
        return view('dnd.campaign.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'next_session' => 'nullable|date',
            'location' => 'nullable|string',
            'invite_code' => 'required|string',
            'allow_players_to_join' => 'nullable|bool'
        ]);

        $dndCampaign = new DndCampaign;
        $dndCampaign->dungeon_master_id = Auth::id();
        $dndCampaign->name = $request->name;
        $dndCampaign->next_session = ($request->next_session) ? Carbon::parse($request->next_session) : null;
        $dndCampaign->location = $request->location;
        $dndCampaign->invite_code = $request->invite_code;
        $dndCampaign->allow_players_to_join = $request->allow_players_to_join;

        if ($dndCampaign->save()) {
            session()->flash('success', 'Campaign Created');
            return redirect()->route('dnd.dnd-campaign.show', $dndCampaign);
        } else {
            session()->flash('danger', 'Something went wrong');
            return redirect()->back();
        }
    }

    public function show(DndCampaign $dndCampaign)
    {
        return view('dnd.campaign.show', compact('dndCampaign'));
    }

    public function join(DndCampaign $dndCampaign)
    {
        $defaultUserCharacterId = Auth::user()->default_character_id;
        $characters = Auth::user()->characters;
        return view('dnd.campaign.join', compact('dndCampaign', 'characters', 'defaultUserCharacterId'));
    }

    public function edit(DndCampaign $dndCampaign)
    {
        return view('dnd.campaign.edit', compact('dndCampaign'));
    }

    public function editData(DndCampaign $dndCampaign)
    {
        return view('dnd.campaign.edit_data', compact('dndCampaign'));
    }

    public function update(Request $request, DndCampaign $dndCampaign)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'next_session' => 'nullable|date',
            'location' => 'nullable|string',
            'invite_code' => 'required|string',
            'allow_players_to_join' => 'nullable|bool'
        ]);

        $dndCampaign->name = $request->name;
        $dndCampaign->next_session = ($request->next_session) ? Carbon::parse($request->next_session) : null;
        $dndCampaign->location = $request->location;
        $dndCampaign->invite_code = $request->invite_code;
        $dndCampaign->allow_players_to_join = $request->allow_players_to_join;

        $dndCampaign->save();

        return redirect()->route('dnd.dnd-campaign.show', $dndCampaign);
    }

    public function joinHandle(DndCampaign $dndCampaign, Request $request)
    {
        $request->validate([
            'invite_code' => 'required|string',
            'character_uuid' => 'required|uuid|exists:characters,uuid'
        ]);

        if ($dndCampaign->invite_code !== $request->invite_code){
            session()->flash('danger', 'Invalid invite code');
            return redirect()->back();
        }

        $character = Character::findByUuid($request->character_uuid);

        $dndCharacter = new DndCharacter;
        $dndCharacter->user_id = Auth::id();
        $dndCharacter->character_id = $character->id;
        $dndCharacter->dnd_campaign_id = $dndCampaign->id;

        $dndCharacter->save();
        session()->flash('success', 'Successfully joined');
        return redirect()->route('dnd.dnd-campaign.index');
    }

    public function destroy(DndCampaign $dndCampaign)
    {
        $dndCampaign->forceDelete();
        return redirect()->route('dnd.dnd-campaign.index');
    }
}
