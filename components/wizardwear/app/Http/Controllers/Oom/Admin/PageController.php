<?php

namespace App\Http\Controllers\Oom\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class PageController extends Controller
{
    public function index(): View
    {
        $pages = Page::all();

        return view('oom.admin.page.index', compact('pages'));
    }

    public function create(): View
    {
        return view('oom.admin.page.create');
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required|string|min:3',
            'description' => 'required|string|min:3',
            'path' => 'required|string'
        ])->validated();

        $page = new Page;
        $page->path = $validated['path'];
        $page->name = $validated['name'];
        $page->description = $validated['description'];

        if ($page->save()) {
            return redirect()->route('oom.admin.page.show', $page);
        } else {
            return redirect()->back();
        }
    }

    public function show(Page $page): View
    {
        return view('oom.admin.page.show', compact('page'));
    }

    public function edit(Page $page)
    {
        //
    }

    public function update(Request $request, Page $page)
    {
        dd($request->all());
    }

    public function destroy(Page $page)
    {
        //
    }
}
