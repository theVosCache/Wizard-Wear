<?php

namespace App\Http\Controllers\Dnd;

use App\Http\Controllers\Controller;
use App\Models\DndCampaign;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DndCampaignController extends Controller
{
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
            'invite_code' => 'nullable|string'
        ]);

        $dndCampaign = new DndCampaign;
        $dndCampaign->dungeon_master_id = Auth::id();
        $dndCampaign->name = $request->name;
        $dndCampaign->next_session = Carbon::parse($request->next_session);
        $dndCampaign->location = $request->location;
        $dndCampaign->invite_code = $request->invite_code;

        if ($dndCampaign->save()){
            session()->flash('success', 'Campaign Created');
            return redirect()->route('dnd.dnd-campaign.show', $dndCampaign);
        }else{
            session()->flash('danger', 'Something went wrong');
            return redirect()->back();
        }
    }

    public function show(DndCampaign $dndCampaign)
    {
        return view('dnd.campaign.show', compact('dndCampaign'));
    }

    public function edit(DndCampaign $dndCampaign)
    {
        //
    }

    public function update(Request $request, DndCampaign $dndCampaign)
    {
        //
    }

    public function destroy(DndCampaign $dndCampaign)
    {
        //
    }
}
