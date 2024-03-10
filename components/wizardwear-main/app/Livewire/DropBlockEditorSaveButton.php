<?php

namespace App\Livewire;

use Livewire\Component;

class DropBlockEditorSaveButton extends Component
{
    public $properties;

    protected $listeners = [
        'editorIsUpdated' => 'editorIsUpdated',
    ];

    public function editorIsUpdated($properties)
    {
        $this->properties = $properties;
    }

    public function save(): void
    {
        dd($this->properties);
    }

    public function render()
    {
        return view('livewire.drop-block-editor-save-button');
    }
}
