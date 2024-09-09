@extends('layouts.app')

@section('title', 'ADMIN - Role Create')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Create a new Role</div>
                    <div class="card-body">
                        <form action="{{ route('admin.role.store') }}" method="post">
                            @csrf

                            <x-input type="text" name="label" label="Label" required/>
                            <x-input type="text" name="name" label="Internal Name" required/>

                            <div class="offset-3 col-9 mb-3">
                                <h5>Choose Users:</h5>
                                @foreach($users as $user)
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" value="{{ $user->id }}"
                                               id="user{{ $user->id }}" name="users[]">
                                        <label class="form-check-label" for="user{{ $user->id }}">
                                            {{ $user->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="offset-3 col-9 mb-3">
                                <h5>Choose Permissions:</h5>
                                @if(count($permissions) === 0)
                                    <i>No Permissions found</i>
                                @endif
                                @foreach($permissions as $permission)
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" value="{{ $permission->id }}"
                                               id="permission{{ $permission->id }}" name="permissions[]">
                                        <label class="form-check-label" for="permission{{ $permission->id }}">
                                            {{ $permission->label }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="input-group">
                                <input type="submit" value="Create Role" class="form-control btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
