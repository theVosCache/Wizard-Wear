@extends('layouts.simple')

@section('content')
    <div class="container-fluid">
        <livewire:dnd.dungeon-master-screen
            :dnd-campaign="$dndCampaign"
            />
    </div>
@endsection
