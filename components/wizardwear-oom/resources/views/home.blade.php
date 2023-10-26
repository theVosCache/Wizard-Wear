@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
            @if(!empty($character))
                <div class="col-4">
                    <x-character-card :$character/>
                </div>
            @endif
        </div>
    </div>
@endsection
