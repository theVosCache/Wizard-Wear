@extends('layouts.app')

@section('title')
    DnD Campaigns - Order of Merlin
@endsection

@section('content')
    <div class="container">
        @can('create', \App\Models\Dnd\DndCampaign::class)
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
                                @endcan
                            </div>
                            @cannot('join', $dndCampaign)
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{ route('dnd.player-screen', $dndCampaign) }}"
                                           class="btn btn-primary" target="_blank">
                                            Player Screen
                                        </a>
                                    </div>
                                </div>
                            @endcannot
                            @if($dndCampaign->dungeon_master_id === Auth::id())
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <a href="{{ route('dnd.dm-screen', $dndCampaign) }}"
                                           class="btn btn-primary" target="_blank">
                                            Dungeon Master Screen
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
