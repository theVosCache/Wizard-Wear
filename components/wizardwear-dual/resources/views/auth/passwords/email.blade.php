@extends('oom.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('form.reset password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('oom.password.email') }}">
                        @csrf

                        <x-input type="errors"/>

                        <x-input type="email" name="email" :label="__('form.email')" />

                        <x-input type="submit" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
