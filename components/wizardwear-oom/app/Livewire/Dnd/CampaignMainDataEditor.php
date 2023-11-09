<?php

namespace App\Livewire\Dnd;

use App\Http\Resources\DndCampaignMonsterData;
use App\Models\DndCampaign;
use Livewire\Component;

class CampaignMainDataEditor extends Component
{
    public DndCampaign $dndCampaign;
    public string $name;
    public string $monsterType;
    public int $currentHitPoints;
    public int $totalHitPoints;

    public function mount(DndCampaign $dndCampaign)
    {
        $this->dndCampaign = $dndCampaign;
    }

    public function save()
    {
        $monster = new DndCampaignMonsterData(
            name: $this->name,
            monsterType: $this->monsterType,
            currentHitPoints: $this->currentHitPoints,
            totalHitPoints: $this->totalHitPoints
        );

        $this->dndCampaign->data->monsterList[] = $monster;
        if ($this->dndCampaign->save()){
            $this->reset('name', 'monsterType', 'currentHitPoints', 'totalHitPoints');
        }
    }

    public function render()
    {
        return view('livewire.dnd.campaign-main-data-editor');
    }
}
