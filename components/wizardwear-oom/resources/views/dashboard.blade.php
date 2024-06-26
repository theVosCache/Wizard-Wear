@extends('layouts.app')

@section('title', 'Dashboard of '. $user->name)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @dump($user->attributesToArray())
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
