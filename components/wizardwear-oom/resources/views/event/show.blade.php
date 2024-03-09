@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">Event: {{ $event->name }}</div>
                    <div class="card-body">
                        {{ $event->description }}
                        @if(!empty($event->start) || !empty($event->end))
                            Date: {{ $event->start?->format('d-m-Y') }} - {{ $event->end?->format('d-m-Y') }}
                        @endif
                    </div>
                    <div class="card-body">
                        Members attending this event
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Member</th>
                                <th>Items</th>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($event->users as $user)
                                <tr class="table-active">
                                    <th>{{ $user->name }}</th>
                                    @if($user->id === Auth::id())
                                        <td>See items on the right</td>
                                    @endif
                                    <td></td>
                                </tr>
                                @if($user->id !== Auth::id())
                                    @foreach($user->pivot->items as $item)
                                        <tr>
                                            <td></td>
                                            <td>
                                                <img
                                                    src="{{ $item->avatarPath }}"
                                                    class="img-fluid w-25"
                                                    alt="{{ $item->name }}"
                                                >
                                            </td>
                                            <td>
                                                {{ $item->name }} <br>
                                                {{ $item->description }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <livewire:event-join-status
                    :event="$event"
                    :user="Auth::user()"
                />
            </div>
        </div>
    </div>
@endsection
