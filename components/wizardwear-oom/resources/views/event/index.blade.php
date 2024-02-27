@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($events as $event)
                <div class="col-4">
                    <div class="card text-center">
                        <div class="card-header">{{ $event->name }}</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    {{ $event->description }} <br>
                                    @if($event->start || $event->end)
                                        <div class="col-12 mt-2">
                                            {{ $event->start?->format('d-m-Y') }} -> {{ $event->end?->format('d-m-Y') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 mt-3">
                                    @if($event->isOpen)
                                        <a class="btn btn-success" href="{{ route('event.show', $event) }}">
                                            Show event / Sign up for event
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
