<?php

namespace App\Livewire\Dnd;

use App\Models\Dnd\DndCampaign;
use App\Models\Dnd\DndCharacter;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class PlayerScreen extends Component
{
    public DndCampaign $dndCampaign;
    public DndCharacter $dndCharacter;
    public Collection $partyCharacters;

    public function mount(DndCampaign $dndCampaign, DndCharacter $dndCharacter)
    {
        $this->dndCampaign = $dndCampaign;
        $this->dndCharacter = $dndCharacter;

        $this->partyCharacters = $dndCampaign->dndCharacters()
            ->whereNot('character_id', $dndCharacter->id)
            ->orderByDesc('current_hit_points')
            ->get();
    }

    public function render()
    {
        return view('livewire.dnd.player-screen');
    }
}
