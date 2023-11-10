<div class="row">
    <div class="col-4">
        <livewire:dnd.dungeon-master-screen.party-list
            :party-list="$partyList"
            />
    </div>

    <div class="offset-4 col-4">
        <livewire:dnd.dungeon-master-screen.monster-list
            :dnd-campaign="$dndCampaign"
            />
    </div>
</div>
