@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <livewire:character-editor :$user/>
            </div>
        </div>
    </div>
@endsection
