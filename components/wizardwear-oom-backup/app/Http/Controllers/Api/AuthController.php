<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)){
            return response()->json([
                'message' => 'Authentication Failed'
            ], status: 401);
        }

        $user = Auth::user();
        $token = $user->createToken("OomApi");

        return response()->json([
            'message' => 'Login Successful',
            'token' => $token->plainTextToken,
        ]);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout Successful'
        ]);
    }
}
