@extends('layouts.app')

@section('title', 'User Panel')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">User Management</div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-12 text-end">
                                <a href="{{ route('admin.user.create') }}" class="btn btn-success">Create new User</a>
                            </div>
                        </div>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Woonplaats</th>
                                <th>Roles</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        {{ $user->email }} <br>
                                        @if(!empty($user->email_verified_at))
                                            <span class="text-success">Verified</span>
                                        @else
                                            <span class="text-danger">Unverified</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->city }}</td>
                                    <td>
                                        <ul>
                                            @foreach($user->roles as $role)
                                                <li>{{ $role->name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.user.show', $user) }}" class="btn btn-warning">Show</a>
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
