<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CharacterController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();
        return view('my_account.character.index', compact('user'));
    }
}
