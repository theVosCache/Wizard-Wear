@extends('oom.layouts.app')

@section('content')
    <div class="container">
        <div class="row text-center">
            <div class="col">
                <h1 class="page-title">Welcome {{ Auth::user()->name }}</h1>
            </div>
        </div>
    </div>
@endsection
