@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <x-input type="errors" />
                        <x-input type="text" name="name" label="Name" required />
                        <x-input type="email" name="email" label="Email" required />
                        <x-input type="password" name="password" label="Password" required />
                        <x-input type="password" name="password_confirmation" label="Confirm Password" required />
                        <x-input type="submit" label="Register" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
