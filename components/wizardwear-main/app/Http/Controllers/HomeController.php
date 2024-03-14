<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $page = Page::where('path', '/')->first();
        $blocks = $page->blocks;

        return view('home', compact('blocks'));
    }
}
