@extends('layouts.app')

@section('title')
    Permission: {{ $permission->name }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Permission: {{ $permission->label }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-11">
                                Internal Name: {{ $permission->name }}
                            </div>
                            <div class="col-1">
                                <a href="{{ route('admin.permission.edit', $permission) }}"
                                   class="btn btn-warning">Edit</a>
                            </div>
                            <div class="col-6">
                                <h4>Connected Roles: </h4>
                                <ul>
                                    @foreach($permission->roles as $role)
                                        <li>{{ $role->label }} (Internal Name: {{ $role->name }})</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-6">
                                <h4>Connected Users: </h4>
                                <ul>
                                    @foreach($permission->users as $user)
                                        <li>{{ $user->name }} (ID: {{ $user->id }})</li>
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
