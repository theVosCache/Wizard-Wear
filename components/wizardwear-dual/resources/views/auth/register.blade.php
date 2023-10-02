@extends('oom.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('oom.Register Order Of Merlin')</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('oom.register') }}">
                        @csrf
                        <x-input type="errors" />

                        <x-input type="text" name="name" :label="__('form.name')" required />
                        <x-input type="email" name="email" :label="__('form.email')" required />
                        <x-input type="password" name="password" :label="__('form.password')" required />
                        <x-input type="password" name="password_confirmation" :label="__('form.confirm password')" required />

                        <x-input type="submit" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
