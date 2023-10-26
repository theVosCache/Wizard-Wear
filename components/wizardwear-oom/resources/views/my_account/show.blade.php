@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">Edit Account</div>
                    <div class="card-body">
                        <form action="{{ route('my-account.update') }}" method="post">
                            @csrf
                            @method('PUT')

                            <x-input type="text" name="name" label="Name" :value="$user->name" required/>

                            <x-input type="submit"/>
                        </form>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header">Update Email / password</div>
                    <div class="card-body">
                        <form action="{{ route('my-account.update') }}" method="post">
                            @csrf
                            @method('PUT')

                            <x-input type="email" name="email" label="email" :value="$user->email" required />
                            <x-input type="password" name="password" label="Password" />
                            <x-input type="password" name="password_confirmation" label="Password<br>Confirmation" />
                            <x-input type="password" name="current_password" label="Current<br>Password" required />

                            <x-input type="submit"/>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-8">
                <livewire:character-editor :$user/>
            </div>
        </div>
    </div>
@endsection
