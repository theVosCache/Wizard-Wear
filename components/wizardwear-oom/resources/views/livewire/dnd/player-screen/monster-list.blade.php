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
            @foreach($dndCampaign->data->monsterList as $monster)
                <tr>
                    <td>
                        {{ $monster->name }} <br>
                        <span class="text-muted">{{ $monster->monsterType }}</span>
                    </td>
                    <td>
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
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
