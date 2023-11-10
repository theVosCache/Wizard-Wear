<?php

namespace App\Livewire\Dnd\DungeonMasterScreen;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class PartyList extends Component
{
    public Collection $partyList;

    public function mount(Collection $partyList): void
    {
        $this->partyList = $partyList;
    }

    public function render(): View
    {
        return view('livewire.dnd.dungeon-master-screen.party-list');
    }
}
