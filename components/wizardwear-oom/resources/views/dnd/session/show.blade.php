@extends('layouts.simple')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">{{ $session->location }}</div>
        </div>
    </div>
@endsection
