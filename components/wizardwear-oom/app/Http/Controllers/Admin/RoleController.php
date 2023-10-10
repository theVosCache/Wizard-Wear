<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Role::class);
    }

    public function index(): View
    {
        $roles = Role::all();

        return view('admin.role.index', compact('roles'));
    }

    public function create(): View
    {
        $users = User::all()->pluck('name', 'id');
        return view('admin.role.create', compact('users'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'slug' => 'required|string|min:3|unique:roles,slug',
            'user_ids.*' => 'nullable|integer|exists:users,id'
        ]);

        $role = new Role;

        $role->name = $request->name;
        $role->slug = $request->slug;

        if ($role->save()) {
            $role->users()->attach($request->user_ids);
        }
        return redirect()->route('admin.role.index');
    }

    public function show(Role $role)
    {
        abort(422);
    }

    public function edit(Role $role): View
    {
        $users = User::all()->pluck('name', 'id');
        return view('admin.role.edit', compact('role', 'users'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'slug' => 'required|string|min:3',
            'user_ids.*' => 'nullable|integer|exists:users,id'
        ]);

        $role->name = $request->name;
        $role->slug = $request->slug;
        $role->save();

        $role->users()->sync($request->user_ids);

        return redirect()->route('admin.role.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('admin.role.index');
    }
}
