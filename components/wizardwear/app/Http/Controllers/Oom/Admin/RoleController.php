<?php

namespace App\Http\Controllers\Oom\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Oom\Admin\RoleRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoleController extends Controller
{
    public function index(): View
    {
        $roles = Role::all();
        return view('oom.admin.role.index', compact('roles'));
    }

    public function create(): View
    {
        $users = User::all()->pluck('name', 'id');
        return view('oom.admin.role.create', compact('users'));
    }

    public function store(RoleRequest $request): RedirectResponse
    {
        if (Role::where('slug', $request->slug)->count() !== 0) {
            return redirect()->back()->withErrors([
                'slug' => 'Slug already exists'
            ]);
        }

        $role = new Role;
        $role->name = $request->name;
        $role->slug = $request->slug;

        if ($role->save()) {
            $role->users()->sync($request->users);

            return redirect()->route('oom.admin.role.edit', $role);
        } else {
            return redirect()->back();
        }
    }

    public function show(Role $role)
    {
        //
    }

    public function edit(Role $role): View
    {
        $users = User::all()->pluck('name', 'id');
        return view('oom.admin.role.edit', compact('users', 'role'));
    }

    public function update(RoleRequest $request, Role $role): RedirectResponse
    {
        $role->name = $request->name;
        $role->slug = $request->slug;

        $role->users()->sync($request->users);
        $role->save();

        return redirect()->route('oom.admin.role.edit', $role);
    }

    public function destroy(Role $role)
    {
        //
    }
}
