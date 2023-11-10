<div>
    <div class="row">
        <div class="col-4">
            <livewire:dnd.player-screen.character-information
                :dnd-character="$dndCharacter" />
            <div class="mt-3">
                @include('livewire.dnd.player_screen.party_list', compact('partyCharacters'))
            </div>
        </div>
        <div class="offset-4 col-4">
            @include('livewire.dnd.player_screen.monster_list', compact('dndCampaign'))
        </div>
    </div>
</div>
