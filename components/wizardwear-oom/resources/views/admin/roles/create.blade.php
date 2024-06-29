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

                            <div class="input-group mb-3">
                                <label class="input-group-text col-3" for="label">
                                    <strong class="ms-auto">Label</strong>
                                </label>
                                <input type="text" class="form-control" name="label" id="label"
                                       value="{{ old('label') }}" required>
                            </div>

                            <div class="input-group mb-3">
                                <label class="input-group-text col-3" for="name">
                                    <strong class="ms-auto">Internal Name</strong>
                                </label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"
                                       required>
                            </div>

                            <div class="offset-3 col-9 mb-3">
                                <h5>Choose Permissions:</h5>
                                @if(count($permissions) === 0)
                                    <i>No Permissions found</i>
                                @endif
                                @foreach($permissions as $permission)
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
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
