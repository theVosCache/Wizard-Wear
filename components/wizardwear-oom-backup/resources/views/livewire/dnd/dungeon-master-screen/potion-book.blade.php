<div class="card">
    <div class="card-header">Potions through the years</div>
    <div class="card-body">
        <div class="row mt-3">
            <div class="col-12">
                <ul class="nav nav-pills">
                    <li class="nav-item me-1">
                        <button class="nav-link active"
                                data-bs-toggle="tab" data-bs-target="#selected_potion"
                                type="button" role="tab">
                            Selected Potion
                        </button>
                    </li>
                    <li class="nav-item me-1">
                        <button class="nav-link"
                                data-bs-toggle="tab" data-bs-target="#research_potion"
                                type="button" role="tab">
                            Research Potions
                        </button>
                    </li>
                    @foreach($yearList as $yearName => $yearNumber)
                        <li class="nav-item me-1">
                            <button class="nav-link"
                                    data-bs-toggle="tab" data-bs-target="#year_{{ $yearNumber }}_potions"
                                    type="button" role="tab">
                                {{ $yearName }}
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-12">
                <div class="tab-content p-3">
                    <div class="tab-pane active"
                         id="selected_potion" tabindex="0">
                        <table class="table table-striped-rows">
                            <tr><th>Name</th> <td>{{ $potion?->name }}</td></tr>
                            <tr><th>Rarity</th> <td>{{ $potion?->rarity }}</td></tr>
                            <tr><th>Type</th> <td>{{ $potion?->potion_type }}</td></tr>
                            <tr><th>Learned in Year</th> <td>{{ $potion?->learned_in_year }}</td></tr>
                            <tr><th>5e Equivalent</th> <td>{{ $potion?->dnd_equivalent }}</td></tr>
                            <tr><th>Effects</th> <td>{{ $potion?->effects }}</td></tr>
                            <tr><th>Flawed</th> <td>{{ $potion?->flawed }}</td></tr>
                            <tr><th>Exceptional</th> <td>{{ $potion?->exceptional }}</td></tr>
                            <tr><th>Galleon Price</th> <td>{{ $potion?->galleon_price }}</td></tr>
                        </table>
                    </div>
                    <div
                        class="tab-pane"
                        id="research_potion" tabindex="0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Rarity</th>
                                <th>Type</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($potions->where('learned_in_year', null) as $potion)
                                <tr>
                                    <td>{{ $potion->name }}</td>
                                    <td>{{ $potion->rarity }}</td>
                                    <td>{{ $potion->potion_type }}</td>
                                    <td>
                                        @if($selectedPotion === $potion->name)
                                            <button class="btn btn-secondary disabled" disabled>Selected</button>
                                        @else
                                            <button class="btn btn-info" wire:click="selectPotion('{{ $potion->name }}')">
                                                View Potion
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @foreach($yearList as $yearName => $yearNumber)
                        <div
                            class="tab-pane"
                            id="year_{{ $yearNumber }}_potions" tabindex="0">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Rarity</th>
                                    <th>Type</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($potions->where('learned_in_year', $yearNumber) as $potion)
                                    <tr>
                                        <td>{{ $potion->name }}</td>
                                        <td>{{ $potion->rarity }}</td>
                                        <td>{{ $potion->potion_type }}</td>
                                        <td>
                                            @if($selectedPotion === $potion->name)
                                                <button class="btn btn-secondary disabled" disabled>Selected</button>
                                            @else
                                                <button class="btn btn-info"
                                                        wire:click="selectPotion('{{ $potion->name }}')">
                                                    View Potion
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
