@extends('layouts.app')

@section('title', 'ADMIN - Permissions')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Permission Management</div>
                    <div class="card-body">
                        <a href="{{ route('admin.permission.create') }}" class="btn btn-success">Create new Permission</a>

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Label</th>
                                <th>Internal Name</th>
                                <th>Connected Roles</th>
                                <th>Connected Users</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->label }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        <ul>
                                            @foreach($permission->roles as $role)
                                                <li>{{ $role->label }} ({{ $role->name }})</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            @foreach($permission->users as $user)
                                                <li>{{ $user->name }} (ID: {{ $user->id }})</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        @if($permission->updated_at !== $permission->created_at)
                                            Updated at: {{ $permission->updated_at->format('H:i d-m-Y') }} <br>
                                        @endif
                                        Created at: {{ $permission->created_at->format('H:i d-m-Y') }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.permission.show', $permission) }}"
                                           class="btn btn-warning">Show</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
