<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDetailsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = $request->user();
        $items = $user->items;
        $characters = $user->characters;

        return response()->json([
            'user' => $user,
            'characters' => $characters,
            'items' => $items
        ]);
    }
}
