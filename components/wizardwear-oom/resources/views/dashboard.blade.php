@extends('layouts.app')

@section('title', 'Dashboard van '. $user->name)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        @dump($user)
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
