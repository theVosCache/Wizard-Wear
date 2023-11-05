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
                                <span class="text-muted">Dungeon Master</span><br>
                                {{ $dndCampaign->dungeonMaster->name }} <br>
                                <span class="text-muted">Next Session</span><br>
                                {{ $dndCampaign->next_session?->format('H:i d-m-Y') ?? '-' }} <br>
                                <span class="text-muted">Location</span><br>
                                {{ $dndCampaign->location ?? '-' }} <br>
                                <span class="text-muted">Invite Code</span><br>
                                {{ $dndCampaign->invite_code ?? '-' }}
                            </div>

                            <div class="col-6">
                                <table class="table table-hover table-bg-none">
                                    <thead>
                                    <th></th>
                                    <th>House</th>
                                    <th>Name</th>
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
                                                     alt="{{ $character->house }}">
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
