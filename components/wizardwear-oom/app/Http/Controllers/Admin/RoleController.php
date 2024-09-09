<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use DirectoryTree\Authorization\Role;
use DirectoryTree\Authorization\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        $users = User::all();
        return view('admin.roles.create', compact('permissions', 'users'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name',
            'label' => 'required|string',
            'users.*' => 'nullable|exists:users,id',
            'permissions.*' => 'nullable|exists:permissions,id'
        ]);

        $role = Role::create([
            'name' => $request->name,
            'label' => $request->label
        ]);

        if ($role->save()){
            $role->permissions()->attach($request->permissions);
            $role->users()->attach($request->users);

            $this->setSuccessFlashMessage(message: 'Role Created Successfully');
            return redirect()->route('admin.role.index');
        }

        $this->setDangerFlashMessage(message: 'Role was not created');
        return redirect()->back();
    }

    public function show(Role $role): View
    {
        return view('admin.roles.show', compact('role'));
    }

    public function edit(Role $role): View
    {
        $users = User::all();
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions', 'users'));
    }

    public function update(Request $request, Role $role): RedirectResponse
    {
        $request->validate([
            'name' => ['required','string', Rule::unique('roles')->ignore($role)],
            'label' => 'required|string',
            'users.*' => 'nullable|exists:users,id',
            'permissions.*' => 'nullable|exists:permissions,id'
        ]);

        $role->update([
            'name' => $request->name,
            'label' => $request->label
        ]);

        $role->users()->sync($request->users);
        $role->permissions()->sync($request->permissions);


        $this->setSuccessFlashMessage(message: 'Role Updated Successfully');
        return redirect()->route('admin.role.show', $role);
    }

    public function destroy(Role $role): RedirectResponse
    {
        $role->delete();

        $this->setDangerFlashMessage(message: 'Role Deleted Successfully');
        return redirect()->route('admin.role.index');
    }
}
