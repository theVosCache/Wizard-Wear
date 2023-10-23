<?php

namespace App\Livewire\Dnd;

use App\Models\DndSession;
use Illuminate\View\View;
use Livewire\Component;

class LiveCounterEditor extends Component
{
    public string $name, $hitPoints, $totalHitPoints;
    public DndSession $session;

    public function increaseHitPoints(string $name): void
    {
        $this->updateHitPoints($name, 1);
    }

    public function decreaseHitPoints(string $name): void
    {
        $this->updateHitPoints($name, -1);
    }

    private function updateHitPoints(string $name, int $value): void
    {
        $data = $this->session->data;
        $data['monsterList'][$name]['current'] = $data['monsterList'][$name]['current'] + $value;
        $this->session->data = $data;
        $this->session->save();
    }

    public function createNewEntry(): void
    {
        $data = $this->session->data;
        $data['monsterList'][$this->name] = [
            'current' => $this->hitPoints,
            'total' => $this->totalHitPoints
        ];
        $this->session->data = $data;
        $this->session->save();
        $this->reset('name', 'hitPoints');
    }

    public function render(): View
    {
        return view('livewire.dnd.live-counter-editor');
    }
}
