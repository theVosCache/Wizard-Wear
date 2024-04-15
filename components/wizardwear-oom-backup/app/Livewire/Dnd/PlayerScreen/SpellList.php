<?php

declare(strict_types=1);

namespace App\Livewire\Dnd\PlayerScreen;

use App\Models\Dnd\DndCharacter;
use App\Models\Dnd\Spell;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class SpellList extends Component
{
    public Collection $spellList;
    public Spell $spell;
    public string $selectedSpell;

    public function mount(DndCharacter $dndCharacter): void
    {
        $this->spellList = $dndCharacter->data->spells;
    }

    public function selectSpell(string $name): void
    {
        $this->selectedSpell = $name;
        $this->spell = $this->spellList->where('name', $name)->first();
    }

    public function render()
    {
        return view('livewire.dnd.player-screen.spell-list');
    }
}
