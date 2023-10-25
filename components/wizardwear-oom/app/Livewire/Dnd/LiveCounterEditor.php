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

    public function shiftElement(string $name, string $direction): void
    {
        $data = $this->session->data;
        $data['monsterList'] = $this->moveElement($data['monsterList'], $name, $direction);

        $this->session->data = $data;
        $this->session->save();
    }

    private function moveElement($array, $key, $direction): array
    {
        $keys = array_keys($array);
        $values = array_values($array);

        // Find the index of the element to move
        $currentIndex = array_search($key, $keys);

        // Check if the element exists and if it's not at the edge of the array
        if ($currentIndex !== false) {
            if (
                ($direction === 'up' && $currentIndex > 0) ||
                ($direction === 'down' && $currentIndex < count($array) - 1)
            ) {
                // Remove the element from the original position
                $removedKey = array_splice($keys, $currentIndex, 1);
                $removedValue = array_splice($values, $currentIndex, 1);

                // Calculate the new position
                $newIndex = $direction === 'up' ? $currentIndex - 1 : $currentIndex + 1;

                // Insert the element at the new position
                array_splice($keys, $newIndex, 0, $removedKey);
                array_splice($values, $newIndex, 0, $removedValue);

                // Reconstruct the associative array
                $array = array_combine($keys, $values);
            }
        }

        return $array;
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
