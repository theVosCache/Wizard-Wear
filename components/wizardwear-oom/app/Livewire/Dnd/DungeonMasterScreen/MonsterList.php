<?php

namespace App\Livewire\Dnd\DungeonMasterScreen;

use App\Http\Resources\DndCampaignMonsterData;
use App\Models\DndCampaign;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class MonsterList extends Component
{
    public DndCampaign $dndCampaign;

    public string $name, $monsterType;
    public int $currentHitPoints, $totalHitPoints;

    public function mount(DndCampaign $dndCampaign): void
    {
        $this->dndCampaign = $dndCampaign;
    }

    public function increaseHitPoints(int $index): void
    {
        $data = $this->dndCampaign->data;

        /** @var DndCampaignMonsterData[] $monsterList */
        $monsterList = $data->monsterList;

        if ($monsterList[$index]->currentHitPoints < $monsterList[$index]->totalHitPoints){
            $monsterList[$index]->currentHitPoints++;
        }

        $data->monsterList = $monsterList;
        $this->dndCampaign->data = $data;
        $this->dndCampaign->save();
    }

    public function decreaseHitPoints(int $index): void
    {
        $data = $this->dndCampaign->data;

        /** @var DndCampaignMonsterData[] $monsterList */
        $monsterList = $data->monsterList;

        if ($monsterList[$index]->currentHitPoints > 0){
            $monsterList[$index]->currentHitPoints--;
        }

        $data->monsterList = $monsterList;
        $this->dndCampaign->data = $data;
        $this->dndCampaign->save();
    }

    public function save(): void
    {
        $monsterData = new DndCampaignMonsterData(
            name: $this->name,
            monsterType: $this->monsterType,
            currentHitPoints: $this->currentHitPoints,
            totalHitPoints: $this->totalHitPoints
        );

        $data = $this->dndCampaign->data;
        $data->monsterList[] = $monsterData;

        $this->dndCampaign->data = $data;
        $this->dndCampaign->save();
    }

    public function render(): View
    {
        return view('livewire.dnd.dungeon-master-screen.monster-list');
    }
}
