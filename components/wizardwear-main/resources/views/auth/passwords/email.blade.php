@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Reset Password</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <x-input type="errors" />
                        <x-input type="email" name="email" label="Email" required />
                        <x-input type="submit" label="Send Password Reset" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
