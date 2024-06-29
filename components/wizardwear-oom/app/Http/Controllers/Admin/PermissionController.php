<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use DirectoryTree\Authorization\Permission;
use App\Http\Controllers\Controller;
use DirectoryTree\Authorization\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.permissions.create', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions,name',
            'label' => 'required|string',
            'roles.*' => 'sometimes|nullable|integer|exists:roles,id',
            'users.*' => 'sometimes|nullable|integer|exists:users,id',
        ]);

        $permission = Permission::create([
            'name' => $request->name,
            'label' => $request->label,
        ]);

        if ($permission->save()){
            $permission->users()->attach($request->users);
            $permission->roles()->attach($request->roles);

            session()->flash('success', 'Permission created successfully');
            return redirect()->route('admin.permission.show', $permission);
        }

        session()->flash('danger', 'Permission was not created');
        return redirect()->back();
    }

    public function show(Permission $permission)
    {
        return view('admin.permissions.show', compact('permission'));
    }

    public function edit(Permission $permission)
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.permissions.edit', compact('permission', 'roles', 'users'));
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => [
                'required', 'string',
                Rule::unique('permissions', 'name')->ignore($permission->id),
            ],
            'label' => 'required|string',
            'roles.*' => 'sometimes|nullable|integer|exists:roles,id',
            'users.*' => 'sometimes|nullable|integer|exists:users,id',
        ]);

        $permission->update([
            'name' => $request->name,
            'label' => $request->label,
        ]);

        if ($permission->save()){
            $permission->users()->sync($request->users);
            $permission->roles()->sync($request->roles);

            session()->flash('success', 'Permission updated successfully');
            return redirect()->route('admin.permission.show', $permission);
        }

        session()->flash('danger', 'Permission was not updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
