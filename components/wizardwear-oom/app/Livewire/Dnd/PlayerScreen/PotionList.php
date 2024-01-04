<?php

namespace App\Livewire\Dnd\PlayerScreen;

use App\Models\Dnd\DndCharacter;
use App\Models\Dnd\Potion;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class PotionList extends Component
{
    public DndCharacter $dndCharacter;
    public Collection $potions;
    public array $yearList;
    public string $selectedPotion;
    public Potion $potion;

    public function mount(DndCharacter $dndCharacter): void
    {
        $this->dndCharacter = $dndCharacter;
        $this->potions = $dndCharacter->data->potions;
        $this->yearList = [
            '1e Year' => 1,
            '2e Year' => 2,
            '3e Year' => 3,
            '4e Year' => 4,
            '5e Year' => 5,
            '6e Year' => 6,
            '7e Year' => 7,
        ];
    }

    public function selectPotion(string $name): void
    {
        $this->selectedPotion = $name;
        $this->potion = $this->potions->where('name', $name)->first();
    }

    public function render(): View
    {
        return view('livewire.dnd.player-screen.potion-list');
    }
}
