<?php

namespace App\Livewire\Dnd\DungeonMasterScreen;

use App\Models\Dnd\Spell;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class SpellList extends Component
{
    public Collection $spellList;
    public Spell $spell;
    public string $selectedSpell;

    public function mount(): void
    {
        $this->spellList = Spell::all();
    }

    public function selectSpell(string $name): void
    {
        $this->selectedSpell = $name;
        $this->spell = $this->spellList->where('name', $name)->first();
    }

    public function render(): View
    {
        return view('livewire.dnd.dungeon-master-screen.spell-list');
    }
}
