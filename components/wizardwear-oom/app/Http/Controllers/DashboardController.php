<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(): Renderable
    {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }
}
