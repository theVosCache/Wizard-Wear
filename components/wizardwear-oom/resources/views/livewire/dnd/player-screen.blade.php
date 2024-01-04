<div>
    <div class="row">
        <div class="col-4">
            <livewire:dnd.player-screen.character-information :dnd-character="$dndCharacter"/>
        </div>
        <div class="col-4">
            <livewire:dnd.player-screen.potion-list :dnd-character="$dndCharacter"/>
            <div class="mt-3">
                <livewire:dnd.player-screen.spell-list :dnd-character="$dndCharacter"/>
            </div>
        </div>
        <div class="col-4">
            <livewire:dnd.player-screen.party-list :party-list="$partyCharacters"/>
            <div class="mt-3">
                <livewire:dnd.player-screen.monster-list :dnd-campaign="$dndCampaign"/>
            </div>
        </div>
    </div>
</div>
