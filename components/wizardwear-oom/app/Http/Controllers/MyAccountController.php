<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MyAccountController extends Controller
{
    public function show()
    {
        return view('my_account.show', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'sometimes|required|string|min:3',
            'email' => 'sometimes|required|email',
            'password' => 'sometimes|nullable|string|min:6',
            'current_password' => 'sometimes|required|current_password'
        ]);

        $user = Auth::user();
        if ($request->has('name')) {
            $user->name = $request->name;
        }

        if (
            $request->has('current_password') &&
            $request->has('password')
        ) {
            $user->password = Hash::make($request->password);
        }

        if (
            $request->has('current_password') &&
            $request->has('email')
        ) {
            if ($request->email !== $user->email) {
                $user->email = $request->email;
                $user->email_verified_at = null;
                $user->sendEmailVerificationNotification();
            }
        }

        $user->save();
        session()->flash('success', 'Save Successful');

        if ($request->has('current_password') && ($request->has('email') || $request->has('password'))){
            Auth::logout();
        }

        return redirect()->route('my-account');
    }
}
