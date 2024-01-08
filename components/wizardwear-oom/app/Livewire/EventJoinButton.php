<?php

namespace App\Livewire;

use App\Models\Event;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class EventJoinButton extends Component
{
    private Event $event;

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function render(): View
    {
        return view('livewire.event-join-button');
    }
}
