<?php

declare(strict_types=1);

namespace App\Livewire\Dnd\DungeonMasterScreen;

use App\Http\Resources\DndPlayerData;
use App\Models\Dnd\DndCharacter;
use App\Models\Dnd\Potion;
use App\Models\Dnd\Spell;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class PartyList extends Component
{
    public Collection $partyList;
    public DndCharacter $dndCharacter;
    public Collection $spells;
    public Collection $potions;
    public string $searchSpells = '';
    public string $searchPotions = '';

    public function mount(Collection $partyList): void
    {
        $this->partyList = $partyList;
        $this->potions = new Collection();
        $this->spells = new Collection();
    }

    public function updated($name, $value): void
    {
        if ($name === 'searchSpells') {
            if (empty($this->searchSpells)) {
                $this->spells = new Collection();
                return;
            }

            $this->spells = Spell::where('name', 'like', $this->searchSpells . "%")->get();
            return;
        }
        if ($name === 'searchPotions') {
            if (empty($this->searchPotions)) {
                $this->potions = new Collection();
                return;
            }

            $this->potions = Potion::where('name', 'like', $this->searchPotions . "%")->get();
        }
    }

    public function selectCharacter(string $uuid): void
    {
        $this->dndCharacter = $this->partyList->where('uuid', $uuid)->first();
    }

    public function learnSpell(string $name): void
    {
        $spell = Spell::where('name', $name)->first();

        /** @var DndPlayerData $data */
        $data = $this->dndCharacter->data;
        $data->spells->add($spell);
        $this->dndCharacter->data = $data;

        $this->dndCharacter->save();
        $this->reset('searchSpells');
        $this->spells = new Collection();
    }

    public function learnPotion(string $name): void
    {
        $potion = Potion::where('name', $name)->first();

        /** @var DndPlayerData $data */
        $data = $this->dndCharacter->data;
        $data->potions->add($potion);
        $this->dndCharacter->data = $data;

        $this->dndCharacter->save();
        $this->reset('searchPotions');
        $this->potions = new Collection();
    }

    public function render(): View
    {
        return view('livewire.dnd.dungeon-master-screen.party-list');
    }
}
