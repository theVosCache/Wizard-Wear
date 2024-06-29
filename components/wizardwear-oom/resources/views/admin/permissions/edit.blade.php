@extends('layouts.app')

@section('title', 'ADMIN - Permissions')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Update Permission: {{ $permission->label }}</div>
                    <div class="card-body">
                        <form action="{{ route('admin.permission.update', $permission) }}" method="post">
                            @csrf
                            @method('PATCH')

                            <x-input type="text" name="label" label="Label" value="{{ old('label', $permission->label) }}" required/>
                            <x-input type="text" name="name" label="Internal Name" value="{{ old('name', $permission->name) }}" required/>

                            <div class="input-group">
                                <h3>Assign to role:</h3>
                                @foreach($roles as $role)
                                    <div class="input-group mb-3">
                                        <span class="input-group-text form-check form-switch col-3">
                                            <input type="checkbox" role="switch" name="roles[]" id="user-{{ $role->id }}"
                                                   value="{{ $role->id }}" class="ms-auto form-check-input"
                                                {{ (in_array($role->id, old('roles', $permission->roles->pluck('id')->toArray()))) ? 'checked' : null }}
                                            />
                                        </span>
                                        <input type="text" value="{{ $role->label }} ({{ $role->name }})" class="form-control disabled" disabled readonly/>
                                    </div>
                                @endforeach
                            </div>

                            <div class="input-group">
                                <h3>Give permission to Users:</h3>
                                @foreach($users as $user)
                                    <div class="input-group mb-3">
                                        <span class="input-group-text form-check form-switch col-3">
                                            <input type="checkbox" role="switch" name="users[]" id="user-{{ $user->id }}"
                                                   value="{{ $user->id }}" class="ms-auto form-check-input"
                                                {{ (in_array($user->id, old('users', $permission->users->pluck('id')->toArray()))) ? 'checked' : null }}
                                            />
                                        </span>
                                        <input type="text" value="{{ $user->name }}" class="form-control disabled" disabled readonly/>
                                    </div>
                                @endforeach
                            </div>

                            <input type="submit" value="Update Permission" class="btn btn-success form-control">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
