@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row text-end">
            <div class="col">
                <a href="{{ route('dnd.session.create') }}" class="btn btn-success">
                    Create new Session
                </a>
            </div>
        </div>
        <div class="row">
            @foreach($sessions as $session)
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            Session {{ $session->start_at?->format('H:i d-m-Y') }}
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <small class="text-muted">Dungeon Master</small><br>
                                {{ $session->dungeonMaster->name }}
                            </p>
                            <p class="card-text">
                                <small class="text-muted">Location</small><br>
                                {{ $session->location }}
                            </p>

                            <a href="{{ route('dnd.session.show', $session) }}" class="btn btn-secondary">Open DM Screen</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
