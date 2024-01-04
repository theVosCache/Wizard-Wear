<div class="card">
    <div class="card-header">Spell List</div>
    <div class="card-body">
        <div class="row mt-3">
            <div class="col-12">
                <ul class="nav nav-pills">
                    <li class="nav-item me-1">
                        <button class="nav-link active"
                                data-bs-toggle="tab" data-bs-target="#selected_spell"
                                type="button" role="tab">
                            Selected Potion
                        </button>
                    </li>
                    @for($i = 0; $i < 10; $i++)
                        <li class="nav-item me-1">
                            <button class="nav-link"
                                    data-bs-toggle="tab" data-bs-target="#level_{{ $i }}_spells"
                                    type="button" role="tab">
                                Level {{ $i }} Spells
                            </button>
                        </li>
                    @endfor
                </ul>
            </div>
            <div class="col-12">
                <div class="tab-content p-3">
                    <div class="tab-pane active"
                         id="selected_spell" tabindex="0">
                        <table class="table table-striped-rows">
                            <tr>
                                <th>Name</th>
                                <td>{{ $spell?->name }} - {{ $spell?->description }}</td>
                            </tr>
                            <tr>
                                <th>Dnd Equivalent</th>
                                <td>{{ $spell?->dnd_equivalent }}</td>
                            </tr>
                            <tr>
                                <th>School of Magic</th>
                                <td>
                                    {{ $spell?->school_of_magic }}
                                    @if($spell?->is_school_of_magic_exclusive)
                                        <sup class="text-danger">Exclusive</sup>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Level</th>
                                <td>{{ $spell?->level }}</td>
                            </tr>
                            <tr>
                                <th>
                                    Concentration <br>
                                    Dedication <br>
                                    Ritual
                                </th>
                                <td>
                                    @if($spell?->is_concentration)
                                        <span class="text-success">Yes</span> <br>
                                    @else
                                        <span class="text-danger">No</span> <br>
                                    @endif
                                    @if($spell?->is_dedication)
                                        <span class="text-success">Yes</span> <br>
                                    @else
                                        <span class="text-danger">No</span> <br>
                                    @endif
                                    @if($spell?->is_ritual)
                                        <span class="text-success">Yes</span>
                                    @else
                                        <span class="text-danger">No</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Casting Time</th>
                                <td>{{ $spell?->casting_time }}</td>
                            </tr>
                            <tr>
                                <th>Range</th>
                                <td>{{ $spell?->range }}</td>
                            </tr>
                            <tr>
                                <th>Duration</th>
                                <td>{{ $spell?->duration }}</td>
                            </tr>
                            <tr>
                                <th>Tags</th>
                                <td>{{ $spell?->tags }}</td>
                            </tr>
                            <tr>
                                <th>Effects</th>
                                <td>{!! $spell?->effects !!}</td>
                            </tr>
                        </table>
                    </div>
                    @for($i = 0; $i < 10; $i++)
                        <div class="tab-pane" id="level_{{ $i }}_spells" tabindex="0">
                            <table class="table table-striped-rows">
                                @foreach($spellList->where('level', $i) as $spell)
                                    <tr>
                                        <td>
                                            {{ $spell->name }} <br>
                                            {{ $spell->description }}
                                        </td>
                                        <td>{{ $spell->school_of_magic }}</td>
                                        <td>
                                            @if($selectedSpell === $spell->name)
                                                <button class="btn btn-secondary disabled" disabled>Selected</button>
                                            @else
                                                <button class="btn btn-info"
                                                        wire:click="selectSpell('{{ $spell->name }}')">
                                                    View Spell
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
