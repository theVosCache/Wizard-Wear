@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center text-center">
            <livewire:block-renderer :collection="$blocks" />
        </div>
    </div>
@endsection
