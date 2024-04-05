<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    public function index()
    {
        $users = User::all()->load('roles');
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'city' => 'nullable|string',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->city = $request->city;
        $user->password = 'invalid';

        if (!$user->save()) {
            session()->flash($this::FLASH_KEYS['danger_title'], 'User not created');
            return redirect()->back();
        }

        session()->flash($this::FLASH_KEYS['success_title'], 'User created successfully');
        $user->notify(new ResetPassword(Str::random(64)));
        return redirect()->route('admin.user.index');
    }

    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all()->pluck('name', 'id');
        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'city' => 'nullable|string',
            'role_ids.*' => 'nullable|integer|exists:roles,id'
        ]);

        $user->name = $request->name;
        $user->city = $request->city;

        if ($request->email !== $user->email){
            $user->email = $request->user;
            $user->email_verified_at = null;
        }

        $user->roles()->sync($request->role_ids);

        if ($user->save()){
            $user->notify(new VerifyEmail());

            session()->flash($this::FLASH_KEYS['success_title'], 'User Updated');
            return redirect()->route('admin.user.show', $user);
        }

        session()->flash($this::FLASH_KEYS['danger_title'], 'User not updated');
        return redirect()->back();
    }

    public function destroy(User $user)
    {
        $user->delete();

        session()->flash($this::FLASH_KEYS['danger_title'], 'User deleted');
        return redirect()->route('admin.user.index');
    }
}
