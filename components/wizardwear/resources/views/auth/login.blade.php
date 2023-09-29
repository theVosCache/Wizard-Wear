@extends('oom.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('oom.login') }}">
                            @csrf

                            <x-input type="errors"/>
                            <x-input type="email" name="email" :label="__('form.email')"/>
                            <x-input type="password" name="password" :label="__('form.password')"/>
                            <x-input type="switch" name="remember" :label="__('keep signed in')"/>
                            <x-input type="submit" label="Inloggen"/>

                            <div class="row mb-0">
                                @if (Route::has('oom.password.request'))
                                    <a class="btn btn-link" href="{{ route('oom.password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                @if (Route::has('oom.register'))
                                    <a class="btn btn-link" href="{{ route('oom.register') }}">
                                        {{ __('Register?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
