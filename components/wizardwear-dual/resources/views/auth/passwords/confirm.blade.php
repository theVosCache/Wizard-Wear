@extends('oom.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('form.confirm password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('oom.password.confirm') }}">
                        @csrf

                        <x-input type="password" name="password" :label="__('form.password')" />

                        <x-input type="submit"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
