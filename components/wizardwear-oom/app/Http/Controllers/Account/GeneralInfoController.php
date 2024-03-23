<?php

declare(strict_types=1);

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GeneralInfoController extends Controller
{
    public function index(): View
    {
        return view('my_account.general', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'city' => 'nullable|string'
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->city = $request->city;

        $user->save();
        session()->flash(self::FLASH_KEYS['success_title'], 'Account Updated');
        return redirect()->route('my-account.general-info');
    }

    public function updateEmail(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'sometimes|nullable|string|min:6',
            'current_password' => 'required|current_password'
        ]);
        $user = Auth::user();

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

                session()->flash(self::FLASH_KEYS['success_message'], "Check your new email for the verification mail");
            }
        }

        $user->save();
        session()->flash(self::FLASH_KEYS['success_title'], 'Email or Password Updated');
        return redirect()->route('my-account.general-info');
    }
}
