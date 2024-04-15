@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Create your new DnD Campaign</div>
                    <div class="card-body">
                        <form action="{{ route('dnd.dnd-campaign.store')  }}" method="post">
                            @csrf

                            <x-input type="text" name="name" label="Name" required/>
                            <x-input type="datetime-local" name="next_session" label="Next Session" />
                            <x-input type="text" name="location" label="Location" />
                            <x-input type="text" name="invite_code" label="Invite code for player" required/>
                            <x-input type="switch" name="allow_players_to_join" label="Can players join?" />

                            <x-input type="submit" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
