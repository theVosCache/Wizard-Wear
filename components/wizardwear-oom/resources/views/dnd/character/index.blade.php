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
                        @if ($character->avatar)
                            <img src="{{ $character->avatar->storage_path }}" alt="avatar" class="card-img-top">
                        @endif
                        <div class="card-header">
                            <img src="{{ $character->houseCrest }}" alt="{{ $character->house }}" class="h-auto">
                            {{ $character->name }}
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <small class="text-muted">Level / House</small><br>
                                {{ $character->level }} / {{ $character->house }}
                            </p>
                            @foreach($character->data as $key => $value)
                                <p class="card-text">
                                    <small class="text-muted">{{ $key }}</small><br>
                                    {{ $value }}
                                </p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
