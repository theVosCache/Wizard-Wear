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
            @foreach($campaigns as $dndCampaign)
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            {{ $dndCampaign->name }}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <span class="text-muted">Dungeon Master</span><br>
                                    {{ $dndCampaign->dungeonMaster->name }} <br>
                                    <span class="text-muted">Next Session</span><br>
                                    {{ $dndCampaign->next_session?->format('H:i d-m-Y') ?? '-' }} <br>
                                    <span class="text-muted">Location</span><br>
                                    {{ $dndCampaign->location ?? '-' }}
                                </div>
                            </div>
                            <div class="row mt-3">
                                @can('view', $dndCampaign)
                                    <div class="col">
                                        <a href="{{ route('dnd.dnd-campaign.show', $dndCampaign) }}"
                                           class="btn btn-success">
                                            View
                                        </a>
                                    </div>
                                @endcan
                                @can('update', $dndCampaign)
                                    <div class="col">
                                        <a href="{{ route('dnd.dnd-campaign.edit', $dndCampaign) }}"
                                           class="btn btn-warning">
                                            Edit
                                        </a>
                                    </div>
                                @endcan
                                @can('delete', $dndCampaign)
                                    <div class="col">
                                        <form action="{{ route('dnd.dnd-campaign.destroy', $dndCampaign) }}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <x-input type="submit" label="Delete" btn="btn-danger"/>
                                        </form>
                                    </div>
                                @endcan
                                @can('join', $dndCampaign)
                                    <div class="col">
                                        <a href="{{ route('dnd.dnd-campaign.join', $dndCampaign) }}"
                                           class="btn btn-info">
                                            Join
                                        </a>
                                    </div>
                                @else
                                    <div class="col">
                                        <a href="#"
                                           class="btn btn-info disabled" disabled>
                                            Already Joined
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
