@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">Edit Account</div>
                    <div class="card-body">
                        <form action="{{ route('my-account.general-info.update') }}" method="post">
                            @csrf
                            @method('PUT')

                            <x-input type="text" name="name" label="Name" :value="$user->name" required/>
                            <x-input type="text" name="city" label="Woonplaats" :value="$user->city" />

                            <x-input type="submit"/>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header">Update Email / password</div>
                    <div class="card-body">
                        <form action="{{ route('my-account.general-info.updateEmail') }}" method="post">
                            @csrf
                            @method('PUT')

                            <x-input type="email" name="email" label="Email" :value="$user->email" required />
                            <x-input type="password" name="password" label="Password" />
                            <x-input type="password" name="password_confirmation" label="Password Confirmation" />
                            <x-input type="password" name="current_password" label="Current Password" required />

                            <x-input type="submit"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
