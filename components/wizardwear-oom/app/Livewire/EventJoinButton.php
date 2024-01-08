<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EventJoinButton extends Component
{
    public Event $event;
    public User $user;
    public bool $joined = false;

    public function mount(Event $event): void
    {
        $this->event = $event;
        $this->user = Auth::user();

        $this->joined = $this->user->events()
            ->withPivot('present')->where('event_id', $event->id)
            ->first()->pivot->present;
    }

    public function joinEvent(): void
    {
        if ($this->user->events->contains($this->event)) {
            $this->user->events()->updateExistingPivot(
                $this->event->id,
                ['present'=> true]
            );
        } else {
            $this->user->events()->attach($this->event, ['present' => true]);
        }

        $this->joined = $this->user->events()
            ->withPivot('present')->where('event_id', $this->event->id)
            ->first()->pivot->present;
    }

    public function unJoinEvent(): void
    {
        $this->user->events()->updateExistingPivot(
            $this->event->id,
            ['present'=> false]
        );

        $this->joined = $this->user->events()
            ->withPivot('present')->where('event_id', $this->event->id)
            ->first()->pivot->present;
    }

    public function render(): View
    {
        return view('livewire.event-join-button');
    }
}
