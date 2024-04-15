@extends('layouts.simple')

@section('content')
    <div class="container-fluid">
        <livewire:dnd.player-screen
            :dnd-campaign="$dndCampaign"
            :dnd-character="$dndCharacter"
        />
    </div>
@endsection
