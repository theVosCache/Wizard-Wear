@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center text-center">
        @foreach($blocks as $block)
            <div class="col-12">
                <livewire:dynamic-component
                    :component="$block['type']"
                    renderMethod="render"
                    :data="$block['data']"
                    wire:key="{{ uniqid() }}"/>
            </div>
        @endforeach
    </div>
</div>
@endsection
