@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">Campaign: {{ $dndCampaign->name }}</div>
                            <div class="col-4 text-end text-muted">
                                Dungeon Master: {{ $dndCampaign->dungeonMaster->name }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <a href="{{ route('dnd.dnd-campaign.edit', $dndCampaign) }}"
                                           class="btn btn-warning">Edit</a>
                                        <a href="{{ route('dnd.dnd-campaign.edit-data', $dndCampaign) }}"
                                           class="btn btn-warning">Edit Session Data</a>
                                    </div>
                                    <div class="col-12">
                                        <span class="text-muted">Dungeon Master</span><br>
                                        {{ $dndCampaign->dungeonMaster->name }} <br>
                                    </div>
                                    <div class="col-12">
                                        <span class="text-muted">Next Session</span><br>
                                        {{ $dndCampaign->next_session?->format('H:i d-m-Y') ?? '-' }} <br>
                                    </div>
                                    <div class="col-12">
                                        <span class="text-muted">Location</span><br>
                                        {{ $dndCampaign->location ?? '-' }} <br>
                                    </div>
                                    <div class="col-12">
                                        <span class="text-muted">Invite Code</span><br>
                                        {{ $dndCampaign->invite_code ?? '-' }}<br>
                                    </div>
                                    <div class="col-12">
                                        <span class="text-muted">Players are allowed to join</span><br>
                                        @if($dndCampaign->allow_players_to_join)
                                            <span class="text-success">YES</span>
                                        @else
                                            <span class="text-danger">NO</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <table class="table table-hover table-bg-none">
                                    <thead>
                                    <th>Player</th>
                                    <th>House</th>
                                    <th>Character name</th>
                                    <th>About</th>
                                    </thead>

                                    <tbody>
                                    @foreach($dndCampaign->dndCharacters as $dndCharacter)
                                        @php
                                            $character = $dndCharacter->character;
                                            $bgColor = match($character->house) {
                                                'gryffindor' => 'bg-danger-subtle',
                                                'hufflepuff' => 'bg-warning-subtle',
                                                'ravenclaw' => 'bg-info-subtle',
                                                'slytherin' => 'bg-success-subtle',
                                                default => 'bg-secondary-subtle'
                                            }
                                        @endphp
                                        <tr class="{{ $bgColor }}">
                                            <td>
                                                {{ $character->user->name }}
                                            </td>
                                            <td>
                                                <img src="{{ $character->houseCrestImgPath }}"
                                                     alt="{{ $character->house }}"
                                                    style="max-width: 100px"
                                                >
                                            </td>
                                            <td>{{ $character->name }}</td>
                                            <td>{{ $character->about }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
