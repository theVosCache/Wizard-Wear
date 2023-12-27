@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Alle evenementen</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-end">
                                <a href="{{ route('admin.event.create') }}" class="btn btn-primary">Maak een nieuw evenement</a>
                            </div>
                        </div>
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
                                                    <a href="{{ route('admin.event.show', $event) }}"
                                                       class="btn btn-success">Show</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
