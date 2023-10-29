@extends('layouts.app')

@section('content')
    <div class="container">
        @can('create', App\Models\DndCampaign::class)
            <div class="row">
                <div class="col-12 text-end">
                    <a href="{{ route('dnd.dnd-campaign.create') }}" class="btn btn-success">Host a new Campaign</a>
                </div>
            </div>
        @endcan
        <div class="row">
            @foreach($campaigns as $campaign)
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">{{ $campaign->name }}</div>
                        <div class="card-body">
                            <small class="text-muted">Next Session</small><br>
                            {{ $campaign->next_session?->format('H:i d-m-Y') ?? '-' }} <br>
                            <small class="text-muted">Location</small><br>
                            {{ $campaign->location ?? '-' }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
