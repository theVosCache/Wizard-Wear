@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Evenement: {{ $event->name }}</div>
                    <div class="card-body">
                        <a href="#" onclick="document.getElementById('event-delete-form').submit()"
                           class="btn btn-danger float-end">Delete</a>
                        <a href="{{ route('admin.event.destroy', $event) }}"
                           class="btn btn-warning float-end me-1">Edit</a>

                        <div class="row">
                            <div class="col-12">
                                {{ $event->description }}
                            </div>
                            @if($event->start || $event->end)
                                <div class="col-12 mt-2">
                                    {{ $event->start?->format('d-m-Y') }} -> {{ $event->end?->format('d-m-Y') }}
                                </div>
                            @endif
                        </div>

                        {{--TODO show members --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.event.destroy', $event) }}" method="post" id="event-delete-form">
        @csrf
        @method('DELETE')
    </form>
@endsection
