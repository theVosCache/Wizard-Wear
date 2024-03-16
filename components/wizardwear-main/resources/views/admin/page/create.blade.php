@extends('layouts.app')

@section('title')
    <x-lang translation-string="Create a new Page" key="admin" />
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <x-lang translation-string="Create a new Page" key="admin" />
                    </div>
                    <div class="card-body">
                        <livewire:page-create-form />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
