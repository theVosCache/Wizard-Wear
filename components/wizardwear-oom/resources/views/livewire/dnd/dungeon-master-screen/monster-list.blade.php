<div class="card">
    <div class="card-header">Enemy list</div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Current Hit Points</th>
            </tr>
            </thead>

            <tbody>
            @foreach($dndCampaign->data->monsterList as $index => $monster)
                <tr>
                    <td>
                        {{ $monster->name }} <br>
                        <span class="text-muted">{{ $monster->monsterType }}</span>
                    </td>
                    <td>
                        <div class="row p-0">
                            <div class="col-12 text-center">
                                {{ $monster->currentHitPoints }} / {{ $monster->totalHitPoints }}
                            </div>
                            <div class="col-1 p-0">
                                <button
                                    class="btn btn-danger" wire:click="decreaseHitPoints({{ $index }})"
                                    @disabled($monster->currentHitPoints === 0)
                                >-
                                </button>
                            </div>
                            <div class="col-10 px-1">
                                <div class="progress h-100" role="progressbar">
                                    <div
                                        class="progress-bar {{ $monster->currentHitPointsColor() }}"
                                        style="width: {{ $monster->currentHitPointsPercentage() * 100 }}%">
                                        @if (!empty($monster->currentHitPointsPercentage()))
                                            @if ($monster->currentHitPointsPercentage() > 0.8)
                                                Healty
                                            @elseif ($monster->currentHitPointsPercentage() > 0.25)
                                                Hurt
                                            @else
                                                Wounded
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-1 p-0">
                                <button
                                    class="btn btn-success" wire:click="increaseHitPoints({{ $index }})"
                                    @disabled($monster->currentHitPoints === $monster->totalHitPoints)
                                >+
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="row">
            <div class="col-12">
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <label for="name" class="ms-auto">Name</label>
                    </span>
                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        wire:model="name"
                    >
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <label for="monster_type" class="ms-auto">Monster Type</label>
                    </span>
                    <input
                        type="text"
                        class="form-control"
                        id="monster_type"
                        wire:model="monsterType"
                    >
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <label for="current_hit_points" class="ms-auto">Hit points</label>
                    </span>
                    <input
                        type="number"
                        class="form-control"
                        id="current_hit_points"
                        wire:model="currentHitPoints"
                    >
                    <span class="input-group-text">/</span>
                    <input
                        type="number"
                        class="form-control"
                        id="total_hit_points"
                        wire:model="totalHitPoints"
                    >
                </div>
                <div class="input-group mb-3">
                    <input type="submit" value="Save" class="btn btn-primary form-control" wire:click="save"/>
                </div>
            </div>
        </div>
    </div>
</div>
