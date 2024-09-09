@extends('layouts.app')

@section('title', 'ADMIN - Role')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">All Role in the system</div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-2">
                                <a href="{{ route('admin.role.create') }}" class="btn btn-success">Create new Role</a>
                            </div>
                        </div>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Label</th>
                                <th>Name</th>
                                <th>Connected Permissions</th>
                                <th>Connected Users</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->label }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach($role->permissions->take(5) as $permission)
                                            {{ $permission->label }} <br>
                                        @endforeach
                                        @if($role->permissions->count() > 5)
                                            .....
                                        @endif
                                    </td>
                                    <td>
                                        @foreach($role->users->take(5) as $user)
                                            {{ $user->name }} <br>
                                        @endforeach
                                        @if($role->users->count() > 5)
                                            .....
                                        @endif
                                    </td>
                                    <td>
                                        @if($role->updated_at !== $role->created_at)
                                            Updated At: {{ $role->updated_at->format('H:i d-m-Y') }} <br>
                                        @endif
                                        Created At: {{ $role->created_at->format('H:i d-m-Y') }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.role.show', $role) }}" class="btn btn-success">Show</a>
                                        <a href="{{ route('admin.role.edit', $role) }}" class="btn btn-warning">Edit</a>
                                        <button class="btn btn-danger" onclick="return window.swal.delete('#role-destroy-{{ $role->id }}')">Delete</button>
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

    @foreach($roles as $role)
        <form method="post" action="{{ route('admin.role.destroy', $role) }}" id="role-destroy-{{ $role->id }}">
            @csrf
            @method('DELETE')
        </form>
    @endforeach
@endsection
