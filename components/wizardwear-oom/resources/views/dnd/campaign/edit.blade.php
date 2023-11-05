@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Create your new DnD Campaign</div>
                    <div class="card-body">
                        <form action="{{ route('dnd.dnd-campaign.update', $dndCampaign)  }}" method="post">
                            @csrf
                            @method('PUT')

                            <x-input type="text" name="name" label="Name" :value="$dndCampaign->name" required/>
                            <x-input type="datetime-local" name="next_session"
                                     :value="$dndCampaign->next_session?->format('Y-m-d H:i')" label="Next Session"/>
                            <x-input type="text" name="location" :value="$dndCampaign->location" label="Location"/>
                            <x-input type="text" name="invite_code" label="Invite code for player"
                                     :value="$dndCampaign->invite_code" required/>

                            <x-input type="submit"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
