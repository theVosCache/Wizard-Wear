@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">All Roles</div>
                    <div class="card-body">
                        <a href="{{ route('admin.role.create') }}" class="btn btn-primary float-end">Create new Role</a>

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Users</th>
                                <th>Updated At</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->slug }}</td>
                                    <td>
                                        <ul>
                                            @foreach($role->users as $user)
                                                <li>{{ $user->name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        Updated At: {{ $role->updated_at?->format('d-m-Y') }} <br>
                                        Created At: {{ $role->created_at?->format('d-m-Y') }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.role.edit', $role) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('admin.role.destroy', $role) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            <input type="submit" value="Delete" class="btn btn-danger ms-1">
                                        </form>
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
