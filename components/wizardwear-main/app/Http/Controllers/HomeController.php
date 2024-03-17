<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $page = Page::where('slug', '/')->first();
        $blocks = $page?->contentBlocks->sortBy('index') ?? [];

        return view('home', compact('blocks'));
    }
}
