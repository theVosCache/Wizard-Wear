<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function __invoke(string $slug): View
    {
        $page = Page::where('slug', '/' . $slug)->first();

        if (empty($page)) {
            abort(404);
        }

        $blocks = $page->contentBlocks;
        return view('page', compact('blocks'));
    }
}
