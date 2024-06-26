<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index(): Renderable
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function twoFactorInformation(): Renderable
    {
        $user = Auth::user();
        return view('user.two_factor', compact('user'));
    }
}
