<?php

namespace App\Livewire\Cms;

use App\Models\Cms\Navigation;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class NavEditor extends Component
{
    public Collection $navigations;
    public string $label = '';
    public ?int $pageId = null;

    public function __construct()
    {
        $this->loadNav();
    }

    private function loadNav(): void
    {
        $this->navigations = Navigation::all()->sortBy('level')->sortBy('order');
    }

    public function addRootLevel(): void
    {
        $nav = new Navigation();
        $nav->label = $this->label;
        $nav->order = Navigation::where('level', 0)->max('order') + 1;
        $nav->page_id = $this->pageId;
        $nav->save();

        $this->reset('label', 'pageId');
        $this->loadNav();
    }

    public function moveItemUp(string $uuid): void
    {
        $nav = Navigation::findByUuid($uuid);
        $prevNav = Navigation::where([
            'level' => $nav->level,
            'order' => $nav->order - 1,
        ])->first();

        $prevNav->order = $prevNav->order + 1;
        $nav->order = $nav->order - 1;
        $nav->save();
        $prevNav->save();
        $this->loadNav();
    }

    public function moveItemDown(string $uuid): void
    {
        $nav = Navigation::findByUuid($uuid);
        $prevNav = Navigation::where([
            'level' => $nav->level,
            'order' => $nav->order + 1,
        ])->first();

        $prevNav->order = $prevNav->order - 1;
        $nav->order = $nav->order + 1;
        $nav->save();
        $prevNav->save();
        $this->loadNav();
    }

    public function render(): View
    {
        return view('livewire.cms.nav-editor');
    }
}
