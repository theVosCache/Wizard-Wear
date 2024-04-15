<div class="card">
    <div class="card-header">Character: {{ $dndCharacter->character->name }}</div>
    <div class="card-body">
        @if($editCharacter)
            <div class="row">
                <div class="col-12 text-end">
                    <button class="btn btn-info" wire:click="saveFieldToCharacter">View</button>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-6">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="strength">Strength</label>
                        <input type="number" class="form-control" id="strength" wire:model="strength">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="dexterity">Dexterity</label>
                        <input type="number" class="form-control" id="dexterity" wire:model="dexterity">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="constitution">Constitution</label>
                        <input type="number" class="form-control" id="constitution" wire:model="constitution">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="intelligence">Intelligence</label>
                        <input type="number" class="form-control" id="intelligence" wire:model="intelligence">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="wisdom">Wisdom</label>
                        <input type="number" class="form-control" id="wisdom" wire:model="wisdom">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="charisma">Charisma</label>
                        <input type="number" class="form-control" id="charisma" wire:model="charisma">
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="level">Level</label>
                        <input type="number" class="form-control" id="level" value="{{ $dndCharacter->level }}" disabled>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="initiative">Initiative</label>
                        <input type="number" class="form-control" id="initiative" wire:model="initiative">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="armor_class">Armor Class</label>
                        <input type="number" class="form-control" id="armor_class" wire:model="armorClass">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="total_hit_points">Total Hit Points</label>
                        <input type="number" class="form-control" id="total_hit_points" wire:model="totalHitPoints">
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-12 text-end">
                    <button class="btn btn-warning" wire:click="$toggle('editCharacter')">Edit</button>
                </div>
            </div>
            <div class="row">
                <div class="col-6 text-center">
                    <div class="row">
                        <div class="col-12">
                            <img
                                src="{{ $dndCharacter->character->houseCrestImgPath }}"
                                alt="{{ $dndCharacter->character->house }}"
                            />
                        </div>
                        <div class="col-12 mt-3">
                            <table class="table table-striped">
                                <tr>
                                    <th>Level</th>
                                    <td>{{ $dndCharacter->level }}</td>
                                </tr>
                                <tr>
                                    <th>Armor Class</th>
                                    <td>{{ $dndCharacter->armor_class }}</td>
                                </tr>
                                <tr>
                                    <th>Hit Points</th>
                                    <td>
                                        {{ $dndCharacter->current_hit_points }}
                                        / {{ $dndCharacter->total_hit_points }} <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="row">
                                            <div class="col-2 p-0">
                                                <button
                                                    class="btn btn-danger"
                                                    wire:click="minCurrentHitPoints"
                                                    @disabled($dndCharacter->current_hit_points === 0)
                                                >-</button>
                                            </div>
                                            <div class="col-8 p-0">
                                                <div class="progress h-100" role="progressbar">
                                                    <div
                                                        class="progress-bar {{ $dndCharacter->currentHitPointsColor }}"
                                                        style="width: {{ $dndCharacter->currentHitPointsPercentage * 100 }}%"></div>
                                                </div>
                                            </div>
                                            <div class="col-2 p-0">
                                                <button
                                                    class="btn btn-success"
                                                    wire:click="plusCurrentHitPoints"
                                                    @disabled($dndCharacter->current_hit_points === $dndCharacter->total_hit_points)
                                                >+</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Initiative</th>
                                    <td>{{ $dndCharacter->initiative }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <table class="table">
                        <tr>
                            <th class="text-end">Strength</th>
                            <td>{{ $dndCharacter->strength ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="text-end">Dexterity</th>
                            <td>{{ $dndCharacter->dexterity ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="text-end">Constitution</th>
                            <td>{{ $dndCharacter->constitution ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="text-end">Intelligence</th>
                            <td>{{ $dndCharacter->intelligence ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="text-end">Wisdom</th>
                            <td>{{ $dndCharacter->wisdom ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="text-end">Charisma</th>
                            <td>{{ $dndCharacter->charisma ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>
