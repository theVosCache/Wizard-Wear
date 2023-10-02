@extends('oom.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">All Roles</div>
                    <div class="card-body">
                        <a href="{{ route('oom.admin.role.create') }}" class="btn btn-success float-end">Create</a>

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Users</th>
                                <th>Updated At</th>
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
                                        Updated: {{ $role->updated_at->format('H:i d-m-Y') }} <br>
                                        Created: {{ $role->created_at->format('H:i d-m-Y') }}
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
