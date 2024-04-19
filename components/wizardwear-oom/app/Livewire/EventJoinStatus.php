<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Event;
use App\Models\EventUser;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class EventJoinStatus extends Component
{
    public const BUTTON_CLASS = [
        'success' => 'btn-success',
        'danger' => 'btn-danger'
    ];
    public const JOIN_BUTTON_TEXT = [
        'success' => 'Going to Event',
        'danger' => 'NOT going to Event'
    ];
    public const ITEM_BUTTON_TEXT = [
        'success' => 'Taking Item To Event',
        'danger' => 'Leaving Item at Home'
    ];

    public User $user;
    public Event $event;
    public EventUser $eventUser;
    public Collection $eventItems;

    public string $buttonClass = 'btn-danger';
    public string $buttonText = 'NOT going to Event';

    public function mount(User $user, Event $event): void
    {
        $this->event = $event;
        $this->user = $user;

        if ($this->event->users->contains($user)) {
            $this->eventUser = $this->event->users()->where('user_id', $user->id)->first()->pivot;
            $this->eventItems = $this->eventUser->items;

            $this->buttonClass = 'btn-success';
            $this->buttonText = 'Going to Event';
        }
    }

    public function toggleItem(string $itemUuid): void
    {
        $this->eventUser = $this->event->users()->where('user_id', $this->user->id)->first()->pivot;
        $tmpItem = $this->user->items->where('uuid', $itemUuid)->first();

        if ($this->eventItems->contains($tmpItem)) {
            $this->eventUser->items()->detach($tmpItem);
        } else {
            $this->eventUser->items()->attach($tmpItem);
        }

        $this->eventItems = $this->eventUser->items;
    }

    public function toggleStatus(): void
    {
        if ($this->event->users->contains($this->user)) {
            $this->eventUser->items()->sync([]);
            $this->event->users()->detach($this->user->id);

            $this->buttonClass = 'btn-danger';
            $this->buttonText = $this::JOIN_BUTTON_TEXT['danger'];
        } else {
            $this->event->users()->attach($this->user->id);

            $this->buttonClass = 'btn-success';
            $this->buttonText = $this::JOIN_BUTTON_TEXT['success'];
        }
    }

    public function render(): View
    {
        return view('livewire.event-join-status');
    }
}
