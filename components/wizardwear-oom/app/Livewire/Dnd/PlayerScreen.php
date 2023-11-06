<?php

namespace App\Livewire\Dnd;

use App\Models\DndCampaign;
use App\Models\DndCharacter;
use Livewire\Component;

class PlayerScreen extends Component
{
    public DndCampaign $dndCampaign;
    public DndCharacter $dndCharacter;

    public function mount(DndCampaign $dndCampaign, DndCharacter $dndCharacter)
    {
        $this->dndCampaign = $dndCampaign;
        $this->dndCharacter = $dndCharacter;
    }

    public function render()
    {
        return view('livewire.dnd.player-screen');
    }
}
