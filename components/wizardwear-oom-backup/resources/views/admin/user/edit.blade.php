@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Edit User: {{ $user->name }}</div>
                    <div class="card-body">
                        <form action="{{ route('admin.user.update', $user) }}" method="post">
                            @csrf
                            @method('PUT')

                            <x-input type="text" name="name" label="Naam" :value="$user->name" required />
                            <x-input type="email" name="email" label="Email" :value="$user->email" required />
                            <x-input type="text" name="city" label="City" :value="$user->city" />
                            <x-input type="boxes" name="role_ids" label="Roles"
                                :options="$roles" :selected="$user->roles->pluck('id')" multiple/>
                            <x-input type="submit" label="Update" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
