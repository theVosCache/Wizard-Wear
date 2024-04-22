<?php

namespace App\Livewire\Cms\DropBlockEditor;

use App\Models\Cms\Page;
use Illuminate\Contracts\View\View;
use Jeffreyvr\DropBlockEditor\Parsers\Parse;
use Livewire\Component;

class SaveButton extends Component
{
    public Page $page;

    public $properties;

    protected $listeners = [
        'editorIsUpdated' => 'editorIsUpdated',
    ];

    public function editorIsUpdated($properties)
    {
        $this->properties = $properties;
    }

    public function __construct()
    {
        if (!empty(session()->get('page_uuid'))) {
            $this->page = Page::findByUuid(session()->get('page_uuid'));
        }
    }

    public function save(): void
    {
        $activeBlocks = collect($this->properties['activeBlocks']);
        $this->page->content = [
            'blocks' => $activeBlocks,
            'output' => Parse::execute([
                'activeBlocks' => $this->properties['activeBlocks'],
                'base' => $this->properties['base'],
                'context' => 'rendered',
                'parsers' => $this->properties['parsers'],
            ])
        ];
        $this->page->save();

        $this->redirect(route('admin.cms.page.show', $this->page));
    }

    public function render(): View
    {
        return view('livewire.cms.drop-block-editor.save-button');
    }
}
