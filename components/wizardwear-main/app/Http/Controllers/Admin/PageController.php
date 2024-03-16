<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('admin.page.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.page.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Page $page)
    {
        //
    }

    public function edit(Page $page)
    {
        return view('admin.page.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'name' => 'required|string|min:3'
        ]);

        $page->name = $request->name;
        $page->save();

        session()->flash('success', 'Pagina Bijgewerkt');
        session()->flash('success-extended-message', "Pagina: ". $page->name);

        return redirect()->route('admin.page.edit', $page);
    }

    public function destroy(Page $page)
    {
        //
    }
}
