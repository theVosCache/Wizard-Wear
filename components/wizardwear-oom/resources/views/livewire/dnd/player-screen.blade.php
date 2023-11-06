<div>
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header">Your Information</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 text-center">
                            <img
                                src="{{ $dndCharacter->character->houseCrestImgPath }}"
                                alt="{{ $dndCharacter->character->house }}"
                            /><br>

                            <h3>Level: {{ $dndCharacter->level }}</h3>
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
                </div>
            </div>
        </div>
    </div>
</div>
