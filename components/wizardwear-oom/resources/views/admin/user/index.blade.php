@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Manage Users</div>
                    <div class="card-body">
                        <a href="{{ route('admin.user.create') }}" class="btn btn-success">Create a new User</a>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>City</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>

                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        {{ $user->email }} <br>
                                        @if(!empty($user->email_verified_at))
                                            <span class="text-success">Verified</span>
                                        @else
                                            <span class="text-success">Unverified</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->city }}</td>
                                    <td>
                                        @if($user->updated_at !== $user->created_at)
                                            Bijgewerkt op: {{ $user->updated_at?->format('d-m-Y') }} <br>
                                        @endif
                                        Aangemaakt op: {{ $user->created_at?->format('d-m-Y') }}
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-warning">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
