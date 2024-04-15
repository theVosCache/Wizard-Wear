<div class="card">
    <div class="card-header">Other Characters in the Party</div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Level</th>
                <th>Name</th>
                <th>House</th>
                <th>Current Hit Points</th>
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
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
