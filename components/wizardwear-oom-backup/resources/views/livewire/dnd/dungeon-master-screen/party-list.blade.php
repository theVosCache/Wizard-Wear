<div class="row" wire:poll>
    <div class="col-12">
        <div class="card">
            <div class="card-header">Characters in the Party</div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Level</th>
                        <th>Name</th>
                        <th>House</th>
                        <th>Current Hit Points</th>
                        <th>Edit</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($partyList as $character)
                        <tr>
                            <td>{{ $character->level }}</td>
                            <td>{{ $character->character->name }}</td>
                            <td>
                                <img
                                    src="{{ $character->character->houseCrestImgPath }}"
                                    alt="{{ $character->character->house }}"
                                    class="img-fluid" style="max-width: 50px;"
                                />
                            </td>
                            <td>
                                {{ $character->current_hit_points ?? 0 }} / {{ $character->total_hit_points ?? 0 }}

                                <div class="progress" role="progressbar">
                                    <div
                                        class="progress-bar {{ $character->currentHitPointsColor }}"
                                        style="width: {{ $character->currentHitPointsPercentage * 100 }}%"></div>
                                </div>
                            </td>
                            <td>
                                @if($dndCharacter?->uuid === $character?->uuid)
                                    <button class="btn btn-secondary disabled" disabled>Selected</button>
                                @else
                                    <button class="btn btn-warning"
                                            wire:click="selectCharacter('{{ $character->uuid }}')">
                                        Edit
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12 mt-3">
        <div class="card">
            <div class="card-header">Edit Character: {{ $dndCharacter->character->name ?? '-' }}
                ({{ $dndCharacter->user->name ?? '-' }})
            </div>
            <div class="card-body">
                @if($dndCharacter)
                    <table class="table table-striped">
                        <tr>
                            <td rowspan="2">
                                <img
                                    src="{{ $dndCharacter->character->houseCrestImgPath }}"
                                    alt="{{ $dndCharacter->character->house }}"
                                />
                            </td>
                            <th>Level</th>
                            <th>Armor Class</th>
                            <th>Hit Points</th>
                        </tr>
                        <tr>
                            <td>{{ $dndCharacter->level }}</td>
                            <td>{{ $dndCharacter->armor_class }}</td>
                            <td>
                                {{ $dndCharacter->current_hit_points }}
                                / {{ $dndCharacter->total_hit_points }} <br>
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <input type="text" wire:model.live="searchSpells" class="form-control" placeholder="Search in Spells">
                    <table class="table table-striped">
                        @foreach($spells as $spell)
                            <tr>
                                <td>{{ $spell->name }}</td>
                                <td>
                                    Level: {{ $spell->level }} <br>
                                    School of Magic: {{ $spell->school_of_maigc }}
                                    <span
                                        class="{{ ($spell->is_school_of_magic_exclusive) ? 'text-success' : 'text-danger' }}">
                                        {{ ($spell->is_school_of_magic_exclusive) ? 'Yes' : 'No' }}
                                    </span>
                                </td>
                                <td>
                                    @if($dndCharacter->data->spells->contains($spell))
                                        <button class="btn btn-secondary disabled" disabled>Spell Learned</button>
                                    @else
                                        <button class="btn btn-info"
                                                wire:click="learnSpell('{{ $spell->name }}')">
                                            Learn Spell
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <hr>
                    <input type="text" wire:model.live="searchPotions" class="form-control" placeholder="Search in Potions">
                    <table class="table table-striped">
                        @foreach($potions as $potion)
                            <tr>
                                <td>{{ $potion->name }}</td>
                                <td>
                                    @if(empty($potion->learned_in_year))
                                        Potion needs to be researched <br>
                                    @else
                                        Learned in {{ $potion->learned_in_year }}e Year <br>
                                    @endif
                                    Rarity: {{ $potion->rarity }}
                                </td>
                                <td>
                                    @if($dndCharacter->data->potions->contains($potion))
                                        <button class="btn btn-secondary disabled" disabled>Potion Learned</button>
                                    @else
                                        <button class="btn btn-info"
                                                wire:click="learnPotion('{{ $potion->name }}')">
                                            Learn Potion
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
