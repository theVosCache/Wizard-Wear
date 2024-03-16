<?php

namespace App\Livewire;

use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;

class PageCreateForm extends Component
{
    #[Validate('required|string|min:3')]
    public string $name;

    #[Validate('required|string|min:3|unique:pages,slug')]
    public string $slug;

    public function updated($name, $value): void
    {
        $slugText = '/' . Str::slug($this->name);

        $slug = $slugText;
        $count = 1;
        while (Page::where('slug', $slug)->exists()){
            $slug = sprintf("%s-%s", $slugText, $count);
            $count++;
        }

        $this->slug = $slug;
    }

    public function save(): void
    {
        $page = new Page([
            'name' => $this->name,
            'slug' => $this->slug
        ]);

        if ($page->save()){
            $this->redirect(route('admin.page.show', $page));
        }
    }

    public function render(): View
    {
        return view('livewire.page-create-form');
    }
}
