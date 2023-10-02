@extends('oom.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('form.reset password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('oom.password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <x-input type="password" name="password" :label="__('form.password')" />
                        <x-input type="password" name="password_confirmation" :label="__('form.confirm password')" />

                        <x-input type="submit" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
