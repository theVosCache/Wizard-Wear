@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Alle evenementen</div>
                    <div class="card-body">
                        <a href="{{ route('admin.event.create') }}" class="btn btn-primary float-end">Maak een nieuw evenement</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
