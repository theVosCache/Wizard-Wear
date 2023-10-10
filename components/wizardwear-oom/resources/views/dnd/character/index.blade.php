@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row text-end">
            <div class="col">
                <a href="{{ route('dndCharacter.create') }}" class="btn btn-success">
                    Create new Character
                </a>
            </div>
        </div>
        <div class="row">
            @foreach($characters as $character)
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">{{ $character->name }}</div>
                        <div class="card-body">
                            hoi
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
