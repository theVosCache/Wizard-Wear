<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();
        return view('my_account.item.index', compact('user'));
    }
}
