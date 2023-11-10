<?php

namespace App\Livewire\Dnd\PlayerScreen;

use App\Models\DndCampaign;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class MonsterList extends Component
{
    public DndCampaign $dndCampaign;

    public function mount(DndCampaign $dndCampaign): void
    {
        $this->dndCampaign = $dndCampaign;
    }

    public function render(): View
    {
        return view('livewire.dnd.player-screen.monster-list');
    }
}
