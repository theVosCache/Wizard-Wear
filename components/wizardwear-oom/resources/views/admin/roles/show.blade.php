@extends('layouts.app')

@section('title', 'ADMIN - Role: ' . $role->label)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Role: {{ $role->label }}</div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-1">
                                <a href="{{ route('admin.role.index') }}" class="btn btn-outline-success">< Back</a>
                            </div>
                            <div class="col-1 offset-10 text-end">
                                <a href="{{ route('admin.role.edit', $role) }}" class="btn btn-warning">Edit</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <h3>Role is assigned to:</h3>
                                <ul>
                                    @foreach($role->users as $user)
                                        <li>{{ $user->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-6">
                                <h3>Permissions:</h3>
                                <ul>
                                    @foreach($role->permissions as $permission)
                                        <li>{{ $permission->label }} ({{ $permission->name }})</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
