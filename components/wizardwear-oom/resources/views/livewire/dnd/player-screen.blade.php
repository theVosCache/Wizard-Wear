<div>
    <div class="row">
        <div class="col-4">
            @include('livewire.dnd.player_screen.current_character_card', compact('dndCharacter'))
            <div class="mt-3">
                @include('livewire.dnd.player_screen.party_list', compact('partyCharacters'))
            </div>
        </div>
        <div class="offset-4 col-4">
            @include('livewire.dnd.player_screen.monster_list', compact('dndCampaign'))
        </div>
    </div>
</div>
