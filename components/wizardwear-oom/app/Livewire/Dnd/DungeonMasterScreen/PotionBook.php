<?php

namespace App\Livewire\Dnd\DungeonMasterScreen;

use App\Models\Dnd\Potion;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class PotionBook extends Component
{
    public Collection $potions;
    public array $yearList;
    public string $selectedPotion;
    public Potion $potion;

    public function mount(): void
    {
        $this->potions = Potion::all();

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
        return view('livewire.dnd.dungeon-master-screen.potion-book');
    }
}
