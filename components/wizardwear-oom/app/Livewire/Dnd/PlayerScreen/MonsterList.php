<?php

declare(strict_types=1);

namespace App\Livewire\Dnd\PlayerScreen;

use App\Models\Dnd\DndCampaign;
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
