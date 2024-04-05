@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">User: {{ $user->name }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-end mb-3">
                                Password reset link button
                                <a href="{{ route('admin.user.edit', $user) }}" class="btn btn-warning">Edit</a>
                            </div>
                            <div class="col-4">
                                <h3>User Details</h3>
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th class="table-secondary">Email</th>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th class="table-secondary">City</th>
                                        <td>{{ $user->city }}</td>
                                    </tr>
                                    <tr>
                                        <th class="table-secondary">Roles</th>
                                        <td>
                                            <ul>
                                                @foreach($user->roles as $role)
                                                    <li>{{ $role->name }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-4">
                                <h3>Items</h3>
                                <table class="table table-hover table-responsive">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user->items as $item)
                                        <tr>
                                            <td class="w-25">
                                                <img src="{{ $item->avatar_path }}"
                                                     alt="{{ $item->name }}"
                                                     width="150px"
                                                     class="img-fluid">
                                            </td>
                                            <td colspan="2">
                                                {{ $item->name }} <br>
                                                <span class="text-muted">
                                                    {{ $item->description }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-4">
                                <h3>Characters</h3>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($user->characters as $character)
                                        @php
                                            $bgColor = match($character->house) {
                                                'gryffindor' => 'bg-danger-subtle',
                                                'hufflepuff' => 'bg-warning-subtle',
                                                'ravenclaw' => 'bg-info-subtle',
                                                'slytherin' => 'bg-success-subtle',
                                                default => 'bg-secondary-subtle'
                                            }
                                        @endphp
                                        <tr class="{{ $bgColor }}">
                                            <td>
                                                @if(!empty($character->avatar))
                                                    <img src="{{ $character->avatar_path }}"
                                                         alt="{{ $character->name }}"
                                                         class="img-fluid w-50">
                                                @endif
                                                <img src="{{ $character->house_crest_img_path }}"
                                                     alt="{{ $character->house }}"
                                                     class="img-fluid w-50">
                                            </td>
                                            <td>
                                                {{ $character->name }} <br>
                                                @if($character->isDndCharacter)
                                                    Dnd Character: <span class="text-success">Yes</span>
                                                @else
                                                    Dnd Character: <span class="text-danger">No</span>
                                                @endif
                                                <br>
                                                <span class="text-muted text-small">
                                                    {{ $character->about }}
                                                </span>
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
        </div>
    </div>
@endsection
