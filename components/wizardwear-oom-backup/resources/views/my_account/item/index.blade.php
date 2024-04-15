@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <livewire:my-item-editor :$user/>
        </div>
    </div>
@endsection
