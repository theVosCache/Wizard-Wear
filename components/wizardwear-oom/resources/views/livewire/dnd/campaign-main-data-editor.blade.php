<div>
    <div class="row">
        <div class="col-12">
            <h3>Monster List</h3>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Monster Type</th>
                    <th>Current Hit Points</th>
                    <th>Total Hit Points</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($dndCampaign->data->monsterList as $monster)
                    <tr>
                        <td>{{ $monster->name }}</td>
                        <td>{{ $monster->monsterType }}</td>
                        <td>{{ $monster->currentHitPoints }}</td>
                        <td>{{ $monster->totalHitPoints }}</td>
                        <td></td>
                    </tr>
                @endforeach
                <tr>
                    <td>
                        <input type="text" class="form-control" id="name" wire:model="name" placeholder="Name">
                    </td>
                    <td>
                        <input type="text" class="form-control" id="monster_type" wire:model="monsterType"
                               placeholder="Monster Type">
                    </td>
                    <td>
                        <input type="number" class="form-control" id="current_hit_points"
                               placeholder="Current Hit Points" wire:model="currentHitPoints">
                    </td>
                    <td>
                        <input type="number" class="form-control" id="total_hit_points" placeholder="Total Hit Points"
                               wire:model="totalHitPoints">
                    </td>
                    <td class="align-text-bottom">
                        <button class="btn btn-success" wire:click="save">Add Monster</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
