<?php

namespace App\Livewire;

use App\Models\Avatar;
use App\Models\Character;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class CharacterEditor extends Component
{
    use WithFileUploads;

    public User $user;
    public string $formTitle = 'Create new Character';
    public string $defaultFormTitle = 'Create new Character';

    public string $activeCharacterUuid = '';

    public string $name = '';
    public string $house = '';
    public string $about = '';
    public $avatar;

    public function mount(User $user): void
    {
        $this->user = $user;
    }

    public function newCharacterButton(): void
    {
        $this->reset('name', 'house', 'about');
        $this->formTitle = $this->defaultFormTitle;
    }

    public function editCharacter(string $characterUuid): void
    {
        $character = $this->user->characters->where('uuid', $characterUuid)->first();
        $this->activeCharacterUuid = $characterUuid;
        $this->formTitle = "Edit Character: " . $character->name;

        $this->name = $character->name;
        $this->house = $character->house;
        $this->about = $character->about;
    }

    public function markCharacterDefault(string $characterUuid): void
    {
        $character = $this->user->characters->where('uuid', $characterUuid)->first();
        $this->user->default_character_id = $character->id;

        $this->user->save();
        session()->flash('success', 'Default Character Set');
    }

    public function saveNewCharacter(): void
    {
        if (empty($this->activeCharacterUuid)) {
            $character = new Character;
            $character->user_id = $this->user->id;
            $character->name = $this->name;
            $character->house = $this->house;
            $character->about = $this->about;

            if ($character->save()) {
                Avatar::store($this->avatar, $character);

                $this->reset('name', 'house', 'about', 'avatar');
            }
        } else {
            $character = Character::findByUuid($this->activeCharacterUuid);
            if ($character){
                $character->name = $this->name;
                $character->house = $this->house;
                $character->about = $this->about;

                if (!empty($this->avatar)){
                    $character->avatar?->delete();
                    Avatar::store($this->avatar, $character);
                    $this->reset('avatar');
                }

                if ($character->save()) {
                    $this->reset('name', 'house', 'about');
                    $this->formTitle = $this->defaultFormTitle;
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.character-editor');
    }
}
