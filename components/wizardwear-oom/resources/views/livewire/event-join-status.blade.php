<div class="card">
    <div class="card-header">
        Sign up for Event and show which items you bring
    </div>
    <div class="card-body">
        <button class="btn {{ $buttonClass }}">
            {{ $buttonText }}
        </button>

        <table class="table table-hover">
            <thead>
            <tr>
                <th></th>
                <th>Image</th>
                <th>Name / Description</th>
            </tr>
            </thead>
            <tbody>
            @foreach(Auth::user()->items as $item)
                <tr>
                    <td>
                        @if($eventItems?->contains($item))
                            <button class="btn btn-success"
                                wire:click="toggleItem('{{ $item->uuid }}')">
                                Taking Item To Event
                            </button>
                        @else
                            <button class="btn btn-danger"
                                    wire:click="toggleItem('{{ $item->uuid }}')">
                                Leaving Item at Home
                            </button>
                        @endif
                    </td>
                    <td>
                        <img src="{{ $item->avatarPath }}"
                             alt="{{ $item->name }}"
                             class="img-fluid w-25"
                        >
                    </td>
                    <td>
                        {{ $item->name }} <br>
                        {{ $item->description }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
