<?php

namespace App\Livewire\Dnd\PlayerScreen;

use App\Models\DndCharacter;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CharacterInformation extends Component
{
    public DndCharacter $dndCharacter;

    public bool $editCharacter = false;
    public int $level, $totalHitPoints, $initiative, $strength,
        $dexterity, $constitution, $intelligence, $wisdom, $charisma, $armorClass;

    public function mount(DndCharacter $dndCharacter): void
    {
        $this->dndCharacter = $dndCharacter;
        $this->resetFieldToCharacter();
    }

    public function resetFieldToCharacter(): void
    {
        $this->level = $this->dndCharacter->level ?? 1;
        $this->totalHitPoints = $this->dndCharacter->total_hit_points ?? 0;
        $this->initiative = $this->dndCharacter->initiative ?? 0;
        $this->strength = $this->dndCharacter->strength ?? 0;
        $this->dexterity = $this->dndCharacter->dexterity ?? 0;
        $this->constitution = $this->dndCharacter->constitution ?? 0;
        $this->intelligence = $this->dndCharacter->intelligence ?? 0;
        $this->wisdom = $this->dndCharacter->wisdom ?? 0;
        $this->charisma = $this->dndCharacter->charisma ?? 0;
        $this->armorClass = $this->dndCharacter->armor_class ?? 0;
    }

    public function saveFieldToCharacter(): void
    {
        $this->dndCharacter->total_hit_points = $this->totalHitPoints;
        $this->dndCharacter->initiative = $this->initiative;
        $this->dndCharacter->strength = $this->strength;
        $this->dndCharacter->dexterity = $this->dexterity;
        $this->dndCharacter->constitution = $this->constitution;
        $this->dndCharacter->intelligence = $this->intelligence;
        $this->dndCharacter->wisdom = $this->wisdom;
        $this->dndCharacter->charisma = $this->charisma;
        $this->dndCharacter->armor_class = $this->armorClass;

        $this->dndCharacter->save();

        $this->editCharacter = false;
    }

    public function minCurrentHitPoints(): void
    {
        if ($this->dndCharacter->current_hit_points === 0) {
            return;
        }

        $this->dndCharacter->current_hit_points--;
        $this->dndCharacter->save();
    }

    public function plusCurrentHitPoints(): void
    {
        if ($this->dndCharacter->current_hit_points === $this->dndCharacter->total_hit_points) {
            return;
        }

        $this->dndCharacter->current_hit_points++;
        $this->dndCharacter->save();
    }

    public function render(): View
    {
        return view('livewire.dnd.player-screen.character-information');
    }
}
