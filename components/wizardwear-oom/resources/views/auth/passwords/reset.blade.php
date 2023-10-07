@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Setup New Password</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                        <x-input type="email" name="email" label="Email" :value="$email" required/>
                        <x-input type="password" name="password" label="Password" required />
                        <x-input type="password" name="password_confirmation" label="Confirm Password" required />

                        <x-input type="submit" label="Reset Password" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
