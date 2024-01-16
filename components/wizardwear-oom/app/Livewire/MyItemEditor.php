<?php

namespace App\Livewire;

use App\Models\Avatar;
use App\Models\Item;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;

class MyItemEditor extends Component
{
    use WithFileUploads;

    private const ADD_TITLE = "Add new Item";
    private const EDIT_TITLE = "Edit Item: %s";

    public User $user;
    public Collection $items;
    public ?Item $item = null;

    public string $title = self::ADD_TITLE;
    public $avatar;
    public string $name;
    public string $description;

    public string $formTitle = "Add new Item";

    public function mount(User $user): void
    {
        $this->user = $user;
        $this->items = $user->items->sortBy('name');
    }

    public function saveNewItem(): void
    {
        $item = $this->item;

        if (empty($item)) {
            $item = new Item;
            $item->user_id = $this->user->id;
        }

        $item->name = $this->name;
        $item->description = $this->description;

        if ($item->save()) {
            if (!empty($this->avatar)) {
                $item->avatar()->delete();
                Avatar::store($this->avatar, $item);
            }
            $this->reset('name', 'description', 'avatar');
            $this->items = $this->user->items->sortBy('name');
        }
    }

    public function render(): View
    {
        return view('livewire.my-item-editor');
    }
}
