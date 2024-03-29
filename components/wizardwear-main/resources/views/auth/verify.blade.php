@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verify Your Email Address</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            A fresh verification link has been sent to your email address.
                        </div>
                    @endif

                    Before proceeding, please check your email for a verification link.
                    If you did not receive the email.
                    <form method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <x-input type="errors" />
                        <x-input type="submit" label="Click here to request another" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
