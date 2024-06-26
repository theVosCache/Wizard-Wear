@extends('layouts.app')

@section('title', 'Profile of '. $user->name)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">Update profile</div>
                    <div class="card-body">
                        <form action="{{ route('user-profile-information.update') }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="input-group mb-3">
                                <label class="input-group-text col-3" for="name">
                                    <strong class="ms-auto">Name</strong>
                                </label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" required>
                            </div>

                            <div class="input-group mb-3">
                                <label class="input-group-text col-3" for="email">
                                    <strong class="ms-auto">Email</strong>
                                </label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" required>
                            </div>

                            <input type="submit" value="Update" class="btn btn-warning form-control">
                        </form>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">Update password</div>
                    <div class="card-body">
                        <form action="{{ route('user-password.update') }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="input-group mb-3">
                                <label class="input-group-text col-5" for="password">
                                    <strong class="ms-auto">
                                        New Password
                                    </strong>
                                </label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="**************" required>
                            </div>

                            <div class="input-group mb-3">
                                <label class="input-group-text col-5" for="password_confirmation">
                                    <strong class="ms-auto">
                                        Confirm Password
                                    </strong>
                                </label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="**************" required>
                            </div>

                            <div class="input-group mb-3">
                                <label class="input-group-text col-5" for="current_password">
                                    <strong class="ms-auto">
                                        Current Password
                                    </strong>
                                </label>
                                <input type="password" class="form-control" name="current_password" id="current_password" placeholder="**************" required>
                            </div>

                            <input type="submit" value="Update" class="btn btn-warning form-control">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header">Profile Information</div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>2FA Enabled</th>
                            </tr>
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>
                                    {{ $user->email }}
                                    @if($user->hasVerifiedEmail())
                                        <span class="text-success">Verified</span>
                                    @else
                                        <span class="text-danger">Not Verified</span>
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($user->two_factor_secret))
                                        <span class="text-success">Enabled</span>
                                    @else
                                        <span class="text-danger">Disabled</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
