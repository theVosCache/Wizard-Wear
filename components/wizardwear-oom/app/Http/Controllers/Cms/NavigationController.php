<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Cms\Navigation;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function __invoke(Request $request)
    {
        $navigations = Navigation::all();
        return view('cms.navigation.index', compact('navigations'));
    }
}
