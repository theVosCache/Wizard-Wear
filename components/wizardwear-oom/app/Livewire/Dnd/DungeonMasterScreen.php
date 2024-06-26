<?php

declare(strict_types=1);

namespace App\Livewire\Dnd;

use App\Models\Dnd\DndCampaign;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class DungeonMasterScreen extends Component
{
    public DndCampaign $dndCampaign;
    public Collection $partyList;

    public function mount(DndCampaign $dndCampaign): void
    {
        $this->dndCampaign = $dndCampaign;

        $this->partyList = $this->dndCampaign->dndCharacters->sortBy('initiative');
    }

    public function render(): View
    {
        return view('livewire.dnd.dungeon-master-screen');
    }
}
