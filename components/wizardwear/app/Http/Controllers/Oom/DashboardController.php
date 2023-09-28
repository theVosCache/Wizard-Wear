<?php

namespace App\Http\Controllers\Oom;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('oom.dashboard');
    }
}
