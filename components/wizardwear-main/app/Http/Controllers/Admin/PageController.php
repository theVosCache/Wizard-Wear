<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::withTrashed()->get();
        return view('admin.page.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.page.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3',
            'path' => 'required|string|unique:pages,path'
        ]);

        $page = new Page;
        $page->user_id = Auth::id();
        $page->title = $request->title;
        $page->path = $request->path;

        if ($page->save()){
            return redirect()->route('admin.page.show', compact('page'));
        }else{
            return redirect()->back();
        }
    }

    public function show(Page $page)
    {
        return view('admin.page.show', compact('page'));
    }

    public function edit(Page $page)
    {
        //
    }

    public function update(Request $request, Page $page)
    {
        //
    }

    public function destroy(Page $page)
    {
        //
    }
}
