@extends('layouts.app')

@section('title', 'ADMIN - Role')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">All Role in the system</div>
                    <div class="card-body">
                        <a href="{{ route('admin.role.create') }}" class="btn btn-success">Create new Role</a>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Label</th>
                                <th>Connected Permissions</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->label }}</td>
                                    <td></td>
                                    <td>
                                        @if($role->updated_at !== $role->created_at)
                                            {{ $role->updated_at->format('H:i d-m-Y') }} <br>
                                        @endif
                                        {{ $role->created_at->format('H:i d-m-Y') }}
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
