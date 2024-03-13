@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Page: {{ $page->title }} (path: {{ $page->path }})</div>
                    <div class="card-body">
                        <livewire:block-editor :model="$page"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
