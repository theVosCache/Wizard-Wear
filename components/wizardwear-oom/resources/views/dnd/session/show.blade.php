@extends('layouts.simple')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">{{ $session->location }}</div>
        </div>
        <div class="row">
            <div class="col-6">

            </div>
            <div class="col-6">
                <livewire:dnd.live-counter-editor :session="$session"/>
            </div>
        </div>
    </div>
@endsection
