@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                {!! $page->content['output'] !!}
            </div>
        </div>
    </div>
@endsection
