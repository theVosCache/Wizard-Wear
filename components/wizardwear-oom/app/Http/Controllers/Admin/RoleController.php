<?php

namespace App\Http\Controllers\Admin;

use DirectoryTree\Authorization\Role;
use DirectoryTree\Authorization\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name',
            'label' => 'required|string',
            'permissions.*' => 'nullable|exists:permissions,id'
        ]);

        $role = Role::create([
            'name' => $request->name,
            'label' => $request->label
        ]);

        if ($role->save()){
            $role->permissions()->attach($request->permissions);

            session()->flash('success', 'Success');
            session()->flash('success-extended-message', 'Role created successfully');
            return redirect()->route('admin.role.index');
        }

        session()->flash('danger', 'Error');
        session()->flash('danger-extended-message', 'Something went wrong');
        return redirect()->back();
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
