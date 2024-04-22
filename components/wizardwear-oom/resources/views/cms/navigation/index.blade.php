@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Cms Navigation</div>
                    <div class="card-body">
                        <livewire:cms.nav-editor />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
