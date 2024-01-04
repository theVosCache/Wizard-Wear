<div class="row">
    <div class="col-4">
        <livewire:dnd.dungeon-master-screen.party-list
            :party-list="$partyList"
        />
    </div>

    <div class="col-4">
        <div class="row">
            <div class="col-12">
                <livewire:dnd.dungeon-master-screen.potion-book/>
            </div>
            <div class="col-12 pt-2">
                <livewire:dnd.dungeon-master-screen.spell-list/>
            </div>
        </div>
    </div>

    <div class="col-4">
        <livewire:dnd.dungeon-master-screen.monster-list
            :dnd-campaign="$dndCampaign"
        />
    </div>
</div>
