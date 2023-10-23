<div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Naam</th>
            <th>Hit Points</th>
            <th>Total Hit Points</th>
        </tr>
        </thead>
        <tbody>
        @if(array_key_exists('monsterList', $session->data))
            @foreach($session->data['monsterList'] as $name => $hitPoints)
                @php
                    if ($hitPoints['current'] / $hitPoints['total'] < 0.3) {
                        $bg = 'bg-danger';
                    } elseif ($hitPoints['current'] / $hitPoints['total'] < 0.8){
                        $bg = 'bg-warning';
                    }else{
                        $bg = 'bg-success';
                    }
                @endphp

                <tr>
                    <td class="{{ $bg }}">
                        {{ $name }}
                    </td>
                    <td>
                        <div class="form-group input-group" x-data="{name: '{{ $name }}'}">
                            <span class="input-group-text" x-on:click="$wire.decreaseHitPoints(name)">
                                -
                            </span>
                            <input
                                type="number" disabled
                                class="form-control disabled"
                                value="{{ $hitPoints['current'] }}"
                            >
                            <span class="input-group-text" x-on:click="$wire.increaseHitPoints(name)">
                                +
                            </span>
                        </div>
                    </td>
                    <td>
                        <input
                            type="number" disabled
                            class="form-control disabled"
                            value="{{ $hitPoints['total'] }}"
                        >
                    </td>
                </tr>
            @endforeach
        @endif
        <tr>
            <td>
                <input type="text" class="form-control"
                       wire:model="name" placeholder="Name">
            </td>
            <td>
                <input type="number" class="form-control"
                       wire:model="hitPoints" placeholder="Hit Points">
            </td>
            <td>
                <input type="number" class="form-control"
                       wire:model="totalHitPoints" placeholder="Total Hit Points">
            </td>
            <td>
                <span class="btn btn-primary" x-on:click="$wire.createNewEntry">Add</span>
            </td>
        </tr>
        </tbody>
    </table>
</div>
